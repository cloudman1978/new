<?php
header('Content-Type: text/html; charset=utf-8');
//$_POST["analysepred_id"] = 1;
$connection = mysqli_connect("localhost","root","","pfe");
//mysql_select_db("pfe");
$res = mysqli_query($connection,"SELECT indicators.* FROM analyses_predef
inner join analyse_predef_has_indicator on analyse_predef_has_indicator.analyse_predef_id = analyses_predef.id
 inner join indicators on indicators.id = analyse_predef_has_indicator.indicator_id
WHERE analyses_predef.id=".$_POST['analysepred_id'].";");


echo "   <tbody name=\"ajaxResp\" id=\"ajaxResp\">";
while($row = mysqli_fetch_assoc($res)){
    echo '<input type="hidden" name="indic[]" value="'.$row['id'].'">';
    echo "<tr>";
    echo "<td> ".utf8_encode($row["name"])."</td>";
    echo "<td> NULL </td>";
    echo "<td> ".utf8_encode($row["unity"])."</td>";
    echo "<td> ".utf8_encode($row["valUs"])."</td>";
    echo "<br></tr> ";

}
echo "</tbody> </table>"
?>