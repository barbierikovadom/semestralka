<?php
include 'root.layout.view.php';
?>
<title>Menu</title>

<!--<div class="piva">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-12">-->
<!--                <br>-->
<!--                <h1 class="text-center">-->
<!--                    Čapujeme:-->
<!--                </h1>-->
<!--            </div>-->
<!--        </div>-->
<!--        --><?php
//            $capujeme = fopen("../capujeme.txt", "r") or die("Unable to open file!");
//            $piva = fopen("../piva.txt", "r") or die("Unable to open file!");
//            $obrazky = fopen("../obrazky.txt", "r") or die("Unable to open file!");
//            while(!feof($capujeme) && !feof($obrazky) && !feof($piva)) {
//        ?>
<!--        <div class="row">-->
<!--            <img src="--><?php //echo fgets($obrazky)?><!--" alt="..." class="rounded mx-auto d-block img-fluid">-->
<!--        </div>-->
<!--        <div class="row">-->
<!--            <div class="col-12">-->
<!--                <h2 class="text-center">-->
<!--                    --><?php
//                        echo fgets($piva)
//                    ?>
<!--                </h2>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row">-->
<!--            <div class="col-12">-->
<!--                <p class="text-center">-->
<!--                    --><?php
//                        echo fgets($capujeme)
//                    ?>
<!--                </p>-->
<!--            </div>-->
<!--        </div>-->
<!--         --><?php
//            }
//            fclose($capujeme);
//            fclose($piva);
//            fclose($obrazky);
//         ?>
<!--        <br>-->
<!--        <br>-->
<!--    </div>-->
<!--    <br>-->
<!--</div>-->

<?php
/** @var MenuDB $data */
foreach ($app->getAllPatientAppointmentHistory() as $data) {
$id = $data->getId();
echo "<tr>";
    echo "<td>" . $data->getPacientMeno() . "</td>";
    echo "<td>" . $data->getPacientPriezvisko() . "</td>";
    echo "<td>" . $data->getCasovyUsek() . "</td>";
    echo "<td>" .  date('j.n.Y', strtotime( $data->getDatum())) . "</td>";
    echo "<td>" . $data->getPoznamka() . "</td>";
    if ($data->getDatum() >= date('Y-m-d')) {
    echo "<td><a href='#' onclick='checkdelete($id)' class='deleteAppointmentHistory'> Zrušiť objednanie </a></td>";
    } else {
    echo "<td></td>";
    }
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>
?>