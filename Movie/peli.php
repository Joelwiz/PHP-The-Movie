<?php
// create curl resource
$ch = curl_init();

//    $url="https://datos.canarias.es/catalogos/general/api/3/action/datastore_search?resource_id=f479adac-6673-4601-a8ea-82b897330b0e&limit=100";
$url="https://api.themoviedb.org/3/discover/movie?api_key=1865f43a0549ca50d341dd9ab8b29f49&language=es";

// set url
curl_setopt($ch, CURLOPT_URL, $url);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$peliculas = curl_exec($ch);

//echo $peliculas;

$datos = json_decode($peliculas, true);

$result = $datos["results"];

foreach ($result as $pelicula) {
    echo "<div>";
    echo '<img src="https://image.tmdb.org/t/p/w185';
    echo $pelicula["backdrop_path"];
    echo '" alt="">';
    echo $pelicula["title"];
    echo "</div>";
}

// close curl resource to free up system resources
curl_close($ch);


?>