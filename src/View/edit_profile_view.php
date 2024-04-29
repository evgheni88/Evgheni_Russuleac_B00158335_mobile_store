<div class="container edit-profile">
    <div class="main-body">
        <!-- Display any messages -->
        <?php if (!empty($message)) echo $message; ?>

        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <!-- Card for profile image and user info -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="<?= $avatarImage ?>" alt="User profile picture" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4><?= htmlspecialchars($userDetails['firstname'] ?? '') . ' ' . htmlspecialchars($userDetails['lastname'] ?? ''); ?></h4>
                                <p class="text-secondary mb-1"><?= $userDetails['user_type'] === 'Administrator' ? 'Administrator' : 'Standard User'; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <!-- Form for editing user details -->
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="edit_profile.php" method="post">
                            <!-- Title -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Title</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select name="title" class="form-control">
                                        <option value="Mr." <?= $userDetails['title'] === 'Mr.' ? 'selected' : ''; ?>>Mr.</option>
                                        <option value="Mrs." <?= $userDetails['title'] === 'Mrs.' ? 'selected' : ''; ?>>Mrs.</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3"><h6 class="mb-0">First Name</h6></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="firstname" class="form-control" value="<?= htmlspecialchars($userDetails['firstname'] ?? ''); ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3"><h6 class="mb-0">Last Name</h6></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="lastname" class="form-control" value="<?= htmlspecialchars($userDetails['lastname'] ?? ''); ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3"><h6 class="mb-0">Date of Birth</h6></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="date" name="birthdate" class="form-control" value="<?= htmlspecialchars($userDetails['birthdate'] ?? ''); ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3"><h6 class="mb-0">Email</h6></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($userDetails['email']); ?>" disabled>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3"><h6 class="mb-0">Phone</h6></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="phone_number" class="form-control" value="<?= htmlspecialchars($userDetails['phone_number'] ?? ''); ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3"><h6 class="mb-0">Address Line 1</h6></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="address_line1" class="form-control" value="<?= htmlspecialchars($userDetails['address_line1'] ?? ''); ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3"><h6 class="mb-0">Address Line 2</h6></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="address_line2" class="form-control" value="<?= htmlspecialchars($userDetails['address_line2'] ?? ''); ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3"><h6 class="mb-0">City</h6></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="city" class="form-control" value="<?= htmlspecialchars($userDetails['city'] ?? ''); ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3"><h6 class="mb-0">Postal Code</h6></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="postal_code" class="form-control" value="<?= htmlspecialchars($userDetails['postal_code'] ?? ''); ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3"><h6 class="mb-0">Country</h6></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="country" class="form-control" value="<?= htmlspecialchars($userDetails['country'] ?? ''); ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>