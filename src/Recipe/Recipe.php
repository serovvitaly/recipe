<?php

namespace Src\Recipe;


class Recipe implements RecipeInterface
{
    protected $name;
    protected $ingredientsCollection;
    protected $image;
    protected $recipeInstructions;

    /**
     * Recipe constructor.
     * @param string $name
     * @param IngredientsCollectionInterface $ingredientsCollection
     * @param string $image
     * @param string $recipeInstructions
     * @throws \Exception
     */
    public function __construct(
        string $name,
        IngredientsCollectionInterface $ingredientsCollection,
        string $image = ''
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

        $this->name = $name;
        $this->ingredientsCollection = $ingredientsCollection;
    }

    public function getName(): string
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

    public function setImage(string $url)
    {
        $this->image = trim($url);
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setRecipeInstructions(string $recipeInstructions)
    {
        $this->recipeInstructions = trim($recipeInstructions);
        return $this;
    }

    public function getRecipeInstructions(): string
    {
        return $this->recipeInstructions;
    }

}
