<div class="login-page">
    <div class="form-header">
        <h2>Log In To Your Account</h2>
    </div>
    <form action="login.php" method="post" class="login-form">
        <div class="form-row">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" id="email" name="email" required autocomplete="username">
        </div>
        <div class="form-row">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" required autocomplete="current-password">
        </div>
        <div class="form-row">
            <p class="forgot-password"><a href="password_recovery.php" class="recovery-link">Forgot your password?</a></p>
        </div>
        <div class="form-row button-row">
            <button type="submit" class="login-submit">Sign In</button>
        </div>
        <div class="form-row">
            <p class="no-account">No account? <a href="register.php" class="register-link">Create one here</a></p>
        </div>
    </form>
</div>