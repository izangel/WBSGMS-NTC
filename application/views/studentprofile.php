	<div id="body">
		<div>
			<div class="featured">
				<h2>Profile</h2>
				<h4>ID No: <?php echo $student->student_id; ?>
				<br/>Student Name: <?php echo $student->student_lastname . ', ' . $student->student_firstname . ' ' . $student->student_middlename; ?>
				<br/>Sex: <?php echo $student->student_sex; ?>
				<br/>Course: <?php echo $student->course; ?>
				<br/>Year Level: <?php echo $student->yearlevel; ?>
				<br/>Set: <?php echo $student->set; ?>
				
				<br/>
				<br/>
				<h4>Subject List:</h4>

				<table width="100%" border="1">
				<tr>
					<th>Code</th>
					<th>Description</th>
					<th>Teacher</th>
				</tr>
				
				<?php foreach($subs as $subject) :
				$subcode = $subject->subject_code;
				$subdes = $this->subject_model->get_subject_info($subcode);
				$faculty_id = $subject->faculty_id;
				$fac = $this->faculty_model->get_faculty($faculty_id);
				
				?>
				<tr>
					<td>
						<?php echo $subject->subject_code; ?>
					</td>
					<td>
						<?php echo $subdes->s_description; ?>
					</td>
					<td>
						<?php echo $fac->faculty_lastname; ?>
					</td>
		
				</tr>
				<?php endforeach; ?>
				</table>
				
				<br/>
				<br/>
				<a href="<?php echo base_url(); ?>admin/edit/<?php echo $student->student_id; ?>">Edit Student Information</a><br/>
				<br/>
				<a href="<?php echo base_url(); ?>admin/editsubjects/<?php echo $student->student_id; ?>">Add or Drop Subject</a><br/>

			</div>
