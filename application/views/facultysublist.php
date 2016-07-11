	<div id="body">
		<div>
			<div class="featured">
				<h2>Subject List</h2>
				
				
				<table width="100%" border="1">
					<tr>
						<th>Subject Code</th>
						<th>Control</th>
					</tr>
					<?php foreach($facultysubjects as $subs) : ?>
					<tr>
						<td>
							<?php echo $subs->subject_code; ?>
						</td>
						
						<td>
							<form action="<?php echo base_url(); ?>faculty/subject/<?php echo $subs->subject_code; ?>" method="post">
							<input type="hidden" value="<?php echo $subs->subject_code; ?>" name="subject_code">
							
							<button type="submit">View</button>
							</form>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
				
				
			</div>
