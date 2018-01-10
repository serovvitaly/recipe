<?php

namespace Src\Recipe;


interface RecipeInterface
{
    public function getName(): string;

    public function ingredientsCollection(): IngredientsCollectionInterface;

    /**
     * @return IngredientInterface[]
     */
    public function ingredients(): array;

    public function setImage(string $url);

    public function getImage(): string;

    public function setRecipeInstructions(string $recipeInstructions);

    public function getRecipeInstructions(): string;
}
