<?php
if (!isset($_COOKIE["zalogwany"]) && $_COOKIE["zalogowany"] != "admin") {
    die ("Nie jestes adminem! Uciekaj stad");
}

define("TEMP_1", 1);
define("TEMP_2", 2);
define("TEMP_3", 3);
define("TEMP_4", 4);

define("PORA_POBUDKA", 1);
define("PORA_OBIAD", 2);
define("PORA_KAPIEL", 3);

$temp_wody = 25;
$temp_pieca = 25;
$zrodlo_energii = 'prąd elektryczny';
$tryb_pracy = 'pobudka';
$moc_grzalek = 3;
$zuzycie = 20;
$cena = 50.15;

$dostepne_temperatury = array(
    TEMP_1 => "80C - 70C",
    TEMP_2 => "70C - 60C",
    TEMP_3 => "60C - 50C",
    TEMP_4 => "50C - 40C",
);
$godziny = range(0, 23);
$minuty  = range(0, 59, 15);
$pory_dnia = array(
    PORA_POBUDKA => "Pobudka",
    PORA_OBIAD => "Obiad",
    PORA_KAPIEL => "Kąpiel",
);
