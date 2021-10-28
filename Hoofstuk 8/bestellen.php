<?php
    session_start();
    $artikelen = $_SESSION['artikelen'];


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
        <div class="col-sm-6 centerd">
            <h3>Persoonlijke gegevens</h3>
            <form action="besteld.php" method="post">
                <div class="form-group">
                <input type="radio" name="verzendmethode" id="afhalen" required>
                <label for="verzendmethode">afhalen</label>
                <input type="radio" name="verzendmethode" id="verzenden" required>
                <label for="Verzenden">Verzenden</label>
                </div>
                <div class="form-group">
                <label for="fname">Voornaam:</label>
                <input type="fname" class="form-control" id="fname" required>
                <label for="lname">Achternaam:</label>
                <input type="lname" class="form-control" id="lname" required>
                <label for="email">Email addres:</label>
                <input type="email" class="form-control" id="email">
                <label for="adres">Adres: </label>
                <input type="text" class="form-control" name="adres" id="adres">
                <label for="postcode">Postcode: </label>
                <input type="text" class="form-control" name="postcode" id="postcode">
                <label for="plaats">Plaats: </label>
                <input type="text" class="form-control" name="plaats" id="plaats">
                <label for="datum">Afhaal moment: </label>
                <input type="date" class="form-control" name="datum" value="<?php echo date("Y-m-d");?>" id="datum">
                </div>
            </form>
        </div>
        <div class="col-sm-6 centerd">
            <h3>Bestelling</h3>

        </div>
    </div>
    </section>
    <footer></footer>
</body>
</html>