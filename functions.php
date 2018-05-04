<?php

//session_start();


//Post metodumuz
function post($q)
{
    if (isset($_POST[$q]))
    {
        if (!empty($_POST[$q]))
        {
            return filter($_POST[$q]);
        }
        else return false;
    }
    else return false;
}


// Post metodu icin filtre uygulaması
function filter($q)
{
	return htmlspecialchars(trim($q));
}


//Session Kontrolü
function oturum($q)
{
    return !empty($_SESSION[$q]) ? $_SESSION[$q] : '';

}





 ?>
