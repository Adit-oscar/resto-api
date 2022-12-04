<?php

require_once 'Config/Database.php';

// Autoload Core
spl_autoload_register(function ($class) {
  $class = explode('\\', $class);
  $class = end($class);
  require "Core/{$class}.php";
});

// // Autoload Helper
spl_autoload_register(function ($class) {
  $class = explode('\\', $class);
  $class = end($class);
  require "Helper/{$class}.php";
});
