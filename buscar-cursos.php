<?php

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

require 'vendor/autoload.php';

$client = new Client(['base_uri' => 'https://www.alura.com.br', 'verify' => false]);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

Titulo::exibeTitulo();
foreach ($cursos as $curso) {
    //echo $curso . PHP_EOL;
    exibeMensagem($curso);
}


/* 
$client = new Client(['verify'=>false]);
$resposta = $client->request('GET','https://www.alura.com.br/cursos-online-programacao/php');

$html = $resposta->getBody();

$crawler = new Crawler();
$crawler->addHtmlContent($html);

$cursos = $crawler->filter('span.card-curso__nome');

foreach ($cursos as $curso) {
    echo $curso->textContent . PHP_EOL;
}
*/