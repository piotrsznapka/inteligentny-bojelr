<?php
if (!isset($_COOKIE["zalogwany"]) && $_COOKIE["zalogowany"] != "admin") {
    die ("Nie jestes adminem! Uciekaj stad");
}

define("TEMP_1", 1);
define("TEMP_2", 2);
define("TEMP_3", 3);
define("TEMP_4", 4);    //definicja zakresu temperatur i przypisanie im konkretnej wartości liczbowej

define("PORA_POBUDKA", 5);
define("PORA_OBIAD", 6);
define("PORA_KAPIEL", 7);   //definicja zakresu trybów pracy i przypisanie im konkretnej wartości liczbowej

$temp_wody = 25;
$temp_pieca = 25;
$zrodlo_energii = 'prąd elektryczny';
$tryb_pracy = 'pobudka';
$moc_grzalek = 3;
$zuzycie = 20;
$cena = 50.15;  //zmienne wykorzystywane w panelu użytkownika i administratora

$dostepne_temperatury = array(
    TEMP_1 => "80C - 70C",
    TEMP_2 => "70C - 60C",
    TEMP_3 => "60C - 50C",
    TEMP_4 => "50C - 40C",  //tablica z dostępnymi zakresami temperatur dla formularza select
);
$godziny = range(0, 24);    // przypisanie wartości godzin które będą wykorzystane w poleceniu select
$minuty  = range(0, 59, 15);    // przypisanie wartości minut co kwadrans które będą wykorzystane w poleceniu select
$pory_dnia = array(
    PORA_POBUDKA => "Pobudka",
    PORA_OBIAD => "Obiad",
    PORA_KAPIEL => "Kąpiel",    //przypisanie trybów pracy do tablicy w celu wykorzystania ich w poleceniu select
);
