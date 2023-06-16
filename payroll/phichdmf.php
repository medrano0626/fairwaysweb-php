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
    $phicto1 = $_POST['phicto1']; $phicfrom2 = $_POST['phicfrom2']; $phicto2 = $_POST['phicto2']; $phicfrom3 = $_POST['phicfrom3'];
    $amt1 = $_POST['amt1']; $amt2 = $_POST['amt2']; $amt3 = $_POST['amt3']; $hdmf = $_POST['hdmf'];
    $sql = "DELETE FROM TBL_PHICHDMF";
    $result = $conn->query($sql);
        $sql = "INSERT INTO TBL_PHICHDMF (phicto1, phicfrom2, phicto2, phicfrom3, amt1, amt2, amt3, hdmf) 
                VALUES ($phicto1, $phicfrom2, $phicto2, $phicfrom3, $amt1, $amt2, $amt3, $hdmf)";
        $result = $conn->query($sql);
    header("Location: phichdmf.php");
  }
  $sql = "SELECT * FROM TBL_PHICHDMF";
    $result = $conn->query($sql);
    $rows = mysqli_num_rows($result);
    if($rows > 0){
        while($row = $result->fetch_assoc()) {
            $phicto1 = $row['phicto1']; $phicfrom2 = $row['phicfrom2']; $phicto2 = $row['phicto2']; $phicfrom3 = $row['phicfrom3'];
            $amt1 = $row['amt1']; $amt2 = $row['amt2']; $amt3 = $row['amt3']; $hdmf = $row['hdmf'];
        }
    }
?>

<?php include "includes/header.php";?>
    <!----======== CSS ======== -->
    <link rel="stylesheet" type = "text/css" href="static/css/style5.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>PHIC/HDMF</title>
    <?php include "includes/body.php";?>
    <div class="container">
        <header>PHIC/HDMF</header>
        <form action="phichdmf.php" method="post">

            <div class="form third active">
                <div class="details address">
                    <span class="title">PHIC-------------------------------------------------------------------------------------</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>This Amount and Below</label>
                            <?php echo '<input type="number" step="any" min="0" max="100000" id = "phicto1" name = "phicto1" placeholder="Enter amount" value="'.$phicto1.'" required autofocus>';?>
                        </div>

                        <div class="input-field">
                            <label>Contribution Amount (EE and ER)</label>
                            <?php echo '<input type="number" step="any" min="0" max="100000" id = "amt1" name = "amt1" placeholder="Enter amount" value="'.$amt1.'" required>';?>
                        </div>

                        <div class="input-field">
                            
                        </div>

                        <div class="input-field">
                            <label>Salrary From</label>
                            <?php echo '<input type="number" step="any" min="0" max="100000" id = "phicfrom2" name = "phicfrom2" placeholder="Enter amount" value="'.$phicfrom2.'" required>';?>
                        </div>

                        <div class="input-field">
                            <label>Salary To</label>
                            <?php echo '<input type="number" step="any" min="0" max="100000" id = "phicto2" name = "phicto2" placeholder="Enter amount" value="'.$phicto2.'" required>';?>
                        </div>

                        <div class="input-field">
                            <label>% Of Share (EE and ER)</label>
                            <?php echo '<input type="number" step="any" min="0" max="100000" id = "amt2" name = "amt2" placeholder="Enter Percentage" value="'.$amt2.'" required>';?>
                        </div>
                        
                        <div class="input-field">
                            <label>This Amount and Above</label>
                            <?php echo '<input type="number" step="any" min="0" max="100000" id = "phicfrom3" name = "phicfrom3" placeholder="Enter amount" value="'.$phicfrom3.'" required>';?>
                        </div>

                        <div class="input-field">
                            <label>Contribution Amount (EE and ER)</label>
                            <?php echo '<input type="number" step="any" min="0" max="100000" id = "amt3" name = "amt3" placeholder="Enter amount" value="'.$amt3.'" required>';?>
                        </div>

                        <div class="input-field">
                            
                        </div>

                    </div>
                </div>

                <div class="details family">
                    <span class="title">HDMF------------------------------------------------------------------------------------</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Percentage of Contribution (EE and ER)</label>
                            <?php echo '<input type="number" step="any" min="0" max="100000" id = "hdmf" name = "hdmf" placeholder="Enter amount" value="'.$hdmf.'" required>';?>
                        </div>

                        <div class="input-field">
                            
                        </div>

                    </div>

                    <div class="buttons">
                        <button class="submit" type="submit" name="submit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>
    </body>
</html>

