<?php ob_start() ?>
<pre>
<?php include_once ("odczyt.php") ?>
<?php
//var_dump($_POST['dane']);
$wyslij = file_put_contents("wyslij.txt", implode(PHP_EOL,$_POST['dane'][5])
        .PHP_EOL. implode(PHP_EOL,$_POST['dane'][6])
        .PHP_EOL. implode(PHP_EOL,$_POST['dane'][7]));
header('Location: admin.php');

?>
</pre>
<?php ob_end_flush() ?>