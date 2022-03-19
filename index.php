<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="./images/0.icons/ico_U.ico" sizes="16x16 32x32" type="image/png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Unbrushed" />
    <meta property="og:type" content="Portfolio" />
    <meta property="og:image" content="./images/Latas_3.jpg" />
    <meta property="og:url" content="https://unbrushed.alwaysdata.net/" />
    <meta property="og:description" content="Estilismo y dirección de peluquería en Barcelona." />
    <title>Unbrushed Portfolio</title>
    <link rel="stylesheet" href="./style/reset.css">
    <link rel="stylesheet" href="./style/computer_first.css">
    <link rel="stylesheet" href="./style/mobile.css">



    <script src="./script/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./script/script.js"></script>
</head>

<body>
    <?php
    include './extras/header.php';
    require('database.php');
    $query = "SELECT * FROM sesiones ORDER BY id";
    $result = mysqli_query($db, $query);

    ?>
    <main>
        <div class="images">
            <div class="explicacion">
                <p class="explication_text">Haz click en las fotos para ver más.</p>
                <img class="arrow_right" src="./images/0.icons/right-arrow.png" alt="A la dreta tens un exemple :)">
            </div>

            <?php
            while ($sesion = mysqli_fetch_array($result)) {
                   $fotos = explode('|', $sesion['photos']);

                
                echo ' <div class="foto"> <a class="link_s" data-href="./sesion.php?s=' . $sesion['id'] . '"><img class="image_item fade image" loading="lazy" src="./images/' . $fotos[0] . '" alt="Esta foto es tímida." width="100% "></a></div>';
            }
            ?>
            
    </main>
    <?php
    include './extras/footer.php';
    ?>
</body>



</html>