<?php
require_once __DIR__ . '/../models/Product.php';

$id = $_POST['id'];

$data = [
    'name' => $_POST['name'],
    'description' => $_POST['description'],
    'price' => $_POST['price'],
];

(new Product())->update($id, $data);

header('Location: index.php');
exit;