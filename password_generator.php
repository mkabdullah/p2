<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

function generate_xkcd_password($number_of_words)
{
  if(!is_numeric($number_of_words))
  {
    echo 'Number of words input should be numeric! <br>';
    return;
  }

  if($number_of_words < 1 || $number_of_words > 9)
  {
    echo 'Number of words input should be between 1 & 9! <br>';
    return;
  }


  $lines = file('/Users/kaleem/dict/words', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

  $password = '';
  $word_count = 0;

  while($word_count < $number_of_words)
  {
    $line = strtolower($lines[rand(0, count($lines) - 1)]);
    if(strpos($password, $line) == false)
    {
      $password = $password.'-'.$line;
      $word_count++;
    }
  }

  echo $password.'<br>';


}
