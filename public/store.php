<?php
    require_once __DIR__ . '/../models/Product.php';
    require_once __DIR__ . '/../config/flash.php';

    session_start();

    $errors = [];

    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $price = $_POST['price'] ?? '';

    // Validações
    if ($name === '' || strlen($name) < 3) {
        $errors[] = 'O nome deve ter no mínimo 3 caracteres.';
    }

    if (!is_numeric($price) || $price <= 0) {
        $errors[] = 'O preço deve ser um número maior que zero.';
    }


    if (!empty($errors)) {
        flash('danger', implode('<br>', $errors));
        $_SESSION['old'] = $_POST;
        header('Location: create.php');
        exit;
    }


    (new Product())->create([
        'name' => $name,
        'description' => $description,
        'price' => $price
    ]);

    flash('success', 'Produto cadastrado com sucesso!');
    header('Location: index.php');
    exit;