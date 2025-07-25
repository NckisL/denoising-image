<?php
session_start();
$current_page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="assets/logo.png">
    <?php include('bootstrap/bootstrap.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        window.onload = function() {
            <?php if (isset($_SESSION['pesan'])): ?>
                alert("<?php echo $_SESSION['pesan']; ?>");
                <?php unset($_SESSION['pesan']); 
                ?>
            <?php endif; ?>
        }
    </script>
    <title>Reduksi Noise</title>
    <style>
    html, body {
        height: 100%;
        font-family: Arial, sans-serif;
        background: rgb(173, 207, 229);
        color: black;
        margin: 0;
        padding: 0;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    main {
        flex: 1;
        padding: 20px; /* Jarak kanan-kiri dan atas-bawah */
    }

    footer {
        background-color:rgb(92, 93, 94);
        text-align: center;
        padding: 10px 0;
        font-size: 20px;
        margin-top: 50px;
    }

    .navbar {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 1rem;
        }
        .navbar-nav .nav-link {
            margin-right: 1rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        .navbar-nav .nav-link:hover {
            color: #0d6efd;
            transform: translateY(-2px);
        }
        .navbar-nav .nav-link.active {
            color: #0d6efd;
            font-weight: bold;
            border-bottom: 2px solid #0d6efd;
        }
        .nav-icon {
            margin-right: 0.4rem;
        }
</style>

</head>
<body>
    <nav>
        <?php include "nav.php"; ?>
    </nav>
    <main>
        <section>
            <?php
            $content = "Users/home.php"; // Default content
            $mod = "";
            if (isset($_GET['page'])) {
                $mod = $_GET['page'];
            }

            switch ($mod) {
                case "Fr":
                    $content = "Menu_Users/Filter.php";
                    break;
                case "Pr":
                    $content = "Menu_Users/Profile.php";
                    break;
                default:
                    $content = "Menu_Users/home.php";
            }
            include($content);
            ?>
        </section>
        </main>
    <footer>
        <div>&copy; 2025 Noise Reduction. All rights reserved.</div>
    </footer>
</body>
</html>