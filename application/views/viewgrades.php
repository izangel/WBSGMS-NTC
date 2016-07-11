	<div id="body">
		<div>
			<div class="featured">
				<h2>Grades List</h2>
				
					<form action="<?php echo base_url(); ?>grades/search_grades" method="post">
					Search By:
					<select name="filter">
						<option value="schoolyear">School Year</option>
						<option value="studentname">Student ID</option>
					</select>
					<input type="text" name="keyword" />
					<button type="submit">Search</button>
					</form>
					
					<br/><br/>
					
					<table width="100%" border="1">
					
						<tr>
							<th>Subject</th>
							<th>Faculty</th>
							<th>Year Level</th>
							<th>Set</th>
							<th>Control</th>
						</tr>
						
						<?php foreach($grades as $grade) : 
						$faculty_id = $grade->faculty_id;
						$fac = $this->faculty_model->get_faculty($faculty_id);
						
						?>
						
						<tr>
							<form action="<?php echo base_url(); ?>grades/get_students_list" method="post">
								<td><?php echo $grade->subject_code; ?></td>
								<td> <?php echo $fac->faculty_lastname . ', ' . $fac->faculty_firstname; ?></td>
								<td> <?php echo $grade->yearlevel; ?></td>
								<td> <?php echo $grade->set; ?></td>
								
								</td>
								<td>
								<input type="hidden" value="<?php echo $grade->subject_code; ?>" name="subject_code"/>
								<input type="hidden" value="<?php echo $grade->faculty_id; ?>" name="faculty_id"/>
								<button type="submit">Go</button>
								</td>
							</form>
						</tr>
						<?php endforeach; ?>
					</table>
				
			</div>
