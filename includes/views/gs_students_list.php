<div class="wrap">
    <h1 class="wp-heading-inline">Manage Students</h1>
    <a href="<?php echo site_url();?>/wp-admin/admin.php?page=gschool_students&gaction=new" class="page-title-action">Add New</a>
    <div id="poststuff">
        <div id="post-body" class="metabox-holder">
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
