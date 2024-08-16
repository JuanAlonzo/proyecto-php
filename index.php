<?php

const API_URL = 'https://whenisthenextmcufilm.com/api';

$ch = curl_init(API_URL);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);

$data = json_decode($result, true);

curl_close($ch);

// var_dump($data);

?>

<head>
    <title>La próxima película de Marvel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>

<main>
    <section>
        <img
            src="<?= $data["poster_url"]; ?>"
            width="200"
            alt="Poster de <?= $data["title"]; ?>"
            style="border-radius: 16px;">
    </section>

    <hgroup>
        <h3>
            <?= $data['title']; ?> se estrena en <?= $data['days_until']; ?> días.
        </h3>
        <p>Fecha de estreno: <?= $data['release_date']; ?></p>
    </hgroup>

    <hgroup>
        <h4>La siguiente es: <?= $data['following_production']['title']; ?></h4>
        <p>Se estrena en <?= $data['following_production']['days_until']; ?> días.</p>
    </hgroup>

    <section>
        <img
            src="<?= $data['following_production']["poster_url"]; ?>"
            width="200"
            alt="Poster de <?= $data['following_production']["title"]; ?>"
            style="border-radius: 16px;">
    </section>

</main>

<style>
    :root {
        color-scheme: dark light;
    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img {
        margin: 0;
    }
</style>