	<div id="body">
	
		<div>
			<div class="featured">
				<h2>Add Student</h2>
				
				<?php 
				$sy = date("Y"); 
				$sy2 = $sy + 1; 
				$sy3 = $sy . '-' . $sy2;
				// echo $sy . '-' . $sy2;
				
				?>
				
				<form action="<?php echo base_url(); ?>admin/add_stud" method="post">
					<table width="100%">
						<tr>
							<td>
							ID Number: <br/>
							<input type="text" name="idnum" />
							</td>
						</tr>
						<tr>
							<td>
							Lastname: <br/>
							<input type="text" name="lname" /><br/>

							Firstname: <br/>
							<input type="text" name="fname" /><br/>

							Middlename: <br/>
							<input type="text" name="midname" /><br/>
							</td>
						</tr>
						<tr>
							<td>
								Sex: <br/>
								<select name="studsex">
									<option value=""></option>
									<option value="MALE">MALE</option>
									<option value="FEMALE">FEMALE</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
							Username: <br/>
							<input type="text" name="username" /><br/>

							Password: <br/>
							<input type="text" name="password" /><br/>
							</td>
						</tr>
						<tr>
							<td>
								Course: <br/>
								<input type="text" name="course" /><br/>
							</td>
							<td>
								Year Level: <br/>
								<select name="yearlevel">
									<option value=""></option>
									<option value="SH-GRADE 11">Grade 11</option>
									<option value="SH-GRADE 12">Grade 12</option>
									<option value="1">First Year</option>
									<option value="2">Second Year</option>
									<option value="3">Third Year</option>
									<option value="4">Fourth Year</option>
								</select>
							</td>
							<td>
								Set: <br/>
								<input type="text" name="set" /><br/>
							</td>
						</tr>
						<tr>
							<td>
							Address: <br/>
							<input type="text" name="studadd" /><br/>
							</td>
						</tr>
					</table>
					
					<br/>
					<br/>
					<br/>
					<input type="hidden" value="<?php echo $sy3; ?>" name="schoolyear"/>
					<button type="submit">Confirm</button>
				</form>
				
			</div>
