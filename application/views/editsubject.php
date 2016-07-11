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
				<h4>Add Subject</h4>
				
				
				
				<form action="<?php echo base_url(); ?>admin/add" method="post">
				<input type="text" name="subcode" placeholder="Enter Subject code" />
				<?php $faculties = $this->faculty_model->get_all_faculty(); ?>
				<select name="faculty">
					<?php foreach($faculties as $faculty) : ?>
					<option value="<?php echo $faculty->faculty_id; ?>"><?php echo $faculty->faculty_lastname . ', ' . $faculty->faculty_firstname; ?></option>
					<?php endforeach; ?>
				</select>
				
				<br/><br/>Day:
				<select name="day">
					<option value="MWF">M-W-F</option>
					<option value="TTH">T-TH-</option>
					<option value="SAT">SAT</option>
					<option value="SUN">SUN</option>
				</select>
				<br/><br/>Time:
					<input type="text" name="subtime" placeholder="Enter subject time">
					<br/>
					<br/>
				<br/><br/>School Year:
					<input type="text" name="schoolyear" placeholder="Enter subject time">
					<br/>
					<br/>
				<br/><br/>Semester:
					<input type="text" name="semester" placeholder="Enter semester">
					<br/>
					<br/>
				<br/><br/>Term:
					<input type="text" name="term" placeholder="Enter term">
					<br/>
					<br/>
					

				<input type="hidden" value="<?php echo $student->student_id; ?>" name="st_id"/>
				<input type="hidden" value="<?php echo $student->yearlevel; ?>" name="yearlevel"/>
				<input type="hidden" value="<?php echo $student->set; ?>" name="set"/>
				
				<button type="submit">ADD</button>
				</form>
				<br/>
				<br/>
				<h4>Subject List:</h4>

				<table width="100%" border="1">
				<tr>
					<th>Code</th>
					<th>Description</th>
					<th>Teacher</th>
					<th>Control</th>
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
					<td>
						<form action="<?php echo base_url(); ?>admin/drop/<?php echo $subject->subject_code; ?>" method="post">
						<input type="hidden" value="<?php echo $student->student_id; ?>" name="student_id" />
						<button type="submit">Drop</button></form>
					</td>
		
				</tr>
				<?php endforeach; ?>
				</table>
				
				
			</div>
