<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin'] = $username;
            header('Location: add_artwork.php');
            exit();
        } else {
            $_SESSION['error'] = "Invalid password.";
            header('Location: login.php');
            exit();
        }
    } else {
        $_SESSION['error'] = "No user found.";
        header('Location: login.php');
        exit();
    }
}

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

include 'includes/header.php';
?>

<main>
    <section id="admin-dashboard">
        <h2>Admin Dashboard</h2>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['admin']); ?>!</p>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
