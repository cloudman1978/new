<?php
//$_POST["establishment_id"] = 1;
$connection = mysqli_connect("localhost","root","","pfe");
//mysql_select_db("pfe");
print_r($_POST);

//$ests = $_POST['ests'];



 $res = mysqli_query($connection,"SELECT rdv.*,users.name as nameU, patients.name as nameP,
 establishment.nameE FROM rdv
inner join establishment on (rdv.establishment_id = establishment.id)
 inner join users on users.id = rdv.user_id
inner join patients on patients.id = rdv.patient_id
WHERE establishment.id IN(".implode(",",$ests).")and rdv.date = '".$_POST["nvd"]."'");



//$repare($connection, $res) or die(mysqli_error($connection));stmt = mysqli_p
//mysqli_stmt_execute($stmt);

echo "    <section id=\"content\" class=\"table-layout animated fadeIn\">


        <div class=\"chute chute-center\">

            <!-- -------------- Pagination -------------- -->
            <div class=\"panel\" id=\"spy3\">
                <div class=\"panel-body pn\">
                    <div class=\"table-responsive\">
                        <table class=\"table footable table-bordered toggle-square-filled\"
                               data-page-navigation=\".pagination\" data-page-size=\"4\"
                               data-filter=\"#filter\" >
                            <thead>
                            <tr>
                                <th class=\"\">#
                                    <span class=\"footbale-sort-indicator\">

                                    </span>
                                </th>
                                <th class=\"\">Heure et date
                                        <span class=\"footbale-sort-indicator\">

                                    </span>
                                </th>
                                <th class=\"\">Etat
                                        <span class=\"footbale-sort-indicator\">

                                    </span>
                                </th>
                                <th class=\"\">Remarque patient
                                        <span class=\"footbale-sort-indicator\">

                                    </span>
                                </th>
                                <th class=\"\">Praticien
                                        <span class=\"footbale-sort-indicator\">

                                    </span>
                                </th>
                                <th class=\"\">Etablissement
                                        <span class=\"footbale-sort-indicator\">

                                    </span>
                                </th>
                                <th class=\"\">Patient
                                        <span class=\"footbale-sort-indicator\">

                                    </span> </th>
                                <th class=\"footable-sortable\">Modifier
                                </th>
                            </tr>
                            </thead>
                            <tbody>";
while($row = mysqli_fetch_assoc($res)) {
    echo "   <tr>  <td>{{$row['id']}}</td> <td>{{$row['hour']}}</td>";
    echo " <td  id=\"state\"> ";
    echo "<span onclick=\"validate({{$row['id']}})\" >";

    if ($row['state'] == 10) {
        echo "Non validé";
    } else if ($row['state'] == 20) {
        echo "validé";
    } else if ($row['state'] == 30) {
        echo 'payé';
    } else {
        echo 'Abandonné';
    }
    echo"     </span></td>   <td>{{$row['rqs']}}</td>  <td>{{$row['nameU']}}</td>";
    echo"<td>{{$row['nameE']}}</td>   <td>{{$row['nameP']}}</td>   <td>";
    echo "  <a href=\"{{route('backoffice.secretary.rdv.edit', ".$row['id'].")}}\"  class=\"table-icon edit\" title=\"Edit\"></a>
                                        <a href=\"/backoffice/secretary/rdv/".$row['id']."\" class=\"table-icon delete\" title=\"Delete\">
                                        </a>
                                        <a  class=\"open\" rdvid=".$row['id']."\">Payer</a>
                                    </td>";

    echo"    </tr>
                            <script>
                                $(document).ready(function(){
                                    $(\".open\").click(function(){
                                        $(\"#pop_background\").fadeIn();
                                        $(\"#pop_box\").fadeIn();
                                       $('#rdv_idd').val($(this).attr(\"rdvid\"));
                                        return false;

                                    });
                                    $(\"#close\").click(function(){
                                        $(\"#pop_background\").fadeOut();
                                        $(\"#pop_box\").fadeOut();
                                        return false;

                                    });
                                    $(\"#pop_background\").click(function(){
                                        $(\"#pop_background\").fadeOut();
                                        $(\"#pop_box\").fadeOut();
                                        return false;

                                    });
                                });
                            </script>";
    echo"  </tbody>
                            <tfoot class=\"footer-menu\">
                            <tr>
                                <td colspan=\"5\">
                                    <nav class=\"text-right\">
                                        <ul class=\"pagination hide-if-no-paging\"></ul>
                                    </nav>
                                </td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>

        </div>

    </section>";

}
?>