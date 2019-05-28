<?php
// set page headers
$title = "2. ООП";

spl_autoload_register(function ($class)
{
    include $class . '.php';
});

$database = new DB();
$db = $database->getConnection();

require "controller.php";

require "template.tpl";

?>
