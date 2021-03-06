<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>PLAY | Master Raters</title>
		<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="../styles/normalize.css" />
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300i,400,400i,700,700i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Exo:100,200,300,400" rel="stylesheet">
		<link rel="stylesheet" href="../styles/style.css" />
		<link rel="stylesheet" href="../styles/playBox.css" />
		<link rel="stylesheet" href="../styles/responsive.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="../js/jquery-3.3.1.js"></script>
	  <script src="../js/jquery.autocomplete.min.js"></script>
		<link rel="stylesheet" href="../styles/ac_styles.css" />
	</head>
	<body>
		<header>
			<div id="logo">
				<a href="https://www.masterraters.com/pages/play.php">
					<img src="../img/tp_logo.png" id="imgLogo">
					<h4 class="logo">so you think you know movies?</h4>
				</a>
			</div>
			<div id="spacer">
				<a href="https://www.themoviedb.org/" target="_blank">
					<img src="https://www.themoviedb.org/assets/1/v4/logos/primary-green-d70eebe18a5eb5b166d5c1ef0796715b8d1a2cbc698f96d311d62f894ae87085.svg" />
				</a>
			</div>
			<nav>
				<ul>
					<li><a href="play.php" <?php if ($thisPage=="play") echo " class=\"currentPage\""; ?>>Play Game</a></li>
					<li><a href="how.php" <?php if ($thisPage=="how") echo " class=\"currentPage\""; ?>>How to Play</a></li>
					<li><a href="login.php" <?php if ($thisPage=="login") echo " class=\"currentPage\""; ?>>Login</a></li>
				</ul>
			</nav>
		</header>
