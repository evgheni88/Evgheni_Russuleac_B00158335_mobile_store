<div class="container my-4 products-page">
    <div class="row">
        <!-- Main Content Area for Search Results -->
        <div class="col-lg-10 mx-auto">
            <h2>Search Results for '<?= htmlspecialchars($searchTerm) ?>' - (<?= $totalResults ?> Results Found)</h2>
            <div class="row">
                <?php if (empty($products)): ?>
                    <p>No products found matching your search criteria.</p>
                <?php else: ?>
                    <?php foreach ($products as $product): ?>
                        <?php include '../src/View/Snippets/product_card.php'; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= ($i == $current_page) ? 'active' : '' ?>">
                            <a class="page-link" href="?query=<?= urlencode($searchTerm) ?>&page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
