<div class="wrap">
    <h1 class="wp-heading-inline">Mark Attendance</h1>
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <div id="post-body-content">
                <div class="meta-box-sortables ui-sortable">

                <?php 
                $month = isset($_POST['month']) ? $_POST['month']: date('m');
                $year = date('Y');
                ?> 
                <form method="post" name="createuser" id="gs_create_teacher_form" class="validate" novalidate="novalidate">
                        <table class="form-table">
                            <tbody>
                            <tr class="form-field form-required">
                                <td>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                </td>
                                <td>
                                  <label>Select Date:</label>  
                                <select class="form-control select" name="month" onchange="this.form.submit()" >
                                    <option>Month</option>
                                    <option <?php if(1 == $month) { ?> selected <?php } ?> value="1">Jan</option>
                                    <option <?php if(2 == $month) { ?> selected <?php } ?> value="2">Feb</option>
                                    <option <?php if(3 == $month) { ?> selected <?php } ?> value="3">Mar</option>
                                    <option <?php if(4 == $month) { ?> selected <?php } ?> value="4">Apr</option>
                                    <option <?php if(5 == $month) { ?> selected <?php } ?> value="5">May</option>
                                    <option <?php if(6 == $month) { ?> selected <?php } ?> value="6">Jun</option>
                                    <option <?php if(7 == $month) { ?> selected <?php } ?> value="7">Jul</option>
                                    <option <?php if(8 == $month) { ?> selected <?php } ?> value="8">Aug</option>
                                    <option <?php if(9 == $month) { ?> selected <?php } ?> value="9">Sep</option>
                                    <option <?php if(10 == $month) { ?> selected <?php } ?> value="10">Oct</option>
                                    <option <?php if(11 == $month) { ?> selected <?php } ?> value="11">Nov</option>
                                    <option <?php if(12 == $month) { ?> selected <?php } ?> value="12">Dec</option>                    
                                </select>
                                <select class="form-control select" name="year" onchange="this.form.submit()">
                                    <option>Year</option>
                                    <?php for($i=date('Y');$i<=date('Y')+50;$i++) { ?>
                                    <option <?php if($i == $year) { ?> selected <?php } ?> value="<?php echo $i;?>"><?php echo $i;?></option>          
                                    <?php } ?>
                                </select>
                                </td>
                            </tr>
                            </tbody>
                            </table>
                        </form> 
                    <?php echo draw_calendar($month,$year,10);?>              
                    <?php add_thickbox(); ?>
                <div id="my-content-id" style="display:none;">
                    <p>This is box
                    </p>
                </div>
                <a href="#TB_inline?&width=600&height=550&inlineId=my-content-id" class="thickbox">View my inline content!</a>	  
                </div>
            </div>
        </div>
        <br class="clear">
    </div>
</div> 