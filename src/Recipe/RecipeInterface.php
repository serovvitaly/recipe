<?php

namespace Src\Recipe;


interface RecipeInterface
{
    public function name(): string;

    public function ingredientsCollection(): IngredientsCollectionInterface;

    public function ingredients(): array;

    public function setImage(string $url);

    public function getImage(): string;

    public function setRecipeInstructions(string $recipeInstructions);

    public function getRecipeInstructions(): string;
}
