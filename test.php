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
<h1 class="h1Style"><span>OTODOM</span></h1>
<h2>Serwis Ogłoszeniowy Aplikacja Webowa</h2>
<article>
<hr>

<div class="otodomContent">
	
	<div class="otodomContentLeft">
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
echo "<tr><td>".$row['miasto']."</td><td>".$row['metraz']."</td><td>".$row['rodzaj']."</td><td>".$row['cena']."</td><td>".$row['jaki']."</td><td><img src='$row[5]' height='100px' width='100px'></td><td><form method='POST'><input type='hidden' value='$a' id='iden'><input type='button' value='Usuń to ogłoszenie' onclick='skrypt()'></form></td></tr>";
}
echo "</table>";
?>
<script>
function skrypt(){
var a=document.getElementById['iden'].value;
if (confirm("Czy na pewno chcesz usunąć?")){
	document.write("tak "+a);
}}
</script>

	</div>
	
	<div class="otodomContentRight">
		<img class="otodomTarcza" src="obrazek1.png" alt="Załóż konto!" weight="200" height="150">
	</div>
	
</div>
</article>
</div>

<?php mysqli_close($con);
include 'footer.php'; ?>
</body>
</html>