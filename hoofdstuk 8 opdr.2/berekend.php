<?php
$ingelegdBedrag = htmlspecialchars($_POST['ingelegdbedrag']);
$Rentepercentage = htmlspecialchars($_POST['Rentepercentage']);
$optradio = $_POST['optradio'];

if ($ingelegdBedrag == NULL) {
    header('Location: index.php');
}
if ($Rentepercentage == NULL) {
    header('Location: index.php');
}
#if (!is_numeric($ingelegdBedrag)) {
#    header('Location: index.php');
#}
#if (!is_numeric($eindBedrag)) {
#    header('Location: index.php');
#}
function berekeningNa10Jaar($ingelegdBedrag, $Rentepercentage){
    for ($i=1; $i <= 10; $i++) { 
        $nwbedrag = $ingelegdBedrag * (1 + $Rentepercentage / 100);
        $ingelegdBedrag = $nwbedrag;
        echo'
        <tr>
        <td>
        '.$i.'
        </td>
        <td>
        '.round($nwbedrag,2).'
        </td>
        </tr>
        ';
    }

}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>rente berekenen</h1>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Jaar</th>
                            <th>Bedrag</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($optradio == 'eindbedragna10jaar') {
                        berekeningNa10Jaar($ingelegdBedrag, $Rentepercentage);
                    } 
                    ?>
                    </tbody>
                </table>
                <a href="index.php"><button type="button" class="btn btn-success">Terug</button></a>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
    </div>
</body>

</html>