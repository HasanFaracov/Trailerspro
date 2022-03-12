<?php
$con = mysqli_connect('localhost','u1491059_trailerspro','Eokad23247','u1491059_trailerspro');
$tarix = date('Y-m-d H:i:s');
$api_key="7ddb8dd083ada49e3903fcee1231653f";
$thisyear = date('Y');

        
//$data = file_get_contents('https://api.themoviedb.org/3/search/movie?api_key='.$api_key.'&query='.$_POST['sorgu'].'&region='.$_POST['region']);
//$data = file_get_contents('https://api.themoviedb.org/3/discover/movie?primary_release_year=2016&api_key='.$api_key);
//$data = file_get_contents('https://api.themoviedb.org/3/movie/top_rated?api_key='.$api_key.'&language=en-US&page=3');


$movie_ids = mysqli_query($con,"SELECT tmdb_id FROM movies ");

while($movie_id= mysqli_fetch_array($movie_ids)){
$data = file_get_contents('https://api.themoviedb.org/3/movie/'.$movie_id['tmdb_id'].'/credits?api_key='.$api_key);

//echo $data;

$data = json_decode($data);



$say = count($data->cast);

for($i=0; $i<$say; $i++)
{
    $tmdb_id =  mysqli_real_escape_string($con,$data->id);
    $cast_id = mysqli_real_escape_string($con,$data->cast[$i]->id);
        
    $credit_id = mysqli_real_escape_string($con,$data->cast[$i]->credit_id);
    $name_cast = mysqli_real_escape_string($con,$data->cast[$i]->name);
        //echo ' <img src="https://image.tmdb.org/t/p/w500'.$image.'" > <br> ';
    $popularity = mysqli_real_escape_string($con, $data->cast[$i]->popularity);
    $karakter = mysqli_real_escape_string($con, $data->cast[$i]->character); 
    $known_for_department = mysqli_real_escape_string($con, $data->cast[$i]->known_for_department); 
    $profile_path = mysqli_real_escape_string($con, $data->cast[$i]->profile_path);
    $profile_path = 'https://image.tmdb.org/t/p/w500'.$profile_path;
    $gender = mysqli_real_escape_string($con, $data->cast[$i]->gender);
    
    
    
    
    $check_id = mysqli_query($con,"SELECT cast_id FROM staff");
    $allow_cast_add = true;
    while($ids = mysqli_fetch_array($check_id)){
        if ($ids['cast_id']==$cast_id) {
        $allow_cast_add= false;
        }                
    }
    if($allow_cast_add){
    $add_movie = mysqli_query($con,"INSERT INTO staff(tmdb_id,cast_id,known_for_department,name_cast,popularity,profile_path,credit_id,karakter,tarix,gender)
    VALUES('".$tmdb_id."','".$cast_id."','".$known_for_department."','".$name_cast."','".$popularity."','".$profile_path."','".$credit_id."','".$karakter."','".$tarix."','".$gender."')");
   
    }
    if($add_movie){
        echo $i.'Elave olundu <br><br>';
    }else{
        echo $i.'Elave olunmadi <br><br>';
    }
    
    
}

//echo '<pre>';
//print_r($data);
//echo '</pre>';

}
?>
