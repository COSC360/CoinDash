<?php


require __DIR__ . '/../vendor/autoload.php';

Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/../')->load();

echo getenv('APP_ENV');
echo $_ENV['APP_NAME'];

?>