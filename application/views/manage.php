	<div id="body">
		<div>
			<div class="featured">
				<h2>Manage Subjects</h2>
				
				<h4>Add Subject</h4><br/>
				<form action="<?php echo base_url(); ?>admin/add_subject" method="post">
				Subject Code: <input type="text" name="scode" /><br/>
				Subject Description: <input type="text" name="sdes" /><br/>
				Units: <input type="text" name="sunit" /><br/><br/>
				<button type="submit">ADD SUBJECT</button>
				</form><br/><br/><br/>
				
				<h4>Subject Lists</h4>
				<table width="100%" border="1">
				<tr>
					<th>Subject Code</th>
					<th>Description</th>
					<th>Unit</th>
				</tr>
				
				<?php foreach($sublist as $subs) : ?>
				<tr>
					<td><?php echo $subs->subject_code; ?></td>
					<td><?php echo $subs->s_description; ?></td>
					<td><?php echo $subs->s_units; ?></td>
				</tr>
				<?php endforeach; ?>
				</table>
			</div>
