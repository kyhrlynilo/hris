<?php 
$emp_detail = "";
foreach($employee as $emp){ $emp_detail = $emp; } 
?>
<div class="row">
    <div class="card row" style="margin-bottom: 0;">
        <nav>
            <div class="nav-wrapper grey">
                <div class="col s11">
                    <a href="<?php echo base_url(); ?>admin_time_keeping" class="breadcrumb">Time Keeping</a>
                    <a href="<?php echo base_url(); ?>admin_time_keeping/view_employees" class="breadcrumb">Employees</a>
                    <a href="<?php echo base_url(); ?>admin_time_keeping/employee_profile/<?php echo $emp_detail->emp_id; ?>" class="breadcrumb"><?php echo $emp_detail->last_name.", ".$emp_detail->first_name ." " .$emp_detail->mid_name;; ?></a>
                    <a href="#" class="breadcrumb">Daily Time Records</a>
                </div>    
            </div>
        </nav>
    </div>

    <div class="col s12 card" style="padding: 20px;">    
        <div class="row">
            <h5>Daily Time Records</h5>
        </div>
        <div class="row">
        <form method="POST">
            <div class="col s2 offset-s1">
                <label for="year">YEAR</label>
                <select id="year" name="year">
                    <?php foreach($years as $year): ?>                        
                        <option value="<?php echo $year; ?>" <?php echo $selected_year == $year ? " selected " : ""; ?>><?php echo $year; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col s2">
                <label for="month">MONTH</label>
                <select id="month" name="month">
                    <?php foreach($months as $key => $month): ?>
                        <?php if(!empty($month)){ ?>
                        <option value="<?php echo $key; ?>" <?php echo $selected_month == $key ? " selected " : ""; ?>><?php echo $month; ?></option>
                        <?php } ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col s2">
                <label for="day_from">FROM</label>
                <select id="day_from" name="day_from">
                    <?php foreach($days_from as $day): ?>
                        <option value="<?php echo $day; ?>" <?php echo $day == $selected_day_from ? " selected " : ""; ?> ><?php echo $day; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col s2">
                <label for="day_to">TO</label>
                <select id="day_to" name="day_to">
                   <?php foreach($days_to as $day): ?>
                        <option value="<?php echo $day; ?>" <?php echo $day == $selected_day_to ? " selected " : ""; ?> ><?php echo $day; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>  
            <div class="col s2">
                <button class="btn grey" type="submit" name="generate" value="generate">GENERATE</button>
            </div>
        </form>
        </div>
        <div class="row">
            <div class="col s6 offset-s3 card pad-lg">
                <div class="row">
                    <div class="col s12">
                        <div align="center">
                            <h4><b>DAILY TIME RECORD</b></h4>   
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div align="center">
                            <?php echo "$emp_detail->last_name, $emp_detail->first_name $emp_detail->mid_name"; ?><br>
                            <?php echo "$emp_detail->emp_type - $emp_detail->department" ?> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <hr>
                        <div align="center">
                            (Name)
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div align="center">
                            <h5><b>For the month of <?php echo MONTHS[$selected_month] ." $selected_day_from-$selected_day_to $selected_year";?></b></h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <table class="bordered striped">
                            <thead>
                                <tr>
                                    <th rowspan="2">DAY</th>
                                    <th colspan="2"><div align="center">A.M</div></th>
                                    <th colspan="2"><div align="center">P.M</div></th>
                                    <th rowspan="2">HG</th>
                                    <th rowspan="2">HU</th>
                                    <th rowspan="2">Remarks</th>
                                </tr>
                                <tr>
                                    <th><div align="center">IN</div></th>
                                    <th><div align="center">OUT</div></th>
                                    <th><div align="center">IN</div></th>
                                    <th><div align="center">OUT</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                               $total_ug = 0; 
                               $total_gr = 0;
                                for($a = $selected_day_from; $a<=$selected_day_to; $a++ ){ 
                                    $date = $selected_year ."-" .str_pad($selected_month, 2, "0", STR_PAD_LEFT) ."-" .str_pad($a, 2, "0", STR_PAD_LEFT);
                                   
                                    $day = date('D', strtotime($date));

                                    $ins    = get_time_in_per_days($date, $times);
                                    $outs   = get_time_out_per_days($date, $times);

                                    sort($ins);
                                    sort($outs);

                                ?>
                                    <tr>
                                        <td><?php echo "$a - " .$day; ?></td>
                                        <!-- ############## AM TINE IN ############## -->
                                        <td>
                                            <?php 
                                            foreach($ins as $in){
                                                    echo $in;
                                            } 
                                            ?>
                                        </td>

                                        <!-- ############## FILLERS ############## -->                                        
                                        <td></td>
                                        <td></td>
    
                                        <td>
                                            <?php 
                                            foreach($outs as $out){
                                                echo $out;
                                            } 
                                            ?>
                                        </td>

                                        <!-- ############## HG ############## -->
                                        <td>
                                            <?php 
                                            if( is_absent( $ots, $date, $ins, $outs ) == FLAG_NO )
                                            {
                                                $total_gr+=count_hono( $ots, $date, $ins, $outs, HONO_GR); 
                                                $hono_gr = count_hono( $ots, $date, $ins, $outs, HONO_GR);
                                                echo $hono_gr >0 ? date('H:i', mktime(0,$hono_gr)) : "";
                                            }
                                               
                                            ?>
                                        </td>

                                        <!-- ############## HU ############## -->
                                        <td>
                                            <?php 
                                             if( is_absent( $ots, $date, $ins, $outs ) == FLAG_NO )
                                            {
                                                $total_ug+=count_hono( $ots, $date, $ins, $outs, HONO_UG); 
                                                $hono_ug = count_hono( $ots, $date, $ins, $outs, HONO_UG);
                                                echo $hono_ug > 0 ? date('H:i', mktime(0,$hono_ug)) : "";
                                            }
                                             ?>
                                        </td>

                                        <!-- ############## REMARKS ############## -->
                                        <td>
                                            <?php 
                                            $absent = is_absent( $ots, $date, $ins, $outs ) == FLAG_YES ? 'ABSENT' : ''; 
                                            if( is_absent( $ots, $date, $ins, $outs ) == FLAG_NO )
                                            {
                                                $is_late = array();
                                                if( count($ins) > 0 )
                                                    $is_late = is_late( $ots, $date, $ins[0] );

                                                $is_undertime = array();
                                                if( count($outs) > 0 )
                                                    $is_undertime = is_undertime( $ots, $date, $outs[count($outs)-1] );


                                                echo ( isset($is_late[0]) AND $is_late[0] == FLAG_YES ) ? ' LATE - '.$is_late[1] .' mins ' : '';
                                                echo ( isset($is_undertime[0]) AND $is_undertime[0] == FLAG_YES ) ? '<br>UNDERTIME - '.$is_undertime[1] .' mins' : '';
                                            }
                                            else
                                            {
                                                echo $absent;
                                            }
                                            
                                            ?>
                                        </td>
                                    </tr>

                                <?php 
                                } 
                                ?>
                                <tr>
                                    <td colspan="5"><div align="right">TOTAL:</div></td>
                                    <td><?php echo date('H:i', mktime(0,$total_gr)); ?></td>
                                    <td><?php echo date('H:i', mktime(0,$total_ug)); ?></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <p>I certify on my honor that the above is a true and correct report of the hours of work performed, record of whic was made daily at the time of arrival and departure from office</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div align="center">
                            <h5><?php echo "$emp_detail->last_name, $emp_detail->first_name $emp_detail->mid_name"; ?></h5>   
                        </div>  
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('select').material_select();
    });
</script>


<?php  


?>