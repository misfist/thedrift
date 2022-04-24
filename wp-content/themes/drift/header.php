<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php
   global $theme_option;
   $favicon = $theme_option["favicon"]["url"];
?>
<link rel="icon" href="<?php echo $favicon; ?>" type="image/gif" sizes="64x64">
	
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/all.min.css">
	<link href="<?php bloginfo('template_url'); ?>/assets/css/aos.css" rel="stylesheet">

	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css?family=Jockey+One&display=swap&subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap&subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noticia+Text&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Palanquin&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900&display=swap" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Enriqueta&display=swap" rel="stylesheet">



	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/bootstrap.min.css">
	<link href="<?php bloginfo('template_url'); ?>/assets/css/owl.carousel.min.css" rel="stylesheet" />

	<link  rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/custom_78.css?t=<?php echo time();?>"/>

<?php wp_head(); ?>

</head>

<body <?php echo body_class(); ?>>

<?php
  global $theme_option;
  $issue_color = $theme_option["issue_color"];



    $facebook_url = $theme_option["facebook_url"];
    $twitter_url = $theme_option["twitter_url"];
    $instagram_url = $theme_option["instagram_url"];

    $youtube_url = $theme_option["youtube_url"];
    $linkedin_url = $theme_option["linkedin_url"];
    $pinterest_url = $theme_option["pinterest_url"];
    $gplus_url = $theme_option["gplus_url"];

 ?>

<style type="text/css">

.diff_font h2 a {
	color: <?php echo $issue_color; ?> !important;
}

</style>

<?php
  global $theme_option;
  $logo = $theme_option["logo_image"];
  $logo = $logo["url"];
?>
<div class="site_container">
<?php
  $getID = $_GET["id"];
?>
	<div class="sectionID" data-value="<?php echo $getID; ?>"></div>
 <section class="hed-wrap">
	<div class="Container" id="tf-hide-mob" style="display: none;">

	<?php
      $pageID = get_the_id();
      
    ?>		
       <div class="menu_outer d-flex">

<?php
      $pageID = get_the_id();
      if ($pageID != 6 && $pageID != 8) {?>
        <div class="menu_box_one">



        	<div class="drift_searchForm"><?php echo get_search_form();?></div>
        	<?php
              wp_nav_menu(array("menu" => "Top Left", "menu_class" => "menu-top-left", "menu_class" => "nav d-flex" ))
            ?>
		</div>
<?php } ?>

        <div class="menu_box_two">
            <a class="navbar-brand" href="<?php echo site_url(); ?>">
              <img src="<?php echo $logo; ?>">
            </a>         
            <?php
              $pageID = get_the_id();
              if ($pageID != 6 && $pageID != 8) {?>

            <div class="navbar-header">
	          	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar9">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
	          	</button>
	        </div>              	

              	<?php
              }
            ?> 	       
	        </div>
<?php
      $pageID = get_the_id();
      if ($pageID != 6 && $pageID != 8) {?>
	        
				<div class="menu_box_three">					
                    <?php
                        wp_nav_menu(array("menu" => "Top Right", "menu_class" => "menu-top-right", "menu_class" => "nav d-flex", 'items_wrap' => my_nav_wrap()))
                    ?>
				</div>
<?php } ?>	   
  	</div>
<?php  ?>


  	<div class="only_mobile_show">
      	<ul id="menu-top-left" class="nav d-flex">
			<li><a href="<?php echo home_url(); ?>/about/">about</a></li>
			<li><a href="<?php echo home_url(); ?>/issues/">issues</a></li>
			<li><a href="<?php echo home_url(); ?>/donate/">donate</a></li>
      		<li><a href="<?php echo home_url(); ?>/subscribe/">subscribe</a></li>
      		<li class="mob-search"><a><i class="fa fa-search"></i></a></li>
      		<div class="drift_searchForm"><?php echo get_search_form();?></div>
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
					src="<?php _($logo) ?>"
					type="image/png"
					alt="The Drift Magazine">
				</picture>
            </a> 
        </div>
	  <?php
        wp_nav_menu(array("menu" => "Navigation Menu", "menu_id" => "navigation_menu", ""));
      ?>
	  <div class="drift_searchForm"><?php echo get_search_form();?></div>	
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
						src="<?php _($logo) ?>"
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
            <div class="drift_searchForm" style="display: none;"><?php echo get_search_form();?></div>
            <div id="myMobileNav" class="td-overlay-box">
              <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeMobileNav()">&times;</a> -->
              <div class="td-overlay-content">
                <?php
                    wp_nav_menu(array(
                        'menu' => 'Mobile Menu',
                    ));
                ?>

              </div>
            </div>
        </div>
</header>