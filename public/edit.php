<?php
require_once __DIR__ . '/../models/Product.php';

$id = $_GET['id'];
$product = (new Product())->find($id);

$title = 'Editar Produto';
require_once __DIR__ . '/../views/partials/head.php';
?>

    <div class="card bg-light">
        <div class="card-body">
            <h1 class="mb-4 h2">
                <i class="fas fa-box"></i> Editar Produto
            </h1>

            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?= $product['id'] ?>">

                <div class="mb-2">
                    <label class="form-label fw-bold">Nome</label>
                    <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required>
                </div>

                <div class="mb-2">
                    <label class="form-label fw-bold">Descrição</label>
                    <textarea name="description" class="form-control" required><?= $product['description'] ?></textarea>
                </div>

                <div class="mb-2">
                    <label class="form-label fw-bold">Preço</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="<?= $product['price'] ?>"
                           required>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i> Atualizar
                    </button>

                    <a href="index.php" class="btn btn-secondary"> <i class="fas fa-arrow-left"></i> Voltar</a>
                </div>
            </form>
        </div>
    </div>

<?php require_once __DIR__ . '/../views/partials/footer.php'; ?>