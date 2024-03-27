<?php
$username = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['remember'])) {
        $username = $_POST['username'];
        setcookie('username', $username, time() + (86400 * 30), "/"); // 86400 = 1 day
    } else {
        if(isset($_COOKIE['username'])) {
            unset($_COOKIE['username']);
            setcookie('username', '', time() - 3600, '/'); // empty value and old timestamp
        }
        $username = ''; // Clear the username field
    }
} else {
    if(isset($_COOKIE['username'])) {
        $username = $_COOKIE['username'];
    }
}
?>

<form method="post">
    Username:
    <input type="text" name="username" value="<?php echo $username; ?>" required>
    <br>
    Remember me:
    <input type="checkbox" name="remember" <?php echo isset($_COOKIE['username']) ? 'checked' : ''; ?>>
    <br>
    <input type="submit" value="Submit">
</form>