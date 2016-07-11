<?php
	if (isset($this->session->userdata['logged_in'])) {
		$uid = ($this->session->userdata['logged_in']['userid']);
		$uname = ($this->session->userdata['logged_in']['username']);
		$urole = ($this->session->userdata['logged_in']['role']);
		$firstname = ($this->session->userdata['logged_in']['fname']);
	} else {
		$uid = null;
		$uname = null;
		$urole = null;
		$firstname = null;
	}
?>

			<div class="section">
				<div class="article">
				
				<?php
					if($uname != null){ // naay users
						// welcome and navbars are shown
						echo '<h2>Welcome ' . $firstname . '</h2>';
						echo '<p>';
						if($urole == 'ADMINISTRATOR'){
							// ------- ADMIN -----
							echo '<a href="' . base_url() . 'grades">View Passed Grades</a><br/>';
							echo '<a href="' . base_url() . 'grades/view_all">View all Grades</a><br/>';
							echo '<a href="'  . base_url(). 'admin/submit/' . $uid . '">Submit Grades</a><br/>'; 
							
							echo '<a href="' . base_url() . 'admin/students_list">View Students</a><br/>';
							echo '<a href="' . base_url() . 'faculty">View Faculty</a><br/>';
							echo '<a href="' . base_url() . 'admin/assign">Assign Students and Faculty</a><br/>';
							
							echo '<a href="' . base_url() . 'admin/manage">Manage Subjects</a><br/>'; //// ----
							// --------------------
						} elseif($urole == 'FACULTY') {
							// ------- FACULTY -----
							//echo '<a href="' . base_url() . 'faculty/get_mysubs/' . $uid . '">View my Subjects</a><br/>';
							echo '<a href="'  . base_url(). 'admin/submit/' . $uid . '">View My Subjects List</a><br/>'; 
							
							
						} else {
							// ------- STUDENT -----
							echo '<a href="' . base_url() . 'students/mygrade/' . $uid . '">View My Grades</a><br/>';
						
						}
						echo '</p>';
					} else { // walay users -----------------
						echo '<h2>Welcome Guest!</h2>';
						echo '<p>';
						echo '<form action="' . base_url() . 'home/login" method="post">';
						echo '<input type="text" name="username" placeholder="Enter Username" />';
						echo '<input type="password" name="password" placeholder="Enter Password" /><br/>';
						echo '<button>Login</button></form>';
						echo '</p>';
					}
				?>
				
				
				<!-- hidden -->
				
				<input type="hidden" value="<?php echo $uid; ?>" name="user_id" />
				
				</div>
				
			</div>
		</div>
	</div>