<script type="text/javascript">
    $('#admin_time_keeping').addClass('active');
</script>

<style type="text/css">

.modal { width: 20% !important ; height: 30% !important ; } 
</style>


    <div class="fixed-action-btn">
        <a id="add" class="btn-floating btn-large waves-effect blue" href="<?php echo base_url(); ?>admin_time_keeping/add_employee">
            <i class="material-icons white-text ">add</i>
        </a>        
    </div>


<!-- Tap Target Structure -->
<!-- <div class="tap-target blue" data-activates="add">
<div class="tap-target-content white-text">
<h5>Hello Admin!</h5>
<p>Click here to add an employee</p>
</div>
</div> -->

<div class="row">
    <nav>
        <div class="nav-wrapper blue" style="margin-top: 10px;">
            <ul class="left hide-on-med-and-down">
                <li><a href="<?php echo base_url(); ?>Admin_time_keeping">Time Keeping</a></li>
                <li class="active"><a href="<?php echo base_url(); ?>Admin_time_keeping/view_employees">Employees</a></li>
                <li><a href="<?php echo base_url(); ?>Admin_time_keeping/reports">Reports</a></li>
                <li><a href="<?php echo base_url(); ?>Admin_time_keeping/others">Others</a></li>
            </ul>            
        </div>
    </nav>

<!-- <div class=" row" style="margin-bottom: 0;">
<a  href="<?php echo base_url(); ?>admin_time_keeping" class="breadcrumb">Time Keeping</a>
<a  href="<?php echo base_url(); ?>admin_time_keeping" class="breadcrumb">Employees</a> s
</div> -->

<div class="col s12 card pad-lg">
    <div class="row">
        <h5>Employees</h5>
    </div>
    <table id="table_employees" class=" table striped highlight blue" >
        <thead>
            <tr class=" white-text">
                <th>Department</th>
                <th>Name</th>
                <th>Status</th>                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if($fetch_data->num_rows()>0){
                foreach ($fetch_data->result() as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row->department; ?></td>
                        <td><?php echo $row->last_name." ".$row->first_name.", " .$row->mid_name?></td>
                        <td><?php echo $row->emp_status; ?></td>
                        <td>
                            <a href="<?php echo base_url(); ?>Admin_time_keeping/dtr/<?php echo $row->emp_id; ?>" class="btn tooltipped blue lighten-1" data-position="bottom" data-delay="50" data-tooltip="Daily Time Records">
                                <i class="material-icons">assignment</i>
                            </a>
                            <a href="<?php echo base_url(); ?>Admin_time_keeping/time_schedule/<?php echo $row->emp_id; ?>" class="btn tooltipped blue lighten-1" data-position="bottom" data-delay="50" data-tooltip="Time Schedule">
                                <i class="material-icons">access_time</i>
                            </a>

                            <a href="<?php echo base_url(); ?>Admin_time_keeping/employee_profile/<?php echo $row->emp_id; ?>" class="btn tooltipped blue  lighten-1" data-position="bottom" data-delay="50" data-tooltip="View">
                                <i class="material-icons">remove_red_eye</i>
                            </a>
                            
                            <a href="<?php echo base_url(); ?>Admin_time_keeping/edit_employee/<?php echo $row->emp_id; ?>" class="btn tooltipped blue  lighten-1" data-position="bottom" data-delay="50" data-tooltip="Edit">
                                <i class="material-icons">create</i>
                            </a>

                            <a onclick="confirm_delete('<?php echo $row->last_name." ".$row->first_name.", " .$row->mid_name?>','<?php echo $row->emp_id; ?>');" class="btn blue  lighten-1 modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Delete">
                                <i class="material-icons">delete</i>
                            </a>
                            <a id="main_delete<?php echo $row->emp_id; ?>" style="display: none;" href="<?php echo base_url(); ?>Admin_time_keeping/delete_employee/<?php echo $row->emp_id; ?>" class="btn orange darken-2 modal-trigger" >Delete</a>
                            <!--  <a href="#delete<?php echo $row->emp_id; ?>" class="btn orange darken-2 modal-trigger" >Delete</a> -->
                        </td>

                    </tr>


                    <?php
                }
            }else{
                ?>
                <tr>
                    <td colspan="3">No data found</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

</div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#table_employees').DataTable();
        $('select').material_select();
        $('.tap-target').tapTarget('open');
        $('.modal').modal();        
    });

    function confirm_delete(name,id)
    {
        swal({
            title : "Are you sure?",
            text  : "You want to delete " +name +"?",
            icon: "warning",
            buttons: ['No','Yes'],
            dangerMode: true
        }).then((willDelete)=>{
            if(willDelete) {
                    swal({
                        title : "Success!",
                        text  :  name +"'s record has been deleted.",
                        icon: "success",                        
                    }).then( ( value ) => { window.location.href = '<?php echo base_url(); ?>Admin_time_keeping/delete_employee/' +id; });
                    
                } else {
                    swal({title:"Cancelled",text:"Deleting of employee cancelled."});
                }
            }
        );
    }

/**
* delete
*/
/* 
ayaw mag refresh
function delete_emp(id)
{
button_loader(id,1);
$.post("<?php echo base_url() ?>Admin_time_keeping/delete_employee/"+id,
function(data){   
$('#delete'+id).modal('close');           
button_loader(id,0);
notify(data, base_url + "admin_time_keeping");
});
}*/
</script>
