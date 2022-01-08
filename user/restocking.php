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
    <div class="d-flex flex-row dashboard">
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
        <div class="p-5 col-10">
            <div class="column-content-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Add item
                </button>
          

                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Appliances</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <label for="">Serial No.</label>
                                <input type="text">
                                <br>
                                <label for="">Description</label>
                                <input type="text">
                                <br>
                                <label for="">Type</label>
                                <input type="text">
                                <br>
                                <label for="">Date received</label>
                                <input type="text">
                                <br>
                                <label for="">Invoice Number</label>
                                <input type="text">
                                <br>
                                <label for="">Warranty date</label>
                                <input type="text">
                                <br>
                                <label for="">Quantity</label>
                                <input type="text">
                                <br>
                                <label for="">Received by</label>
                                <input type="text">
                            </form>   
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
          <?php
            include("../db/dbconn.php");

            $results_per_page = 15;
            $sql = "insert into (serial_no,appliances,type,date,invoice_no,warranty_date,quantity,user) from inventory values()";
            $result = mysqli_query($dbconn, $sql);
          ?>

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
                    
                </table>
            </div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>