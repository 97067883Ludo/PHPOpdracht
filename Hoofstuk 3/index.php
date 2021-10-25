<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="#">
        <input type="text" name="naam" placeholder="Uw naam" required /><br />
        <select name="land">
            <option value="Maak-Keuze">Maak Keuze</option>
            <option value="NL">Nederland</option>
            <option value="DE">Duitsland</option>
            <option value="EN">Engeland</option>
            <option value="ES">Spaans</option>
            <option value="FR">Frans</option>
            <option value="IT">Italiaans</option>
        </select>
        <br />
        <input type="radio" name="geslacht" id="Geslacht" value="Man">
        <label for="Geslacht">Man</label>
        <br />
        <input type="submit" name="submit" value="gegevens versturen" />
    </form>
    <?php
    function showMessage($msg)
    {
        echo $msg;
    }
    ?>
    <br />
    <?php

    if (isset($_POST["submit"])) {
        $naam = $_POST['naam'];
        $taal = $_POST['land'];
        $NL = "Goedemorgen";
        $DE = "Guten Morgen";
        $EN = "Goodmorning";
        $ES = "Buenos dias";
        $FR = "Bonjour";
        $IT = "Buon giorno";

        if ($naam == NULL) {
            showMessage("Naam niet ingevuld");
        } else {
            switch ($taal) {
                case 'NL':
                    echo "$NL, $naam";
                    break;
                case 'DE':
                    echo "$DE, $naam";
                    break;
                case 'EN':
                    echo "$EN, $naam";
                    break;
                case 'ES':
                    echo "$ES, $naam";
                    break;
                case 'FR':
                    echo "$FR, $naam";
                    break;
                case 'IT':
                    echo "$IT, $naam";
                    break;
            }
        }
    }

    ?>
</body>

</html>