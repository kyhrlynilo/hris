<?php  
$emp_detail = "";
foreach($employee as $emp)
{
    $emp_detail = $emp; 
}
$days = array('SAT','MON','TUE','WED','THU','FRI','SAT');
?>

<div class="fixed-action-btn">
    <a id="add" class="btn-floating btn-large waves-effect blue" href="<?php echo base_url(); ?>admin_time_keeping/time_schedule_add/<?php echo $emp_detail->emp_id; ?>">
        <i class="material-icons white-text ">add</i>
    </a>        
</div>

<div class="row">
    <div class="card row" style="margin-bottom: 0;">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s11">
                    <a href="<?php echo base_url(); ?>admin_time_keeping" class="breadcrumb">Time Keeping</a>
                    <a href="<?php echo base_url(); ?>admin_time_keeping/view_employees" class="breadcrumb">Employees</a>
                    <a href="<?php echo base_url(); ?>admin_time_keeping/employee_profile/<?php echo $emp_detail->emp_id; ?>" class="breadcrumb"><?php echo $emp_detail->last_name.", ".$emp_detail->first_name ." " .$emp_detail->mid_name;; ?></a>
                    <a href="#" class="breadcrumb">Official Time Schedule</a>
                </div>    
            </div>
        </nav>
    </div>

    <div class="col s12 card" style="padding: 20px;">        
        <div class="row">
            <h5>Official Time Schedule</h5>
        </div>
        <table id="table_data" class="striped bordered blue">
            <thead>
                <tr class="white-text">
                    <th>Type</th>
                    <th>Effective On</th>
                    <th>Effective Until</th>
                    <th>Days</th>
                    <th>Time Start</th>
                    <th>Time End</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($schedule as $data): ?>
                    <tr>
                        <td><?php echo $data->type; ?></td>
                        <td><?php echo $data->effective_on; ?></td>
                        <td><?php echo $data->effective_until; ?></td>
                        <td>
                            <?php 
                            $sched_days = explode(",",$data->days); 
                            foreach($sched_days as $key => $value):
                                echo $key < count($sched_days) - 1 ? $days[$value] .", " : $days[$value] ;
                            endforeach; 
                            ?>                                
                        </td>
                        <td><?php echo $data->time_start; ?></td>
                        <td><?php echo $data->time_end; ?></td>
                        <td><?php echo $data->date_created; #echo "<b>(" .time_elapsed_string($data->date_created) .")</b>"; ?></td>
                        <td>
                            <a href="<?php echo base_url(); ?>admin_time_keeping/time_schedule_edit/<?php echo $emp_detail->emp_id; ?>/<?php echo $data->id; ?>" class="btn tooltipped blue lighten-1" data-position="bottom" data-delay="50" data-tooltip="Edit">
                                <i class="material-icons">create</i>    
                            </a>
                            <a href="#delete<?php echo $data->id; ?>" class="btn tooltipped blue lighten-1 modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Delete" >
                                <i class="material-icons">delete</i>    
                            </a>
                        </td>
                    </tr>
                    <!-- Modal Structure -->
                    <div id="delete<?php echo $data->id; ?>" class="modal">
                        <div class="modal-content">
                            <h4>Are you sure?</h4>
                            <p>
                                You want to delete <?php echo $data->type ; ?>'s records?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="delete_data(id);" id="<?php echo $data->id; ?>" class="btn waves-effect waves-light green">  
                                Yes
                            </button>
                            <button type="button" href="#!" class="white-text orange modal-action modal-close waves-effect waves-red btn-flat ">No</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<script type="text/javascript">

    $(document).ready(function(){
        $('#table_data').DataTable();
        $('select').material_select();
        $('.tap-target').tapTarget('open');
        $('.modal').modal();
    });

    /**
    * delete
    */
    function delete_data(id)
    {
        button_loader(id,1);
        $.post("<?php echo base_url() ?>admin_time_keeping/delete_time_schedule/"+id,
            function(data){     
                $('#delete'+id).modal('close');                     
                button_loader(id,0);
                notify(data, base_url + "admin_time_keeping/time_schedule/<?php echo $emp_detail->emp_id; ?>");
            });
    }
</script>

<script type="text/javascript">
    $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
});

    $(document).ready(function() {
        $('select').material_select();
    });

    $('.timepicker').pickatime({
    default: 'now', // Set default time: 'now', '1:30AM', '16:30'
    fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
    twelvehour: false, // Use AM/PM or 24-hour format
    donetext: 'OK', // text for done-button
    cleartext: 'Clear', // text for clear-button
    canceltext: 'Cancel', // Text for cancel-button
    autoclose: false, // automatic close timepicker
    ampmclickable: true, // make AM PM clickable
    aftershow: function(){} //Function for after opening timepicker
});

    $(document).ready(function(){
        $('.tooltipped').tooltip({delay: 50});
    });
</script>

<?php 

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

 ?>