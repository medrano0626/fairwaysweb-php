<?php
  session_start();

  if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
    header("Location: ../index.php");
  }
  $user_name = $_SESSION['username'];
  $company = $_SESSION['company'];
  $role = $_SESSION['role'];
?>
<?php include "includes/header.php";?>
<title>MAIN</title>
<?php include "includes/body.php";?>

<form action="" method="post" id="form_submit">
<div style="padding:0 16px">
  <h1 style="text-align: center;">FAIRWAYS CARGO MOVERS CORP.</h1>
  <h2 style="text-align: center;"><?php echo "Payroll System - $company, Username - $user_name"; ?></h2>
</div>
</form>

</body>
</html>