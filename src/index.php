<?

$app_config = parse_ini_file('app.ini.php');

setlocale(LC_MONETARY, 'en_US.UTF-8');

$error = null;
$profit = 0;

if (isset($_POST['submit'])) {
	
	$revenue = $_POST['revenue'];
	$expenses = $_POST['expenses'];
	
	if (is_numeric($revenue) && is_numeric($expenses)) {
		$profit = $revenue - $expenses;
	}
	else {
		$error = "Revenue and Expenses values must be numeric";
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Title      : Clean Type
Version    : 1.0
Released   : 20100104
Description: A two-column fixed-width template suitable for small websites.

--> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Accounts - BuildMaster Demo (PHP)</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

<link href="/resources/styles/default.css" rel="stylesheet" type="text/css" />
<link href="/resources/styles/main.css" rel="stylesheet" type="text/css" />

<style type="text/css">
    input {font-size: 1em; max-width: 200px;}
    table {margin-top: 15px;}
    td { border: 1px dotted #AAA; padding: 10px; font-size: 1.3em; }
    th {color: #232F01;}
    .sideBox {border: 1px solid gray; font-size: 1.3em; color: black; margin-top:5px; padding:15px; }
    #value {background-color: #80b3d5;}
    #version {background-color: #d77d80;}
    .error { color: #A00; text-align: left; background-color: #FEE; border: 2px solid #A00; padding: 15px; text-align: center; margin: 5px 0; border-radius: 10px; }
</style>

</head>
<body>
<form action="/" method="POST" >
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="#">Accounts</a></h1>
			<h2>An Inedo Suite Demo</h2>
		</div>
		<!-- end div#logo -->
		<div id="menu">
			<ul>
				<li class="active"><a href="#">Calculator</a></li>
				<li><a href="#">Accounts</a></li>
				<li><a href="#">Contact</a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</div>
		<!-- end div#menu -->
	</div>
	<!-- end div#header -->
	<div id="page">
		<div id="page-bgtop">
			<div id="content">
				<div class="post">

                    <h2 class="title">Profit Calculator</h2> 
					
					<? if ($error != null) { ?>
                    <div class="error"> <?= $error ?> </div>
					<? } ?>
					
                    <table cellpadding="0" cellspacing="0" align="center">
                        <thead><tr><th>Line Item</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr>
                                <td>Revenue</td>
								<td><input type="text" name="revenue" value="<?= $_POST['revenue'] ?>" /></td>
                            </tr>
                            <tr>
                                <td>Expenses</td>
                                <td><input type="text" name="expenses" value="<?= $_POST['expenses'] ?>" /></td>
                            </tr>
                            <tr>
                                <td>Net Profit</td>
                                <td><?= money_format('%.2n', $profit); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <br />
					<input type="submit" name="submit" value="Display Totals" />

				</div>
				<div class="post">
					<div class="entry">
						<p><img src="/resources/images/calc.jpg" alt="" width="564" height="294" /></p>
					</div>
				</div>
			</div>
			<!-- end div#content -->
			<div id="sidebar">
				<ul>
					<li>
						<h2>Navigation</h2>
						<ul>
							<li><a href="#">Profit Calculator</a></li>
				            <li><a href="#">Accounts Listing</a></li>
				            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
				            <li><a href="#">Help</a></li>
						</ul>
					</li>					
				</ul>
                <div id="value" class="sideBox">
                Configuration value: <br /><strong> <?= $app_config["config_value"] ?> </strong>
                </div>
                <div id="version" class="sideBox">
                Version: <br /><strong><?= $app_config["version"] ?></strong>
                </div>
			</div>
			<!-- end div#sidebar -->
			<div style="clear: both; height: 1px"></div>
		</div>
	</div>
	<!-- end div#page -->
    <div id="footer">
		<p id="legal">Copyright &copy; 2007 Clean Type. All Rights Reserved. Designed by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
		<p id="links"><a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p>
	</div>
	<!-- end div#footer -->
</div>
<!-- end div#wrapper -->
	
</form>
</body>
</html>