<?php
require_once __DIR__ . '/../models/Product.php';

$title = 'Lista de Produtos';
require_once __DIR__ . '/../views/partials/head.php';

$products = (new Product())->all();
?>

    <h1 class="mb-4">Lista de Produtos</h1>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
        </tr>
        </thead>
        <tbody>

        <?php if (empty($products)): ?>
            <tr>
                <td colspan="4" class="text-center">Nenhum produto cadastrado</td>
            </tr>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td>R$ <?= number_format($product['price'], 2, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

        </tbody>
    </table>

<?php require_once __DIR__ . '/../views/partials/footer.php'; ?>