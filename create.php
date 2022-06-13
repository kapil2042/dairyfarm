  <div class="modal fade"  id="create" aria-labelledby="createlable" aria-hidden="true" style="opacity: 85%;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        
          <div class="modal-header">
            <h4 class="modal-title" id="createlable"><b>Create Account</b></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <label>
            <?php
            if (isset($_GET["err"])) {
              if($_GET["err"]==1){
                echo '<script> if((alert("Password And Confirm Password Is Diffrent"))!=0){
                  window.location.href = "index.php";
                }</script>';
              }
              if($_GET["err"]==3){
                echo '<script> if((alert("Username or Mobile Number already exist!!"))!=0){
                  window.location.href = "index.php";
                }</script>';
              }
              if($_GET["err"]==2){
                echo '<script> if((alert("Account Created Successfully!!  Please login to continue"))!=0){
                  window.location.href = "index.php";
                }</script>';
              }
            }
            ?>
            </label>
            <form action="add_data.php" method="post" class="form-control">
            <div class="form-group">
              <label><i class="fa fa-user-circle" aria-hidden="true"></i> Your Name:</label><br>
              <input type="text" name="ynm" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
              <label><i class="fa fa-mobile" aria-hidden="true"></i> Mobile No:</label><br>
              <input type="text" name="mn" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
              <label><i class="fa fa-user" aria-hidden="true"></i> Username:</label><br>
              <input type="text" name="unm" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
              <label><i class="fa fa-lock" aria-hidden="true"></i> Password:</label><br>
              <input type="password" name="pwd" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
              <label><i class="fa fa-unlock-alt" aria-hidden="true"></i> Confirm Password:</label><br>
              <input type="text" name="cpwd" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-primary">Create</button>
            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
          </div>
        </form>
      </div>
    </div>
  </div>