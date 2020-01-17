<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Rafanomezantsoa Sariakiniaina">

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo get_bloginfo('template_directory'); ?>/blog.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head();?>
  </head>

  <body>
  <div class="slider-header">
    <?php echo do_shortcode("[slide-anything id='64']") ?>
  </div>
  <div class="blog-masthead">
        <div class="nav-header">
          <?php  
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            if ( has_custom_logo() ) {
                    echo '<div><img class="logo-custom" src="' . $logo[0] . '" alt="' . get_bloginfo( 'name' ) . '"></div>';
            } else {
                    echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
            }
          ?>
          <nav class="blog-nav">
            <span id="menu_android" class="menu-android" onclick="afficherMenu()"><i class="fa fa-bars" aria-hidden="true"></i></span>
            <span class="close-menu" onclick="fermerMenu()"><i class="fa fa-times" aria-hidden="true"></i></span>
            <?php wp_nav_menu( array( 'theme_location' => 'additional-menu' ) ); ?>
          </nav>
        </div>
      </div>

      <div>
        <div class="blog-header">
          <div class="blog-title"></div>
        </div>