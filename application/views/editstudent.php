	<div id="body">
		<div>
			<div class="featured">
				<h2>Edit Profile</h2>
				<form action="<?php echo base_url(); ?>admin/update/<?php echo $student->student_id; ?>" method="post">
				<h4>ID No: <?php echo $student->student_id; ?><br/>
				<br/>Last Name: <br/><input type="text" name="lname" value="<?php echo $student->student_lastname; ?>" /><br/>
				<br/>First Name: <br/><input type="text" name="fname" value="<?php echo $student->student_firstname; ?>" /><br/>
				<br/>Middle Name: <br/><input type="text" name="mname" value="<?php echo $student->student_middlename; ?>" /><br/>
				<br/>Sex:<br/> <input type="text" name="sex" value="<?php echo $student->student_sex; ?>"/><br/>
				<br/>Course:<br/> <input type="text" name="course" value="<?php echo $student->course; ?>" /><br/>
				<br/>Year Level:<br/> <input type="text" name="yearlevel" value="<?php echo $student->yearlevel; ?>"/><br/>
				<br/>Set: <br/><input type="text" name="set" value="<?php echo $student->set; ?>" /><br/>
				
				<br/>
				<br/>
				<button type="submit">Save</button>
				</form>
			</div>
