

<div class="row">
    <div class="card row" style="margin-bottom: 0;">
        <nav>
        <div class="nav-wrapper blue">
                <div class="col s11">
                    <a href="<?php echo base_url(); ?>admin_time_keeping" class="breadcrumb">Time Keeping</a>
                    <a href="<?php echo base_url(); ?>admin_time_keeping/view_employees" class="breadcrumb">Employees</a>
                    <a href="#" class="breadcrumb">Add Employee</a>
                </div>    
            </div>
    </nav>
    </div>

    <div class="col s12 card" style="padding: 20px;">
        <form method="post" id="admin_time_employee_keeping_form" >
            
            <div class="row">
                <div class="col s4">
                    <div class="input-field ">
                        <input id="last_name" name="last_name" type="text" class="validate" >
                        <label for="last_name">LAST NAME</label>
                        <span class="text-danger"><?php echo form_error("last_name");?></span>
                    </div>
                </div>

                <div class="col s4">
                    <div class="input-field ">
                        <input id="first_name" name="first_name" type="text" class="validate" >
                        <label for="first_name">FIRST NAME</label>
                        <span class="text-danger"><?php echo form_error("first_name");?></span>
                    </div>
                </div>

                <div class="col s4">
                    <div class="input-field ">
                        <input id="mid_name" name="mid_name" type="text" class="validate" >
                        <label for="mid_name">MIDDLE NAME</label>
                        <span class="text-danger"><?php echo form_error("mid_name");?></span>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col s3">
                    <div class="input-field ">
                        <input id="birth_date" name="birth_date" type="text" class="datepicker" >
                        <label for="birth_date">BIRTH DATE <small>(mm/dd/yyyy)</small></label>
                        <span class="text-danger"><?php echo form_error("birth_date");?></span>
                    </div>
                </div>

                <div class="col s3">
                    <div class="input-field ">
                        <input id="birth_place" name="birth_place" type="text" class="validate" >
                        <label for="birth_place">BIRTH PLACE</label>
                        <span class="text-danger"><?php echo form_error("birth_place");?></span>
                    </div>
                </div>

                <div class="col s3">                    
                    <p>
                        Gender&nbsp;&nbsp;
                        <input class="with-gap" name="gender" type="radio" id="cb_male"  value="Male" checked="" />
                        <label for="cb_male">Male</label>

                        <input name="gender" type="radio" id="cb_female"  value="Female"/>
                        <label for="cb_female">Female</label>
                    </p>
                </div>

                <div class="col s3">                    
                    <p>
                        CIVIL STATUS &nbsp;&nbsp;
                        <input class="with-gap" name="civil_status" type="radio" id="single"  value="Single" checked />
                        <label for="single">Single</label>
                        <input name="civil_status" type="radio" id="married"  value="Married" />
                        <label for="married">Married</label>
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="col s2">CITIZENSHIP</div>
                <div class="col s4">
                    <p>
                        <input name="citizenship" type="radio" id="cb_fil" onchange="citizenship_checker();"  value="<?php echo PH; ?>"  checked/>
                        <label for="cb_fil">Filipino</label>
                        &nbsp;&nbsp;
                        <input name="citizenship" type="radio" id="cb_dual" onchange="citizenship_checker();" value="<?php echo DUAL; ?>"  />
                        <label for="cb_dual">Dual Citizenship</label>
                    </p>
                    <p>
                        <p>
                            <input class="with-gap" name="citizenship_type" type="radio" id="cb_birth" value="<?php echo BIRTH; ?>" checked />
                            <label for="cb_birth">By Birth</label>

                            <input name="citizenship_type" type="radio" id="cb_natural" value="<?php echo NATURALIZATION; ?>"  />
                            <label for="cb_natural">Naturalization</label>
                        </p>
                    </p>
                </div>
                <div class="col s4 typetoggle" style="display: none;">
                    <div class="input-field">
                        <select id="country" name="country">
                        </select>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col s9">
                    <div class="input-field">
                        <input id="address" name="address" type="text" class="text">
                        <label for="address">RESIDENTIAL ADDRESS</label>
                        <span class="text-danger"><?php echo form_error("address");?></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s4">
                    <div class="input-field">
                        <input id="email_address" name="email_address" type="text" class="email" >
                        <label for="email_address">EMAIL ADDRESS</label>
                        <span class="text-danger"><?php echo form_error("email_address");?></span>
                    </div>
                </div>

                <div class="col s4">
                    <div class="input-field">
                        <input id="cellphone_number" name="cellphone_number" type="text" class="text">
                        <label for="cellphone_number">CELLPHONE NO</label>
                        <span class="text-danger"><?php echo form_error("cellphone_number");?></span>
                    </div>
                </div>
                <div class="col s4">
                    <div class="input-field ">
                        <input id="department" name="department" type="text" class="validate" >
                        <label for="department">DEPARTMENT</label>
                        <span class="text-danger"><?php echo form_error("department");?></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s3">
                    <label for="emp_status">EMPLOYMENT STATUS</label>
                    <select id="emp_status" name="emp_status">
                        <option value="<?php echo ES_R; ?>"><?php echo ES_R; ?></option>
                        <option value="<?php echo ES_C; ?>"><?php echo ES_C; ?></option>
                        <option value="<?php echo ES_PT; ?>"><?php echo ES_PT; ?></option>
                        <option value="<?php echo ES_JO; ?>"><?php echo ES_JO; ?></option>
                    </select>
                </div>
                <div class="col s3">
                    <label for="emp_type">EMPLOYMENT TYPE</label>
                    <select id="emp_type" name="emp_type">
                        <option value="<?php echo ET_A; ?>"><?php echo ET_A; ?></option>
                        <option value="<?php echo ET_F; ?>"><?php echo ET_F; ?></option>
                        <option value="<?php echo ET_SA; ?>"><?php echo ET_SA; ?></option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col s12 center">
                    <button type="submit" id="save" name="save" class="btn waves-effect waves-light green"> 
                        Save
                    </button>
                    <a href="<?php echo base_url(); ?>Admin_time_keeping/view_employees" type="button" class="btn waves-effect waves-light orange">       
                        Cancel
                    </a>
                </div>
            </div>

        </div>
    </div>

</form>

<script type="text/javascript">

    $(document).ready(function(){
        populateCountries("country");
        $('select').material_select();


        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 100, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: true // Close upon selecting a date,
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

        $('#admin_time_employee_keeping_form').on("submit",function(e){
        
            e.preventDefault();     
            button_loader("save",1);

            $.post(
                base_url + "admin_time_keeping/process_employee/",
                {
                    data: get_form_data("admin_time_employee_keeping_form")
                },
                function(data){                             
                    button_loader("save",0);
                    notify( data, base_url + "admin_time_keeping/view_employees" );              
                }
            );

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
