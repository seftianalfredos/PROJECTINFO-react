<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=pis;charset=utf8', 'root', '*123456#');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
