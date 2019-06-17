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

function gs_success()
{
	return '<div class="notice notice-success is-dismissible">
		<p>Done!</p>
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

/* draws a calendar */
function draw_calendar($month,$year,$day){
    
		/* draw table */
		$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
	
		/* table headings */
		$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
		$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
	
		/* days and weeks vars now ... */
		$running_day = date('w',mktime(0,0,0,$month,1,$year));
		$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
		$days_in_this_week = 1;
		$day_counter = 0;
		$dates_array = array();
	
		/* row for week one */
		$calendar.= '<tr class="calendar-row">';
	
		/* print "blank" days until the first of the current week */
		for($x = 0; $x < $running_day; $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
			$days_in_this_week++;
		endfor;
	
		/* keep going with days.... */
		for($list_day = 1; $list_day <= $days_in_month; $list_day++):
			
			$bgColor = ($list_day == $day) ? '#c5e1f1' : '';
			$disabledClasss = ($list_day > $day) ? 'disabled' : '';
			$disabledOpacity = ($list_day > $day) ? '0.2' : '';
			
			$calendar.= '<td class="calendar-day" style="background-color:'.$bgColor.';opacity:'.$disabledOpacity.'">';
				/* add in the day number */
				$calendar.= '<div class="day-number">'.$list_day.'</div><a href="#TB_inline?&width=600&height=550&inlineId=my-content-id" class="thickbox view_attendance '.$disabledClasss.'" data-month="'.ltrim($month,'0').'" data-day="'.$list_day.'" data-year="'.$year.'" >Mark attendance</a>';
	
				/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
				$calendar.= str_repeat('<p> </p>',2);
				
			$calendar.= '</td>';
			if($running_day == 6):
				$calendar.= '</tr>';
				if(($day_counter+1) != $days_in_month):
					$calendar.= '<tr class="calendar-row">';
				endif;
				$running_day = -1;
				$days_in_this_week = 0;
			endif;
			$days_in_this_week++; $running_day++; $day_counter++;
		endfor;
	
		/* finish the rest of the days in the week */
		if($days_in_this_week < 8):
			for($x = 1; $x <= (8 - $days_in_this_week); $x++):
				$calendar.= '<td class="calendar-day-np"> </td>';
			endfor;
		endif;
	
		/* final row */
		$calendar.= '</tr>';
	
		/* end the table */
		$calendar.= '</table>';
		
		/* all done, return result */
		return $calendar;
}


// load students list
add_action( 'wp_ajax_get_students_list', 'get_students_list_func' );
add_action( 'wp_ajax_nopriv_get_students_list', 'get_students_list_func' );
function get_students_list_func() {
	global $wpdb;
	$sql = "SELECT * FROM {$wpdb->prefix}gs_students";
	$result = $wpdb->get_results( $sql, 'ARRAY_A' );
	return $result;
	wp_die();
}

?>