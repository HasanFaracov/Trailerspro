<?php
session_start();
$con = mysqli_connect('localhost','Username','password','databasename');
$tarix = date('Y-m-d H:i:s');

if(isset($_GET['id']))
{
    $id = (int)$_GET['id'];
    $sec = mysqli_query($con,"SELECT * FROM movies WHERE id='".$id."'");
    $post = mysqli_fetch_array($sec);
}
?>

<!DOCTYPE HTML>
<html lang="zxx">
<?php
function basliq()
{
$sehife=end(explode('/',$_SERVER['PHP_SELF']));
if($sehife=="index.php"){
    echo 'Trailerspro';    
}elseif($sehife=="movies.php"){
    echo 'Movies';    
}elseif($sehife=="top-movies.php"){
    echo 'Top Movies';    
}elseif($sehife=="genres.php"){
    echo 'Genres';    
}
elseif($sehife=="movie-details.html"){
	echo 'Movie Details';    
	}
}

?>
<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">


		

        <meta property="og:url" content="https://trailerspro.tk/"/>
        <meta property="og:title" content='Trailers & Videos - Trailerspro.tk'/>
        <meta property="og:description" content='Latest Trailers and Movies'/>
        <meta property="og:site_name" content="Trailerspro"/>
        <meta property="og:type" content="article"/>
		<meta property="og:image" content="assets/img/favicon.png">
		<meta property="og:image:secure_url" content="assets/img/favicon.png">
		<meta property="og:image:width" content="250">
		<meta property="og:image:height" content="370">
		<meta property="og:image:alt" content="Watch Trailers">
		<meta property="og:image:type" content="image/png">

		


		<title><?php if(isset($id)){echo $post['title'];}else{basliq();} ?></title>
		<!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="assets/img/favicon.png" />
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all" />
		<!-- Slick nav CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/slicknav.min.css" media="all" />
		<!-- Iconfont CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/icofont.css" media="all" />
		<!-- Owl carousel CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
		<!-- Popup CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
		<!-- Main style CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />
		<!-- Responsive CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="all" />
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<!-- Page loader -->
	    <div id="preloader"></div>
		<!-- header section start -->
		<header class="header">
			<div class="container">
				<div class="header-area">
					<div class="logo">
						<a href="index.php"><img src="assets/img/logo.png" alt="logo" /></a>
					</div>
					<div class="header-right">
						<form action="movies.php" method="POST">
							
							<select>
								<option>Search</option>
								<!--<option value="Movies">TV</option>-->
							</select>
							<input type="text" name="query" autocomplete="off">
							<button type="submit" name="search"><i class="icofont icofont-search"></i></button>
						</form>
						<?php
						if(isset($_POST['search'])){
						
							$query = trim($_POST['query']);
							$query = strip_tags($query);
							$query = htmlspecialchars($query);
							$query = mysqli_real_escape_string($con,$query);
							
							if(!empty($query)){
							$search = " WHERE title LIKE '%".$query."%' ";
							}
						}
						?>
					</div>
					<div class="menu-area">
						<div class="responsive-menu"></div>
					    <div class="mainmenu">
                            <ul id="primary-menu">
								<?php
                                function aktiv($link){
                                $sehife=end(explode('/',$_SERVER['PHP_SELF']));
                                if($sehife==$link){
                                echo 'class="active"';    
                                }else{
                                echo '';    
                                }
                                }
                                ?>
                                <li><a  <?php aktiv('index.php') ?> href="index.php">Home</a></li>
                                <li><a  <?php aktiv('movies.php') ?>  href="movies.php">Movies</a></li>
                                <li><a  <?php aktiv('top-movies.php') ?>  href="top-movies.php">Top Movies</a></li>
                                <li><a  <?php aktiv('genres.php') ?>  href="genres.php">Genres</a></li>
                            </ul>
					    </div>
					</div>
				</div>
			</div>
		</header>
		<!-- header section end -->