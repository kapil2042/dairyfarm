<?php 
  if (isset($_POST['sale_cow'])) {
    $sale_cid=$_POST['sale_cid'];
    $sale_amount=$_POST['sale_amount'];
    $sale_date=$_POST['sale_date'];
    $sale_cnm=$_POST['sale_cnm'];
    $sale_mn=$_POST['sale_mn'];
      $qry="INSERT into cow_sale(sale_cid,sale_amount,sale_date,sale_cnm,sale_mn) values('$sale_cid','$sale_amount','$sale_date','$sale_cnm','$sale_mn');";
      $rs=mysqli_query($conn,$qry);
      if ($rs>0) {
        mysqli_query($conn,"UPDATE cow_info SET status='Sold!' WHERE cid = '$sale_cid'");
        echo '<script> if((alert("Cow Sold"))!=0){window.location.href = "cowsale.php";}</script>';
      }
  }
?>


  <div class="modal fade"  id="salecow" aria-labelledby="salec" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        
          <div class="modal-header">
            <h4 class="modal-title" id="salec"><b>Sale Cow</b></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <form method="post" class="form-control">
            <div class="form-group">
              <label>Cow Id:</label><br>
              <select name="sale_cid" class="form-control">
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
                        </select>
            </div>
            <br>
            <div class="form-group">
              <label>Amount:</label><br>
              <input type="text" name="sale_amount" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
              <label>Date:</label><br>
              <input type="date" name="sale_date" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
              <label>Customer Name:</label><br>
              <input type="text" name="sale_cnm" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
              <label>Mobile Number:</label><br>
              <input type="text" name="sale_mn" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-primary" name="sale_cow">Sale Cow</button>
            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
          </div>
        </form>
      </div>
    </div>
  </div>


<?php 
  if (isset($_POST['sale_milk'])) {
    $salem_qty=$_POST['salem_qty'];
    $salem_date=$_POST['salem_date'];
    $salem_cnm=$_POST['salem_cnm'];
    $salem_mn=$_POST['salem_mn'];
    $k1=mysqli_query($conn,"SELECT * FROM milk");
    while ($row12=mysqli_fetch_assoc($k1)) {
                    $sold=$row12['sold'];
                  }
      $qry="INSERT into milk_sale(salem_cnm,salem_mn,salem_qty,salem_date) values('$salem_cnm','$salem_mn','$salem_qty','$salem_date');";
      $rs=mysqli_query($conn,$qry);
      $abcd=$sold+$salem_qty;
      if ($rs>0) {
        mysqli_query($conn,"UPDATE milk SET ava='$abc',sold='$abcd'");
        echo '<script> if((alert("Milk Sold"))!=0){window.location.href = "milksale.php";}</script>';
      }
  }
?>



  <div class="modal fade"  id="salemilk" aria-labelledby="salem" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        
          <div class="modal-header">
            <h4 class="modal-title" id="salem"><b>Sale Milk</b></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <form method="post" class="form-control">
            <div class="form-group">
              <label>Customer Name:</label><br>
              <input type="text" name="salem_cnm" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
              <label>Mobile Number:</label><br>
              <input type="text" name="salem_mn" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
              <label>Date:</label><br>
              <input type="date" name="salem_date" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
              <label>How Many liter buy:</label><br>
              <input type="text" name="salem_qty" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-primary" name="sale_milk">Sale</button>
            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
          </div>
        </form>
      </div>
    </div>
  </div>