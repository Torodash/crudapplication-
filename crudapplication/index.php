<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Management System</title>

  <!-- ✅ Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    /* Your custom CSS stays here... */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background: #f5f7fa;
    }
    header {
      background-color: #2c3e50;
      padding: 20px;
      color: white;
      text-align: center;
    }
    .container {
      max-width: 900px;
      margin: 40px auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 30px;
    }
    table, th, td {
      border: 1px solid #ddd;
    }
    th, td {
      padding: 12px;
      text-align: left;
    }
    th {
      background-color: #3498db;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
<?php include('dbconnection.php'); ?>

<header>
  <h1>Student Management System</h1>
</header>

<div class="container">
  <h2 style="text-align: left;">Student Records</h2>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
         <th>Update</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM students";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed: " . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['FirstName']; ?></td>
                  <td><?php echo $row['LastName']; ?></td>
                  <td><?php echo $row['age']; ?></td>
                  
  
 <td>
  <a href="update_page.php?id=<?php echo $row['ID']; ?>" class="btn btn-warning btn-sm">Edit</a>

  <a href="delete_page.php?id=<?php echo $row['ID']; ?>" 
     class="btn btn-danger btn-sm"
     onclick="return confirm('Are you sure you want to delete this student?');">
     Delete
  </a>
</td>

</a>

</td>

                  
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
  </table>
  
  <?php
  if(isset($GET['insert_msg'])){

    echo"<h6>".$_GET['insert_msg']."</h6>";
  }

  ?>
  
  <?php
  if(isset($GET['update_msg'])){

    echo"<h6>".$_GET['update_msg']."</h6>";
  }

  ?>
     





  <?php
  if(isset($GET['delete_msg'])){

    echo"<h6>".$_GET['delete_msg']."</h6>";
  }

  ?>

  <!-- ✅ Button to trigger modal -->
  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
    Add Student
  </button>

  <div class="modal fade" id="myModal" tabindex="-1">
    <div class="modal-dialog">
      <form action="insert_data.php" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add New Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <div class="mb-3">
              <label for="firstName" class="form-label">FirstName</label>
              <input type="text" name="firstName" id="firstName" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="lastName" class="form-label">LastName</label>
              <input type="text" name="lastName" id="lastName" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="age" class="form-label">age</label>
              <input type="number" name="age" id="age" class="form-control" required>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <input type="submit" name="save" class="btn btn-success" value="ADD">
          </div>
        </div>
      </form>
    </div>
  </div>

</div>


<!-- ✅ Bootstrap 5 JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
