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
<title>DEDUCTIONS</title>
 <div class="col-md-12">
        <?php echo "<h4>$company - DEDUCTION FILE </h4>"; ?>  <span><a href="add_deductions.php" class="btn btn-primary">Add New Deduction</a></span>
        <div class="table-responsive">
  <table id="bootstrapdatatable" class="table table-striped table-bordered" width="100%">
            <thead>
                <th><input type="checkbox" id="checkall" /></th>
                <th>ROWID</th>
                <th>DEDUCTION NAME</th>
                <th>PRIORITY NUMBER</th>
                <th>DEDUCTION TYPE</th>
                <th>Edit</th>
                <th>Delete</th>
             </thead>
   <tbody>
   <?php
   $sql = "SELECT * FROM TBL_DEDUCTION_TYPE WHERE company = '$company' ORDER BY DEDUCTION_NAME";
   $result = $conn->query($sql);
   if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        echo "
        <tr>  
        <td><input type='checkbox' class='checkthis' /></td>
        <td>".$row['rowid']."</td>  
        <td>".$row['deduction_name']."</td>  
        <td>".$row['priority']."</td>  
        <td>".$row['deduction_type']."</td>  
        <td><p data-placement='top' data-toggle='tooltip' title='Edit'><a href='edit_deductions.php?id=".$row['rowid']."' class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' ><span class='glyphicon glyphicon-pencil'></span></a></p></td>
        <td><p data-placement='top' data-toggle='tooltip' title='Delete'><a onclick='deletelist(".$row['rowid'].")' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#delete' ><span class='glyphicon glyphicon-trash'></span></a></p></td>
        </tr>
        ";  
    }
   }
   ?>  
    </tbody>    
  </table>
        </div>
    </div>
    <script type = "text/javascript" src="static/js/script12.js"></script> 
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