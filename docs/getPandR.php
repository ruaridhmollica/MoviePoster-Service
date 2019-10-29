<?php

$error = 'error.jpg';
$data_json = '';
if(isset($_GET['movieName']))
	$temp = urlencode(trim(strip_tags($_GET['movieName'])));
	$movie = strtolower($temp);

if($movie!='') {
    	$url = "http://www.omdbapi.com/?apikey=a3493a52&t=$movie";
    	$data_json = file_get_contents($url);
    	if($data_json) {
    		if($data_json != '{"Response":"False","Error":"Movie not found!"}'){
         	$data_array = json_decode($data_json, true);
        		$poster = $data_array['Poster'];
        		$title = $data_array['Title'];
        		$rating = $data_array['imdbRating'];
        		$director = $data_array["Director"];
        		$summary = $data_array["Plot"];
        		$date = $data_array["Released"];
						$array = json_encode(array($poster,$title,$summary,$rating,$date,$director));
						echo $array;
    		}
   	}else echo $error;
	/*$curl = "https://api.nytimes.com/svc/movies/v2/reviews/search.json?api-key=cccc1eddee0d4781b13cfc5d1cfdb102&critics-pick=N&query=".$movie;
	$data_json2 = file_get_contents($curl);
	if($data_json2){
		$result_array = json_decode($data_json2, true);
		$review = $result_array[results][0][link][url];
		$review = str_replace("\/","/",$review);
		$array = json_encode(array($poster,$title,$summary,$review,$rating,$date,$director));
		echo $array;

	}else echo $error; */
} else echo $error;

?>
