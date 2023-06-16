<?php
  session_start();
  if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
    header("Location: ../index.php");
  }
  include "../config.php";
  $company = $_SESSION['company'];
  $user_name = $_SESSION['username'];
  if(isset($_POST['close'])){
    header("Location: sss.php");
  }
  if(isset($_POST['submit'])){
    $rowid = $_SESSION['rowid'];
    $dedname = $_POST['ded_name']; $dedtype = $_POST['ded_type']; $priority = $_POST['priority'];
    $sql = "DELETE FROM TBL_DEDUCTION_TYPE WHERE ROWID = $rowid";
    $result = $conn->query($sql);
        $sql = "INSERT INTO TBL_DEDUCTION_TYPE (DEDUCTION_NAME, PRIORITY, DEDUCTION_TYPE, COMPANY) 
                VALUES ('$dedname', $priority, '$dedtype', '$company')";
        $result = $conn->query($sql);
    header("Location: sss.php");
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
    <link rel="icon" type = "images/x-icon" href="static '/images/logo.png">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <title>EDIT SSS</title>
</head>
<body>
    <div class="container">
        <header>SSS</header>
        <form action="/edit_sss/{{ values.0 }}" method="post">
            <div class="form third active">
                <div class="details address">
                    <span class="title">-----------------------------------------------------------------------------------------</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Salary From</label>
                            <input type="number" step="any" min="0" max="100000" id = "sssfrom" name = "sssfrom" placeholder="Enter amount" value="{{values.1}}" required autofocus>
                        </div>

                        <div class="input-field">
                            <label>Salary To</label>
                            <input type="number" step="any" min="0" max="100000" id = "sssto" name = "sssto" placeholder="Enter amount" value="{{values.2}}" required>
                        </div>

                        <div class="input-field">
                            <label>Employee Share</label>
                            <input type="number" step="any" min="0" max="100000" id = "ee" name = "ee" placeholder="Enter amount" value="{{values.3}}" oninput="totalsss()"  required>
                        </div>

                        <div class="input-field">
                            <label>Employer Share</label>
                            <input type="number" step="any" min="0" max="100000" id = "er" name = "er" placeholder="Enter amount" value="{{values.4}}" oninput="totalsss()"  required>
                        </div>

                        <div class="input-field">
                            <label>EC</label>
                            <input type="number" step="any" min="0" max="100000" id = "ec" name = "ec" placeholder="Enter amount" value="{{values.5}}" oninput="totalsss()"  required>
                        </div>

                        <div class="input-field">
                            <label>WISP Employee</label>
                            <input type="number" step="any" min="0" max="100000" id = "wispee" name = "wispee" placeholder="Enter amount" value="{{values.6}}" oninput="totalsss()"  required>
                        </div>
                    </div>
                </div>

                <div class="details family">
                    <span class="title">-----------------------------------------------------------------------------------------</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>WISP Employer</label>
                            <input type="number" step="any" min="0" max="100000" id = "wisper" name = "wisper" placeholder="Enter amount" value="{{values.7}}" oninput="totalsss()"  required>
                        </div>

                        <div class="input-field">
                            <label>Total Share EE</label>
                            <input type="number" step="any" min="0" max="100000" id = "totee" name = "totee" placeholder="Enter amount" value="{{values.8}}" required>
                        </div>

                        <div class="input-field">
                            <label>Total Share ER</label>
                            <input type="number" step="any" min="0" max="100000" id = "toter" name = "toter" placeholder="Enter amount" value="{{values.9}}" required>
                        </div>

                    </div>

                    <div class="buttons">
                        <button class="submit" type="submit">
                            <span class="btnText">Save</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>
    <script type = "text/javascript" src="static/js/script12.js"></script>
</body>

</html>
