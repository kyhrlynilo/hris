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
 <form method="post" id="admin_time_keeping_form" action="<?php echo base_url()?>Admin_time_keeping/form_validation">
      <?php 
          $details = array();
          foreach($user_data as $row)
          {
            $details = $row;
          }

       ?>
      <input type="hidden" id="hidden_id" name="hidden_id" value="<?php echo $details->id; ?>"> 

      <div class="row">
        <div class="col s4 offset-s8">
         <div class="input-field ">
          <input id="emp_id" name="emp_id" type="text" class="validate" value="<?php echo $details->emp_id;?>">
          <label for="emp_id">Employee ID</label>
        </div>
      </div>
    </div>

        <div class="row">
          <div class="col s4">
           <div class="input-field ">
            <input id="last_name" name="last_name" type="text" class="validate" value="<?php echo $details->last_name;?>">
            <label for="last_name">Last Name</label>
            <span class="text-danger"><?php echo form_error("last_name");?></span>
          </div>
        </div>

          <div class="col s4">
           <div class="input-field ">
            <input id="first_name" name="first_name" type="text" class="validate" value="<?php echo $details->first_name;?>" >
            <label for="first_name">First Name</label>
            <span class="text-danger"><?php echo form_error("first_name");?></span>
          </div>
        </div>

          <div class="col s4">
           <div class="input-field ">
            <input id="mid_name" name="mid_name" type="text" class="validate" value="<?php echo $details->mid_name;?>">
            <label for="mid_name">Middle Name</label>
            <span class="text-danger"><?php echo form_error("mid_name");?></span>
          </div>
        </div>
    </div>


      <div class="row">
           <div class="col s3">
         <div class="input-field ">
          <input id="birth_date" name="birth_date" type="text" class="datepicker" value="<?php echo $details->birth_date;?>">
          <label for="birth_date">Birth Date: <small>(mm/dd/yyyy)</small></label>
          <span class="text-danger"><?php echo form_error("birth_date");?></span>
        </div>
      </div>

        <div class="col s3">
         <div class="input-field ">
          <input id="birth_place" name="birth_place" type="text" class="validate" value="<?php echo $details->birth_place;?>">
          <label for="birth_place">Birth Place</label>
          <span class="text-danger"><?php echo form_error("birth_place");?></span>
        </div>
      </div>

        <div class="col s3">
         <p>Sex: </p>
         <p>
          <p>

            <input class="with-gap" name="gender" type="radio" id="cb_male"  value="Male" <?php echo $details->gender == "Male" ?  "checked" : ""; ?> />
            <label for="cb_male">Male</label>
            <input name="gender" type="radio" id="cb_female"  value="Female" <?php echo $details->gender == "Female" ?  "checked" : ""; ?>/>
            <label for="cb_female">Female</label>
          </p>
        </p>
      </div>

        <div class="col s3">
         <p>Civil Status:</p>
         <p>
          <p>
            <input class="with-gap" name="civil_status" type="radio" id="single" value="Single" <?php echo $details->civil_status == "Single" ?  "checked" : ""; ?>/>
            <label for="single">Single</label>
            <input name="civil_status" type="radio" id="married" value="Married" <?php echo $details->civil_status == "Married" ?  "checked" : ""; ?>/>
            <label for="married">Married</label>
          </p>
        </p>
      </div>

      </div>
        <div class="row">
          <div class="col s2">Citizenship:</div>
      <div class="col s4">
        <p>
          <?php $country = explode(",", $details->citizenship ); $country_name = isset($country[1]) ? $country[1] : ""; ?>

          <input name="citizenship" type="radio" id="cb_fil" onchange="citizenship_checker();"  value="<?php echo PH; ?>"  <?php echo empty($country_name) ?  "checked" : ""; ?> />
          <label for="cb_fil">Filipino</label>
          &nbsp;&nbsp;
          <input name="citizenship" type="radio" id="cb_dual" onchange="citizenship_checker();" value="<?php echo DUAL; ?>"  <?php echo !empty($country_name) ?  "checked" : ""; ?> />
          <label for="cb_dual">Dual Citizenship</label>
        </p>
        <p>
          <p>
            <input class="with-gap" name="citizenship_type" type="radio" id="cb_birth" value="<?php echo BIRTH; ?>"  <?php echo $details->citizenship_type == BIRTH ?  "checked" : ""; ?> />
            <label for="cb_birth">By Birth</label>
          
            <input name="citizenship_type" type="radio" id="cb_natural"  value="<?php echo NATURALIZATION; ?>" <?php echo $details->citizenship_type == NATURALIZATION ?  "checked" : ""; ?> />
            <label for="cb_natural">Naturalization</label>
          </p>
        </p>
      </div>
      <div class="col s4 typetoggle">
        <div class="input-field">
          Country - <?php echo $country_name; ?>
          <select id="country" name="country">
            <option value="<?php echo $country_name; ?>" disabled selected>
              <?php echo $country_name; ?>
            </option>
          </select>
        </div>
      </div>
        </div>


      <div class="row">
          <div class="col s9">
            <div class="input-field">
              <input id="address" name="address" type="text" class="text" value="<?php echo $details->address;?>">
              <label for="address">Residential Address</label>
              <span class="text-danger"><?php echo form_error("address");?></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col s6">
            <div class="input-field">
              <input id="email_address" name="email_address" type="text" class="email" value="<?php echo $details->email_address;?>">
              <label for="email_address">Email Address:</label>
              <span class="text-danger"><?php echo form_error("email_address");?></span>
            </div>
          </div>

            <div class="col s3">
            <div class="input-field">
              <input id="cellphone_number" name="cellphone_number" type="text" class="text" value="<?php echo $details->cellphone_number;?>">
              <label for="cellphone_number">Cellphone No:</label>
              <span class="text-danger"><?php echo form_error("cellphone_number");?></span>
            </div>
          </div>
          <div class="col s3">
            <div class="input-field ">
              <input id="department" name="department" type="text" class="validate" value="<?php echo $details->department;?>">
              <label for="department">Department</label>
              <span class="text-danger"><?php echo form_error("department");?></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col s3">
            <label for="emp_status">Employment Status</label>
            <select name="emp_status" >
              <option value="<?php echo ES_R; ?>" <?php echo $details->emp_status == ES_R ?  "selected" : ""; ?> >Regular</option>
              <option value="<?php echo ES_C; ?>" <?php echo $details->emp_status == ES_C ?  "selected" : ""; ?> >Casual</option>
              <option value="<?php echo ES_PT; ?>" <?php echo $details->emp_status == ES_PT ?  "selected" : ""; ?> >Parttime</option>
              <option value="<?php echo ES_JO; ?>" <?php echo $details->emp_status == ES_JO ?  "selected" : ""; ?> >Job-order</option>
            </select>
          </div>
            <div class="col s3">
              <label for="emp_type">Employment Type</label>
              <select name="emp_type" >
              <option value="<?php echo ET_A; ?>" <?php echo $details->emp_type == ET_A ?  "selected" : ""; ?>>Admin</option>
              <option value="<?php echo ET_F; ?>" <?php echo $details->emp_type == ET_F ?  "selected" : ""; ?>>Faculty</option>
              <option value="<?php echo ET_SA; ?>" <?php echo $details->emp_type == ET_SA ?  "selected" : ""; ?>>Student Assistant</option>
            </select>
            </div>
        </div>

    </div>
  </div>

   

  <div class="card" style="padding-top: 8px;">
        <div class="col s12">
          <button type="submit" id="update" name="update" class="btn waves-effect waves-light green"> 
            Update
          </button>
          <a href="<?php echo base_url(); ?>Admin_time_keeping" type="button" class="btn waves-effect waves-light orange">       
            Cancel
          </a>
        </div>
      </div>
 </form>

<script type="text/javascript">

    $(document).ready(function(){
      populateCountries("country");
      $('select').material_select();


      $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: false // Close upon selecting a date,
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

    });

    function citizenship_checker()
    {
      if($('#cb_fil').is(':checked'))
      { 
        $('.typetoggle').hide();
        $("#country").val("");
        $('#cb_birth').removeAttr("disabled");
        $('#cb_natural').removeAttr("disabled");
        $('.select-dropdown').attr("disabled",true);  
        $('#cb_birth').prop("checked",true);
      }

      if(!$('#cb_fil').is(':checked'))
      {  
        $('.typetoggle').show();
        $('#cb_birth').attr("disabled",true);
        $('#cb_natural').attr("disabled",true);
        $('.select-dropdown').removeAttr("disabled",true);
        $('#cb_birth').prop("checked",false);
        $('#cb_natural').prop("checked",false);

      }

     $('select').material_select();
    }

  </script>