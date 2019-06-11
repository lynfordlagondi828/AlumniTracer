<?php
    require_once 'inc/Db_Functions.php';
    $database = new Db_Functions();
    $message = "";

    if(isset($_POST["submit"])){

        $lastname = trim($_POST["lastname"]);
        $firstname = trim($_POST["firstname"]);
        $middlename = trim($_POST["middlename"]);
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);

        if($database->check_username_if_exists($username)){

            $message = "Sorry!!! Username already exists.";

        } else {

            $result = $database->user_registration($lastname,$firstname,$middlename,$username,$password);

            if($result !=TRUE){
    
                header('location:index.php');
                exit();
                 
            }else{

                $message = "Sorry!!! Something went wrong. Please Try again.";
            }
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
      

        <div class="reg_container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <form id="login-form"method="post">
                            <h3 class="text-center text-info">User Registration</h3>
                            
                            <div class="form-group">
                                <label for="username" class="text-info">Lastname:</label><br>
                                <input type="text" name="lastname" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="username" class="text-info">Firstname:</label><br>
                                <input type="text" name="firstname" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="username" class="text-info">Middlename:</label><br>
                                <input type="text" name="middlename" class="form-control" required>
                            </div>

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