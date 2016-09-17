<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

function generate_xkcd_password() {

  $lines = file('/Users/kaleem/dict/words', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

  $password = '';
  $max_words = 6;
  $word_count = 0;

  while($word_count < $max_words)
  {
    $line = strtolower($lines[rand(0, count($lines) - 1)]);
    if(strpos($password, $line) == false)
    {
      $password = $password.'-'.$line;
      $word_count++;
    }
  }

  echo($password.'<br>');
}
