<?php include'header.php'; ?>
		<!-- breadcrumb area start -->
		<section class="breadcrumb-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumb-area-content">
							<h1>Movie Detalied Page</h1>
						</div>
					</div>
				</div>
			</div>
		</section><!-- breadcrumb area end -->
        <?php
                                if (isset($_POST['paylas'])) {
                                    $ad = trim($_POST['ad']);
                                    $ad = strip_tags($ad);
                                    $ad = htmlspecialchars($ad);
                                    $ad = mysqli_real_escape_string($con,$ad);

                                    $email = trim($_POST['email']);
                                    $email = strip_tags($email);
                                    $email = htmlspecialchars($email);
                                    $email = mysqli_real_escape_string($con,$email);

                                    $metn = trim($_POST['metn']);
                                    $metn = strip_tags($metn);
                                    $metn = htmlspecialchars($metn);
                                    $metn = mysqli_real_escape_string($con,$metn);




                                    if($_SESSION['token']==$_POST['token']){
                                    if ($ad<>""  && $email<>"" && $metn<>""){
                                    $daxilet = mysqli_query($con,"INSERT INTO comments(tmdb_id,ad,email,metn,tarix)
                                    VALUES('".$post['tmdb_id']."','".$ad."','".$email."','".$metn."','".$tarix."')");   
                                    }
                                    }
                                }





                                $comment = mysqli_query($con,"SELECT * FROM comments WHERE tmdb_id='".$post['tmdb_id']."'");
                                $commentsay = mysqli_num_rows($comment);
            
            ?>



		<!-- transformers area start -->
		<section class="transformers-area">
			<div class="container">
				<div class="transformers-box">
					<div class="row flexbox-center">
						<div class="col-lg-5 text-lg-left text-center">
							<div class="transformers-content">
								<img src="<?=$post['poster_path']?>" alt="<?=$post['title']?>" />
							</div>
						</div>
						<div class="col-lg-7">
							<div class="transformers-content">
								<h2><?=$post['title']?></h2>
                                <?php
                                $genre = mysqli_query($con,"SELECT * FROM genre WHERE id='".$post['genre_id']."'");
								$getgenre = mysqli_fetch_array($genre);                                                                  
                                ?>
								<p><?=$getgenre['name']?></p>
								<ul>
									<li>
										<div class="transformers-left">
											Movie:
										</div>
										<div class="transformers-right">
                                        <?=$getgenre['name']?>
										</div>
									</li>
                                    <?php
                                    $crew = mysqli_query($con,"SELECT * FROM crew WHERE (tmdb_id='".$post['tmdb_id']."') AND (job='Writer') ");
                                    $say = mysqli_num_rows($crew);
                                    if ($say==0) {
                                       
                                    }else{
                                    echo '
									<li>
										<div class="transformers-left">
											Writer:
										</div>
										<div class="transformers-right">';
                                            
                                            
                                            $i=0;
                                            while($getcrew = mysqli_fetch_array($crew)){
                                                $i++;
                                                if($say>1 ){
                                                    if($i==$say){
                                                        echo $getcrew['name_crew'];
                                                    }else{
                                                        echo $getcrew['name_crew'].', ';
                                                    }
                                                }else{
                                                    echo $getcrew['name_crew'];
                                                }
                                               
                                            }
                                            echo '
										</div>
									</li>';}
                                    ?>

                                    <?php
                                    $crew = mysqli_query($con,"SELECT * FROM crew WHERE  (tmdb_id='".$post['tmdb_id']."') AND (job='Director') ");
                                    $say = mysqli_num_rows($crew);
                                    if ($say==0) {
                                       
                                    }else{
                                    echo '
									<li>
										<div class="transformers-left">
											Director:
										</div>
										<div class="transformers-right">';
                                        
                                        
                                        $getcrew = mysqli_fetch_array($crew);
                                        echo $getcrew['name_crew'];                                                     
                                        
                                        echo '
										</div>
									</li>';}
                                    ?>

									<li>
										<div class="transformers-left">
											Release:
										</div>
										<div class="transformers-right">
                                        <?=$post['release_date']?>
										</div>
									</li>
									<li>
										<div class="transformers-left">
											Language:
										</div>
										<div class="transformers-right">
                                        <?=mb_strtoupper($post['language'])?>
										</div>
									</li>
                                    <li>
										<div class="transformers-left">
											IMDB:&nbsp;
										</div>
										<div class="transformers-right">
                                        <?php  
                                        $sec= mysqli_query($con,"SELECT * FROM movies WHERE tmdb_id='".$post['tmdb_id']."'");
                                        $info = mysqli_fetch_array($sec);

                                        echo $info['vote_average'];
                                        ?>
										</div>
									</li>
									<li>
									<h3>Cast:</h3>
									<div class="slide-cast">
									<?php  
                                        $sec= mysqli_query($con,"SELECT * FROM staff WHERE tmdb_id='".$post['tmdb_id']."' ORDER BY popularity DESC LIMIT 5");
                                        while($info = mysqli_fetch_array($sec)){

											echo'											
											
												<div class="single-slide-cast mr-4">
													<img src="'.$info['profile_path'].'" alt="about" />
												</div>
																																									
									 	';
										}                                      
                                    ?>
									</div>										
									</li>
							
									<li>
										<div class="transformers-left">
											Share:
										</div>
										<div class="transformers-right">
											<a href="#"><i class="icofont icofont-social-facebook"></i></a>
											<a href="#"><i class="icofont icofont-social-twitter"></i></a>
											<a href="#"><i class="icofont icofont-social-google-plus"></i></a>
											<a href="#"><i class="icofont icofont-youtube-play"></i></a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</section><!-- transformers area end -->
		<!-- details area start -->
		<section class="details-area">
			<div class="container">
				<div class="row">

					<div class="col-lg-9">
						<div class="details-content">

							<div class="details-overview">
								<h2>Overview</h2>
								<p><?=$post['description']?></p>
							</div>
                                        <!-- video section start -->
<section class="video ptb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="section-title pb-20">
                    <h1><i class="icofont icofont-film"></i> Trailer</h1>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">

            <?php
					$sec_v = mysqli_query($con,"SELECT * FROM movies WHERE tmdb_id='".$post['tmdb_id']."'");
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
        </div>
    </div>
</section><!-- video section end -->


                            <?php
                            
                                echo'
                                <div class="comments-area">
                                    <h2 class="title-semibold-dark size-xl border-bottom mb-40 pb-20">'.$commentsay.' Comment</h2>
                                    <ul>';
                                        while($info = mysqli_fetch_array($comment)){
                                            $serhtarix =date('d-m-Y H:i',strtotime($info['tarix']));
                                        echo'
                                        <li class=" mb-4">
                                            <div class="media media-none-xs">
                                                <img src="assets/img/blog.png" class="img-fluid rounded-circle" alt="comments">
                                                <div class="media-body comments-content media-margin30 ml-4">
                                                    <h3 class="title-semibold-dark">
                                                        <a>'.$info['ad'].' ,
                                                            <span> '.$serhtarix.'</span>
                                                        </a>
                                                    </h3>
                                                    <p>'.$info['metn'].'</p>
                                                </div>
                                            </div>
                                        </li>';
                                        }
                                        echo'
                                    </ul>
                                </div>
                                ';
                                $_SESSION['token'] = md5(rand());
                                
                                ?>
							<div class="details-reply">
								<h2>Leave a Reply</h2>
								<form method="POST">
                                <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
									<div class="row">
										<div class="col-lg-4">
											<div class="select-container">
												<input  autocomplete="off" type="text" name="ad" placeholder="Name"/>
												<i class="icofont icofont-ui-user"></i>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="select-container">
												<input autocomplete="off"  type="email" name="email" placeholder="Email"/>
												<i class="icofont icofont-envelope"></i>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="textarea-container">
												<textarea placeholder="Type Here Message"  autocomplete="off"  name="metn" rows="8" cols="30"></textarea>
												<button  type="submit" name="paylas"><i class="icofont icofont-send-mail"></i></button>
											</div>
										</div>
									</div>
								</form>
							</div>
							
						</div>
					</div>



					<div class="col-lg-3 text-center text-lg-left">
					    <div class="portfolio-sidebar">
							<img src="assets/img/sidebar/sidebar1.png" alt="sidebar" />
							<img src="assets/img/sidebar/sidebar2.png" alt="sidebar" />
							<img src="assets/img/sidebar/sidebar4.png" alt="sidebar" />
						</div>
					</div>



				</div>
			</div>
		</section><!-- details area end -->
		<?php include'footer.php'; ?>