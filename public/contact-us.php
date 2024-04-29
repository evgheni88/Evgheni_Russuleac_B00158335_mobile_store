<?php
include 'templates/header.php';
?>
    <div class="container my-5 contact-us">
        <div class="text-center mb-5">
            <h2>Contact Us</h2>
            <p class="text-muted">We're here to help with any questions or feedback you have about our services. Our team is dedicated to providing you with the best customer experience possible. <br>Reach out to us anytime - whether it's a query about our products, assistance with your order, or just to say hello. We're all ears and ready to assist you!</p>
        </div>

        <div class="row g-4">
            <div class="col-md-3 text-center">
                <div class="icon-box">
                    <i class="bi bi-geo-alt"></i>
                    <h5>ADDRESS STREET</h5>
                    <p>No 40 Grafton Street <br>Dublin, Ireland.</p>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="icon-box">
                    <i class="bi bi-telephone"></i>
                    <h5>NUMBER PHONE</h5>
                    <p>Phone 1: (01234) 567 89012<br>Phone 2: (0987) 567 890</p>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="icon-box">
                    <i class="bi bi-printer"></i>
                    <h5>NUMBER FAX</h5>
                    <p>Fax 1: (01234) 567 89012<br>Fax 2: (0987) 567 890</p>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="icon-box">
                    <i class="bi bi-envelope"></i>
                    <h5>ADDRESS EMAIL</h5>
                    <p>info@phoneshop.com<br>support@phoneshop.com</p>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-12">
                <form action="path/to/your/server/script" method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name *" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="Your Email *" required>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="subject" class="form-control" placeholder="Subject *" required>
                        </div>
                        <div class="col-md-12">
                            <textarea name="message" class="form-control" placeholder="Your Message *" rows="6" required></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include 'templates/footer.php';
?>