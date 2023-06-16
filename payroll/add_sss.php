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
    $sssfrom = $_POST['sssfrom']; $sssto = $_POST['sssto']; $ee = $_POST['ee']; $er = $_POST['er'];
    $ec = $_POST['ec']; $wispee = $_POST['wispee']; $wisper = $_POST['wisper'];
    $totee = $_POST['totee']; $toter = $_POST['toter'];
    $sql = "INSERT INTO TBL_SSS (sssfrom, sssto, ee, er, ec, wispee, wisper, totee, toter) 
            VALUES ($sssfrom, $sssto, $ee, $er, $ec, $wispee, $wisper, $totee, $toter)";
    $result = $conn->query($sql);
    header("Location: sss.php");

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
    <title>ADD SSS</title>
</head>
<body>
    <div class="container">
        <header>SSS</header>

        <form action="add_sss.php" method="post">
            <div class="form third active">
                <div class="details address">
                    <span class="title">-----------------------------------------------------------------------------------------</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Salary From</label>
                            <input type="number" step="any" min="0" max="100000" id = "sssfrom" name = "sssfrom" placeholder="Enter amount" required autofocus>
                        </div>

                        <div class="input-field">
                            <label>Salary To</label>
                            <input type="number" step="any" min="0" max="100000" id = "sssto" name = "sssto" placeholder="Enter amount" required>
                        </div>

                        <div class="input-field">
                            <label>Employee Share</label>
                            <input type="number" step="any" min="0" max="100000" id = "ee" name = "ee" placeholder="Enter amount" oninput="totalsss()" required>
                        </div>

                        <div class="input-field">
                            <label>Employer Share</label>
                            <input type="number" step="any" min="0" max="100000" id = "er" name = "er" placeholder="Enter amount" oninput="totalsss()" required>
                        </div>

                        <div class="input-field">
                            <label>EC</label>
                            <input type="number" step="any" min="0" max="100000" id = "ec" name = "ec" placeholder="Enter amount" oninput="totalsss()" required>
                        </div>

                        <div class="input-field">
                            <label>WISP Employee</label>
                            <input type="number" step="any" min="0" max="100000" id = "wispee" name = "wispee" placeholder="Enter amount" oninput="totalsss()" required>
                        </div>
                    </div>
                </div>

                <div class="details family">
                    <span class="title">-----------------------------------------------------------------------------------------</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>WISP Employer</label>
                            <input type="number" step="any" min="0" max="100000" id = "wisper" name = "wisper" placeholder="Enter amount" oninput="totalsss()" required>
                        </div>

                        <div class="input-field">
                            <label>Total Share EE</label>
                            <input type="number" step="any" min="0" max="100000" id = "totee" name = "totee" placeholder="Enter amount"  required>
                        </div>

                        <div class="input-field">
                            <label>Total Share ER</label>
                            <input type="number" step="any" min="0" max="100000" id = "toter" name = "toter" placeholder="Enter amount"  required>
                        </div>

                    </div>

                    <div class="buttons">
                        <button class="submit" type="button" onclick="check_duplicate_sss(5)">
                            <span class="btnText">Save</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                        <button class="submit" type = "submit" id = "submit" name = "submit" hidden></button>
                    </div>

                </div> 
            </div>
        </form>
    </div>
    <script type = "text/javascript" src="static/js/script12.js"></script>
    
</body>

</html>
