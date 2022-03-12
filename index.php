<?php include'header.php'; ?>
<!-- hero area start -->
<section class="hero-area" id="home">
    <div class="container">
        <div class="hero-area-slider">

            <?php
					$sec = mysqli_query($con,"SELECT * FROM movies ORDER BY vote_average DESC LIMIT 3");
					while($info = mysqli_fetch_array($sec)){
						$genre = mysqli_query($con,"SELECT * FROM genre WHERE id='".$info['genre_id']."'");
						$getgenre = mysqli_fetch_array($genre);
					echo'
					<div class="row hero-area-slide">
						<div class="col-lg-6 col-md-5">
							<div class="hero-area-content">
								<img src="'.$info['poster_path'].'" alt="about" />
							</div>
						</div>
						<div class="col-lg-6 col-md-7">
							<div class="hero-area-content pr-50">
							<h2><a href="movie-details.php?id='.$info['id'].'">'.$info['title'].'</a></h2>
								<div class="review">
									<div class="author-review">
									';
									if($info['vote_average']>=1 && $info['vote_average']<2){
										echo'
										<i class="icofont icofont-star-shape"></i>
										';
									}
									else if($info['vote_average']>=2 && $info['vote_average']<3){
										echo'
										<i class="icofont icofont-star"></i>';
									}
									else if($info['vote_average']>=3 && $info['vote_average']<4){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star-shape"></i>';
									}else if($info['vote_average']>=4 && $info['vote_average']<5){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>';
									}else if($info['vote_average']>=5 && $info['vote_average']<6){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star-shape"></i>';
									}else if($info['vote_average']>=6 && $info['vote_average']<7){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>';
									}
									else if($info['vote_average']>=7 && $info['vote_average']<8){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star-shape"></i>';
									}
									else if($info['vote_average']>=8 && $info['vote_average']<9){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>';
									}
									else if($info['vote_average']>=9 && $info['vote_average']<10){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star-shape"></i>';
									}
									else if($info['vote_average']==10){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>';
									}
									
									echo'
									</div>
									<h4>'.$info['popularity'].' k  popularities</h4>
								</div>
								<p>'.$info['description'].'</p>
								<br>
								<h5>'.$getgenre['name'].' </h5>
								<h3>Release Date:</h3>
								<div class="slide-cast">
									
									'.$info['release_date'].'
									
									
								</div>
								<div class="slide-trailor">
									
									<a href="https://www.youtube.com/watch?v='.$info['video'].'" class="popup-youtube">
									<h3>Watch Trailer</h3>
									</a>
								</div>
								
							</div>
						</div>
					</div>
					';
					}
					?>

        </div>


        <div class="hero-area-thumb">
            <?php
					$sec = mysqli_query($con,"SELECT * FROM movies ORDER BY vote_average DESC LIMIT 2,3");
					$info = mysqli_fetch_array($sec);					
					echo'
					<div class="thumb-prev">
					<div class="row hero-area-slide">
						<div class="col-lg-6 col-md-5">
							<div class="hero-area-content">
								<img src="'.$info['poster_path'].'" alt="about" />
							</div>
						</div>
						<div class="col-lg-6 col-md-7">
							<div class="hero-area-content pr-50">
							<h2><a href="movie-details.php?id='.$info['id'].'">'.$info['title'].'</a></h2>
								<div class="review">
									<div class="author-review">
									';
									if($info['vote_average']>=1 && $info['vote_average']<2){
										echo'
										<i class="icofont icofont-star-shape"></i>
										';
									}
									else if($info['vote_average']>=2 && $info['vote_average']<3){
										echo'
										<i class="icofont icofont-star"></i>';
									}
									else if($info['vote_average']>=3 && $info['vote_average']<4){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star-shape"></i>';
									}else if($info['vote_average']>=4 && $info['vote_average']<5){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>';
									}else if($info['vote_average']>=5 && $info['vote_average']<6){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star-shape"></i>';
									}else if($info['vote_average']>=6 && $info['vote_average']<7){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>';
									}
									else if($info['vote_average']>=7 && $info['vote_average']<8){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star-shape"></i>';
									}
									else if($info['vote_average']>=8 && $info['vote_average']<9){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>';
									}
									else if($info['vote_average']>=9 && $info['vote_average']<10){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star-shape"></i>';
									}
									else if($info['vote_average']==10){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>';
									}
									
									echo'
									</div>
									<h4>'.$info['popularity'].' k  popularities</h4>
								</div>
								<p>'.$info['description'].'</p>
								<br>
								<h5>'.$getgenre['name'].' </h5>
								<h3>Release Date:</h3>
								<div class="slide-cast">
									
									'.$info['release_date'].'
									
									
								</div>
								<div class="slide-trailor">
									
									<a href="https://www.youtube.com/watch?v='.$info['video'].'" class="popup-youtube">
									<h3>Watch Trailer</h3>
									</a>
								</div>
								
							</div>
						</div>
					</div>
					</div>';
					$sec = mysqli_query($con,"SELECT * FROM movies ORDER BY vote_average DESC LIMIT 1,2");
					$info = mysqli_fetch_array($sec);
					echo'
					<div class="thumb-next">
					<div class="row hero-area-slide">
						<div class="col-lg-6 col-md-5">
							<div class="hero-area-content">
								<img src="'.$info['poster_path'].'" alt="about" />
							</div>
						</div>
						<div class="col-lg-6 col-md-7">
							<div class="hero-area-content pr-50">
								<h2><a href="movie-details.php?id='.$info['id'].'">'.$info['title'].'</a></h2>
								<div class="review">
									<div class="author-review">
									';
									if($info['vote_average']>=1 && $info['vote_average']<2){
										echo'
										<i class="icofont icofont-star-shape"></i>
										';
									}
									else if($info['vote_average']>=2 && $info['vote_average']<3){
										echo'
										<i class="icofont icofont-star"></i>';
									}
									else if($info['vote_average']>=3 && $info['vote_average']<4){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star-shape"></i>';
									}else if($info['vote_average']>=4 && $info['vote_average']<5){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>';
									}else if($info['vote_average']>=5 && $info['vote_average']<6){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star-shape"></i>';
									}else if($info['vote_average']>=6 && $info['vote_average']<7){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>';
									}
									else if($info['vote_average']>=7 && $info['vote_average']<8){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star-shape"></i>';
									}
									else if($info['vote_average']>=8 && $info['vote_average']<9){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>';
									}
									else if($info['vote_average']>=9 && $info['vote_average']<10){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star-shape"></i>';
									}
									else if($info['vote_average']==10){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>';
									}
									
									echo'
									</div>
									<h4>'.$info['popularity'].' k  popularities</h4>
								</div>
								<p>'.$info['description'].'</p>
								<br>
								<h5>'.$getgenre['name'].' </h5>
								<h3>Release Date:</h3>
								<div class="slide-cast">
									
									'.$info['release_date'].'
									
									
								</div>
								<div class="slide-trailor">
									
									<a href="https://www.youtube.com/watch?v='.$info['video'].'" class="popup-youtube">
									<h3>Watch Trailer</h3>
									</a>
								</div>
								
							</div>
						</div>
					</div>
					</div>';

					?>
        </div>




    </div>
</section><!-- hero area end -->





<!-- portfolio section start -->
<section class="portfolio-area pt-60">
    <div class="container">
        <div class="row flexbox-center">
            <div class="col-lg-6 text-center text-lg-left">
                <div class="section-title">
                    <h1><i class="icofont icofont-movie"></i> Spotlight This Year</h1>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="portfolio-menu">
                    <ul>
                        <li data-filter="*" class="active">Latest</li>
                        <li data-filter=".soon">Comming Soon</li>
                        <li data-filter=".top">Top Rated</li>
                        <li data-filter=".released">Recently Released</li>
                    </ul>
                </div>
            </div>
        </div>
        <hr />



        
                <div class="row portfolio-item">
                    <?php
							$sec = mysqli_query($con,"SELECT * FROM movies ORDER BY popularity DESC");
							
							while($info = mysqli_fetch_array($sec)){
								$genre = mysqli_query($con,"SELECT * FROM genre WHERE id='".$info['genre_id']."'");
								$getgenre = mysqli_fetch_array($genre);
                                
								$year =date('Y',strtotime($info['release_date']));
								
								if( $year>=2021 ){

								if($info['vote_average']>7){
									$top = "top";
								}else{
									$top = "";
								}
								if($info['vote_average']==0){
									$soon = "soon";
								}else{
									$soon = "";
								}
								if($info['vote_average']>0){
									$released = "released";
								}else{
									$released = "";
								}
								$status = $top.' '.$soon.' '.$released;
								
								
								echo '
								<div style="height:600px" class="col-lg-3 col-md-4 col-sm-6 '.$status.'">
									<div class="single-portfolio">
										<div class="single-portfolio-img">
											<img style="height:409px" src="'.$info['poster_path'].'" alt="portfolio" />
											<a href="https://www.youtube.com/watch?v='.$info['video'].'" class="popup-youtube">
												<i class="icofont icofont-ui-play"></i>
											</a>
										</div>
										<div class="portfolio-content">
											<h2><a href="movie-details.php?id='.$info['id'].'">'.substr($info['title'],0,40).'</a></h2>
											<div class="review">
												<div class="author-review">';
												if($info['vote_average']>=1 && $info['vote_average']<2){
													echo'
													<i class="icofont icofont-star-shape"></i>
													';
												}
												else if($info['vote_average']>=2 && $info['vote_average']<3){
													echo'
													<i class="icofont icofont-star"></i>';
												}
												else if($info['vote_average']>=3 && $info['vote_average']<4){
													echo'
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star-shape"></i>';
												}else if($info['vote_average']>=4 && $info['vote_average']<5){
													echo'
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star"></i>';
												}else if($info['vote_average']>=5 && $info['vote_average']<6){
													echo'
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star-shape"></i>';
												}else if($info['vote_average']>=6 && $info['vote_average']<7){
													echo'
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star"></i>';
												}
												else if($info['vote_average']>=7 && $info['vote_average']<8){
													echo'
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star-shape"></i>';
												}
												else if($info['vote_average']>=8 && $info['vote_average']<9){
													echo'
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star"></i>';
												}
												else if($info['vote_average']>=9 && $info['vote_average']<10){
													echo'
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star-shape"></i>';
												}
												else if($info['vote_average']==10){
													echo'
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star"></i>
													<i class="icofont icofont-star"></i>';
												}
												echo'	
												</div>
												<h4>'.$info['popularity'].'k votes</h4>
											</div>
										</div>
									</div>
								</div>
								';
							}
							}
							?>
                </div>
            



    </div>
</section><!-- portfolio section end -->



<!-- video section start -->
<section class="video ptb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title pb-20">
                    <h1><i class="icofont icofont-film"></i> Trailers & Videos</h1>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">

            <?php
					$sec_v = mysqli_query($con,"SELECT * FROM movies ORDER BY popularity DESC LIMIT 1");
					$info_v = mysqli_fetch_array($sec_v);
						echo '	
                    <div class="col-md-9">
						<div class="video-area">
							<img  style="width:825px; height:404px" src="'.$info_v['backdrop_path'].'" alt="video" />
							<a href="https://www.youtube.com/watch?v='.$info_v['video'].'" class="popup-youtube">
								<i class="icofont icofont-ui-play"></i>
							</a>
							<div class="video-text">
								<h2>'.$info_v['title'].'</h2>
								<div class="review">
									<div class="author-review">
									';
									if($info_v['vote_average']>=1 && $info_v['vote_average']<2){
										echo'
										<i class="icofont icofont-star-shape"></i>
										';
									}
									else if($info_v['vote_average']>=2 && $info_v['vote_average']<3){
										echo'
										<i class="icofont icofont-star"></i>';
									}
									else if($info_v['vote_average']>=3 && $info_v['vote_average']<4){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star-shape"></i>';
									}else if($info_v['vote_average']>=4 && $info_v['vote_average']<5){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>';
									}else if($info_v['vote_average']>=5 && $info_v['vote_average']<6){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star-shape"></i>';
									}else if($info_v['vote_average']>=6 && $info_v['vote_average']<7){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>';
									}
									else if($info_v['vote_average']>=7 && $info_v['vote_average']<8){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star-shape"></i>';
									}
									else if($info_v['vote_average']>=8 && $info_v['vote_average']<9){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>';
									}
									else if($info_v['vote_average']>=9 && $info_v['vote_average']<10){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star-shape"></i>';
									}
									else if($info_v['vote_average']==10){
										echo'
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>';
									}
									echo'	
									</div>
									<h4>'.$info_v['popularity'].' k voters</h4>
								</div>
							</div>
						</div>
                    </div>';
							?>

            <div class="col-md-3">
                <div class="row">
                    <?php
							$sec_v = mysqli_query($con,"SELECT * FROM movies ORDER BY popularity DESC LIMIT 1,2");
							while($info_v = mysqli_fetch_array($sec_v)){


							echo'
							<div class="col-md-12 col-sm-6">
								<div class="video-area">
									<img style="width:255px; height:183px" src="'.$info_v['backdrop_path'].'" alt="video" />
									<a href="https://www.youtube.com/watch?v='.$info_v['video'].'" class="popup-youtube">
										<i class="icofont icofont-ui-play"></i>
									</a>
								</div>
							</div>';

							}
							

							?>

                </div>
            </div>
        </div>
    </div>
</section><!-- video section end -->



<!-- news section start -->
<section class="news">


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title pb-20">
                    <h1><i class="icofont icofont-coffee-cup"></i> Latest News</h1>
                </div>
            </div>
        </div>
        <hr />
    </div>


    <div class="news-slide-area">
        <div class="news-slider">
			<?php
			$sec = mysqli_query($con,"SELECT * FROM movies WHERE vote_average>0 ORDER BY release_date DESC LIMIT 3");
			while($info = mysqli_fetch_array($sec)){
                $day =date('j',strtotime($info['release_date']));
				$month =date('M',strtotime($info['release_date']));
				$year =date('Y',strtotime($info['release_date']));

			echo'
			<div class="single-news">
                <div style="background: url('.$info['backdrop_path'].') no-repeat center / cover;
				height: 350px;"></div>
                <div class="news-date">
                    <h2><span>'.$month.'</span> '.$day.'</h2>
                    <h1>'.$year.' </h1>
                </div>
                <div class="news-content">
                    <h2>'.$info['title'].'</h2>
                    <p>'.substr($info['description'],0,130).'</p>
					
                </div>
                <a href="#">Read More</a>
            </div>
			';
			
			}
			?>

        </div>


    </div>
</section><!-- news section end -->
<?php include'footer.php';?>