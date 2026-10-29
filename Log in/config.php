<?php
$db_host = getenv('DB_HOST') ?: 'localhost';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : '';
$db_name = getenv('DB_NAME') ?: 'user_db';
$db_port = getenv('DB_PORT') ? (int)getenv('DB_PORT') : 3306;

$ca_file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'ca.pem';

$conn = mysqli_init();
if (!$conn) {
    die("Database initialization error");
}

// Cloud database SSL configuration (TiDB / Aiven / Remote MySQL)
if ($db_host !== 'localhost' && $db_host !== '127.0.0.1') {
    $is_tidb = (strpos($db_host, 'tidbcloud.com') !== false);
    $cert = null;
    
    if ($is_tidb) {
        $system_cas = [
            '/etc/pki/tls/certs/ca-bundle.crt',  // Amazon Linux / CentOS (Vercel runtime)
            '/etc/ssl/certs/ca-certificates.crt', // Debian / Ubuntu
            '/etc/ssl/cert.pem'                   // Alpine / macOS
        ];
        foreach ($system_cas as $path) {
            if (file_exists($path)) {
                $cert = $path;
                break;
            }
        }
    } elseif (file_exists($ca_file)) {
        $cert = $ca_file;
    }

    if ($cert) {
        mysqli_ssl_set($conn, NULL, NULL, $cert, NULL, NULL);
        @mysqli_options($conn, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
    }
    
    $connected = @mysqli_real_connect(
        $conn,
        $db_host,
        $db_user,
        $db_pass,
        $db_name,
        $db_port,
        NULL,
        MYSQLI_CLIENT_SSL
    );
} else {
    $connected = @mysqli_real_connect($conn, $db_host, $db_user, $db_pass, $db_name, $db_port);
}

if (!$connected) {
    // Fallback standard connection
    $conn = @mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);
    if (!$conn) {
        die("Connection error: " . mysqli_connect_error());
    }
}
?>
