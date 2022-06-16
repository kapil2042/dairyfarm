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

<?php include "userdetails.php" ?>

<div class="container-fluid con">
  <div class="row over">
    <div class="col-8">
      <table class="table table-striped table-hover mt-3">
        <tr>
          <th>Cow Id</th>
          <th>date</th>
          <th>Milk Per day in ltr.</th>
        </tr>
        <?php
                include 'connect.php';
                $am=0;
                $sm=0;
                $k1=mysqli_query($conn,"SELECT * FROM milk_coll");
                while ($row=mysqli_fetch_assoc($k1)) {
                    $cid=$row['cid'];
                    $_date=$row['_date'];
                    $ava_milk=$row['ava_milk'];
                    $sold_milk=$row['sold_milk'];
                    echo "<tr>";
                    echo "<td>".$cid."</td>";
                    echo "<td>".$_date."</td>";
                    echo "<td>".$ava_milk."</td>";
                    echo "</tr>";
                    $am=$ava_milk+$am;
                }
                mysqli_query($conn,"UPDATE milk SET ava='$am'");
            ?>
            <tr>
              <td colspan="3" align="right"><b><font style="margin-right: 30px;">Total =<?php echo $am ?></font></b></td>
            </tr>
      </table>
    </div>
    <div class="col-4">
      <div class="db1">
      <table width=100% height=100% cellpadding=10px>
        <tr height=50%>
          <td style="color: #003333; align:center; font-size:25px;"><b></i> TOTAL SOLD MILK</b></td>
        </tr>
        <tr>
          <td style="color: #204060; font-size:40px;"align="center"><?php   $rs3=mysqli_query($conn,"SELECT * FROM milk");
                      $c=0;
                        while ($row=mysqli_fetch_assoc($rs3)) {
                        $c=$row['sold'];
                      } 
                      echo $c;?></td>
        </tr>
      </table>
    </div>
    <div class="db1">
      <table width=100% height=100% cellpadding=10px>
        <tr height=50%>
          <td style="color: #003333; align:center; font-size:25px;"><b></i> TOTAL AVAILABLE MILK</b></td>
        </tr>
        <tr>
          <td style="color: #204060; font-size:40px;"align="center"><?php   $rs3=mysqli_query($conn,"SELECT * FROM milk");
                      $d=0;
                        while ($row=mysqli_fetch_assoc($rs3)) {
                        $c=$row['ava'];
                        $d=$row['sold'];
                      } 
                      echo $c-$d;?></td>
        </tr>
      </table>
    </div>
  </div>
  </div>
  <div class="d-flex justify-content-end m-3">
    <a href="add_milkcol.php" class="btn btn-primary btn-lg" role="button">Add Milk</a>
  </div>
</div>

<?php
	include "foot.php";
?>