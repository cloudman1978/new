<?php
header('Content-Type: text/html; charset=utf-8');
//$_POST["other_inds"] = 1;
//print_r($_POST);
$connection = mysqli_connect("localhost","root","","pfe");
//mysql_select_db("pfe");
$res = mysqli_query($connection,"SELECT indicators.* FROM indicators
WHERE id=".$_POST['other_inds'].";");


echo "   <tbody name=\"other_indicators\" id=\"other_indicators\">";
while($row = mysqli_fetch_assoc($res)){
    echo "<tr id=".$row["id"].">";
    echo "<td> ".utf8_encode($row["name"])."</td>";
    echo '<input type="hidden" name="indic[]" value="'.$row['id'].'">';
    echo "<td> NULL </td>";
    echo "<td> ".utf8_encode($row["unity"])."</td>";
    echo "<td> ".utf8_encode($row["valUs"])."</td>";
    echo "<td><a href=\"javascript:void(0)\" class=\"table-icon delete\" title=\"Delete\"
                        onclick='del(".$row["id"].")'></td>";
    echo "<br></tr> ";

}
echo "</tbody> </table>"
?>