<?php
session_start();
$artikelen = $_SESSION['artikelen'];

$sizeOfArray;
$sizeOfArray = count($artikelen);
$i = 0;
foreach ($artikelen as $key => $value) {
    if ($value['aantal'] == 0) {
        $i++;
    }
}
if ($i == $sizeOfArray) {
    header('Location: winkelwagen.php?winkelwagen=0');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        function changebezorgkosten(bezorgkosten) {
            document.getElementById("bezorgkosten").innerHTML = bezorgkosten;
        }
    </script>
    <link rel="stylesheet" href="main.css">
    <title>Pizza di mama</title>
</head>

<body>
    <header>
        <div class="jumbotron text-center">
            <h1>Pizza di mama</h1>
            <a href="winkelwagen.php">
                <button type="button" class="btn btn-primary">Winkelwagen</button>
            </a>
        </div>
    </header>
    <section>
        <div class="container">
            <div class="col-sm-6">
                <h3 class="center">Persoonlijke gegevens</h3>
                <form action="besteld.php" method="post">
                    <div class="form-group">
                        <input type="radio" name="verzendmethode" value="afhalen" onclick="changebezorgkosten(0)" id="afhalen" required checked>
                        <label for="verzendmethode">afhalen</label>
                        <input type="radio" name="verzendmethode" value="bezorgen" onclick="changebezorgkosten(5)" id="bezorgen" required>
                        <label for="bezorgen">Bezorgen + &euro;5 Bezorgkosten</label>
                    </div>
                    <div class="form-group">
                        <label for="fname">Voornaam:</label>
                        <input type="fname" name="fname" class="form-control" id="fname" required>
                        <label for="lname">Achternaam:</label>
                        <input type="lname" name="lname" class="form-control" id="lname" required>
                        <label for="email">Email addres:</label>
                        <input type="email" name="email" class="form-control" id="email">
                        <label for="adres">Adres: </label>
                        <input type="text" name="adres" class="form-control" id="adres">
                        <label for="postcode">Postcode: </label>
                        <input type="text" name="postcode" class="form-control" id="postcode">
                        <label for="plaatsnaam">Plaatsnaam: </label>
                        <input type="text" name="plaatsnaam" class="form-control" id="plaats">
                        <label for="datum">Afhaal dag: </label>
                        <input type="date" name="datum" class="form-control" value="<?php echo date("Y-m-d"); ?>" id="datum">
                        <br>
                        <input type="submit" class="btn btn-success pull-right" value="Bestellen">
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                <h3 class="center">Bestelling</h3>
                <?php
                function Winkelwagen($item, $key,)
                {
                    if ($item['aantal'] > 0) {
                        echo '
                    ' . $item['aantal'] . 'X ' . $item['artikel'] . '<div class="pull-right"> &euro; ' . $item['prijs'] * $item['aantal'] . ' </div><br />
                    ';
                    }
                }
                array_walk($artikelen, 'Winkelwagen');
                $bedragInclBtw = 0;
                $bedragBtw = 0;
                foreach ($artikelen as $key => $value) {
                    if ($value['aantal'] > 0) {
                        $bedragInclBtw = $bedragInclBtw + $value['prijs'] * $value['aantal'];
                    }
                }

                $bedragBtw = $bedragInclBtw * 0.09;
                $datum = new DateTime('now');
                if ($datum->format('D') == 'Fri' && $bedragInclBtw > 20) {
                    echo '
            <div class="alert alert-success">
            <strong>pizza start weekend dag uw krijgt 15% korting</strong>
            </div>
            ';
                    $bedragInclBtw = ($bedragInclBtw / 100) * 85;
                }
                echo '
            <br />
            <div class="pull-right">
            Inclusief btw: &euro;' . round($bedragInclBtw, 2) . '
            <br/>
            verzend kosten &euro;<div id="bezorgkosten">0</div>
             Btw bedrag: &euro;' . round($bedragBtw, 2) . '
            ';

                ?>
            </div>
        </div>
    </section>
    <footer></footer>
</body>

</html>