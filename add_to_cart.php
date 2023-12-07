<?php
session_start(); // Start the session if not already started

include 'db_connect.php'; // Connect to your database

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = isset($_POST['productID']) ? (int)$_POST['productID'] : null;
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : null;
    $sessionId = isset($_SESSION['sessionID']) ? (int)$_SESSION['sessionID'] : null;

    if ($productId && $quantity && $sessionId) {
        // Check product availability
        $stmt = $conn->prepare("SELECT quantity FROM productinventory WHERE productID = ?");
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row && $row['quantity'] >= $quantity) {
            // Add to cart
            $stmt = $conn->prepare("INSERT INTO basket (sessionID, productID, quantity) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE quantity = quantity + ?");
            $stmt->bind_param("iiii", $sessionId, $productId, $quantity, $quantity);
            $stmt->execute();

            echo "<p style='font-weight:bold;color:green;'>Item added to cart.</p>";
        } else {
            echo "<p style='font-weight:bold;color:red;'>Product is out of stock or insufficient quantity available.</p>";
        }
    } else {
        echo "<p style='font-weight:bold;color:red;'>Invalid product or quantity.</p>";
    }
} else {
    echo "<p style='font-weight:bold;color:red;'>Invalid request method.</p>";
}
?>

