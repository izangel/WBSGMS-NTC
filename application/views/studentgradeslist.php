	<div id="body">
		<div>
			<div class="featured">
				<h2>Students List</h2>
				
				
				
				<?php echo 'Subject Code: ' . $s_info->subject_code . '<br/> Description: ' . $s_info->s_description . '<br/>'; ?>
				<?php echo 'Faculty: ' . $f_info->faculty_lastname . ', ' . $f_info->faculty_firstname; ?>
				<br/><br/>
				<table width="100%" border="1">
					<tr>
						<th>ID No.</th>
						<th>Name</th>
						<th>Grade</th>
					</tr>
						
					<?php foreach($students_grade as $studgrade) : 
					$stud_id = $studgrade->student_id;
					$stud = $this->students_model->get_student($stud_id)
					
					?>
					
					<tr>
					
					<td><?php echo $studgrade->student_id; ?></td>
					
					<td><?php echo $stud->student_lastname . ', ' . $stud->student_firstname; ?></td>
					
					<td><?php echo $studgrade->student_final_grade; ?></td>
					
					</tr>
					
					<?php endforeach; ?>
				</table>
			
			</div>
