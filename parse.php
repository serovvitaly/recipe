<?php

use Symfony\Component\DomCrawler\Crawler;

include_once 'vendor/autoload.php';

$files = scandir('html');

$parser = new \Src\Parsers\KedemRuParser;

foreach ($files as $fileName) {
    $content = file_get_contents('html/' . $fileName);
    $crawler = new Crawler($content);
    $recipe = $parser->getRecipeByCrawler($crawler);

    if (!$recipe) {
        continue;
    }

    echo $recipe->name(), PHP_EOL, $recipe->ingredientsCollection()->count(), PHP_EOL, $recipe->getImage(), PHP_EOL;
}
