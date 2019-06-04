<?php
function gs_image_uploader_field( $name, $value = '') {
	$image = ' button">Upload image';
	$image_size = '150x150'; // it would be better to use thumbnail size here (150x150 or so)
	$display = 'none'; // display state of the "Remove image" button

	if( $image_attributes = wp_get_attachment_image_src( $value, $image_size ) ) {

		// $image_attributes[0] - image URL
		// $image_attributes[1] - image width
		// $image_attributes[2] - image height

		$image = '"><img src="' . $image_attributes[0] . '" style="display:block;" />';
		$display = 'inline-block';
	} 
	return '
	<div>
		<a href="#" class="gs_upload_image_button' . $image . '</a>
		<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '" />
		<a href="#" class="gs_remove_image_button" style="display:inline-block;display:' . $display . '">Remove image</a>
	</div>';
}

function get_gender($key)
{
	switch ($key) {
		case 'm':
			return "Male";
			break;
		case 'f':
			return "Female";
			break;
		case 'o':
			return "Other";
			break;		
	}
}

?>