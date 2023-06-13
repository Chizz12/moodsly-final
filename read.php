<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mengambil Pesan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-success" id="nextPageBtn">Ganti Pesan</button>
                    </div>
                    <h1>Ambil Pesan</h1>
                    <?php
                    include 'config.php';

                    // Establish database connection
                    $conn = mysqli_connect('localhost', 'root', '', 'db_pohon');

                    if (!$conn) {
                        die("Database connection failed: " . mysqli_connect_error());
                    }

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
                            echo '<form action="" method="post">';
                            echo '<div class="form-group">';
                            echo '<input type="text" class="form-control" name="comment" placeholder="Masukkan komentar Anda">';
                            echo '</div>';
                            echo '<button type="submit" class="btn btn-primary" name="submitComment" data-bs-toggle="modal" data-bs-target="#successModal">Komentar</button>';
                            echo '<a href="pohon.php" class="btn btn-secondary">Kembali</a>';
                            echo '</form>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        } else {
                            echo "Tidak ada data yang ditemukan.";
                        }
                    }

                    // Process comment submission
                    if (isset($_POST['submitComment'])) {
                        $comment = $_POST['comment'];

                        // Insert comment into the database
                        $sql = "INSERT INTO tabel_data (comment) VALUES ('$comment')";
                        if (mysqli_query($conn, $sql)) {
                            // Success modal
                            echo '<script>alert("Komentar Anda berhasil disimpan.");</script>';
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    }

                    ?>
                    <form action="" method="post">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Pemberitahuan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Pastikan saat anda berkomentar, tidak menggunakan kata-kata yang negatif ataupun menyinggung suatu pihak.
                                            Untuk Keamanan kami tidak menampilkan siapa yang mengirim pesan tersebut.
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary <?php if (isset($_POST['get'])) {
                                                                            echo 'hidden';
                                                                        } ?>" name="get">Ambil Pesan</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                       

                    </form>
                </div>
            </div>
        </div>
        <nav class="navbar sticky-top navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Komentar</a>
            </div>
        </nav>
        <?php
        // Get comments from the database
        $sql = "SELECT * FROM tabel_data";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                if (!empty($row['comment'])) {
                    echo '<div class="row mt-5" ' . (isset($_POST['get']) ? '' : 'hidden') . '>';
                    echo '<div class="col">';
                    echo '<div class="card text-center">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['comment'] . '</h5>';
                    echo '</div>';
                    echo '<div class="card-footer text-muted">' . date('Y-m-d H:i:s') . '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
        }

        ?>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#nextPageBtn').click(function() {
                location.reload(); // Me-refresh halaman untuk memuat data baru secara acak
            });
        });

        var myModal = new bootstrap.Modal(document.getElementById('exampleModal')); // Inisialisasi modal
  
  // Panggil metode show untuk menampilkan modal
  myModal.show();
    </script>



</body>

</html>