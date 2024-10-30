<?php

if (isset($_POST['nome']) && isset($_POST['email'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    include 'model.php';

    $model = new Model();

    if ($model->insert($nome, $email)) {
        $data = array('res' => 'success');
    }else {
        $data = array('res' => 'error');
    }

    echo json_encode($data);
}

?> 