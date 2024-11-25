<?php

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if (isset($_POST['add_to_cart'])) {
    $descricao = $_POST['descricao'];
    $imagem = $_POST['imagem'];

    $_SESSION['carrinho'][] = [
        'descricao' => $descricao,
        'imagem' => $imagem
    ];
}

if (isset($_POST['remove_from_cart'])) {
    $index = $_POST['index'];

    if (isset($_SESSION['carrinho'][$index])) {
        unset($_SESSION['carrinho'][$index]);


        $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
    }
}
?>