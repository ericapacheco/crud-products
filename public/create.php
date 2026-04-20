<?php
$title = 'Novo Produto';
require_once __DIR__ . '/../views/partials/head.php';
?>

    <h1 class="mb-4">Cadastrar Produto</h1>

    <form action="store.php" method="POST">

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Preço</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Salvar
        </button>

        <a href="index.php" class="btn btn-secondary">Voltar</a>

    </form>

<?php require_once __DIR__ . '/../views/partials/footer.php'; ?>