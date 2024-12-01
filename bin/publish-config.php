<?php

// Get the source config file inside the package
$sourceFile = realpath(__DIR__ . '/../config/buyersapi.php'); // Ensure source file exists

if (!$sourceFile || !file_exists($sourceFile)) {
    echo "Error: Source config file not found at: " . __DIR__ . '/../config/buyersapi.php' . "\n";
    exit(1);
}

// Determine the root project directory (find where composer.json exists)
// Step up from the `vendor/package` directory to the project root
$projectRoot = dirname(__DIR__, 3); // Adjusted to always go 3 levels up from the current directory

// Verify if composer.json exists in the determined root directory
if (!file_exists($projectRoot . '/composer.json')) {
    echo "Error: Unable to determine the root project directory. Ensure the script is being run in a valid project.\n";
    exit(1);
}

// Define the target config directory in the root project
$destinationDir = $projectRoot . '/config';

// Define the target config file path
$destinationFile = $destinationDir . '/buyersapi.php';

// Ensure the destination directory exists
if (!file_exists($destinationDir)) {
    if (!mkdir($destinationDir, 0777, true) && !is_dir($destinationDir)) {
        echo "Error: Failed to create directory: $destinationDir\n";
        exit(1);
    }
    echo "Created directory: $destinationDir\n";
}

// Check if the config file already exists
if (file_exists($destinationFile)) {
    echo "Config file already exists at $destinationFile. No action taken.\n";
    exit(0);
}

// Copy the config file
if (copy($sourceFile, $destinationFile)) {
    echo "Config file successfully published to $destinationFile\n";
} else {
    echo "Error: Failed to publish the config file.\n";
    exit(1);
}
