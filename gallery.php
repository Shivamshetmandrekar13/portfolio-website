<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artworks Gallery</title>
    <link rel="stylesheet" href="assets/CSS/style.css">
</head>
<body>
<h1>Gallery</h1>
<div class="artworks-container">
    <?php
    // Fetch artworks from the database
    $sql = "SELECT id, title, description, image, created_at FROM portfolio.artworks";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="artwork-card" data-id="' . $row["id"] . '" data-description="' . htmlspecialchars($row["description"]) . '">';
            echo '<img src="images/' . $row["image"] . '" alt="' . htmlspecialchars($row["title"]) . '">';
            echo '<h2>' . htmlspecialchars($row["title"]) . '</h2>';
            echo '</div>';
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</div>

<div id="artwork-modal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="modal-img">
    <div class="description" id="modal-description"></div>
    <div class="controls">
        <button class="prev">&lt;</button>
        <button class="next">&gt;</button>
    </div>
</div>

<script src="assets/script.js"></script>

<?php include 'includes/footer.php'; ?>
</body>
</html>
