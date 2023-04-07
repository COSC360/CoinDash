<?php


require __DIR__ . '/../vendor/autoload.php';

Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/../')->load();

echo getenv('DB_USERNAME');
echo $_ENV['DB_USERNAME'];
?>

