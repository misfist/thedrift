<?php 
/* Template name: New Subscribe page */
get_header();

$page_imageID = get_post_thumbnail_id($pageID);
if($page_imageID == "")
{
  $page_imageURL = wp_get_attachment_image_src($page_imageID, "full");	
  $page_imageURL = $page_imageURL[0];
}
else
{
   $page_imageURL = get_bloginfo('template_url')."/assets/images/subscribe-box-bg.png";
}
?>

<style type="text/css">
	
	label[for='wpfs-same-billing-and-shipping-address--ZTI4NGY']:before {
		background: #909090 !important;
		box-shadow: none !important;
	}

</style>
<div class="the-drift-logo-mb" style="display: none;">
    <a href="<?php echo home_url(); ?>">
      <img src="<?php echo home_url(); ?>/wp-content/uploads/2020/05/Logo.png">
    </a>                     	   	 	       
</div>
<section>
	<div class="container-fluid">
	<div class="ab_part d-flex">

		<div class="ab_part_l d-flex">
			<div class="ab_part_linner">
				<div class="subsRadio" style="background: url(<?php echo $page_imageURL; ?>); ">
				   <ul>
				     <li>
					     	<span class="radioSpan">
					     		<input type="radio" name="subscribe_type" class="subscribe_type" id="subscribe_1_year" checked="checked">
					     	</span>
					     	<span class="yearSpan"><label for="wpfs-custom-amount--ZTI4NGY--0" class="active">1 year</label></span>
					     	<span class="dollarSpan">$30</span>
				     	</li>				   	
				     <li>
					     	<span class="radioSpan">					     		
					     		   <input type="radio" name="subscribe_type" class="subscribe_type" id="subscribe_2_year">
					     		</span>
					     	<span class="yearSpan">
					     		<label for="wpfs-custom-amount--ZTI4NGY--1">
					     	       2 years
					     	   </label>
					        </span>
					     	<span class="dollarSpan">$50</span>
				     	</li>				   	
				     <li>
					     	<span class="radioSpan">
					     		   <input type="radio" name="subscribe_type" class="subscribe_type" id="subscribe_3_year">
					     	</span>
					     	<span class="yearSpan"><label for="wpfs-custom-amount--ZTI4NGY--2">Lifetime</label></span>
					     	<span class="dollarSpan">$300</span>
				     	</li>				   	
				   </ul>					
				</div> 
				<?php
				echo do_shortcode('[fullstripe_form name="subscribe" type="inline_subscription"]');
				?>
				 
			</div>
		</div>

<?php 
				$pageID = get_the_id();
				$subsitle = get_post_meta($pageID, "subsitle", true);
				?>
		<div class="ab_part_r">
			<div class="contact01">
				<div class="com_heading">
					<h3><b> Subscribe </b>​<?php if($subsitle != "")
			{
				echo "<span class='line_gray'>|</span> ".$subsitle;
			}?> </h3>
				</div>
				<?php 
			 while(have_posts()):the_post();
			 	the_content();
			 endwhile;
			?>	
			</div>
		</div>
	</div>
</div>
</section>
<script type="text/javascript"> 
	jQuery(document).ready(function(){ 
		
			jQuery("#submit--ZTI4NGY").on("click", function(){
				setTimeout(function(){
				        if(jQuery(".wpfs-form-message--correct").is(':visible') )
				        {
				        	jQuery("#submit--ZTI4NGY").addClass("disableButton");	        	
				        } 
				}, 6000);
			});
	});
</script>
<?php 
get_footer();
?>