<?php

if (file_exists('todo.json')) {
    $json = file_get_contents('todo.json');
    $todos =  json_decode($json, true);
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="newtodo.php" method="post">
        <input type="text" name="todo_name" placeholder="Enter your todo">
        <button>New Todo</button>

    </form>
    <br>
    <?php foreach ($todos as $todoName => $todo) : ?>
        <div style="margin-bottom: 1em;">
            <form style="display: inline-block ;" action="change_status.php" method="post">
            <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                <input type="checkbox" name="checkbox" <?php echo $todo['completed'] ? 'checked' : "" ?>>

            </form>
            <span><?php echo $todoName ?></span>
            <form style="display: inline-block;" action="delete.php" method="post">
                <!-- <a href="delete.php?todo_name=<?php echo $todoName ?>" >Delete</a> -->
                <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                <button>Delete</button>
            </form>
        </div>

    <?php endforeach;  ?>

<script>
    const checkboxes = document.querySelectorAll('input[type=checkbox]');
    checkboxes.forEach(ch =>{
        ch.onclick = function(){
            this.parentNode.submit();
        };
    })

</script>
</body>

</html>