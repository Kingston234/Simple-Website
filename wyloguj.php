<script type="text/javascript">
			alert ("Poprawnie wylogowano!");
			function zmienStrone()
			{
				location.replace("./index.php");
			}
			setTimeout("zmienStrone();", 0);
			</script>
<?php
$_SESSION["zero"]=1;;
?>