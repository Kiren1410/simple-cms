<?php

//make sure user is logged in
if(Authenthication::isLoggedin())
{
    //only if the user is logged-in, only then the logout triggers
    Authenthication::logout();
}

header('Location: /login');
exit;