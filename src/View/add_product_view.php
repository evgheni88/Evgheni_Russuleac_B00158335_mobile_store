<div class="container mt-4 dash-product">
    <h1>Add New Product</h1>
    <form action="add_product.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add_product">

        <div class="row">
            <div class="col-md-4">
                <!-- Category dropdown selection -->
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-control" id="category" name="product[category_id]" required>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= htmlspecialchars($category['category_id']) ?>">
                                <?= htmlspecialchars($category['category_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Text inputs for product details with simple HTML sanitization on output for security -->
                <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" class="form-control" id="brand" name="product[brand]" required>
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control" id="model" name="product[model]" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="product[price]" required>
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class="form-control" id="color" name="product[color]" required>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Input fields for additional product details -->
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="product[quantity]" required>
                </div>
                <div class="mb-3">
                    <label for="screen_size" class="form-label">Screen Size</label>
                    <input type="text" class="form-control" id="screen_size" name="product[screen_size]" required>
                </div>
                <div class="mb-3">
                    <label for="battery_capacity" class="form-label">Battery Capacity</label>
                    <input type="text" class="form-control" id="battery_capacity" name="product[battery_capacity]" required>
                </div>
                <div class="mb-3">
                    <label for="storage_capacity" class="form-label">Storage Capacity</label>
                    <input type="text" class="form-control" id="storage_capacity" name="product[storage_capacity]" required>
                </div>
                <div class="mb-3">
                    <label for="hardware" class="form-label">Hardware</label>
                    <input type="text" class="form-control" id="hardware" name="product[hardware]" required>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Additional specs -->
                <div class="mb-3">
                    <label for="front_camera_quality" class="form-label">Front Camera Quality</label>
                    <input type="text" class="form-control" id="front_camera_quality" name="product[front_camera_quality]" required>
                </div>
                <div class="mb-3">
                    <label for="back_camera_quality" class="form-label">Back Camera Quality</label>
                    <input type="text" class="form-control" id="back_camera_quality" name="product[back_camera_quality]" required>
                </div>
                <div class="mb-3">
                    <label for="operating_system" class="form-label">Operating System</label>
                    <input type="text" class="form-control" id="operating_system" name="product[operating_system]" required>
                </div>
                <div class="mb-3">
                    <label for="image_name" class="form-label">Image Name</label>
                    <input type="text" class="form-control" id="image_name" name="image_name" placeholder="Enter image name" required>
                </div>
            </div>
        </div>

        <!-- Product Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="product[description]" rows="3" required></textarea>
        </div>

        <!-- Submission button -->
        <button type="submit" class="btn btn-primary btn-lg btn-block">Add Product</button>
    </form>
</div>
