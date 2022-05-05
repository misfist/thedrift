<?php
/**
 * Content Leaky Paywall
 *
 * @since   1.0.0
 * @package SiteFunctionality
 */
namespace SiteFunctionality\Integration;

use SiteFunctionality\Abstracts\Base;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class LeakyPaywall extends Base {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct( $version, $plugin_name ) {
		parent::__construct( $version, $plugin_name );
		$this->init();
	}

	/**
	 * Init
	 *
	 * @return void
	 */
	public function init() {
		\add_filter( 'leaky_paywall_subscribe_or_login_message', array( $this, 'paywall_message' ), 10, 4 );
		\add_filter( 'leaky_paywall_nag_excerpt', array( $this, 'paywall_excerpt' ), 10, 2 );
		\add_filter( 'leaky_paywall_nag_message_text', array( $this, 'paywall_message_text' ), 10, 2 );
	}

	public function paywall_message( $new_content, $message, $content, $post_id ) {

		return $new_content;

	}


	public function paywall_excerpt( $excerpt, $post_id ) {
		return $excerpt;
	}

	public function paywall_message_text( $message, $post_id ) { 
		ob_start();
		?>

<div class="container">

<div class="row">

	<div class="col-12 col-md-12 col-lg-3 col-xl-4">

		<div class="dpp-popup-cell lh-column">

			<span class="dpp-popup-headline d-md-none">
				You have read 1 of 3 free articles.<br>
				<a href="https://www.thedriftmag.com/subscribe/">Subscribe</a> for unlimited access.
			</span>

			<span class="dpp-popup-headline  d-none d-md-inline-block">
				You have read 1 of 3 free articles.
			</span>

		</div>

	</div>

	<div class="col-12 col-md-6 col-lg-5 col-xl-4">

		<div class="dpp-popup-cell text-center">

			<span class="dpp-popup-lead">Support new writers and fresh ideas.</span><br>

			<a href="https://www.thedriftmag.com/subscribe/" class="btn btn-primary dpp-popup-btn-subscribe dpp-popup-desktop-only">Subscribe</a><br>

			<span>Already a subscriber? <a href="https://www.thedriftmag.com/account/">Sign in.</a></span><br>

		</div>

	</div>

	<div class="col-12 col-md-6 col-lg-4 dpp-email-wrap">

		<div class="dpp-popup-cell">

			<span class="dpp-popup-lead">Sign up for our email list.</span>

			<!-- Begin Mailchimp Signup Form -->
			<div id="mc_embed_signup">
			<form action="" method="post" id="mc-embedded-subscribe-form-dpp" name="mc-embedded-subscribe-form-dpp" class="validate" target="_blank" novalidate="novalidate">
			<div id="mc_embed_signup_scroll">
			<input type="hidden" name="action" value="dpp_submit_mailchimp">
			<input type="hidden" id="dpp_mailchimp_form_nonce" name="dpp_mailchimp_form_nonce" value="fd63c1cda9"><input type="hidden" name="_wp_http_referer" value="/college-debt/">			<div class="mc-field-group news_l d-flex">	
				<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="email address here" aria-required="true">
				<input type="submit" value="SUBMIT" name="subscribe" id="mc-embedded-subscribe" class="button">
			</div>
			<div id="mce-responses" class="clear">
				<div class="response" id="mce-error-response" style="display: none; opacity: 1;"></div>
				<div class="response" id="mce-success-response" style="display: none; opacity: 1;">Thanks for Joining. </div>
			</div>
			<div style="position: absolute; left: -5000px;" aria-hidden="true">
				<input type="text" name="b_b3dad736fbc8f8c2b410b2885_5567f7ab89" tabindex="-1" value="">
			</div>
			</div>
			</form>
			</div> 
			<!--End mc_embed_signup-->	
		</div>

	</div>

</div>

</div>
		
		<?php
		$message = ob_get_clean();
		return $message;
	}

}
