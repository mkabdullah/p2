<!DOCTYPE html>
<html>
<head>

    <title>P2 - XKCD Password Generator</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='css/main.css' rel='stylesheet'>

</head>
<body>

  <?php

    #add the password generator module
    require ('password_generator.php');

    #get values from POST user input
    $number_of_words = isset($_POST['number_of_words']) ? $_POST['number_of_words'] : '5';
    $words_case = isset($_POST['words_case']) ? $_POST['words_case'] : CONST_LOWER_CASE;
    $words_separator = isset($_POST['words_separator']) ? $_POST['words_separator'] : CONST_SEPARATOR_HYPHEN;
    $add_number = isset($_POST['add_number']);
    $add_symbol = isset($_POST['add_symbol']);

  ?>

  <div class="container">
    <?php
      #call the function from password generator module to generate a new password
      $result = generate_xkcd_password($number_of_words, $words_case, $words_separator, $add_number, $add_symbol);

      #display the generated password (or an error message, if that is what the function returned)
      if(strpos($result, 'ERR:') === false)
      {
        #if there is no error, display the result in a green box
        echo '<br><br><div class="green_msg">'.$result.'</div><br><br>';
      }
      else
      {
        #if there is error, display it in a red box
        echo '<br><br><div class="red_msg">'.str_replace('ERR: ', '', $result).'</div><br><br>';
      }
    ?>
    <form method='POST'>
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
      <label for='words_case'>Case</label>
      <select name='words_case' id='words_case'>
        <option value='<?php echo CONST_LOWER_CASE ?>' <?php if($words_case==CONST_LOWER_CASE) echo 'selected'; ?>>Lower Case Words</option>
        <option value='<?php echo CONST_CAMEL_CASE ?>' <?php if($words_case==CONST_CAMEL_CASE) echo 'selected'; ?>>Camel Case Words</option>
        <option value='<?php echo CONST_UPPER_CASE ?>' <?php if($words_case==CONST_UPPER_CASE) echo 'selected'; ?>>Upper Case Words</option>
      </select>
      <br><br>
      <label for='words_separator'>Separator</label>
      <select name='words_separator' id='words_separator'>
        <option value='<?php echo CONST_SEPARATOR_HYPHEN ?>' <?php if($words_separator==CONST_SEPARATOR_HYPHEN) echo 'selected'; ?>>Hyphen</option>
        <option value='<?php echo CONST_SEPARATOR_SPACE ?>' <?php if($words_separator==CONST_SEPARATOR_SPACE) echo 'selected'; ?>>Space</option>
      </select>
      <br><br>
  		<input type='checkbox' name='add_number' id='add_number' <?php if($add_number) echo 'checked'; ?> >
  		<label for='add_number'>Include number</label>
  		<br><br>
  		<input type='checkbox' name='add_symbol' id='add_symbol' <?php if($add_symbol) echo 'checked'; ?>>
  		<label for='add_symbol'>Include symbol</label>
      <br><br>
      <input type='submit' value='Generate New Password'>
      <br><br>
    </form>

    <img class="xkcd_img" src='http://imgs.xkcd.com/comics/password_strength.png' alt='xkcd style passwords'>

  </div>
</body>
</html>
