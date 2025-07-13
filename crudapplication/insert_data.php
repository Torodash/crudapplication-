<?php
// Connect to the database
include('dbconnection.php');

// Check if form was submitted
if (isset($_POST['save'])) {
    // Get form data safely
    $firstName = mysqli_real_escape_string($connection, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($connection, $_POST['lastName']);
    $age = mysqli_real_escape_string($connection, $_POST['age']);

    // Prepare insert query
    $query = "INSERT INTO students (FirstName, LastName, age) 
              VALUES ('$firstName', '$lastName', '$age')";

    // Execute query
    if (mysqli_query($connection, $query)) {
        // Redirect back to index page after successful insert
        header("Location: index.php?msg=Student added successfully");
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }
} else {
    // If someone tries to access the file directly
    echo "Invalid Request.";
}
?>
