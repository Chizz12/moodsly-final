<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Welcome</title>
    <link rel="stylesheet" href="assets/css/index.css" />
</head>

<body>
    <section>
        <div class="circle"></div>
        <header>
            <a href="#">
                <h1>Moodsly</h1>
            </a>
            <ul>
                <li><a href="#" data-modal-target="#myModal">Beranda</a></li>
                <li><a href="#" data-modal-target="#myModal">Permainan</a></li>
                <li><a href="#" data-modal-target="#myModal">Akun Saya</a></li>
            </ul>
            <!-- Modal -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <p>Anda Harus Login terlebih dahulu</p>
                </div>
            </div>
        </header>
        <div class="content">
            <div class="textBox">
                <h2>Selamat Datang<br>Semuanya<span>!!</span></h2>
                <p>Ceritakan dan Ungkapkan semua yang mengganjal untukmu. Tanpa harus takut rahasiamu terbongkar Bersama Website
                    Favorite-Mu!</p>
                <a href="login.php">Coba Sekarang</a>
            </div>
            <div class="imgBox">
                <img src="assets/img/han.png" class="starbucks" width="500px" height="500px">
            </div>
        </div>
        </div>
        <ul class="thumb">
            <li><img src="assets/img/han.png" onclick="imgSlider('assets/img/han.png')"></li>
            <li><img src="assets/img/han2.png" onclick="imgSlider('assets/img/han2.png')"></li>
            <li><img src="assets/img/han3.png" onclick="imgSlider('assets/img/han3.png')"></li>
        </ul>
        <ul class="sci">
            <li><a href="#"><img src="assets/img/facebook.png"></a></li>
            <li><a href="#"><img src="assets/img/twitter.png"></a></li>
            <li><a href="#"><img src="assets/img/instagram.png"></a></li>
        </ul>
    </section>

    <script type="text/javascript">
        function imgSlider(anything) {
            document.querySelector('.starbucks').src = anything;
        }
        var currentImageIndex = 0;
        var images = ['assets/img/han.png', 'assets/img/han2.png', 'assets/img/han3.png']; // Daftar gambar untuk slider
        var sliderInterval;

        function startSlider() {
            sliderInterval = setInterval(changeImage, 2000); // Mengubah gambar setiap 2 detik (2000ms)
        }

        function changeImage() {
            currentImageIndex = (currentImageIndex + 1) % images.length; // Mengatur indeks gambar berikutnya
            var currentImage = images[currentImageIndex];
            document.querySelector('.starbucks').src = currentImage; // Mengubah sumber gambar
        }

        function stopSlider() {
            clearInterval(sliderInterval);
        }

        document.addEventListener('DOMContentLoaded', function () {
            // ...
            startSlider(); // Mulai slider otomatis saat halaman dimuat
        });
        document.addEventListener('DOMContentLoaded', function () {
            var modalLinks = document.querySelectorAll('li a[data-modal-target]');
            var modals = document.querySelectorAll('.modal');
            var closeButtons = document.querySelectorAll('.close');

            modalLinks.forEach(function (link) {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    var target = link.getAttribute('data-modal-target');
                    var modal = document.querySelector(target);
                    modal.style.display = 'block';
                });
            });

            closeButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    var modal = button.closest('.modal');
                    modal.style.display = 'none';
                });
            });

            window.addEventListener('click', function (event) {
                modals.forEach(function (modal) {
                    if (event.target == modal) {
                        modal.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>

</html>