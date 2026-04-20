<?php
require_once __DIR__ . '/../models/Product.php';

$title = 'Lista de Produtos';
require_once __DIR__ . '/../views/partials/head.php';

$products = (new Product())->all();
?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-4">Lista de Produtos</h1>
        <a href="create.php" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Novo Produto
        </a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Ações</th>
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
                    <td>
                        <a href="edit.php?id=<?= $product['id'] ?>" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>

                        <a href="delete.php?id=<?= $product['id'] ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Deseja realmente excluir este produto?');">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

        </tbody>
    </table>

<?php require_once __DIR__ . '/../views/partials/footer.php'; ?>