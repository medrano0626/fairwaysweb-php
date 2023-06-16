<?php
  session_start();
  include "config.php";
  $errors = array();
  if(isset($_POST['submit'])){
    $user_name = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM TBL_USER WHERE USERNAME = '$user_name'"; //AND PASS_WORD = '$password_hash'";
      // $sql = "SELECT * FROM TBL_USER";
    $result = $conn->query($sql);
    $rows = mysqli_num_rows($result);
    if($rows > 0){
      while($row = mysqli_fetch_array($result)) {
        if (password_verify($password, $row['pass_word'])){
          $_SESSION['username'] = $row['username'];
          $_SESSION['company'] = $row['company'];
          $_SESSION['role'] = $row['role1'];
          header("Location: payroll/payroll_main.php");
        }else{
          array_push($errors, "Error Login!");
        }
        
    }
     
    }else{
      array_push($errors, "Error Login!");
    }
    $conn->close();
    
  
  }
// if($_SESSION['username']!=""){
//   header("Location: payroll/payroll_main.php");
// } 
if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
  header("Location: payroll/payroll_main.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Log-In</title>
  <link rel="stylesheet" type = "text/css" href="payroll/static/css/style1.css">
  <link rel="icon" type = "images/x-icon" href="payroll/static/images/logo.png">
</head>

<body>
    <div class="center">
        <h1>FAIRWAYS</h1>
        <?php
        if(count($errors)>0){
        foreach($errors as $error){
          echo "<h4>$error</h4>";
        }
        }
        ?>
        
        <form action="index.php" method = "POST">
        <!-- {% csrf_token %} -->
          <div class="inputbox">
            <input type="text" id="username" name="username" required>
            <span>Username</span>
          </div>
          <div class="inputbox">
            <input type="password" id="password" name="password" required>
            <span>Password</span>
          </div>
          <div class="inputbox">
            <input type="submit" name ="submit" value="LogIn">
          </div>
          
        </form>
      </div>
</body>

</html>