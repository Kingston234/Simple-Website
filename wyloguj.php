<script type="text/javascript">
			alert ("Poprawnie wylogowano!");
			function zmienStrone()
			{
				location.replace("http://localhost/projekt/index.php");
			}
			setTimeout("zmienStrone();", 0);
			</script>
<?php
$_SESSION["zero"]=1;;
?>