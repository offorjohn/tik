<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tiktokUrl'])) {
        $tiktokUrl = filter_var($_POST['tiktokUrl'], FILTER_SANITIZE_URL);

        if (!filter_var($tiktokUrl, FILTER_VALIDATE_URL)) {
            echo json_encode(['success' => false, 'message' => 'Invalid URL']);
            exit();
        }

        // Save the URL to a text file (for demonstration purposes)
        $file = 'tiktok_urls.txt';
        file_put_contents($file, $tiktokUrl . PHP_EOL, FILE_APPEND | LOCK_EX);

        echo json_encode(['success' => true, 'message' => 'TikTok video uploaded successfully', 'url' => $tiktokUrl]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No URL provided']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
