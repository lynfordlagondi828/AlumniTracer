<?php
   
    session_start();
    


    if(!isset($_SESSION["isloggedin"])){
        header('location:index.php');
        exit();
    }

    require_once 'inc/Db_Functions.php';
    $database = new Db_Functions();


    $keyword = '';
    if(isset($_POST["keyword"]))
    {
        $keyword = trim($_POST["keyword"]);
    }
    if($keyword =='')

        $result = $database->get_all_alumni();
    else 
        $result = $database->search_alumni($keyword);



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
    #table{
      margin-left:5px;
    }
    #add{
      margin-left: 10px;
    }

    #welcome{
      background-color: #fafad2;
      
    }
  </style>
</head>
</html>
      <hr>
      <div align="center" id="welcome">
          <p class="text-info">

             &nbsp;Welcome   <?php echo $_SESSION["username"]; ?> 
             <img src="img/logo.png" width="50" height="50">
           Negros Oriental State University Bayawan Sta.Catalina Campus 
           <a class="btn btn-link"href="logout.php">Sign-Out</a>
          </p> 
      </div>
<body>

  <div id="add">
    <a class="btn btn-info" href="create_alumni.php">Add New</span></a>
  </div>
  <h3 align="center">Alumni Tracer</h3>
  <hr>

 
    <?php if(count($result)>0): ?>
  
   
     <div id="table">
     <p>
         <form method="post">
           <table>
             <tr>
               <td>
                 <input class="form-control"  type="text" name="keyword" placeholder="Search">
                </td>
                <td>
                <button class="btn btn-secondary" name="submit">Search</button>
                </td>
             </tr>
           </table>
             
            
         </form>
         
     </p>
     <p><a class="btn btn-success" href="download.php">Download All</span></a></p>
     <table class="table table-striped table-bordered">
            <tr>
                <th>FAMILY NAME</th>
                <th>FIRST NAME</th>
                <th>MAIDEN NAME</th>
                <th>YEAR GRADUATED</th>
                <th>Action
            </tr>
            <?php foreach($result as $res): ?>
                <tr>
                    <td><?php echo htmlentities($res["familyname"]); ?></td>
                    <td><?php echo htmlentities($res["firstname"]); ?>
                    <td><?php echo htmlentities($res["maidenname"]); ?>
                    <td><?php echo htmlentities($res["year_graduated"]); ?>

                    <td>
                    
                        <a class="btn btn-success" href="change.php?id=<?php echo htmlentities($res['id']); ?>">Change</a>
                        <a class="btn btn-primary" href="delete.php?id=<?php echo htmlentities($res["id"]); ?>" onclick="return confirm('Delete?')">Delete</a>
                        <a class="btn btn-danger" href="view.php?id=<?php echo htmlentities($res['id']); ?>">View</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
     </div>
    
    <?php else: ?>
        <p class="text-info"">No Record found</p>
    <?php endif ?>
</body>
