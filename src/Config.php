<?php

namespace BuyerListApiClient;

class Config
{
    private $settings;

    public function __construct($configPath = __DIR__ . '/../config/buyersapi.php')
    {
        if (file_exists($configPath)) {
            $this->settings = include $configPath;
        } else {
            throw new \Exception("Config file not found: {$configPath}");
        }
    }

    public function get($key, $default = null)
    {
        return $this->settings[$key] ?? $default;
    }
}
