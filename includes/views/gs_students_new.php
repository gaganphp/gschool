<?php 
$student = '';
if(isset($_GET['gaction']) &&  $_GET['gaction']== 'edit' && $_GET['student_id'] !=0)
{
    global $wpdb;
    $id = $_GET['student_id'];
    $sql = "SELECT * FROM {$wpdb->prefix}gs_students WHERE student_id=".$id;
    $student = $wpdb->get_row( $sql);
}

?>
<div class="wrap">
    <h1 class="wp-heading-inline">Create new student</h1>
    <a href="<?php echo site_url();?>/wp-admin/admin.php?page=gschool_students" class="page-title-action">View all</a>
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <div id="post-body-content">
                <div class="meta-box-sortables ui-sortable">
                <form method="post" name="createuser" id="gs_create_students_form" class="validate" novalidate="novalidate">
                <input name="action_create_student" type="hidden" value="createuser">
                <input name="user_photo_id" id="user_photo_id" type="hidden" >
                <input name="user_photo_url" id="user_photo_url" type="hidden" >
                <table class="form-table">
                    <tbody><tr class="form-field form-required">
                        <th scope="row"><label for="first_name">First name <span class="description">(required)</span></label></th>
                        <td><input name="first_name" type="text" id="first_name" value="<?php echo !empty($student->first_name) ? $student->first_name:'';?>" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60"></td>
                    </tr>
                    <tr class="form-field form-required">
                        <th scope="row"><label for="last_name">Last name <span class="description">(required)</span></label></th>
                        <td><input name="last_name" type="text" id="last_name" value="<?php echo !empty($student->last_name) ? $student->last_name:'';?>" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60"></td>
                    </tr>
                    <tr class="form-field form-required">
                        <th scope="row"><label for="gender">Gender<span class="description">(required)</span></label></th>
                        <td>
                        <select name="gender">  
                            <option value="m" <?php if(isset($student->gender) && $student->gender == 'm') {?> selected <?php } ?> >Male</option>
                            <option <?php if(isset($student->gender) && $student->gender == 'f') {?> selected <?php } ?> value="f">Female</option>
                            <option <?php if(isset($student->gender) && $student->gender == 'o') {?> selected <?php } ?> value="o">Other</option>
                        </select>
                        </td>
                    </tr>
                    <tr class="form-field form-required">
                        <th scope="row"><label for="gender">DOB <span class="description">(Date of birth)</span></label></th>
                        <td><input type="date" name="dob" value="<?php echo !empty($student->dob) ? $student->dob:'';?>" /></td>
                    </tr>
                    <tr class="form-field form-required">
                        <th scope="row"><label for="email">Email <span class="description">(required)</span></label></th>
                        <td><input name="email" type="email" id="email" value="<?php echo !empty($student->email) ? $student->email:'';?>"></td>
                    </tr>
                    <tr class="form-field form-required">
                        <th scope="row"><label for="phone">Phone <span class="description">(required)</span></label></th>
                        <td><input name="phone" type="text" id="phone" value="<?php echo !empty($student->phone) ? $student->phone:'';?>" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="15"></td>
                    </tr>
                    <tr class="form-field">
                        <th scope="row"><label for="phone">Upload photo</label></th>
                        <td>
                        <?php 
                            $meta_key = 'student_featured_img';
                            echo gs_image_uploader_field( $meta_key, get_post_meta(1, $meta_key, true) );                    
                            if(isset($student->url) && !empty($student->url))
                            {
                            ?>
                            <img src="<?php echo !empty($student->url) ? $student->url:'';?>" width="80" height="80">
                            <?php } ?>
                        </td>
                    </tr>
                    </tbody>
                    </table>
                <p class="submit">
                <input type="submit" name="createuser" id="createusersub" class="button button-primary" value="Add New Student"></p>
                </form>
                </div>
            </div>
        </div>
        <br class="clear">
    </div>
</div> 