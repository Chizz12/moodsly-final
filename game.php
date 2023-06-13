<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="main.js"></script>
    <link rel="stylesheet" href="assets/css/canvas.css">
    <script src="assets/js/game.js"></script>
</head>
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

        <canvas></canvas>
</body>
</html>

