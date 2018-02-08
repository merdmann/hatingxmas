<h1>Hello, <?php echo _get(0);  ?></h1>
<h1>I hate Xmas</h1>



<?php

require_once $_SERVER[DOCUMENT_ROOT] . '/vendor/autoload.php';



$autoloader->loadClass("\MyNamespace\MyClassName");

print_r($autoloader);
exit(2);

?>
