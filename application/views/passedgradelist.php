	<div id="body">
		<div>
			<div class="featured">
				<h2>Passed Grade List</h2>
				<table width="100%" border="1">
				<tr>
					<th>Subject Code</th>
					<th>Faculty ID</th>
					<th>Control</th>
				</tr>
				<?php 
					foreach($passed_grade as $grade) : 
					
				?>
				<tr>
				<form action="<?php echo base_url(); ?>grades/pending_grade_details" method="post">
					<td><?php echo $grade->subject_code; ?></td>
					<td>
					
					
					<?php echo $grade->faculty_id; ?>
					
					</td>
					<td><button>View</button></td>
					<input type="hidden" name="sub_code" value="<?php echo $grade->subject_code; ?>" />
					<input type="hidden" name="fac_id" value="<?php echo $grade->faculty_id; ?>" />
					<input type="hidden" name="sub_time" value="<?php echo $grade->sub_time; ?>" />
					<input type="hidden" name="sub_day" value="<?php echo $grade->sub_day; ?>" />
					<input type="hidden" name="set" value="<?php echo $grade->set; ?>" />
				</form>
				</tr>
				<?php endforeach; ?>
				</table>
				
				<?php // print_r($passed_grade); ?>
			</div>
			
			
