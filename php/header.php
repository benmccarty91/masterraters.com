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
					<img src="https://www.themoviedb.org/static_cache/v4/logos/408x161-powered-by-rectangle-blue-10d3d41d2a0af9ebcb85f7fb62ffb6671c15ae8ea9bc82a2c6941f223143409e.png" />
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
