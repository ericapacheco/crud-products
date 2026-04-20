<?php
require_once __DIR__ . '/../models/Product.php';

$data = [
    'name' => $_POST['name'],
    'description' => $_POST['description'],
    'price' => $_POST['price'],
];

(new Product())->create($data);

header('Location: index.php');
exit;