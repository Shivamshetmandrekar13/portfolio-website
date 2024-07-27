<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<main>
    <section id="art-gallery">
        <h2>Recent Works</h2>
        <div class="gallery">
            <?php
            $sql = "SELECT * FROM artworks LIMIT 6";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='art-item' data-title='" . $row["title"] . "' data-description='" . $row["description"] . "' data-image='assets/images/" . $row["image"] . "'>";
                    echo "<img src='assets/images/" . $row["image"] . "' alt='" . $row["title"] . "'>";
                    echo "<h3>" . $row["title"] . "</h3>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </section>
</main>

<!-- Modal for artwork details -->
<div id="artworkModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <img id="modalImage" src="" alt="Artwork">
        <h3 id="modalTitle"></h3>
        <p id="modalDescription"></p>
    </div>
</div>

<script src="assets/script.js"></script>

<?php include 'includes/footer.php'; ?>

