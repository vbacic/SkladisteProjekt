<?php
 
  if (isset($_SESSION['user_id'])) {
      header("Location:index.php");
      exit();
  }
  // Include database connectivity
    
  include_once('connect.php');
  
  if (isset($_POST['submit'])) {

      $errorMsg = "";

      $email = $con->real_escape_string($_POST['email']);
      $password = $con->real_escape_string(($_POST['password']));
      
  if (!empty($email) || !empty($password)) {
        $query  = "SELECT * FROM users WHERE email = '$email'";
        $result = $con->query($query);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['userlevel'] = $row['userlevel'];
            $_SESSION['ime'] = $row['ime'];
            header("Location:index.php");
            die();                              
        }else{
          $errorMsg = "Ne postoji korisnik sa tim email-om!";
        } 
    }else{
      $errorMsg = "Email i lozinka su obavezni!";
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Evidencija stanja na skladištu - LOGIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

<div class="card text-center" style="padding:20px;">
  <h3>Evidencija stanja na skladištu</h3>
</div><br>

<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6">
        <?php if (isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $errorMsg; ?>
          </div>
        <?php } ?>
        <form action="" method="POST">
          <div class="form-group">  
            <label for="email">Email:</label> 
            <input type="text" class="form-control" name="email" placeholder="Unesi email" >
          </div>
          <div class="form-group">  
            <label for="password">Password:</label> 
            <input type="password" class="form-control" name="password" placeholder="Unesi lozinku">
          </div>
          <div class="form-group">
            
            <input type="submit" name="submit" class="btn btn-success" value="Login"> 
          </div>
        </form>
      </div>
  </div>
</div>
</body>
</html>

