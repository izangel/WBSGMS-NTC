	<div id="body">
		<div>
			<div class="featured">
				<h2>Search Grade</h2>
				

				<table width="100%" border="1">
					<tr>
						<th>ID No.</th>
						<th>Name</th>
						<th>Subject</th>
						<th>Faculty</th>
						<th>Grade</th>
					</tr>
						
					<?php foreach($students_grade as $studgrade) : 
					$stud_id = $studgrade->student_id;
					$stud = $this->students_model->get_student($stud_id)
					
					?>
					
					<tr>
					
					<td><?php echo $studgrade->student_id; ?></td>
					
					<td><?php echo $stud->student_lastname . ', ' . $stud->student_firstname; ?></td>
					
					<td><?php echo $studgrade->subject_code; ?></td>
					
					<td><?php echo $studgrade->faculty_id; ?></td>
					
					<td><?php echo $studgrade->student_final_grade; ?></td>
					
					</tr>
					
					<?php endforeach; ?>
				</table>
			</div>
