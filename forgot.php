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
<span aria-hidden="true">Serwis Ogłoszeniowy Aplikacja Webowa</span>
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
		<b>Login:</b> <br><input type="email" placeholder="  Twój email" name="email" required />
		<br>
		<br><b>Kod do resetowania hasła:</b> <br><input type="number" placeholder="  Twój kod" name="kod" required />
		<br>
		<br> <b>Nowe hasło:</b> <br><input type="password" minlength="8" maxlength="16" placeholder="  Twoje nowe hasło" name="password" required />
		<br>&nbsp;<br>
		<input type="Submit" class="neonowy" value="Zaloguj"/>
		</form>
		<?php 
		error_reporting(0);
		$dostep=false;
		$dostep1=false;
		$kod=$_POST['kod'];
		$email=$_POST['email'];
		$haslo=$_POST['password'];
		$con=mysqli_connect("localhost","root","","otodom");
		$zap=mysqli_query($con,"SELECT email, reset FROM user");
		if (!$con){
			echo "Błąd połączeniaz bazą danych. Proszę spróbować puźniej.";
		}elseif (isset($email)){
			while ($x=mysqli_fetch_array($zap)){
			if (mb_strtoupper($email)==$x[0]){
				if ($kod==$x[1]){
					$dostep=true;
			}
			}
			$dostep1=true;
		}
		if ($dostep==true){
			mysqli_query($con,"UPDATE user SET haslo = '$haslo' WHERE user.email = '$email'");
			?><script type="text/javascript">
			alert ("Hasło zostało pomyślnie zresetowane!!");
			function zmienStrone()
			{
				location.replace("./index.php");
			}
			setTimeout("zmienStrone();", 0);</script><?php
		}
		elseif($dostep1==true){
			?><script type="text/javascript">
			alert ("Login lub kod resetowania zostało błędnie wprowadzone!!");</script><?php
		}}
		mysqli_close($con);
		?>
</div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>