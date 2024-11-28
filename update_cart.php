<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON input
    $cartData = json_decode(file_get_contents('php://input'), true);

    // Ensure the cartData is an array
    if (is_array($cartData)) {
        // Update the cart in session
        $_SESSION['cart'] = $cartData;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid cart data']);
    }
} else {
    // Handle non-POST requests
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
