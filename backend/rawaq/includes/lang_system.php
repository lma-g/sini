<?php
// includes/lang_system.php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set initial flag to check if language modal should be shown
if (!isset($_SESSION['lang_chosen'])) {
    $_SESSION['lang_chosen'] = false;
}

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'] === 'en' ? 'en' : 'ar';
    $_SESSION['lang_chosen'] = true; // Mark that user made a choice
    
    // Redirect to same page without lang parameter
    $redirect_url = strtok($_SERVER["REQUEST_URI"], '?');
    
    // Preserve other GET parameters except lang
    $query = $_GET;
    unset($query['lang']);
    $query_string = http_build_query($query);
    
    if ($query_string) {
        $redirect_url .= '?' . $query_string;
    }
    
    header("Location: " . $redirect_url);
    exit;
}

// Default language
$current_lang = $_SESSION['lang'] ?? 'ar';
$text_dir = $current_lang === 'en' ? 'ltr' : 'rtl';

// Load translation array
if ($current_lang === 'en') {
    $lang = require_once dirname(__DIR__) . '/lang/en.php';
} else {
    $lang = require_once dirname(__DIR__) . '/lang/ar.php';
}

// Helper function
function __($key) {
    global $lang;
    return $lang[$key] ?? $key;
}
