<?php
//$_POST["establishment_id"] = 1;
$connection = mysqli_connect("localhost","root","","pfe");
//mysql_select_db("pfe");
$res = mysqli_query($connection,"SELECT users.id,users.name FROM users
inner join user_has_establishment on users.id = user_has_establishment.user_id
 inner join establishment on establishment.id = user_has_establishment.establishment_id
WHERE users.role='20' and establishment.id=".$_POST["establishment_id"]);
echo " <label  class=\"field select\"> <select name='user_id' id='user_id'>";
    while($row = mysqli_fetch_assoc($res)){
        echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
}
echo "</select>  <i class=\"arrow\"></i> <br clear=\"all\"> </label>";
?>