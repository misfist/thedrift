<?php
/* Template name: Subscribe page */
get_header();

$page_imageID = get_post_thumbnail_id( $pageID );
if ( $page_imageID == '' ) {
	$page_imageURL = wp_get_attachment_image_src( $page_imageID, 'full' );
	$page_imageURL = $page_imageURL[0];
} else {
	$page_imageURL = get_bloginfo( 'template_url' ) . '/assets/images/subscribe-box-bg.png';
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
			<div class="ab_part_linner kudossubscribe">

			<?php
			if ( $form = get_post_meta( get_the_ID(), 'form_name', true ) ) {
				echo do_shortcode( '[fullstripe_form name="' . $form . '" type="inline_subscription"]' );
			}
			?>
				
			</div>
		</div>

<?php
				$pageID   = get_the_id();
				$subsitle = get_post_meta( $pageID, 'subsitle', true );
?>
		<div class="ab_part_r donate-subscribe_txt">
			<div class="contact01">
				<div class="com_heading">
					<h3><strong><?php the_title(); ?></strong>​
					<?php
					if ( $subsitle != '' ) {
						echo "<span class='line_gray'>|</span> " . $subsitle;
					}
					?>
				 </h3>
				</div>
				<?php
				while ( have_posts() ) :
					the_post();
					the_content();
			 endwhile;
				?>
			</div>
		</div>
	</div>
</div>
</section>

<?php
get_footer();
?>
