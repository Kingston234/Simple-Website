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
	<form method="POST" class="tekst">
		Login: <br><input type="email" placeholder="  Twój email" name="email" required />
		<br>
		<br> Hasło: <br><input type="password" minlength="8" maxlength="16" placeholder="  Twoje hasło" name="password" required />
		<br>
		<br>Imię: <br><input type="text" placeholder="  Twoje imię" name="imie" required />
		<br>
		<br>Nazwisko: <br><input type="text" placeholder="  Twoje nazwisko" name="nazwisko" required />
		<br>
		<br>Telefon: <br><input type="tel" placeholder="  Twój telefon" name="tel" minlength="9" maxlength="9" required />
		<br><br>&nbsp;
		<input type="Submit" class="neonowy" value="Rejestruj"/>
		</form>
		<br>
		<p class="tekst">Masz już założone konto?</p>
		<p class="tekst">
			<a href="index.php">Zaloguj Się</a>
		</p>
		<?php 
		error_reporting(0);
		$pom=0;
		$email=$_POST['email'];
		$imie=$_POST['imie'];
		$nazwisko=$_POST['nazwisko'];
		$tel=$_POST['tel'];
		$haslo=$_POST['password'];
		$con=mysqli_connect("localhost","root","","otodom");
		$zap=mysqli_query($con,"SELECT email FROM user");
		if (!$con){
			echo "Błąd połączeniaz bazą danych. Proszę spróbować puźniej.";
		}else{
			while ($x=mysqli_fetch_array($zap)){
			if (mb_strtoupper($email)==$x[0]){
				$pom=1;
			}
			}
			if ($pom==0&&isset($email)&&$email!=Null){
				$email=mb_strtoupper($email);
				$imie=mb_strtoupper($imie);
				$nazwisko=mb_strtoupper($nazwisko);?>
				<script type="text/javascript">
				var zmienna= <?php $rand=rand(1000,9999); echo $rand; ?>;
				alert ("Zarejestrowano urzytkownika poprawnie ponizej zanjdziesz kod do resetowania hasła  \n "+zmienna);
				</script>
				<?php
				mysqli_query($con,"INSERT INTO user(email, imie, nazwisko, tel, haslo, reset) VALUES('$email', '$imie', '$nazwisko', '$tel', '$haslo','$rand')");?>
				<script type="text/javascript">
				function zmienStrone()
			{
				location.replace("http://localhost/projekt/index.php");
			}
			setTimeout("zmienStrone();", 0);</script>
				<?php
			}elseif($pom==1) {
				?><script type="text/javascript">
				alert ("podany login już istnieje w naszej bazie danych proszę się zalogować");</script><?php
			}
			$pom=0;
		}
		mysqli_close($con);
		?>
	</div>
</div>
</article>
</div>

<?php include 'footer.php'; ?>
</body>
</html>