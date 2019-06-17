jQuery(function($){
	/*
	 * Select/Upload image(s) event
	 */
	$('body').on('click', '.gs_upload_image_button', function(e){
		e.preventDefault();
 
    		var button = $(this),
    		    custom_uploader = wp.media({
			title: 'Insert image',
			library : {
				// uncomment the next line if you want to attach image to the current post
				// uploadedTo : wp.media.view.settings.post.id, 
				type : 'image'
			},
			button: {
				text: 'Use this image' // button label text
			},
			multiple: false // for multiple image selection set to true
		}).on('select', function() { // it also has "open" and "close" events 
			var attachment = custom_uploader.state().get('selection').first().toJSON();
			console.log(attachment);
			$('#user_photo_id').val(attachment.id);
			$('#user_photo_url').val(attachment.url);
			$(button).removeClass('button').html('<img class="true_pre_image" src="' + attachment.url + '" style="max-width:95%;display:block;" />').next().val(attachment.id).next().show();

		})
		.open();
	});
 
	/*
	 * Remove image event
	 */
	$('body').on('click', '.gs_remove_image_button', function(){
		$(this).hide().prev().val('').prev().addClass('button').html('Upload image');
		return false;
	});

	// load students list
	$('body').on('click', '.view_attendance', function(){
		console.log($(this));
		var data = {
			'action': 'get_students_list'
		};
		jQuery.post(ajaxurl, data, function(response) {
			jQuery('#TB_ajaxContent').html(response);
		});
	});

	



	// add student form validationco
	$("#gs_create_students_form").validate({
		rules: {
			first_name: "required",
			last_name: "required",
			email: {
				required: true,
				email: true
			},
			phone: {
				required: true,
				minlength: 10
			},
			dob: "required"
		},
		messages: {
			first_name: "Please enter your firstname",
			last_name: "Please enter your lastname",
			phone: {
				required: "Please enter a phone",
				minlength: "Phone must consist of at least 10 characters"
			},
			email: {
				required: "We need your email address to contact you",
				email: "Invalid email"
			  },
			agree: "Please accept our policy",
			topic: "Please select at least 2 topics"
		}
	});


 
});







function iptfieldCheck(ifcInput, ifcRequired, ifcType){
    var ifcIVal = trimAll("" + ifcInput.value);
    var ifcErrMsg = "";
    if ("r"==ifcRequired.toLowerCase()){
        if (ifcIVal.length<1){
            //ifcErrMsg = "required field";
            ifcInput.addEventListener("blur", function(){
                var ifcrIVal = trimAll("" + ifcInput.value);
                if (ifcrIVal.length<1){
                    iptErrmsg(ifcInput, "required field");
                }
            });
        }
    }
    if (ifcIVal.length>0){
        var ifcTemp = ifcType.toLowerCase();
        ifcIVal = ifcIVal.replace(/ /g, "").replace(/ /g, "").replace(/,/g, "");
        if (ifcTemp=="n"){
            if ((!isNumber(ifcIVal))&&(ifcIVal!="-")&&(ifcIVal!=".")) ifcErrMsg = "numbers only";
        }else if (ifcTemp=="pn"){
            if (!(isNumber(ifcIVal)&&(Number(ifcIVal)>0))) ifcErrMsg = "positive numbers only";
        }else if (ifcTemp=="pzn"){
            if (!(isNumber(ifcIVal)&&(Number(ifcIVal)>=0))) ifcErrMsg = "non negative numbers only";
        }else if (ifcTemp=="i"){
            if ((!isInteger(ifcIVal))&&(ifcIVal!="-")&&(ifcIVal!=".")) ifcErrMsg = "integers only";
        }else if (ifcTemp=="pi"){
            if (!(isInteger(ifcIVal)&&(Number(ifcIVal)>0))) ifcErrMsg = "positive integers only";
        }else if (ifcTemp=="pzi"){
            if (!(isNumber(ifcIVal)&&(Number(ifcIVal)>=0))) ifcErrMsg = "non negative integers only";
        }
    }
    iptErrmsg(ifcInput, ifcErrMsg);
}
