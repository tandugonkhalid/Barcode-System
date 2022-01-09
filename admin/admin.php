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
    <!-- DASHBOARD -->
<div class="d-flex flex-row">
    <!-- START OF NAVBAR -->
    <nav class="navbar navbar-expand-lg p-5 flex-column align-items-start menu">   
        <a class="navbar-brand text-white" href="#">REIC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav flex-column">
                <li class="nav-item active">
                    <a href="" class="nav-link text-white">Request</a>
                </li>
                <li class="nav-item">
                 <a href="" class="nav-link text-white">Restocking</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-white">Inventory</a>
                </li>
            </ul>
        </div>
        <a href="../index.php" class="logout text-white">logout</a>
    </nav>
    <!-- END OF NAVBAR -->
    <div class="p-5 col-10 column-content" >
        <div class="column-content-header">
          <button class="btn_create"> Filter</button>
        </div>
        <div >
        <table id="customers">
            <tr>
                <th>ID</th>
                <th>Villa no.</th>
                <th>House type</th>
            </tr>
            <?php
            // DATABASE CONNECTION
            include("../db/dbconn.php");

            // NUMBER OF DATA IN ONE PAGE
            $results_per_page = 15;

            // SELECT QUERY
            $sql = "Select * from houses";
            $result = mysqli_query($dbconn, $sql);
            $number_of_results = mysqli_num_rows($result);

            // while($row = mysqli_fetch_array($result)){
            //     echo "<tr><td>".$row['house_id']."</td>";
            //     echo "<td>".$row['villa_no']."</td>";
            //     echo "<td>".$row['house_type']."</td></tr>";
            // }


            
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

            // SELECT QUERY WITH LIMITER
            $sql1 = "Select * from houses limit ".$this_page_first_result.','.$results_per_page;
            $result = mysqli_query($dbconn, $sql1);
            $number_of_results = mysqli_num_rows($result);

            while($row = mysqli_fetch_array($result)){
                echo "<tr><td>".$row['house_id']."</td>";
                echo "<td>".$row['villa_no']."</td>";
                echo "<td>".$row['house_type']."</td></tr>";
            }
            
            // ADD OR MINUS THE CURRENT PAGE NUMBER
            $Previous = $page-1;
            $Next = $page+1;
            ?>
        </table>
        <nav aria-label="Page navigation example" class="pagination">
            <ul class="pagination">
                <li class="page-item">
                    <a href="admin.php?page=<?=$Previous;?>" class="page-link">Previous</a>
                </li>
        <?php
        // DISPLAY THE NUMBER OF PAGES WITH PAGE LINK
            for($page=1; $page<=$number_of_pages; $page++){
                echo    '<li class="page-item">
                            <a class="page-link" href="admin.php?page='.$page.'">'.$page.'</a>
                        </li>';
                            
            }
        ?>
                <li class="page-item">
                    <a href="admin.php?page=<?=$Next;?>" class="page-link">Next</a>
                </li>
            </ul>
        </nav>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
</body>
</html>