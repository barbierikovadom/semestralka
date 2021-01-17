<?php
if (!isset($_SESSION)) {
    session_start();
}

if($_SESSION['meno'] == null){
    header("LOCATION: prihlasenie.php");
} else {
    $_POST['meno'] = $_SESSION['meno'];
    if ($_POST['meno'] == 'admin') {
        include 'headAdmin.php';
    } else {
        include 'headPrihlaseny.php';
    }
}
?>

<html>
<title>Typy pohárov</title>

<body>
<div class="pohare">
    <div class="container telo" id="telo">
         <div class="row">
            <div class="col-4">
                <br>
                <img name="obrazok" src="../images/obrazkyPiva/american-pint-glasses.png" alt="..." class="rounded mx-auto d-block img-fluid">
            </div>
             <div class="col-8">
            <div class="row">
                <p>

                </p>
            </div>
            <h1>
                American pint glass
            </h1>
                <p class="text-left">
                    The simple, utilitarian 16-ounce American pint glass is slightly
                    wider at the mouth than at the base. You’ll find it in large numbers
                    in bars and restaurants across the United States, where it is used
                    to serve a wide range of beer styles. Its ubiquity owes to the fact
                    that it is relatively inexpensive to manufacture and easy to clean and store.
                </p>
            </div>
        </div>


    <div class="row">
        <div class="col-8">
            <div class="row">
                <p>

                </p>
            </div>
            <h1 class="text-right">
                Goblet / Chalice Glass
            </h1>
            <p class="text-right">
                The goblet glass has a large, head-retaining round bowl and a thick stem.
                Chalices are similar, but tend to have thicker bowl walls. Both types can
                be highly decorative and sometimes feature intricate etching or precious metal
                inlaying. Their wide mouth design promotes big, hearty sips.
            </p>
        </div>
        <div class="col-4">
            <img name="obrazok"  src="../images/obrazkyPiva/Libbey-Schooner-Glass.png" alt="..." class="rounded mx-auto d-block img-fluid">
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <img name="obrazok" src="../images/obrazkyPiva/Pilsner-Glasses.png" alt="..." class="rounded mx-auto d-block img-fluid">
        </div>
        <div class="col-8">
            <div class="row">
                <p>

                </p>
            </div>
            <h1>
                Pilsner Glass
            </h1>
            <p class="text-left ">
                Tall, slim, and slightly wider at the mouth, a pilsner glass makes visible
                the sparkle, clarity, and bubbles of pilsners and other lighter beers. At the
                same time, it helps retain a beer’s head, which keeps volatile aromatics locked
                under your nose. Typically, pilsner glasses hold less beer than a pint glass--usually
                somewhere in the vicinity of 12 to 14 ounces.
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="row">
                <p>

                </p>
            </div>
            <h1 class="text-right">
                Thistle Glass
            </h1>
            <p class="text-right">
                A modified version of the tulip glass, the shape of a thistle glass resembles
                Scotland’s national flower (the thistle). It is characterized by a short stem,
                bulbous bottom, and elongated top section that’s noticeably more sharp and
                angular than that of the tulip.
            </p>
        </div>
        <div class="col-4">
            <img name="obrazok" src="../images/obrazkyPiva/Thistle-Glasses.png" alt="..." class="rounded mx-auto d-block img-fluid">
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <img name="obrazok" src="../images/obrazkyPiva/Tulip-Glasses.png" alt="..." class="rounded mx-auto d-block img-fluid">
        </div>
        <div class="col-8">
            <div class="row">
                <p>

                </p>
            </div>
            <h1>
                Tulip Glass
            </h1>
            <p class="text-left">
                With a bulbous body and a flared lip, the tulip glass is designed to capture
                the head and promote the aroma and flavor of Belgian ales and other malty, hoppy
                beers. Its short stem facilitates swirling, further enhancing your sensory experience.
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="row">
                <p>

                </p>
            </div>
            <h1 class="text-right">
                Imperial Pint Glasses
            </h1>
            <p class="text-right">
                Like its close relative the American pint glass, the imperial pint glass is
                all purpose. Unlike its U.S. counterpart, however, the imperial pint holds
                a full 20 ounces. It also differs in that it features  a small lip at the mouth.
            </p>
        </div>
        <div class="col-4">
            <img name="obrazok" src="../images/obrazkyPiva/Imperial%20Pint%20Glasses_sRukami.png" alt="..." class="rounded mx-auto d-block img-fluid">
            <br>
            <br>
            <br>
        </div>
    </div>
    <div class="row">

    </div>
</div>
</div>

</body>
</html>