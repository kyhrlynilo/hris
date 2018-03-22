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
        <p>Educational Background</p>
      </div>

  <?php echo form_open('employee_educational_background/saveeduc');?>

        <?php if($msg = $this->session->flashdata('response')):?>
          <div class="response">
            <?php echo $msg; ?>
          </div>
        <?php endif;?>
        <?php
          $data = array(
            'level' => '1'
          );
        ?>
        <?php echo form_hidden($data);?>
      <div class="col s12">
        <h4><p>ELEMENTARY</p></h4>
      </div>
      <div class="col s4">
        <div class="input-field ">
          <?php echo form_input(['name'=>'name_of_school[0]','class'=>'textbox']); ?>
          <?php echo form_label('NAME OF SCHOOL', 'name_of_school[0]');?>
          <?php echo form_error('name_of_school[0]','<div class="text-danger">','</div>');?>
        <!--  <input id="name_of_school" name="name_of_school" type="text" class="validate" >
          <label for="name_of_school">NAME OF SCHOOL</label> -->
        </div>
      </div>
      <div class="col s4">
        <div class="input-field ">
           <?php echo form_input(['name'=>'basic_educ[0]','class'=>'textbox']); ?>
          <?php echo form_label('BASIC EDUCATION/DEGREE/COURSE (Write in full)', 'basic_educ[0]');?>
            <?php echo form_error('basic_educ[0]','<div class="text-danger">','</div>');?>
          <!-- <input id="basic_educ" name="basic_educ" type="text" class="validate" >
          <label for="basic_educ">BASIC EDUCATION/DEGREE/COURSE (Write in full)</label> -->
        </div>
      </div>
      <div class="col s2">
        <div class="input-field ">
           <?php echo form_input(['name'=>'date_from[0]','class'=>'textbox']); ?>
          <?php echo form_label('From', 'date_from[0]');?>
            <?php echo form_error('date_from[0]','<div class="text-danger">','</div>');?>
          <!-- <input id="date_from" name="date_from" type="text" class="validate" >
          <label for="date_from">From</label> -->
        </div>
      </div>
    <div class="col s2">
        <div class="input-field ">
          <?php echo form_input(['name'=>'date_to[0]','class'=>'textbox']); ?>
          <?php echo form_label('To', 'date_to[0]');?>
            <?php echo form_error('date_to[0]','<div class="text-danger">','</div>');?>
          <!-- <input id="date_to" name="date_to" type="text" class="validate" >
          <label for="date_to">To</label> -->
        </div>
      </div>
    <div class="col s4">
        <div class="input-field ">
            <?php echo form_input(['name'=>'highest_level[0]','class'=>'textbox']); ?>
          <?php echo form_label('HIGHEST LEVEL/UNITS EARNED (if not graduated)', 'highest_level[0]');?>
            <?php echo form_error('highest_level[0]','<div class="text-danger">','</div>');?>
        <!--  <input id="highest_level" name="highest_level" type="text" class="validate" >
          <label for="highest_level">HIGHEST LEVEL/UNITS EARNED (if not graduated)</label> -->
        </div>
      </div>
    <div class="col s2">
        <div class="input-field ">
            <?php echo form_input(['name'=>'year_graduated[0]','class'=>'textbox']); ?>
          <?php echo form_label('YEAR GRADUATE', 'year_graduated[0]');?>
            <?php echo form_error('year_graduated[0]','<div class="text-danger">','</div>');?>
          <!-- <input id="year_graduated" name="year_graduated" type="text" class="validate" >
          <label for="year_graduated">YEAR GRADUATE</label> -->
        </div>
      </div>
    <div class="col s4">
        <div class="input-field ">
          <?php echo form_input(['name'=>'scholarship[0]','class'=>'textbox']); ?>
          <?php echo form_label('SCHOLARDSHIP/ACADEMIC HONORS RECEIVED', 'scholarship[0]');?>
            <?php echo form_error('scholarship[0]','<div class="text-danger">','</div>');?>
          <!-- <input id="scholarship" name="scholarship" type="text" class="validate" >
          <label for="scholarship">SCHOLARDSHIP/ACADEMIC HONORS RECEIVED</label> -->
        </div>
      </div>
        </div>


       <?php
          $data = array(
            'level' => '2'
          );
        ?>
        <?php echo form_hidden($data);?>
    <div class="row">
      <div class="col s12">
        <h4><p >SECONDARY</p></h4>
      </div>
      <div class="col s4">
        <div class="input-field ">
          <?php echo form_input(['name'=>'name_of_school[1]','class'=>'textbox']); ?>
          <?php echo form_label('NAME OF SCHOOL', 'name_of_school[1]');?>
          <?php echo form_error('name_of_school[1]','<div class="text-danger">','</div>');?>
        <!--  <input id="name_of_school" name="name_of_school" type="text" class="validate" >
          <label for="name_of_school">NAME OF SCHOOL</label> -->
        </div>
      </div>
      <div class="col s4">
        <div class="input-field ">
           <?php echo form_input(['name'=>'basic_educ[1]','class'=>'textbox']); ?>
          <?php echo form_label('BASIC EDUCATION/DEGREE/COURSE (Write in full)', 'basic_educ[1]');?>
            <?php echo form_error('basic_educ[1]','<div class="text-danger">','</div>');?>
          <!-- <input id="basic_educ" name="basic_educ" type="text" class="validate" >
          <label for="basic_educ">BASIC EDUCATION/DEGREE/COURSE (Write in full)</label> -->
        </div>
      </div>
      <div class="col s2">
        <div class="input-field ">
           <?php echo form_input(['name'=>'date_from[1]','class'=>'textbox']); ?>
          <?php echo form_label('From', 'date_from[1]');?>
            <?php echo form_error('date_from[1]','<div class="text-danger">','</div>');?>
          <!-- <input id="date_from" name="date_from" type="text" class="validate" >
          <label for="date_from">From</label> -->
        </div>
      </div>
    <div class="col s2">
        <div class="input-field ">
          <?php echo form_input(['name'=>'date_to[1]','class'=>'textbox']); ?>
          <?php echo form_label('To', 'date_to[1]');?>
            <?php echo form_error('date_to[1]','<div class="text-danger">','</div>');?>
          <!-- <input id="date_to" name="date_to" type="text" class="validate" >
          <label for="date_to">To</label> -->
        </div>
      </div>
    <div class="col s4">
        <div class="input-field ">
            <?php echo form_input(['name'=>'highest_level[1]','class'=>'textbox']); ?>
          <?php echo form_label('HIGHEST LEVEL/UNITS EARNED (if not graduated)', 'highest_level[1]');?>
            <?php echo form_error('highest_level[1]','<div class="text-danger">','</div>');?>
        <!--  <input id="highest_level" name="highest_level" type="text" class="validate" >
          <label for="highest_level">HIGHEST LEVEL/UNITS EARNED (if not graduated)</label> -->
        </div>
      </div>
    <div class="col s2">
        <div class="input-field ">
            <?php echo form_input(['name'=>'year_graduated[1]','class'=>'textbox']); ?>
          <?php echo form_label('YEAR GRADUATE', 'year_graduated[1]');?>
            <?php echo form_error('year_graduated[1]','<div class="text-danger">','</div>');?>
          <!-- <input id="year_graduated" name="year_graduated" type="text" class="validate" >
          <label for="year_graduated">YEAR GRADUATE</label> -->
        </div>
      </div>
    <div class="col s4">
        <div class="input-field ">
          <?php echo form_input(['name'=>'scholarship[1]','class'=>'textbox']); ?>
          <?php echo form_label('SCHOLARDSHIP/ACADEMIC HONORS RECEIVED', 'scholarship[1]');?>
            <?php echo form_error('scholarship[1]','<div class="text-danger">','</div>');?>
          <!-- <input id="scholarship" name="scholarship" type="text" class="validate" >
          <label for="scholarship">SCHOLARDSHIP/ACADEMIC HONORS RECEIVED</label> -->
        </div>
      </div>
      
   </div>


    <?php
          $data = array(
            'level' => '3'
          );
        ?>
        <?php echo form_hidden($data);?>
    <div class="row">
      <div class="col s12">
        <h4><p >VOCATIONAL/TRADE CROUSE</p></h4>
      </div>
      <div class="col s4">
        <div class="input-field ">
          <?php echo form_input(['name'=>'name_of_school[2]','class'=>'textbox']); ?>
          <?php echo form_label('NAME OF SCHOOL', 'name_of_school[2]');?>
          <?php echo form_error('name_of_school[2]','<div class="text-danger">','</div>');?>
        <!--  <input id="name_of_school" name="name_of_school" type="text" class="validate" >
          <label for="name_of_school">NAME OF SCHOOL</label> -->
        </div>
      </div>
      <div class="col s4">
        <div class="input-field ">
           <?php echo form_input(['name'=>'basic_educ[2]','class'=>'textbox']); ?>
          <?php echo form_label('BASIC EDUCATION/DEGREE/COURSE (Write in full)', 'basic_educ[2]');?>
            <?php echo form_error('basic_educ[2]','<div class="text-danger">','</div>');?>
          <!-- <input id="basic_educ" name="basic_educ" type="text" class="validate" >
          <label for="basic_educ">BASIC EDUCATION/DEGREE/COURSE (Write in full)</label> -->
        </div>
      </div>
      <div class="col s2">
        <div class="input-field ">
           <?php echo form_input(['name'=>'date_from[2]','class'=>'textbox']); ?>
          <?php echo form_label('From', 'date_from[2]');?>
            <?php echo form_error('date_from[2]','<div class="text-danger">','</div>');?>
          <!-- <input id="date_from" name="date_from" type="text" class="validate" >
          <label for="date_from">From</label> -->
        </div>
      </div>
    <div class="col s2">
        <div class="input-field ">
          <?php echo form_input(['name'=>'date_to[2]','class'=>'textbox']); ?>
          <?php echo form_label('To', 'date_to[2]');?>
            <?php echo form_error('date_to[2]','<div class="text-danger">','</div>');?>
          <!-- <input id="date_to" name="date_to" type="text" class="validate" >
          <label for="date_to">To</label> -->
        </div>
      </div>
    <div class="col s4">
        <div class="input-field ">
            <?php echo form_input(['name'=>'highest_level[2]','class'=>'textbox']); ?>
          <?php echo form_label('HIGHEST LEVEL/UNITS EARNED (if not graduated)', 'highest_level[2]');?>
            <?php echo form_error('highest_level[2]','<div class="text-danger">','</div>');?>
        <!--  <input id="highest_level" name="highest_level" type="text" class="validate" >
          <label for="highest_level">HIGHEST LEVEL/UNITS EARNED (if not graduated)</label> -->
        </div>
      </div>
    <div class="col s2">
        <div class="input-field ">
            <?php echo form_input(['name'=>'year_graduated[2]','class'=>'textbox']); ?>
          <?php echo form_label('YEAR GRADUATE', 'year_graduated[2]');?>
            <?php echo form_error('year_graduated[2]','<div class="text-danger">','</div>');?>
          <!-- <input id="year_graduated" name="year_graduated" type="text" class="validate" >
          <label for="year_graduated">YEAR GRADUATE</label> -->
        </div>
      </div>
    <div class="col s4">
        <div class="input-field ">
          <?php echo form_input(['name'=>'scholarship[2]','class'=>'textbox']); ?>
          <?php echo form_label('SCHOLARDSHIP/ACADEMIC HONORS RECEIVED', 'scholarship[3]');?>
            <?php echo form_error('scholarship[2]','<div class="text-danger">','</div>');?>
          <!-- <input id="scholarship" name="scholarship" type="text" class="validate" >
          <label for="scholarship">SCHOLARDSHIP/ACADEMIC HONORS RECEIVED</label> -->
        </div>
      </div>
      
        </div>


    <?php
          $data = array(
            'level' => '4'
          );
        ?>
        <?php echo form_hidden($data);?>
  <div class="row">
      <div class="col s12">
        <h4><p >COLLEGE</p></h4>
      </div>
      <div class="col s4">
        <div class="input-field ">
          <?php echo form_input(['name'=>'name_of_school[3]','class'=>'textbox']); ?>
          <?php echo form_label('NAME OF SCHOOL', 'name_of_school[3]');?>
          <?php echo form_error('name_of_school[3]','<div class="text-danger">','</div>');?>
        <!--  <input id="name_of_school" name="name_of_school" type="text" class="validate" >
          <label for="name_of_school">NAME OF SCHOOL</label> -->
        </div>
      </div>
      <div class="col s4">
        <div class="input-field ">
           <?php echo form_input(['name'=>'basic_educ[3]','class'=>'textbox']); ?>
          <?php echo form_label('BASIC EDUCATION/DEGREE/COURSE (Write in full)', 'basic_educ[3]');?>
            <?php echo form_error('basic_educ[3]','<div class="text-danger">','</div>');?>
          <!-- <input id="basic_educ" name="basic_educ" type="text" class="validate" >
          <label for="basic_educ">BASIC EDUCATION/DEGREE/COURSE (Write in full)</label> -->
        </div>
      </div>
      <div class="col s2">
        <div class="input-field ">
           <?php echo form_input(['name'=>'date_from[3]','class'=>'textbox']); ?>
          <?php echo form_label('From', 'date_from[3]');?>
            <?php echo form_error('date_from[3]','<div class="text-danger">','</div>');?>
          <!-- <input id="date_from" name="date_from" type="text" class="validate" >
          <label for="date_from">From</label> -->
        </div>
      </div>
    <div class="col s2">
        <div class="input-field ">
          <?php echo form_input(['name'=>'date_to[3]','class'=>'textbox']); ?>
          <?php echo form_label('To', 'date_to[3]');?>
            <?php echo form_error('date_to[3]','<div class="text-danger">','</div>');?>
          <!-- <input id="date_to" name="date_to" type="text" class="validate" >
          <label for="date_to">To</label> -->
        </div>
      </div>
    <div class="col s4">
        <div class="input-field ">
            <?php echo form_input(['name'=>'highest_level[3]','class'=>'textbox']); ?>
          <?php echo form_label('HIGHEST LEVEL/UNITS EARNED (if not graduated)', 'highest_level[3]');?>
            <?php echo form_error('highest_level[3]','<div class="text-danger">','</div>');?>
        <!--  <input id="highest_level" name="highest_level" type="text" class="validate" >
          <label for="highest_level">HIGHEST LEVEL/UNITS EARNED (if not graduated)</label> -->
        </div>
      </div>
    <div class="col s2">
        <div class="input-field ">
            <?php echo form_input(['name'=>'year_graduated[3]','class'=>'textbox']); ?>
          <?php echo form_label('YEAR GRADUATE', 'year_graduated[3]');?>
            <?php echo form_error('year_graduated[3]','<div class="text-danger">','</div>');?>
          <!-- <input id="year_graduated" name="year_graduated" type="text" class="validate" >
          <label for="year_graduated">YEAR GRADUATE</label> -->
        </div>
      </div>
    <div class="col s4">
        <div class="input-field ">
          <?php echo form_input(['name'=>'scholarship[3]','class'=>'textbox']); ?>
          <?php echo form_label('SCHOLARDSHIP/ACADEMIC HONORS RECEIVED', 'scholarship[3]');?>
            <?php echo form_error('scholarship[3]','<div class="text-danger">','</div>');?>
          <!-- <input id="scholarship" name="scholarship" type="text" class="validate" >
          <label for="scholarship">SCHOLARDSHIP/ACADEMIC HONORS RECEIVED</label> -->
        </div>
      </div>
      
        </div>



    <?php
          $data = array(
            'level' => '5'
          );
        ?>
        <?php echo form_hidden($data);?>
      <div class="row">
      <div class="col s12">
        <h4><p >GRADUATE STUDIES</p ></h4>
      </div>
      <div class="col s4">
        <div class="input-field ">
          <?php echo form_input(['name'=>'name_of_school[4]','class'=>'textbox']); ?>
          <?php echo form_label('NAME OF SCHOOL', 'name_of_school[4]');?>
          <?php echo form_error('name_of_school[4]','<div class="text-danger">','</div>');?>
        <!--  <input id="name_of_school" name="name_of_school" type="text" class="validate" >
          <label for="name_of_school">NAME OF SCHOOL</label> -->
        </div>
      </div>
      <div class="col s4">
        <div class="input-field ">
           <?php echo form_input(['name'=>'basic_educ[4]','class'=>'textbox']); ?>
          <?php echo form_label('BASIC EDUCATION/DEGREE/COURSE (Write in full)', 'basic_educ[4]');?>
            <?php echo form_error('basic_educ[4]','<div class="text-danger">','</div>');?>
          <!-- <input id="basic_educ" name="basic_educ" type="text" class="validate" >
          <label for="basic_educ">BASIC EDUCATION/DEGREE/COURSE (Write in full)</label> -->
        </div>
      </div>
      <div class="col s2">
        <div class="input-field ">
           <?php echo form_input(['name'=>'date_from[4]','class'=>'textbox']); ?>
          <?php echo form_label('From', 'date_from[4]');?>
            <?php echo form_error('date_from[4]','<div class="text-danger">','</div>');?>
          <!-- <input id="date_from" name="date_from" type="text" class="validate" >
          <label for="date_from">From</label> -->
        </div>
      </div>
    <div class="col s2">
        <div class="input-field ">
          <?php echo form_input(['name'=>'date_to[4]','class'=>'textbox']); ?>
          <?php echo form_label('To', 'date_to[4]');?>
            <?php echo form_error('date_to[4]','<div class="text-danger">','</div>');?>
          <!-- <input id="date_to" name="date_to" type="text" class="validate" >
          <label for="date_to">To</label> -->
        </div>
      </div>
    <div class="col s4">
        <div class="input-field ">
            <?php echo form_input(['name'=>'highest_level[4]','class'=>'textbox']); ?>
          <?php echo form_label('HIGHEST LEVEL/UNITS EARNED (if not graduated)', 'highest_level[4]');?>
            <?php echo form_error('highest_level[4]','<div class="text-danger">','</div>');?>
        <!--  <input id="highest_level" name="highest_level" type="text" class="validate" >
          <label for="highest_level">HIGHEST LEVEL/UNITS EARNED (if not graduated)</label> -->
        </div>
      </div>
    <div class="col s2">
        <div class="input-field ">
            <?php echo form_input(['name'=>'year_graduated[4]','class'=>'textbox']); ?>
          <?php echo form_label('YEAR GRADUATE', 'year_graduated[4]');?>
            <?php echo form_error('year_graduated[4]','<div class="text-danger">','</div>');?>
          <!-- <input id="year_graduated" name="year_graduated" type="text" class="validate" >
          <label for="year_graduated">YEAR GRADUATE</label> -->
        </div>
      </div>
    <div class="col s4">
        <div class="input-field ">
          <?php echo form_input(['name'=>'scholarship[4]','class'=>'textbox']); ?>
          <?php echo form_label('SCHOLARDSHIP/ACADEMIC HONORS RECEIVED', 'scholarship[4]');?>
            <?php echo form_error('scholarship[4]','<div class="text-danger">','</div>');?>
          <!-- <input id="scholarship" name="scholarship" type="text" class="validate" >
          <label for="scholarship">SCHOLARDSHIP/ACADEMIC HONORS RECEIVED</label> -->
        </div>
      </div>
      
        </div>
        <div class="row">
                <div class="col s3">
                  <?php echo form_submit(['name'=>'submit','value'=>'SIGN UP','class'=>'btn btn-primary']); ?>
                </div>
                <div class="col s3">
                </div>
                <div class="col s6">
                </div>
            </div>  
 <?php echo form_close(); ?>
    </div>
  </div>