	<div id="body">
		<div>
			<div class="featured">
				<h2>Assign Students and Faculty</h2>
				
				School year: <?php $sy = date("Y") + 1; echo date("Y") . '-' . $sy; ?><br/><br/>
				<form action="<?php echo base_url(); ?>admin/assign_subs" method="post">
				<h4>Set Subjects for Faculty and Students</h4>
				Subject Code: <br/>
				<select name="scode">
					
					<?php
					foreach($subcodes as $subs) : ?>
					<option value="<?php echo $subs->subject_code; ?>"><?php echo $subs->subject_code; ?></option>
					<?php endforeach; ?>
					
				</select>
				<br/>
				<br/>
				Faculty: <br/>
				<select name="faculty">
					
					<?php
					foreach($faculties as $facs) : ?>
					<option value="<?php echo $facs->faculty_id; ?>"><?php echo $facs->faculty_lastname . ', ' . $facs->faculty_firstname; ?></option>
					<?php endforeach; ?>
					
				</select>
				<br/>
				<br/>
				Year Level: <br/>
				<select name="yearlevel">
					<option value="SH-GRADE 11">Grade 11</option>
					<option value="SH-GRADE 12">Grade 12</option>
					<option value="1">First Year</option>
					<option value="2">Secondary Year</option>
					<option value="3">Third Year</option>
					<option value="4">Fourth Year</option>
				</select>
				
				<br/>
				<br/>
				
				Time:
				<input type="text" name="subtime" /> <br/><br/>
				Day:
				<input type="text" name="subday" /> <br/><br/>
				Semester:
				<input type="text" name="semester" /> <br/><br/>
				Term:
				<input type="text" name="term" /> <br/><br/>
				
				Set: <br/>
				<input type="text" name="set" />
				<input type="hidden" value="<?php $sy = date("Y") + 1; echo date("Y") . '-' . $sy; ?>" name="schoolyear"/>
				<button type="submit">ASSIGN</button>
				</form>
				<br/>
				<br/>
				<br/>
				<br/>
				
				<!-- ------------------------------------------- -->
				
				<h4>Subjects</h4>
				<table width="100%" border="1">
				
					<tr>
						<th>Code</th>
						<th>Description</th>
						<th>Students Set</th>
						<th>Faculty</th>
					</tr>
					
					<?php foreach($faculty_subjects as $fac_subs) :
					$subcode = $fac_subs->subject_code;
					$subdes = $this->subject_model->get_subject_info($subcode);
					$faculty_id = $fac_subs->faculty_id;
					$facinfo = $this->faculty_model->get_faculty($faculty_id);
					?>
					
					<tr>
						<td>
							<?php echo $fac_subs->subject_code; ?>
						</td>
						<td>
							<?php echo $subdes->s_description; ?>
						</td>
						<td>
							<?php echo $fac_subs->set; ?>
						</td>
						<td>
							<?php echo $facinfo->faculty_lastname; ?>
						</td>
					</tr>
					
					<?php endforeach; ?>
					
				</table>
				
				<br/>
				<br/>
				
				
				
			</div>
