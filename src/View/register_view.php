<div class="registration-page">
    <div class="form-header">
        <h2>Create An Account</h2>
    </div>
    <?php if (!empty($message)): ?>
        <p class="alert alert-danger"><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="register.php" method="post" class="registration-form" onsubmit="return validatePassword();">
        <p class="login-invite">Already have an account? <a href="login.php">Log in instead!</a></p>
        <div class="form-row">
            <span class="form-label">Title</span>
            <input type="radio" id="Mr" name="title" value="Mr">
            <label for="Mr">Mr.</label>
            <input type="radio" id="Mrs" name="title" value="Mrs">
            <label for="Mrs">Mrs.</label>
        </div>
        <div class="form-row">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" id="firstname" name="firstname" required>
        </div>
        <div class="form-row">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" id="lastname" name="lastname" required>
        </div>
        <div class="form-row">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-row">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-row">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <div class="form-row">
            <label for="birthdate" class="form-label">Birthdate (Optional)</label>
            <input type="date" id="birthdate" name="birthdate" placeholder="YYYY-MM-DD">
        </div>
        <div class="form-row">
            <button type="submit" class="form-submit">Register</button>
        </div>
    </form>
</div>