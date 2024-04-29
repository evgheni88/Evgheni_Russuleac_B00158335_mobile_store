<div class="container mt-4 dashboard">
    <?php if (isset($_SESSION['dashboard_success'])): ?>
        <div class="alert alert-success text-center" role="alert">
            <?= $_SESSION['dashboard_success']; ?>
            <?php unset($_SESSION['dashboard_success']); // Clear the message after displaying it ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['dashboard_error'])): ?>
        <div class="alert alert-danger text-center" role="alert">
            <?= $_SESSION['dashboard_error']; ?>
            <?php unset($_SESSION['dashboard_error']); // Clear the message after displaying it ?>
        </div>
    <?php endif; ?>
    <h1 class="mb-4">Administrator Dashboard</h1>
    <div class="row">
        <!-- Sidebar navigation -->
        <div class="col-md-3 sidebar">
            <div class="list-group">
                <a href="#v-pills-products" class="list-group-item list-group-item-action active" data-bs-toggle="pill">Products</a>
                <a href="#v-pills-orders" class="list-group-item list-group-item-action" data-bs-toggle="pill">Orders</a>
                <a href="#v-pills-users" class="list-group-item list-group-item-action" data-bs-toggle="pill">Users</a>
                <a href="#v-pills-reviews" class="list-group-item list-group-item-action" data-bs-toggle="pill">Reviews</a>
                <!-- Additional tabs can be added here -->
            </div>
        </div>

        <!-- Tab content -->
        <div class="col-md-9">
            <div class="tab-content product-dash" id="v-pills-tabContent">
                <!-- Products tab pane -->
                <div class="tab-pane fade show active" id="v-pills-products" role="tabpanel">
                    <div class="container mt-4">
                        <h2>Product Management</h2>
                        <!-- Link to Add New Product Page -->
                        <div class="mb-3">
                            <a href="add_product.php" class="btn btn-primary">Add New Product</a>
                        </div>

                        <!-- Products table -->
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table-dark">
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Loop through products and display them -->
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td><img src="<?= htmlspecialchars($product['image_url'] ?? '') ?>" alt="<?= htmlspecialchars($product['brand'] . ' ' . $product['model']) ?>" class="img-thumbnail" style="width: 50px; height: auto;"></td>
                                        <td><?= htmlspecialchars($product['brand']) . ' ' . htmlspecialchars($product['model']) ?></td>
                                        <td>€<?= htmlspecialchars($product['price']) ?></td>
                                        <td><?= htmlspecialchars($product['Quantity'] ?? 'N/A') ?></td>
                                        <td>
                                            <a href="edit_product.php?product_id=<?= $product['product_id'] ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></a>
                                            <form method="post" action="delete_product.php" style="display: inline-block;">
                                                <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <?php include '../src/View/Snippets/pagination.php'; ?>

                    </div>
                </div>

                <!-- Orders tab pane -->
                <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
                    <h2>Orders Management</h2>
                    <p>Feature coming soon!</p>
                </div>
                <!-- Users tab pane -->
                <div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab">
                    <h2>User Management</h2>
                    <p>Feature coming soon!</p>
                </div>
                <!-- Reviews tab pane -->
                <div class="tab-pane fade" id="v-pills-reviews" role="tabpanel" aria-labelledby="v-pills-reviews-tab">
                    <h2>Review Management</h2>
                    <p>Feature coming soon!</p>
                </div>
                <!-- Additional tab panes can be added here -->
            </div>
        </div>
    </div>
</div>
