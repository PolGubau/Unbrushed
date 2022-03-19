<!doctype html>
<html>

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
  <title>CRUD</title>
  <link rel="stylesheet" href="./style/reset.css">
  <link rel="stylesheet" href="./style/computer_first.css">
  <link rel="stylesheet" href="./style/mobile.css">



  <script src="./script/jquery.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="./script/script.js"></script>

</head>

<body>




  <?php
  session_start();
  $act = false;

  if (!isset($_SESSION['username'])) {
    header('Location:login.php?n');
  }



  include('database.php');



  if (isset($_REQUEST['del'])) {
    $ID = $_REQUEST['del'];
    $query_del = "DELETE FROM sesiones 
            WHERE id = $ID";
    $result_del = mysqli_query($db, $query_del);
  }
  if (isset($_REQUEST['Upload'])) {
    $ID = $_REQUEST['id'];
    $vname = $_REQUEST['name'];
    $vmodel = $_REQUEST['model'];
    $vphotographer = $_REQUEST['photographer'];
    $vmakeup = $_REQUEST['makeup'];
    $vhair = $_REQUEST['hair'];
    $vstylish = $_REQUEST['stylish'];
    $vshowroom = $_REQUEST['showroom'];
    $vdesigners = $_REQUEST['designers'];
    $vComments = $_REQUEST['Comments'];
    $imagen = $_FILES["files"];
    $imagenes = implode('|', $imagen['name']);
    $query_update = "UPDATE sesiones SET name='$vname', model='$vmodel', photographer='$vphotographer',makeup='$vmakeup',hair='$vhair',stylish='$vstylish',showroom='$vshowroom',designers='$vdesigners',Comments='$vComments',photos='$imagenes' WHERE id=$ID";

    $result_update = mysqli_query($db, $query_update);
    header('Location:_CRUD.php');
    if (!$result_update) {
      die('Query Error ' . mysqli_errno($db));
    }
  }
  if (isset($_REQUEST['act'])) {
    $act = true;
    $ID = $_REQUEST['act'];

    $query_act = "SELECT * FROM sesiones where id=$ID";
    $result_act = mysqli_query($db, $query_act);
    while ($row = mysqli_fetch_array($result_act)) {
      $vID = $row['id'];
      $vname = $row['name'];
      $vmodel = $row['model'];
      $vphotographer = $row['photographer'];
      $vmakeup = $row['makeup'];
      $vhair = $row['hair'];
      $vstylish = $row['stylish'];
      $vshowroom = $row['showroom'];
      $vdesigners = $row['designers'];
      $vComments = $row['Comments'];
    }
  }
  if (isset($_REQUEST['Create'])) {
    if (isset($_REQUEST['name'])) {

      $name = $_REQUEST['name'];
      $date = date("Y-m-d H:i:s");
      $model = $_REQUEST['model'];
      $photographer = $_REQUEST['photographer'];
      $makeup = $_REQUEST['makeup'];
      $hair = $_REQUEST['hair'];
      $stylish = $_REQUEST['stylish'];
      $showroom = $_REQUEST['showroom'];
      $designers = $_REQUEST['designers'];
      $Comments = $_REQUEST['Comments'];
      $imagen = $_FILES["files"];
      $imagenes = implode('|', $imagen['name']);

      extract($_POST);
      $error = array();
      $extension = array("JPG", "jpeg", "jpg", "png", "gif");
      foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
        $file_name = $_FILES["files"]["name"][$key];
        $file_tmp = $_FILES["files"]["tmp_name"][$key];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);

        if (in_array($ext, $extension)) {
          if (!file_exists("images/" . $file_name)) {
            move_uploaded_file($file_tmp = $_FILES["files"]["tmp_name"][$key], "images/" . $file_name);
          } else {
            $filename = basename($file_name, $ext);
            $newFileName = $filename . time() . "." . $ext;
            move_uploaded_file($file_tmp = $_FILES["files"]["tmp_name"][$key], "images/" . $newFileName);
          }
        } else {
          array_push($error, "$file_name, ");
        }
      }


      $query_ins = "INSERT 
    INTO sesiones (name, model, photographer,makeup,hair,stylish,showroom,designers,Comments,Date,photos) 
    VALUES(
    '" . $name . "',
    '" . $model . "',
    '" . $photographer . "',
    '" . $makeup . "',
    '" . $hair . "',
    '" . $stylish . "',
    '" . $showroom . "',
    '" . $designers . "',
    '" . $Comments . "',
    '" . $date . "',
    '" . $imagenes . "')
    ";

      $result_ins = mysqli_query($db, $query_ins);
    }
  }




  $query = "SELECT * FROM sesiones";
  $result = mysqli_query($db, $query);
  $name = 'CRUD';
  $date = 'Sistema de control de la BBDD.';
  require_once('./extras/header_sesion.php');


  ?>

  <form class="crud_form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="formulario_fullpage">
    <table class="crud_tablero">
      <tr class="crud_fila primera_row">
        <td class="primera_fila casella"><b>ID</b></td>
        <td class="primera_fila casella">name</td>
        <td class="primera_fila casella">Date</td>
        <td class="primera_fila casella">Borrar Sesión</td>
        <td class="primera_fila casella">Actualizar Sesión</td>
        <td class="primera_fila casella">Veure</td>
      </tr>
      <?php
      while ($row = mysqli_fetch_array($result)) {

      ?>
        <tr class="crud_fila">
          <td class="casella">

            <p class="casella_text"><?php echo $row['id'] ?>
          </td>
          <td class="casella">
            <p class="casella_text"><?php echo $row['name'] ?>
          </td>
          <td class="casella">
            <p class="casella_text"><?php echo $row['Date'] ?>
          </td>
          <td class="casella">
            <p class="casella_text casella_acció">
              <a href="_CRUD.php?del=<?php echo $row['id'] ?>">Borrar</a>
          </td>
          <td class="casella">
            <p class="casella_text casella_acció">
              <a href="_CRUD.php?act=<?php echo $row['id'] ?>">Editar</a>
          </td>
          <td class="casella">
            <p class="casella_text casella_acció">
              <a href="./sesion.php?s='<?php echo $row['id']?>'">Ver</a>
          </td>
        </tr>
      <?php
      }      ?>

  </form>
  </table>
  <hr>



  <!-- ----------------------------------- -->

  <h2>Nueva entrada</h2>
  <form action="_CRUD.php" method="post" enctype="multipart/form-data" name="form1" id="formulari_add">
    <table class="filas_insert_CRUD">
      <tr>

        <td><input type="hidden" name="id" id="id" value="<?php if (isset($vID)) echo $vID; ?>">
        </td>
      </tr>
      <tr>
        <td>name:
          <label for="name"></label>
        </td>
        <td><input type="text" name="name" id="name" required value="<?php if (isset($vname)) echo $vname; ?>">
        </td>
      </tr>

      <tr>
        <td>model:
          <label for="model"></label>
        </td>
        <td><input type="text" name="model" id="model" value="<?php if (isset($vmodel)) echo $vmodel; ?>">
        </td>
      </tr>
      <tr>
        <td>photographer:
          <label for="photographer"></label>
        </td>
        <td><input type="text" name="photographer" id="photographer" value="<?php if (isset($vphotographer)) echo $vphotographer; ?>">
        </td>
      </tr>
      <tr>
        <td>makeup:
          <label for="makeup"></label>
        </td>
        <td><input type="text" name="makeup" id="makeup" value="<?php if (isset($vmakeup)) echo $vmakeup; ?>">
        </td>
      </tr>
      <tr>
        <td>hair:
          <label for="hair"></label>
        </td>
        <td><input type="text" name="hair" id="hair" value="<?php if (isset($vhair)) echo $vhair; ?>">
        </td>
      </tr>
      <tr>
        <td>stylish:
          <label for="stylish"></label>
        </td>
        <td><input type="text" name="stylish" id="stylish" value="<?php if (isset($vstylish)) echo $vstylish; ?>">
        </td>
      </tr>
      <tr>
        <td>showroom:
          <label for="showroom"></label>
        </td>
        <td><input type="text" name="showroom" id="showroom" value="<?php if (isset($vshowroom)) echo $vshowroom; ?>">
        </td>
      </tr>
      <tr>
        <td>designers:
          <label for="designers"></label>
        </td>
        <td><input type="text" name="designers" id="designers" value="<?php if (isset($vdesigners)) echo $vdesigners; ?>">
        </td>
      </tr>
      <tr>
        <td>Comments:
          <label for="Comments"></label>
        </td>
        <td><input type="text" name="Comments" id="Comments" value="<?php if (isset($vComments)) echo $vComments; ?>">
        </td>
      </tr>

      <tr>
        <td>Select Photo (one or multiple)</td>
        <td><input type="file" name="files[]" multiple />
        </td>
      </tr>
      <tr>

        <td colspan="2" align="center">
          <?php
          if ($act == false) echo '<input class="inicia_sessio" type="submit" name="Create" id="Upload" value="Create">';
          if ($act == true) echo '<input class="inicia_sessio"type="submit" name="Upload" id="Upload" value="Upload">';

          ?>
        </td>
      </tr>


    </table>
  </form>





</body>

</html>