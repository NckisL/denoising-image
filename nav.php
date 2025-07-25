<?php
    $current_page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <img src="assets/logo.png" alt="Logo" width="60" height="60" class="d-inline-block align-text-top me-3">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'home' ? 'active' : ''; ?>"
                            href="index.php"><i class="fas fa-home nav-icon"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'Fr' ? 'active' : ''; ?>"
                            href="index.php?page=Fr"><i class="fas fa-filter nav-icon"></i>Filter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'Pr' ? 'active' : ''; ?>"
                            href="index.php?page=Pr"><i class="fas fa-user nav-icon"></i>Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

