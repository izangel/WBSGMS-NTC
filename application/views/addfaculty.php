	<div id="body">
		<div>
		
			<div class="featured">
			
				<h2>Add Faculty</h2>
				<form action="<?php echo base_url(); ?>admin/add_faculty" method="post">
				Faculty ID:<input type="text" name="faculty_id"><br/>
				Faculty Lastname:<input type="text" name="faculty_lastname"><br/>
				Faculty Firstname:<input type="text" name="faculty_firstname"><br/>
				Faculty Middlename:<input type="text" name="faculty_middlename"><br/>
				Sex:<select name="f_sex"><br/>
				<option value=""></option>
				<option value="MALE">MALE</option>
				<option value="FEMALE">FEMALE</option>
				</select>
				<br/>
				Username:<input type="text" name="user_name">
				<br/>
				Password:<input type="text" name="password">
				<input type="hidden" value="FACULTY" name="user_role">
				
				<br/>
				<br/>
				<br/>
				<button type="submit">Add</button>
				</form>
			</div>
