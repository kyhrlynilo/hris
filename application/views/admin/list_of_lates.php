<?php 
$days = get_date_range($date_from, $date_to);
?>

<style type="text/css">
	table{
		border-collapse: collapse;
		overflow-x: auto;
	}
	table tr td{
		border:1px solid black;
		text-align: center;
	}
</style>

<div>
	<h1><?php echo $title; ?></h1>
	From <b><?php echo date('F d, Y',strtotime($date_from)); ?></b> to <b><?php echo date('F d, Y',strtotime($date_to)); ?></b>
</div>

<table style="width: 100%;margin-top: 20px;">
	<tr>
		<td>Employee</td>
		<?php foreach($days as $day):  ?>
			<td><?php echo $day; #substr($day, 8); ?></td>
		<?php endforeach; ?>
	</tr>
	<?php foreach($employees as $emp): ?>
		<tr>
			<td>
				<?php echo "$emp->last_name, $emp->first_name $emp->mid_name "; ?>
			</td>
			<?php foreach($days as $day): ?>
				<td>
					<?php 
					foreach($data as $dt):
						# echo ($dt->date == $day AND $dt->emp_id == $emp->emp_id) ? "$dt->time ($dt->mins)" : "08:05 (5.00) ";
						if($dt->date == $day AND $dt->emp_id == $emp->emp_id)
						{
							$min = (int) $dt->mins;
							echo "$dt->time ($min mins) ";
							break;
						}
					endforeach; 
					?>
				</td>
			<?php endforeach; ?>
		</tr>
	<?php endforeach; ?>
</table>


<?php 
function get_date_range( $first, $last, $step = '+1 day', $format = 'Y-m-d' ) 
{
	$dates = [];
	$current = strtotime( $first );
	$last = strtotime( $last );

	while( $current <= $last ) {

		$dates[] = date( $format, $current );
		$current = strtotime( $step, $current );
	}

	return $dates;
}
?>