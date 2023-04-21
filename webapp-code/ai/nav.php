<?php
session_start();
if(isset($_SESSION['username']))
	{$uid = $_SESSION['uid'];
	$ses = $_SESSION['sessionid'];}
?>
<!-- navbar -->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Fine Tuning</title>
	<link rel="stylesheet" href="./css/style.css" />
	<link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>
	  
</head>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="./">AI Chatbot | finetuning</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="chatbot/">Global Models</a>
				</li>
			</ul>
			<?php
			if(isset($_SESSION['username'])){
				?>
			<li style="list-style-type: none;" class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					Welcome <?php echo $_SESSION['username'] ?>
				</a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="./profile.php">Profile</a></li>
					<li><a class="dropdown-item" href="./db/logout.php">Logout</a></li>
				</ul>
			</li> 
			<?php }else{
			echo 
			'<button class="btn btn-outline-warning m-1" type="submit" data-bs-toggle="modal" data-bs-target="#signup">
				Sign Up
			</button>
			<button class="btn btn-success m-1" type="submit" data-bs-toggle="modal" data-bs-target="#login">
				Login
			</button>';
			} ?>
			</div>
		</div>
		</nav>