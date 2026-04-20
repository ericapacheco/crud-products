<?php
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../config/flash.php';

session_start();

$errors = [];

$id = $_POST['id'] ?? null;
$name = trim($_POST['name'] ?? '');
$description = trim($_POST['description'] ?? '');
$price = $_POST['price'] ?? '';

// Validações
if (!$id || !is_numeric($id)) {
    $errors[] = 'Produto inválido.';
}

if ($name === '' || strlen($name) < 3) {
    $errors[] = 'O NOME deve ter no mínimo 3 caracteres.';
}

if (!is_numeric($price) || $price <= 0) {
    $errors[] = 'O PREÇO deve ser um número maior que zero.';
}

if (!empty($errors)) {
    flash('danger', implode('<br>', $errors));
    $_SESSION['old'] = $_POST;
    header("Location: edit.php?id={$id}");
    exit;
}

(new Product())->update($id, [
    'name' => $name,
    'description' => $description,
    'price' => $price
]);

flash('success', 'Produto atualizado com sucesso!');
header('Location: index.php');
exit;