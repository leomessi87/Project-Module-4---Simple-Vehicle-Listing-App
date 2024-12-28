<?php
require_once "../../app/classes/VehicleManager.php";

// Initialize VehicleManager
$vehicleManager = new VehicleManager('', '', '', '');

// Get the vehicle ID from the URL
$id = $_GET['id'] ?? null;

if ($id === null) {
    // Redirect if no ID is provided
    header("Location: ../index.php");
    exit;
}

// Fetch the vehicles and the specific vehicle by ID
$vehicles = $vehicleManager->getVehicles();
$vehicle = $vehicles[$id] ?? null;

if (!$vehicle) {
    // Redirect if the vehicle is not found
    header("Location: ../index.php");
    exit;
}

// Handle POST request for deletion confirmation
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
        $vehicleManager->deleteVehicle($id); // Delete the vehicle
    }
    header("Location: ../index.php"); // Redirect to the index page after deletion
    exit;
}

include './header.php'; // Include header
?>

<div class="container my-4">
    <h1>Delete Vehicle</h1>
    <p>Are you sure you want to delete <strong><?php echo htmlspecialchars($vehicle['name']); ?></strong>?</p>
    <form method="POST">
        <button type="submit" name="confirm" value="yes" class="btn btn-danger">Yes, Delete</button>
        <a href="../index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>