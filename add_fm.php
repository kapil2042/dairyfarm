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

<?php 
  include "userdetails.php";
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
                                  if ($row1['status']=="Available!") {
                                    echo "<option>".$row1['cid']."</option>";
                                  }
                                }
                            ?>
                        </select></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td><lable class="form-lable">Date:</lable></td>
            <td><input type="date" name="dfm" class="form-control" required></td>
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
	include "foot.php";
?>