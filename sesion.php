<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" href="./images/0.icons/ico_U.ico" sizes="16x16 32x32" type="image/png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unbrushed Sesion</title>
    <link rel="stylesheet" href="./style/computer_first.css">
    <link rel="stylesheet" href="./style/computer_first.css">
    <link rel="stylesheet" href="./style/mobile.css">
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <script src="./script/jquery.js"></script>
    <script src="./script/script.js"></script>
</head>

<body>
    <?php
    require('database.php');
    $id = $_GET['s'];

    $query = "SELECT * FROM sesiones WHERE id=$id";
    $result = mysqli_query($db, $query);

    while ($sesion = mysqli_fetch_array($result)) {
        $name = $sesion['name'];
        $date = $sesion['Date'];
        $comments = $sesion['Comments'];
        $model = $sesion['model'];
        $fotos = $sesion['photos'];
        $photographer = $sesion['photographer'];
        $makeup = $sesion['makeup'];
        $hair = $sesion['hair'];
        $stylish = $sesion['stylish'];
        $showroom = $sesion['showroom'];
        $designers = $sesion['designers'];

        $fotos = explode('|', $sesion['photos']);
    }
    require './extras/header_sesion.php';

    ?>

    <!-- ------------------------------------------------Parte de Datos---------------------------------------------- -->
    <div class="datos">
        <div class="ficha_cont">
            <p class="ficha_box">Ficha técnica</p>
            <div class="arrow_icon_s">
                <svg class=" arrowsvg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" fill="white">
                    <g>
                        <path d="M256,0C114.618,0,0,114.618,0,256s114.618,256,256,256s256-114.618,256-256S397.382,0,256,0z M256,469.333
				c-117.818,0-213.333-95.515-213.333-213.333S138.182,42.667,256,42.667S469.333,138.182,469.333,256S373.818,469.333,256,469.333
				z" />
                        <path d="M347.582,198.248L256,289.83l-91.582-91.582c-8.331-8.331-21.839-8.331-30.17,0c-8.331,8.331-8.331,21.839,0,30.17
				l106.667,106.667c8.331,8.331,21.839,8.331,30.17,0l106.667-106.667c8.331-8.331,8.331-21.839,0-30.17
				C369.42,189.917,355.913,189.917,347.582,198.248z" />
                    </g>
                </svg>
            </div>
        </div>
        <div class="datos_texto ficha">
            <?php

            if ($model != '') {
                echo "<p class='item_datos bold'> Modelaje</p><p class='item_datos2'> $model</p>";
            }
            // 
            if ($photographer != '') {
                echo "<p class='item_datos bold'> Fotografía</p><p class='item_datos2'> $photographer</p>";
            }
            // 
            if ($makeup != '') {
                echo "<p class='item_datos bold'> Maquillaje</p><p class='item_datos2'> $makeup</p>";
            }
            // 
            if ($hair != '') {
                echo "<p class='item_datos bold'> Peluquería</p><p class='item_datos2'> $hair</p>";
            }
            // 
            if ($stylish != '') {
                echo "<p class='item_datos bold'> Estilismo</p><p class='item_datos2'> $stylish</p>";
            }
            // 
            if ($showroom != '') {
                echo "<p class='item_datos bold'> Showroom</p><p class='item_datos2'> $showroom</p>";
            }
            // 
            if ($designers != '') {
                echo "<p class='item_datos bold'> Designers</p><p class='item_datos2'> $designers</p>";
            }

            ?>




        </div>
    </div>
    <!-- ------------------------------------------------Parte de las imágenes---------------------------------------------- -->
    <div class="images" id="images">
        <div class="grid">
            <div class="row row1">
                <?php
                foreach ($fotos as $foto) {
                    echo ' <div class="foto"><img class="image_item fade image" loading="lazy" src="./images/' . $foto . '" alt="Aquesta foto no es pot carregar" width="100% "></div>';
                }

                ?>
            </div>
        </div>
    </div>

    <?php
    include './extras/footer.php';
    ?>


</body>



</html>