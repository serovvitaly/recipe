<?php

namespace Src\Recipe;


class IngredientsCollection implements IngredientsCollectionInterface
{
    protected $ingredients = [];

    public function append(IngredientInterface $ingredient)
    {
        $this->ingredients[] = $ingredient;
    }

    public function count(): int
    {
        return count($this->ingredients);
    }

    public function ingredients(): array
    {
        return $this->ingredients;
    }
}
