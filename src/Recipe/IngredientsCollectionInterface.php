<?php

namespace Src\Recipe;


interface IngredientsCollectionInterface
{
    public function append(IngredientInterface $ingredient);

    public function count(): int;

    public function ingredients(): array;
}
