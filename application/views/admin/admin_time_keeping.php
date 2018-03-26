<script type="text/javascript">
  $('#admin_time_keeping').addClass('active');
</script>

<style type="text/css">
  
.modal { width: 20% !important ; height: 30% !important ; } 
</style>

<!-- Tap Target Structure -->
<div class="tap-target blue" data-activates="add">
  <div class="tap-target-content white-text">
    <h5>Hello Admin!</h5>
    <p>Click here to add an employee</p>
  </div>
</div>

<div class="fixed-action-btn">
  <a id="add" class="btn-floating btn-large waves-effect blue" href="<?php echo base_url(); ?>admin_time_keeping/add_employee">
    <i class="material-icons white-text ">add</i>
  </a>        
</div>

<div class="row">
  <div class="card row" style="margin-bottom: 0;">
    <nav>
      <div class="nav-wrapper blue">
        <div class="col s11">
          <a href="<?php echo base_url(); ?>admin_time_keeping" class="breadcrumb">Time Keeping</a>
        </div>    
      </div>
    </nav>
  </div>

  <div class="col s12 card pad-lg">
    <table id="table_employees" class=" table striped highlight" >
      <thead>
        <tr>
          <th>Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Name</th>
          <th></th>
        </tr>
      </tfoot>
      <tbody>
        <?php 
          if($fetch_data->num_rows()>0){
            foreach ($fetch_data->result() as $row) {
              ?>
                <tr>
                  <td><?php echo $row->last_name." ".$row->first_name.", " .$row->mid_name?></td>
                  <td><a href="<?php echo base_url(); ?>Admin_time_keeping/employee_profile/<?php echo $row->id; ?>" class="btn blue darken-2">View</a>
                    <!--  -->
                  <a href="<?php echo base_url(); ?>Admin_time_keeping/edit_employee/<?php echo $row->id; ?>" class="btn green darken-2">Edit</a>
                  <!-- <?php echo base_url(); ?>Admin_time_keeping/edit_employee/<?php echo $employee->id; ?> -->
                  <a href="<?php echo base_url(); ?>Admin_time_keeping/delete_employee/<?php echo $row->id; ?>" class="btn orange darken-2 modal-trigger">Delete</a>
                  <!--#delete<?php echo $row->id; ?>  -->
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
