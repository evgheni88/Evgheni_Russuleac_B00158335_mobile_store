<div class="container mt-4 dash-product">
    <h1>Edit Product</h1>
    <?php if ($product): ?>
        <form action="edit_product.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="edit_product">
            <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['product_id'] ?? '') ?>">

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-control" id="category" name="product[category_id]" required>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= htmlspecialchars($category['category_id']) ?>" <?= $product['category_id'] == $category['category_id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($category['category_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" class="form-control" id="brand" name="product[brand]" value="<?= htmlspecialchars($product['brand'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" class="form-control" id="model" name="product[model]" value="<?= htmlspecialchars($product['model'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="product[price]" value="<?= htmlspecialchars($product['price'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" class="form-control" id="color" name="product[color]" value="<?= htmlspecialchars($product['color'] ?? '') ?>" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="product[quantity]" value="<?= htmlspecialchars($product['Quantity']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="screen_size" class="form-label">Screen Size</label>
                        <input type="text" class="form-control" id="screen_size" name="product[screen_size]" value="<?= htmlspecialchars($product['screen_size'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="battery_capacity" class="form-label">Battery Capacity</label>
                        <input type="text" class="form-control" id="battery_capacity" name="product[battery_capacity]" value="<?= htmlspecialchars($product['battery_capacity'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="storage_capacity" class="form-label">Storage Capacity</label>
                        <input type="text" class="form-control" id="storage_capacity" name="product[storage_capacity]" value="<?= htmlspecialchars($product['storage_capacity'] ?? '') ?>" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="front_camera_quality" class="form-label">Front Camera Quality</label>
                        <input type="text" class="form-control" id="front_camera_quality" name="product[front_camera_quality]" value="<?= htmlspecialchars($product['front_camera_quality'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="back_camera_quality" class="form-label">Back Camera Quality</label>
                        <input type="text" class="form-control" id="back_camera_quality" name="product[back_camera_quality]" value="<?= htmlspecialchars($product['back_camera_quality'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="operating_system" class="form-label">Operating System</label>
                        <input type="text" class="form-control" id="operating_system" name="product[operating_system]" value="<?= htmlspecialchars($product['operating_system'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="hardware" class="form-label">Hardware</label>
                        <input type="text" class="form-control" id="hardware" name="product[hardware]" value="<?= htmlspecialchars($product['hardware'] ?? '') ?>" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="product[description]" rows="3" required><?= htmlspecialchars($product['description'] ?? '') ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">Update Product</button>
        </form>
    <?php else: ?>
        <p>Product not found.</p>
    <?php endif; ?>
</div>