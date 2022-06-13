<?php
  include "head.php";
  if (!isset($_SESSION['nm'])) {
    echo '<script> if((alert("Firts login to access this site"))!=0){window.location.href ="index.php";}</script>';
    die();
  }
?>
    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
      		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
        		<li class="nav-item">
          			<a class="nav-link" href="dashboard.php">Dashboard</a>
        		</li>
        		<li class="nav-item dropdown">
          			<a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">Information</a>
          			<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
            			<li><a class="dropdown-item" href="cowinfo.php">Cow</a></li>
            			<li><a class="dropdown-item active" href="staffinfo.php">Staff</a></li>
          			</ul>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link" href="fm.php">Feed Monitoring</a>
        		</li>
        		<li class="nav-item dropdown">
          			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">Sale</a>
          			<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
            			<li><a class="dropdown-item" href="milksale.php">Milk</a></li>
            			<li><a class="dropdown-item" href="cowsale.php">Cow</a></li>
            		</ul>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link" href="milkcol.php">Milk Collection</a>
        		</li>
      		</ul>
          <?php if (isset($_SESSION['nm'])) {
            ?>
      		<ul class="nav navbar-nav navbar-right">
      			<li class="nav-item"><a href="#" class="nav-link" data-bs-target="#myacc" data-bs-toggle="modal"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $_SESSION['nm']; ?></a></li>
      		</ul>
          <?php } 
          else{
          ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item"><a href="#" class="nav-link" data-bs-target="#mylogin" data-bs-toggle="modal"><i class="fa fa-user" aria-hidden="true"></i>  Login</a></li>
          </ul>
        <?php } ?>
    	</div>
  	</div>
</nav>

<?php 
  include "userdetails.php";
  include "connect.php";
  if (isset($_POST['snm'])) {
    $nm=$_POST['snm'];
    $mn=$_POST['smn'];
    $s=$_POST['salary'];
      $qry="INSERT into staf_info(name,mobile_number,salary) values('$nm','$mn','$s');";
      $rs=mysqli_query($conn,$qry);
      if ($rs>0) {
        echo '<script> if((alert("Record Insert Successfully"))!=0){window.location.href = "staffinfo.php";}</script>';
      }
  }
?>


<div class="container-fluid con">
  <div class="row over1 d-flex justify-content-center">
    <div class="col-6 mt-5">
      <form method="post">
        <table class="table table-borderless">
          <tr>
            <td><lable class="form-lable">Name:</lable></td>
            <td><input type="text" name="snm" class="form-control" placeholder="Name" required></td>
          </tr>
          <tr><td></td></tr>
          <tr>
            <td><lable class="form-lable">Mobile Number:</lable></td>
            <td><input type="text" name="smn" class="form-control" placeholder="Mobile Number" required></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td><label class="form-lable">Salary:</label></td>
            <td><input type="text" name="salary" placeholder="Salary" class="form-control" required></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td align="right"><input type="submit" value="Add" name="btn" class="btn btn-primary"></td>
            <td><input type="reset" name="can" value="cancle" class="btn btn-danger"></td>
          </tr>
        </table>
      </form> 
    </div>
  </div>
</div>


<?php
	include "foot.php";
?>