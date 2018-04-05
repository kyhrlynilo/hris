<?php

function get_time_in_per_days( $date, $times )
{
    $time_per_day = array();
    foreach($times as $time)
    {
        if($date == $time->date AND $time->type == IN)
            $time_per_day[] = $time->time;
    }

    return $time_per_day;
}

function get_time_out_per_days( $date, $times )
{
    $time_per_day = array();
    foreach($times as $time)
    {
        if($date == $time->date AND $time->type == OUT)
            $time_per_day[] = $time->time;
    }

    return $time_per_day;
}

function compare_time($greater, $lesser)
{
    if(strtotime($greater)>strtotime($lesser))
        return true;
    else
        return false;
}

function compare_or_equal_time($greater, $lesser)
{
    if(strtotime($greater)>=strtotime($lesser))
        return true;
    else
        return false;
}
	
function count_hono( $ots, $date, $ins, $outs, $type)
{
	$daily_sched 	= get_daily_schedule( $ots, $date, $type );
	$in 			= isset($ins[0]) ? $ins[0] : 0;
	$out 			= isset($outs[count($outs)-1]) ? $outs[count($outs)-1] : 0;
	
	$total_mins = 0;
	
	foreach($daily_sched as $sched )
	{
		$from 	= $sched['from']; 
		$to 	= $sched['to'];
		
		$total_mins += hour_ranges_difference( [ $in, $out ], [ $from, $to ] );
	}

	return $total_mins;
}

function is_late( $ots, $date, $in )
{
	$is_late = [ FLAG_NO , 0 ];
	
	$daily_sched = get_daily_schedule( $ots , $date );

	$in = strtotime( $in );
	
	if( count( $daily_sched ) > 0 )
	{
		
		$call_time 	= strtotime($daily_sched[0]['from']);
		$difference = $in - $call_time;
		
		$is_late 	= $difference > 0 ? [ FLAG_YES, number_format( ( float ) $difference/60  , 2, '.', '' ) ] : [ FLAG_NO , 0 ];
	}

	return $is_late;
}

function is_undertime( $ots, $date, $out )
{
	$is_undertime = [ FLAG_NO, 0 ];

	$daily_sched = get_daily_schedule( $ots , $date );

	$out = strtotime($out);

	if( count($daily_sched) > 0 )
	{
		$out_time 		= strtotime($daily_sched[count($daily_sched) - 1]['to']);

		$difference 	= $out_time - $out;

		$is_undertime 	= $difference > 0 ? [ FLAG_YES, number_format( ( float ) $difference/60  , 2, '.', '' ) ] : [ FLAG_NO , 0 ];
	}

	return $is_undertime;
}

function is_absent( $ots, $date, $ins, $outs, $eexcept_dates = array() )
{
	$is_absent = FLAG_NO;
	$daily_sched = get_daily_schedule( $ots , $date );
    
    if( ( count( $ins ) <= 0  AND count( $outs ) <= 0 ) OR  count( $outs ) <= 0 ) # CHECK IF NO TIME IN/TIME OUT OR NO TIME OUT
    	if( count( $daily_sched ) > 0 ) # CHECK IF THERE IS A SCHEDULE FOR THAT DAY
    		if( !in_array( $date, $eexcept_dates ) ) # CHECK IF THERE IS A DAY EXCEPTION
    			$is_absent = FLAG_YES;

    return $is_absent;
}

##################################################################################################################################
# GENERAL
##################################################################################################################################

function get_daily_schedule( $ots, $date, $hono = null )
{

	$map 					= array();
	$indeces 				= array();
	$daily_schedule 		= array();
	$sorted_daily_schedule	= array();

	$day 			= date('w',strtotime($date));

	foreach($ots as $tr)
	{
		$to 	= date(STANDARD_DATE,strtotime($tr->effective_until));
        $from 	= date(STANDARD_DATE,strtotime($tr->effective_on));
		if( $date >= $from AND $date <= $to )
		{
			$days = explode(",",$tr->days);
			if(in_array($day, $days))
			{	
				if( isset($hono) OR !empty($hono) ){
					if($hono == $tr->type)
					{
						$daily_schedule[strtotime($tr->time_start)] = $tr->time_start ."-" .$tr->time_end;
					}
				}else{
					$daily_schedule[strtotime($tr->time_start)] = $tr->time_start ."-" .$tr->time_end;	
				}				
			}        	
		}
	}

	ksort($daily_schedule);
	
	foreach($daily_schedule as $index)
	{
		$times = explode( "-",$index );
		$sorted_daily_schedule[] = [ 'from'=> $times[0], 'to' => $times[1]];
	}

	return $sorted_daily_schedule;
}

function hour_ranges_difference( $range_a , $range_b )
{
	//number_format( ( float ) $difference/60  , 2, '.', '' )
	$in 	= strtotime( $range_a[0] );
	$out 	= strtotime( $range_a[1] );

	$from 	= strtotime( $range_b[0] );
	$to 	= strtotime( $range_b[1] );


	$difference =(int) $to - (int) $from ; 

	if( $in >= $to )
		$difference = 0;
	else
	{
		if( $in >= $from )
		{
			$difference -= ($in - $from);
		}

		if( $out <= $to )
		{
			$difference -= ($to - $out);
		}
	}

	

	return number_format( ( float ) $difference/60  , 2, '.', '' );



}

function test()
{
	echo "test";
}


# get the otr
# check if the date period is okay
# get the daily schedule