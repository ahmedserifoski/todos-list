<?php 
namespace App\Todo;

use PDO;
use ArrayAccess;    

class TodosRepository {

    protected $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getTableName() {
        return "todo";
    }

    public function getModelName() {
        return "App\\Todo\\TodoModel";
    }

    function fetchAll() {

        $table = $this->getTableName();
        $model = $this->getModelName();
        $stmt = $this->pdo->query("SELECT * FROM `{$table}`");
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, "{$model}");
        return $posts;
      }

}


?>