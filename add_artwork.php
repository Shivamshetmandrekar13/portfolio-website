<?php
session_start();
include 'includes/db.php';?>
<?php
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target = "assets/images/" . basename($image);

    $sql = "INSERT INTO artworks (title, description, image) VALUES ('$title', '$description', '$image')";
    if ($conn->query($sql) === TRUE) {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        echo "New artwork added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php include 'includes/header.php'; ?>

<main>
    <section id="add-artwork">
        <h2>Add New Artwork</h2>
        <form action="add_artwork.php" method="POST" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" required>
            <button type="submit">Add Artwork</button>
        </form>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
