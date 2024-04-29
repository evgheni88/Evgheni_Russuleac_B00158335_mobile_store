<div class="container custom-wishlist-page">
    <div class="title-line-wrapper">
        <h3>My Wishlist</h3>
    </div>
    <?php if (empty($wishlistItems)): ?>
        <p class="empty-wishlist">YOUR WISHLIST IS EMPTY. <br>BROWSE OUR PRODUCTS AND DISCOVER MORE.</p>
        <div class="empty-wishlist-btn">
            <button onclick="location.href='index.php'" class="btn-continue">Discover Now</button>
        </div>
    <?php else: ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Product Details</th>
                <th scope="col">Brand</th>
                <th scope="col">Stock</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($wishlistItems as $id => $item): ?>
                <tr>
                    <td class="image-cell">
                        <a href="product-detail.php?product_id=<?= $id ?>">
                            <img src="<?= htmlspecialchars($item['image_url']); ?>" alt="<?= htmlspecialchars($item['name']); ?>" class="image-thumbnail">
                        </a>
                    </td>
                    <td class="product-name-cell">
                        <a href="product-detail.php?product_id=<?= $id ?>"><?= htmlspecialchars($item['name']); ?></a><br>
                        <span>
                            <?= 'Color: ' . htmlspecialchars($item['color'] ?? 'N/A'); ?><br>
                            <?= 'Screen Size: ' . htmlspecialchars($item['screen_size'] ?? 'N/A'); ?><br>
                            <?= 'Storage Capacity: ' . htmlspecialchars($item['storage_capacity'] ?? 'N/A') . ' GB'; ?>
                        </span>
                    </td>
                    <td><?= htmlspecialchars(isset($item['brand']) ? $item['brand'] : 'N/A'); ?></td>
                    <td>
                        <?php
                        // Check if the stock information exists and is greater than zero
                        echo (!empty($item['stock']) && $item['stock'] > 0) ? 'In Stock' : 'Out of Stock';
                        ?>
                    </td>
                    <td>€<?= number_format($item['unit_price'], 2) ?></td>
                    <td>
                        <a href="add_to_cart.php?action=add_to_cart&product_id=<?= $id ?>" class="btn btn-primary button-cart"><i class="fa fa-shopping-cart"></i></a>
                        <a href="wishlist.php?action=remove_from_wishlist&product_id=<?= $id ?>" class="btn btn-danger button-remove"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="cart-actions">
            <button onclick="location.href='index.php'" class="btn-continue">Continue Shopping</button>
        </div>
    <?php endif; ?>
</div>