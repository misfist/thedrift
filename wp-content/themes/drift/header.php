<?php
   /**
    * Header file for the Drift
    *
    * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
    *
    * @package WordPress
    * @subpackage Drift
    */
   
   ?>
   <!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" >
      <link rel="profile" href="https://gmpg.org/xfn/11">
      <?php wp_head(); ?>
   </head>
   <body <?php body_class(); ?>>
      <?php wp_body_open(); ?>
      <?php
         global $theme_option;
         $issue_color = $theme_option['issue_color'];
         
         $facebook_url  = $theme_option['facebook_url'];
         $twitter_url   = $theme_option['twitter_url'];
         $instagram_url = $theme_option['instagram_url'];
         
         $youtube_url   = $theme_option['youtube_url'];
         $linkedin_url  = $theme_option['linkedin_url'];
         $pinterest_url = $theme_option['pinterest_url'];
         $gplus_url     = $theme_option['gplus_url'];
         $logo          = $theme_option['logo_image'];
         $logo          = $logo['url'];
         
         $page_id = get_the_id();
		 $getID = $_GET['id'];
         ?>

      <style type="text/css">
         .diff_font h2 a {
         color: <?php echo $issue_color; ?> !important;
         }
      </style>

      <div class="site_container">
      <div class="sectionID" data-value="<?php echo $getID; ?>"></div>
      <section class="hed-wrap">
         <div class="Container" id="tf-hide-mob" style="display: none;">
            <div class="menu_outer d-flex">
               <?php
                  if ( $page_id != 6 && $page_id != 8 ) :
                  	?>
               <div class="menu_box_one">
                  <div class="drift_searchForm"><?php echo get_search_form(); ?></div>
                  <?php
                     wp_nav_menu(
                     	array(
                     		'menu'       => 'Top Left',
                     		'menu_class' => 'menu-top-left',
                     		'menu_class' => 'nav d-flex',
                     	)
                     )
                     ?>
               </div>
               <?php endif; ?>
               <div class="menu_box_two">
                  <a class="navbar-brand" href="<?php echo site_url(); ?>">
                  <img src="<?php echo $logo; ?>">
                  </a>         
                  <?php
                     if ( $page_id != 6 && $page_id != 8 ) :
                     	?>
                  <div class="navbar-header">
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar9">
                     <span class="sr-only"><?php esc_html__( 'Toggle navigation', 'drift' ); ?></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     </button>
                  </div>
               </div>
               <div class="menu_box_three">					
                  <?php
                     wp_nav_menu(
                     	array(
                     		'menu'       => 'Top Right',
                     		'menu_class' => 'menu-top-right',
                     		'menu_class' => 'nav d-flex',
                     		'items_wrap' => my_nav_wrap(),
                     	)
                     )
                     ?>
               </div>
               <?php endif; ?>	   
            </div>
            <div class="only_mobile_show">
               <ul id="menu-top-left" class="nav d-flex">
                  <li><a href="<?php echo home_url(); ?>/about/">about</a></li>
                  <li><a href="<?php echo home_url(); ?>/issues/">issues</a></li>
                  <li><a href="<?php echo home_url(); ?>/donate/">donate</a></li>
                  <li><a href="<?php echo home_url(); ?>/subscribe/">subscribe</a></li>
                  <li class="mob-search"><a><i class="fa fa-search"></i></a></li>
                  <div class="drift_searchForm"><?php echo get_search_form(); ?></div>
               </ul>
            </div>
         </div>
         <div class="desktop_new_menu">
            <div class="desktop-logo">
               <a href="<?php echo home_url(); ?>">
                  <picture>
                     <source
                        media="(min-width: 1024px)"
                        srcset="
                        <?php echo get_theme_file_uri() . '/assets/images/drift_logo_large_1x.png'; ?> 1x, 
                        <?php echo get_theme_file_uri() . '/assets/images/drift_logo_large_2x.png'; ?> 2x, 
                        <?php echo get_theme_file_uri() . '/assets/images/drift_logo_large_3x.png'; ?> 3x"
                        type="image/png" >
                     <img
                        src="<?php _( $logo ); ?>"
                        type="image/png"
                        alt="The Drift Magazine">
                  </picture>
               </a>
            </div>
            <?php
               wp_nav_menu(
               	array(
               		'menu'    => 'Navigation Menu',
               		'menu_id' => 'navigation_menu',
               		'',
               	)
               );
               ?>
            <div class="drift_searchForm"><?php echo get_search_form(); ?></div>
         </div>
      </section>
      <header class="td-site-mobile-header" style="display: none;">
         <div class="container no-print">
            <div class="td-mobile-logo">
               <a href="<?php echo home_url(); ?>">
                  <picture>
                     <source
                        media="(max-width: 1023px)"
                        srcset="
                        <?php echo get_theme_file_uri() . '/assets/images/drift_logo_mobile_1x.png'; ?> 1x, 
                        <?php echo get_theme_file_uri() . '/assets/images/drift_logo_mobile_2x.png'; ?> 2x, 
                        <?php echo get_theme_file_uri() . '/assets/images/drift_logo_mobile_3x.png'; ?> 3x"
                        type="image/png" >
                     <img
                        src="<?php _( $logo ); ?>"
                        type="image/png"
                        alt="The Drift Magazine">
                  </picture>
               </a>
            </div>
            <div class="td-mobile-menus">
               <div class="seach-mobile-view">
                  <a href="javascript:void(0);"><i class="fa fa-search"></i></a>
               </div>
               <span onclick="openMobileNav()" class="openMobMenuIcon">&#9776;</span>
            </div>
            <div class="drift_searchForm" style="display: none;"><?php echo get_search_form(); ?></div>
            <div id="myMobileNav" class="td-overlay-box">
               <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeMobileNav()">&times;</a> -->
               <div class="td-overlay-content">
                  <?php
                     wp_nav_menu(
                     	array(
                     		'menu' => 'Mobile Menu',
                     	)
                     );
                     ?>
               </div>
            </div>
         </div>
      </header>

