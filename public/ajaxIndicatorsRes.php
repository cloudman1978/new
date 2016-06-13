<?php
header('Content-Type: text/html; charset=utf-8');
$_POST["phaid"] = 1;
$connection = mysqli_connect("localhost","root","","pfe");
//mysql_select_db("pfe");
$res = mysqli_query($connection,"SELECT indicators.* FROM patient_analyse_has_indicator
inner join patient_has_analyse on patient_analyse_has_indicator.pha_id = patient_has_analyse.id
 inner join indicators on indicators.id = patient_analyse_has_indicator.indicator_id
WHERE patient_has_analyse.id=".$_POST['phaid'].";");


echo "   <tbody name=\"ajaxResp\" id=\"ajaxResp\">";
while($row = mysqli_fetch_assoc($res)){
    echo '<input type="hidden" name="indic[]" value="'.$row['id'].'">';
    echo "<tr>";
    echo "<td> ".utf8_encode($row["name"])."</td>";
    echo "<td> <input type='text' name='results' > </td>";
    echo "<td> ".utf8_encode($row["unity"])."</td>";
    echo "<td> ".utf8_encode($row["valUs"])."</td>";
    echo "<br></tr> ";

}
echo "</tbody> </table>"
?>