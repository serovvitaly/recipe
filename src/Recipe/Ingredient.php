<?php

namespace Src\Recipe;


class Ingredient implements IngredientInterface
{
    protected $text;

    public function __construct(string $text)
    {
        $this->text = trim($text);
    }

    public function getText(): string
    {
        return $this->text;
    }
}
