<?php

namespace BuyerListApiClient;

class Config
{
    protected $config = [];

    /**
     * Constructor to load the configuration file.
     *
     * @param string|null $filePath Path to the custom configuration file
     * @throws \Exception
     */
    public function __construct($filePath = null)
    {
        $defaultConfigFile = __DIR__ . '/config/buyerlistapi.php';

        // Use custom file if provided
        if ($filePath && file_exists($filePath)) {
            $this->config = require $filePath;
        }
        // Use default config file if no custom file is provided
        elseif (file_exists($defaultConfigFile)) {
            $this->config = require $defaultConfigFile;
        } else {
            throw new \Exception('Configuration file not found.');
        }
    }

    /**
     * Get a specific configuration value.
     *
     * @param string $key
     * @return mixed|null
     */
    public function get($key)
    {
        return $this->config[$key] ?? null;
    }

    /**
     * Get all configuration values.
     *
     * @return array
     */
    public function all()
    {
        return $this->config;
    }
}
