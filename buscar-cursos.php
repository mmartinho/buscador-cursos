<?php
/**
 * Autoload de todas as libs de "vendor" e "src"
 * @see composer.json / autoload
 */
require 'vendor/autoload.php';

use MMartinho\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

/* echo Outro::hello(); exit; */

$client = new Client([
    'verify'=>false, 
    'base_uri'=>'https://www.alura.com.br'
]);

$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach($cursos as $curso) {
    exibe($curso);
}