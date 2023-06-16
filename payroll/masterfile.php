<?php
  session_start();
  if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
    header("Location: ../index.php");
  }
  include "../config.php";
  $user_name = $_SESSION['username'];
  $company = $_SESSION['company'];
  $role = $_SESSION['role'];
?>
<?php include "includes/header_datatable.php";?>
<title>MASTERFILE</title>
 <div class="col-md-12">
        <?php echo "<h4>$company - MASTERFILE </h4>"; ?>  <span><a href="add_employee.php" class="btn btn-primary">Add New Employee</a></span>
        <div class="table-responsive">
  <table id="bootstrapdatatable" class="table table-striped table-bordered" width="100%">
            <thead>
                <th><input type="checkbox" id="checkall" /></th>
                <th>EMPNO</th>
                <th>LAST NAME</th>
                <th>FIRST NAME</th>
                <th>MIDDLE NAME</th>
                <th>Position</th>
                <th>Edit</th>
                <th>Picture</th>
             </thead>
   <tbody>
   <?php
   $sql = "SELECT * FROM TBL_MASTERFILE WHERE company = '$company' and status_ = 'ACTIVE' ORDER BY empno DESC";
   $result = $conn->query($sql);
   if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        echo "
        <tr>  
        <td><input type='checkbox' class='checkthis' /></td>
        <td>".$row['empno']."</td>  
        <td>".$row['lname']."</td>  
        <td>".$row['fname']."</td>  
        <td>".$row['mname']."</td>  
        <td>".$row['position']."</td>  
        <td><p data-placement='top' data-toggle='tooltip' title='Edit'><a href='edit_employee.php?empno=".$row['empno']."' class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' ><span class='glyphicon glyphicon-pencil'></span></a></p></td>
        <td><p data-placement='top' data-toggle='tooltip' title='Edit'><a href='/employee_image/{{ values.0 }}' class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' ><span class='glyphicon glyphicon-camera'></span></a></p></td>
        </tr>
        ";  
    }
   }
   ?> 
   </tbody>    
  </table>
        </div>
    </div>
    <script>
      $(document).ready(function() {
          $('#bootstrapdatatable').DataTable({     
            "aLengthMenu": [[3, 5, 10, 25, -1], [3, 5, 10, 25, "All"]],
              "iDisplayLength": 25
             } 
          );
      } );
  </script>
</body> 
</html>