<?php
    require_once'inc/Db_Functions.php';
    $database = new Db_Functions();
    $message = "";

    if(!isset($_GET["id"])){

        $id = trim($_GET["id"]);
    }

    $id = intval($_GET["id"]);

    $fetch = $database->get_single_alumni($id);

    $familyname = $fetch["familyname"];
    $firstname = $fetch["firstname"];
    $maidenname = $fetch["maidenname"];
    $age = $fetch["age"];
    $nationality = $fetch["nationality"];
    $status = $fetch["status"];
    $year_graduated = $fetch["year_graduated"];
    $present_address = $fetch["present_address"];
    $present_employment = $fetch["present_employment"];
    $employment_status = $fetch["employment_status"];
    $office_address = $fetch["office_address"];
    $contact_number = $fetch["contact_number"];
    $email = $fetch["email"];
    $facebook = $fetch["facebook"];
    $name_of_classmate = $fetch["name_of_classmate"];
    $classmate_address = $fetch["classmate_address"];

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

        $result = $database->edit_alumni_record($id,$familyname,$firstname,$maidenname,$age,$nationality,$status,
                                    $year_graduated,$present_address,$present_employment,$employment_status,
                                    $office_address,$contact_number,$email,$facebook,$name_of_classmate,$classmate_address);
        if($result != TRUE){
            header('location:dashboard.php');
            exit();
        } else {
            $message = "Sorry!!! Update Failed.";
        }
    }
?>


<html>
<html lang="en">
    <head>
        <title>NORSU-BSC ALUMNI</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>

        <style>
            #details{
                margin-left: 40px;
            }
        </style>
</head>
<body>
    <br>
    <div align="center" id="welcome">
          <p class="text-info">
             <img src="img/logo.png" width="50" height="50">
           Negros Oriental State University Bayawan Sta.Catalina Campus 
          
          </p>
          <h3>Update Alumni Details</h3>
      </div>
      <div id="details">
          <form method="post">
              <p><?php echo $message; ?></p>
            <table>

               <td>
                   <label>Family Name</label>
                   <input class="form-control"  type="text" name="familyname" value="<?php echo $familyname ?>" >
                </td>

                <td>
                   <label>Firstname</label>
                   <input class="form-control"  type="text" name="firstname" value="<?php echo $firstname ?>">
                </td>
                
                <td>
                   <label>Maiden Name</label>
                   <input class="form-control"  type="text" name="maidenname" value="<?php echo $maidenname ?>">
                </td>
                
                <td>
                   <label>Age</label>
                   <input class="form-control"  type="number" name="age" value="<?php echo $age ?>">
                </td>

                
                <td>
                   <label>Nationality</label>
                   <input class="form-control"  type="text" name="nationality" value="<?php echo $nationality ?>">
                </td>
           </table>

           <table>
                <td>
                   <label>Status</label>
                   <input class="form-control"  type="text" name="status" value="<?php echo $status ?>">
                </td>

                <td>
                   <label>Year Graduated</label>
                   <input class="form-control"  type="number" name="year_graduated" value="<?php echo $year_graduated ?>">
                </td>

                <td>
                   <label>Present Address</label><br>
                   <textarea name="present_address" class="form-control" rows="4" cols="50" ><?php echo $present_address ?></textarea>
                </td>
                <td>
                   <label>Present Employment</label>
                   <input class="form-control"  type="text" name="present_employment" value="<?php echo $present_employment ?>">
                </td>
                
                <td>
                   <label>Employment Status</label>
                   <input class="form-control"  type="text" name="employment_status" value="<?php echo $employment_status ?>">
                </td>

           </table>

           <table>

                <td>
                   <label>Office Address</label>
                   <input class="form-control"  type="text" name="office_address" value="<?php echo $office_address ?>">
                </td>

                <td>
                   <label>Contact Number</label>
                   <input class="form-control"  type="number" name="contact_number" value="<?php echo $contact_number ?>">
                </td>

                 
                <td>
                   <label>Email Address</label>
                   <input class="form-control"  type="text" name="email" value="<?php echo $email ?>">
                </td>

                <td>
                   <label>Facebook Address</label>
                   <input class="form-control"  type="text" name="facebook" value="<?php echo $facebook ?>">
                </td>

                <td>
                   <label>Name of Classmate</label>
                   <input class="form-control"  type="text" name="name_of_classmate" value="<?php echo $name_of_classmate ?>">
                </td>
                
                <td>
                   <label>Classmate Address</label>
                   <input class="form-control"  type="text" name="classmate_address" value="<?php echo $classmate_address ?>" >
     
              
                
           </table>
           <br>
           <td>
                   <button class="btn btn-success"name="submit">Save Changes</button>
                </td>
          </form>   
       </div>

</body>
</html>