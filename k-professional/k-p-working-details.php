<?php include("includes/k_p_header.php"); ?>

  <style type="text/css">
  	.k-block, .k-content, .k-grid, .k-header-column-menu, .k-panelbar, .k-slider, .k-splitter, .k-treeview, .k-widget {
    outline: 0;
    -webkit-tap-highlight-color: rgba(0,0,0,0);
    margin-top: 50px;
}
  </style>
   <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.223/styles/kendo.common.min.css" />
    <script src="https://kendo.cdn.telerik.com/2017.1.223/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.1.223/js/jszip.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.1.223/js/kendo.all.min.js"></script>
<body style="padding: 15px 15px 15px 15px">
<div id="example">
    <div class="box wide hidden-on-narrow">
        <div class="box-col">
            <h4>Select Page size</h4>
            <select id="paper" style="width: 100px; margin-top: -5px;  ">
                <option value="size-a4" selected>A4</option>
                <option value="size-letter">Letter</option>
                <option value="size-executive">Executive</option>
            </select>
             <button class="export-pdf k-button" onclick="getPDF('.pdf-page')">Export</button>
        </div>
      <!--   <div class="box-col">
            <h4>Get PDF</h4>
            <button class="export-pdf k-button" onclick="getPDF('.pdf-page')">Export</button>
        </div> -->
    </div>
<?php
if (isset($_GET['order_id'])) {
    $o_id = decode($_GET['order_id']);
$sql    = "SELECT * FROM orders WHERE id = '$o_id' ORDER BY id DESC";
$result    = query($sql);
confirm($result);
$row = fetch_array($result);

$o_id     = $row["id"];
$status = $row["status"];
$service_id = $row["service_id"];
$service_category_id = $row["service_category_id"];
$service_price_id = $row["service_price_id"];
$service_time_id = $row["service_time_id"];
$date = $row["date_time"];
$fname = $row["f_name"];
$lname = $row["l_name"];
$email = $row["email"];
$address = $row["address"];
$landmark = $row["landmark"];
$city = $row["city"];
$mobile_no = $row["m_number"];
$postcode = $row["postcode"];
$date = $row["date_time"];
$order_id =$row["order_id"];
$working_duration = $row["working_duration"];
}
?>
    <div class="page-container hidden-on-narrow">
        <div class="pdf-page size-a4">
            <div class="pdf-header">
                <span class="company-logo">
                    <img src="images/logo.png" />
                </span>
                <span class="invoice-number">Date: <?php echo date('d-F-Y',strtotime($date)); ?></span>
            </div>
            <div class="pdf-footer">
              <!--   <p>Blauer See Delikatessen<br />
                    Lützowplatz 456<br />
                    Berlin, Germany,  10785 -->
                <div><i class="fa fa-map-marker" aria-hidden="true"></i> Fuljhore Road, Fuljhore, Durgapur, West Bengal 713206</div>
                <div><i class="fa fa-mobile" aria-hidden="true"></i> +91 9932259291, +91 9932311891</div>
                <div><i class="fa fa-envelope" aria-hidden="true"></i> sub7ata@gmail.com</div>
                </p>
            </div>
            <div class="for">
                <h3>Shipping address</h3>
                <p><?php echo $fname." ".$lname ?><br />
                    <?php echo $city; ?><br />
                    <?php echo $landmark; ?><br>
                    <?php echo $address.", ".$postcode; ?>
                </p>
            </div>
<?php

$sqlS       = "SELECT * FROM services WHERE id = '$service_id'";
$resultS    = query($sqlS);
confirm($resultS);
$rowS = fetch_array($resultS);


?>

<?php

$sqlC       = "SELECT * FROM assign_service_category WHERE id = '$service_category_id'";
$resultC    = query($sqlC);
confirm($resultC);
$rowC = fetch_array($resultC);

?>

<?php

$sqlT       = "SELECT * FROM service_time WHERE id = '$service_time_id'";
$resultT    = query($sqlT);
confirm($resultT);
$rowT = fetch_array($resultT);

?>
            <div class="from">
                <h3>Service</h3>
                <p style="padding-bottom: 20px; border-bottom: 1px solid #e5e5e5;">
                   <?php echo ucwords($rowS['name']); ?><br />
                    <?php echo ucwords($rowC['name']); ?><br />
                   <?php echo "Between ".$rowT['time_to']." to ".$rowT['time_from']; ?>
                </p>
<?php

$sqlP       = "SELECT * FROM service_price WHERE id = '$service_price_id'";
$resultP    = query($sqlP);
confirm($resultP);
$rowP = fetch_array($resultP);
$price = $rowP['price'];
$price = sprintf('%0.2f', $price);
?>                
                <p style="padding-top: 20px; margin-bottom: 40px;">
                    Price: <?php echo $price." /-" ?><br />
                  <!--  Invoice Date: 12.03.2014<br />
                   Due Date: 27.03.2014 -->
                </p>
            </div>
            <div class="pdf-body">
                <!-- <div id="grid"></div> -->
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
       <!--  <h2>Challan Design for Property tax</h2>     -->
            <div class="table-responsive">
                <div class="table-responsive custom_datatable">                     
                    <table class="table table-bordered" style="width:100%;margin:auto;text-align:left; margin-top: 50px;" >
                        <tbody>                                     
                           <!--  <tr>
                                <td rowspan="2" colspan="2"><h3 style="margin:8px 0 0 63px;">BANK TITLE HERE</h3></td>
                                <td>Challan NO</td>
                                <td colspan="2">123456</td>
                            </tr>  -->                                  
                            <!-- <tr>
                                <td>Date</td>  
                                <td colspan="2">28/01/2017</td>                                             
                            </tr> -->
                           <!--  <tr>
                                <td colspan="2">Bank Name / Branch : </td>
                                <td colspan="3">Bank Name / Branch Name Here</td>
                            </tr>
                            <tr>
                                <td colspan="2">Tax Period</td>
                                <td colspan="3">20_ _ to 20_ _</td>
                            </tr> -->
                            <tr>
                                <td><strong><center>Service</center></strong></td>
                                <td colspan="1"><strong><center>Service Category</center></strong></td>
                                <td width="70"><strong><center>Hours Price</center></strong></td>
                                <td width="70"><strong><center>Hours</center></strong></td>
                                <td width="70"><strong><center>Total</center></strong></td>
                            </tr>   
                            <tr>
                                <td rowspan="6"> <?php echo ucwords($rowS['name']); ?></td>
                                <td rowspan="6" width="50%"><?php echo ucwords($rowC['name']); ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $working_duration; ?></td>    
                                <td><?php $price1 = $price * $working_duration; 
                                echo sprintf('%0.2f', $price1); ?></td>
                            </tr>
<?php 
$price2 = $price1*(20/100); 
$price2 = sprintf('%0.2f', $price2);
?>               
                            <tr>
                                <td>Pay to Kalpataru</td>
                                <td>20%</td>
                                <td><?php echo "-".$price2; ?></td>
                            </tr>
<?php 
$price3 = $price1*(5/100); 
$price3 = sprintf('%0.2f', $price3);
?> 
                       <!--      <tr>
                                <td>GST</td>
                                <td>5%</td>
                                <td><?php echo "-".$price3; ?></td>
                            </tr> -->
<?php 
$total = ($price1 - $price2);
$total = sprintf('%0.2f', $total);
 ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><?php echo $total; ?></td>
                            </tr>
                                 <tr>
                                <td>Total</td>
                                <td></td>
                                <td><?php echo round($total)."/-"; ?></td>
                            </tr>

                      <!--       <tr>
                                <td colspan="5">Amount in words :Five Thousand Eighty Rupees Only</td>
                            </tr>
                            <tr>
                                <td>Depositer Signature</td>
                                <td>Account #</td>
                                <td>Office Manager signature</td>
                                <td colspan="2">Cashier Signature <br><br></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </div>

                 <img src="../img/sign.jpg" width="75px;" class="pull-right" height="75px;" style="margin-top:150px;margin-left: -75px;
}">
                <p class="signature pull-right" style="margin-top: 150px;">

                    Signature: ________________ <br />
                    Date: <?php echo date('d-F-Y',strtotime($date)); ?>
                </p>
            </div>
        </div>
    </div>
    
    <div class="responsive-message"></div>

    <style>
        .pdf-page {
            font-family: "DejaVu Sans", "Arial", sans-serif;
        }
    </style>

    <script>
        kendo.pdf.defineFont({
            "DejaVu Sans"             : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans.ttf",
            "DejaVu Sans|Bold"        : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Bold.ttf",
            "DejaVu Sans|Bold|Italic" : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf",
            "DejaVu Sans|Italic"      : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf"
        });
    </script>
    <script src="../content/shared/js/pako.min.js"></script>

    <script>
      function getPDF(selector) {
        kendo.drawing.drawDOM($(selector)).then(function(group){
          kendo.drawing.pdf.saveAs(group, "Invoice.pdf");
        });
      }

    $(document).ready(function() {
        var data = [
          { productName: "<?php echo ucwords($rowS['name']); ?>", unitPrice: <?php echo $price; ?>, qty: <?php echo $working_duration; ?>},
          // { productName: "ALICE MUTTON", unitPrice: 39, qty: 7 },
        
          { productName: "CHARTREUSE VERTE", unitPrice: 18, qty: 1 }
          // { productName: "MASCARPONE FABIOLI", unitPrice: 32, qty: 2 },
          // { productName: "VALKOINEN SUKLAA", unitPrice: 16.25, qty: 3 }
        ];
        var schema = {
          model: {
            productName: { type: "string" },
            unitPrice: { type: "number", editable: false },
            qty: { type: "number" }
          },
          parse: function (data) {
                $.each(data, function(){
                    this.total = this.qty * this.unitPrice;
                });
                return data;
          }
        };
        var aggregate = [
          { field: "qty", aggregate: "sum" },
          { field: "total", aggregate: "sum" }
        ];
        var columns = [
          { field: "productName", title: "Service", footerTemplate: "Total"},
          { field: "unitPrice", title: "Hour Price", width: 120},
          { field: "qty", title: "Hours.", width: 120, aggregates: ["sum"], footerTemplate: "#=sum#" },
          { field: "total", title: "Total", width: 120, aggregates: ["sum"], footerTemplate: "#=sum#" }
        ];
        var grid = $("#grid").kendoGrid({
          editable: false,
          sortable: true,
          dataSource: {
            data: data,
            aggregate: aggregate,
            schema: schema,
          },
          columns: columns
        });

        $("#paper").kendoDropDownList({
          change: function() {
            $(".pdf-page")
              .removeClass("size-a4")
              .removeClass("size-letter")
              .removeClass("size-executive")
              .addClass(this.value());
          }
        });
    });
    </script>
    <style>
        .pdf-page {
            margin: 0 auto;
            box-sizing: border-box;
            box-shadow: 0 5px 10px 0 rgba(0,0,0,.3);
            background-color: #fff;
            color: #333;
            position: relative;
        }
        .pdf-header {
            position: absolute;
            top: .5in;
            height: .6in;
            left: .5in;
            right: .5in;
            border-bottom: 1px solid #e5e5e5;
        }
        .invoice-number {
            padding-top: .17in;
            float: right;
        }
        .pdf-footer {
            position: absolute;
            bottom: .5in;
            height: .6in;
            left: .5in;
            right: .5in;
            padding-top: 10px;
            border-top: 1px solid #e5e5e5;
            text-align: left;
            color: #787878;
            font-size: 12px;
        }
        .pdf-body {
            position: absolute;
            top: 3.7in;
            bottom: 1.2in;
            left: .5in;
            right: .5in;
        }

        .size-a4 { width: 8.3in; height: 11.7in; }
        .size-letter { width: 8.5in; height: 11in; }
        .size-executive { width: 7.25in; height: 10.5in; }

        .company-logo {
            font-size: 30px;
            font-weight: bold;
            color: #3aabf0;
        }
        .for {
            position: absolute;
            top: 1.5in;
            left: .5in;
            width: 2.5in;
        }
        .from {
            position: absolute;
            top: 1.5in;
            right: .5in;
            width: 2.5in;
        }
        .from p, .for p {
            color: #787878;
        }
        .signature {
            padding-top: .5in;
        }
    </style>

</div>


</body>
  
  

</body>
</html>