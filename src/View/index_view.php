<!-- Main Hero Section -->
<section class="hero-section">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('images/tablet-ad.jpg');">
                <div class="carousel-caption d-none d-md-block">
                    <a href="products.php?category[]=1" class="btn btn-secondary-custom">Go to Shop</a>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('images/smartphone-ad.jpg');">
                <div class="carousel-caption d-none d-md-block">
                    <a href="products.php?category[]=2" class="btn btn-primary">Go to Shop</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- Product Sections -->
<?php foreach (['Smartphones' => $data['smartphones'], 'Tablets' => $data['tablets']] as $name => $products): ?>
    <section class="product-section py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h2><?php echo $name; ?></h2>
                </div>
                <div class="col-md-6 text-right">
                    <a href="products.php?category[]=<?php echo $name == 'Smartphones' ? 1 : 2; ?>" class="btn btn-outline-secondary">Go to Shop</a>
                </div>
            </div>
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-3">
                        <div class="card mb-4 shadow-sm product-card">
                            <?php if (!empty($product['image_url'])): ?>
                                <div class="product-img-container">
                                    <img src="<?php echo htmlspecialchars($product['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['brand'] . ' ' . $product['model']); ?>">
                                    <div class="wishlist-overlay">
                                        <a href="add_to_wishlist.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-light btn-sm wishlist-btn">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    </div>
                                    <div class="overlay">
                                        <a href="add_to_cart.php?product_id=<?php echo $product['product_id']; ?>&quantity=1" class="btn btn-primary btn-sm">
                                            Add to Cart <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="product-detail.php?product_id=<?php echo $product['product_id']; ?>"><?php echo htmlspecialchars($product['brand'] . ' ' . $product['model']); ?></a>
                                </h5>
                                <p class="card-text">€<?php echo htmlspecialchars($product['price']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endforeach; ?>
