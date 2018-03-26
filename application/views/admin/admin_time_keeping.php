<script type="text/javascript">
    $('#admin_time_keeping').addClass('active');
</script>

<style type="text/css">

.modal { width: 20% !important ; height: 30% !important ; } 
</style>

<!-- Tap Target Structure -->
<!-- <div class="tap-target blue" data-activates="add">
<div class="tap-target-content white-text">
<h5>Hello Admin!</h5>
<p>Click here to add an employee</p>
</div>
</div> -->

<div class="fixed-action-btn">
    <a id="add" class="btn-floating btn-large waves-effect blue" href="<?php echo base_url(); ?>admin_time_keeping/add_employee">
        <i class="material-icons white-text ">add</i>
    </a>        
</div>

<div class="row">
    <nav>
        <div class="nav-wrapper blue">
            <ul class="left hide-on-med-and-down">
                <li class="active"><a href="<?php echo base_url(); ?>Admin_time_keeping">Time Keeping</a></li>
                <li><a href="<?php echo base_url(); ?>Admin_time_keeping/view_employees">Employees</a></li>
                <li><a href="#">Others</a></li>
            </ul>            
        </div>
    </nav>


    <div class="col s12 card pad-lg">

        WORK IN PROGRESS

    </div>

</div>


