<?php

namespace Src\Storages;


use Src\Recipe\RecipeInterface;

class MysqlStorage implements StorageInterface
{
    protected $pdo;
    protected $recipeQuery;
    protected $ingredientQuery;

    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=localhost;dbname=recipes;charset=utf8', 'root', '123');
        $this->recipeQuery = $this->pdo->prepare(
            'INSERT INTO recipes SET `name` = :name, image = :image, recipeInstructions = :recipeInstructions'
        );
        $this->ingredientQuery = $this->pdo->prepare(
            'INSERT INTO ingredients SET recipe_id = :recipe_id, `name` = :name'
        );
    }

    public function storeRecipe(RecipeInterface $recipe): void
    {
        $this->pdo->beginTransaction();

        $this->recipeQuery->execute([
            ':name' => $recipe->getName(),
            ':image' => $recipe->getImage(),
            ':recipeInstructions' => $recipe->getRecipeInstructions(),
        ]);
        foreach ($recipe->ingredients() as $ingredient) {
            $this->ingredientQuery->execute([
                ':recipe_id' => $this->pdo->lastInsertId(),
                ':name' => $ingredient->getText(),
            ]);
        }

        $this->pdo->commit();
    }
}
