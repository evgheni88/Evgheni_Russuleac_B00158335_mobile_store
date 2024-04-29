<?php
class Session
{
    public function killSession()
    {
        //overwrite the current session array with an empty array.
        $_SESSION = [];
        //overwrite the session cookie with empty data too.
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(),
                '', time() - 42000,
                $params['path'], $params['domain'],
                $params['secure'], $params['httponly']
            );
        }
        session_destroy();
    }
    public function forgetSession()
    {
        // Set a cookie to show a logout message on the login page
        setcookie('logout_message', 'You have been logged out successfully.', time() + 10);  // Lasts for 10 seconds

        $this->killSession();
        header("location:login.php"); /* Redirect to login page */
        exit;
    }
}