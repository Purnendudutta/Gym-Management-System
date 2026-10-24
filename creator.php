<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FITNESS FREEK | Created by Purnendu Dutta</title>
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
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle at center, #1b070a 0%, #0a0405 100%);
            padding: 40px 20px;
        }

        .creator-card {
            width: 100%;
            max-width: 580px;
            background: var(--bg-card);
            border: 1.5px solid var(--border-color);
            border-radius: 24px;
            padding: 45px 36px;
            text-align: center;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.8), 0 0 35px var(--brand-glow);
            position: relative;
            overflow: hidden;
        }

        .creator-card::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 180px;
            height: 180px;
            background: radial-gradient(circle, var(--brand-primary) 0%, transparent 70%);
            opacity: 0.18;
            pointer-events: none;
        }

        .creator-avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--brand-primary), var(--brand-secondary));
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
            font-weight: 700;
            margin: 0 auto 20px;
            box-shadow: 0 10px 30px var(--brand-glow);
            border: 3px solid rgba(255, 255, 255, 0.15);
        }

        .creator-name {
            font-family: 'Oswald', sans-serif;
            font-size: 36px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 6px;
            letter-spacing: 0.5px;
        }

        .creator-tagline {
            color: var(--brand-primary);
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 22px;
        }

        .creator-bio {
            color: var(--text-secondary);
            font-size: 14.5px;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .tech-pill {
            display: inline-block;
            background: rgba(229, 9, 20, 0.12);
            color: #fff;
            border: 1px solid var(--border-color);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin: 4px;
        }

        .creator-socials {
            display: flex;
            justify-content: center;
            gap: 14px;
            margin: 30px 0;
        }

        .creator-social-btn {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: var(--bg-secondary);
            border: 1.5px solid var(--border-color);
            color: var(--text-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .creator-social-btn:hover {
            background: var(--brand-primary);
            color: #fff;
            transform: translateY(-4px);
            box-shadow: 0 8px 24px var(--brand-glow);
            border-color: var(--brand-primary);
        }
    </style>
</head>

<body>

    <div class="creator-card">
        <div class="creator-avatar">P</div>
        <h1 class="creator-name">Purnendu Dutta</h1>
        <div class="creator-tagline">Lead Developer & UI/UX Architect</div>

        <p class="creator-bio">
            Passionate full-stack developer and designer behind <strong>FITNESS FREEK</strong>. 
            Crafting high-performance, dynamic web experiences with cutting-edge responsive design, 
            modern security standards, and athletic aesthetic appeal.
        </p>

        <div>
            <span class="tech-pill"><i class="fa-brands fa-php text-danger me-1"></i> PHP 8+</span>
            <span class="tech-pill"><i class="fa-solid fa-database text-danger me-1"></i> MySQL</span>
            <span class="tech-pill"><i class="fa-brands fa-js text-danger me-1"></i> JavaScript</span>
            <span class="tech-pill"><i class="fa-brands fa-bootstrap text-danger me-1"></i> Bootstrap 5</span>
            <span class="tech-pill"><i class="fa-solid fa-shield-halved text-danger me-1"></i> Bcrypt Security</span>
            <span class="tech-pill"><i class="fa-solid fa-paint-brush text-danger me-1"></i> Deep Red UI/UX</span>
        </div>

        <div class="creator-socials">
            <a href="https://www.linkedin.com/in/purnendu-dutta-723b58245/" target="_blank" class="creator-social-btn" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href="https://x.com/purnendu521" target="_blank" class="creator-social-btn" title="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="https://www.facebook.com/purnendu.dutta.9275" target="_blank" class="creator-social-btn" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/purnendudutta07/" target="_blank" class="creator-social-btn" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
        </div>

        <div>
            <a href="index.php" class="btn-brand-red px-4 py-2">
                <i class="fa-solid fa-arrow-left me-2"></i> Return to Fitness Freek
            </a>
        </div>
    </div>

</body>
</html>

