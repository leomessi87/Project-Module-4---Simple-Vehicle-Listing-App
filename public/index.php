<?php
require_once "../app/Classes/VehicleManager.php";

$vehicleManager = new VehicleManager();
$vehicles = $vehicleManager->getVehicles();

include './views/header.php';
?>

<div class="container my-4">
    <h1>Vehicle Listing</h1>
    <a href="./views/add.php" class="btn btn-success mb-4">Add Vehicle</a>
    <div class="row">
        <?php foreach ($vehicles as $id => $vehicle): ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?= htmlspecialchars($vehicle['image']) ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($vehicle['name']) ?></h5>
                        <p>Type: <?= htmlspecialchars($vehicle['type']) ?></p>
                        <p>Price: $<?= htmlspecialchars($vehicle['price']) ?></p>
                        <a href="./views/edit.php?id=<?= $id ?>" class="btn btn-primary">Edit</a>
                        <a href="./views/delete.php?id=<?= $id ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
