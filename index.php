<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
       <center>
       <p><font size="5"><br><br><br>Witamy w systemie sterowania ciepłą woda użytkową <br>
              <strong>"Inteligenty bojler"</strong></font><br><br></p>

     
       <form action="http://localhost/~piotr/sterownik_cwu/index.php" method="POST">
       <table border="0"  width="60%">
  <tr>
    <td colspan="2"><center> <img src="schemat_cwu.jpg" width="25%" hight="25%"/><br><br></center></td>
</tr>
<tr>
<td align="right" width="50%">Proszę wybrać poziom dostępu do sterownika: </td>
<td width="50%"><select name="poziom" size="1">
<option>Użytkownik</option>
<option>Administrator</option></select></td>
</tr>
<tr><td align="right"> Proszę podać hasło: </td> <td><input type="password" name="haslo"> </td>
</tr>
<tr><td align="center" colspan="2"><input type="submit" value="Zaloguj"> </tr>

       </table>
       </form>

       <?php
       if (isset($_POST["haslo"])) {   //sprawdzenie czy zmianna hasło przeslana formularzem nie jest pusta
           $plik = file(dirname(__FILE__) . "/pass.txt");   //otwarcie pliku z hasłem
           $plik = array_map("trim", $plik);    //zwraca tablice przypisujac linie tekstu pod kolejne wiersze tablicy

           $haslo_admin = $plik[0];     //podstalnie pod zmienną pierwszej lini z pliku w którym jest zawarte hasło dla
                                        //dla panelu administracyjnego zaszyfrowane funkcją md5
           $haslo_user = $plik[1];  //hasło z pliku dla panelu użytkownika
           $md5_haslo = md5($_POST['haslo']);   //zmienna pomocnicza pod którą umieszczamy zaszyfrowane hasło przesłane
                                                //z formularza


           if (($_POST['poziom'] == 'Administrator') &&  ($md5_haslo == $haslo_admin)){
               setcookie("zalogowany", "admin");    //sprawdzanie hasła dla administratora
                    header('Location: admin.php');    //przekierowanie strony do admin.php
           } elseif (($_POST['poziom'] == 'Użytkownik') &&  ($md5_haslo == $haslo_user)){  //sprawdzanie hasła dla użytkowanika
                setcookie("zalogowany", "user");    //ustawienie ciasteczek
                header('Location: http://localhost/~piotr/sterownik_cwu/user.php'); //przekierowanie do strony uzytkownika
           } else {
               if(!empty($_POST['haslo']))
               echo 'błędne hasło<br>proszę spróbować jeszcze raz';
               else echo 'proszę podać hasło';
           }
       }
?>

       </center>
    </body>
</html>
