<?php include('db/dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar">
        <h1>Real Estate Investment Company</h1>
    </nav>
    <section>
        <div class="grid">
            <img src="images/kamaladdin.jpg" alt="Apartments">
            <img src="images/276724.jpg" alt="Apartments">
            <img src="images/medhat-ayad.jpg" alt="Apartments">
            <img src="images/271618.jpg" alt="Apartments">
        </div>
        <div class="info">
            <h1>Login details</h1>
            <form action="login/login.php" method="post">
                <div class="form-group">
                    <label for="">Name:</label>
                    <input type="text"
                        class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Name">
                    <br>
                    <label for="">Password:</label>
                    <input type="password"
                        class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Password">
                    <br>
                    <input type="submit" class="submit" name="submit"></input>
                </div>
            </form>
        </div>
    </section>


    <?php
        session_start();
    ?>
</body>
</html>