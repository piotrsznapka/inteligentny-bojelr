<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
    <?php
    $temp_wody = 25;
    $temp_pieca = 25;
    $zrodlo_energii = 'prąd elektryczny';
    $tryb_pracy = 'pobudka';
    $moc_grzalek = 3;
    $zurzycie = 20;
    $cena = 50.15;
    ?>
    <p><font size="5"><br>Panel użytkownika<br> <br></font>

    <table border="0"  width="60%">
        <tr><td width="70%">Aktualna temperatura wody w zasobniku<td width="30%"><?php echo "$temp_wody"."C" ?></td></tr>
        <tr><td>Aktualna temperatura pieca<td><?php echo "$temp_pieca"."C" ?></td></tr>
        <tr><td>Źródło ogrzewania wody<td><?php echo "$zrodlo_energii" ?></td></tr>
        <tr><td>Aktualny tryb pracy<td><?php echo "$tryb_pracy" ?></td></tr>
        <tr><td>Aktualnie grzałki pracują z mocą<td><?php echo "$moc_grzalek".'kW' ?></td></tr>
        <tr><td>Dotychczasowe zużycie energii<td><?php echo "$zurzycie"."kWh" ?></td></tr>
        <tr><td>Dotychczasowe oriętacyjna cena energii<td><?php echo "$cena"."zł" ?></td></tr>
    </table>

 </body>
</html>