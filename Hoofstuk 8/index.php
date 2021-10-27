<?php
session_start();

if (!isset($_SESSION['artikelen'])) {
    $artikelen = array(
        array('artikel' => "pizza Margherita", "prijs" => 12.50, "aantal" => 0),
        array('artikel' => "Pizza Funghi", "prijs" => 12.50, "aantal" => 0),
        array('artikel' => "Pizza Marina", "prijs" => 13.95, "aantal" => 0),
        array('artikel' => "Pizza Hawai", "prijs" => 11.30, "aantal" => 0),
        array('artikel' => "Pizza Quattro Formaggi", "prijs" => 14.50, "aantal" => 0)
    );
    $_SESSION['artikelen'] = $artikelen;
}
$artikelen = $_SESSION['artikelen'];
    $datum = new DateTime('now');
    $datum->format('D');
    
    if($datum->format('D') == "Mon"){
        foreach ($artikelen as $key => $value) {
            $artikelen[$key]['prijs'] = 7.50; 
        }
        $_SESSION['artikelen'] = $artikelen;
    }

    if ($datum->format('D') == "Tue") {
        foreach ($artikelen as $key => $value) {
            $artikelen[$key]['prijs'] * .85;
        }
        $_SESSION['artikelen'] = $artikelen;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza di mama</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <header>
        <div class="jumbotron text-center">
            <h1>Pizza di mama</h1>
            <p>zoals di mama die maakte</p>
            <a href="winkelwagen.php">
                <button type="button" class="btn btn-primary">Winkelwagen</button>
            </a>
        </div>
    </header>
    <section>
    <div class="container">
        <?php
        if ($datum->format('D') == 'Mon') {
            echo '
            <div class="alert alert-success">
            <strong>Vandaag is het Pizza actie dag daarom zijn alle pizzas vandaag &euro;7,50</strong>
            </div>
            ';
        }
        function printArtikelen($item, $key)
        {
            echo '
                <div class="col-sm-4">
                <h3>' . $item['artikel'] . '</h3>
                <p>geserveerd met heerlijke kaas en extra veel tomatensaus</p>
                <p> &euro; ' . $item['prijs'] . '</p>
                <form action="itemToevoegen.php" method="post">
                <button type="submit" name="artikelNummer" value="'.$key.'" 
                class="btn btn-success">Toevoegen '.$item['aantal'].'</button>
                </form>
                </div>
            ';
        }
        array_walk($artikelen, 'printArtikelen');
        ?>
    </div>
    </section>
    <footer></footer>
</body>

</html>