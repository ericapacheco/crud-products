<?php
require_once __DIR__ . '/../models/Product.php';

$id = $_GET['id'];
$product = (new Product())->find($id);

$title = 'Editar Produto';
require_once __DIR__ . '/../views/partials/head.php';
?>

    <h1 class="mb-4">Editar Produto</h1>

    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="description" class="form-control" required><?= $product['description'] ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Preço</label>
            <input type="number" step="0.01" name="price" class="form-control" value="<?= $product['price'] ?>" required>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Atualizar
        </button>

        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </form>

<?php require_once __DIR__ . '/../views/partials/footer.php'; ?>