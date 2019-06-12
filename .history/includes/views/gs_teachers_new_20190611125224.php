<?php 
$student = '';
if(isset($_GET['gaction']) &&  $_GET['gaction']== 'edit' && $_GET['teacher_id'] !=0)
{
    global $wpdb;
    $id = $_GET['teacher_id'];
    $sql = "SELECT * FROM {$wpdb->prefix}gs_teacher WHERE teacher_id=".$id;
    $student = $wpdb->get_row( $sql);
}

?>
<div class="wrap">
    <h1 class="wp-heading-inline">Create new Teacher</h1>
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <div id="post-body-content">
                <div class="meta-box-sortables ui-sortable">
                <form method="post" name="createuser" id="gs_create_teachers_form" class="validate" novalidate="novalidate">
                <input name="action_create_teacher" type="hidden" value="<?php if(isset($teacher->teacher_id)) { ?>edituser<?php }else{ ?>createuser<?php } ?>">
                <table class="form-table">
                    <tbody><tr class="form-field form-required">
                    <input name="user_photo_id" id="user_photo_id" type="hidden" >
                    <input name="user_photo_url" id="user_photo_url" type="hidden" >
                        <th scope="row"><label for="first_name">First name <span class="description">(required)</span></label></th>
                        <td><input name="first_name" type="text" id="first_name" value="" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60"></td>
                    </tr>
                    <tr class="form-field form-required">
                        <th scope="row"><label for="last_name">Last name <span class="description">(required)</span></label></th>
                        <td><input name="last_name" type="text" id="last_name" value="" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60"></td>
                    </tr>
                    <tr class="form-field form-required">
                        <th scope="row"><label for="gender">Gender<span class="description">(required)</span></label></th>
                        <td>
                        <select name="gender">  
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="o">Other</option>
                        </select>
                        </td>
                    </tr>
                    <tr class="form-field form-required">
                        <th scope="row"><label for="gender">DOB <span class="description">(Date of birth)</span></label></th>
                        <td><input type="date" name="dob" /></td>
                    </tr>
                    <tr class="form-field form-required">
                        <th scope="row"><label for="email">Email <span class="description">(required)</span></label></th>
                        <td><input name="email" type="email" id="email" value=""></td>
                    </tr>
                    <tr class="form-field form-required">
                        <th scope="row"><label for="phone">Phone <span class="description">(required)</span></label></th>
                        <td><input name="phone" type="text" id="phone" value="" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="15"></td>
                    </tr>
                    <tr class="form-field">
                        <th scope="row"><label for="phone">Upload photo</label></th>
                        <td>
                        <?php 
                            $meta_key = 'teacher_featured_img';
                            echo gs_image_uploader_field( $meta_key, get_post_meta(time(), $meta_key, true) );
                            ?>
                        </td>
                    </tr>
                    </tbody>
                    </table>
                <p class="submit">
                <input type="submit" name="createuser" id="createusersub" class="button button-primary" value="Add New teacher"></p>
                </form>
                </div>
            </div>
        </div>
        <br class="clear">
    </div>
</div> 
