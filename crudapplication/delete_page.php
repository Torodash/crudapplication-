<?php include('dbconnection.php'); ?>

<?php

if(isset($_GET['ID'])){
 $id = $_GET['ID'];

$query = "delete from'students' where 'ID' = '$ID'";


$result = mysqli_query($connection, $query);


if(!$result){


die("Query Failed".mysqli_error());

}


else{


header('location:index.php?delete_msg=You have deleted the record.');

}

}

?>