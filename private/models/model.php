<?php
// Model functions
// In dit bestand zet je ALLE functions die iets met data of de database doen
function createUser( $email, $wachtwoord, $code ) {

	$connection = dbConnect();

	//Als die er niet is, dan verder met opslaan
	$sql           = "INSERT INTO `gebruikers` (`email`, `wachtwoord`, `code`) VALUES (:email, :wachtwoord, :code)";
	$statement     = $connection->prepare( $sql );
	$safe_password = password_hash( $wachtwoord, PASSWORD_DEFAULT );
	$params        = [
		'email'      => $email,
		'wachtwoord' => $safe_password,
		'code'       => $code
	];
	$statement->execute( $params );

}

function getUsers() {
	$connection = dbConnect();
	$sql        = "SELECT * FROM `users`";
	$statement  = $connection->query( $sql );

	return $statement->fetchAll();
}


function getUserByEmail( $email ) {

	$connection = dbConnect();
	$sql        = "SELECT * FROM `gebruikers` WHERE `email` = :email";
	$statement  = $connection->prepare( $sql );
	$statement->execute( [ 'email' => $email ] );

	if ( $statement->rowCount() === 1 ) {
		return $statement->fetch();
	}

	return false;

}

function getUserById( $id ) {

	$connection = dbConnect();
	$sql        = "SELECT * FROM `gebruikers` WHERE `id` = :id";
	$statement  = $connection->prepare( $sql );
	$statement->execute( [ 'id' => $id ] );

	if ( $statement->rowCount() === 1 ) {
		return $statement->fetch();
	}

	return false;

}


function getUserByCode( $code ) {

	$connection = dbConnect();
	$sql        = "SELECT * FROM `gebruikers` WHERE `code` = :code";
	$statement  = $connection->prepare( $sql );
	$statement->execute( [ 'code' => $code ] );

	if ( $statement->rowCount() === 1 ) {
		return $statement->fetch();
	}

	return false;

}


function getAllBlogs() {
	$connection = dbConnect();
	$sql        = "SELECT * FROM `blogs`";
	$statement  = $connection->query( $sql );

	return $statement->fetchAll();
}

function getBlog( $id ) {
	$connection = dbConnect();
	$sql        = "SELECT * FROM `blogs` WHERE `id` = :id";
	$statement  = $connection->prepare( $sql );
	$statement->execute( [ 'id' => $id ] );

	return $statement->fetch();
}



