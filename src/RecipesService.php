<?php

namespace Src;


use Src\Recipe\RecipeInterface;
use Src\Storages\StorageInterface;

class RecipesService
{
    public function storeRecipe(RecipeInterface $recipe, StorageInterface $storage): void
    {
        $storage->storeRecipe($recipe);
    }
}
