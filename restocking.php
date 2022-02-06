<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/user_styles/user_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Restocking</title>
</head>
<body>
    <!-- DASHBOARD -->
    <div class="d-flex flex-row dashboard">
        <!-- START OF NAVBAR -->
        <nav class="navbar navbar-expand-lg p-5 flex-column align-items-start menu">   
            <a class="navbar-brand text-white" href="#">REIC</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
             <ul class="navbar-nav flex-column">
                    <li class="nav-item active">
                        <a href="user.php" class="nav-link text-white">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a href="request.php" class="nav-link text-white">Request</a>
                    </li>
                </ul>
            </div>
            <a href="../index.php" class="logout text-white">logout</a>
        </nav>
        <!-- END OF NAVBAR -->
        <!-- START OF ADD MODAL -->
        <div class="p-5 col-10">
            <div class="column-header">
                <div> 
                    <form  class="column-header-1" action="" method="post">
                        <select class="form-control form-control-sm p-1" name="filter" id="filter">
                                <option value="quantity">Quantity</option>
                                <option value="date_received">Date Received</option>
                                <option value="received_by">Received by</option>
                        </select>                 
                        <button type="submit" class="btn btn-primary" name="btn-filter">
                            Filter
                        </button>
                    </form>
                    <?php
                    //DATABASE CONNECTION
                    include("../db/dbconn.php");

                    // CHECK IF INPUT IS ALREADY SET
                    if (isset($_POST['btn-filter'])) {
                        $filter_value = $_POST['filter'];
                        $filter_by = "";
                        echo $filter_value;

                        if ($filter_value === ("quantity")){
                            $sql = "SELECT barcode_number,serial_no,appliances,date,invoice_no,warranty_date,quantity,Status,account.email,account.account_id 
                            FROM inventory LEFT JOIN account ON inventory.user=account.account_id ORDER BY date LIMIT ".$this_page_first_result.",".$results_per_page;
                        } 
                        else if ($filter_value === ("date_received")) { 
                            $sql = "SELECT barcode_number,serial_no,appliances,date,invoice_no,warranty_date,quantity,Status,account.email,account.account_id 
                            FROM inventory LEFT JOIN account ON inventory.user=account.account_id ORDER BY date LIMIT ".$this_page_first_result.",".$results_per_page;
                        } 
                        else { 
                            $sql = "SELECT barcode_number,serial_no,appliances,date,invoice_no,warranty_date,quantity,Status,account.email,account.account_id 
                            FROM inventory LEFT JOIN account ON inventory.user=account.account_id ORDER BY date LIMIT ".$this_page_first_result.",".$results_per_page;
                        }            
                    }
                    mysqli_close($dbconn);
                ?>

                </div>
                <div class="column-header-2"> 
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Add item
                    </button>
                </div>
                <!-- ADD MODAL POPUP -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Appliances</h5>
                                <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal"></button>
                        </div>
                        <form method="post" action="restocking.php">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Barcode Number</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="text" class="form-control" name="barcode" required>
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Serial Number</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="text" class="form-control" name="serial_no" required>
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Description</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="text" class="form-control" name="desc" required>
                                    </div>
                                    <!-- <div class="p-2">
                                        <label class="form-check-label" for="">House type</label>
                                    </div> -->
                                    <!-- <select class="form-control form-control-sm p-1 w-100 dropdown" name="type"> -->
                                        <!-- POPULATE DATA FROM TYPE TABLE -->
                                    <?php
                                        // include("../db/dbconn.php");

                                        // $sql = "Select * from type";
                                        // $result = mysqli_query($dbconn, $sql);
                                        // $number_of_results = mysqli_num_rows($result);

                                        // while ($row = mysqli_fetch_array($result)) {
                                        //     echo "<option name=".$row['house_type'].">".$row['house_type']."</option>";
                                        // }
                                        // mysqli_close($dbconn);
                                    ?>
                                    <!-- </select> -->
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Date Received</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="date" class="form-control" name="date_received" id="date_received" required>
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Warranty date</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="date" class="form-control" name="warranty" id="warranty_date" required>
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Invoice Number</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="text" class="form-control" name="invoice" required>
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Quantity</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="text" class="form-control" name="quantity">
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Received by</label>
                                    </div>
                                    <select class="form-control form-control-sm p-1" name="users">
                                        <!-- POPULATE DATA FROM ACCOUNT TABLE -->
                                    <?php
                                        include("../db/dbconn.php");

                                        $sql = "Select * from account";
                                        $result = mysqli_query($dbconn, $sql);
                                        $number_of_results = mysqli_num_rows($result);

                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<option value=".$row['ACCOUNT_ID'].">".$row['EMAIL']."</option>";
                                        }
                                        mysqli_close($dbconn);
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Save changes"></input>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Script for disabling to pick previous dates -->
            <script>
                $(function(){
                    var dtToday = new Date();
    
                    var month = dtToday.getMonth() + 1;
                    var day = dtToday.getDate();
                    var year = dtToday.getFullYear();
                    if(month < 10)
                        month = '0' + month.toString();
                    if(day < 10)
                        day = '0' + day.toString();
    
                    var maxDate = year + '-' + month + '-' + day;
                    $('#date_received').attr('min', maxDate);
                    $('#warranty_date').attr('min', maxDate);
                });
            </script>

            <!-- SQL QUERY -->
          <?php
            //DATABASE CONNECTION
            include("../db/dbconn.php");

            // CHECK IF INPUT IS ALREADY SET
            if (isset($_POST['serial_no'])) {
                $barcode = $_POST['barcode'];
                $serial = $_POST['serial_no'];
                $desc = $_POST['desc'];
                // $type = $_POST['type'];
                $date_received = $_POST['date_received'];
                $invoice = $_POST['invoice'];
                $warranty = $_POST['warranty'];
                $quantity = $_POST['quantity'];
                $users = $_POST['users'];

                // INSERT QUERY
                $sql = "insert into inventory (barcode_number,serial_no,appliances,date,invoice_no,warranty_date,quantity,status,user) 
                values('$barcode','$serial','$desc','$date_received','$invoice','$warranty'
                ,'$quantity','Available','$users')";
                if (mysqli_query($dbconn, $sql)) {
                    echo "<meta http-equiv='refresh' content='0'>";
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbconn);
                }
            }
            mysqli_close($dbconn);
          ?>
        </div>
            <!-- TABLE FOR INVENTORY -->
            <div id="printableArea">
                <table id="customers">
                    <tr>
                    <th>Barcode number</th>
                    <th>Serial No.</th>
                    <th>Description</th>
                    <th>Date received</th>
                    <th>Invoice Number</th>
                    <th>Warranty date</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Received by</th>
                    <th>Action</th>
                    </tr>
                    
                    <!-- ADD PHP CODE FOR SELECT QUERY -->
                    <?php
                    // DATABASE CONNECTION
                    include("../db/dbconn.php");
                    $results_per_page = 15;
            
                    // NUMBER OF PAGES DIVIDED WITH NUMBER OF DATA IN ONE PAGE
                    $number_of_pages = ceil($number_of_results/$results_per_page);
            
                    // IF PAGE SELECTED IS SET
                    if(!isset($_GET['page'])){
                        $page = 1;
                    }else{
                        $page = $_GET['page'];
                    }
            
                    // LIMITER FOR PAGE SELECTED
                    $this_page_first_result = ($page-1)*$results_per_page;

                    // SELECT QUERY
                    $sql = "SELECT barcode_number,serial_no,appliances,date,invoice_no,warranty_date,quantity,Status,account.email,account.account_id 
                    FROM inventory LEFT JOIN account ON inventory.user=account.account_id ORDER BY date LIMIT ".$this_page_first_result.",".$results_per_page;
                    $result = mysqli_query($dbconn, $sql);
                    $number_of_results = mysqli_num_rows($result);

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr><td class=row_".$row['barcode_number'].">".$row['barcode_number']."</td>
                        <td class='serial'>".$row['serial_no']."</td>
                        <td>".$row['appliances']."</td>
                        <td>".$row['date']."</td>
                        <td>".$row['invoice_no']."</td>
                        <td>".$row['warranty_date']."</td>
                        <td>".$row['quantity']."</td>
                        <td>".$row['Status']."</td>
                        <td>".$row['email']."</td>
                        <td style='display:none'>".$row['account_id']."</td>
                        <td><button class='btn btn-primary btn_edit' data-toggle='modal' data-target='#editmodal' id='editbtn'>Edit</button>
                        <button class='btn btn-danger btn_delete' data-toggle='modal' data-target='#deletemodal'>Delete</button></td></tr>";
                    }
                    $Previous = $page-1;
                    $Next = $page+1;
                    mysqli_close($dbconn);
                    ?>
                </table>
                <!-- JQUERY TO GET DATA FROM SELECTED ROW TO MODAL -->
                <script>
                    $(document).ready(function(){
                        $(".btn_edit").click(function(){ 

                        // CODE FOR GETTING DATA OF SELECTED ROW TO MODAL
                        var barcode_value = $(this).closest('tr').children('td:eq(0)').text();
                        var serial_value = $(this).closest('tr').children('td:eq(1)').text();
                        var appliances_value = $(this).closest('tr').children('td:eq(2)').text();
                        // var type_value = $(this).closest('tr').children('td:eq(3)').text();
                        var date_value = $(this).closest('tr').children('td:eq(3)').text();
                        var invoice_value = $(this).closest('tr').children('td:eq(4)').text();
                        var warranty_value = $(this).closest('tr').children('td:eq(5)').text();
                        var quantity_value = $(this).closest('tr').children('td:eq(6)').text();
                        var user_value = $(this).closest('tr').children('td:eq(7)').text();
                        var account_value = $(this).closest('tr').children('td:eq(8)').text();

                        // CODE FOR POPULATING INPUT VALUE WITH DATA FROM SELECTED ROW IN TABLE
                        document.getElementById('barcode').value = barcode_value;
                        document.getElementById('serial').value = serial_value;
                        document.getElementById('appliance').value = appliances_value;
                        // document.getElementById('type').value = type_value;
                        document.getElementById('date').value = date_value;
                        document.getElementById('invoice').value = invoice_value;
                        document.getElementById('warranty').value = warranty_value;
                        document.getElementById('quantity').value = quantity_value;
                        document.getElementById('user').value = user_value;
                        // document.getElementById('account').value = account_value;
                        });

                        $(".print").click(function(){
                            var divContents = document.getElementById("printableArea").innerHTML;
                            var a = window.open('', '', 'height=500, width=500');
                            a.document.write('<html>');
                            a.document.write('<body> <br>');
                            a.document.write(divContents);
                            a.document.write('</body></html>');
                            a.document.close();
                            a.print();
                        });
                        
                    });
                </script>

                <!-- SQL QUERY -->
                <?php
                //DATABASE CONNECTION
                include("../db/dbconn.php");
                
                // CHECK IF INPUT IS ALREADY SET
                if (isset($_POST['edit_modal_btn'])) {
                    $barcode = $_POST['barcode_value'];
                    $serial = $_POST['serial_value'];
                    $desc = $_POST['desc_value'];
                    // $type = $_POST['type_value'];
                    $date_received = $_POST['date_value'];
                    $invoice = $_POST['invoice_value'];
                    $warranty = $_POST['warranty_value'];
                    $quantity = $_POST['quantity_value'];
                    $users = $_POST['users_value'];
                    // $account = $_POST['account_value'];

                    echo "Quantity: ".$quantity." User: ".$users." Warranty: ".$warranty;

                    // UPDATE QUERY
                    $sql = "update inventory set serial_no='$serial', appliances='$desc', 
                    date='$date_received', invoice_no='$invoice', warranty_date='$warranty', quantity='$quantity', user='$users' WHERE barcode_number = '$barcode'";
                    if (mysqli_query($dbconn, $sql)) {
                        // echo "updated successfully";
                        echo "<meta http-equiv='refresh' content='0'>";
                    } else {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbconn);
                    }
                    echo $type." ".$users." ".$account;
                }
                mysqli_close($dbconn);
                ?>
                <!-- END OF EDIT MODAL -->
                <script>
                    $('.btn_delete').click(function(){
                        var barcode_value = $(this).closest('tr').children('td:eq(0)').text();
                        document.getElementById('barcode_num').value = barcode_value;
                    });
                </script>
            </div>
            
            <div>
                <button class="btn btn-primary m-3 print">Print Me!</button>
            </div>

            <nav aria-label="Page navigation example" class="pagination">
                <ul class="pagination">
                    <li class="page-item">
                        <a href="restocking.php?page=<?=$Previous;?>" class="page-link">Previous</a>
                    </li>
                <?php
                // DISPLAY THE NUMBER OF PAGES WITH PAGE LINK
                    for($page=1; $page<=$number_of_pages; $page++){
                        echo    '<li class="page-item">
                                <a class="page-link" href="restocking.php?page='.$page.'">'.$page.'</a>
                            </li>';
                    }
                ?>
                        <li class="page-item">
                            <a href="restocking.php?page=<?=$Next;?>" class="page-link">Next</a>
                        </li>
                    </ul>
            </nav>

            <!-- START OF EDIT MODAL -->
            <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                            <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal"></button>
                        </div>
                        <form method="post" action="restocking.php">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Barcode Number</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="text" class="form-control" name="barcode_value" id="barcode" required>
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Serial Number</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="text" class="form-control" name="serial_value" id="serial" required>
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Description</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="text" class="form-control" name="desc_value" id="appliance" required>
                                    </div>
                                    <!-- <div class="p-2">
                                    <label class="form-check-label" for="">House type</label>
                                    </div> -->
                                    <!-- <select class="form-control form-control-sm p-1 w-100 dropdown" name="type_value" id="type"> -->
                                        <!-- POPULATE DATA FROM TYPE TABLE -->
                                    <?php
                                        // include("../db/dbconn.php");

                                        // $sql = "Select * from type";
                                        // $result = mysqli_query($dbconn, $sql);
                                        // $number_of_results = mysqli_num_rows($result);

                                        // while ($row = mysqli_fetch_array($result)) {
                                        //     echo "<option name=".$row['house_type'].">".$row['house_type']."</option>";
                                        // }

                                        // mysqli_close($dbconn);
                                    ?>
                                    <!-- </select> -->
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Date Received</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="date" class="form-control" name="date_value" id="date" required>
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Warranty date</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="date" class="form-control" name="warranty_value" id="warranty" required>
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Invoice Number</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="text" class="form-control" name="invoice_value" id="invoice" required>
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Quantity</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="text" class="form-control" name="quantity_value" id="quantity">
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Received by</label>
                                    </div>
                                    <select class="form-control form-control-sm p-1" name="users_value" id="user">
                                    <!-- POPULATE DATA FROM ACCOUNT TABLE -->
                                    <?php
                                        include("../db/dbconn.php");

                                        $sql = "Select * from account";
                                        $result = mysqli_query($dbconn, $sql);
                                        $number_of_results = mysqli_num_rows($result);

                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<option value=".$row['ACCOUNT_ID'].">".$row['EMAIL']."</option>";
                                        }
                                        mysqli_close($dbconn);
                                    ?>
                                    </select>
                                    <!-- <div class="p-1">
                                        <input type="hidden" class="form-control" name="account_value" id="account" required>
                                    </div> -->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Save changes" name="edit_modal_btn"></input>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- START OF DELETE MODAL -->
            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
                                <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal"></button>
                                </button>
                            </div>
                            <form action="restocking.php" method="POST">
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this row?</p>
                                    <div class="p-1">
                                        <input type="hidden" class="form-control" name="barcode_value" id="barcode_num" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Yes" name="btn_delete"></input>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                </div>
                                <?php
                                include("../db/dbconn.php");
                                    if(isset($_POST['btn_delete'])){
                                        $barcode = $_POST['barcode_value'];
                                        $sql = "delete from inventory WHERE barcode_number = '$barcode'";
                                            if (mysqli_query($dbconn, $sql)) {
                                                echo "Deleted successfully";
                                                echo "<meta http-equiv='refresh' content='0'>";
                                            } else {
                                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbconn);
                                            }
                                    }
                                mysqli_close($dbconn);
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
        
            <!-- END OF MODAL POPUP -->
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>