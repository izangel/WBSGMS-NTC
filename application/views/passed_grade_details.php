	<div id="body">
		<div>
			<div class="featured">
				<h2>Passed Grade</h2>
				
				<form action="<?php echo base_url(); ?>admin/accept_pending" method="post">
				
				<p><strong>Subject: 
				<?php echo $sub_code;?></strong></p> <input type="hidden" name="subcode" value="<?php echo $sub_code;?>" />
				
				<p><strong>Faculty: 
				<?php 
					$faculty_id = $fac_id;
					$fac = $this->faculty_model->get_faculty($faculty_id);
					echo $fac->faculty_lastname . ', ' . $fac->faculty_firstname;
				?></strong></p>
				
				<table width="100%" border="1">
				<tr>
					<th>ID</th>
					<th>Student</th>
					<th>Final Grade</th>
				</tr>
				<?php $cntr = 1;
					foreach($pending as $grade) : 
						$stud_id = $grade->student_id;
						$stud = $this->students_model->get_student($stud_id);
				?>
				<tr>

					<td><?php echo $stud_id; ?><input type="hidden" value="<?php echo $stud_id; ?>" name="student<?php echo $cntr; ?>" /></td>
					<td><?php echo $stud->student_lastname . ', ' . $stud->student_firstname; ?></td>
					<td><?php echo $grade->student_final_grade; ?></td>

				</tr>
				<?php $cntr++; endforeach; ?>
				</table>
				<br/><br/><br/>
				
				<input type="hidden" name="cntr" value="<?php echo $cntr - 1; ?>" />
				<input type="hidden" name="faculty" value="<?php echo $faculty_id; ?>" />
				<button type="submit">ACCEPT</button>
				</form>
				
			</div>
