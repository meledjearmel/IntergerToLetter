<?php

    require('NumberToLetters.php');

    $letter = new NumberToLetters();

    $text = $letter->writeToLetter(421);

    var_dump($text);