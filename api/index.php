<?php
// Vercel Serverless Entry Point
error_reporting(E_ALL);
ini_set('display_errors', '1');

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH));
$root = dirname(__DIR__);

// Route homepage requests
if ($uri === '/' || $uri === '' || $uri === '/index.php') {
    chdir($root);
    require $root . '/index.php';
    exit;
}

// Route file requests
$target = $root . '/' . ltrim($uri, '/');
if (file_exists($target) && !is_dir($target)) {
    $ext = strtolower(pathinfo($target, PATHINFO_EXTENSION));
    if ($ext === 'php') {
        chdir(dirname($target));
        require $target;
        exit;
    }
    
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
    readfile($target);
    exit;
}

// Fallback to index.php
chdir($root);
require $root . '/index.php';
?>
