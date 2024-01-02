<?php 
namespace App\Todo;

use App\Todo\TodosRepository;

class TodosController {

    public function __construct(TodosRepository $todosRepository) {
        $this->todosRepository = $todosRepository;
    }

    protected function render($name, $params) {
        extract($params);
        require __DIR__ . "/../../views/{$name}.php";
    }

    public function index() {
        $todos = $this->todosRepository->fetchAll();

        $this->render("todo/index", [
            "todos" => $todos
        ]);
    }
}


?>