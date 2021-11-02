<?php
session_start();
$artikelen = $_SESSION['artikelen'];

$verzendMethode = htmlspecialchars($_POST['verzendmethode']);
$fname = htmlspecialchars($_POST['fname']);
$lname = htmlspecialchars($_POST['lname']);
$email = htmlspecialchars($_POST['email']);
$adres = htmlspecialchars($_POST['adres']);
$postcode = htmlspecialchars($_POST['postcode']);
$plaatsnaam = htmlspecialchars($_POST['plaatsnaam']);
$datum = htmlspecialchars($_POST['datum']);

$inputDatum = array();
if ($fname == NULL || $lname == NULL || $email == NULL || $adres == NULL || $postcode == NULL || $plaatsnaam == NULL || $datum == NULL) {
    header('Location: bestellen.php');
}
$inputDatum = explode('-', $datum);
$datumChecker = 0;
$acuteleDatum = new DateTime('now');

if ($acuteleDatum->format('Y') == $inputDatum[0]) {
    $datumChecker++;
}
if ($acuteleDatum->format('m') == $inputDatum[1]) {
    $datumChecker++;
}
if ($acuteleDatum->format('d') == $inputDatum[2]) {
    $datumChecker++;
}
if ($datumChecker < 3) {
    header('Location: bestellen.php');
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
    <title>Pizza di mama - besteld</title>
</head>

<body>
    <header>
        <div class="jumbotron text-center">
            <h1>Pizza di mama</h1>
            <p>zoals di mama die maakte</p>
        </div>
    </header>
    <div class="container">
        <h3 class="center">Je bestelling</h3>
        <div class="col-sm-6">
            <h4 class="center">Uw informatie</h4>
            <h5>Persoonlijke informatie:</h5>
            <?php
            echo '
           <ul> Voornaam: 
           ' . $fname . '
           <br />
           Achternaam 
           ' . $lname . '
           </ul>
           ';
            ?>
            <h5>Contact informatie:</h5>
            <?php
            echo '
           <ul>
           Email-adres: 
           ' . $email . '
           </ul>
           ';
            ?>
            <h5>Adres gegevens: </h5>
            <?php
            echo '
           <ul>
           Adres:
           ' .$adres. '
           <br />
           Postcode:
           ' .$postcode. '
           <br />
           Woonplaats: 
           ' .$plaatsnaam. '
           </ul>
           ';
            ?>
        </div>
        <div class="col-sm-6">
            <h4 class="center">Bestelde items</h4>
            <?php
            foreach ($artikelen as $key => $value) {
                if ($value['aantal'] > 0) {
                    echo'
                    '.$value['aantal'].'X
                    '.$value['artikel'].'
                    <div class="pull-right">
                    &euro;
                    '.$value['prijs'] * $value['aantal'].'
                    </div>                
                    <br />
                    ';
                    
                }
            }
            $bedragInclBtw = 0;
            if ($verzendMethode == 'bezorgen') {
               echo 'bezorgkosten: 
               <div class="pull-right">
               &euro; 5
               </div>
               '; 
               $bedragInclBtw = $bedragInclBtw + 5;
            }

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
             Btw bedrag: &euro;'.round($bedragBtw,2).'
             </div>
            ';
            
            echo '<br /><button class="btn btn-success">betalen</button>';

            ?>
        </div>
    </div>
</body>

</html>