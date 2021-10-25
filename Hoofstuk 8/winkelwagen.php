<?php

session_start();
$artikelen = $_SESSION['artikelen'];

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
    <title>Document</title>
</head>
<body>
<div class="jumbotron text-center">
            <h1>Pizza di mama</h1>
            <a href="index.php">
                <button type="button" class="btn btn-primary">Shop</button>
            </a>
        </div>
        <div class="container">
  <h2>Winkelwagen</h2>
  <div class="panel panel-primary">
    <div class="panel-heading">Winkelwagen</div>


        <?php
    function Winkelwagen($item, $key){
        if ($item['aantal'] > 0) {
            echo'
            <div class="panel-body">'.$item['aantal'].
            'x '
            .$item['artikel'].
            '<div class="pull-right"> &euro;'
            .$item['prijs'].
            '<button class="btn btn-danger">Verwijderen</button></div></div>
            ';
        }
    }
    
    array_walk($artikelen, 'Winkelwagen');
    ?>
  </div>
</div>

</body>
</html>