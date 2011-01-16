<?php
    $plik = dirname(__FILE__) . "/dane.txt";
    if (file_exists($plik)) {
      $dane = file($plik);   //otwarcie pliku z hasłem
      $dane = explode(";", $dane[0]);    //zwraca tablice przypisujac linie tekstu pod kolejne wiersze tablicy
    } else {
      $dane = array();
    }
    $temp_wody = $dane[15];
    $temp_pieca = 25;
    $zrodlo_energii = 'prąd elektryczny';
    $tryb_pracy = 'pobudka';
    $moc_grzalek = 3;

function odczytajDaneZPlytki($dane)
{
    return array(
        /* pora => array(temperatura, godzina_od, minuta_od, godzina_do, minuta_do) */
        PORA_POBUDKA => array($dane[4],$dane[0], $dane[1], $dane[2], $dane[3]),
        PORA_OBIAD => array($dane[9], $dane[5], $dane[6], $dane[7], $dane[8]),
        PORA_KAPIEL => array($dane[14], $dane[10], $dane[11], $dane[12], $dane[13])
    );
}

function odczytajDaneZGet($dane)
{
    $dane = $dane['dane'];
    return array(
        /* pora => array(temperatura, godzina_od, minuta_od, godzina_do, minuta_do) */
        PORA_POBUDKA => array($dane[PORA_POBUDKA]['temperatura'],$dane[PORA_POBUDKA]['godzina_od'], $dane[PORA_POBUDKA]['minuta_od'], $dane[PORA_POBUDKA]['godzina_do'], $dane[PORA_POBUDKA]['minuta_do']),
        PORA_OBIAD => array($dane[PORA_OBIAD]['temperatura'], $dane[PORA_OBIAD]['godzina_od'], $dane[PORA_OBIAD]['minuta_od'], $dane[PORA_OBIAD]['godzina_do'], $dane[PORA_OBIAD]['minuta_do']),
        PORA_KAPIEL => array($dane[PORA_KAPIEL]['temperatura'], $dane[PORA_KAPIEL]['godzina_od'], $dane[PORA_KAPIEL]['minuta_od'], $dane[PORA_KAPIEL]['godzina_do'], $dane[PORA_KAPIEL]['minuta_do'])
    );
}
