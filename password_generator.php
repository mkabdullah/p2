<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('CONST_CAMEL_CASE', 'Camel Case');
define('CONST_UPPER_CASE', 'Upper Case');
define('CONST_LOWER_CASE', 'Lower Case');

define('CONST_SEPARATOR_HYPHEN', '-');
define('CONST_SEPARATOR_SPACE', ' ');

function generate_xkcd_password($number_of_words, $case, $separator, $include_number)
{
  if(!is_numeric($number_of_words))
  {
    return 'Number of words input should be numeric!';
  }

  if($number_of_words < 1 || $number_of_words > 9)
  {
    return 'Number of words input should be between 1 & 9!';
  }


  $lines = file('/Users/kaleem/dict/words', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

  $password = '';
  $word_count = 0;

  $index_of_word_with_a_number = rand(1, $number_of_words);
  $random_number = rand(0, 9);

  while($word_count < $number_of_words)
  {
    $word_count++;

    $line = strtolower($lines[rand(0, count($lines) - 1)]);
    if(strpos($password, $line) == false)
    {
      if($case == CONST_CAMEL_CASE)
      {
        $line = ucwords($line);
      }
      else if($case == CONST_UPPER_CASE)
      {
        $line = strtoupper($line);
      }

      if($include_number && $word_count == $index_of_word_with_a_number)
      {
        $line = $line.$random_number;
      }

      if($word_count == 1)
      {
        $password = $line;
      }
      else
      {
        if($separator == CONST_SEPARATOR_HYPHEN)
          $password = $password.CONST_SEPARATOR_HYPHEN.$line;
        else
          $password = $password.CONST_SEPARATOR_SPACE.$line;
      }

    }
  }

  return $password;

}
