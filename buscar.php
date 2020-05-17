<?php 

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector\CssSelectorConverter;

$client = new Client(['verify' => false]);
$response = $client->request('GET', 'https://www.alura.com.br/cursos-online-programacao/php');

$html = $response->getBody();
$crawler = new Crawler($html);

$cursos = $crawler->filter('span.card-curso__nome');

foreach ($cursos as $curso ) {
    echo $curso->textContent . PHP_EOL;
}
