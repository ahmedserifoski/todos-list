<?php 
namespace App\Todo;

use PDO;

class TodosRepository {

    public $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getTableName() {
        return "todos";
    }

    public function getModelName() {
        return "App\\Todo\\TodoModel";
    }

    public function fetchAll() {

        $table = $this->getTableName();
        $model = $this->getModelName();
        $stmt = $this->pdo->query("SELECT * FROM `{$table}`");
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, "{$model}");
        return $posts;
    }

    public function insertTodo(TodoModel $todoModel) {
        $table = $this->getTableName(); 
    
        $stmt = $this->pdo->prepare("INSERT INTO $table (todo) VALUES (:todo)");
        $stmt->execute([
            "todo"=> $todoModel->todo
          ]);
    }

    public function deleteTodoById($id) {
        $table = $this->getTableName();
        $stmt = $this->pdo->prepare("DELETE FROM $table WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

}


?>