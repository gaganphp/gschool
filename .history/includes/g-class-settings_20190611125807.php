<?php
require('g-class-students.php');
require('class/g-class-teachers.php');
class GSettings {
	
	public $students_obj;

	function __construct()
	{
		add_action( 'admin_menu', array( $this, 'g_admin_menu' ), 9 );
	}

	function g_admin_menu() {
	    add_menu_page(
	        __( 'G School', 'gschool' ),
	        __( 'G School', 'gschool' ),
	        'manage_options',
	        'gschool_dashboard',
	        array( $this, 'g_dashboard_func' ),
	        'dashicons-chart-bar'
		);
		add_submenu_page('gschool_dashboard', __('Manage Students'), __('Manage Students'), 'edit_themes', 'gschool_students', array( $this, 'gschool_students_render' ));
		add_submenu_page('gschool_dashboard', __('Manage Teachers'), __('Manage Teachers'), 'edit_themes', 'gschool_teachers', array($this,'gschool_teachers_render'));
		add_submenu_page('gschool_dashboard', __('Manage Attendance'), __('Manage Attendance'), 'edit_themes', 'gschool_attendance', 'gschool_attendance_render');
		add_submenu_page('gschool_dashboard', __('Manage Fee'), __('Manage Fee'), 'edit_themes', 'gschool_fee', 'gschool_fee_render');
		add_submenu_page('gschool_dashboard', __('Manage Timetable'), __('Manage Timetable'), 'edit_themes', 'gschool_timetable', 'gschool_timetable_render');
		add_submenu_page('gschool_dashboard', __('Manage Syllabus'), __('Manage Syllabus'), 'edit_themes', 'gschool_syllabus', 'gschool_syllabus_render');
		add_submenu_page('gschool_dashboard', __('Manage Classes'), __('Manage Classes'), 'edit_themes', 'gschool_classes', 'gschool_classes_render');
		add_submenu_page('gschool_dashboard', __('Manage Result'), __('Manage Result'), 'edit_themes', 'gschool_result', 'gschool_result_render');
		$this->students_obj = new Students_List();
		$this->teachers_obj = new Teachers_List();
	}

	public function gschool_students_render()
	{

		if(isset($_GET['gaction']) && !empty($_GET['gaction']))
		{
			$gaction = $_GET['gaction'];
		}
		else
		{
			$gaction = 'dashboard';
		}
		
		if(isset($_POST['action_create_student']) && $_POST['action_create_student']=='createuser')
			{
				$data = [];
				$data['first_name'] = isset($_POST['first_name']) ? sanitize_text_field($_POST['first_name']):'';
				$data['last_name'] = isset($_POST['last_name']) ? sanitize_text_field($_POST['last_name']):'';
				$data['gender'] = isset($_POST['gender']) ? sanitize_text_field($_POST['gender']):'';
				$data['dob'] = isset($_POST['dob']) ? sanitize_text_field($_POST['dob']):'';
				$data['email'] = isset($_POST['email']) ? sanitize_email($_POST['email']):'';
				$data['phone'] = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']):'';
				$data['photo'] = isset($_POST['user_photo_id']) ? sanitize_text_field($_POST['user_photo_id']):'';
				$data['createddate'] = current_time('mysql');
				$data['updateddate'] = current_time('mysql');
				$data['url'] = isset($_POST['user_photo_url']) ? sanitize_text_field($_POST['user_photo_url']):'';
				Students_List::create_students($data);  
				echo gs_success(); 
				wp_redirect( admin_url( '/admin.php?page=gschool_students' ), 301 );
				exit;
			}

			if(isset($_POST['action_create_student']) && $_POST['action_create_student']=='edituser')
			{
				$data = [];
				$data['first_name'] = isset($_POST['first_name']) ? sanitize_text_field($_POST['first_name']):'';

				$data['student_id'] = isset($_POST['student_id']) ? sanitize_text_field($_POST['student_id']):'';				$data['last_name'] = isset($_POST['last_name']) ? sanitize_text_field($_POST['last_name']):'';
				$data['gender'] = isset($_POST['gender']) ? sanitize_text_field($_POST['gender']):'';
				$data['dob'] = isset($_POST['dob']) ? sanitize_text_field($_POST['dob']):'';
				$data['email'] = isset($_POST['email']) ? sanitize_email($_POST['email']):'';
				$data['phone'] = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']):'';
				$data['photo'] = isset($_POST['user_photo_id']) ? sanitize_text_field($_POST['user_photo_id']):'';
				$data['createddate'] = current_time('mysql');
				$data['updateddate'] = current_time('mysql');
				$data['url'] = isset($_POST['user_photo_url']) ? sanitize_text_field($_POST['user_photo_url']):'';
				Students_List::update_students($data);  
				echo gs_success(); 
				wp_redirect( admin_url( '/admin.php?page=gschool_students' ), 301 );
				exit;
			}	

			

		switch ($gaction) {
			case 'dashboard':
				require("views/gs_students_list.php");
				break;
			case 'new':
				include("views/gs_students_new.php");
				break;
			case 'edit':
				include("views/gs_students_new.php");
				break;		
		}
	}


	public function gschool_teachers_render()
	{

		if(isset($_GET['gaction']) && !empty($_GET['gaction']))
		{
			$gaction = $_GET['gaction'];
		}
		else
		{
			$gaction = 'dashboard';
		}

		if(isset($_POST['action_create_teacher']) && $_POST['action_create_teacher']=='createuser')
		{
			$data = [];
			$data['first_name'] = isset($_POST['first_name']) ? sanitize_text_field($_POST['first_name']):'';
			$data['last_name'] = isset($_POST['last_name']) ? sanitize_text_field($_POST['last_name']):'';
			$data['gender'] = isset($_POST['gender']) ? sanitize_text_field($_POST['gender']):'';
			$data['dob'] = isset($_POST['dob']) ? sanitize_text_field($_POST['dob']):'';
			$data['email'] = isset($_POST['email']) ? sanitize_email($_POST['email']):'';
			$data['phone'] = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']):'';
			$data['photo'] = isset($_POST['user_photo_id']) ? sanitize_text_field($_POST['user_photo_id']):'';
			$data['createddate'] = current_time('mysql');
			$data['updateddate'] = current_time('mysql');
			$data['url'] = isset($_POST['user_photo_url']) ? sanitize_text_field($_POST['user_photo_url']):'';
			print_r($data); die;
			Teachers_List::create_teacher($data);  
			echo gs_success(); 
			wp_redirect( admin_url( '/admin.php?page=gschool_teachers' ), 301 );
			exit;
		}

		switch ($gaction) {
			case 'dashboard':
				require("views/gs_teachers_list.php");
				break;
			case 'new':
				require("views/gs_teachers_new.php");
				break;	
		}
	}


	public function g_dashboard_func()
	{ 
	?>
		<div class="wrap">
			<h2>WP_List_Table Class Example</h2>
			<div id="poststuff">
				<div id="post-body" class="metabox-holder columns-2">
					<div id="post-body-content">
						<div class="meta-box-sortables ui-sortable">
							<form method="post">
								<?php
								$this->students_obj->prepare_items();
								$this->students_obj->display(); ?>
							</form>
						</div>
					</div>
				</div>
				<br class="clear">
			</div>
		</div>
	<?php
	}


	function fc_set_option($option_name,$new_value)
	{
		if ( get_option( $option_name ) !== false ) { 
		    update_option( $option_name, $new_value );
		} else {
		    $deprecated = null;
		    $autoload = 'no';
		    add_option( $option_name, $new_value, $deprecated, $autoload );
		}
	}

	public function fc_get_option($option_name)
	{
		if( get_option( $option_name ) !== false ){
		    return get_option( $option_name );
		}
		else
		{
			return '';
		} 
	}
 } 
 ?>