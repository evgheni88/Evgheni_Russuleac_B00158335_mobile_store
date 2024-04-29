<div class="card mb-3 product-card">
    <div class="row g-0">
        <div class="col-md-3 d-flex align-items-center justify-content-center p-3">
            <!-- Image link -->
            <a href="product-detail.php?product_id=<?php echo $product['product_id']; ?>">
                <img src="<?php echo htmlspecialchars($product['image_url'] ?? 'path/to/default-image.jpg'); ?>" class="img-fluid product-image" alt="<?php echo htmlspecialchars($product['brand'] . ' ' . $product['model']); ?>">
            </a>

            <!-- Wishlist Icon -->
            <a href="add_to_wishlist.php?product_id=<?php echo $product['product_id']; ?>" class="wishlist-icon position-absolute top-0 start-0 p-2">
                <i class="far fa-heart"></i>
            </a>
        </div>
        <div class="col-md-9">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-end mb-0">
                    <h1 class="brand-title mb-0"><?php echo htmlspecialchars($product['brand']); ?></h1>
                    <span class="text-price-only">ONLY</span>
                </div>
                <div class="d-flex justify-content-between align-items-end mb-2">
                    <!-- Title link -->
                    <a href="product-detail.php?product_id=<?php echo $product['product_id']; ?>" class="card-title-link">
                        <h5 class="card-title"><?php echo htmlspecialchars($product['model'] . ' ' . $product['screen_size'] . '" ' . $product['storage_capacity'] . ' - ' . $product['color']); ?></h5>
                    </a>
                    <span class="text-price">€<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></span>
                </div>
                <div class="product-details d-flex">
                    <div class="card-text-1">
                        <p class="card-text">Operating <br>System <strong><?php echo htmlspecialchars($product['operating_system']); ?></strong></p>
                        <p class="card-text">Processor <strong><?php echo htmlspecialchars($product['hardware']); ?></strong></p>
                    </div>
                    <div class="card-text-2">
                        <p class="card-text">Internal <br>Storage <strong><?php echo htmlspecialchars($product['storage_capacity']); ?></strong></p>
                        <p class="card-text">Battery <strong><?php echo htmlspecialchars($product['battery_capacity']); ?></strong></p>
                    </div>
                    <div class="vertical-line"></div>
                    <div class="delivery-info">
                        <!-- Add FontAwesome icon for fast delivery -->
                        <p class="card-text"><i class="fas fa-shipping-fast"></i> Fast delivery from: €5.99</p>
                    </div>
                </div>
                <!-- Details link -->
                <a href="product-detail.php?product_id=<?php echo $product['product_id']; ?>" class="details-link">See all details</a>
            </div>
            <div class="card-footer bg-white">
                <a href="add_to_cart.php?product_id=<?php echo $product['product_id']; ?>&quantity=1" class="btn btn-danger btn-add-to-cart">ADD TO CART</a>
            </div>
        </div>
    </div>
</div>