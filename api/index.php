<?php
// Vercel Serverless Router for FITNESS FREEK
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH));
$root = dirname(__DIR__);

// Route root to index.php
if ($uri === '/' || $uri === '' || $uri === '/index.php') {
    chdir($root);
    require $root . '/index.php';
    exit;
}

// Check if requested file exists within the project
$target = $root . '/' . ltrim($uri, '/');
$realTarget = realpath($target);

if ($realTarget && strpos($realTarget, $root) === 0 && file_exists($realTarget) && !is_dir($realTarget)) {
    $ext = strtolower(pathinfo($realTarget, PATHINFO_EXTENSION));
    if ($ext === 'php') {
        chdir(dirname($realTarget));
        require $realTarget;
        exit;
    }

    // Static asset fallback with correct MIME type
    $mimes = [
        'css'  => 'text/css; charset=UTF-8',
        'js'   => 'application/javascript; charset=UTF-8',
        'png'  => 'image/png',
        'jpg'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'gif'  => 'image/gif',
        'svg'  => 'image/svg+xml',
        'webp' => 'image/webp',
        'ico'  => 'image/x-icon'
    ];
    if (isset($mimes[$ext])) {
        header('Content-Type: ' . $mimes[$ext]);
    }
    readfile($realTarget);
    exit;
}

// Fallback to index.php
chdir($root);
require $root . '/index.php';
?>
