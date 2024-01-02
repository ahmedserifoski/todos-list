<?php include __DIR__ . "/../layout/header.php";?>

    <?php include __DIR__ . "/../layout/header.php"; ?>
    <div class="d-flex flex-column align-items-center">
        <h1 class="text-light mt-5">My Todos</h1>
        <ul class="list-group mt-3" style="min-width: 500px;">
            <?php foreach($todos as $todo):?>
                <li class="list-group-item bg-warning"><?php echo($todo["todo"]); ?></li>
            <?php endforeach; ?>
        </ul>
        <form id="add-todo-form" class="d-flex justify-content-between mt-3">
            <input type="text" class="form-control" id="todo-input" placeholder="Enter a new todo">
            <button type="button" class="btn btn-primary" id="add-todo-btn">Add To-do</button>
        </form>
    </div>
    <?php ?>

<?php include __DIR__ . "/../layout/footer.php";?>

    