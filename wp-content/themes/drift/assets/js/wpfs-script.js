/* global twentyseventeenScreenReaderText */
(function( $ ) {

    /**
     * Wrap desciption text in span tag so we can style as designed
     */
    const form = $( '.wpfs-form' );
    if( ! form ) {
        return;
    }

    const formType = form.data( 'wpfs-form-type' );
    const subscriptionNodes = $( '.wpfs-form-check-group .wpfs-form-check' );

    console.log( formType );

    if( subscriptionNodes ) {
        if( 'inline_subscription' === formType ) {
            formatSubscriptions();
        }
        // subscriptionNodes.each( function( index, value ) {
        //     let $input = $( this ).find( 'input' );
        //     let $label = $( this ).find( '.wpfs-form-check-label' );
        //     let $amount =  $input.data( 'wpfs-plan-amount' );
        //     let $currency = $input.data( 'wpfs-currency' );
        //     let $planName = $input.data( 'wpfs-plan-name' );

        //     let amount = new Intl.NumberFormat( 'en-US', { 
        //         style: 'currency', 
        //         currency: $currency,
        //         minimumFractionDigits: 0,
        //         maximumFractionDigits: 2
        //     } ).format( $amount );

        //     let $description = '<span class="constrained">' + $planName + '</span>';
        //     let $price = '<strong>' + amount + '</strong>';
        //     $label.html( $description + $price );
        // } );
    }

    function formatSubscriptions() {
        subscriptionNodes.each( function( index, value ) {
            let $input = $( this ).find( 'input' );
            let $label = $( this ).find( '.wpfs-form-check-label' );
            let $amount =  $input.data( 'wpfs-plan-amount' );
            let $currency = $input.data( 'wpfs-currency' );
            let $planName = $input.data( 'wpfs-plan-name' );

            let amount = new Intl.NumberFormat( 'en-US', { 
                style: 'currency', 
                currency: $currency,
                minimumFractionDigits: 0,
                maximumFractionDigits: 2
            } ).format( $amount );

            let $description = '<span class="constrained">' + $planName + '</span>';
            let $price = '<strong>' + amount + '</strong>';
            $label.html( $description + $price );
        } );
    }

    function formPayments() {}

})( jQuery );
