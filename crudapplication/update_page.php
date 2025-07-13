<?php
// Database connection
include('dbconnection.php');

// Handle form submission
if (isset($_POST['submit'])) {
    $id = intval($_GET['id']);
    $firstName = mysqli_real_escape_string($connection, $_POST['FirstName']);
    $lastName = mysqli_real_escape_string($connection, $_POST['LastName']);
    $age = intval($_POST['age']);

    $query = "UPDATE students SET FirstName='$firstName', LastName='$lastName', age=$age WHERE ID=$id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<script>alert('Student updated successfully');</script>";
        echo "<script>window.location.href='index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error updating student');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Student</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f4f6f9;
      font-family: Arial, sans-serif;
    }

    .form-container {
      max-width: 500px;
      margin: 60px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .form-container h2 {
      margin-bottom: 20px;
      text-align: center;
      color: #2c3e50;
    }

    .form-control {
      border-radius: 6px;
    }

    .btn {
      border-radius: 6px;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>Update Student</h2>

  <?php
  // Load student data
  if (isset($_GET['id'])) {
      $id = intval($_GET['id']);
      $sql = mysqli_query($connection, "SELECT * FROM students WHERE id = $id");

      if (mysqli_num_rows($sql) == 1) {
          $student = mysqli_fetch_assoc($sql);
      } else {
          echo "<div class='alert alert-danger'>Student not found.</div>";
          exit;
      }
  } else {
      echo "<div class='alert alert-danger'>No student ID provided.</div>";
      exit;
  }
  ?>

  <form action="update_page.php?id_new=<?php echo $id; ?>" method="POST">
    <div class="form-group">
      <label for="firstName">First Name</label>
      <input type="text" class="form-control" fname="FirstName" lname="LastName" value="<?php echo htmlspecialchars($student['FirstName']); ?>" required>
    </div>

    <div class="form-group">
      <label for="lastName">Last Name</label>
      <input type="text" class="form-control" fname="FirstName" lname="LastName" value="<?php echo htmlspecialchars($student['LastName']); ?>" required>
    </div>

    <div class="form-group">
      <label for="age">Age</label>
      <input type="number" class="form-control" name="age" id="age" value="<?php echo htmlspecialchars($student['age']); ?>" required>
    </div>

    <button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>
    <a href="index.php" class="btn btn-secondary btn-block">Cancel</a>
  </form>
</div>

</body>
</html>
