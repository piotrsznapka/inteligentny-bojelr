<?php include_once ("server.php") ?>
<?php include_once ("odczyt.php") ?>
<?php include_once ("dane.php") ?>
<?php $odczytane_wartosci = empty($_GET['blad']) ? odczytajDaneZPlytki($dane) : odczytajDaneZGet($_GET) ?>
<?php 
$komenda="uart2.exe";
$result = array(); 
system($komenda, $result);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
    <p><font size="5"><br>Panel administratora<br> <br></font>
    
    <table border="0"  width="60%">
        <tr><td width="70%">Aktualna temperatura wody w zasobniku<td width="30%"><?php echo "$temp_wody"."C" ?></td></tr>
        <tr><td>Aktualna temperatura pieca<td><?php echo $temp_pieca ?>C</td></tr>
        <tr><td>Źródło ogrzewania wody<td><?php echo "$zrodlo_energii" ?></td></tr>
        <tr><td>Aktualny tryb pracy<td><?php echo "$tryb_pracy" ?></td></tr>
        <tr><td>Aktualnie grzałki pracują z mocą<td><?php echo "$moc_grzalek".'kW' ?></td></tr>
        <tr><td>Dotychczasowe zużycie energii<td><?php echo $zuzycie ?>kWH</td></tr>
        <tr><td>Dotychczasowe oriętacyjna cena energii<td><?php echo "$cena"."zł" ?></td></tr>
    </table>
    <br>
    <form action="wyslijDoKontrolera.php" method="POST">
        <table width="60%" border="0">
          <tr><td colspan="3">
            <?php if (!empty($_GET['blad'])): ?>
              <strong style="color:red"><?php echo $_GET['blad'] ?></strong>
            <?php endif ?>
          </td></tr>
         <tr><td><b>Tryb pracy</b><td colspan="2"><b>Godziny (od do)</b><td><b>Zakres temperatur</b></td></tr>
         <?php foreach ($pory_dnia as $kluczPora => $pora): ?>
         <tr>
             <td><?php echo $pora ?></td>
             <td>od
                <select name="dane[<?php echo $kluczPora ?>][godzina_od]>
                    <?php foreach ($godziny as $godzina): ?>
                        <option value="<?php echo $godzina ?>"
                                <?php foreach ($odczytane_wartosci as $poraZPlytki => $wartosciZPlytki): ?>
                                    <?php if ($poraZPlytki == $kluczPora && $wartosciZPlytki[1] == $godzina): ?>
                                        selected="selected"
                                    <?php endif ?>
                                <?php endforeach ?>
                                ><?php echo $godzina ?></option>
                    <?php endforeach ?>
                </select>&nbsp;:&nbsp;
                <select name="dane[<?php echo $kluczPora ?>][minuta_od]">
                    <?php foreach ($minuty as $minuta): ?>
                        <option value="<?php echo $minuta ?>"
                                <?php foreach ($odczytane_wartosci as $poraZPlytki => $wartosciZPlytki): ?>
                                    <?php if ($poraZPlytki == $kluczPora && $wartosciZPlytki[2] == $minuta): ?>
                                        selected="selected"
                                    <?php endif ?>
                                <?php endforeach ?>
                        ><?php echo $minuta ?></option>
                    <?php endforeach ?>
                </select>
             </td>
             <td>do
                <select name="dane[<?php echo $kluczPora ?>][godzina_do]">
                    <?php foreach ($godziny as $godzina): ?>
                        <option value="<?php echo $godzina ?>"
                            <?php foreach ($odczytane_wartosci as $poraZPlytki => $wartosciZPlytki): ?>
                                <?php if ($poraZPlytki == $kluczPora && $wartosciZPlytki[3] == $godzina): ?>
                                   selected="selected"
                                <?php endif ?>
                            <?php endforeach ?>
                        ><?php echo $godzina ?></option>
                    <?php endforeach ?>
                </select>&nbsp;:&nbsp;
                <select name="dane[<?php echo $kluczPora ?>][minuta_do]">
                    <?php foreach ($minuty as $minuta): ?>
                        <option value="<?php echo $minuta ?>"
                            <?php foreach ($odczytane_wartosci as $poraZPlytki => $wartosciZPlytki): ?>
                                <?php if ($poraZPlytki == $kluczPora && $wartosciZPlytki[4] == $minuta): ?>
                                    selected="selected"
                                <?php endif ?>
                            <?php endforeach ?>
                        ><?php echo $minuta ?></option>
                    <?php endforeach ?>
                </select>
             </td>
             <td>
                 <select name="dane[<?php echo $kluczPora ?>][temperatura]">
                    <?php foreach ($dostepne_temperatury as $kluczTemperatura => $temperatura): ?>
                     <option value="<?php echo $kluczTemperatura ?>"
                                <?php foreach ($odczytane_wartosci as $poraZPlytki => $wartosciZPlytki): ?>
                                    <?php if ($poraZPlytki == $kluczPora && $wartosciZPlytki[0] == $kluczTemperatura): ?>
                                        selected="selected"
                                    <?php endif ?>
                                <?php endforeach ?>
                             ><?php echo $temperatura ?></option>
                    <?php endforeach ?>
                </select>
             </td>
         </tr>
         <?php endforeach ?>
         </table>
     <input type="submit" value="Wyślij do kontrolera"/>
     </form>
    <a href="">odśwież</a>
 </body>
</html>
