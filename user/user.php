<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Investment Company</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/user_styles/user_style.css">

</head>
<body>
<!-- DASBOARD -->
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
                    <a href="request.php" class="nav-link text-white">Request</a>
                </li>
                <li class="nav-item">
                 <a href="restocking.php" class="nav-link text-white">Inventory</a>
                </li>
            </ul>
        </div>
        <a href="../index.php" class="logout text-white">logout</a>
    </nav>
    <!-- END OF NAVBAR -->
    <div class="p-5 col-10 column-content" >
        <div class="column-content-header">
          <p class="label">Stock levels</p>
        </div>
        <div>
        <table id="customers">
            <tr>
            <th>Appliances</th>
            <th>Quantity</th> 
            </tr>
            <?php
            // DATABASE CONNECTION
            include("../db/dbconn.php");

            // NUMBER OF DATA IN ONE PAGE
            $results_per_page = 15;

            // SELECT QUERY
            $sql = "SELECT appliances, count(*) as quantity FROM inventory WHERE status = 'Available' GROUP BY appliances ORDER BY date";
            $result = mysqli_query($dbconn, $sql);
            $number_of_results = mysqli_num_rows($result);

            while ($row = mysqli_fetch_array($result)) {
                if ($row['quantity']<=15) {
                    echo "<tr><td>".$row['appliances']."</td>";
                    echo "<td id='stocklevel'>".$row['quantity']."</td></tr>";
                }
            }
            ?>
                        
        </table>
        </div>
        <div class="mt-5 column-content-header">
            <p class="label">Day Tracker</p>
        </div>
        <div >
        <table id="customers">
            <tr>
            <th>Request Number</th>
            <th>Srf Number</th>
            <th>Appliances</th>
            <th>Location</th>
            <th>New Location</th>
            <th>Date</th>
            </tr>

            <?php
            // DATABASE CONNECTION
            include("../db/dbconn.php");

            // NUMBER OF DATA IN ONE PAGE
            $results_per_page = 15;

            //DATE TODAY
            $date = new DateTime();

            //FORMATTED DATE
            $dateFormat = $date->format("Y-m-d");

            // SELECT QUERY
            // $sql = "SELECT * FROM request LEFT JOIN inventory ON request.inventory_id = inventory.barcode_number WHERE moved_date = $dateFormat ORDER BY moved_date";
            $sql = "SELECT * FROM `request` LEFT JOIN inventory on request.inventory_id = inventory.inventory_id WHERE moved_date = '$dateFormat'";
            $result = mysqli_query($dbconn, $sql);
            $number_of_results = mysqli_num_rows($result);

            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>
                <td>".$row['request_id']."</td>
                <td>".$row['srf']."</td>
                <td>".$row['appliances']."</td>
                <td>".$row['location']."</td>
                <td>".$row['next_location']."</td>
                <td>".$row['moved_date']."</td>
                </tr>";
            }
            ?>
                        
        </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
</body>
</html>