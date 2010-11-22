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
       if (isset($_POST["haslo"])) {
           $plik = file(dirname(__FILE__) . "/pass.txt");
           $plik = array_map("trim", $plik);

           $haslo_admin = $plik[0];
           $md5_haslo = md5($_POST['haslo']);



           $haslo_user = 'nic';
           if (($_POST['poziom'] == 'Administrator') &&  ($md5_haslo == $haslo_admin)){
               setcookie("zalogowany", "admin");
                    header('Location: http://localhost/~piotr/sterownik_cwu/admin.php');
           } elseif (($_POST['poziom'] == 'Użytkownik') &&  ($_POST['haslo'] == $haslo_user)){
                setcookie("zalogowany", "user");
                header('Location: http://localhost/~piotr/sterownik_cwu/user.php');
           } else {
               if(!empty($_POST['haslo']))
               echo 'błędne hasło<br>proszę spróbować jeszcze raz';
           }
       }
?>

       </center>
    </body>
</html>
