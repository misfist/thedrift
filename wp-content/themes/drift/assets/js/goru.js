jQuery(document).ready(function(){

jQuery("#other_amount").change(function(){
	var other_amount = jQuery(this).val();
	jQuery("#wpfs-custom-amount-unique--ZjFiZTB").val(other_amount);
	jQuery("#wpfs-custom-amount-unique--ZjFiZTB").removeAttr("disabled");
});

jQuery("#wpfs-card-holder-name--ZjFiZTB").change(function(){
	var full_name = jQuery(this).val();
   jQuery("#wpfs-billing-name--ZjFiZTB").val(full_name);	
});


jQuery("#wpfs-card-holder-name--ZTI4NGY").change(function(){
	var full_name2 = jQuery(this).val();
   jQuery("#wpfs-billing-name--ZTI4NGY").val(full_name2);	
});

jQuery("#wpfs-address-switcher--ZTI4NGY").removeClass("wpfs-form-check-group");

	jQuery('button.navbar-toggle').click(function(){
		jQuery('.only_mobile_show').toggle();
	});
	jQuery('body').find('.wpfs-selectmenu-menu').children('#wpfs-custom-amount--ZjFiZTB-menu').html('<li class="ui-menu-item" id="ui-id-1" tabindex="-1" role="option"><div class="menu-item-wrapper ui-menu-item-wrapper ui-state-selected">10</div></li><li class="ui-menu-item" id="ui-id-2" tabindex="-1" role="option"><div class="menu-item-wrapper ui-menu-item-wrapper">25</div></li><li class="ui-menu-item" id="ui-id-3" tabindex="-1" role="option"><div class="menu-item-wrapper ui-menu-item-wrapper">50</div></li><li class="ui-menu-item" id="ui-id-4" tabindex="-1" role="option"><div class="menu-item-wrapper ui-menu-item-wrapper">100</div></li><li class="ui-menu-item ui-state-focus" id="ui-id-5" tabindex="-1" role="option"><div class="menu-item-wrapper ui-menu-item-wrapper">250</div></li><li class="ui-menu-item" id="ui-id-6" tabindex="-1" role="option"><div class="menu-item-wrapper ui-menu-item-wrapper">Other</div></li>');
	jQuery('input[type=radio][name=same]').change(function() {
		var selectid = jQuery(this).data('selectid');

	    if(selectid == "ui-id-6")
		{
			var other_amountBot = jQuery("#other_amount").val();
			jQuery("#wpfs-custom-amount-unique--ZjFiZTB").val(other_amountBot);
		}
	
		jQuery('body').find('.wpfs-selectmenu-menu').children().children('#'+selectid).trigger('click');

		jQuery('#wpfs-custom-amount--ZjFiZTB').val(this.value).trigger('change');
		jQuery('#wpfs-custom-amount--ZjFiZTB-button').attr( 'aria-activedescendant', selectid);
		jQuery('#wpfs-custom-amount--ZjFiZTB-button').attr( 'aria-labelledby', selectid);
		jQuery('#wpfs-custom-amount--ZjFiZTB-button').children('.ui-selectmenu-text').text(this.value);

	

	});



	jQuery('.ab_part_linner button[type="submit"]').html("Subscribe now");
	jQuery('.ab_part_linner .form01 button[type="submit"]').html("Donate now!");
});

