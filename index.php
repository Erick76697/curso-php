<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializar la nueva secion de curl: cURL
$sh = curl_init(API_URL);
//Indicar que vamos a recibir el el resultado y mostrarlo por pantalla
//(el url del api, )
curl_setopt($sh, CURLOPT_RETURNTRANSFER, true);
//ejecutar la peticion al api y guardamos el reesult
$result = curl_exec($sh);

//Otra alternativa seria con file_get_contents, solo seria para hacer un get al api
//result = file_get_contents(API_URL);

$data = json_decode($result, true);
curl_close($sh);

//var_dump($data);
?>



<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Centered viewport -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <h1 class="display-1 text-center">Proxima Pelicula de Marvel</h1>
        <section>
            <img src="<?= $data["poster_url"] ?>" width="300", alt="Poster de Pelicula"
            style="border-radius:16px"/>
        </section>

        <hgroup>
            <h2><?= $data["title"]?> </h2>
            <h3>Se estrena en <?= $data["days_until"] ?> dias</h3>
            <p>Fecha de estreno: <?= $data["release_date"] ?></p>
            <p>La Proxima Pelicula sera: <?= $data["following_production"]["title"] ?></p>

        </hgroup>
    </main>
    <style>
            :root{
                color-scheme: light dark;
            }
            body{
                display: grid;
                place-content: center;
            }
            section{
                display: flex;
                justify-content: center;
            }
            hgroup{
                display: flex;
                flex-direction: column;
                justify-content: center;
                text-align: center;
            }
            h1{
                display: flex;
                justify-content: center;
            }
            img{
                margin: 0 auto;
                border: 1px solid #333
            }
        </style>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>