<?php

// Get the source config file inside the package
$sourceFile = __DIR__ . '/config/buyersapi.php';

// Determine the project root directory (two levels up from the vendor folder)
$projectRoot = dirname(__DIR__, 2);

// Define the target config directory in the project
$destinationDir = $projectRoot . '/config';

// Define the target config file path
$destinationFile = $destinationDir . '/buyersapi.php';

// Ensure the destination directory exists
if (!file_exists($destinationDir)) {
    mkdir($destinationDir, 0777, true);
    echo "Created directory: $destinationDir\n";
}

// Check if the config file already exists
if (file_exists($destinationFile)) {
    echo "Config file already exists at $destinationFile. No action taken.\n";
} else {
    // Copy the config file
    if (copy($sourceFile, $destinationFile)) {
        echo "Config file has been successfully published to $destinationFile\n";
    } else {
        echo "Failed to publish the config file.\n";
    }
}
