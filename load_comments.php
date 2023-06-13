<?php
include 'config.php';

// Establish database connection
$conn = mysqli_connect('localhost', 'root', '', 'db_pohon');

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get comments from the database
$sql = "SELECT * FROM comments";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="row mt-5">';
        echo '<div class="col">';
        echo '<div class="card text-center">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['comment'] . '</h5>';
        echo '</div>';
        echo '<div class="card-footer text-muted">2 days ago</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
?>
