<?php
include 'config.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
// Mengatur tindakan saat tombol "Post" ditekan
if (isset($_POST['post'])) {
    // Mendapatkan data yang akan diinputkan (misalnya "nama" dan "email")
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    // Menyimpan data ke database
    $sql = "INSERT INTO tabel_data (judul, isi) VALUES ('$judul', '$isi')";
    if (mysqli_query($conn, $sql)) {
        header("Location: pohon.php"); // Redirect ke halaman index
        exit(); // Menghentikan eksekusi script setelah redirect
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

// Mengatur tindakan saat tombol "Get" ditekan
if (isset($_POST['get'])) {
    // Mengambil data secara acak dari database
    $sql = "SELECT * FROM tabel_data ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "Judul: " . $row['judul'] . "<br>";
        echo "Isi: " . $row['isi'] . "<br>";
    } else {
        echo "Tidak ada data yang ditemukan.";
    }
}

// Menutup koneksi ke database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Moodsly Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="assets/css/css.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background-image: url("assets/img/BACK.jpg");
            background-size: cover;
            background-position: center;
        }

        .card {
            background-color: rgba(0, 0, 0, 0);
            border: none;
        }

        header {
            top: 5;
            left: 0;
            width: 100%;
            padding: 20px 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo {
            position: relative;
            max-width: 80px;
        }

        header ul {
            position: relative;
            display: flex;
        }

        header ul li {
            list-style: none;
        }

        header ul li a {
            display: inline-block;
            color: #333;
            font-weight: 400;
            margin-left: 40px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <section>
        <div class="circle"></div>
        <header>
            <a href="pohon.php">
                <h1>Moodsly</h1>
            </a>
            <ul>
                <li><a href="pohon.php">Beranda</a></li>
                <li><a href="game.php">Permainan</a></li>
                <li class="" data-bs-toggle="modal" data-bs-target="#logoutModal"><a href="#">Akun Saya</a></li>
            </ul>

        </header>
    </section>

    <div class="card mb-3">
        <a href="#"><img src="assets/img/tree.png" width="500" height="600" class="rounded mx-auto d-block" data-bs-toggle="modal" data-bs-target="#exampleModal"></a>
    </div>
    <div class="toast-container bottom-1 start-50 translate-middle-x">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="exampleToast">
            <div class="toast-body">
                Ambil Pesan Rahasia Disini!
                <div class="mt-2 pt-2 border-top">
                    <a href="read.php" class="btn btn-primary btn-sm">Ambil</a>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="toast">Nanti</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <form action="" method="post">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pemberitahuan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Pastikan saat anda memasukan pesan rahasia, tidak menggunakan kata-kata yang negatif ataupun menyinggung suatu pihak.
                            Untuk Keamanan kami tidak menampilkan siapa yang mengirim pesan tersebut.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <a href="add.php"><button type="button" class="btn btn-primary">Lanjutkan</button></a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pemberitahuan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><?php echo "<h1>Hallo " . $_SESSION['username'] ."!". "</h1>"; ?>
                        ingin keluar dari akun anda?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <a href="logout.php"><button type="button" class="btn btn-primary">Logout</button></a>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        var myToast = new bootstrap.Toast(document.getElementById('exampleToast')); // Inisialisasi modal

        // Panggil metode show untuk menampilkan modal
        myToast.show();
    </script>
</body>

</html>