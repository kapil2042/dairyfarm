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
?>

<?php
if (isset($_GET['e_id'])) {
  $c=$_GET['e_id'];
  include "connect.php";
  if (isset($_POST['snm'])) {
    $nm=$_POST['snm'];
    $mn=$_POST['smn'];
    $s=$_POST['salary'];
      $qry="UPDATE staf_info SET name = '$nm' , mobile_number = '$mn' , salary = '$s' WHERE emp_id = '$c';";
      $rs=mysqli_query($conn,$qry);
      if ($rs>0) {
        echo '<script> if((alert("Record Updated Successfully"))!=0){window.location.href = "staffinfo.php";}</script>';
      }
  }
?>


<div class="container-fluid con">
  <div class="row over1 d-flex justify-content-center">
    <div class="col-6 mt-5">
      <form method="post">
        <table class="table table-borderless">
          <tr>
            <td><lable class="form-lable">Staff ID:</lable></td>
            <td><input type="text" class="form-control" value="<?php echo $_GET['e_id'] ?>" readonly></td>
          </tr>
          <tr>
            <td><lable class="form-lable">Name:</lable></td>
            <td><input type="text" name="snm" class="form-control" value="<?php echo $_GET['snm'] ?>" required></td>
          </tr>
          <tr><td></td></tr>
          <tr>
            <td><lable class="form-lable">Mobile Number:</lable></td>
            <td><input type="text" name="smn" class="form-control" value="<?php echo $_GET['smn'] ?>" required></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td><label class="form-lable">Salary:</label></td>
            <td><input type="text" name="salary" value="<?php echo $_GET['salary'] ?>" class="form-control" required></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td align="right"><input type="submit" value="UPDATE" name="btn" class="btn btn-primary"></td>
            <td><input type="reset" name="can" value="cancle" class="btn btn-danger"></td>
          </tr>
        </table>
      </form> 
    </div>
  </div>
</div>
<?php
}
?>



<?php
if (isset($_GET['c_id'])) {
  $c=$_GET['c_id'];
  include "connect.php";
  if (isset($_POST['gen'])) {
    $gen=$_POST['gen'];
    $dob=$_POST['dob'];
    $status=$_POST['status'];
      $qry="UPDATE cow_info SET gender = '$gen' , dob = '$dob' , status = '$status' WHERE cid = '$c';";
      $rs=mysqli_query($conn,$qry);
      if ($rs>0) {
        echo '<script> if((alert("Record Updated Successfully"))!=0){window.location.href = "cowinfo.php";}</script>';
      }
  }
?>


<div class="container-fluid con">
  <div class="row over1 d-flex justify-content-center">
    <div class="col-6 mt-5">
      <form method="post">
        <table class="table table-borderless">
          <tr>
            <td><lable class="form-lable">Cow ID:</lable></td>
            <td><input type="text" class="form-control" value="<?php echo $_GET['c_id'] ?>" readonly></td>
          </tr>
          <tr>
            <td><lable class="form-lable">Gender Of Cow:</lable></td>
            <td><?php $g=$_GET['gen']; if ($g=="Male") { ?>
              <input type="radio" class="form-check-input" name="gen" value="Male" placeholder="Male" checked="checked"> Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="form-check-input" name="gen" value="Female" placeholder="Male"> Female <?php } else{ ?>
                <input type="radio" class="form-check-input" name="gen" value="Male"> Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="form-check-input" name="gen" value="Female" checked="checked"> Female <?php } ?>
              
          </tr>
          <tr><td></td></tr>
          <tr>
            <td><lable class="form-lable">Date Of Birth:</lable></td>
            <td><input type="date" name="dob" class="form-control" value="<?php echo $_GET['dob'] ?>" required></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td><label class="form-lable">Status:</label></td>
            <td><select name="status" class="form-control">
                            <option selected value="Available!">Available!</option>
                            <option value="Sold!">Sold!</option></select>
            </td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td align="right"><input type="submit" value="UPDATE" name="btn" class="btn btn-primary"></td>
            <td><input type="reset" name="can" value="cancle" class="btn btn-danger"></td>
          </tr>
        </table>
      </form> 
    </div>
  </div>
</div>
<?php
}
?>



<?php
if (isset($_GET['fmid'])) {
  $c=$_GET['fmid'];
  include "connect.php";
  if (isset($_POST['cnum'])) {
    $cnum=$_POST['cnum'];
    $dfm=$_POST['dfm'];
    $ft=$_POST['ft'];
    $fmsn=$_POST['fmsn'];
      $qry="INSERT into fm(cnum,date_fm,feedtime,empid) values('$cnum','$dfm','$ft','$fmsn');";
      $rs=mysqli_query($conn,$qry);
      if ($rs>0) {
        echo '<script> if((alert("Record Insert Successfully"))!=0){window.location.href = "fm.php";}</script>';
      }
  }
?>

<div class="container-fluid con">
  <div class="row over1 d-flex justify-content-center">
    <div class="col-6 mt-5">
      <form method="post">
        <table class="table table-borderless">
          <tr>
            <td><label>Cow Number:</label></td>
            <td><select name="cnum" class="form-control">
                            <?php
                                include  'connect.php';
                                $qry1="SELECT * FROM cow_info";
                                $rs1=mysqli_query($conn,$qry1);
                                while ($row1=mysqli_fetch_assoc($rs1)) {                  
                                        echo "<option>".$row1['cid']."</option>";
                                }
                            ?>
                        </select></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td><lable class="form-lable">Date:</lable></td>
            <td><input type="date" name="dfm" class="form-control" value="<?php echo $_GET['datefm'] ?>" required></td>
          </tr>
          <tr><td></td></tr>
          <tr>
            <td><lable class="form-lable">Feed Time:</lable></td>
            <td><select class="form-control" name="ft"><option>Every 10:00 AM</option>
              <option>Every 1:00 PM</option><option>Every 6:00 PM</option></select></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td><label>Feed by Staff Id:</label></td>
            <td><select name="fmsn" class="form-control">
                            <?php
                                include  'connect.php';
                                $qry2="SELECT * FROM staf_info";
                                $rs2=mysqli_query($conn,$qry2);
                                while ($row2=mysqli_fetch_assoc($rs2)) {                  
                                        echo "<option>".$row2['emp_id']."</option>";
                                }
                            ?>
                        </select></td>
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
}
?>




<?php
	include "foot.php";
?>