<?php
  session_start();
  if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
    header("Location: ../index.php");
  }
  include "../config.php";
  $errors = array();
  if(isset($_POST['submit'])){
    $last_name = $_POST['lname'];
    $first_name = $_POST['fname'];
    $role = $_POST['role'];
    $user_name = $_POST['username'];
    $password = $_POST['password'];
    $company = $_SESSION['company'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM TBL_USER WHERE USERNAME = '$user_name'";
      // $sql = "SELECT * FROM TBL_USER";
    $result = $conn->query($sql);
    $rows = mysqli_num_rows($result);
    if($rows > 0){
      array_push($errors, "Username exist!");
    
    
    }else{
      $sql = "INSERT INTO TBL_USER (username, pass_word, lastname, firstname, company, role1) VALUES ('$user_name', '$password_hash', '$last_name', '$first_name', '$company', '$role')";
      $result = $conn->query($sql);
      
    }
    
  
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ADD USER</title>
  <link rel="stylesheet" type = "text/css" href='static/css/style2.css'>
  <link rel="icon" type = "images/x-icon" href='static/images/logo.png'>
</head>

<body>
    <div class="center">
        <h1>Add User</h1>
        <?php
        if(count($errors)>0){
        foreach($errors as $error){
          echo "<h4>$error</h4>";
        }
        }
        ?>
        <form action="add_user.php" method = "post">
          <div class="inputbox">
            <input type="text" id="lname" name="lname" required="required">
            <span>Last Name</span>
          </div>
          <div class="inputbox">
            <input type="text" id="fname" name="fname" required="required">
            <span>First Name</span>
          </div>
          <div class="inputbox">
            <select  name="role" id="role">
              <option value='Role'>Role</option>
                <?php
                    $sql = "SELECT * FROM TBL_ROLE";
                    $result = $conn->query($sql);

                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()) {
                            $role = $row['role'];
                            echo "<option value=".$row['role'].">".$row['role']."</option>";
                        }
                    }
                ?>
            </select>
            <span></span>
          </div>
          <div class="inputbox">
            <input type="text" id="username" name="username" required="required">
            <span>Username</span>
          </div>
          <div class="inputbox">
            <input type="password" id="password" name="password" required="required" minlength="6">
            <span>Password</span>
          </div>
          <div class="inputbox">
            <input type="submit" name ="submit" value="Save">
          </div>
          
        </form>
        
      </div>
</body>

</html>