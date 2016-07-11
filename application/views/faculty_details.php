	<div id="body">
		<div>
			<div class="featured">
				<h2>FACULTY DETAILS</h2>
				<strong>
				<?php
					echo '<p>ID: ' . $faculty->faculty_id . '<br/>';
					echo 'Name: ' . $faculty->faculty_lastname . ', ' . $faculty->faculty_firstname . ' ' . $faculty->faculty_middlename . '<br/>';
					echo 'Sex: ' . $faculty->faculty_sex . '<br/></p>';
				?>
				</strong>
			</div>
