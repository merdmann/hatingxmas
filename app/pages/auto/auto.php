<h1>Hello, <?php echo _get(0);  ?></h1>

<?php
$autoloader = require "./vendor/autoload.php";

$results = $autoloader->findFile("michaelslab\\xmas\\game\\Playground");

echo("<h1>Found file for class at:" . $results . "</h1>" );
?>

<?php
$autoloader->loadClass("michaelslab\\xmas\game\Playground");

print_r($autoloader);
exit(2);

?>