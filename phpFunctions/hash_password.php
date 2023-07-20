<?php

function hashPassword(string $password)
{
    return(md5($password));
}