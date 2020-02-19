<?php
require 'vendor/autoload.php';
use Aws\Rekognition\RekognitionClient;
?>

<!doctype html>
<html lang="en">

<head>
    <title>Recoknizer</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

</head>

<body class="ini">

    <section class="container-fluid slider d-flex justify-content-center align-items-center">

    </section>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" href="#">JBM</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <!--
       mr-auto (Margen derecho automatico)
       ml-auto (Margen izquierdo automatico) 
       text-center (Centrar textos)
    -->
            <ul class="navbar-nav mr-auto ml-auto text-center">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Marketplace </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Developers</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Dev 1</a>
                        <a class="dropdown-item" href="#">Dev 2</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">support</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">About us</a>
                </li>
            </ul>

        </div>
    </nav>

    <div class="container">
        <div class="row mt-4">
            <div class="col-12">
                <form action="process.php" method="GET" >
                    <div class="row">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file" required>
                                <label class="custom-file-label" >Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50 mt-4">
            <div class="container text-center">
                <small>Copyright &copy; JBM Rekognizer is a mark from Jorge Blanquicett</small>
            </div>
        </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/actions.js"></script>
</body>

</html>