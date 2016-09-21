<?php

#Author Muhammad Kaleem Abdullah

#setting Error reporting to report all the errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

#define some useful constants
define('CONST_CAMEL_CASE', 'Camel Case');
define('CONST_UPPER_CASE', 'Upper Case');
define('CONST_LOWER_CASE', 'Lower Case');
define('CONST_SEPARATOR_HYPHEN', '-');
define('CONST_SEPARATOR_SPACE', ' ');


function generate_xkcd_password($number_of_words, $case, $separator, $include_number, $include_sp_char)
{
  #define the special characters to be used
  $special_chars = array('@', '$', '#', '&', '%');

  #some basic input validations
  #the number of words input value should be numeric
  if(!is_numeric($number_of_words))
  {
    return 'ERR: Number of words input should be numeric!';
  }

  #number of words input should be b/w 1 and 9
  if($number_of_words < 1 || $number_of_words > 9)
  {
    return 'ERR: Number of words input should be between 1 & 9!';
  }


  #read the words database file and move all the lines into an array
  #$lines = file('/Users/kaleem/dict/words', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  $lines = file('./data/google-10000-english-usa.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

  #variable declarations
  $password = '';
  $word_count = 0;

  #choose a random word from the word array to add a number at the end
  $index_of_word_with_a_number = rand(1, $number_of_words);

  #get a random number b/w 1 and 9
  $random_number = rand(0, 9);

  #choose a random word from the words array to add a special char. at the end
  $index_of_word_with_sp_char = rand(1, $number_of_words);

  #get a random character from the special char. array
  $sp_char = $special_chars[rand(0, count($special_chars) - 1)];


  #run a loop till we get the required number of words
  while($word_count < $number_of_words)
  {

    #get a random word from the words array, lowercase it, and trim it
    $line = trim(strtolower($lines[rand(0, count($lines) - 1)]));

    #check if the new word alreay exists in our password
    #if it does, just ignore it. Also check if it is longer than 3 chars
    if(strpos($password, $line) === false && strlen($line) > 3)
    {
      #increment the word counter
      $word_count++;

      #if CamelCase result is required, change the case to CamelCase
      if($case == CONST_CAMEL_CASE)
      {
        $line = ucwords($line);
      }
      #if UPPERCASE result is required, change the case to UPPERCASE
      else if($case == CONST_UPPER_CASE)
      {
        $line = strtoupper($line);
      }

      #check if a number is required in the password
      if($include_number && $word_count == $index_of_word_with_a_number)
      {
        $line = $line.$random_number;
      }

      #check if a special char. is rquired in the passord
      if($include_sp_char && $word_count == $index_of_word_with_sp_char)
      {
        $line = $line.$sp_char;
      }

      #add the new word at the end of our running password
      if($word_count == 1)
      {
        $password = $line;
      }
      else
      {
        #add the proper separator b/w words
        if($separator == CONST_SEPARATOR_HYPHEN)
          $password = $password.CONST_SEPARATOR_HYPHEN.$line;
        else
          $password = $password.CONST_SEPARATOR_SPACE.$line;
      }
    }
  }
  return $password;
}
