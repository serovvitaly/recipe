<?php

namespace Src\Parsers;


use Src\Recipe\RecipeInterface;
use Symfony\Component\DomCrawler\Crawler;

interface ParserInterfaces
{
    public function getRecipeByCrawler(Crawler $crawler): ?RecipeInterface;
}
