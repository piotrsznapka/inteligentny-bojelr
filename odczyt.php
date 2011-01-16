<?php
    $dane = file(dirname(__FILE__) . "/dane.txt");   //otwarcie pliku z hasłem
    $dane = explode(";", $dane[0]);    //zwraca tablice przypisujac linie tekstu pod kolejne wiersze tablicy
    $temp_wody = $dane[15];
    $temp_pieca = 25;
    $zrodlo_energii = 'prąd elektryczny';
    $tryb_pracy = 'pobudka';
    $moc_grzalek = 3;

function odczytajDaneZPlytki($dane)
{
    /* kod */
    return array(
        /* pora => array(temperatura, godzina_od, minuta_od, godzina_do, minuta_do) */
        PORA_POBUDKA => array($dane[4],$dane[0], $dane[1], $dane[2], $dane[3]),
        PORA_OBIAD => array($dane[9], $dane[5], $dane[6], $dane[7], $dane[8]),
        PORA_KAPIEL => array($dane[14], $dane[10], $dane[11], $dane[12], $dane[13])
    );
}

?>