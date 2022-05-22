<?php

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
function printArray($array)
{
    echo '<pre>';
    var_dump($array);
    echo '</pre>';
}

$todoName = $_POST['todo_name'] ?? '';
$todoName = trim($todoName);

if ($todoName) {
    if (file_exists('todo.json')) {


        // echo "Save todo";
        $json = file_get_contents('todo.json');
        $jsonArray = json_decode($json, true);
    }else{
        $jsonArray = [];
    }
    $jsonArray[$todoName] = ['completed' => false];


    printArray($jsonArray);
    // echo $json;


    file_put_contents('todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
}

header('Location:index.php');
