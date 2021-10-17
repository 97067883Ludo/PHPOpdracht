<?php

$naam = $_POST['naam'];
$taal = $_POST['land'];

$NL = "Goedemorgen";
$DE = "Guten Morgen";
$EN = "Goodmorning";
$ES = "Buenos dias";
$FR = "Bonjour";
$IT = "Buon giorno";

if($taal == "NL"){
    echo "$NL, $naam";
}
elseif ($taal == "DE") {
    echo"$DE, $naam";
}
elseif ($taal == "EN") {
    echo"$EN, $naam";
}
elseif ($taal == "ES") {
    echo"$ES, $naam";
}
elseif ($taal == "FR") {
    echo"$FR, $naam";
}
elseif ($taal == "IT") {
    echo"$IT, $naam";
}
elseif ($taal == "Maak-Keuze") {
    header('Location: index.php');
}
else{
    echo"ERROR";
}

?>