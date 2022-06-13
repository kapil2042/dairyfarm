<?php
	include "head.php";
?>
    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
      		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
        		<li class="nav-item">
          			<a class="nav-link" href="dashboard.php" data-bs-toggle="modal" data-bs-target="#exampleModal">Dashboard</a>
        		</li>
        		<li class="nav-item dropdown">
          			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="modal" data-bs-target="#exampleModal">Information</a>
          			<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
            			<li><a class="dropdown-item" href="cowinfo.php">Cow</a></li>
            			<li><a class="dropdown-item" href="staffinfo.php">Staff</a></li>
          			</ul>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link" href="fm.php" data-bs-toggle="modal" data-bs-target="#exampleModal">Feed Monitoring</a>
        		</li>
        		<li class="nav-item dropdown">
          			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="modal" data-bs-target="#exampleModal">Sale</a>
          			<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
            			<li><a class="dropdown-item" href="milksale.php">Milk</a></li>
            			<li><a class="dropdown-item" href="cowsale.php">Cow</a></li>
            		</ul>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link" href="milkcol.php" data-bs-toggle="modal" data-bs-target="#exampleModal">Milk Collection</a>
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

<?php include "login.php" ?>

<?php include "create.php" ?>


<div class="modal fade" id="exampleModal" tabindex="-2" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true" style="opacity: 90%;">
  <div class="modal-dialog" style="background-color: red;">
    <div class="modal-content">
      <div class="modal-header">
        <font style="font-size: 20px" class="modal-title " id="exampleModalLabel">Alert !  <i style="color: #ffff00;" class="fa fa-exclamation-triangle" aria-hidden="true"></i></font>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: red;"></button>
      </div>
      <div class="modal-body">
        <font color="blue"><b>First Login To Access This Site!!</b></font>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancle</button>
        <button type="button" class="btn btn-secondary" data-bs-target="#mylogin" data-bs-toggle="modal" data-bs-dismiss="modal">Login</button>
      </div>
    </div>
  </div>
</div>

<div id="demo" class="carousel slide" data-bs-ride="carousel">


  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/1.jpg" class="d-block" style="width:100%">
      <div class="carousel-caption">
        <h3>Welcome To Dairy Farm</h3>
        <p><b>Please Login To Access This Site</b></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/2.jpg" class="d-block" style="width:100%">
      <div class="carousel-caption">
        <h3>Login Please</h3>
        <p>Thank you!</p>
      </div> 
    </div>
    <div class="carousel-item">
      <img src="images/3.jpg" class="d-block" style="width:100%">
      <div class="carousel-caption">
        <h3>Dairy Farm</h3>
        <p>Please Login To Access This Site</p>
      </div>  
    </div>
  </div>
  
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>


<?php
	include "foot.php";
?>