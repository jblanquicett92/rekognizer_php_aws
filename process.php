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

<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" href="index.php">JBM</a>
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

    <?php
    //Copyright 2018 Amazon.com, Inc. or its affiliates. All Rights Reserved.
    //PDX-License-Identifier: MIT-0 (For details, see https://github.com/awsdocs/
        
    $options = [
        'region' => 'us-west-2',
        'version' => 'latest'
    ];
    $rekognition = new RekognitionClient($options);
    // Get local image
    $photo = $_GET['file'];
    
    $fp_image = fopen($photo, 'r');
    $image = fread($fp_image, filesize($photo));
    fclose($fp_image);
    // Call DetectFaces
    $result = $rekognition->DetectFaces(
        array(
            'Image' => array(
                'Bytes' => $image,
            ),
            'Attributes' => array('ALL')
        )
    );
    // Display info for each detected person
    ?>
    <?php

    for ($n = 0; $n < sizeof($result['FaceDetails']); $n++) {
    ?>

        <div class="container mt-4">

            <div class="row">
                <div class="col-4">

                    <div id="preview" class="">

                        <img id="img_field" src= <?php echo $photo?> >

                    </div>

                </div>

                <div class="col-8">
                    <table class="table table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>Face Analycis</th>
                                <th>Values</th>
                                <th>Confiability</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <td><?php print 'Emotions'; ?></td>
                                <td><?php print $result['FaceDetails'][$n]['Emotions'][$n]['Type']; ?></td>
                                <td><?php print $result['FaceDetails'][$n]['Emotions'][$n]['Confidence']. " %"; ?></td>
                            </tr>
                            <tr>
                                <td><?php print  "Age range"; ?></td>
                                <td><?php print "from ".$result['FaceDetails'][$n]['AgeRange']['Low']. " to "
                                .$result['FaceDetails'][$n]['AgeRange']['High']; ?>
                                </td>
                                <td><?php print  "Years"; ?></td>
                            </tr>

                            <tr>
                                <td><?php print  "Gender" ?></td>
                                <td><?php print $result['FaceDetails'][$n]['Gender']['Value']; ?></td>
                                <td><?php print $result['FaceDetails'][$n]['Gender']['Confidence']. " %"; ?></td>
                            </tr>
                            <tr>
                                <td><?php print  "Eyeglasses" ?></td>
                                <td><?php print $result['FaceDetails'][$n]['Eyeglasses']['Value']; ?></td>
                                <td><?php print $result['FaceDetails'][$n]['Eyeglasses']['Confidence']. " %"; ?></td>
                            </tr>
                            <tr>
                                <td><?php print  "Smile" ?></td>
                                <td><?php print $result['FaceDetails'][$n]['Smile']['Value']; ?></td>
                                <td><?php print $result['FaceDetails'][$n]['Smile']['Confidence']. " %"; ?></td>
                            </tr>
                            <tr>
                                <td><?php print  "EyesOpen" ?></td>
                                <td><?php print $result['FaceDetails'][$n]['EyesOpen']['Value']; ?></td>
                                <td><?php print $result['FaceDetails'][$n]['EyesOpen']['Confidence']. " %"; ?></td>
                            </tr>
                            <tr>
                                <td><?php print  "MouthOpen" ?></td>
                                <td><?php print $result['FaceDetails'][$n]['MouthOpen']['Value']; ?></td>
                                <td><?php print $result['FaceDetails'][$n]['MouthOpen']['Confidence']. " %"; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                       
                    </table>

                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="js/actions.js"></script>
</body>

</html>