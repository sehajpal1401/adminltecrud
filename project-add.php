<?php  
session_start();
?>

<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
     

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
  <?php
 include('config/dbcon.php');
  
  if(isset($_POST['submitadd']))
  {
    $projectname=$_POST['name'];        
    $projectdesc=$_POST['description'];
    $projectmembers=$_POST['teammembers'];
    $team= implode(",",$projectmembers);
    $projectstatus=$_POST['status'];
    // $photo = $_FILES['photo'];
    // $photo_name = $photo['name'];
    // $photo_temp = $photo['temp_name'];
    $clientcompany=$_POST['company'];
    $projectleader=$_POST['leader'];
    $estimatedbudget=$_POST['budget'];
    $spentbudget=$_POST['amount'];
    $estimatedduration=$_POST['duration'];

   // move_uploaded_file($photo_temp,'uploads/',$photo_name);

    
    $sql = "INSERT INTO `projects` (`project_name`, `project_desc`,`project_status`,`project_team`,`client_company`, `project_leader`, `project_added`) 
    VALUES ('$projectname', '$projectdesc','$projectstatus','$team','$clientcompany', '$projectleader', CURRENT_TIMESTAMP)";
     
    if($con->query($sql)==True)
    {
      $last_id = $con->insert_id;
      $sql1="INSERT INTO `project_budget` (`project_id`, `estimated_budget`, `amount_spent`, `estimated_duration`) VALUES ('$last_id', '$estimatedbudget', '$spentbudget', '$estimatedduration')";
      if($con->query($sql1)==True)
      {
        echo "done";
        //header("location:index.php");
      }
      else
      {
        echo "ERROR $sql1 <br> $con->error";
      }
    }
    else
    {
        echo "ERROR $sql <br> $con->error";
    }

    
      
  
  }
?>
            <form action=" " method="POST">
              <div class="form-group" action="" method="post">
                <label for="inputName">Project Name</label>
                <input type="text" name="name" id="inputName" class="form-control">
              </div>
              <div class="form-group" action="" method="post">
                <label for="inputDescription">Project Description</label>
                <textarea id="inputDescription" name="description" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group" action="" method="post">
                <label for="inputStatus">Status</label>
                <select id="inputStatus" name="status" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>On Hold</option>
                  <option>Canceled</option>
                  <option>Success</option>
                 </select>
              </div>
              <div class="form-group" action="" method="post" enctype="multipart/form-data">
                <label for="inputClientCompany">Select files</label>
                <input type="file" name="photo[]" id="inputfile" class="form-control" multiple>
              </div>
              <div class="form-group" action="" method="post">
                <label for="inputClientCompany">Client Company</label>
                <input type="text" name="company" id="inputClientCompany" class="form-control">
              </div>
              <div class="form-group">
                <label>Project Team</label>
                <select multiple class="custom-select" name="teammembers[]" id="project_team">
                 <?php
                   include('config/dbcon.php');
                   $sql="SELECT * FROM `users`";
                   $result = mysqli_query($con, $sql);
                   while($row = mysqli_fetch_assoc($result)){
                   echo "<option value='".$row['id']."'>".$row['username']."</option>";}
                 ?>
                </select>
              </div>
              <div class="form-group" action="" method="post">
                <label for="inputProjectLeader">Project Leader</label>
                <input type="text" name="leader" id="inputProjectLeader" class="form-control">
              </div>
            </div>
  
          </div>
         
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Budget</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Estimated budget</label>
                <input type="number" name = "budget" id="inputEstimatedBudget" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Total amount spent</label>
                <input type="number" name = "amount" id="inputSpentBudget" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Estimated project duration</label>
                <input type="number" name= "duration" id="inputEstimatedDuration" class="form-control">
              </div>
            </div>
            
          </div>
          
        </div>
      </div> 
      <div class="row">
        <div class="col-12">
          <a href="http://localhost/php-admin-panel/funda-service/admin/index.php" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Create new Porject" name="submitadd" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  </form>
  <!-- /.content-wrapper -->
<?php
  include('includes/footer.php');
?>

</body>
</html>
