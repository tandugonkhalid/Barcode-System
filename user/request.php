
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/user_styles/user_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Request</title>
</head>
<body>
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
                        <a href="restocking.php" class="nav-link text-white">Inventory</a>
                    </li>
                </ul>
            </div>
            <a href="../index.php" class="logout text-white">logout</a>
    </nav>
    <!-- END OF NAVBAR -->
    
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
                        <form method="post" action="request.php">   
                            <div class="modal-body">
                            <div class="form-group">
                                <div class="p-2">
                                    <label class="form-check-label" for="">Request Number</label>
                                </div>
                                <div class="p-1">
                                    <input type="text" class="form-control" name="request_number" required>
                                </div>
                                <div class="p-2">
                                    <label class="form-check-label" for="">Appliances</label>
                                </div>
                                <select class="form-control form-control-sm p-1 w-100" name="appliances">
                                    <!-- POPULATE DATA FROM TYPE TABLE -->
                                    <?php
                                    include("../db/dbconn.php");

                                    $sql = "Select barcode_number, appliances from inventory";
                                    $result = mysqli_query($dbconn, $sql);
                                    $number_of_results = mysqli_num_rows($result);

                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option value=".$row['barcode_number'].">".$row['appliances']."</option>";
                                    }
                                    mysqli_close($dbconn);
                                ?>
                                </select>
                                <div class="p-2">
                                    <label class="form-check-label" for="">SRF Number</label>
                                </div>
                                <div class="p-1">
                                    <input type="text" class="form-control" name="srf" required>
                                </div>
                                <div class="p-2">
                                    <label class="form-check-label" for="">Location</label>
                                </div>
                                <div class="p-1">
                                    <input type="text" class="form-control" name="location" required>
                                </div>
                                <div class="p-2">
                                    <label class="form-check-label" for="">Next location</label>
                                </div>
                                <div class="p-1">
                                    <input type="text" class="form-control" name="moved_location">
                                </div>
                                <div class="p-2">
                                    <label class="form-check-label" for="">Date</label>
                                </div>
                                <div class="p-1">
                                    <input type="date" class="form-control" name="date" required>   
                                </div>
                                <div class="p-2">
                                    <label class="form-check-label" for="">Requested by</label>
                                </div>
                                <div class="p-1">
                                    <input type="text" class="form-control" name="user_request">
                                </div>
                                <!-- <div class="p-2">
                                    <label class="form-check-label" for="">Received by</label>
                                </div>
                                <select class="form-control form-control-sm p-1" name="users"> -->
                                    <!-- POPULATE DATA FROM ACCOUNT TABLE -->
                                <?php
                                    // include("../db/dbconn.php");

                                    // $sql = "Select * from account";
                                    // $result = mysqli_query($dbconn, $sql);
                                    // $number_of_results = mysqli_num_rows($result);

                                    // while ($row = mysqli_fetch_array($result)) {
                                    //     echo "<option value=".$row['ACCOUNT_ID'].">".$row['EMAIL']."</option>";
                                    // }
                                    // mysqli_close($dbconn);
                                ?>
                                <!-- </select> -->
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
                    $('#date').attr('min', maxDate);
                });
            </script>

            <!-- SQL QUERY -->
          <?php
            //DATABASE CONNECTION
            include("../db/dbconn.php");

            // CHECK IF INPUT IS ALREADY SET
            if (isset($_POST['request_number'])) {
                $appliance = $_POST['appliances'];
                $srf = $_POST['srf'];
                $location = $_POST['location'];
                // $type = $_POST['type'];
                $moved_location = $_POST['moved_location'];
                $date = $_POST['date'];
                $user = $_POST['user_request'];
                // $quantity = $_POST['quantity'];
                // $users = $_POST['users'];

                // INSERT QUERY
                $sql = "insert into request (inventory_id,srf,location,moved_date,requested_by) 
                values('$appliance','$srf','$location','$date','$user')";
                if (mysqli_query($dbconn, $sql)) {
                    // echo "inserted successfully";
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbconn);
                }
            }
            mysqli_close($dbconn);
          ?>

        </div>

        <!-- TABLE FOR INVENTORY -->
        <div>
            <table id="customers">
                <tr>
                <th>Request Number</th>
                <th>Serial No.</th>
                <th>Appliance</th>
                <th>Srf</th>
                <th>Location</th>
                <th>Next Location</th>
                <th>Moved Date</th>
                <th>Warranty Date</th>
                <th>Requested By</th>
                <th>Approved By</th>
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
                $sql = "SELECT request_id, inventory.serial_no ,inventory.appliances , srf, location,next_location, moved_date, inventory.barcode_number, 
                inventory.warranty_date ,requested_by, inventory.user FROM request LEFT JOIN inventory on inventory_id=inventory.barcode_number 
                LIMIT ".$this_page_first_result.",".$results_per_page;
                $result = mysqli_query($dbconn, $sql);
                $number_of_results = mysqli_num_rows($result);

                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr><td class=row_".$row['request_id'].">".$row['request_id']."</td>
                    <td>".$row['serial_no']."</td>
                    <td>".$row['appliances']."</td>
                    <td>".$row['srf']."</td>
                    <td>".$row['location']."</td>
                    <td>".$row['next_location']."</td>
                    <td>".$row['moved_date']."</td>
                    <td>".$row['warranty_date']."</td>
                    <td>".$row['requested_by']."</td>
                    <td>".$row['user']."</td>
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
                        var reqID_value = $(this).closest('tr').children('td:eq(0)').text();
                        var appliances_value = $(this).closest('tr').children('td:eq(2)').text();
                        var srf_value = $(this).closest('tr').children('td:eq(3)').text();
                        var location_value = $(this).closest('tr').children('td:eq(4)').text();
                        var newloc_value = $(this).closest('tr').children('td:eq(5)').text();
                        var date_value = $(this).closest('tr').children('td:eq(6)').text();
                        var req_value = $(this).closest('tr').children('td:eq(8)').text();
                        // var user_value = $(this).closest('tr').children('td:eq(7)').text();
                        // var account_value = $(this).closest('tr').children('td:eq(8)').text();

                        // console.log(srf_value+" "+appliances_value+" "+" "+location_value+"\n"
                        // +newloc_value+" "+date_value+" "+req_value);
                        console.log(reqID_value);

                        // CODE FOR POPULATING INPUT VALUE WITH DATA FROM SELECTED ROW IN TABLE
                        document.getElementById('request_id').value = reqID_value;
                        document.getElementById('srf').value = srf_value;
                        document.getElementById('appliances').value = appliances_value;
                        document.getElementById('location').value = location_value;
                        // document.getElementById('type').value = type_value;
                        document.getElementById('moved_location').value = newloc_value;
                        document.getElementById('date').value = date_value;
                        document.getElementById('requested').value = req_value;
                        // document.getElementById('quantity').value = quantity_value;
                        // document.getElementById('user').value = user_value;
                        // document.getElementById('account').value = account_value;    
                        });
                    });
                </script>

                <!-- START OF EDIT MODAL -->
                <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                                <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal"></button>
                                </button>
                            </div>
                        <form method="post" action="request.php">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Request Number</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="text" class="form-control" name="request_id" id="request_id" >
                                    </div>

                                    <div class="p-2">
                                        <label class="form-check-label" for="">Srf Number</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="text" class="form-control" name="srf_number" id="srf" required>
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Appliances</label>
                                    </div>
                                    
                                    <select class="form-control form-control-sm p-1 w-100 dropdown" name="appliances" id="appliances">
                                        <!-- POPULATE DATA FROM TYPE TABLE -->
                                        <?php
                                        include("../db/dbconn.php");

                                        $sql = "Select barcode_number, appliances from inventory";
                                        $result = mysqli_query($dbconn, $sql);
                                        $number_of_results = mysqli_num_rows($result);

                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<option value=".$row['barcode_number'].">".$row['appliances']."</option>";
                                        }
                                        mysqli_close($dbconn);
                                    ?>
                                    
                                    </select>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Location</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="text" class="form-control" name="location" id="location" required>
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Next Location</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="text" class="form-control" name="moved_location" id="moved_location">
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Date</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="date" class="form-control" name="date" id="date" required>
                                    </div>
                                    <div class="p-2">
                                        <label class="form-check-label" for="">Requested by</label>
                                    </div>
                                    <div class="p-1">
                                        <input type="text" class="form-control" name="requested" id="requested" required>
                                    </div>
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

                <!-- SQL QUERY -->
                <?php
                //DATABASE CONNECTION
                include("../db/dbconn.php");
                
                // CHECK IF INPUT IS ALREADY SET
                if (isset($_POST['edit_modal_btn'])) {
                    $reqID = $_POST['request_id'];
                    $srf = $_POST['srf_number'];
                    $appliance_id = $_POST['appliances'];
                    $location = $_POST['location'];
                    $new_location = $_POST['moved_location'];
                    $date = $_POST['date'];
                    $requestor = $_POST['requested'];
                
                    // UPDATE QUERY
                    $sql = "update request set srf='$srf', inventory_id='$appliance_id', 
                    moved_date='$date', location='$location', next_location='$new_location', requested_by='$requestor' WHERE request_id = '$reqID';";
                    if (mysqli_query($dbconn, $sql)) {
                        // echo "updated successfully";
                        echo "<meta http-equiv='refresh' content='0'>";
                    } else {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbconn);
                    }
                }
                mysqli_close($dbconn);
                ?>
                <!-- END OF EDIT MODAL -->
                <script>
                    $('.btn_delete').click(function(){
                        var reqID_value = $(this).closest('tr').children('td:eq(0)').text();
                        document.getElementById('req_id').value = reqID_value;
                    });
                </script>
                <!-- START OF DELETE MODAL -->
                <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
                                <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal"></button>
                                </button>
                            </div>
                            <form action="request.php" method="POST">
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this row?</p>
                                    <div class="p-1">
                                        <input type="hidden" class="form-control" name="reqID" id="req_id" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Yes" name="btn_delete"></input>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                </div>
                            
                                <?php
                                include("../db/dbconn.php");
                                    if(isset($_POST['btn_delete'])){
                                        $reqID = $_POST['reqID'];
                                        $sql = "delete from request WHERE request_id = '$reqID'";
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
        </div>

        <nav aria-label="Page navigation example" class="pagination">
                <ul class="pagination">
                    <li class="page-item">
                        <a href="request.php?page=<?=$Previous;?>" class="page-link">Previous</a>
                    </li>
                <?php
                // DISPLAY THE NUMBER OF PAGES WITH PAGE LINK
                    for($page=1; $page<=$number_of_pages; $page++){
                        echo    '<li class="page-item">
                                <a class="page-link" href="request.php?page='.$page.'">'.$page.'</a>
                            </li>';
                    }
                ?>
                        <li class="page-item">
                            <a href="request.php?page=<?=$Next;?>" class="page-link">Next</a>
                        </li>
                    </ul>
            </nav>
    </div>
</div>
    

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>