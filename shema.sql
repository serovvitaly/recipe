CREATE DATABASE IF NOT EXISTS recipes
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE recipes;

CREATE TABLE IF NOT EXISTS recipes (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(300) NOT NULL,
  image varchar(300) DEFAULT '',
  recipeInstructions text,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS ingredients (
  id int(11) NOT NULL AUTO_INCREMENT,
  recipe_id int(11) NOT NULL,
  name varchar(300) NOT NULL,
  PRIMARY KEY (id),
  KEY idx_recipe_id(recipe_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
