<div class="container custom-cart-page">
    <div class="title-line-wrapper">
        <h3>Shopping Cart</h3>
    </div>
    <?php if (empty($cartItems)): ?>
        <p class="empty-cart">YOUR SHOPPING CART IS STILL EMPTY. <br>DISCOVER ALL OUR OFFERS FOR YOU.</p>
        <div class="empty-cart-btn">
            <button onclick="location.href='index.php'" class="btn-continue">Discover Now</button>
        </div>
    <?php else: ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Product Details</th>
                <th scope="col">Brand</th>
                <th scope="col">Quantity</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Total</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="alert alert-danger">
                    <?= $_SESSION['error_message']; ?>
                </div>
                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>
            <?php foreach ($cartItems as $id => $item): ?>
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
                        <form action="cart.php?action=update&product_id=<?= $id ?>" method="post">
                            <div class="quantity-container">
                                <div class="quantity-input-changers">
                                    <input type="text" value="<?= $item['quantity'] ?>" class="quantity-input" name="quantity">
                                    <div class="quantity-changers">
                                        <a href="cart.php?action=increment&product_id=<?= $id ?>" class="quantity-change quantity-increase">+</a>
                                        <a href="cart.php?action=decrement&product_id=<?= $id ?>" class="quantity-change quantity-decrease">-</a>
                                    </div>
                                </div>
                                <button type="submit" class="quantity-update">↻</button>
                                <a href="cart.php?action=remove&product_id=<?= $id ?>" class="quantity-remove">x</a>
                            </div>
                        </form>
                    </td>

                    <td>€<?= number_format($item['unit_price'], 2) ?></td>
                    <td>€<?= number_format($item['quantity'] * $item['unit_price'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
            <tr class="empty-row">
                <td colspan="6"></td>
            </tr>

            <tr>
                <td colspan="4"></td>
                <td style="font-weight: bold">Sub-Total:</td>
                <td>€<?= number_format($cart->calculateCartTotal() * 0.8, 2) ?></td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td style="font-weight: bold">VAT (20%):</td>
                <td>€<?= number_format($cart->calculateCartTotal() * 0.20, 2) ?></td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td style="font-weight: bold">Total:</td>
                <td style="font-weight: bold">€<?= number_format($cart->calculateCartTotal(), 2) ?></td>
            </tr>
            </tbody>
        </table>
        <div class="cart-actions">
            <button onclick="location.href='index.php'" class="btn-continue">Continue Shopping</button>
            <button onclick="location.href='checkout.php'" class="btn-checkout">Checkout</button>
        </div>
    <?php endif; ?>
</div>