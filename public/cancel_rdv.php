<?php
$connection = mysqli_connect("localhost","root","","pfe");
echo $sql="DELETE  FROM rdv WHERE id=".$_POST['id'];
$stmt = mysqli_prepare($connection, $sql) or die(mysqli_error($connection));
mysqli_stmt_execute($stmt);


?>


