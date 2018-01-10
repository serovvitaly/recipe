<?php

namespace Src\Storages;


use Src\Recipe\RecipeInterface;

interface StorageInterface
{
    public function storeRecipe(RecipeInterface $recipe): void;
}
