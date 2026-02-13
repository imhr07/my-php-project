<?php
session_start();
// Check if customer session is set
$isCustomerSession = isset($_SESSION['customer_id']) ? true : false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velocity Rentals - Premium Car Rental</title>

    <!-- Google Fts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>

        body {
            font-family: 'Poppins', sans-serif;
        }

        /* HERO SECTION */
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                        url('Car Image.jpg');  /* <-- apna new image name */
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero-content {
            max-width: 700px;
            animation: fadeIn 1.5s ease-in-out;
        }

        .hero-content h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 3.2rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .hero-content p {
            font-size: 1.3rem;
            margin-top: 15px;
        }

        .custom-btn {
            background-color: #00bcd4;
            border: none;
            padding: 14px 28px;
            font-size: 1.2rem;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .custom-btn:hover {
            background-color: #0097a7;
            transform: translateY(-3px);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        /* ===== MODERN CAR CARD ===== */

.modern-card {
    background: #fff;
    border-radius: 18px;
    overflow: hidden;
    transition: 0.4s ease;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

.modern-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.image-wrapper {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.4s ease;
}

.modern-card:hover img {
    transform: scale(1.08);
}

.price-badge {
    position: absolute;
    bottom: 15px;
    right: 15px;
    background: linear-gradient(45deg, #007bff, #00c6ff);
    color: #fff;
    padding: 8px 15px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 14px;
}

.price-badge span {
    font-size: 11px;
    opacity: 0.9;
}

.card-content {
    padding: 20px;
    text-align: center;
}

.card-content h4 {
    font-weight: 700;
    margin-bottom: 5px;
}

.agency {
    color: #888;
    font-size: 14px;
    margin-bottom: 15px;
}

.features {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    font-size: 13px;
    margin-bottom: 15px;
}

.features span {
    margin: 5px 0;
}
/* ===== MODERN RENT BUTTON ===== */

.rent-btn {
    display: block;
    width: 100%;
    text-align: center;
    cursor: pointer;

    background: linear-gradient(135deg, #0066ff, #00c6ff);
    border: none;
    border-radius: 40px;
    padding: 14px;

    font-weight: 600;
    font-size: 15px;
    color: #ffffff;

    transition: all 0.3s ease;
    box-shadow: 0 8px 20px rgba(0, 102, 255, 0.35);
}

.rent-btn:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 30px rgba(0, 102, 255, 0.5);
    background: linear-gradient(135deg, #0044cc, #0096ff);
}

.login-text {
    margin-top: 12px;
    font-size: 13px;
    color: #666;
    background: #f5f7fa;
    padding: 8px 14px;
    border-radius: 25px;
    display: inline-block;
}
/* ===== MODERN NAVBAR DESIGN ===== */

.custom-navbar {
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    padding: 15px 0;
}

.brand-logo {
    font-weight: 700;
    font-size: 22px;
    color: #ffffff !important;
    letter-spacing: 1px;
}

.nav-modern {
    color: #ffffff !important;
    font-weight: 500;
    margin-right: 15px;
    transition: 0.3s ease;
}

.nav-modern:hover {
    color: #00c6ff !important;
}

.btn-signup {
    background: linear-gradient(135deg, #00c6ff, #0072ff);
    color: #fff !important;
    border-radius: 30px;
    padding: 8px 20px;
    font-weight: 600;
    transition: 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,114,255,0.4);
}

.btn-signup:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0,114,255,0.6);
}

.btn-logout {
    background: linear-gradient(135deg, #ff4e50, #f00000);
    color: #fff !important;
    border-radius: 30px;
    padding: 8px 18px;
    font-weight: 600;
    transition: 0.3s ease;
}

.btn-logout:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(255,0,0,0.4);
}
.feature-section {
    background: #f8fbff;
}

.feature-card {
    background: #ffffff;
    padding: 30px 20px;
    border-radius: 20px;
    transition: 0.4s ease;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

.feature-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.feature-icon {
    width: 70px;
    height: 70px;
    margin: 0 auto 15px;
    border-radius: 50%;
    background: linear-gradient(135deg, #0066ff, #00c6ff);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 28px;
}
/* ===== MODERN FOOTER ===== */

.modern-footer {
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    padding: 30px 0;
    color: #fff;
    font-size: 14px;
    letter-spacing: 0.5px;
}

.modern-footer strong {
    color: #00c6ff;
}

.social-icons {
    margin-top: 10px;
}

.social-icons a {
    color: #fff;
    margin: 0 10px;
    font-size: 16px;
    transition: 0.3s ease;
}

.social-icons a:hover {
    color: #00c6ff;
    transform: translateY(-3px);
}



    </style>
</head>


<body>

    <!-- Navbar -->
  <!-- ===== MODERN NAVBAR ===== -->
<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand brand-logo" href="#">
            <i class="fas fa-car-side mr-2"></i> Velocity Rentals
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ml-auto align-items-center">

                <?php if (isset($_SESSION["customer_id"]) || isset($_SESSION["agency_id"])): ?>

                    <?php if (isset($_SESSION["customer_id"])): ?>
                        <li class="nav-item">
                            <a class="nav-link nav-modern" href="customer/bookings.php">
                                <i class="fas fa-car"></i> My Bookings
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION["agency_id"])): ?>
                        <li class="nav-item">
                            <a class="nav-link nav-modern" href="agency/dashboard.php">
                                Dashboard
                            </a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <a class="btn btn-logout ml-3" href="logout.php">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>

                <?php else: ?>

                    <li class="nav-item">
                        <a class="nav-link nav-modern" href="signin.php">
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-signup ml-3" href="signup.php">
                            Sign Up
                        </a>
                    </li>

                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>


    <!-- Hero Section -->
   <section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1>Drive Your Dream Ride Today</h1>
            <p>Premium, Affordable & Hassle-Free Car Rentals</p>
            <a href="#available-cars" class="btn custom-btn mt-3">
                View Available Cars
            </a>
        </div>
    </div>
</section>
    <!-- Features Section -->
   <section id="features" class="py-5 feature-section">
    <div class="container">
        <div class="row text-center">

            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <h4>Wide Range of Cars</h4>
                    <p>Choose from economy to luxury vehicles tailored to your journey.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <h4>Affordable Pricing</h4>
                    <p>Transparent pricing with no hidden charges. Best value guaranteed.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h4>Instant Booking</h4>
                    <p>Book your ride in seconds with our smooth & secure platform.</p>
                </div>
            </div>

        </div>
    </div>
</section>


    <!-- Available Cars Section -->
    <section id="available-cars" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Available Cars for Rent</h2>
            <div class="container mt-5">
                <div id="carContainer" class="row"></div>
                <div id="loading" class="spinner-border text-primary" role="status" style="display: none;">
                    <span class="visually-hidden"></span>
                </div>
                <button id="moreBtn" class="btn btn-outline-secondary mt-3">
                    <i class="fas fa-plus"></i> More cars
                </button>

            </div>
        </div>
    </section>


    </div>
    </section>

    <!-- Footer Section -->
    <?php include_once("footer.php"); ?>
    <script>
        var isCustomerSession = <?php echo $isCustomerSession ? 'true' : 'false'; ?>;
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="fetch_cars.js"></script>

</body>

</html>