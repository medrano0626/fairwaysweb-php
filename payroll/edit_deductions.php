<?php
  session_start();
  if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
    header("Location: ../index.php");
  }
  include "../config.php";
  $company = $_SESSION['company'];
  $user_name = $_SESSION['username'];
  if(isset($_POST['close'])){
    header("Location: deductions.php");
  }
  if(isset($_POST['submit'])){
    $rowid = $_SESSION['rowid'];
    $dedname = $_POST['ded_name']; $dedtype = $_POST['ded_type']; $priority = $_POST['priority'];
    $sql = "DELETE FROM TBL_DEDUCTION_TYPE WHERE ROWID = $rowid";
    $result = $conn->query($sql);
        $sql = "INSERT INTO TBL_DEDUCTION_TYPE (DEDUCTION_NAME, PRIORITY, DEDUCTION_TYPE, COMPANY) 
                VALUES ('$dedname', '$priority', '$dedtype', '$company')";
        $result = $conn->query($sql);
    header("Location: deductions.php");
  }
  $rowid = $_GET['id'];
  $sql = "SELECT * FROM TBL_DEDUCTION_TYPE WHERE ROWID = $rowid";
    $result = $conn->query($sql);
    $rows = mysqli_num_rows($result);
    $_SESSION['rowid'] = $rowid;
    if($rows > 0){
        while($row = $result->fetch_assoc()) {
            $rowid = $row['rowid']; $dedname = $row['deduction_name']; $dedtype = $row['deduction_type']; $priority = $row['priority'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" type = "text/css" href="static/css/style.css">
    <link rel="icon" type = "images/x-icon" href="static/images/logo.png">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <title>EDIT DEDUCTIONS</title>
</head>
<body>
    <div class="container">
        <header>Deductions</header>
        <form action="edit_deductions.php" method="post">
            <div class="form first active">
                <div class="details personal">
                    <span class="title">Deduction Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Deduction Name</label>
                            <?php echo '<input type="text" size="50" id = "ded_name" name = "ded_name" placeholder="Enter Deduction Name" value="'.$dedname.'" required autofocus>';?>
                        </div>

                        <div class="input-field">
                            <label>Priority Number</label>
                            <?php echo '<input type="text" size="50"  id = "priority" name = "priority" placeholder="Enter Priority Number" value="'.$priority.'" required >';?>
                        </div>

                        <div class="input-field">
                            <label>Deduction Type</label>
                            <select  name="ded_type" id="ded_type">
                            <?php
                                if($dedtype == "NONFIXED"){
                                    echo '
                                <option value="FIXED">FIXED</option>
                                <option value="NONFIXED" selected>NONFIXED</option>';}
                                else{
                                    echo '
                                  <option value="FIXED" selected>FIXED</option>
                                  <option value="NONFIXED">NONFIXED</option>';}
                            ?>
                              </select>
                            </select>
                        </div>
                        
                        <button class="submit" type="button" onclick="check_duplicate_deductions(4)">
                            <span class="btnText">Save</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                        <button class="submit" type = "submit" id = "submit" name = "submit" hidden></button>
                    </div>
                </div>
            </div>
                    </div>
                </div> 
            </div>
        </form>
    </div>
    <?php echo '<script type = "text/javascript" src="static/js/script12.js" data-rowid = '.$rowid.'></script>'?>
</body>
</html>