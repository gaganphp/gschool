<?php
global $wpdb;

class Gdatabase {

	protected $wpdb;

	function __construct() {
		global $wpdb;
		$this->wpdb =& $wpdb;
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    }
	
	public function create()
	{	
		$this->create_student_table();
		$this->create_teacher_table();
	}

	public function drop()
	{
		$this->drop_student_table();
		$this->drop_teacher_table();
	}

	public function create_student_table()
	{
		
		$charset_collate = $this->wpdb->get_charset_collate();
		$student_table = $this->wpdb->prefix . "gs_students"; 
		$sql_student = "CREATE TABLE $student_table (
		student_id mediumint(9) NOT NULL AUTO_INCREMENT,
		first_name tinytext NOT NULL,
		last_name tinytext NOT NULL,
		gender tinytext NOT NULL,
		dob tinytext NOT NULL,
		email tinytext NOT NULL,
		phone tinytext NOT NULL,
		photo text NOT NULL,
		createddate datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		updateddate datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		url text DEFAULT '' NOT NULL,
		PRIMARY KEY  (student_id)
		) $charset_collate;";
		dbDelta( $sql_student );
	}

	public function create_teacher_table()
	{
		
		$charset_collate = $this->wpdb->get_charset_collate();
		$teacher_table = $this->wpdb->prefix . "gs_teacher"; 
		$sql_teacher = "CREATE TABLE $teacher_table (
		teacher_id mediumint(9) NOT NULL AUTO_INCREMENT,
		first_name tinytext NOT NULL,
		last_name tinytext NOT NULL,
		gender tinytext NOT NULL,
		dob tinytext NOT NULL,
		email tinytext NOT NULL,
		phone tinytext NOT NULL,
		photo text NOT NULL,
		createddate datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		updateddate datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		url text DEFAULT '' NOT NULL,
		PRIMARY KEY  (teacher_id)
		) $charset_collate;";
		dbDelta( $sql_teacher );
	}


	public function drop_student_table()
	{
		$student_table = $this->wpdb->prefix . "gs_students"; 
		$sql_student = "DROP TABLE IF EXISTS $student_table ;";
		$this->wpdb->query($sql_student);
	}

	public function drop_teacher_table()
	{
		$table = $this->wpdb->prefix . "gs_teacher"; 
		$sql = "DROP TABLE IF EXISTS $table ;";
		$this->wpdb->query($sql);
	}
 } 
 ?>