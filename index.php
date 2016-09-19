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

    // echo $number_of_words.'<br>';
    // echo $add_number.'<br>';
    // echo $add_symbol.'<br>';

    // if(isset($_POST['number_of_words']))
    //   echo $_POST["number_of_words"].'<br>';
    // if(isset($_POST['add_number']))
    //   echo $_POST['add_number'].'<br>';
    // if(isset($_POST['add_symbol']))
    //   echo $_POST['add_symbol'].'<br>';

  require ('password_generator.php');

  ?>

  <div class="container">
    <?php
      $result = generate_xkcd_password($number_of_words);
      echo '<br><br>'.$result.'<br><br>';
    ?>
    <form method='POST' action='index.php'>
      <label for='number_of_words'>No. of Words</label>
      <select name='number_of_words' id='number_of_words'>
        <option value='1' <?php if($number_of_words=='1') echo 'selected'; ?>>1</option>
        <option value='2' <?php if($number_of_words=='2') echo 'selected'; ?>>2</option>
        <option value='3' <?php if($number_of_words=='3') echo 'selected'; ?>>3</option>
        <option value='4' <?php if($number_of_words=='4') echo 'selected'; ?>>4</option>
        <option value='5' <?php if($number_of_words=='5') echo 'selected'; ?>>5</option>
        <option value='6' <?php if($number_of_words=='6') echo 'selected'; ?>>6</option>
        <option value='7' <?php if($number_of_words=='7') echo 'selected'; ?>>7</option>
        <option value='8' <?php if($number_of_words=='8') echo 'selected'; ?>>8</option>
        <option value='9' <?php if($number_of_words=='9') echo 'selected'; ?>>9</option>
      </select>
      <br><br>
  		<input type='checkbox' name='add_number' id='add_number' >
  		<label for='add_number'>Include number</label>
  		<br><br>
  		<input type='checkbox' name='add_symbol' id='add_symbol' >
  		<label for='add_symbol'>Include symbol</label>
      <br><br>
      <input type='submit' value='Generate New Password'>
      <br><br>
    </form>

    <img class="xkcd_img" src='http://imgs.xkcd.com/comics/password_strength.png' alt='xkcd style passwords'>

  </div>
</body>
</html>
