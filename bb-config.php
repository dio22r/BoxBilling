<?php

$docker_env_db_host = getenv("DB_HOST") ? getenv("DB_HOST") : 'db_boxbilling';
$docker_env_db_name = getenv("DB_NAME") ? getenv("DB_NAME") : 'boxbilling';
$docker_env_db_user = getenv("DB_USER") ? getenv("DB_USER") : 'root';
$docker_env_db_password = getenv("DB_PASSWORD") ? getenv("DB_PASSWORD") : 'root';

return array(
  'debug' => false,
  'salt' => '18a0b8925deb5849c26c890385715739',
  'url' => 'http://localhost:8004/',
  'admin_area_prefix' => '/bb-admin',
  'sef_urls' => true,
  'timezone' => 'UTC',
  'locale' => 'en_US',
  'locale_date_format' => '%A, %d %B %G',
  'locale_time_format' => ' %T',
  'path_data' => '/var/www/html/bb-data',
  'path_logs' => '/var/www/html/bb-data/log/application.log',
  'log_to_db' => true,
  'db' =>
  array(
    'type' => 'mysql',
    'host' => $docker_env_db_host,
    'name' => $docker_env_db_name,
    'user' => $docker_env_db_user,
    'password' => $docker_env_db_password,
  ),
  'twig' =>
  array(
    'debug' => true,
    'auto_reload' => true,
    'cache' => '/var/www/html/bb-data/cache',
  ),
  'api' =>
  array(
    'require_referrer_header' => false,
    'allowed_ips' =>
    array(),
    'rate_span' => 3600,
    'rate_limit' => 1000,
  ),
);
