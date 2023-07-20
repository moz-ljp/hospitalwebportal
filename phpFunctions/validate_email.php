<?php

function validateEmail(string $email)
{
    $hasAtSymbol = false;
    $valid = filter_var($email, FILTER_VALIDATE_EMAIL);
    $minLength = strlen($email) > 8;

    $emailArray = str_split($email);

    foreach($emailArray as $character)
    {
        if(ctype_punct($character))
        {
            if($character == "@")
            {
                $hasAtSymbol = true;
            }
        }
    }

    if($hasAtSymbol and $valid and $minLength)
    {
        return true;
    }
    else
    {
        return false;
    }
}

?>