<?php
session_start();
include 'db_connect.php';
include 'session_manager.php'; // Assuming this is the file containing the createOrGetSessionId function

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT customerID, password_hash FROM customer WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password_hash'])) {
            $_SESSION['customerID'] = $row['customerID'];
            $_SESSION['username'] = $username;

            // Create or retrieve a shopping session ID
            $sessionId = createOrGetSessionId($conn, $row['customerID']);
            $_SESSION['sessionID'] = $sessionId;

            header("Location: cart.php");
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid username.";
    }
} else {
    echo "Invalid request method.";
}
?>

