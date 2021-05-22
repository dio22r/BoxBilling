<?php

$docker_env_db_host = getenv("DB_HOST") ? getenv("DB_HOST") : 'db_boxbilling';
$docker_env_db_port = getenv("DB_PORT") ? getenv("DB_PORT") : "3306";
$docker_env_db_name = getenv("DB_NAME") ? getenv("DB_NAME") : 'boxbilling';
$docker_env_db_user = getenv("DB_USER") ? getenv("DB_USER") : 'root';
$docker_env_db_password = getenv("DB_PASSWORD") ? getenv("DB_PASSWORD") : 'root';

$mysqli = new mysqli($docker_env_db_host . ":" . $docker_env_db_port, $docker_env_db_user, $docker_env_db_password);

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
} else {
  echo "OK";
}

$mysqli->query("CREATE DATABASE $docker_env_db_name");

$db = new PDO("mysql:host=$docker_env_db_host;dbname=$docker_env_db_name", $docker_env_db_user, $docker_env_db_password);

$query = file_get_contents("boxbilling.sql");

$stmt = $db->prepare($query);


if ($stmt->execute()) {
  echo "Success";
} else {
  echo "Fail";
}
