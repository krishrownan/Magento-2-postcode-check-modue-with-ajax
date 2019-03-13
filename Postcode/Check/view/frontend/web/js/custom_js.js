require(['jquery'],function(){
    jQuery(document).ready(function() {
        jQuery(".form-submit").submit(function(){

            var code = jQuery("#postcode").val();  

            jQuery(".success-response").empty();          

            if(code == "" || !jQuery.isNumeric(code)){

            		jQuery(".error-msg").show();

            		return false;	

            }else{	

            jQuery(".error-msg").hide();

            var url = jQuery(".form-submit").attr("action");
            jQuery.ajax({
            url: url,
            type: "POST",
            data: {postcode:code},
            showLoader: true,
            cache: false,
            success: function(response){

            	jQuery(".success-response").empty();

                console.log(response.postcode);

                console.log(response.status);
                
                if (response.postcode && response.status =='1' ) {

                	jQuery(".success-response").html("<p class='avail'>Delivery possible in your area</p>");

                }else{

                	jQuery(".success-response").html("<p class='not-avail'>We do not deliver to this location.</p>");
                }
                
            }
        });
        return false;

        }
        });
    });
});