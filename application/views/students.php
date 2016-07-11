	<div id="body">
		<div>
			<div class="featured">
				<h2>Students</h2>
				
				<form action="<?php echo base_url(); ?>admin/search" method="post">
				<input type="text" name="keyword" placeholder="Enter keyword.."/><button type="submit">Search</button>
				</form>

				| <a href="<?php echo base_url(); ?>admin/add_student">Add Students</a><br/>
				
				<h4>School Year: 
				<?php 
				$sy = date("Y"); 
				$sy2 = $sy + 1; 
				echo $sy . '-' . $sy2;
				?>
				</h4>
				
				<table width="100%" border="1">
				<tr>
					<th>ID No.</th>
					<th>Name</th>
					<th>Course</th>
					<th>Year Level</th>
				</tr>
				
				<?php foreach($students as $student) : ?>
				
				<tr>
					<td>
						<a href="<?php echo base_url(); ?>admin/get_student/<?php echo $student->student_id; ?>"><?php echo $student->student_id; ?></a>
					</td>
					<td>
						<?php echo $student->student_lastname . ', ' . $student->student_firstname; ?>
					</td>
					<td>
						<?php echo $student->course; ?>
					</td>
					<td>
						<?php echo $student->yearlevel; ?>
					</td>
				
				</tr>
				
				<?php endforeach; ?>
				</table>
				
				<br/>
				<br/>
				<br/>
				<form action="<?php echo base_url(); ?>admin/search_student/" method="post">
				Filter By:
				<select name="filter">
					<option value="schoolyear">School Year</option>
					<option value="course">Course</option>
				</select>
				<input type="text" name="keyword" placeholder="Enter keyword.." />
				<button type="submit">Go</button>
				</form>
			</div>
