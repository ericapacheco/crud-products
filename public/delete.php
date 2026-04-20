<?php
require_once __DIR__ . '/../models/Product.php';

$id = $_GET['id'];

(new Product())->delete($id);

header('Location: index.php');
exit;