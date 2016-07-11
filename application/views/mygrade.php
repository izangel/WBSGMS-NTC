	<div id="body">
		<div>
			<div class="featured">
				<h2>My Grades</h2>
				
				<table width="100%" border="1">
				
					<tr>
						<th>Subject Code</th>
						<th>Faculty Name</th>
						<th>Grade</th>
						
					</tr>
					 
					<?php foreach($grades as $grade) :  
					$faculty_id = $grade->faculty_id;
					$fac = $this->faculty_model->get_faculty($faculty_id);
					?>
					<tr>
						<td>
						<?php echo $grade->subject_code; ?>
						</td>
						<td>
						<?php echo $fac->faculty_lastname . ', '. $fac->faculty_firstname; ?>
						</td>
						<td>
							<?php echo $grade->student_final_grade; ?>
						</td>
					</tr>
					<?php endforeach; ?> 
				
				</table>
				
			</div>
