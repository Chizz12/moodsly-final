<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CARD POST</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
    .container {
        margin-top: 50px;
    }

    .button-container {
        margin-top: 20px;
    }

    .hidden {
        display: none;
    }
</style>

<body>

    <div class="container">

        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Ambil Pesan</h1>
                    <?php
                    include 'config.php';

                    // Menampilkan data secara acak
                    if (isset($_POST['get'])) {
                        // Mengambil data secara acak dari database
                        $sql = "SELECT * FROM tabel_data ORDER BY RAND() LIMIT 1";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);

                            // Displaying the retrieved data in the layout
                            echo '<div class="col">';
                            echo '<div class="card text-center">';
                            echo '<div class="card-text">Pesan Rahasia</div>';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . $row['judul'] . '</h5>';
                            echo '<p class="card-text">' . $row['isi'] . '</p>';
                            echo '<a href="1.html" class="btn btn-primary">Balas</a>';
                            echo '<a href="1.html" class="btn btn-warning">Reaction</a>';
                            echo '<a href="pohon.php" class="btn btn-secondary">Kembali</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        } else {
                            echo "Tidak ada data yang ditemukan.";
                        }
                    }
                    ?>
                    <form action="" method="post">
                        <div class="button-container">
                            <button type="submit" class="btn btn-primary <?php if (isset($_POST['get'])) {
                                                                                echo 'hidden';
                                                                            } ?>" name="get">Get</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-center">
            <nav class="navbar sticky-top navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Komentar</a>
                </div>
            </nav>
        </div>

        <div class="col">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Mom Sara</h5>
                    <p class="card-text">Back to home Now!</p>
                </div>
                <div class="card-footer text-muted">2 days ago
                </div>
            </div>
        </div>
    </div>
    </div>



</body>

</html>