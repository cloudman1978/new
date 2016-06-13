<?php

//$_POST["id"] = 1;
//$_POST['state'] = 10;
$connection = mysqli_connect("localhost","root","","pfe");
//mysql_select_db("pfe");
print_r($_POST);
echo $res = "Update rdv set state=".$_POST['state']." where rdv.id=".$_POST["id"];
$stmt = mysqli_prepare($connection, $res) or die(mysqli_error($connection));
mysqli_stmt_execute($stmt);
?>