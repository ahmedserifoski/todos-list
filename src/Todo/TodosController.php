<?php 
namespace App\Todo;

// use App\Todo\TodosRepository;

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
        // var_dump($todos);
        $this->render("todo/index", [
            "todos" => $todos
        ]);
    }

    public function addTodo() {
        $todos = null;
        if(!empty($_POST["todo"])) {
            $todo = $_POST["todo"];
            var_dump($todo);
            
            $todoModel = new TodoModel();
            $todoModel->todo = $todo;
            
            $this->todosRepository->insertTodo($todoModel);
            
            $todos = $this->todosRepository->fetchAll();
            header("Location: index");
            exit;
        }


        $this->render("todo/index", [
            "todos" => $todos
        ]);
    }

    public function deleteTodo() {
        if (!empty($_POST["deleteTodo"])) {
            $id = $_POST["deleteTodo"];
            $this->todosRepository->deleteTodoById($id);
            header("Location: index");
            exit;
        }
    
        // Other logic, if needed
    
        // Fetch updated todos after deletion
        $todos = $this->todosRepository->fetchAll();
    
        // Render the view
        $this->render("todo/index", [
            "todos" => $todos
        ]);
    }
    
}


?>