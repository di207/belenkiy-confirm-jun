<?php

spl_autoload_register(function ($class)
{
    include $class . '.php';
});
$database = new LuhnAlgorithm();

require 'template.tpl';
