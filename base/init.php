<?php
session_start();

//connexion db (for mac)
$bdd = new PDO('mysql:host=localhost;dbname=passionfroid', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8') );

//connexion db (windows)
//$bdd = new PDO('mysql:host=localhost;dbname=passionfroid', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8') ); 


function userConnect(){

	if( !isset($_SESSION['user']) ){
		
		return false;
	}
	else{ 
		return true;
	}
}


//Deconnexion :
if( isset($_GET['action']) && $_GET['action'] == 'deconnexion' ){
    session_destroy();
}