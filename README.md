# P2 -- XKCD Password Generator

## Author: Muhammad Kaleem Abdullah

## Description

This is my second project for the course CSCI E-15 Dynamic Web Applications. The project provides the following functionality:

1. Generate a password based on commonly used English words as described in XKCD password comic.
2. The number of words can be specified by the user to be b/w 1 and 9.
3. The user can ask for a number to be added in one of the words.
4. The user can ask for a special character to be added in one of the words.
5. The user can specify the words' case (Upper, Lower, Camel).
6. The user can select the type of separator b/w words (Hyphen or Space).


## Program Logic

It is a simple program but it follows "separation of concerns" design principle. It has two files:

1. index.php
                This file generates the HTML for the browser. It provides various options for the user to input, processes those input values, calls the password generator function, and displays the generated password back to the user. If the password generator function returns an error message, it also displays that message to the user. So basically this acts as a View and Controller.

2. password_generator.php
                This is is the business logic file. It contains the php function 'generate_xkcd_password()' to generate passwords based on the specification given by the user's input. It uses a file with commonly used English words to generate a password of required word length.


## Where is it?

Project [Link](http://p2.kaleemabdullah.com).
Project code is available at [Github](https://github.com/mkabdullah/p2)

## Project Demo

The project demo video is hosted [here](https://www.youtube.com/watch?v=IBIFS2pegzk)

## Credits
The word list for this project was copied from the following public Git location [Git](https://github.com/first20hours/google-10000-english)
