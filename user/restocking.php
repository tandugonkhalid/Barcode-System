<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/user_styles/user_style.css">
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
                    <li class="nav-item">
                    <a href="restocking.php" class="nav-link text-white">Restocking</a>
                    </li>
                    <li class="nav-item">
                        <a href="inventory.php" class="nav-link text-white">Inventory</a>
                    </li>
                </ul>
            </div>
            <a href="../index.php" class="logout text-white">logout</a>
        </nav>
        <!-- END OF NAVBAR -->
        <!-- START OF MODAL -->
        <div class="p-5 col-10">
            <div class="column-content-header">
                <!-- TRIGGER MODAL POPUP -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Add item
                </button>
          
                <!-- MODAL POPUP -->
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
                                        <label class="form-check-label" for="">Serial Number</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="text" class="form-control" name="serial_no">
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Description</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="text" class="form-control" name="desc">
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">House type</label>
                                    </div>
                                    <select class="form-control form-control-sm p-1 w-100 dropdown" name="type">
                                        <!-- POPULATE DATA FROM TYPE TABLE -->
                                    <?php 
                                        include("../db/dbconn.php");

                                        $results_per_page = 15;
                                        $sql = "Select * from type";
                                        $result = mysqli_query($dbconn, $sql);
                                        $number_of_results = mysqli_num_rows($result);

                                        while($row = mysqli_fetch_array($result)){
                                            echo "<option name=".$row['house_type'].">".$row['house_type']."</option>";
                                        }
                                    ?>
                                    </select>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Date Received</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="date" class="form-control" name="date_received">
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Warranty date</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="date" class="form-control" name="warranty">
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Invoice Number</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="text" class="form-control" name="invoice">
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

                                        $results_per_page = 15;
                                        $sql = "Select * from account";
                                        $result = mysqli_query($dbconn, $sql);
                                        $number_of_results = mysqli_num_rows($result);

                                        while($row = mysqli_fetch_array($result)){
                                            echo "<option name=".$row['EMAIL'].">".$row['EMAIL']."</option>";
                                        }
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
          <?php
            //DATABASE CONNECTION   
            include("../db/dbconn.php");

            // CHECK IF INPUT IS ALREADY SET
            if(isset($_POST['serial_no'])){
                $serial = $_POST['serial_no'];
                $desc = $_POST['desc'];
                $type = $_POST['type'];
                $date_received = $_POST['date_received'];
                $invoice = $_POST['invoice'];
                $warranty = $_POST['warranty'];
                $quantity = $_POST['quantity'];
                $users = $_POST['users'];

                // INSERT QUERY
                $sql = "insert into inventory (serial_no,appliances,type,date,invoice_no,warranty_date,quantity,user) 
                values('$serial','$desc','$type','$date_received','$invoice','$warranty'
                ,'$quantity','$users')";
                if(mysqli_query($dbconn, $sql)){
                    // echo "inserted successfully";
                }else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbconn);
                }
            }
          ?>

        <!-- TABLE FOR INVENTORY -->
        </div>
            <div>
                <table id="customers">
                    <tr>
                    <th>Serial No.</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Date received</th>
                    <th>Invoice Number</th>
                    <th>Warranty date</th>
                    <th>Quantity</th>
                    <th>Received by</th>
                    <th>Action</th>
                    </tr>
                    
                    <!-- ADD PHP CODE FOR SELECT QUERY -->
                </table>
            </div>
        </div>
        <!-- END OF MODAL POPUP -->
    </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>