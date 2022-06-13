	<div class="modal fade"  id="mylogin" aria-labelledby="myloginlable" aria-hidden="true" style="opacity: 85%;">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myloginlable"><b>Login</b></h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<label>
							<?php
            					if (isset($_GET["err"])) {
              						if($_GET["err"]==4){
                						echo '<script> if((alert("Username or Password Wrong!!"))!=0){window.location.href ="index.php";}</script>';
				                	}
				              	}
				            ?>
						</label>
						<form action="loginchk.php" method="post" class="form-control">
						<div class="form-group">
							<label><i class="fa fa-user" aria-hidden="true"></i> Username:</label><br>
							<input type="text" name="lunm" class="form-control" required>
						</div>
            <br>
						<div class="form-group">
							<label><i class="fa fa-lock" aria-hidden="true"></i> Password:</label><br>
							<input type="password" name="lpwd" class="form-control" required>
						</div>
            <br>
						<div class="text-end"><a class="link-dark" href="#" data-bs-target="#create" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fa fa-link" aria-hidden="true"></i> Create Account</a></div>
					</div>
					<div class="modal-footer justify-content-center">
						<button type="submit" class="btn btn-success">Login</button>
						<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
					</div>
				</form>
			</div>
		</div>
	</div>