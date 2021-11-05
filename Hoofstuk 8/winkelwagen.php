<?php

session_start();
$artikelen = $_SESSION['artikelen'];
if (!isset($_SESSION['artikelen'])) {
    header('Location: index.php');
}
$winkelwagenLeeg = 1;
if(isset($_GET['winkelwagen'])){
$winkelwagenLeeg = $_GET['winkelwagen'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Pizza di mama - Winkelwagen</title>
</head>

<body>
    <div class="jumbotron text-center">
        <h1>Pizza di mama</h1>
        <p>zoals di mama die maakte</p>
        <a href="index.php">
            <button type="button" class="btn btn-primary">Shop</button>
        </a>
    </div>
    <div class="container">
        <?php
        if ($winkelwagenLeeg == 0 && isset($_GET['winkelwagen'])) {
        echo'
        <div class="alert alert-warning">
        Winkelwagen is leeg
        </div>';
        }
        ?>
        <h2>Winkelwagen</h2>
        <div class="panel panel-primary">
            <div class="panel-heading">Winkelwagen</div>


            <?php
            function Winkelwagen($item, $key)
            {
                if ($item['aantal'] > 0) {
                    echo '
                        <div class="panel-body">' . $item['aantal'] .
                        'x '
                        . $item['artikel'] .
                        '<div class="pull-right"> &euro;'
                        . $item['prijs'] * $item['aantal'].
                        '<form action="itemVerwijderen.php" method="post">
                        <button type="submit" name="artikelNummer" value="' . $key . '" class="btn btn-danger">Verwijderen</button>
                        </form>
                        </div></div>
                    ';
                }
            }

            array_walk($artikelen, 'Winkelwagen');
            ?>
        </div>
        <div class="pull-right">
            <?php
            $bedragInclBtw = 0;
            $bedragBtw = 0;
            foreach ($artikelen as $key => $value) {
                if ($value['aantal'] > 0) {
                
                $bedragInclBtw = $bedragInclBtw + $value['prijs'] * $value['aantal'];
                }
            }
                $bedragBtw = $bedragInclBtw * 0.09;
                $datum = new DateTime('now');
            if($datum->format('D') == 'Fri' && $bedragInclBtw> 20){
                echo'
                <div class="alert alert-success">
                <strong>pizza start weekend dag uw krijgt 15% korting</strong>
                </div>
            ';
            $bedragInclBtw = ($bedragInclBtw / 100) * 85;
            }
            
            echo '
            <br />
            <div class="pull-right">
            Inclusief btw: &euro;'.round($bedragInclBtw,2).'
            <br />
             Btw Bedrag: &euro;'.round($bedragBtw,2).'
            ';
            ?>
            <form action="bestellen.php" method="post">
                <button type="submit" class="btn btn-success">Bestellen</button>
            </form>
        </div>
    </div>
</body>

</html>