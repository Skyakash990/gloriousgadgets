<?php
    include('../config/dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">-->
  <link rel="stylesheet" href="..\assets\flickity\flickity.min.css">
  <link rel="website icon" type="png" href="./assets/img/websiteicon.png">
  <link rel="stylesheet" href="../bootstrap-5.2.2-dist/css/bootstrap.css">  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <link rel="stylesheet" href="./Assets/style/s4.css">

  <title>Admin Panel</title>
</head>

<body>

  <?php
      if(isset($_GET['id']))
      {
          $id=$_GET['id'];
          $query="select * from orders where id='$id'";
          
          $sn=1;
          $run=mysqli_query($con,$query);
          if($run==true)
          {
            $count=mysqli_num_rows($run);
            if($count==1)
            {
              while($result=mysqli_fetch_assoc($run))
              {
                $id=$result['id'];
                $name=$result['name'];
                $email=$result['email'];
                $pincode=$result['pincode'];
                $phone=$result['phone'];
                $address=$result['address'];
                $order_date=$result['created_at'];
                $total_price=$result['total_price'];
                $tracking_no=$result['tracking_id'];
               
              }
            }
          }
      }
      else
      {
        echo "<script>window.location='orders.php';</script>";
      }
?>

  <section id="about">
    <div class="container p-1 d-flex justify-content-center ">

      <div class="row justify-content-center" id="invoice">
        <div class="col-md-10">

          <form action="" id="myfrm">
            <div class="wrapper">
              <table class="table table-bordered border-3 mt-5">
                <thead class="bill-text text-center">
                  <tr>
                    <td colspan="5">
                     
                      <b class="card-text">Paliyad Road,botad,India,364710</b> <br>
                  </tr>
                </thead>

                <thead class="card-text">
                  <tr>
                    <td colspan="4">
                      <b>Customer Name: </b>
                      <?php echo $name; ?><br>
                      <b>Address: </b>
                      <?php echo $address?><br>
                      <b>Mobile No. </b>
                      <?php echo $phone; ?>
                    </td>
                    <td>date:
                      <?php echo $order_date; ?><br>
                      Bill No.:
                      <?php echo $id; ?><br>
                      
                    </td>
                  </tr>
                </thead>
                <thead>
                  <tr class="bill-header">
                    <th scope="col">Sr.No.</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Qauntity</th>
                    <th scope="col">Price</th>
                  </tr>
                </thead>
                
                <tbody class="bill-text">
                  <tr>
                    <td>
                    <?php
    $order_query = "SELECT o.id as oid, o.tracking_id, o.user_id, oi.*, oi.qty as orderqty, p.* FROM orders o, order_items oi, products p WHERE oi.order_id=o.id AND p.id=oi.prod_id AND o.tracking_id='$tracking_no' ";
    $order_query_run = mysqli_query($con, $order_query);
    if (mysqli_num_rows($order_query_run) > 0) {
        foreach ($order_query_run as $item) {
            ?>
            <tr>

                <td class=" align-middle"><?= $item['id']; ?></td>
                <td class=" align-middle"><?= $item['name']; ?></td>
                <?php
                $orderqty = "SELECT * FROM order_items WHERE order_id='" . $item['oid'] . "'";
                $orderqty_query_run = mysqli_query($con, $orderqty);
                if (mysqli_num_rows($orderqty_query_run) > 0) {
                    foreach ($orderqty_query_run as $data) {
                        ?>
                        <td class=" align-middle"><?= $data['qty']; ?></td>
                        <?php
                    }
                }

                ?>
                <td class=" align-middle"><?= $item['price']; ?></td>
            </tr>
            <?php
        }
    }
?>


                  </tr>
                </tbody>
                <thead class="card-text table-group-divider">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Total Amounts:</th>
                  
                    <th scope="col">Rs.
                      <?php echo $total_price; ?>
                    </th>
                  </tr>
                </thead>
                <thead class="bill-text">
                  <tr>
                    <td colspan="5">
                      <p class="p-2"> Terms & condition: <br>
                        Fixed Rate!! No Refunf!! No Exchange!! No Guarantee!! Good once sold will not be taken back.</p>
                    </td>
                  </tr>
                </thead>
              </table>
            </div>
          </form>

          <!--<button class="btn float-end" id="btn" onclick="myprint(myfrm)">Print</button>-->
          <div class="button" align=center>
            <button onclick="window.print();return false;" type="submit" class="btn " id="btn">
            <!--<img class="mr-1" src="../assets/img/print.svg" alt="">-->
              <i class="fa-sharp fa-solid fa-print mx-1"></i>Print</button>
          </div>


        </div>
      </div>
    </div>
  </section>

  <script src="..\assets\Bootstrap\js\bootstrap.bundle.min.js"></script>
  <script src="..\assets\flickity\flickity.pkgd.min.js"></script>

  <!--
<script>


window.jsPDF = window.jspdf.jsPDF;
          function generatePdf() {
              let jsPdf = new jsPDF('p', 'pt', 'letter');
              var htmlElement = document.getElementById('myfrm');
              // you need to load html2canvas (and dompurify if you pass a string to html)
              const opt = {
                  callback: function (jsPdf) {
                      jsPdf.save("Test.pdf");
                      // to open the generated PDF in browser window
                      // window.open(jsPdf.output('bloburl'));
                  },
                  margin: [72, 72, 72, 72],
                  autoPaging: 'text',
                  html2canvas: {
                      allowTaint: true,
                      dpi: 300,
                      letterRendering: true,
                      logging: false,
                      scale: .8
                  }
              };
  
              jsPdf.html(htmlElement, opt);
          }

  function myprint(myfrm) {
    var printdata = document.getElementById(myfrm);
    newwin = window.open(" ");
    newwin.document.write(printdata.outerHTML);
    newwin.print();
    newwin.close();
  }


  function myprint(myfrm) {
    const element = document.getElementById("invoice");

    html2pdf()
      .from(element)
      .save();
  }


</script>-->