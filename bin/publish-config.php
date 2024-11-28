<?php

$sourceFile = __DIR__ . '/../config/config.php';
$destinationFile = __DIR__ . '/../config/my-package.php';

if (!file_exists($destinationFile)) {
    copy($sourceFile, $destinationFile);
    echo "Configuration file has been published to $destinationFile.\n";
} else {
    echo "Configuration file already exists.\n";
}
