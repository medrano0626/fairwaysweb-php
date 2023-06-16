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
<title>SSS</title>
 <div class="col-md-12">
        <h4>SSS TABLE</h4> <span><a href="add_sss.php" class="btn btn-primary">Add SSS</a></span>  
        <div class="table-responsive">
  <table id="bootstrapdatatable" class="table table-striped table-bordered" width="100%">
            <thead>
                <th><input type="checkbox" id="checkall" /></th>
                <th>SALARY FROM</th>
                <th>SALARY TO</th>
                <th>EE SHARE</th>
                <th>ER SHARE</th>
                <th>EC</th>
                <th>WISP EE</th>
                <th>WISP ER</th>
                <th>TOTAL EE</th>
                <th>TOTAL ER</th>
                <th>Edit</th>
                <th>Delete</th>
             </thead>
   <tbody>
   <?php
   $sql = "SELECT * FROM TBL_SSS ORDER BY sssfrom";
   $result = $conn->query($sql);
   if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        echo "
        <tr>
        <td><input type='checkbox' class='checkthis' /></td>
        <td>".$row['sssfrom']."</td>  
        <td>".$row['sssto']."</td>  
        <td>".$row['ee']."</td> 
        <td>".$row['er']."</td>  
        <td>".$row['ec']."</td>  
        <td>".$row['wispee']."</td>  
        <td>".$row['wisper']."</td>  
        <td>".$row['totee']."</td>   
        <td>".$row['toter']."</td>   
        <td><p data-placement='top' data-toggle='tooltip' title='Edit'><a href='edit_sss.php?id=".$row['rowid']."' class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' ><span class='glyphicon glyphicon-pencil'></span></a></p></td>
        <td><p data-placement='top' data-toggle='tooltip' title='Delete'><a onclick='deletesss(".$row['rowid'].")' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#delete' ><span class='glyphicon glyphicon-trash'></span></a></p></td>
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