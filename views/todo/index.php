<?php include __DIR__ . "/../layout/header.php";?>

    <?php include __DIR__ . "/../layout/header.php"; ?>
    <div class="d-flex flex-column align-items-center">
        <h1 class="text-light mt-5" >My Todos</h1>
        <p class="text-light" style="font-family: 'Montserrat', sans-serif;font-weigt:200;font-style:italic;">once to criss, twice to cross</p>
        <ul class="list-group mt-3" style="min-width: 500px;">
            <?php foreach($todos as $todo):?>
                <li class="list-group-item bg-warning" 
                    ondblclick="document.getElementById('deleteTodo<?php echo $todo->id; ?>').submit();">
                    <?php echo($todo->todo); ?>

                    <!-- Delete Form -->
                    <form action="deleteTodo" method="post" 
                        id="deleteTodo<?php echo $todo->id; ?>" class="d-none">
                        <input type="hidden" name="deleteTodo" value="<?php echo $todo->id; ?>">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
        <form method="post" action="addTodo" id="add-todo-form" class="d-flex justify-content-between mt-3">
            <input type="text" class="form-control" id="todo" name="todo" placeholder="Enter a new todo">
            <button type="submit" class="btn btn-warning" id="add-todo-btn">Add To-do</button>
        </form>
    </div>
<?php include __DIR__ . "/../layout/footer.php";?>

    



