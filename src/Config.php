<?php

namespace BuyerListApiClient;

class Config
{
    protected $config = [];

    /**
     * Constructor to load the configuration file.
     *
     * @param array|string|null $fileOrArray Configuration array or file path
     * @throws \Exception
     */
    public function __construct($fileOrArray = null)
    {
        // If it's an array, use it as configuration directly
        if (is_array($fileOrArray)) {
            $this->config = $fileOrArray;
        }
        // If it's a file path, load the configuration file
        elseif (is_string($fileOrArray) && file_exists($fileOrArray)) {
            $this->config = require $fileOrArray;
        } else {
            throw new \Exception('Invalid configuration provided. Provide a valid file path or an array.');
        }
    }

    /**
     * Get a specific configuration value or a default.
     *
     * @param string $key Configuration key
     * @param mixed|null $default Default value if key does not exist
     * @return mixed|null
     */
    public function get($key, $default = null)
    {
        return $this->config[$key] ?? $default;
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
