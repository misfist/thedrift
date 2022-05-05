/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./src/js/plugins/wpfs.js ***!
  \********************************/
(function( $ ) {

    /**
     * Wrap desciption text in span tag so we can style as designed
     */
    const form = $( '.wpfs-form' );
    if( ! form ) {
        return;
    }

    const formType = form.data( 'wpfs-form-type' );
    const fieldNodes = $( '.wpfs-form-check-group .wpfs-form-check' );

    console.log( $( '.wpfs-billing-address-switch' ), $( '.wpfs-shipping-address-switch' ) );

    if( fieldNodes ) {

        const replacementBillingText = 'Billing address';
        const replacementShippingText = 'Shipping address';
    
        const billingEl = $( '[for^="wpfs-billing-address-line-1"]' );
        const shippingEl = $( '[for^="wpfs-shipping-address-line-1"]' );
    
        if( 'inline_subscription' === formType ) {
            formatSubscriptions();
        }

        if( 'inline_payment' === formType ) {
            formatPayments();
            moveCustomAmountField();
        }

        if( billingEl ) {
            billingEl.text( replacementBillingText );
        }
        if( shippingEl ) {
            shippingEl.text( replacementShippingText );
        }
    }

    function formatSubscriptions() {
        fieldNodes.each( function() {
            const $input = $( this ).find( 'input' );
            const $label = $( this ).find( '.wpfs-form-check-label' );
            const $amount =  $input.data( 'wpfs-plan-amount' );
            const $currency = $input.data( 'wpfs-currency' );
            const $planName = $input.data( 'wpfs-plan-name' );

            const amount = new Intl.NumberFormat( 'en-US', { 
                style: 'currency', 
                currency: $currency,
                minimumFractionDigits: 0,
                maximumFractionDigits: 2
            } ).format( $amount );

            const $description = '<span class="constrained">' + $planName + '</span>';
            const $price = '<strong>' + amount + '</strong>';
            $label.html( $description + $price );
        } );
    }

    function formatPayments() {
        fieldNodes.each( function() {
            const $input = $( this ).find( 'input' );
            const $label = $( this ).find( '.wpfs-form-check-label' );
            const $description =  $input.data( 'wpfs-amount-description' );

            $label.html( $description );
        } );
    }

    function moveCustomAmountField() {
        const parent = document.querySelector(`.wpfs-form-check-group`);
        const field = document.querySelector(`[data-wpfs-amount-row='custom-amount']`);

        if( parent && field ) {
            parent.insertAdjacentHTML( 'beforeend', field.outerHTML );
            field.remove();
        }
    }

})( jQuery );

/******/ })()
;
//# sourceMappingURL=wpfs.js.map