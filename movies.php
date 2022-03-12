<?php include'header.php' ?>
		<!-- breadcrumb area start -->
		<section class="breadcrumb-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumb-area-content">
							<h1>Movies Page</h1>
						</div>
					</div>
				</div>
			</div>
		</section><!-- breadcrumb area end -->
		<!-- portfolio section start -->
		<section class="portfolio-area pt-60">
			<div class="container">
				<div class="row flexbox-center">
					<div class="col-lg-6 text-center text-lg-left">
					    <div class="section-title">
							<h1><i class="icofont icofont-movie"></i>All Movies</h1>
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
					
							$sec = mysqli_query($con,"SELECT * FROM movies ".$search." ORDER BY popularity DESC");
							
							while($info = mysqli_fetch_array($sec)){
								
								$genre = mysqli_query($con,"SELECT * FROM genre WHERE id='".$info['genre_id']."'");
								$getgenre = mysqli_fetch_array($genre);
                                
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
										<h2><a href="movie-details.php?id='.$info['id'].'">'.substr($info['title'],0,45).'</a></h2>
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
                    <div class="col-md-12">
						<div class="video-slider mt-20">
						    
						     <?php
							$sec_v = mysqli_query($con,"SELECT * FROM movies ORDER BY popularity DESC LIMIT 8");
							while($info_v = mysqli_fetch_array($sec_v)){


							echo'
								<div class="video-area">
									<img style="width:255px; height:183px" src="'.$info_v['backdrop_path'].'" alt="video" />
									<a href="https://www.youtube.com/watch?v='.$info_v['video'].'" class="popup-youtube">
										<i class="icofont icofont-ui-play"></i>
									</a>
								</div>
							';

							}
							

							?>
						</div>
                    </div>
				</div>
			</div>
		</section><!-- video section end -->
		<?php include'footer.php'?>