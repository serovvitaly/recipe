<?php

namespace Src\Parsers;


use Src\Recipe\Ingredient;
use Src\Recipe\IngredientsCollection;
use Src\Recipe\Recipe;
use Src\Recipe\RecipeInterface;
use Symfony\Component\DomCrawler\Crawler;

class KedemRuParser implements \Src\Parsers\ParserInterfaces
{
    public function getRecipeByCrawler(Crawler $crawler): ?RecipeInterface
    {
        $name = $crawler->filterXPath('//h1[@itemprop="name"]');
        if (!$name->count()){
            return null;
        }

        $ingredients = $crawler->filterXPath('//div[@itemprop="ingredients"]');
        $ingredientsCollection = new IngredientsCollection();
        $ingredients->each(function (Crawler $crawler) use ($ingredientsCollection) {
            $ingredientsCollection->append(new Ingredient());
        });

        $recipeInstructions = $crawler->filterXPath('//div[@itemprop="recipeInstructions"]');
        if ($recipeInstructions->count()) {
            $recipeInstructions = $recipeInstructions->html();
        } else {
            $recipeInstructions = '';
        }

        return new Recipe(
            $name->text(),
            $ingredientsCollection,
            $recipeInstructions
        );
    }
}
