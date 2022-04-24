<?php
/* Template name: Donate page */
get_header();
?>

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
				<div class="ab_part_img donate_img">
					<?php
					if ( $image = get_the_post_thumbnail_url( get_the_ID(), 'full' ) ) :
						?>
						<img src="<?php echo esc_url( $image );?>">

					<?php
					endif;
					?>
					<div class="ab_part_img_abu">
						<div class="ab_part_img_inner d-flex">
						<!-- <div>
							<input type="radio" name="same" id="ten" class="custom_radio_button" value="10" data-selectID="ui-id-1" checked>
							<label for="ten"> $10</label>
						</div>
						<div>
							<input type="radio" name="same" id="two"  class="custom_radio_button" value="25"  data-selectID="ui-id-2">
							<label for="two"> $25</label>
						</div>
						<div>
							<input type="radio" name="same" id="thr"  class="custom_radio_button" value="50" data-selectID="ui-id-3">
							<label for="thr"> $50</label>
						</div>
						<div>
							<input type="radio" name="same" id="four"  class="custom_radio_button" value="100" data-selectID="ui-id-4">
							<label for="four"> $100</label>
						</div>
						<div>
							<input type="radio" name="same" id="five"  class="custom_radio_button" value="250" data-selectID="ui-id-5">
							<label for="five"> $250</label>
						</div>
						<div>
							<input type="radio" name="same" id="six"  class="custom_radio_button" value="Other" data-selectID="ui-id-6">
							<label for="six"> Other amount</label>							
							<input type="text" id="other_amount" value="" onkeypress="javascript:return isNumber(event)" >
						</div> -->
						</div>
					</div>
				</div>
				
				

				<div class="form01">
					<?php
					if ( $form = get_post_meta( get_the_ID(), 'form_name', true ) ) {
						echo do_shortcode( '[fullstripe_form name="' . $form . '" type="inline_payment"]' );
					}
					?>
				</div> 
			</div>
		</div>


		<div class="ab_part_r donate-subscribe_txt">
			<div class="contact01">

				<div class="com_heading">
					<h3 class="entry-title"><strong><?php the_title(); ?></strong>
					<?php
					if ( $subsitle = get_post_meta( get_the_ID(), 'subsitle', true ) ) {
						echo "<span class='line_gray'>|</span> " . $subsitle;
					}
					?>
					</h3>
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

<?php 
get_footer();