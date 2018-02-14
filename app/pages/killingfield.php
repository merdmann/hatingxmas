<?php 

require_once $_SERVER[DOCUMENT_ROOT] . '/vendor/autoload.php';


$playground = new michaelslab\xmas\game\display\Playground(28);

$playground->draw();




?>