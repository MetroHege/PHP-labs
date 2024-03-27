<?php
session_start();
$username = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['remember'])) {
        $username = $_POST['username'];
        $_SESSION['username'] = $username;
    } else {
        if(isset($_SESSION['username'])) {
            unset($_SESSION['username']);
        }
        $username = '';
    }
} else {
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }
}
?>

<form method="post">
    Username:
    <input type="text" name="username" value="<?php echo $username; ?>" required>
    <br>
    Remember me:
    <input type="checkbox" name="remember" <?php echo isset($_SESSION['username']) ? 'checked' : ''; ?>>
    <br>
    <input type="submit" value="Submit">
</form>