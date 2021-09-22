<?php

/**
 *
 * Class SamePrefixTaxonomies
 * @version 1.0.0
 *
 */
class SamePrefixTaxonomies
{
    /**
     * @var array
     */
    private $taxonomies;

    //singleton

    private static $instances = [];

    protected function __construct()
    {
        add_action( 'wp_loaded', [$this, 'init'] );
        add_action( 'wp_loaded', [$this, 'flush'], 999 );
//        ## Отфильтруем ЧПУ произвольного типа
//// сам фильтр: apply_filters( 'post_type_link', $post_link, $post, $leavename, $sample );
        add_filter( 'post_type_link', [$this, 'permalink'], 1, 2 );
    }

    protected function __clone()
    {
    }

    /**
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new Exception( "Cannot unserialize a singleton." );
    }

    /**
     * @return SamePrefixTaxonomies
     */
    public static function getInstance()
    {
        $cls = static::class;
        if ( !isset( self::$instances[$cls] ) ) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    public function init()
    {
        foreach (get_post_types( array('_builtin' => false), 'objects' ) as $ptype) {
            if ( !$ptype->rewrite ) {
                continue;
            }
            $front_post = trim( substr( $ptype->rewrite['slug'], 0, strpos( $ptype->rewrite['slug'], '%' ) ), '/' );
            if ( !$front_post ) {
                continue;
            }
            if ( false !== strpos( $ptype->rewrite['slug'], '%' ) ) {
                add_filter( "{$ptype->name}_rewrite_rules", [$this, 'postTypeRewriteRules'] );
            }
            foreach ($ptype->taxonomies as $tax_name) {
                $taxonomy = get_taxonomy( $tax_name );
                if ( !$taxonomy->rewrite ) {
                    continue;
                }
                if ( $front_post === $taxonomy->rewrite['slug'] ) {

                    $this->taxonomies[$ptype->name][] = $tax_name;
                    $paths                            = $this->getTermsPaths( $tax_name );
                    if ( !empty( $paths ) ) {
                        $tag = '(' . implode( '|', $paths ) . ')';
                        add_rewrite_tag( "%$tax_name%", $tag, $taxonomy->query_var ? "{$taxonomy->query_var}=" : "taxonomy=$tax_name&term=" );
                    }

                }
            }

        }

        if ( empty( $this->taxonomies ) ) {
            return;
        }

        add_action( 'created_term', [$this, 'scheduleFlush'] );
        add_action( 'edited_term', [$this, 'scheduleFlush'] );
        add_action( 'delete_term', [$this, 'scheduleFlush'] );
    }

    /**
     * Save an option that triggers a flush on the next init.
     *
     */
    public function scheduleFlush()
    {
        update_option( 'goodini_flush_rewrite', 1 );
    }

    /**
     * If the flush option is set, flush the rewrite rules.
     *
     * @return bool
     *
     */
    public function flush()
    {
        if ( get_option( 'goodini_flush_rewrite' ) || get_option( 'goodini_taxonomies_rewrite' ) !== $this->taxonomies ) {

            flush_rewrite_rules();
            update_option( 'goodini_taxonomies_rewrite', $this->taxonomies );
            delete_option( 'goodini_flush_rewrite' );

            return true;
        }

        return false;
    }

    /**
     * This function taken and only slightly adapted from WP No Category Base plugin by Saurabh Gupta.
     *
     * @param array $rules
     * @return array
     */
    public function postTypeRewriteRules($rules)
    {
        $filter    = current_filter();
        $post_type = substr( $filter, 0, strpos( $filter, '_rewrite_rules' ) );

        if ( !isset( $this->taxonomies[$post_type] ) ) {
            return $rules;
        }

        $ptype = get_post_type_object( $post_type );

        $searches = [];
        $replaces = [];
        foreach ($this->taxonomies[$post_type] as $tax_name) {
            if ( false === strpos( $ptype->rewrite['slug'], "%$tax_name%" ) ) {
                continue;
            }
            $paths      = $this->getTermsPaths( $tax_name );
            $searches[] = '/' . implode( '|', $paths ) . '/';
            $searches[] = '(' . implode( '|', $paths ) . ')';
            $paths[]    = 'no-term';
            $replaces[] = '/(?:' . implode( '|', $paths ) . ')/';
            $replaces[] = '(' . implode( '|', $paths ) . ')';

        }
        if ( empty( $searches ) ) {
            return $rules;
        }

        $new_rules = [];
        foreach ($rules as $regexp => $rule) {
            $new_rules[str_replace( $searches, $replaces, $regexp )] = $rule;
        }
        return $new_rules;
    }

    /**
     * This function taken and only slightly adapted from WP No Category Base plugin by Saurabh Gupta.
     *
     * @param array $rules
     * @return array
     */
//    public function taxonomyRewriteRules($rules)
//    {
//        global $wp_rewrite;
//
//        $category_rewrite = [];
//
//        $filter   = current_filter();
//        $tax_name = substr( $filter, 0, strpos( $filter, '_rewrite_rules' ) );
//
//        if ( !in_array( $tax_name, $this->taxonomies, true ) ) {
//            return $rules;
//        }
//
//        $taxonomy            = get_taxonomy( $tax_name );
//        $permalink_structure = get_option( 'permalink_structure' );
//
//        $blog_prefix = '';
//        if ( is_multisite() && !is_subdomain_install() && is_main_site() && strpos( $permalink_structure, '/blog/' ) === 0 ) {
//            $blog_prefix = 'blog/';
//        }
//
//        $categories = get_terms( [
//            'taxonomy'   => $tax_name,
//            'hide_empty' => false
//        ] );
//        if ( is_array( $categories ) && $categories !== [] ) {
//            foreach ($categories as $category) {
//                $this->addTermRewrites( $category_rewrite, $category, $taxonomy, $blog_prefix, $wp_rewrite->pagination_base );
//            }
//        }
//
//        return $category_rewrite;
//    }

    /**
     * Add term's rewrites rules.
     *
     * @param array $rewrites
     * @param WP_Term $term Term.
     * @param WP_Taxonomy $taxonomy Taxonomy.
     * @param string $blog_prefix Multisite blog prefix.
     * @param string $pagination_base WP_Query pagination base.
     *
     */
//    protected function addTermRewrites(&$rewrites, $term, $taxonomy, $blog_prefix, $pagination_base)
//    {
//        $term_name = $term->slug;
//        if ( $term->parent === $term->term_id ) {
//            // Recursive recursion.
//            $term->parent = 0;
//        }
//        if ( $taxonomy->rewrite['hierarchical'] !== false && $term->parent !== 0 ) {
//            $parents = get_term_parents_list( $term->parent, $taxonomy->name, array(
//                'link'   => false,
//                'format' => 'slug',
//            ) );
//            if ( !is_wp_error( $parents ) ) {
//                $term_name = $parents . $term_name;
//            }
//            unset( $parents );
//        }
//
//        $rewrite_name = $blog_prefix . $taxonomy->rewrite['slug'] . '/(' . $term_name . ')';
//
//        $rewrites[$rewrite_name . '/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$']    = 'index.php?taxonomy=' . $taxonomy->name . '&term=$matches[1]&feed=$matches[2]';
//        $rewrites[$rewrite_name . '/' . $pagination_base . '/?([0-9]{1,})/?$'] = 'index.php?taxonomy=' . $taxonomy->name . '&term=$matches[1]&paged=$matches[2]';
//        $rewrites[$rewrite_name . '/?$']                                       = 'index.php?taxonomy=' . $taxonomy->name . '&term=$matches[1]';
//
//    }

    /**
     * @param string $taxonomy_name
     * @return string[]
     */
    protected function getTermsPaths($taxonomy_name)
    {
        $term_names = [];
        $taxonomy   = get_taxonomy( $taxonomy_name );
        $terms      = get_terms( [
            'taxonomy'   => $taxonomy_name,
            'hide_empty' => false
        ] );
        if ( is_array( $terms ) && $terms !== [] ) {
            foreach ($terms as $term) {
                $term_name = $term->slug;
                if ( $term->parent === $term->term_id ) {
                    // Recursive recursion.
                    $term->parent = 0;
                }
                if ( $taxonomy->hierarchical && $taxonomy->rewrite['hierarchical'] !== false && $term->parent !== 0 ) {
                    $parents = get_term_parents_list( $term->parent, $taxonomy->name, array(
                        'link'   => false,
                        'format' => 'slug',
                    ) );
                    if ( !is_wp_error( $parents ) ) {
                        $term_name = $parents . $term_name;
                    }
                    unset( $parents );
                }
                $term_names[] = $term_name;

            }
        }

        uasort($term_names, function ($a, $b) {
            return strlen($b) - strlen($a);
        });

        return $term_names;
    }

    /**
     * @param string $permalink
     * @param WP_Post $post
     * @return string
     */
    public function permalink($permalink, $post)
    {
        if ( !isset( $this->taxonomies[$post->post_type] ) ) {
            return $permalink;
        }

        foreach ($this->taxonomies[$post->post_type] as $tax_name) {
            // выходим если это не наш тип записи: без холдера
            if ( strpos( $permalink, "%$tax_name%" ) === false ) {
                continue;
            }

            // Получаем элементы таксы
            $terms = get_the_terms( $post, $tax_name );
            // если есть элемент заменим холдер
            if ( !is_wp_error( $terms ) && !empty( $terms ) && is_object( $terms[0] ) ) {
                $taxonomy_slug = $terms[0]->slug;
                if ( $terms[0]->parent && get_taxonomy( $tax_name )->rewrite['hierarchical'] ) {
                    $taxonomy_slug = get_term_parents_list( $terms[0]->term_id, $tax_name, array(
                        'format' => 'slug',
                        'link'   => false,
                    ) );
                }
            } // элемента нет, а должен быть...
            else {
                $taxonomy_slug = 'no-term';
            }
            $permalink = str_replace( "%$tax_name%", $taxonomy_slug, $permalink );
        }
        return $permalink;
    }

}