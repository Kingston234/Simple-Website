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
	
	<div class="otodomContentLeft">
	<form method="POST" class="underHeaderInputs">
		<b>Aby usunąć swoje konto proszę podać swój kod resetowania hasła:</b> <br><br><input type="number" placeholder="  Twój kod" name="kod" required /><br>
		<br>&nbsp;
		<input type="Submit" class="neonowy" value="Usuń"/>
		</form>
		
		<?php 
		error_reporting(0);
		$dostep=false;
		$dostep1=false;
		$kod=$_POST['kod'];
		$email=$_SESSION['nazwa'];
		$email=mb_strtoupper($email);
		$con=mysqli_connect("localhost","root","","otodom");
		$zap=mysqli_query($con,"SELECT email, reset FROM user");
		if (!$con){
			echo "Błąd połączenia z bazą danych. Proszę spróbować puźniej.";
		}elseif ($kod!=NULL){
			while ($x=mysqli_fetch_array($zap)){
			if ($email==$x[0]){
				if ($kod==$x[1]){
					$dostep=true;
					break;
			}
			}else{
			$dostep1=true;
			}
		}}
		if ($dostep==true){
			mysqli_query($con,"DELETE FROM ogloszenia WHERE ogloszenia.email = '$email'");
			mysqli_query($con,"DELETE FROM user WHERE user.email = '$email'");
			?><script type="text/javascript">
			alert ("Pomyślnie usunieto konto");
			function zmienStrone()
			{
				location.replace("./index.php");
			}
			setTimeout("zmienStrone();", 0);</script><?php
		}
		elseif($dostep1==true){
			?><script type="text/javascript">
			alert ("Kod resetowania został błędnie wprowadzony!!");</script><?php
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