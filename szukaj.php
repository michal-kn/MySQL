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

    <form method="post" action="szukaj.php">

      <h2>
        Wyszukaj osobę w bazie danych:
      </h2>

      <p>
        Płeć: <input type="radio" name="plec" value="k" checked /> Kobieta
        <input type="radio" name="plec" value="m" /> Mężczyzna <br /><br />
      </p>

      <p>
        Wiek:
        <select name="wiek">
          <option value="20">18-20</option>
          <option value="30">20-30</option>
          <option value="40">30-40</option>
          <option value="50">40-50</option>
          <option value="60">50+</option>
        </select>
      </p>

      <p>
        Województwo:
        <select name="woj">
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

      <p>
        <input type="submit" value="Szukaj!" />
        <input type="hidden" name="submitted" value="TRUE" />
      </p>

    </form>

  </body>
</html>

<?php
if(isset($_POST['submitted'])){

  $plec=$_POST['plec'];
  $wiek=$_POST['wiek'];
  $woj=$_POST['woj'];

  require_once("polaczenie.php");

  if($plec && $wiek && $woj) {
    
    $ile = $wiek - 10;
    
    if(mysqli_connect_errno()) {

      echo "blad polaczenia z baza";
      exit;
      
    }else {

      $sql = "SELECT * FROM osoby WHERE plec like '$plec' AND wojewodztwo like '$woj' AND wiek BETWEEN $ile AND $wiek";
      $result = $polaczenie->query($sql);
    
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo $row["imie"]. " ".$row["nazwisko"]." ~ ".$row["wiek"]." lat, tel. ".$row["telefon"]."<br>";
        }
      }else {
        echo "Brak wyników";
      }
    }
  }

  mysqli_close($polaczenie);

}else echo"Podaj kryteria!";
?>