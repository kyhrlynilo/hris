<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<script
src="https://code.jquery.com/jquery-3.3.1.js"
integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
crossorigin="anonymous"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>


<div class="container-fluid">

    <div class="row">
        <div class="col s12">
            <p>WORK EXPERIENCE</p>
        </div>
        <div class="col s2">
            <div class="input-field ">
                <input id="date_from" name="date_from" type="text" class="validate" placeholder="Date" >
                <label for="date_from">FROM</label>
            </div>
        </div>
        <div class="col s2">
            <div class="input-field ">
                <input id="date_to" name="date_to" type="text" class="validate" placeholder="Date" >
                <label for="date_to">TO</label>
            </div>
        </div>
        <div class="col s4">
            <div class="input-field ">
                <input id="position_title" name="position_title" type="text" class="validate" placeholder="(Write in full / Do not abbreviate)" >
                <label for="position_title">POSITION TITLE  </label>
            </div>
        </div>  
        <div class="col s4">
            <div class="input-field ">
                <input id="company" name="company" type="text" class="validate" placeholder="(Write in full / Do not abbreviate)" >
                <label for="company">DEPARTMENT / AGENCY / OFFICE / COMPANY   </label>
            </div>
        </div>
        <div class="col s4">
            <div class="input-field ">
                <input id="monthly_salary" name="monthly_salary" type="text" class="validate" placeholder="Salary"  >
                <label for="monthly_salary">MONTHLY SALARY</label>
            </div>
        </div>
        <div class="col s3">
            <div class="input-field ">
                <input id="salary_grade" name="salary_grade" type="text" class="validate" placeholder="If applicable & STEP (Format *00-0*)/INCREMENT"  >
                <label for="salary_grade">SALARY/JOB/PAY/GRADE</label>
            </div>
        </div>
        <div class="col s3">
            <div class="input-field ">
                <input id="status" name="status" type="text" class="validate" placeholder="If applicable & STEP (Format *00-0*)/INCREMENT"  >
                <label for="status">STATUS OF APPOINTMENT</label>
            </div>
        </div>
        <div class="col s2">
           
                <p>
                    GOVERNMENT SERVICE ? <br>
                    <input class="with-gap" name="gov_service" type="radio" id="cb_yes"  value="Male" />
                    <label for="cb_yes">Yes</label>

                    <input name="gov_service" type="radio" id="cb_no"  value="Female" />
                    <label for="cb_no">No</label>
                </p>
            
        </div>
    </div>
</div>
