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
<body class="d-flex flex-row dashboard">
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
    <div>
        <div class="column-content-header">
          <p class="btn_create">View</p>
        </div>
    </div>
</body>
</html>