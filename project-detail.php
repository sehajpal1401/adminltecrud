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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Project Detail</title>
</head>
<body>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Project Detail</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="http://localhost/admin-master/">Home</a></li>
            <li class="breadcrumb-item active">Project Detail</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
   <?php
      include('config/dbcon.php');
      if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $sql="SELECT * FROM project_budget where project_id='$id'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
        }
         if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $sql1="SELECT * FROM projects where project_id='$id'";
            $result1 = mysqli_query($con,$sql1);
            $row1= mysqli_fetch_array($result1); 
            //$project_file1=$row1['project_file'];
            //$project_file2=explode(",",$project_file1);          
        }
     ?> 
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Projects Detail</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
            <div class="row">
              <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Estimated budget</span>
                    <span class="info-box-number text-center text-muted mb-0"><?php echo $row['estimated_budget']; ?></span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Total amount spent</span>
                    <span class="info-box-number text-center text-muted mb-0"><?php echo $row['amount_spent']; ?></span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Estimated project duration</span>
                    <span class="info-box-number text-center text-muted mb-0"><?php echo $row['estimated_duration']; ?></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                  <h4>Recent Activity</h4>
                  <div class="post">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="assets/dist/img/user1-128x128.jpg" alt="user image">
                      <span class="username">
                        <a href="#"><?php echo $row1['project_name']; ?></a>
                      </span>
                      <span class="description">Shared publicly -<?php echo $row1['project_added']; ?></span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                        <?php 
                         echo $row1['project_desc'];  
                        ?>
                    </p>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
            <h3 class="text-primary"><i class="fas fa-paint-brush"></i><?php echo $row1['project_name']; ?></h3>
            <p class="text-muted"><?php echo $row1['project_desc']; ?></p>
            <br>
            <div class="text-muted">
              <p class="text-sm">Client Company
                <b class="d-block"><?php echo $row1['client_company']; ?></b>
              </p>
              <p class="text-sm">Project Leader
                <b class="d-block"><?php echo $row1['project_leader']; ?></b>
              </p>
            </div>
            
                      </div>
        </div>      
      </div>  
      <!-- /.card-body -->
    </div>
    <!-- /.card --> 
  </section>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
  <?php
  include('includes/footer.php');
?>
</body>
</html>