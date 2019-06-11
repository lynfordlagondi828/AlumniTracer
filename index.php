<?php 
    require_once 'inc/Db_Functions.php';
    $database = new Db_Functions();
    $message = "";
    session_start();

    if(isset($_POST["submit"])){

        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);

        $result = $database->user_authentication($username,$password);

        if($result != FALSE){

            $_SESSION["isloggedin"] = TRUE;
            $_SESSION["username"] = $username;
            header('location:dashboard.php');
            exit();
        }else{
            $message ="login Failed";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>NORSU-BSC ALUMNI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="login">
     
      <h4 class="text-center text-white pt-5">
        <img src="img/logo.png" width="50" height="50">
        Oriental State University Bayawan Sta.Catalina Campus<br>
        Alumni Tracer
      </h4>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <form id="login-form"method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password"class="form-control" required>
                            </div>
                            <div class="form-group">
                                
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                                <p class="text-info">
                                    <?php echo $message; ?>
                                </p>
                            </div>

                           
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>