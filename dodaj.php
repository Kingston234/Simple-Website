<?php session_start(); ?>
<html lang="pl">
<head>
<?php include 'glowa.php'; ?>
</head>

<body>
<?php 
if(($_SESSION["email"]==1)&&($_SESSION["haslo"]==1)){
include 'headerlogin.php'; 
}
else{
	include 'header.php'; 
}
?>

<div id="contentMain" class="contentMain">
<h1 class="glitch">
<span aria-hidden="true">OTODOM</span>
OTODOM
<span aria-hidden="true">OTODOM</span></h1>
<h2 class="glitchh2" style="padding-left:30%">
<span aria-hidden="true">Serwis Ogłoszeniowy Aplikacja Webowa</span>
Serwis Ogłoszeniowy Aplikacja Webowa
<span aria-hidden="true">Serwis Ogłoszeniowy Aplikacja Webowa</span></h2>
<article>
<div class="card"><div class="card-content">
<h2 class="card-title">Szukasz mieszkania?</h2>
<p class="card-body"> Znajdziesz u nas najlepsze ceny mieszkań</p>
<a href="ogloszenia.php" target="_blank" class="button">Czytaj więcej</a>
</div></div>
		<div class="cardr"><div class="cardr-content">
<h2 class="cardr-title">Potrzebujesz pożyczki?</h2>
<p class="cardr-body"> Wejdź już dziś i nie martw się o pieniądze</p>
<a href="https://www.vivus.pl/61?gclid=CjwKCAiAwKyNBhBfEiwA_mrUMpCI1TrKKpotzNSbM9rXdqynryPvOEl7TwcOexbdCHLUKoQ1iRyFVBoC_ocQAvD_BwE&gclsrc=aw.ds" target="_blank" class="buttonr">Czytaj więcej</a>
</div></div>
<div class="otodomContent">

	<div class="otodomContentLeft">
		<h3>Tutaj możesz dodać swoje ogłoszenie:</h3>
	<form enctype="multipart/form-data" method="POST" class="tekst">
		<b>Miasto:</b> <br><input type="text" name="miasto" required />
		<br>
		<br> <b>Metraż:</b> <br><input type="number" name="metraz" min="1" max="99999999999999" required />
		<br>
		<br> <b>Rodzaj nieruchomości:</b> <br><select name="rodzaj">
		<option>Mieszkanie</option>
		<option>Dom</option></select>
		<br>
		<br> <b>Cena:</b> <br><input type="number" name="cena" min="1" max="99999999999999" required />
		<br>
		<br> <b>Rodzaj sprzedaży:</b> <br><select name="jaki">
		<option>Wynajem</option>
		<option>Sprzedarz</option>
		<option>Kupno</option></select><br><br>
		<label><b>Zdjęcia</b></label>
		<input type="file" name="obraz">
		<br>&nbsp;<br>
		<input type="Submit" class="neonowy" value="Dodaj"/>
		</form>
	<?php
	$z=0;
	error_reporting(0);
$miasto=$_POST['miasto'];
$metraz=$_POST['metraz'];
$rodzaj=$_POST['rodzaj'];
$cena=$_POST['cena'];
$jaki=$_POST['jaki'];
$email=$_SESSION['nazwa'];
$email=mb_strtoupper($email);
for ($i = 0;$i<99999;$i++){
	if(isset($_FILES["obraz"]["type"])){
      $sourcePath = $_FILES['obraz']['tmp_name'];
	  $targetPath = "./zd/".$i.".png";
	  if (!file_exists($targetPath)){
      move_uploaded_file($sourcePath,$targetPath);
	  break;
	  
	  }
	}}
if(($miasto!=NULL)&&($metraz!=NULL)&&($rodzaj!=NULL)&&($cena!=NULL)&&($jaki!=NULL)){
$a=mysqli_connect('localhost','root','','otodom');
$b=mysqli_query($a, "INSERT INTO ogloszenia(miasto, metraz, rodzaj, email, cena, jaki, link) VALUES ('$miasto','$metraz','$rodzaj','$email','$cena','$jaki','$targetPath')");
$z=1;
	}
mysqli_close($a);
if($z==1){?>
<script type="text/javascript">
			alert ("Dodano ogłoszenie!");
			function zmienStrone()
			{
				location.replace("./ogloszenia.php");
			}
			setTimeout("zmienStrone();", 0);
</script><?php
}
?>
	</div>
	<div class="otodomContentRight">
		<img class="otodomTarcza" src="obrazek1.png" alt="Załóż konto!" weight="200" height="150">
	</div>
	
</div>
</article>
</div>

<?php include 'footer.php'; ?>

</body>
</html>