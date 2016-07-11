	<div id="body">
		<div>
			<div class="featured">
				<h2>Subject List</h2>
				
				<table width="100%" border="1">
				<tr>
					<th>Code</th>
					<th>Set</th>
					<th>Year Level</th>
					<th>Control</th>
				
				</tr>
					<?php foreach($faculty_subjects as $f_subs) : ?>
					<form action="<?php echo base_url(); ?>admin/setsubject" method="post">
				<tr>
					<td>
						<?php echo $f_subs->subject_code; ?><input type="hidden" value="<?php echo $f_subs->subject_code; ?>" name="subs" />
					</td>
					<td>
						<?php echo $f_subs->set; ?> <input type="hidden" value="<?php echo $f_subs->set; ?>" name="set" />
					</td>
					<td>
						<?php echo $f_subs->yearlevel; ?>
					</td>
					<td>
						<input type="hidden" value="<?php echo $f_id; ?>" name="facultyyy" />
						<button type="submit">Go</button>
					</td>
				</tr>
					</form>
					<?php endforeach; ?>
					
				</table>
			</div>
