<!DOCTYPE html>
<html>
<head>

    <title>Muhammad Abdullah - P2 - XKCD Password Generator</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='css/main.css' rel='stylesheet'>

</head>
<body>

  <?php
  require ('password_generator.php');
  generate_xkcd_password();
  ?>

  <div class="container">

      <img class="xkcd_img" src='http://imgs.xkcd.com/comics/password_strength.png' alt='xkcd style passwords'>

  </div>
</body>
</html>
