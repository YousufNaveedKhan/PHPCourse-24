<?php
    session_start();
if (!isset($_SESSION['loggedIN']) || $_SESSION['loggedIN'] != true) {
    header("location: login.php");
}

if (isset($_POST['logout'])) {


    session_unset();
    session_destroy();
    header('location: login.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LRS | Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<?php
include "assets/php/navbar.php";
?>

    <div class="container mt-5">
        <div class="card mb-3">
            <img src="https://imageio.forbes.com/specials-images/imageserve/5d35eacaf1176b0008974b54/0x0.jpg?format=jpg&crop=4560,2565,x790,y784,safe&height=900&width=1600&fit=bounds" class="card-img-top" alt="Car">
            <div class="card-body">
                <h5 class="card-title"><?php echo $_SESSION['email']; ?></h5>
                <p class="card-text">Welcome</p>
                <p class="card-text"><form method="post"><button type="submit" class="btn btn-danger" name="logout">Logout</button></form></p>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>