<div class="product-detail-page">
    <div class="product-detail-container py-5">
        <div class="row">
            <div class="col-md-6">
                <!-- Bootstrap Carousel for Main Image Display -->
                <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($images as $index => $image): ?>
                            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                <img src="<?php echo htmlspecialchars($image['image_url']); ?>" class="d-block w-100" alt="Product Image">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <!-- Thumbnails as Grid or Flexbox -->
                <div class="d-flex flex-row flex-wrap mt-2">
                    <?php foreach ($images as $index => $image): ?>
                        <img src="<?php echo htmlspecialchars($image['image_url']); ?>" class="img-thumbnail me-1" style="width: 100px; cursor:pointer;" alt="Thumbnail" data-bs-target="#imageCarousel" data-bs-slide-to="<?php echo $index; ?>">
                    <?php endforeach; ?>
                </div>
            </div>


            <div class="col-md-6">
                <h1><?php echo htmlspecialchars($product['brand']) . " " . htmlspecialchars($product['model']) . " - " . htmlspecialchars($product['screen_size']) . "\" " . htmlspecialchars($product['color']); ?></h1>
                <p class="price"><span>Only</span> €<?php echo htmlspecialchars($product['price']); ?></p>
                <div class="product-detail-page">
                    <div class="product-specs">
                        <div class="spec-row"><span class="spec-name">Color:</span><span class="spec-detail"><?php echo htmlspecialchars($product['color']); ?></span></div>
                        <div class="spec-row"><span class="spec-name">Screen Size:</span><span class="spec-detail"><?php echo htmlspecialchars($product['screen_size']); ?>"</span></div>
                        <div class="spec-row"><span class="spec-name">Battery Capacity:</span><span class="spec-detail"><?php echo htmlspecialchars($product['battery_capacity']); ?></span></div>
                        <div class="spec-row"><span class="spec-name">Storage Capacity:</span><span class="spec-detail"><?php echo htmlspecialchars($product['storage_capacity']); ?></span></div>
                        <div class="spec-row"><span class="spec-name">Front Camera Quality:</span><span class="spec-detail"><?php echo htmlspecialchars($product['front_camera_quality']); ?></span></div>
                        <div class="spec-row"><span class="spec-name">Back Camera Quality:</span><span class="spec-detail"><?php echo htmlspecialchars($product['back_camera_quality']); ?></span></div>
                        <div class="spec-row"><span class="spec-name">Operating System:</span><span class="spec-detail"><?php echo htmlspecialchars($product['operating_system']); ?></span></div>
                        <div class="spec-row"><span class="spec-name">Hardware:</span><span class="spec-detail"><?php echo htmlspecialchars($product['hardware']); ?></span></div>
                    </div>
                    <div class="purchase-info mt-2">
                        <form action="add_to_cart.php" method="GET">
                            <div class="quantity-info d-flex align-items-center">
                                <label for="quantity" class="me-2">Quantity:</label>
                                <input type="number" id="quantity" name="quantity" value="1" min="1" max="<?php echo htmlspecialchars($product['Quantity']); ?>" class="form-control me-2" style="width: auto;">
                                <span><?php echo htmlspecialchars($product['Quantity']); ?> available</span>
                            </div>
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                            <button type="submit" class="btn btn-primary mt-2">Add to Cart</button>
                        </form>
                        <form action="add_to_wishlist.php" method="get">
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                            <button type="submit" class="btn btn-primary">Add to Wishlist</button>
                        </form>

                    </div>
                </div>
            </div>

            <!-- Tabs for Description and Reviews -->
            <div class="my-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab"><?php echo nl2br(htmlspecialchars($product['description'])); ?></div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <h2>Customer Reviews</h2>

                        <!-- Section to Display Reviews -->
                        <div class="reviews-container mb-4">
                            <h3>Recent Reviews</h3>
                            <!-- Dynamically generated reviews should be displayed here -->
                            <!-- Example static review -->
                            <div class="review">
                                <p class="rating">★★★★☆</p>
                                <p class="user">John Smith</p>
                                <p class="comment">I recently purchased this product, and I've been thoroughly impressed!
                                    The display is stunningly crisp, and the colors are vibrant, making every photo and video look spectacular.
                                    Battery life has been solid too, easily lasting a full day with moderate to heavy use. On top of that,
                                    the camera quality, especially in low light, has exceeded my expectations.
                                    Highly recommend this phone to anyone looking for top-notch performance and great photos!</p>
                                <!-- More reviews -->
                            </div>

                            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                                <!-- Review Form for Logged-In Users -->
                                <div class="review-form">
                                    <h4>Write Your Review</h4>
                                    <form action="#" method="post">
                                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                                        <div class="mb-3">
                                            <label for="rating" class="form-label">Rating</label>
                                            <select class="form-select" id="rating" name="rating">
                                                <option value="5">5 Stars</option>
                                                <option value="4">4 Stars</option>
                                                <option value="3">3 Stars</option>
                                                <option value="2">2 Stars</option>
                                                <option value="1">1 Star</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="review" class="form-label">Review</label>
                                            <textarea class="form-control" id="review" name="review" rows="3" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit Review</button>
                                    </form>
                                </div>
                            <?php else: ?>
                                <!-- Prompt for Non-Logged-In Users -->
                                <div class="login-prompt">
                                    <p>Please <a href="login.php" class="btn btn-primary">Log in</a> to write a review.</p>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>