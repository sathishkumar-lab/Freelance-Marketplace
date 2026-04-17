<?php
session_start();
$resume = basename($_GET['file']); // Sanitize input
$file_path = "uploads/" . $resume;

if (file_exists($file_path)) {
    header('Content-Type: application/pdf'); // Adjust if needed
    header('Content-Disposition: inline; filename="' . $resume . '"');
    readfile($file_path);
} else {
    echo "File not found.";
}
?>
