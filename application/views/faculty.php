	<div id="body">
		<div>
			<div class="featured">
				<h2>FACULTY</h2>
				
				<table width="100%" border="1">
					<tr>
						<th>ID</th>
						<th>Name</th>
					</tr>
					<?php foreach($faculty_list as $faculty) : ?>
					<tr>
						<td>
							<a href="<?php echo base_url() . 'faculty/get_faculty_details/' . $faculty->faculty_id; ?>"><?php echo $faculty->faculty_id; ?></a>
						</td>
						<td>
							<?php echo $faculty->faculty_lastname . ', ' . $faculty->faculty_firstname; ?>
						</td>						
					</tr>
					<?php endforeach; ?>
				</table>
				<br/>
				<br/>
				<br/>
							<a href="<?php echo base_url(); ?>admin/addfaculty" >Add Faculty</a>
			</div>
