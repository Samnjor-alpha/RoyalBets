
<?php
$arrival = $_SESSION['from']; 
$departure = $_SESSION['to'];


 /*if(!isset($_POST['adults'])){
    message("Choose from Adults!", "error");  
    redirect(".WEB_ROOT. 'booking/");
    //exit;
 }*/
 /* if(isset($_POST['adults'])&&isset($_POST['child'])){
    $_SESSION['roomid']=$_POST['roomid'];
  $_SESSION['adults'] = $_POST['adults'];
  $_SESSION['child']  = $_POST['child'];
   */
  if (!isset($_SESSION['roomid'])){
    
 redirect(WEB_ROOT);
  }
 if (isset($_POST['clear'])){
  unset($_SESSION['roomid']);
  redirect(WEB_ROOT);

 }
 
?>


<!--End of Header-->
<div class="container">
  <?php include'../sidebar.php';?>

    <div class="col-xs-12 col-sm-9">
      <!--<div class="jumbotron">-->
        <div class="">
          <div class="panel panel-default">
            <div class="panel-body"> 
<div style="background-color:#C0C0C0">			
             <form action="" method="POST">
                 <?php //include'navigator.php';?>
                  <h3 align="center">MY BOOKING CART</h3>
                  <table class="table table-hover">
                  <thead>
              <tr  bgcolor="#c0c0c0">
              <th width="10">#</th>
              <th align="center" width="120">Room Type</th>
              <th align="center" width="120"></th>
              <th align="center" width="120"></th>
              <th align="center" width="120">Nights</th>
              <th  width="120">Price</th>
               <th align="center" width="120">Room</th>
              <th align="center" width="90">Amount</th>
			  
               
 
              
         
            </tr> 
          </thead>
          <tbody>
              
            <?php
             $arival   = $_SESSION['from']; 
              $departure = $_SESSION['to']; 
              $days = dateDiff($arival,$departure);
              $mydb->setQuery("SELECT *,typeName FROM room ro, roomtype rt WHERE ro.typeID = rt.typeID and roomNo =". $_SESSION['roomid']);
              $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
              echo '<tr>'; 
              echo '<td></td>';
              echo '<td>'. $result->typeName.'</td>';
              echo '<td>'.$arival.'</td>';
              echo '<td>'.$departure.'</td>';
              echo '<td>'.$days.'</td>';
              echo '<td >Ksh.'. $result->price.'</td>';
               echo '<td >1</td>';
                echo '<td >Ksh.'. $result->price.'</td>';
                

              
              echo '</tr>';
            } 
           $payable= $result->price *$days;
           $_SESSION['pay']= $payable;
            ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4"><h5><b>Order Total: Ksh.  <?php echo $_SESSION['pay'];?></b></h5></td><td colspan="5"> 
                            <div class="col-xs-12 col-sm-12" align="right">
                               <button type="submit" text-"danger" class="btn btn-danger" align="right"  name="clear">Clear Cart</button>
                               <?php
                                if (isset($_SESSION['guest_id'])){
                                  ?>
                                  <a href="<?php echo WEB_ROOT; ?>booking/index.php?view=payment" class="btn btn-danger"  align="right"name="continue">Continue Booking</a>
                                 <?php 
                                }else{ ?>
                                   <a href="<?php echo WEB_ROOT; ?>booking/index.php?view=info"class="btn btn-danger" align="right"name="continue">Continue Booking</a>
                               <?php
                                }

                               ?>
                                 
                            </div>
                   
            </td>
            </tr>
          </tfoot>  
        </table>
      </form>
            </div>
          </div>  
          
        </div>
    <!--  </div>-->
    </div>
    <!--/span--> 
    <!--Sidebar-->

  </div>
  <!--/row-->
</div>