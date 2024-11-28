<?php

// Path to the source config file inside the package
$sourceFile = __DIR__ . '/config/buyersapi.php';

// Path to the destination config file in the project root's config folder
$destinationDir = __DIR__ . '/../../config';  // Go up two levels to the project root
$destinationFile = $destinationDir . '/buyersapi.php';

// Check if the destination directory exists, if not, create it
if (!file_exists($destinationDir)) {
    mkdir($destinationDir, 0777, true);  // Create the directory if it doesn't exist
    echo "Created directory: $destinationDir\n";
}

// Check if the config file already exists, if not, copy it
if (!file_exists($destinationFile)) {
    if (copy($sourceFile, $destinationFile)) {
        echo "Config file has been successfully published to $destinationFile\n";
    } else {
        echo "Failed to copy the config file.\n";
    }
} else {
    echo "Config file already exists at $destinationFile\n";
}
