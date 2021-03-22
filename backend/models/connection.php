<?php 


class bdConnection{

	 static public function connect(){

	 	$link = new PDO("mysql:host=localhost;dbname=registropersonas", "root","");
	 	 return $link;
	 }
}



