<?php

class Pelicula
{
    private $api_key='sa';
    private $lang="es";


    public function __construct()
    {
    }


    public function getData()
    {
        // create curl resource
        $ch = curl_init();

        $url = "https://api.themoviedb.org/3/discover/movie?api_key=1865f43a0549ca50d341dd9ab8b29f49&language=es";

// set url
        curl_setopt($ch, CURLOPT_URL, $url);

//return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
        $peliculas = curl_exec($ch);

//echo $peliculas;

        $datos = json_decode($peliculas, true);
        curl_close($ch);

// close curl resource to free up system resources
    }

    public function obtenerPeliculas(){
        $key = $this->api_key;
        $lengua = $this->idioma;
        $url = "https://api.themoviedb.org/3/discover/movie?api_key=".$key."&language=".$lengua;
        $peliculas = $this-> obtenerDatos($url);

        $result = $peliculas["results"];

        foreach ($result as $pelicula) {?>
            <div class="linea">
            <a href="pelicula.php?id=<?=$pelicula["id"]?>">
                <div class="card" style="width: 18rem;">
                    <img src="https://image.tmdb.org/t/p/w185<?=$pelicula["poster_path"]?>" >
                    <div class="card-body">
                        <h5 class="card-title"><?=$pelicula["title"]?></h5>
                    </div>
                </div>
            </a>
            </div>

<?php
    }
    }
}
