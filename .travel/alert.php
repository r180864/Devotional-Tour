<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Alert</title>
	<script type="text/javascript">
			let ok=confirm("Please Login\n, to proceed further");
			if(ok)
			{
				document.location="/../Project/Login_Signup/login.php";
			}
			else
			{
				document.location="/../Project/.<?php echo strtolower($_SESSION['active']); ?>/";
			}
	</script>
</head>
<body>
	<?php //header("Location:/../Project/Login_Signup/login.php"); ?>
</body>

</html>