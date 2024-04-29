<div class="container profile">
    <div class="main-body">
        <!-- User profile header -->
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <!-- Profile image placeholder -->
                            <img src="<?= $avatarImage ?>" alt="User profile picture" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4><?= safePrint($userDetails['firstname']) . ' ' . safePrint($userDetails['lastname']); ?></h4>
                                <p class="text-secondary mb-1">
                                    <?= $userDetails['user_type'] === 'Administrator' ? 'Administrator' : 'Standard User'; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User details -->
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= safePrint($userDetails['firstname']) . ' ' . safePrint($userDetails['lastname']); ?>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Date of Birth</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= safePrint($userDetails['birthdate']); ?>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= safePrint($userDetails['email']); ?>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= safePrint($userDetails['phone_number']); ?>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= safePrint($address); ?>
                            </div>
                        </div>
                        <hr>

                        <!-- Edit profile button -->
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-info" href="edit_profile.php">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>