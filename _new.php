<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nueva sesión</title>

  <title>Añadir entrada</title>
  <link rel="stylesheet" href="./style/computer_first.css">
  <style>
    h2 {
      text-align: center;
    }

    table {
      width: 50%;
      margin: auto;
      padding: 5px;
    }

    td {
      padding: 5px 0;
    }
  </style>
</head>

<body>

  <h2>Nueva entrada</h2>
  <form action="insert.php" method="post" enctype="multipart/form-data" name="form1">
    <table>
   
      <tr>
        <td>name:
          <label for="name"></label>
        </td>
        <td><input type="text" name="name" id="name" required></td>
      </tr>

      <tr>
        <td>model:
          <label for="model"></label>
        </td>
        <td><input type="text" name="model" id="model">
        </td>
      </tr>
      <tr>
        <td>photographer:
          <label for="photographer"></label>
        </td>
        <td><input type="text" name="photographer" id="photographer">
        </td>
      </tr>
      <tr>
        <td>makeup:
          <label for="makeup"></label>
        </td>
        <td><input type="text" name="makeup" id="makeup">
        </td>
      </tr>
      <tr>
        <td>hair:
          <label for="hair"></label>
        </td>
        <td><input type="text" name="hair" id="hair">
        </td>
      </tr>
      <tr>
        <td>stylish:
          <label for="stylish"></label>
        </td>
        <td><input type="text" name="stylish" id="stylish">
        </td>
      </tr>
      <tr>
        <td>showroom:
          <label for="showroom"></label>
        </td>
        <td><input type="text" name="showroom" id="showroom">
        </td>
      </tr>
      <tr>
        <td>designers:
          <label for="designers"></label>
        </td>
        <td><input type="text" name="designers" id="designers">
        </td>
      </tr>
      <tr>
        <td>Comments:
          <label for="Comments"></label>
        </td>
        <td><input type="text" name="Comments" id="Comments">
        </td>
      </tr>

      <tr>
        <td>Select Photo (one or multiple) Must be .jpeg, .jpg, .png or .gif.</td>
        <td><input type="file" name="files[]" multiple />
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" name="Upload" id="Upload" value="Upload">
        </td>
      </tr>


    </table>
  </form>

</body>

</html>