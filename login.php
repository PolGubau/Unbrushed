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
    <title>Unbrushed Login</title>
    <link rel="stylesheet" href="./style/reset.css">
    <link rel="stylesheet" href="./style/computer_first.css">
    <link rel="stylesheet" href="./style/mobile.css">



    <script src="./script/jquery.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <script src="./script/script.js"></script>
</head>

<body>
    <?php
    session_start();

    require('database.php');

    if (isset($_REQUEST['enviar'])) {

        if (isset($_REQUEST['username'])) {
            $username = htmlentities(addslashes($_REQUEST['username']));
        } else {
            die('Es necesario un usuario para continuar.');
        }
        $password = htmlentities(addslashes($_REQUEST['password']));


        $query = "SELECT * FROM users";
        $result = mysqli_query($db, $query);



        while ($row = mysqli_fetch_array($result)) {
            if ($row['username'] == $username) {

                echo 'User Ok, Password Incorrect';

                if ($row['password'] == $password) {

                    $_SESSION['username'] = $username;
                    header('Location:_CRUD.php');
                }
              
            }
        }
        // header('Location:login.php?n');
    }


    $name = 'Inicio de sessión';
    $date = '¿Tienes cuenta?';
    $comments = '';
    include('./extras/header_sesion.php');
    ?>

    <div class="center_login">
        <?php
        if (isset($_REQUEST['n'])) {
            echo '<div class="spacer5vh">Los datos son erróneos :/<br></div>';
        }
        ?>
        <form class="login_form" action="login.php" method="post">
            <div class="inputs usuari_div">
                <label class="label" for="username"> Nombre de usuario</label>
                <input type="text" name="username" maxlength="20" autofocus>
            </div>
            <div class="inputs contrasenya_div">
                <label class="label" for="password"> Contraseña</label>
                <?php
                if (!isset($_REQUEST['pass'])) {
                    echo ' <input type="password" name="password" maxlength="20" >';
                } else {
                    echo ' <input style="border:1px solid red" type="password" name="password" maxlength="20" >';
                }
                ?>
            </div>

            <div class=" submit_div">

                <input type="submit" class="sudbutton inicia_sessio" name="enviar" value="Iniciar sessió">
            </div>


        </form>
    </div>

    <?php include('./extras/footer.php'); ?>

</body>

</html>
</body>

</html>