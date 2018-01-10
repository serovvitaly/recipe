<?php

namespace Src\Recipe;


class Recipe implements RecipeInterface
{
    protected $name;
    protected $ingredientsCollection;
    protected $recipeInstructions;

    /**
     * Recipe constructor.
     * @param string $name
     * @param IngredientsCollectionInterface $ingredientsCollection
     * @param string $recipeInstructions
     * @throws \Exception
     */
    public function __construct(
        string $name,
        IngredientsCollectionInterface $ingredientsCollection,
        string $recipeInstructions = ''
    )
    {
        /* Обязательные поля */
        $name = trim($name);

        /* Валидация обязательных полей */
        if (empty($name)) {
            throw new \Exception('Recipe $name is empty');
        }
        if ($ingredientsCollection->count() < 1) {
            throw new \Exception('Recipe ingredients list is empty');
        }

        /* Необязательные поля */
        $recipeInstructions = trim($recipeInstructions);


        $this->name = $name;
        $this->recipeInstructions = empty($recipeInstructions) ? null : $recipeInstructions;
        $this->ingredientsCollection = $ingredientsCollection;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function ingredientsCollection(): IngredientsCollectionInterface
    {
        return $this->ingredientsCollection;
    }

    public function ingredients(): array
    {
        return $this->ingredientsCollection->ingredients();
    }

}
