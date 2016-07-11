	<div id="body">
		<div>
			<div class="featured">
				<h2>Subject Form</h2>
				
				
				<table width="100%" border="1">
				
				<tr>
					<th>Student Name</th>
					<th>Course</th>
					<th width="10%">Grade</th>
					
				</tr>
				<?php foreach($subject_info as $subs) : ?>
				<form action="<?php echo base_url(); ?>faculty/passgrade/<?php echo $subs->student_id; ?>" method="post">
				<tr>
					<td>
						<?php
						$stud_id = $subs->student_id;
						$studname = $this->students_model->get_student($stud_id);
						echo $studname->student_lastname . ', ' . $studname->student_firstname . ' ' . $studname->student_middlename;
						?>
					</td>
					<td>
						<?php echo $subs->course; ?>
					</td>
					<td>
						<input type="text" name="grade" width="4%" /><button type="submit">Submit</button>
					</td>
				</tr>
				</form>
				<?php endforeach; ?>
				</table>
				
				
			
			</div>
