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
          			<a class="nav-link active" href="milkcol.php">Milk Collection</a>
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
  if (isset($_POST['milk_cn'])) {
    $milk_cn=$_POST['milk_cn'];
    $milk=$_POST['milk'];
    $d=$_POST['d'];
      $qry="INSERT into milk_coll(cid,_date,ava_milk) values('$milk_cn','$d','$milk');";
      $rs=mysqli_query($conn,$qry);
      if ($rs>0) {
        echo '<script> if((alert("Record Insert Successfully"))!=0){window.location.href = "milkcol.php";}</script>';
      }
  }
?>

<div class="container-fluid con">
  <div class="row over1 d-flex justify-content-center">
    <div class="col-6 mt-5">
      <form method="post">
        <table class="table table-borderless">
          <tr>
            <td><label>Milk By Cow Number:</label></td>
            <td><select name="milk_cn" class="form-control">
                            <?php
                                include 'connect.php';
                                $qry3="SELECT * FROM cow_info";
                                $rs3=mysqli_query($conn,$qry3);
                                while ($row3=mysqli_fetch_assoc($rs3)) {  
                                    if ($row3['status']=="Available!") {
                                      echo "<option>".$row3['cid']."</option>";
                                    }                 
                                }
                            ?>
                        </select></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td><lable class="form-lable">Milk per day In ltr:</lable></td>
            <td><input type="text" name="milk" class="form-control" required></td>
          </tr>
          <tr><td></td></tr>
          <tr>
            <td><lable class="form-lable">Date:</lable></td>
            <td><input type="date" name="d" class="form-control" required></td>
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