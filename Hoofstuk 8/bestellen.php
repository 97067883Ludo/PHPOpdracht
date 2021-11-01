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
                <input type="radio" name="verzendmethode" id="afhalen" required>
                <label for="verzendmethode">afhalen</label>
                <input type="radio" name="verzendmethode" id="verzenden" required>
                <label for="Verzenden">Bezorgen + &euro;5 Bezorgkosten</label>
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
                <input type="date" name="datum" class="form-control" value="<?php echo date("Y-m-d");?>" id="datum">
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
                    '.$item['aantal'].'X '.$item['artikel'].'<div class="pull-right"> &euro; '.$item['prijs'].' </div><br />
                    ';
                }
            }
            array_walk($artikelen, 'Winkelwagen');
            $bedragInclBtw = 0;
            $bedragExBtw = 0;
            foreach ($artikelen as $key => $value) {
                $bedragInclBtw = $bedragInclBtw + $value['prijs'];
            }
            
            $bedragExBtw = $bedragInclBtw * 0.9;
            echo '
            <br />
            <div class="pull-right">
            Incl.Btw: &euro;'.$bedragInclBtw.'
            <br />
             Ex.btw: &euro;'.round($bedragExBtw,2).'
            ';

            ?>
        </div>
    </div>
    </section>
    <footer></footer>
</body>
</html>