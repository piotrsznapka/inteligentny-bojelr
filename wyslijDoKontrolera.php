<?php
include_once ("odczyt.php");
include_once ("server.php");

$maxGodzina = -1;
foreach ($_POST['dane'] as $pora => $dane) {
  if ($dane['godzina_od'] > $dane['godzina_do']) {
    $blad = "Godzina od nie może być większa od godziny do dla pory " . $pory_dnia[$pora];
    break;
  }
  if ($maxGodzina == -1) {
    $maxGodzina = $dane['godzina_od'];
  } elseif ($dane['godzina_od'] < $maxGodzina) {
    $blad = "Godzina początkowa dla pory " . $pory_dnia[$pora] . " jest za mała";
    break;
  }
}

if (!empty($blad)) {
  header('Location: admin.php?blad=' . $blad . '&' . http_build_query($_POST));
  exit();
}
$wyslij = file_put_contents("wyslij.txt", implode(PHP_EOL,$_POST['dane'][5])
        .PHP_EOL. implode(PHP_EOL,$_POST['dane'][6])
        .PHP_EOL. implode(PHP_EOL,$_POST['dane'][7]));
header('Location: admin.php');
