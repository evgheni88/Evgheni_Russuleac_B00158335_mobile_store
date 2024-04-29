<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <?php
            // Start building the link
            $link = "?page=" . $i;
            // Append category filters to the pagination link if they exist
            if (!empty($categoryFilters)) {
                foreach ($categoryFilters as $filter) {
                    $link .= '&category[]=' . urlencode($filter);
                }
            }
            ?>
            <li class="page-item <?= $i === $current_page ? 'active' : ''; ?>">
                <a class="page-link" href="<?= $link; ?>"><?= $i; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>
