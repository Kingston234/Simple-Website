<?php session_start(); ?>
<html lang="pl">
<head>
<?php include 'glowa.php'; ?>
</head>

<body>
<?php 
error_reporting(0);
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
	
	<div class="otodomContentRight">
	<?php
	$email=$_SESSION['nazwa'];
$con=mysqli_connect('localhost','root','','otodom');
$zap=mysqli_query($con, "select miasto, metraz, rodzaj, cena, jaki, link, id from ogloszenia WHERE email ='$email'");
$z=0;
echo "<table>";
echo "<tr><th>MIASTO</th><th>METRAŻ</th><th>RODZAJ BUDYNKU</th><th>CENA</th><th>RODZAJ TRANZAKCJI</th><th>ZDJĘCIE</th></tr>";
while($row=mysqli_fetch_array($zap))
{
	$a=$row['id'];
	echo "<tr><td>".$row['miasto']."</td><td>".$row['metraz']."</td><td>".$row['rodzaj']."</td><td>".$row['cena']."</td><td>".$row['jaki']."</td><td><img src='$row[5]' height='100px' width='100px'></td><td><form method='POST'><input type='hidden' value='$a' name='iden'><input type='submit' class='neonowy' value='Usuń to ogłoszenie'></form></td></tr>";
}
echo "</table>";
?>
<?php
error_reporting(0);
$ide=$_POST['iden'];
if ($ide!=NULL){
	mysqli_query($con,"DELETE FROM ogloszenia WHERE ogloszenia.id = $ide");
	?><script type="text/javascript">
	alert("Pomyślnie usunięto");
	function zmienStrone()
			{
				location.replace("http://localhost/projekt/twoje.php");
			}
			setTimeout("zmienStrone();", 0);
</script><?php
}
?>

	</div>
	
</div>
</article>
</div>

<?php mysqli_close($con);
include 'footer.php'; ?>
</body>
</html>