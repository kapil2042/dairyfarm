<?php 
  include 'connect.php';
  $qry="SELECT * from logindetails;";
  $rs=mysqli_query($conn,$qry);
  while ($val=mysqli_fetch_assoc($rs)) {
    $u=$val["username"];
    $n=$val["name"];
    $m=$val["mobileNo"];
  }
?>

  <div class="modal fade"  id="myacc" aria-labelledby="ulable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        
          <div class="modal-header">
            <h4 class="modal-title" id="ulable"><b>Admin Details</b></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <form action="logout.php" method="post" class="form-control">
            <div class="form-group text-center">
              <label><i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i></label>
            </div>
            <br>
            <div class="form-group">
              <label><i class="fa fa-user" aria-hidden="true"></i> Username:</label><br>
              <input type="text" name="unm" class="form-control" value="<?php echo $u;?>" readonly>
            </div>
            <br>
            <div class="form-group">
              <label><i class="fa fa-user-circle" aria-hidden="true"></i> Name:</label><br>
              <input type="text" name="ynm" class="form-control" value="<?php echo $n;?>" readonly>
            </div>
            <br>
            <div class="form-group">
              <label><i class="fa fa-mobile" aria-hidden="true"></i> Mobile No:</label><br>
              <input type="text" name="mn" class="form-control" value="<?php echo $m;?>" readonly>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Log Out</button>
            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
          </div>
        </form>
      </div>
    </div>
  </div>