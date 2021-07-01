<?php
session_start();
include('config/dbcon.php');
if(!isset($_SESSION['email'])){
  header('location:login.php');
}
?>

<?php
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Projects</title>


    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
          <?php
              
              include('config/dbcon.php');
              
              $sql = "SELECT * FROM projects";
              $sql1 = "SELECT * FROM project_budget";
              $result = mysqli_query($con, $sql) or die("query unsuccessful");
              
               if(mysqli_num_rows($result)>0){
          ?>
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Project Name
                      </th>
                      <th style="width: 30%">
                          Team Members
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              
              <tbody>
                <?php   
                  while($row = mysqli_fetch_assoc($result)){
                ?>
                  <tr>
                      <td>
                        <?php echo $row['project_id']; ?> 
                      </td>
                      <td>
                          <a>
                          <?php echo $row['project_name']; ?>
                          </a>
                          <br/>
                          <small>
                              Created 01.01.2019
                          </small>
                      </td>
                      <td>
                          <?php echo $row['project_team'];?>
                      </td>
                      <td>
                        <?php echo $row['project_status'];?>
                      </td>
                      <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm" href='project-detail.php?id=<?php echo $row['project_id']; ?>'>View</a> 
                          </a>
                          </a>
                           <a class="btn btn-info btn-sm" href='project-edit.php?id=<?php echo $row['project_id']; ?>'>Edit</a> 
                          </a>
                          <a class="btn btn-danger btn-sm" href='delete.php?id=<?php echo $row['project_id']; ?>'>Delete
                          </a>
                          
                      </td>
                  </tr>
                  <?php } ?>
              </tbody>
          </table>
          <?php } else{
            echo "<h2>No record found</h2>";
          }
          mysqli_close($con);
          ?>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</body>
</html>
<?php
  include('includes/footer.php');
?>