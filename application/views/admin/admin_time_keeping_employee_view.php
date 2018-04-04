<?php 
$details = array();
foreach($user_data as $row)
{
    $details = $row;
}

?>
<div class="row">

    <div class="card row" style="margin-bottom: 0;">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s11">
                    <a href="<?php echo base_url(); ?>admin_time_keeping" class="breadcrumb">Time Keeping</a>
                    <a href="<?php echo base_url(); ?>admin_time_keeping/view_employees" class="breadcrumb">Employees</a>
                    <a href="#" class="breadcrumb"><?php echo $details->last_name.", ".$details->first_name ." " .$details->mid_name;; ?></a>
                </div>    
            </div>
        </nav>
    </div>

    <div class="col s12 card pad-lg">
        <div class="row">
            <h5>Employee Profile</h5>
        </div>
       
        <input type="hidden" id="hidden_id" name="hidden_id" value="<?php echo $details->id; ?>"> 
        <br/>
        <div class="row">
            <div class="col s3">
                Employee ID:
            </div>
            <div class="col s3">
                <b><?php echo $details->emp_id;?></b>
            </div>
        </div>


        <div class="row">
            <div class="col s3">
                Last Name:
            </div>
            <div class="col s3">
                <b><?php echo $details->last_name;?></b>
            </div>
        </div>
        <div class="row">
            <div class="col s3">
                First Name:
            </div>
            <div class="col s3">
                <b><?php echo $details->first_name;?></b>
            </div>
        </div>
        <div class="row">
            <div class="col s3">
                Middle Name:
            </div>
            <div class="col s3">
                <b><?php echo $details->mid_name;?></b>
            </div>
        </div> 
        <hr>

        <div class="row">
            <div class="col s3">
                Birth Date:
            </div>
            <div class="col s3">
                <b><?php echo $details->birth_date;?></b>
            </div>
            <div class="col s3">
                Birth Place:
            </div>
            <div class="col s3">
                <b><?php echo $details->birth_place;?></b>
            </div>
        </div> 

        <div class="row">
            <div class="col s3">
                Gender:
            </div>
            <div class="col s3">
                <b><?php echo $details->gender;?></b>
            </div>
            <div class="col s3">
                Civil Status:
            </div>
            <div class="col s3">
                <b><?php echo $details->civil_status;?></b>
            </div>
        </div> 


        <div class="row">
            <div class="col s3">
                Citizenship:
            </div>
            <div class="col s3">
                <b><?php echo $details->citizenship;?></b>
            </div>
            <div class="col s3">
                Citizenship Type:
            </div>
            <div class="col s3">
                <b><?php echo $details->citizenship_type;?></b>
            </div>
        </div> 

        <div class="row">
            <div class="col s3">
                Residential Address:
            </div>
            <div class="col s6">
                <b><?php echo $details->address;?></b>
            </div>
        </div> 


        <div class="row">
            <div class="col s3">
                Email Address:
            </div>
            <div class="col s3">
                <b><?php echo $details->email_address;?></b>
            </div>
            <div class="col s3">
                Cellphone Number:
            </div>
            <div class="col s3">
                <b><?php echo $details->cellphone_number;?></b>
            </div>
        </div> 

        <div class="row">
            <div class="col s3">
                Department:
            </div>
            <div class="col s3">
                <b><?php echo $details->department;?></b>
            </div>
        </div>


        <div class="row">
            <div class="col s3">
                Employment Type:
            </div>
            <div class="col s3">
                <b><?php echo $details->emp_status;?></b>
            </div>
            <div class="col s3">
                Employment Status:
            </div>
            <div class="col s3">
                <b><?php echo $details->emp_type;?></b>
            </div>
        </div> 

    </div>
</div>
