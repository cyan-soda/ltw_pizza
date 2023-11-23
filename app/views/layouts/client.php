<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>The Pizza Company</title>
  <!-- <meta content="Chernyh Mihail" name="author"> -->
  <!-- <meta content="Spedito - All in one place" name="description"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="HandheldFriendly" content="true">
  <meta name="format-detection" content="telephone=no">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <!-- <link rel="shortcut icon" href="../../../assignment/public/assets/img/favicon.png" type="image/x-icon"> -->
  <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../public/css/header.css">
  <!-- <link id="dm-light" rel="stylesheet" href="../../../assignment/public/assets/css/light.css" > -->
</head>

<body class="page-home dm-light">

      <!-- Loader-->
      <div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span></div>
      <!-- Loader end-->
    <?php 
      require_once "./app/views/" . $data["page"] . ".php";
    ?>
  
  <script src="../../../assignment/public/assets/js/jquery.min.js"></script>
  <script src="../../../assignment/public/assets/js/uikit.min.js"></script>
  <script src="../../../assignment/public/assets/js/uikit-icons.min.js"></script>
  <script src="../../../assignment/public/assets/js/main.js"></script>
  <script src="../../../assignment/public/assets/js/fontawesome.all.min.js"></script>
</body>

</html>