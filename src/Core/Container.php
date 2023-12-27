<?php

namespace App\Core;

use App\Todo\TodosController;
use App\Todo\TodosRepository;

use PDO;
use PDOException;

class Container {
  //watch blog 3, Contaier Abschnitt. Everything explained there
  public $recipes = [];
  public $instances = [];

  //php doesn't let us store functions in arrays like this directly in the
  //recipes array, so we are doing it through the __construct() function
  public function __construct(){
    $this->recipes = [
      "todosController" => function () {
        //we are telling here how to make a PostsController and in the PostsController
        //class we defined that it has to get a PostsRepository upon creation
        //which we also pass to it with $this->make("postsRepository"),
        return new TodosController(
          $this->make("todosRepository")
        );
      },
      "todosRepository" => function() {
        return new TodosRepository($this->make("pdo"));
      },
      "pdo" => function(){
        try{
          $pdo = new PDO(
            "mysql:host=localhost;dbname=todo;charset=utf8",
            "AhmedBlog",
            "Q8qlh7a[M4gK3.Fm"
          );
          $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
          echo "Could not connect with database";
          die();
        }
        return $pdo;
      }
    ];
  }

//this function replaces the code below, the idea is to have a function that
//works with all variables (like pdo and postsRepository) instead of writing
//a separate function for all variables. It's more general
  public function make($name) {
    if(!empty($this->instances[$name])){
      return $this->instances[$name];
    }

    if(isset($this->recipes[$name])){
      $this->instances[$name] = $this->recipes[$name]();
      return $this->instances[$name];
    }
  }


}

 ?>
