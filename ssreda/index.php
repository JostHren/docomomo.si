<?php
   include "header.php";
?>



<h1>TESTNO POLJE</h1>

<?php
   // povežemo se na podatkovno bazo
   $db = mysqli_connect("localhost", "jost_ssreda", "kenny985", "jost_ssreda");

   // izberemo željene izdelke
   $rezultat = mysqli_query($db, "SELECT ime, cena FROM izdelki WHERE cena > 100;");
   while ($vrstica = mysqli_fetch_assoc($rezultat)) {
      // izpišemo podatke o posameznem izdelku ter preidemo v novo vrstico
      echo "{$vrstica['ime']} stane {$vrstica['cena']} evrov.<br />";
   }




   // posodobimo ceno izdelka (monitor) na 329.99 evrov
   $ime_izdelka = "Monitor";
   $ime_izdelka = mysqli_real_escape_string($db, $ime_izdelka);
   mysqli_query($db, "UPDATE izdelki SET cena = 389.99 WHERE ime = '{$ime_izdelka}';");
   echo "Posodobili smo ceno izdelka: {$ime_izdelka}<br />";

   // izpišemo število izdelkov, ki jih imamo trenutno v tabeli
   $rezultat = mysqli_query($db, "SELECT * FROM izdelki;");
   $stevilo_izdelkov = mysqli_num_rows($rezultat);
   echo "Število izdelkov, ki so nam na voljo: {$stevilo_izdelkov}<br />";

   // ugotovimo in izpišemo zaokroženo povprečno ceno izdelka
   $rezultat = mysqli_query($db, "SELECT ROUND(AVG(cena)) AS povprecna_cena FROM izdelki;");
   $vrstica = mysqli_fetch_assoc($rezultat);
   echo "Povprečna cena izdelka znaša {$vrstica['povprecna_cena']} evrov.<br />";
?>


<?php
   include "footer.php";
?>
