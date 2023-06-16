<?php
  session_start();
  if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
    header("Location: ../index.php");
  }
  include "../config.php";
  $user_name = $_SESSION['username'];
  $company = $_SESSION['company'];
  $role = $_SESSION['role'];
  if(isset($_POST['submit'])){
    $regholiday = $_POST['regday']; $regholidayot = $_POST['regot']; 
    $specialday = $_POST['specday']; $specialdayot = $_POST['specot'];
    $sql = "DELETE FROM TBL_RATE";
    $result = $conn->query($sql);
        $sql = "INSERT INTO TBL_RATE (regholiday, regholidayot, specialday, specialdayot) 
                VALUES ($regholiday, $regholidayot, $specialday, $specialdayot)";
        $result = $conn->query($sql);
  }
  $sql = "SELECT * FROM TBL_RATE";
    $result = $conn->query($sql);
    $rows = mysqli_num_rows($result);
    if($rows > 0){
        while($row = $result->fetch_assoc()) {
            $regholiday = $row['regholiday']; $regholidayot = $row['regholidayot']; 
            $specialday = $row['specialday']; $specialdayot = $row['specialdayot']; 
        }
    }
?>

<?php include "includes/header.php";?>
    <!----======== CSS ======== -->
    <link rel="stylesheet" type = "text/css" href="static/css/style9.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>RATE</title>
    <?php include "includes/body.php";?>
    <div class="container">
        <header>RATE</header>
        <form action="rate.php" method="post">
            <div class="form third active">
                <div class="details address">
                    <span class="title">REGULAR HOLIDAY</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Regular Holiday Rate</label>
                            <?php echo '<input type="number" step="any" min="0" max="100000" id = "regday" name = "regday" value="'.$regholiday.'" required autofocus>';?>
                        </div>

                        <div class="input-field">
                            <label>Reg. Holiday OT Rate</label>
                            <?php echo '<input type="number" step="any" min="0" max="100000" id = "regot" name = "regot" value="'.$regholidayot.'" required>';?>
                        </div>

                    </div>
                </div>
                <div class="details family">
                    <span class="title">SPECIAL HOLIDAY</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Special Holiday Rate</label>
                            <?php echo '<input type="number" step="any" min="0" max="100000" id = "specday" name = "specday" value="'.$specialday.'" required>';?>
                        </div>

                        <div class="input-field">
                            <label>Spec. Holiday OT Rate</label>
                            <?php echo '<input type="number" step="any" min="0" max="100000" id = "specot" name = "specot" value="'.$specialdayot.'" required>';?>
                        </div>
                    </div>
                </div> 
                <div class="details family">
                    <span class="title"></span>
                    <div class="buttons">
                        <button class="submit" type="submit" name = "submit">
                            <span class="btnText">Save</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>
    </body>
</html> 

