<?php
  require('database.php');

  if (isset($_REQUEST['Upload'])) {
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
      $extension = array("JPG","jpeg", "jpg", "png", "gif");
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


      $query = "INSERT 
      INTO sesiones (name, model, photographer,makeup,hair,stylish,showroom,designers,Comments,Date,photos) 
      VALUES(
      '".$name."',
      '".$model."',
      '".$photographer."',
      '".$makeup."',
      '".$hair."',
      '".$stylish."',
      '".$showroom."',
      '".$designers."',
      '".$Comments."',
      '".$date."',
      '".$imagenes."')
      ";
    

      $result = mysqli_query($db, $query);

      if (!$result) {
        die('Query Error ' . mysqli_errno($db));
      }

      echo '<br> Se ha agregado el comentario con éxito.<br>';
    } else {
      header('Location:_new.php');
    }


header('Location:_CRUD.php');
  }

  ?>