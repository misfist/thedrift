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
    const fieldNodes = $( '.wpfs-form-check-group .wpfs-form-check' );

    if( fieldNodes ) {
        console.log( formType );
        if( 'inline_subscription' === formType ) {
            formatSubscriptions();
        }
        // fieldNodes.each( function( index, value ) {
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

        if( 'inline_payment' === formType ) {
            formatPayments();
            moveCustomAmountField();
        }
    }

    function formatSubscriptions() {
        fieldNodes.each( function( index, value ) {
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

    function formatPayments() {
        fieldNodes.each( function( index, value ) {
            let $input = $( this ).find( 'input' );
            let $label = $( this ).find( '.wpfs-form-check-label' );
            let $description =  $input.data( 'wpfs-amount-description' );

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
