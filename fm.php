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
          			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">Information</a>
          			<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
            			<li><a class="dropdown-item" href="cowinfo.php">Cow</a></li>
            			<li><a class="dropdown-item" href="staffinfo.php">Staff</a></li>
          			</ul>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link active" href="fm.php">Feed Monitoring</a>
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

<?php include "userdetails.php" ?>

<div class="container-fluid con">
  <div class="row over">
    <div class="col-12">
      <table class="table table-striped table-hover mt-3">
        <tr>
          <th>Cow Id</th>
          <th>Date</th>
          <th>Feed Time</th>
          <th>By Emp Id</th>
          <th>#</th>
        </tr>
        <?php
                include 'connect.php';
                $k1=mysqli_query($conn,"SELECT * FROM fm");
                while ($row=mysqli_fetch_assoc($k1)) {
                    $cnum=$row['cnum'];
                    $date_fm=$row['date_fm'];
                    $feedtime=$row['feedtime'];
                    $empid=$row['empid'];
                    $fmid=$row['fmid'];
                    echo "<tr>";
                    echo "<td>".$cnum."</td>";
                    echo "<td>".$date_fm."</td>";
                    echo "<td>".$feedtime."</td>";
                    echo "<td>".$empid."</td>";
                    echo "<td><a href='edit.php?fmid=$fmid&cnum=$cnum&datefm=$date_fm&feedtime=$feedtime&empid=$empid' class='link-success'><i class='fa fa-pencil' aria-hidden='true'></i>Edit</a>&nbsp;&nbsp;&nbsp;<a href='#' class='link-danger'><i class='fa fa-trash' aria-hidden='true'></i>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
      </table>
    </div>
  </div>
  <div class="d-flex justify-content-end m-3">
    <a href="add_fm.php" class="btn btn-primary btn-lg" role="button">Add</a>
  </div>
</div>


<?php
	include "foot.php";
?>