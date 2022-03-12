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



$say = count($data->crew);
for($i=0; $i<$say; $i++)
{
    $tmdb_id = mysqli_real_escape_string($con,$data->id);
    $crew_id =mysqli_real_escape_string($con,$data->crew[$i]->id);
    $credit_id =mysqli_real_escape_string($con,$data->crew[$i]->credit_id);
    $name_crew =mysqli_real_escape_string($con,$data->crew[$i]->name);
    //echo ' <img src="https://image.tmdb.org/t/p/w500'.$image.'" > <br> ';
    $popularity = mysqli_real_escape_string($con,$data->crew[$i]->popularity);
    $known_for_department = mysqli_real_escape_string($con,$data->crew[$i]->known_for_department);
    $department = mysqli_real_escape_string($con,$data->crew[$i]->department);
    $profile_path = mysqli_real_escape_string($con,$data->crew[$i]->profile_path);
    
    $profile_path = 'https://image.tmdb.org/t/p/w500'.$profile_path;
    $job= mysqli_real_escape_string($con,$data->crew[$i]->job);
    $gender = mysqli_real_escape_string($con,$data->crew[$i]->gender);
    
    
    
    $check_id = mysqli_query($con,"SELECT crew_id FROM crew");
    $allow_crew_add = true;
    while($ids = mysqli_fetch_array($check_id)){
        if ($ids['crew_id']==$crew_id) {
        $allow_crew_add= false;
        }                
    }
    if($allow_crew_add){
    $add_movie = mysqli_query($con,"INSERT INTO crew(tmdb_id,crew_id,credit_id,gender,popularity,profile_path,name_crew,department,known_for_department,job,tarix)
    VALUES('".$tmdb_id."','".$crew_id."','".$credit_id."','".$gender."','".$popularity."','".$profile_path."','".$name_crew."','".$department."','".$known_for_department."','".$job."','".$tarix."')");      
    }
    if($add_movie){
        echo $i.'Elave olundu <br>';
    }else{
        echo $i.'Elave olunmadi <br>';
    }
    
    
}

//echo '<pre>';
//print_r($data);
//echo '</pre>';
}

?>
