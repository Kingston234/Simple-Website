<?php include 'sesion.php';
$_SESSION["zero"]=0;
$_SESSION["email"]=0;
$_SESSION["haslo"]=0;
$_SESSION["nazwa"]=0;
?>
<?php
if (!isset($_COOKIE["ciastko"])) {
setcookie("ciastko", "ciastko1", time() + 3600);
?>
<script type="text/javascript">
var c=alert("Ta strona używa ciasteczek. Wchodząc na nią akceptujesz jej regulamin");
</script><?php
}
?>
<html lang="pl">
<head>
<?php include 'glowa.php'; ?>
</head>

<body>
<?php include 'header.php'; ?>

<div id="contentMain" class="contentMain">
<h1 class="glitch">
<span aria-hidden="true">OTODOM</span>
OTODOM
<span aria-hidden="true">OTODOM</span></h1>
<h2 class="glitchh2" style="padding-left:30%">
<span aria-hidden="true">Serwis Ogłoszeniowy Aplikacja Internetowa</span>
Serwis Ogłoszeniowy Aplikacja Webowa
<span aria-hidden="true">Serwis Ogłoszeniowy Aplikacja Webowa</span></h2>

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
	<form method="POST" class="tekst">
		Login: <br><input type="email" placeholder="  Twój email" name="email" required />
		<br>
		<br> Hasło: <br><input type="password" minlength="8" maxlength="16" placeholder="  Twoje hasło" name="password" required />
		<br>&nbsp<br>
		<input type="Submit" class="neonowy" value="Zaloguj"/>&emsp; 
		<a href="forgot.php">Zapomniałeś hasła?</a></form>
		<?php 
		error_reporting(0);
		$dostep=false;
		$dostep1=false;
		$email=$_POST['email'];
		$haslo=$_POST['password'];
		$con=mysqli_connect("localhost","root","","otodom");
		$zap=mysqli_query($con,"SELECT email, haslo FROM user");
		if (!$con){
			echo "Błąd połączeniaz bazą danych. Proszę spróbować puźniej.";
		}elseif (isset($email)){
			while ($x=mysqli_fetch_array($zap)){
			if (mb_strtoupper($email)==$x[0]){
				if ($haslo==$x[1]){
					$dostep=true;
			}
			}
			$dostep1=true;
		}
		if ($dostep==true){
			echo "hasło i login są poprawne";
			$_SESSION["email"]=1;
			$_SESSION["haslo"]=1;
			$_SESSION["nazwa"]=$email;
			?>
			<script type="text/javascript">
			alert ("Poprawnie zalogowano!");
			function zmienStrone()
			{
				location.replace("http://localhost/projekt/ogloszenia.php");
			}
			setTimeout("zmienStrone();", 0);
			</script><?php
		}
		elseif($dostep1==true){?><script type="text/javascript">
			alert ("Hasło lub login są błędne");</script><?php
		}}
		mysqli_close($con);
		?>
</div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>