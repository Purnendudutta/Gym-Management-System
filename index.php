<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FITNESS FREEK | Elite Gym & Performance Center</title>
    <link rel="icon" href="home/women.png">

    <!-- Bootstrap 5 & FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Global Deep Red Stylesheet -->
    <link rel="stylesheet" href="includes/global.css">

    <style>
        /* ===================== HERO SECTION WITH HD GYM INTERIOR ===================== */
        #home {
            min-height: 94vh;
            background: linear-gradient(135deg, rgba(10, 4, 5, 0.90) 0%, rgba(26, 7, 10, 0.72) 50%, rgba(10, 4, 5, 0.94) 100%), 
                        url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=1920&q=85');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            position: relative;
        }

        .hero-title-main {
            font-family: 'Oswald', sans-serif;
            font-size: 78px;
            font-weight: 700;
            line-height: 1.05;
            text-transform: uppercase;
        }
        .hero-title-main span {
            color: var(--brand-primary);
            text-shadow: 0 0 30px var(--brand-glow);
        }

        /* Gym Inside Background Overlays on Sections */
        .gym-bg-activities {
            background: linear-gradient(180deg, rgba(10, 4, 5, 0.94) 0%, rgba(20, 7, 10, 0.88) 50%, rgba(10, 4, 5, 0.95) 100%),
                        url('https://images.unsplash.com/photo-1540497077202-7c8a3999166f?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }

        .gym-bg-store {
            background: linear-gradient(180deg, rgba(10, 4, 5, 0.95) 0%, rgba(24, 8, 11, 0.89) 50%, rgba(10, 4, 5, 0.96) 100%),
                        url('https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }

        .gym-bg-pricing {
            background: linear-gradient(180deg, rgba(10, 4, 5, 0.95) 0%, rgba(18, 6, 9, 0.90) 50%, rgba(10, 4, 5, 0.96) 100%),
                        url('https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }

        .content-section {
            padding: 95px 0;
            border-bottom: 1px solid var(--border-color);
        }

        /* About Section Resized Image & Floating Animation */
        .about-img-container {
            position: relative;
            max-width: 420px;
            margin: 0 auto;
        }
        .about-animated-img {
            width: 100%;
            height: 380px;
            object-fit: cover;
            border-radius: 20px;
            border: 2px solid var(--border-color);
            box-shadow: 0 15px 35px var(--shadow-color);
            animation: aboutImgFloat 4.5s ease-in-out infinite alternate;
            transition: all 0.4s ease;
        }
        .about-animated-img:hover {
            border-color: var(--brand-primary);
            box-shadow: 0 20px 50px var(--brand-glow);
            transform: scale(1.02);
        }
        @keyframes aboutImgFloat {
            0% {
                transform: translateY(0px) rotate(0deg);
                box-shadow: 0 12px 30px rgba(229, 9, 20, 0.2);
            }
            100% {
                transform: translateY(-14px) rotate(1deg);
                box-shadow: 0 24px 45px rgba(229, 9, 20, 0.45);
            }
        }
        .about-floating-badge {
            position: absolute;
            bottom: -15px;
            right: -15px;
            background: linear-gradient(135deg, var(--brand-primary), var(--brand-secondary));
            color: #fff;
            padding: 12px 20px;
            border-radius: 14px;
            font-weight: 700;
            box-shadow: 0 8px 24px var(--brand-glow);
            display: flex;
            align-items: center;
            gap: 10px;
            animation: aboutBadgePulse 3s ease-in-out infinite alternate;
        }
        @keyframes aboutBadgePulse {
            0% { transform: scale(1); }
            100% { transform: scale(1.05); }
        }

        /* Feature & Product Cards */
        .pro-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.35s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .pro-card:hover {
            transform: translateY(-8px);
            border-color: var(--brand-primary);
            box-shadow: 0 16px 40px var(--shadow-color);
        }
        .card-img-fit {
            height: 240px;
            width: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        .pro-card:hover .card-img-fit { transform: scale(1.05); }

        /* Store Product Styling */
        .store-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            background: var(--brand-primary);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .product-price {
            font-family: 'Oswald', sans-serif;
            font-size: 24px;
            color: var(--brand-secondary);
            font-weight: 700;
        }

        /* Floating Back to Top Button */
        #backToTop {
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 46px;
            height: 46px;
            background: linear-gradient(135deg, var(--brand-primary), var(--brand-secondary));
            color: #ffffff;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            z-index: 999;
            box-shadow: 0 8px 25px var(--brand-glow);
            opacity: 0;
            visibility: hidden;
            transform: scale(0.7);
            transition: all 0.3s ease;
        }
        #backToTop.show { opacity: 1; visibility: visible; transform: scale(1); }
        #backToTop:hover { transform: translateY(-4px) scale(1.08); box-shadow: 0 12px 30px rgba(229,9,20,0.6); }

        @media (max-width: 991px) {
            .hero-title-main { font-size: 46px; }
        }
    </style>
</head>

<body id="top">

    <!-- ===================== PROFESSIONAL GYM HEADER ===================== -->
    <nav class="navbar navbar-expand-lg" id="proNavbar">
        <div class="container-fluid px-lg-5">
            <!-- Brand Logo -->
            <a class="navbar-brand nav-brand-logo" href="#top">
                <div class="brand-badge"><i class="fa-solid fa-dumbbell"></i></div>
                <div>FITNESS <span>FREEK</span></div>
            </a>

            <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <i class="fa-solid fa-bars fs-3"></i>
            </button>

            <!-- Navigation Links (Includes STORE, NO Admin) -->
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 nav-links-list">
                    <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#activities">Activities</a></li>
                    <li class="nav-item"><a class="nav-link" href="#coaches">Coaches</a></li>
                    <li class="nav-item"><a class="nav-link" href="#store"><i class="fa-solid fa-bag-shopping text-danger me-1"></i> Store</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pricing">Membership</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>

                <!-- Right Controls: Theme Switcher + Member Login -->
                <div class="d-flex align-items-center gap-3">
                    <div class="theme-switch-pill" id="themeToggleBtn" title="Toggle Light/Dark Theme">
                        <i class="fa-solid fa-moon text-danger" style="font-size:11px;"></i>
                        <i class="fa-solid fa-sun text-warning" style="font-size:11px;"></i>
                        <div class="theme-thumb"></div>
                    </div>

                    <?php if (isset($_SESSION['user_name'])): ?>
                        <a href="Log in/user_page.php" class="btn-brand-red"><i class="fa-solid fa-user"></i> My Account</a>
                    <?php else: ?>
                        <button class="btn-brand-red" data-bs-toggle="modal" data-bs-target="#authModal">
                            <i class="fa-solid fa-right-to-bracket"></i> Member Login
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- ===================== SECTION 1: HOME (HERO) WITH INSIDE GYM BACKGROUND ===================== -->
    <section id="home">
        <div class="container px-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="section-badge"><i class="fa-solid fa-fire"></i> Redefining The Experience</span>
                    <h1 class="hero-title-main text-white my-3">
                        Push Past Your <span>Limits</span>
                    </h1>
                    <p class="lead text-light mb-4" style="max-width: 580px;">
                        Welcome to India's premier powerhouse for strength, endurance, and transformation. 
                        Certified coaching, Olympic grade equipment, and an unstoppable community.
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="#pricing" class="btn-brand-red"><i class="fa-solid fa-bolt"></i> Start Free Trial</a>
                        <a href="#activities" class="btn-outline-red"><i class="fa-solid fa-play"></i> Explore Workouts</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== SECTION 2: ABOUT US ===================== -->
    <section id="about" class="content-section">
        <div class="container px-lg-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="section-badge">Our Legacy</span>
                    <h2 class="section-title">Designed For <span>Champions</span></h2>
                    <p class="text-secondary leading-relaxed">
                        Established in 2024, FITNESS FREEK was built to create an inclusive, results-driven haven for fitness enthusiasts of every level. Whether your goal is strength building, fat loss, or holistic flexibility, our facility provides the gold standard.
                    </p>
                    <div class="row g-3 mt-3">
                        <div class="col-sm-6 d-flex align-items-center gap-2"><i class="fa-solid fa-circle-check text-danger"></i> Certified Master Trainers</div>
                        <div class="col-sm-6 d-flex align-items-center gap-2"><i class="fa-solid fa-circle-check text-danger"></i> 24/7 Access & Private Lockers</div>
                        <div class="col-sm-6 d-flex align-items-center gap-2"><i class="fa-solid fa-circle-check text-danger"></i> Olympic Standard Free Weights</div>
                        <div class="col-sm-6 d-flex align-items-center gap-2"><i class="fa-solid fa-circle-check text-danger"></i> Infrared & Recovery Lounges</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-img-container">
                        <!-- High Definition Gym Training Image -->
                        <img src="https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=800&q=85" class="about-animated-img" alt="About FITNESS FREEK">
                        <div class="about-floating-badge">
                            <i class="fa-solid fa-trophy fs-4"></i>
                            <div>
                                <div style="font-size:15px; line-height:1.1;">#1 RATED GYM</div>
                                <div style="font-size:11px; opacity:0.85;">SINCE 2024</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== SECTION 3: ACTIVITIES (WITH HD IMAGES) ===================== -->
    <section id="activities" class="content-section gym-bg-activities">
        <div class="container px-lg-5">
            <div class="text-center mb-5">
                <span class="section-badge">Strive For Progress</span>
                <h2 class="section-title">Workout <span>Programs</span></h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="pro-card">
                        <img src="https://images.unsplash.com/photo-1545205597-3d9d02c29597?auto=format&fit=crop&w=800&q=85" class="card-img-fit" alt="Yoga Power">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <h4 class="fw-bold mb-1">Yoga Power</h4>
                            <div class="text-secondary small mb-3">Flexibility, core stabilization, and mindfulness.</div>
                            <a href="#contact" class="btn-outline-red mt-auto btn-sm text-center">Join Class</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pro-card">
                        <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=800&q=85" class="card-img-fit" alt="Zumba Fitness">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <h4 class="fw-bold mb-1">Zumba Fitness</h4>
                            <div class="text-secondary small mb-3">High-energy rhythm dance cardio to burn calories.</div>
                            <a href="#contact" class="btn-outline-red mt-auto btn-sm text-center">Join Class</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pro-card">
                        <img src="https://images.unsplash.com/photo-1534258936925-c58bed479fcb?auto=format&fit=crop&w=800&q=85" class="card-img-fit" alt="Indoor Cycling">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <h4 class="fw-bold mb-1">Indoor Cycling</h4>
                            <div class="text-secondary small mb-3">Sprint intervals designed to spike cardiovascular stamina.</div>
                            <a href="#contact" class="btn-outline-red mt-auto btn-sm text-center">Join Class</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pro-card">
                        <img src="https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e?auto=format&fit=crop&w=800&q=85" class="card-img-fit" alt="Strength Training">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <h4 class="fw-bold mb-1">Strength & Hypertrophy</h4>
                            <div class="text-secondary small mb-3">Compound barbell and dumbbell regimens for muscle gain.</div>
                            <a href="#contact" class="btn-outline-red mt-auto btn-sm text-center">Join Class</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pro-card">
                        <img src="https://images.unsplash.com/photo-1515377905703-c4788e51af15?auto=format&fit=crop&w=800&q=85" class="card-img-fit" alt="Sound Therapy">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <h4 class="fw-bold mb-1">Sound Therapy</h4>
                            <div class="text-secondary small mb-3">Acoustic healing for post-workout neurological recovery.</div>
                            <a href="#contact" class="btn-outline-red mt-auto btn-sm text-center">Join Class</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pro-card">
                        <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?auto=format&fit=crop&w=800&q=85" class="card-img-fit" alt="Meditation">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <h4 class="fw-bold mb-1">Mindfulness Meditation</h4>
                            <div class="text-secondary small mb-3">Mental clarity and breathwork to reduce stress.</div>
                            <a href="#contact" class="btn-outline-red mt-auto btn-sm text-center">Join Class</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== SECTION 4: COACHES (WITH HD HEADSHOTS) ===================== -->
    <section id="coaches" class="content-section">
        <div class="container px-lg-5">
            <div class="text-center mb-5">
                <span class="section-badge">Master Trainers</span>
                <h2 class="section-title">Our Expert <span>Coaches</span></h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="pro-card text-center p-3">
                        <img src="https://images.unsplash.com/photo-1567013127542-490d757e51fc?auto=format&fit=crop&w=800&q=85" class="rounded-3 w-100" style="height:280px; object-fit:cover; object-position:top;" alt="Manoj">
                        <h4 class="fw-bold mt-3 mb-1">Manoj Bajpai</h4>
                        <div class="text-danger small fw-semibold mb-2">Head Strength & Conditioning Coach</div>
                        <p class="text-secondary small">Specializes in personalized powerlifting, hypertrophy, and competition prep.</p>
                        <a href="#contact" class="btn-outline-red btn-sm mt-auto">Book Consultation</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pro-card text-center p-3">
                        <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?auto=format&fit=crop&w=800&q=85" class="rounded-3 w-100" style="height:280px; object-fit:cover; object-position:top;" alt="Rahul">
                        <h4 class="fw-bold mt-3 mb-1">Rahul Mishra</h4>
                        <div class="text-danger small fw-semibold mb-2">Fat Loss & Mobility Specialist</div>
                        <p class="text-secondary small">Tailored high-intensity athletic conditioning for rapid body recomposition.</p>
                        <a href="#contact" class="btn-outline-red btn-sm mt-auto">Book Consultation</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pro-card text-center p-3">
                        <img src="https://images.unsplash.com/photo-1583454110551-21f2fa2afe61?auto=format&fit=crop&w=800&q=85" class="rounded-3 w-100" style="height:280px; object-fit:cover; object-position:top;" alt="Nikhil">
                        <h4 class="fw-bold mt-3 mb-1">Nikhil Das</h4>
                        <div class="text-danger small fw-semibold mb-2">Yoga & Functional Movement</div>
                        <p class="text-secondary small">Empowering body posture correction, spine recovery, and holistic wellness.</p>
                        <a href="#contact" class="btn-outline-red btn-sm mt-auto">Book Consultation</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== SECTION 5: NEW GYM STORE (WITH HD PRODUCTS) ===================== -->
    <section id="store" class="content-section gym-bg-store">
        <div class="container px-lg-5">
            <div class="text-center mb-5">
                <span class="section-badge"><i class="fa-solid fa-tag"></i> Official Merchandise & Fuel</span>
                <h2 class="section-title">Fitness Freek <span>Store</span></h2>
                <p class="text-secondary" style="max-width:550px; margin:0 auto;">Premium gym apparel, elite lab-tested supplements, and lifting gear to maximize performance.</p>
            </div>
            <div class="row g-4">
                <!-- Product 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="pro-card position-relative p-3">
                        <span class="store-badge">Best Seller</span>
                        <img src="https://images.unsplash.com/photo-1579722821273-0f6c7d44362f?auto=format&fit=crop&w=800&q=85" class="rounded-3 w-100" style="height:210px; object-fit:cover;" alt="Whey Protein">
                        <div class="mt-3">
                            <h5 class="fw-bold mb-1">Nitro Isolate Whey Protein (2kg)</h5>
                            <p class="text-secondary small mb-2">27g pure ultra-filtered isolate per scoop with digestive enzymes.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="product-price">₹4,299</div>
                                <button class="btn-brand-red btn-sm" onclick="addToCart('Nitro Isolate Whey')"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="pro-card position-relative p-3">
                        <span class="store-badge" style="background:#dc2626;">Hot</span>
                        <img src="https://images.unsplash.com/photo-1593095948071-474c5cc2989d?auto=format&fit=crop&w=800&q=85" class="rounded-3 w-100" style="height:210px; object-fit:cover;" alt="Pre-Workout">
                        <div class="mt-3">
                            <h5 class="fw-bold mb-1">Pre-Workout Ignition Explosive</h5>
                            <p class="text-secondary small mb-2">350mg caffeine, 6g citrulline malate for maximum vascular pumps.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="product-price">₹1,899</div>
                                <button class="btn-brand-red btn-sm" onclick="addToCart('Pre-Workout Ignition')"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="pro-card position-relative p-3">
                        <span class="store-badge" style="background:#b91c1c;">Gear</span>
                        <img src="https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=800&q=85" class="rounded-3 w-100" style="height:210px; object-fit:cover;" alt="Lifting Belt">
                        <div class="mt-3">
                            <h5 class="fw-bold mb-1">Pro Leather Weightlifting Belt</h5>
                            <p class="text-secondary small mb-2">10mm genuine top-grain cowhide leather with heavy-duty steel buckle.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="product-price">₹2,499</div>
                                <button class="btn-brand-red btn-sm" onclick="addToCart('Leather Lifting Belt')"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product 4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="pro-card position-relative p-3">
                        <img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=800&q=85" class="rounded-3 w-100" style="height:210px; object-fit:cover;" alt="Gym T-Shirt">
                        <div class="mt-3">
                            <h5 class="fw-bold mb-1">Athletic Compression Tech Tee</h5>
                            <p class="text-secondary small mb-2">Breathable moisture-wicking four-way stretch fabric in Matte Black & Red.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="product-price">₹999</div>
                                <button class="btn-brand-red btn-sm" onclick="addToCart('Compression Tee')"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product 5 -->
                <div class="col-lg-4 col-md-6">
                    <div class="pro-card position-relative p-3">
                        <img src="https://images.unsplash.com/photo-1544816155-12df9643f363?auto=format&fit=crop&w=800&q=85" class="rounded-3 w-100" style="height:210px; object-fit:cover;" alt="Steel Shaker">
                        <div class="mt-3">
                            <h5 class="fw-bold mb-1">Insulated Matte Steel Shaker (750ml)</h5>
                            <p class="text-secondary small mb-2">Double-wall vacuum insulation keeps liquids ice-cold for 24 hours.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="product-price">₹799</div>
                                <button class="btn-brand-red btn-sm" onclick="addToCart('Matte Steel Shaker')"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product 6 -->
                <div class="col-lg-4 col-md-6">
                    <div class="pro-card position-relative p-3">
                        <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=800&q=85" class="rounded-3 w-100" style="height:210px; object-fit:cover;" alt="Creatine">
                        <div class="mt-3">
                            <h5 class="fw-bold mb-1">Micronized Creatine Monohydrate</h5>
                            <p class="text-secondary small mb-2">100% pure pharmaceutical grade creatine for explosive cellular power.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="product-price">₹1,199</div>
                                <button class="btn-brand-red btn-sm" onclick="addToCart('Micronized Creatine')"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== SECTION 6: MEMBERSHIP / PRICING ===================== -->
    <section id="pricing" class="content-section gym-bg-pricing">
        <div class="container px-lg-5">
            <div class="text-center mb-5">
                <span class="section-badge">Transparent Pricing</span>
                <h2 class="section-title">Membership <span>Plans</span></h2>
            </div>
            <div class="row g-4 align-items-center">
                <div class="col-lg-4">
                    <div class="pro-card p-4 text-center">
                        <h4 class="fw-bold">Standard Tier</h4>
                        <div class="product-price my-3" style="font-size:40px;">₹1,299 <span class="fs-6 text-muted">/mo</span></div>
                        <ul class="list-unstyled text-secondary small text-start d-flex flex-column gap-2 mb-4">
                            <li><i class="fa-solid fa-check text-danger me-2"></i> Gym floor & cardio zone access</li>
                            <li><i class="fa-solid fa-check text-danger me-2"></i> Standard locker & shower access</li>
                            <li><i class="fa-solid fa-check text-danger me-2"></i> Fitness Freek Mobile app access</li>
                        </ul>
                        <a href="#contact" class="btn-outline-red w-100 justify-content-center">Choose Plan</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pro-card p-4 text-center border-danger shadow-lg position-relative" style="border-width:2px; transform:scale(1.04);">
                        <span class="badge bg-danger mb-2 px-3 py-2 text-uppercase">Most Popular</span>
                        <h4 class="fw-bold">Pro Athlete</h4>
                        <div class="product-price my-3" style="font-size:44px;">₹2,499 <span class="fs-6 text-muted">/mo</span></div>
                        <ul class="list-unstyled text-secondary small text-start d-flex flex-column gap-2 mb-4">
                            <li><i class="fa-solid fa-check text-danger me-2"></i> 24/7 All-Access to all facilities</li>
                            <li><i class="fa-solid fa-check text-danger me-2"></i> All group classes included</li>
                            <li><i class="fa-solid fa-check text-danger me-2"></i> 2 Personal Coaching sessions/mo</li>
                            <li><i class="fa-solid fa-check text-danger me-2"></i> Custom nutrition & meal plans</li>
                        </ul>
                        <a href="#contact" class="btn-brand-red w-100 justify-content-center">Get Pro Membership</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pro-card p-4 text-center">
                        <h4 class="fw-bold">Elite VIP</h4>
                        <div class="product-price my-3" style="font-size:40px;">₹4,499 <span class="fs-6 text-muted">/mo</span></div>
                        <ul class="list-unstyled text-secondary small text-start d-flex flex-column gap-2 mb-4">
                            <li><i class="fa-solid fa-check text-danger me-2"></i> Unlimited 1-on-1 coaching</li>
                            <li><i class="fa-solid fa-check text-danger me-2"></i> Infrared sauna & ice bath lounge</li>
                            <li><i class="fa-solid fa-check text-danger me-2"></i> Dedicated private trainer & towel service</li>
                        </ul>
                        <a href="#contact" class="btn-outline-red w-100 justify-content-center">Choose Plan</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== SECTION 7: CONTACT ===================== -->
    <section id="contact" class="content-section">
        <div class="container px-lg-5">
            <div class="row g-5">
                <div class="col-lg-6">
                    <span class="section-badge">Direct Line</span>
                    <h2 class="section-title">Ready To <span>Transform?</span></h2>
                    <p class="text-secondary">Stop putting it off until next week. Schedule your free consultation now.</p>
                    <div class="d-flex flex-column gap-3 mt-4">
                        <div><i class="fa-solid fa-location-dot text-danger me-3"></i> Fitness Freek Center, Delhi NCR, India</div>
                        <div><i class="fa-solid fa-phone text-danger me-3"></i> +91 8172032283</div>
                        <div><i class="fa-solid fa-envelope text-danger me-3"></i> fitnessfreek@gmail.com</div>
                        <div><i class="fa-solid fa-clock text-danger me-3"></i> Open 24 Hours / 7 Days A Week</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form class="p-4 rounded-4" style="background:var(--bg-card); border:1.5px solid var(--border-color);" onsubmit="event.preventDefault(); alert('Inquiry received! Our coach will call you in 15 minutes.');">
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Your Name</label>
                            <input type="text" class="form-input-red" placeholder="John Doe" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Email</label>
                            <input type="email" class="form-input-red" placeholder="john@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Your Fitness Goal</label>
                            <textarea class="form-input-red" rows="3" placeholder="Tell us what you want to achieve..."></textarea>
                        </div>
                        <button type="submit" class="btn-brand-red w-100 justify-content-center">Claim Free Pass</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== FOOTER (CLEAN & UNOBSTRUCTED) ===================== -->
    <footer class="py-5" style="background:var(--footer-bg); border-top:1px solid var(--border-color);">
        <div class="container px-lg-5">
            <div class="row g-4 justify-content-between align-items-center">
                <div class="col-lg-6">
                    <div class="nav-brand-logo mb-3">
                        <div class="brand-badge"><i class="fa-solid fa-dumbbell"></i></div>
                        <div>FITNESS <span>FREEK</span></div>
                    </div>
                    <p class="text-secondary small mb-3" style="max-width: 480px;">
                        Empowering individuals through scientific strength training, endurance conditioning, and world-class gym facilities.
                    </p>
                    <div class="d-flex gap-3 text-secondary">
                        <a href="https://www.facebook.com/purnendu.dutta.9275" target="_blank" class="text-secondary"><i class="fa-brands fa-facebook fs-5"></i></a>
                        <a href="https://www.instagram.com/purnendudutta07/" target="_blank" class="text-secondary"><i class="fa-brands fa-instagram fs-5"></i></a>
                        <a href="https://x.com/purnendu521" target="_blank" class="text-secondary"><i class="fa-brands fa-x-twitter fs-5"></i></a>
                        <a href="https://www.linkedin.com/in/purnendu-dutta-723b58245/" target="_blank" class="text-secondary"><i class="fa-brands fa-linkedin fs-5"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 text-lg-end text-secondary small">
                    <div class="mb-2"><i class="fa-solid fa-location-dot text-danger me-2"></i> Fitness Freek Center, Delhi NCR, India</div>
                    <div class="mb-2"><i class="fa-solid fa-phone text-danger me-2"></i> +91 8172032283</div>
                    <div class="mb-2"><i class="fa-solid fa-envelope text-danger me-2"></i> fitnessfreek@gmail.com</div>
                    <div><i class="fa-solid fa-clock text-danger me-2"></i> Open 24 Hours / 7 Days A Week</div>
                </div>
            </div>
            
            <!-- Bottom Bar with Unblocked Admin Portal & Creator Link -->
            <div class="d-flex flex-wrap justify-content-between align-items-center pt-4 mt-4 border-top border-secondary border-opacity-25 small text-secondary">
                <div>
                    &copy; 2024 FITNESS FREEK. All Rights Reserved. &nbsp;|&nbsp; 
                    Created by <a href="creator.php" target="_blank" class="text-danger fw-semibold text-decoration-none"><i class="fa-solid fa-code me-1"></i>Purnendu Dutta</a>
                </div>
                <!-- 100% Unobstructed Admin Portal Button -->
                <div>
                    <a href="admin/admin_login.php" class="btn btn-sm btn-outline-danger px-3 py-1" style="font-size:12.5px; border-radius:20px;">
                        <i class="fa-solid fa-shield-halved me-1"></i> Staff & Admin Gate
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- ===================== AUTH MODAL (LOGIN + REGISTER + FORGOT PW) ===================== -->
    <div class="modal fade" id="authModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background:var(--bg-secondary); border:1.5px solid var(--border-color); border-radius:20px; box-shadow:0 25px 60px rgba(0,0,0,0.8);">
                <div class="p-4">
                    <h4 class="fw-bold text-white text-center mb-3">Member Sign In</h4>
                    <form action="Log in/login_form.php" method="POST">
                        <div class="mb-3">
                            <label class="small fw-semibold mb-1">Email Address</label>
                            <input type="email" name="email" class="form-input-red" placeholder="member@fitnessfreek.com" required>
                        </div>
                        <div class="mb-2">
                            <label class="small fw-semibold mb-1">Password</label>
                            <input type="password" name="password" class="form-input-red" placeholder="••••••••" required>
                        </div>
                        <div class="mb-3 text-end">
                            <a href="Log in/forgot_password.php" class="text-danger small fw-semibold text-decoration-none">Forgot password?</a>
                        </div>
                        <button type="submit" name="submit" class="btn-brand-red w-100 justify-content-center">Sign In</button>
                    </form>
                    <div class="text-center mt-3 small text-secondary">
                        Don't have an account? <a href="Log in/register_form.php" class="text-danger fw-bold">Create Member Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Arrow Button (Back To Top - Positioned Cleanly) -->
    <button id="backToTop" title="Back to Top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Smooth Active Navbar Scrollspy
        const sections = document.querySelectorAll("section");
        const navLinks = document.querySelectorAll(".nav-links-list .nav-link");

        window.addEventListener("scroll", () => {
            let current = "";
            sections.forEach(sec => {
                const secTop = sec.offsetTop - 120;
                if (scrollY >= secTop) current = sec.getAttribute("id");
            });

            navLinks.forEach(link => {
                link.classList.remove("active");
                if (link.getAttribute("href") === "#" + current) {
                    link.classList.add("active");
                }
            });

            // Back to Top button display
            const btt = document.getElementById("backToTop");
            if (window.scrollY > 300) {
                btt.classList.add("show");
            } else {
                btt.classList.remove("show");
            }
        });

        // Theme Switcher
        const themeBtn = document.getElementById("themeToggleBtn");
        const savedTheme = localStorage.getItem("ff_theme") || "dark";
        document.documentElement.setAttribute("data-theme", savedTheme);

        themeBtn.addEventListener("click", () => {
            const current = document.documentElement.getAttribute("data-theme");
            const target = current === "dark" ? "light" : "dark";
            document.documentElement.setAttribute("data-theme", target);
            localStorage.setItem("ff_theme", target);
        });

        // Store Toast notification
        function addToCart(item) {
            alert("🛒 " + item + " added to your cart!");
        }
    </script>
</body>
</html>
