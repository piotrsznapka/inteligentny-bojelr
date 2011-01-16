<?php

function odczytajDaneZPlytki()
{
    /* kod */
    return array(
        /* pora => array(temperatura, godzina_od, minuta_od, godzina_do, minuta_do) */
        PORA_POBUDKA => array(TEMP_4, 8, 15, 10, 30),
        PORA_OBIAD => array(TEMP_3, 13, 30, 20, 15),
        PORA_KAPIEL => array(TEMP_2, 23, 30, 0, 00)
    );
}