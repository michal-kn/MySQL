<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <meta name="author" content="Michał Knapczyk" />
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Połączenie z bazą SQL</title>
  </head>
  <body>

    <div class="navbar">
      <ul>
        <i>
          <li><a href="szukaj.php">Szukaj</a></li>
          <li><a class="active" href="modyfikacja.php">Modyfikacja</a></li>
        </i>
      </ul>
    </div>

    <div class="main">

        <h2>Dodaj nową osobę do bazy danych:</h2>
      

      <form method="post" action="modyfikacja.php">

        <p>
            Imię: <input type="text" name="imie" />
        </p>
        
        <p>
            Nazwisko: <input type="text" name="nazwisko" />
        </p>

        <p>
            Płeć:   <input type="radio" name="plec" value="k" checked /> Kobieta
                    <input type="radio" name="plec" value="m" /> Mężczyzna
        </p>

        <p>
            Wiek: <input type="text" name="wiek" />
        </p>

        <p>
            Telefon: <input type="text" name="tel" />
        </p>

        <p>
            Województwo:
            <select name="woje">
                <option value="Dolnoslaskie">Dolnośląskie</option>
                <option value="Kujawsko-pomorskie">Kujawsko-pomorskie</option>
                <option value="Lubelskie">Lubelskie</option>
                <option value="Lubuskie">Lubuskie</option>
                <option value="Lodzkie">Łódzkie</option>
                <option value="Malopolskie">Małopolskie</option>
                <option value="Mazowieckie">Mazowieckie</option>
                <option value="Opolskie">Opolskie</option>
                <option value="Podkarpackie">Podkarpackie</option>
                <option value="Podlaskie">Podlaskie</option>
                <option value="Pomorskie">Pomorskie</option>
                <option value="Slaskie">Śląskie</option>
                <option value="Swietokrzyskie">Świętokrzyskie</option>
                <option value="Warminsko-mazurskie">Warmińsko-mazurskie</option>
                <option value="Wielkopolskie">Wielkopolskie</option>
                <option value="Zachodniopomorskie">Zachodniopomorskie</option> 
            </select>
        </p>
        
        <input type="reset" value="Wyczyść" />
        <input type="submit" value="Dodaj" />
        <input type="hidden" name="submitted" value="TRUE" />

      </form>

    </div>
  </body>
</html>

<?php

if(isset($_POST['submitted'])){

    $imie=$_POST['imie'];
    $nazwisko=$_POST['nazwisko'];
    $plec=$_POST['plec'];
    $wiek=$_POST['wiek'];
    $woj=$_POST['woje'];
    $tel=$_POST['tel'];

    require_once("polaczenie.php");

    if($imie && $nazwisko && $plec && $wiek && $woj && $tel){
        
        if(mysqli_connect_errno()){
            echo "blad polaczenia z baza";
            exit;
        }else{
        
                $zapytanie = "insert into osoby values ('$imie','$nazwisko','$plec','$wiek','$woj','$tel')";
                $wynik = mysqli_query($polaczenie,$zapytanie);
            
            if($wynik){
                echo mysqli_affected_rows($polaczenie)." Osoba dodana do bazy!";
            }else{
                echo "Wystapil blad";
                }
        } 
    }else echo"Podaj wszystkie poprawne dane!";

    mysqli_close($polaczenie);

}else echo"Podaj wszystkie poprawne dane!";
?>