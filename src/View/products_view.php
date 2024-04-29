<?php include 'templates/header.php'; ?>

<div class="container my-4 products-page">
    <div class="row">
        <!-- Sidebar Filters -->
        <div class="col-lg-3 mb-3">
            <?php include 'partials/filters_partial.php'; ?>
        </div>
        <!-- Main Content Area for Products -->
        <div class="col-lg-9">
            <?php foreach ($products as $product): ?>
                <?php include 'partials/product_card_partial.php'; ?>
            <?php endforeach; ?>
            <!-- Pagination -->
            <?php include 'partials/pagination_partial.php'; ?>
        </div>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
