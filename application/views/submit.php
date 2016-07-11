	<div id="body">
		<div>
			<div class="featured">
				<h2>Submit Grades</h2>
				<!--
				
				-----
				
				 -->
				<form action="<?php echo base_url(); ?>admin/submitgrade" method="post">
				<br/><br/><br/>
				<?php if($subject_info != null){ 
					echo 'Subject Code: ' . $subject_info->subject_code . '<br/> <input type="hidden" value="' . $subject_info->subject_code . '" name="subject_code" />';
					echo 'Description: ' . $subject_info->s_description . '<br/>';
	
				} ?>
				<br/><br/>
				<table width="100%" border="1">
				<br/>

				<tr>
					<th>ID No.</th>
					<th>Student Name</th>
					<th>Course</th>
					<th width="10%">Grade</th>
				</tr>
				
				<?php
				if($studentslist != null){ $cntr = 1;
					foreach($studentslist as $student) : 
					$stud_id = $student->stud_id;
					
					$student_info = $this->students_model->get_student($stud_id);
					
				?>
				
				<tr>
					<td><?php echo $student->stud_id; ?></td>
					<td>
					<?php echo $student_info->student_lastname . ', ' . $student_info->student_firstname; ?> <input type="hidden" value="<?php echo $student_info->student_id; ?>" name="s_id" />
					</td>
					<td>
					<?php echo $student_info->course; ?>
					</td>
					<td>
						<input type="text" name="studgrade<?php echo $cntr; ?>" />
					</td>
				</tr>
					
				<input type="hidden" name="set<?php echo $cntr; ?>" value="<?php echo $student->set; ?>" /> <!-- set -->
				<input type="hidden" name="time<?php echo $cntr; ?>" value="<?php echo $student->time; ?>" />
				<input type="hidden" name="day<?php echo $cntr; ?>" value="<?php echo $student->day; ?>" />
				<input type="hidden" name="term<?php echo $cntr; ?>" value="<?php echo $student->term; ?>" />
				<input type="hidden" name="semester<?php echo $cntr; ?>" value="<?php echo $student->sem; ?>" />
				<input type="hidden" name="schoolyear<?php echo $cntr; ?>" value="<?php echo $student->schoolyear; ?>" />
				<input type="hidden" name="studentid<?php echo $cntr; ?>" value="<?php echo $student->stud_id; ?>" />
				
				<?php 
				$cntr++; endforeach; } else { $cntr = 0; } ?>
				</table>
				<input type="hidden" value="<?php echo $cntr - 1; ?>" name="studentcntr" />
				<input type="hidden" value="<?php echo $f_id; ?>" name="facultyid" />
				
				<br/><br/>
				
				
				<button type="submit">Submit Grade</button>
				</form>
			</div>
