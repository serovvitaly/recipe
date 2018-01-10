<?php

use Symfony\Component\DomCrawler\Crawler;

include_once 'vendor/autoload.php';

$files = scandir('html');

$parser = new \Src\Parsers\KedemRuParser;

$mysqlStorage = new \Src\Storages\MysqlStorage();
$recipesService = new \Src\RecipesService();

foreach ($files as $fileName) {
    $content = file_get_contents('html/' . $fileName);
    $crawler = new Crawler($content);
    $recipe = $parser->getRecipeByCrawler($crawler);

    if (!$recipe) {
        continue;
    }

    $recipesService->storeRecipe($recipe, $mysqlStorage);
}
