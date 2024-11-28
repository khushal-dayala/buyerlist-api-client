<?php

namespace BuyerListApiClient;

class Config
{
    protected $config = [];

    /**
     * Load the configuration file.
     *
     * @param string $filePath Path to the configuration file
     * @throws \Exception
     */
    public function __construct($filePath = null)
    {
        if ($filePath && file_exists($filePath)) {
            $this->config = require $filePath;
        } elseif (file_exists(__DIR__ . '/../../../../config/buyerlistapi.php')) {
            $this->config = require __DIR__ . '/../../../../config/buyerlistapi.php';
        } else {
            throw new \Exception('Configuration file not found.');
        }
    }

    /**
     * Get a configuration value.
     *
     * @param string $key
     * @return mixed|null
     */
    public function get($key)
    {
        return $this->config[$key] ?? null;
    }

    /**
     * Get all configuration.
     *
     * @return array
     */
    public function all()
    {
        return $this->config;
    }
}
