<?php
  require_once 'inc/Db_Functions.php';
  $database = new Db_Functions();
  $message = "";

  if(isset($_POST["submit"])){

    $familyname = trim($_POST["familyname"]);
    $firstname = trim($_POST["firstname"]);
    $maidenname = trim($_POST["maidenname"]);
    $age = trim($_POST["age"]);
    $nationality = trim($_POST["nationality"]);
    $status = trim($_POST["status"]);
    $year_graduated = trim($_POST["year_graduated"]);
    $present_address = trim($_POST["present_address"]);
    $present_employment = trim($_POST["present_employment"]);
    $employment_status = trim($_POST["employment_status"]);
    $office_address = trim($_POST["office_address"]);
    $contact_number = trim($_POST["contact_number"]);
    $email = trim($_POST["email"]);
    $facebook = trim($_POST["facebook"]);
    $name_of_classmate = trim($_POST["name_of_classmate"]);
    $classmate_address = trim($_POST["classmate_address"]);

    $result = $database->add_new_alumni($familyname,$firstname,$maidenname,$age,$nationality,$status,
                              $year_graduated,$present_address,$present_employment,$employment_status,
                              $office_address,$contact_number,$email,$facebook,$name_of_classmate,$classmate_address);
    if($result != TRUE){
      
      header('location:dashboard.php');
      exit();

    } else {

      $message = "Unable to add record.";
    }


  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>NORSU-BSC ALUMNI</title>
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
   <style>
       #forms{
        margin-left: 15px;
        }
    </style>
</head>
<body>
    <div id="login">
     
      <h4 class="text-center  pt-5">
        <img src="img/logo.png" width="50" height="50">
        Oriental State University Bayawan Sta.Catalina Campus<br>
        Alumni Tracer
      </h4>
    </div>

    <div id="forms">
        <h3>Add new Record</h3>
         <form method="post">
           <table>
               <td><input class="form-control"  type="text" name="familyname" placeholder="Family Name" required></td>
               <td><input class="form-control"  type="text" name="firstname" placeholder="First Name" required></td>
               <td><input class="form-control"  type="text" name="maidenname" placeholder="Maiden Name(if married)" required></td>
               
               <td><input class="form-control"  type="text" name="age" placeholder="Age" required></td>
               <td><input class="form-control"  type="text" name="nationality" placeholder="Nationality" required></td>
               <td><input class="form-control"  type="text" name="status" placeholder="Status" required></td>
           </table>

           <table>
               <td><input class="form-control"  type="text" name="year_graduated" placeholder="Year Graduated" required></td>
               <td><input class="form-control"  type="text" name="present_address" placeholder="Present Address" required></td>
               <td><input class="form-control"  type="text" name="present_employment" placeholder="Present Employment" required></td>
               <td><input class="form-control"  type="text" name="employment_status" placeholder="Employment Status" required></td>
               <td><input class="form-control"  type="text" name="office_address" placeholder="Office Address(if any)" required></td>
               <td><input class="form-control"  type="text" name="contact_number" placeholder="Contact Number" required></td>
               
           </table>

           <table>
                <td><input class="form-control"  type="text" name="email" placeholder="Email Address" required></td>
                <td><input class="form-control"  type="text" name="facebook" placeholder="Facebook Address" required></td>
                <td><input class="form-control"  type="text" name="name_of_classmate" placeholder="Name of Classmate" required></td>
                <td><input class="form-control"  type="text" name="classmate_address" placeholder="Address of Classmate" required></td>
                <td><button class="btn btn-success"name="submit">Save</td>
           </table>
           <p>
             <?php echo $message; ?>
           </p>
         </form>
         
     </p>
</body>