<?php

namespace Src\Recipe;


interface RecipeInterface
{
    public function name(): string;

    public function ingredientsCollection(): IngredientsCollectionInterface;

    public function ingredients(): array;
}
