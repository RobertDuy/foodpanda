jQuery(document).ready(function(jQuery) {
	jQuery(".customer-login").click(function(e) {
	        jQuery('body').addClass('mnopen');
	 });
	jQuery(".submit_btn_dailydeal").click(function(e) {
	        jQuery('#xyz').show();
	        jQuery('#xyz .nyroModalCont').show();
	 });
	jQuery(".btn-dn").click(function(e) {
	        jQuery('#dn').show();
	        jQuery('#dn .popupview').show();
	        return false;
	 });
	jQuery(".submit_btn_mn").click(function(e) {
	        jQuery('#mn').show();
	        jQuery('#mn .nyroModalCont').show();
	 });
	jQuery(".closedkdn").click(function(e) {
	        jQuery('body').removeClass('mnopen');
	 });
	jQuery(".nyroModalClose").click(function(e) {
	         jQuery('#mn').hide();
	        jQuery('#mn .nyroModalCont').hide();
	 });
	jQuery(".overlays").click(function(e) {
	         jQuery('body').removeClass('mnopen');
	 });
	jQuery(".nyroModalCloseButton").click(function(e) {
	         jQuery('#xyz').hide();
	        jQuery('#xyz .nyroModalCont').hide();
	 });

	jQuery(".trigger").click(function(e) {
	        jQuery('.order-steps').toggle();
	 });
	jQuery(".btn-close").click(function(e) {
            jQuery('#dn').hide();
            jQuery('#dn .popupview').hide();
	 });
	jQuery(".overlays").click(function(e) {
	        jQuery('.content-wrapper').removeClass('mnopen');
	 });
/*	jQuery(".dt-daily").click(function(e) {
	        jQuery('body').addClass('mnopen');
	 });*/
});