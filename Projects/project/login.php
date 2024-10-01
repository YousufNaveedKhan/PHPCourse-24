<?php
$passerr = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "assets/php/config.php";

    if (isset($_POST["email"])) {
        $email = $_POST["email"];
        $pass = $_POST["pass"];

        if ($email === '' || $pass === '') {
            $emptyerr = true;         
        }else {
            $sqlexist = "SELECT * FROM info WHERE email = '$email'";
            $res = mysqli_query($conn, $sqlexist);
    
            $rows = mysqli_num_rows($res);

            if ($rows == 1) {
                while ($item = mysqli_fetch_assoc($res)) {
                    if (password_verify($pass, $item['password'])) {
                        session_start();

                        $_SESSION['email'] = $email;
                        $_SESSION['loggedIN'] = true;

                        header("location: welcome.php");
                    }else {
                        $passerr = true;
                    }
                }
            }
        }
    }
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
        <form action="login.php" method="post">
        <?php
            if ($passerr) {
                echo "
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Failed!</strong> Invalid email or password!
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>
                ";
            }
            ?>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" placeholder="Enter your password">
            </div>

            <div class="d-grid gap-2 col-6 mx-auto mt-5">
                <button class="btn btn-primary" type="submit">Login</button>
            </div>

        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>