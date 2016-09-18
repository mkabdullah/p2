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
    // $number_of_words = 5;
    // $add_number='off';
    // $add_symbol='off';

    $number_of_words = isset($_POST['number_of_words']) ? $_POST['number_of_words'] : '5';
    $add_number = isset($_POST['add_number']) ? $_POST['add_number'] : 'off';
    $add_symbol = isset($_POST['add_symbol']) ? $_POST['add_symbol'] : 'off';

    echo $number_of_words.'<br>';
    echo $add_number.'<br>';
    echo $add_symbol.'<br>';

    // if(isset($_POST['number_of_words']))
    //   echo $_POST["number_of_words"].'<br>';
    // if(isset($_POST['add_number']))
    //   echo $_POST['add_number'].'<br>';
    // if(isset($_POST['add_symbol']))
    //   echo $_POST['add_symbol'].'<br>';

  require ('password_generator.php');

  ?>

  <div class="container">
    <?php generate_xkcd_password($number_of_words); ?>
    <form method='POST' action='index.php'>
      <label for='number_of_words'># of Words</label>
      <input maxlength=1 type='text' name='number_of_words' id='number_of_words'
        onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
      <br>
  		<input type='checkbox' name='add_number' id='add_number' >
  		<label for='add_number'>Add a number</label>
  		<br>
  		<input type='checkbox' name='add_symbol' id='add_symbol' >
  		<label for='add_symbol'>Add a symbol</label>
      <br>
      <input type='submit' value='Generate New Password'>
    </form>

    <img class="xkcd_img" src='http://imgs.xkcd.com/comics/password_strength.png' alt='xkcd style passwords'>

  </div>
</body>
</html>
