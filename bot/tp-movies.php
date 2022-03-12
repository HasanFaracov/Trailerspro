<?php
$con = mysqli_connect('localhost','u1491059_trailerspro','Eokad23247','u1491059_trailerspro');
$tarix = date('Y-m-d H:i:s');
$api_key="7ddb8dd083ada49e3903fcee1231653f";
$thisyear = date('Y');

        
//$data = file_get_contents('https://api.themoviedb.org/3/search/movie?api_key='.$api_key.'&query='.$_POST['sorgu'].'&region='.$_POST['region']);
//$data = file_get_contents('https://api.themoviedb.org/3/discover/movie?primary_release_year=2016&api_key='.$api_key);



$data = file_get_contents('https://api.themoviedb.org/3/movie/top_rated?api_key='.$api_key.'&language=en-US&page=3');

//echo $data;

$data = json_decode($data);



$say = count($data->results);
for($i=0; $i<$say; $i++)
{
    $tmdb_id = mysqli_real_escape_string($con,$data->results[$i]->id);
    $backdrop_path = mysqli_real_escape_string($con,$data->results[$i]->backdrop_path);
    $backdrop_path = 'https://image.tmdb.org/t/p/w500'.$backdrop_path;
    $genre_ids =mysqli_real_escape_string($con,$data->results[$i]->genre_ids[0]);
    $language =mysqli_real_escape_string($con,$data->results[$i]->original_language);
    //echo ' <img src="https://image.tmdb.org/t/p/w500'.$image.'" > <br> ';
   echo $title = mysqli_real_escape_string($con,$data->results[$i]->title);
    $overview =mysqli_real_escape_string($con, $data->results[$i]->overview);
    $release_date =mysqli_real_escape_string($con, $data->results[$i]->release_date);
    $popularity =mysqli_real_escape_string( $con,$data->results[$i]->popularity);
    $poster_path =mysqli_real_escape_string($con, $data->results[$i]->poster_path);
    $poster_path = 'https://image.tmdb.org/t/p/w500'.$poster_path;
    $vote_average = mysqli_real_escape_string($con, $data->results[$i]->vote_average);
    
    
    //get video start
    $vdata = file_get_contents('https://api.themoviedb.org/3/movie/'.$data->results[$i]->id.'/videos?api_key='.$api_key);
    $vdata = json_decode($vdata);
    $video_key = mysqli_real_escape_string($con,$vdata->results[0]->key); echo '<br>';
    //get video end
    
    
    $check_id = mysqli_query($con,"SELECT tmdb_id FROM movies");
    $allow_movie_add = true;
    while($tmdb_ids = mysqli_fetch_array($check_id)){
        if ($tmdb_ids['tmdb_id']==$tmdb_id) {
        $allow_movie_add= false;
        }                
    }
    if($allow_movie_add){
    $add_movie = mysqli_query($con,"INSERT INTO movies(tmdb_id,genre_id,title,description,popularity,poster_path,backdrop_path,video,vote_average,release_date,language,tarix)
    VALUES('".$tmdb_id."','".$genre_ids."','".$title."','".$overview."','".$popularity."','".$poster_path."','".$backdrop_path."','".$video_key."','".$vote_average."','".$release_date."','".$language."','".$tarix."')");      
    }
    if($add_movie){
        echo $i.'Elave olundu <br>';
    }else{
        echo $i.'Elave olunmadi <br>';
    }
    
    
}

echo '<pre>';
print_r($data);
echo '</pre>';


?>
