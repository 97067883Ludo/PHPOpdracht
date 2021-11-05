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
                <form action="berekend.php" method="post">
                    <div class="mb-3 mt-3">
                        <label for="ingelegdbedrag" class="form-label">Ingelegd Bedrag:</label>
                        <input type="number" class="form-control" id="ingelegdbedrag" placeholder="IngelegdBedrag" name="ingelegdbedrag" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="Rentepercentage" class="form-label">Rente percentage:</label>
                        <input type="number" class="form-control" id="Rentepercentage" placeholder="Rentepercentage" name="Rentepercentage" required>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="eindbedragna10jaar" checked>
                        <label class="form-check-label" for="radio1">eindbedrag na 10 jaar</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="eindbedragverdubbeld">
                        <label class="form-check-label" for="radio2">eindbedrag verdubbeld</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Bereken</button>
                </form>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
    </div>

</body>

</html>