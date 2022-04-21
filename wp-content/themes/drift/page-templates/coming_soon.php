<?php 
/* Template name: Coming soon */
get_header();
global $theme_option;

	$facebook_url = $theme_option["facebook_url"];
	$twitter_url = $theme_option["twitter_url"];
	$instagram_url = $theme_option["instagram_url"];

	$youtube_url = $theme_option["youtube_url"];
	$linkedin_url = $theme_option["linkedin_url"];
	$pinterest_url = $theme_option["pinterest_url"];
	$gplus_url = $theme_option["gplus_url"];
?>
<section class="coming-soon-wrapper">
	<div class="container">
		<div class="left-branch-img">
				<?php 
				    $pageID = get_the_id();
				    $image1ID = get_post_meta($pageID, "image_1", true);				    
				    if($image1ID != "")
				    {
					    $image1URL = wp_get_attachment_image_src($image1ID, "full");
					    $image1URL = $image1URL[0];
				    }

				    $image2ID = get_post_meta($pageID, "image_2", true);				    
				    if($image2ID != "")
				    {
					    $image2URL = wp_get_attachment_image_src($image2ID, "full");
					    $image2URL = $image2URL[0];
				    }
				  if($image1ID != ""){
				?>
				   <img class="branch_img_01" src="<?php echo $image1URL; ?>"/>
			    <?php } 

				  if($image2URL != ""){
				?>
				   <img class="branch_img_02" src="<?php echo $image2URL; ?>"/>
			    <?php } ?>		
			</div>
		<div class="drift_container">			
			<div class="the-drift-logo">
	            <a href="<?php echo home_url(); ?>">
	              <img src="<?php echo home_url(); ?>/wp-content/uploads/2020/05/Logo.png" style="height: 80px; width: auto;">
	            </a>                     	   	 	       
        	</div>
			<h2 class="drift_title">COMING SOON</h2>
			<h6>
				<span>
					<b><a href="<?php echo get_the_permalink(8); ?>"> Subscribe</a></b>
					 or
					 <b><a href="<?php echo get_the_permalink(6); ?>">Donate</a></b>
				</span>
				to support our magazine.
			</h6>

			<div class="newsletter">
				<p>Be the first to hear when we launch:</p>

				<!-- Begin Mailchimp Signup Form -->
				<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
				<style type="text/css">
					#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
					/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
					   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
				</style>
				<div id="mc_embed_signup">
					<form action="https://thedriftmag.us8.list-manage.com/subscribe/post?u=b3dad736fbc8f8c2b410b2885&amp;id=5567f7ab89" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					    <div id="mc_embed_signup_scroll">
							<div class="mc-field-group news_l d-flex">	
								<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="your email here">
								<input type="submit" value="SUBMIT" name="subscribe" id="mc-embedded-subscribe" class="button">
							</div>
							<div id="mce-responses" class="clear">
								<div class="response" id="mce-error-response" style="display:none"></div>
								<div class="response" id="mce-success-response" style="display:none">Thanks for Joining. </div>
							</div>
							<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						    <div style="position: absolute; left: -5000px;" aria-hidden="true">
						    	<input type="text" name="b_b3dad736fbc8f8c2b410b2885_5567f7ab89" tabindex="-1" value="">
						    </div>
						</div>
					</form>
				</div>
				<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
				<script type='text/javascript'>
				(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true)
				;</script>
				<!--End mc_embed_signup-->
			</div>

			<div class="social_splash">
				<ul class="social_link d-flex">
					<li> Follow us: </li>

					<?php if($facebook_url != ""){?>
					  	<li><a href="<?php echo $facebook_url; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
					<?php } ?>
					
					<?php if($twitter_url != ""){?>
					  	<li><a href="<?php echo $twitter_url; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
					<?php } ?>
					
					<?php if($instagram_url != ""){?>
					  	<li><a href="<?php echo $instagram_url; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
					<?php } ?>
					
					<?php if($youtube_url != ""){?>
					  	<li><a href="<?php echo $youtube_url; ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
					<?php } ?>
					
					<?php if($linkedin_url != ""){?>
					  	<li><a href="<?php echo $linkedin_url; ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
					<?php } ?>
					
					<?php if($pinterest_url != ""){?>
					  	<li><a href="<?php echo $pinterest_url; ?>" target="_blank"><i class="fab fa-pinterest"></i></a></li>
					<?php } ?>
					
					<?php if($gplus_url != ""){?>
					  	<li><a href="<?php echo $gplus_url; ?>" target="_blank"><i class="fab fa-google-plus-square"></i></a></li>
					<?php } ?>
				</ul>
			</div>
				
				<?php
                   $image3ID = get_post_meta($pageID, "image_3", true);				    
				    if($image3ID != "")
				    {
					    $image3URL = wp_get_attachment_image_src($image3ID, "full");
					    $image3URL = $image3URL[0];
				    }
				?>
				<?php 
				  if($image3ID != ""){
				?>
						<div class="right-women-img">
							<img class="women_img_01" src="<?php echo $image3URL; ?>"/>
						</div>
		        <?php } ?>
		</div>
	</div>
</section>

<style type="text/css">

	.page-template-coming_soon .desktop_new_menu {
		display: none;
	}

	@media (max-width: 767px) {
		.page-template-coming_soon .navbar-header {
			display: none !important;
		}	
	}
</style>

<?php get_footer();