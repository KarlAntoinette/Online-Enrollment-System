<?php
	include "connect.php";
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/login.css">
    </head>
    <body>
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 login-section-wrapper">
                    <div class="brand-wrapper">
                        <img src="https://drive.google.com/thumbnail?id=1Uyn7psSnNf5HgtEoH7WsyVh3IfIxxbx3" alt="logo" class="logo">
                    </div>
                    <div class="login-wrapper my-auto">
                        <h1 class="login-title">Log in</h1>
                            <?php
                                if(isset($_GET["mes"])) {
                                    echo"<div class='alert alert-danger'>{$_GET["mes"]}</div>";	
                                    }
                                ?>
                            <?php	
                                if(isset($_POST["login"])){
                                    $email = $_POST['email'];
                                    $password = $_POST['password'];

                                    $query = "SELECT * FROM users WHERE email='{$_POST["email"]}' AND password='{$_POST["password"]}'";
                                    $result = mysqli_query($db, $query);

                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_assoc($result)){
                                            if($row["utype"] == "admin"){
                                                $_SESSION['admin'] = $row["utype"];
                                                $_SESSION['id'] = $row["id"];
                                                header('Location: admin/index.php');
                                            }
                                            else if($row["utype"] == "student"){
                                                $_SESSION['student'] = $row["utype"];
                                                $_SESSION['id'] = $row["id"];
                                                header('Location: user/index.php');
                                            }
                                            else if($row["utype"] == "teacher"){
                                                $_SESSION['teacher'] = $row["utype"];
                                                $_SESSION['id'] = $row["id"];
                                                header('Location: teacher/index.php');
                                            }
                                            }
                                        }
                                        else{
                                            if(empty($_POST['email'])){
                                            echo "
                                                <div class='alert alert-danger'>
                                                    Enter Email
                                                </div>";
                                            }
                                            else if (empty($_POST['password'])){
                                            echo "
                                                <div class='alert alert-danger'>
                                                    Enter Password
                                                </div>";
                                            } 
                                            else {
                                            echo "
                                                <div class='alert alert-danger'>
                                                    Invalid Login
                                                </div>";
                                            }
                                        }
                                }
                            ?>
                        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com">
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="enter your passsword">
                            </div>
                            <input name="login" id="login" class="btn btn-block login-btn" type="submit" value="login">
                        </form>
                    </div>
                    </div>
                    <div class="col-sm-6 px-0 d-none d-sm-block">
                        <img src="https://osomnimedia.com/wp-content/uploads/2018/04/Holy-Child.jpg" alt="login-image" class="login-img">
                    </div>
                </div>
            </div>
        </main>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    </body>
</html>
