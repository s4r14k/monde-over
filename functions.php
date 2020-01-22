<?php 

// // Add scripts and stylesheets
// function startwordpress_scripts() {
// 	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6' );
// 	wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css' );
// 	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
// }

// add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );

function my_theme_scripts() {
    wp_enqueue_script( 'my-great-script', get_template_directory_uri() . '/js/my-great-script.js', array( 'jquery' ), '1.0.0', true );
}
// add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

function load_fa() {
	wp_enqueue_style('load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
}

add_action('wp_enqueue_scripts', 'load_fa');

// Add Google Fonts
function startwordpress_google_fonts() {
	wp_register_style('OpenSans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
	wp_enqueue_style( 'OpenSans');
}

add_action('wp_print_styles', 'startwordpress_google_fonts');

// editor
function editor_support() {
        // Add support for editor styles.
          add_theme_support( 'editor-styles' );
}
add_action( 'after_setup_theme', 'editor_support' );

// WordPress Titles
add_theme_support( 'title-tag' );

// Custom settings
function custom_settings_add_menu() {
	add_menu_page( 'Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99 );
}
add_action( 'admin_menu', 'custom_settings_add_menu' );

// Create Custom Global Settings
function custom_settings_page() { ?>
	<div class="wrap">
		<h1>Custom Settings</h1>
		<form method="post" action="options.php">
				<?php
						settings_fields( 'section' );
						do_settings_sections( 'theme-options' );
						submit_button();
				?>
		</form>
	</div>
<?php }

// Twitter
function setting_twitter() { ?>
	<input type="text" name="twitter" id="twitter" value="<?php echo get_option( 'twitter' ); ?>" />
<?php }

function setting_github() { ?>
	<input type="text" name="github" id="github" value="<?php echo get_option('github'); ?>" />
<?php }

function setting_facebook() { ?>
	<input type="text" name="facebook" id="facebook" value="<?php echo get_option('facebook'); ?>" />
<?php }

function custom_settings_page_setup() {
	add_settings_section( 'section', 'All Settings', null, 'theme-options' );
	add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );
	add_settings_field( 'github', 'GitHub URL', 'setting_github', 'theme-options', 'section' );
	add_settings_field( 'facebook', 'Facebook URL', 'setting_facebook', 'theme-options', 'section' );

	register_setting('section', 'twitter');
	register_setting( 'section', 'github' );
	register_setting( 'section', 'facebook' );
}

add_action( 'admin_init', 'custom_settings_page_setup' );

// Support Featured Images
add_theme_support( 'post-thumbnails' );

add_theme_support( 'custom-background' );

add_theme_support( 'custom-header' );

// post pour la création Nous rejoindre

function create_post_nous_rejoindre() {
    	register_post_type( 'nous_rejoindre',
    		array(
    			'labels'       => array(
    'name'       => __( 'Offres emplois' ),
    'singular_name' => 'Offre emploi',
    'add_menu' => 'Ajouter une nouvelle offre',
    'parent' => 'Nous rejoindre'
    			),
    			'public'       => true,
    			'hierarchical' => true,
    			'has_archive'  => true,
    			'supports'     => array(
    'title',
    'editor',
    'author',
    'permalink',
    'excerpt',
    'custom-fields',
    'page-attributes',
    'post-formats',
    'thumbnail',
    			),
    			'taxonomies'   => array(
    'page-attributes',
    'post_tag',
    'category',
    'show_in_rest' => true,
    			)
    		)
    	);
	register_taxonomy_for_object_type( 'category', 'nous_rejoindre' );
	register_taxonomy_for_object_type( 'post_tag', 'nous_rejoindre' );
	register_taxonomy_for_object_type( 'page-attributes', 'nous_rejoindre' );
}

add_action( 'init', 'create_post_nous_rejoindre' );

function show_your_fields_meta_box() {
	global $post;
	$meta = get_post_meta( $post->ID, 'offres', true ); 

	// var_dump($meta);
	?>

	<input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

	<!-- All fields will go here -->

	<p>
    	<label for="offres[type_contrat]">Type contrat</label>
    	<br>
    	<input type="text" name="offres[type_contrat]" id="offres[type_contrat]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['type_contrat'])){ echo $meta['type_contrat']; }  ?>">
    </p>

    <p>
    	<label for="offres[lieux]">Lieux</label>
    	<br>
    	<input type="text" name="offres[lieux]" id="offres[lieux]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['lieux'])){ echo $meta['lieux']; }  ?>" >
    </p>


<?php }


function save_your_fields_meta( $post_id ) {
	// verify nonce
	if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
		return $post_id;
	}
	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	// check permissions
	if ( 'page' === $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}
	}

	$old = get_post_meta( $post_id, 'offres', true );
	$new = $_POST['offres'];

	if ( $new && $new !== $old ) {
		update_post_meta( $post_id, 'offres', $new );
	} elseif ( '' === $new && $old ) {
		delete_post_meta( $post_id, 'offres', $old );
	}
}
add_action( 'save_post', 'save_your_fields_meta' );

function add_your_fields_meta_box() {
	add_meta_box(
		'your_fields_meta_box', // $id
		'Vos champs', // $title
		'show_your_fields_meta_box', // $callback
		'nous_rejoindre', // $screen
		'normal', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_your_fields_meta_box' );

add_shortcode("test_shortcode", 'someshortocode_callback');

function someshortocode_callback( $atts = array(), $content = null ) {

    $output = "Echo!!!";

    return $output;

}

function shortocode_derniere_offre ($atts = array(), $content = null) {
	$args = array(
    	'post_type' => 'nous_rejoindre',
    );

	$your_loop  = new WP_Query(array('post_type'=>'nous_rejoindre', 'post_status'=>'publish', 'posts_per_page'=>2));

	// var_dump($your_loop);
    
    if ( $your_loop->have_posts() ) :
    ?> <div class="derniere-offre-contain"> <div class="h2 derniere-offre-titre">Derniers jobs</div><?php
    while ( $your_loop->have_posts() ) : $your_loop->the_post();
    	$meta = get_post_meta( get_the_ID(), 'offres', true ); 
    	// var_dump($meta);
        ?>
        <div class="offre-hellotana">
        	<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
	    	<div>
	    		<span><i class="fa fa-folder" aria-hidden="true"></i> <?php if (is_array($meta) && isset($meta['type_contrat'])){ echo $meta['type_contrat']; } ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
	    		<span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php if (is_array($meta) && isset($meta['lieux'])){ echo $meta['lieux']; } ?></span>
	    	</div>
	    </div>
        <?php
    endwhile; 
    $nous_rejoindre = get_page_by_title('Nous rejoindre');
    ?> <div class="tous-nos-offre"><a href="<?php echo get_page_link($nous_rejoindre->ID); ?>"><span>TOUTES NOS OFFRES</span></a></div></div> <?php
    wp_reset_postdata();
    else :
         _e( 'Ouuppss, Plus d\'actualité pour le moment.' );
    endif;
}

add_shortcode('derniere_offre', 'shortocode_derniere_offre');

function hellotana_custom_logo_setup() {
 $defaults = array(
 'height'      => 20,
 'width'       => 20,
 'flex-height' => true,
 'flex-width'  => true,
 'header-text' => array( 'site-title', 'site-description' ),
 );
 add_theme_support( 'custom-logo', $defaults );
}

add_action( 'after_setup_theme', 'hellotana_custom_logo_setup' );

function theme_customize_register( $wp_customize ) {
    // Text color
    $wp_customize->add_setting( 'text_color', array(
      'default'   => '',
      'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Text color', 'theme' ),
    ) ) );

    // Link color
    $wp_customize->add_setting( 'link_color', array(
      'default'   => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Link color', 'theme' ),
    ) ) );

    // Accent color
    $wp_customize->add_setting( 'accent_color', array(
      'default'   => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Accent color', 'theme' ),
    ) ) );

    // Border color
    $wp_customize->add_setting( 'border_color', array(
      'default'   => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'border_color', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Border color', 'theme' ),
    ) ) );

    // Sidebar background
    $wp_customize->add_setting( 'sidebar_background', array(
      'default'   => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_background', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Sidebar Background', 'theme' ),
    ) ) );
  }

add_action( 'customize_register', 'theme_customize_register' );


function theme_get_customizer_css() {
    ob_start();

    $text_color = get_theme_mod( 'text_color', '' );
    if ( ! empty( $text_color ) ) {
      ?>
      body {
        color: <?php echo $text_color; ?>;
      }
      <?php
    }


    $link_color = get_theme_mod( 'link_color', '' );
    if ( ! empty( $link_color ) ) {
      ?>
      a {
        color: <?php echo $link_color; ?>;
        border-bottom-color: <?php echo $link_color; ?>;
      }
      <?php
    }

    
    $border_color = get_theme_mod( 'border_color', '' );
    if ( ! empty( $border_color ) ) {
      ?>
      input,
      textarea {
        border-color: <?php echo $border_color; ?>;
      }
      <?php
    }

    
    $accent_color = get_theme_mod( 'accent_color', '' );
    if ( ! empty( $accent_color ) ) {
      ?>
      a:hover {
        color: <?php echo $accent_color; ?>;
        border-bottom-color: <?php echo $accent_color; ?>;
      }

      button,
      input[type="submit"] {
        background-color: <?php echo $accent_color; ?>;
      }
      <?php
    }

    
    $sidebar_background = get_theme_mod( 'sidebar_background', '' );
    if ( ! empty( $sidebar_background ) ) {
      ?>
      .sidebar {
        background-color: <?php echo $sidebar_background; ?>;
      }
      <?php
    }

    $css = ob_get_clean();
    return $css;
  }

// Modify our styles registration like so:

function theme_enqueue_styles() {
  wp_enqueue_style( 'theme-styles', get_stylesheet_uri() ); // This is where you enqueue your theme's main stylesheet
  $custom_css = theme_get_customizer_css();
  wp_add_inline_style( 'theme-styles', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function register_my_menu() {
	register_nav_menu('additional-menu',__( 'Additional Menu' ));
}

add_action( 'init', 'register_my_menu' );

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    if ( ! is_single() ) {
        $more = sprintf( '... <a class="read-more" href="%1$s"><span>%2$s</span> <span><i style="vertical-align:middle;" class="fa fa-chevron-right" aria-hidden="true"></i></span></a>',
            get_permalink( get_the_ID() ),
            __( 'En savoir plus', 'textdomain' )
        );
    }
 
    return $more;
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function filter_site_upload_size_limit( $size ) {
    // Set the upload size limit to 60 MB for users lacking the 'manage_options' capability.
    if ( ! current_user_can( 'manage_options' ) ) {
        // 60 MB.
        $size = 60 * 1024 * 1024;
    }
    return $size;
}
add_filter( 'upload_size_limit', 'filter_site_upload_size_limit', 90 );

flush_rewrite_rules( false );