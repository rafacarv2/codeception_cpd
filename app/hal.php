<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        * {
            text-align: center;
            background: black;
            color: white;
        }

        body {
            background: black
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="">
            <img class="" src="hal.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Im Sorry <?= $_GET["nome"] ?></h5>
                <p class="card-text">I'm afraid I can't let you do that.</p>
                <a href="./" class="btn btn-danger">Go somewhere</a>
            </div>
        </div>
    </div>
</body>

</html>