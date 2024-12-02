<?php

$sourceFile = __DIR__ . '/../config/buyersapi.php'; // Adjusted path

$projectRoot = dirname(__DIR__, 4);

$destinationDir = $projectRoot . '/config';

$destinationFile = $destinationDir . '/buyersapi.php';

if (!file_exists($destinationDir)) {
    mkdir($destinationDir, 0777, true);
    echo "Created directory: $destinationDir\n";
}

if (file_exists($destinationFile)) {
    echo "Config file already exists at $destinationFile. No action taken.\n";
} else {
    if (copy($sourceFile, $destinationFile)) {
        echo "Config file has been successfully published to $destinationFile\n";
    } else {
        echo "Failed to publish the config file.\n";
    }
}
