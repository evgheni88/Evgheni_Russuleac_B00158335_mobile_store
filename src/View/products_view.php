<div class="container my-4 products-page">
    <div class="row">
        <!-- Sidebar Filters -->
        <div class="col-lg-3 mb-3">
            <?php include '../src/View/Snippets/filters.php'; ?>
        </div>

        <!-- Products -->
        <div class="col-lg-9">
            <?php foreach ($products as $product): ?>
                <?php include '../src/View/Snippets/product_card.php'; ?>
            <?php endforeach; ?>
        </div>


        <!-- Pagination! -->
        <?php include '../src/View/Snippets/pagination.php'; ?>
    </div>
</div>