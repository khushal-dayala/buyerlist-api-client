<?php

namespace BuyerListApiClient;

class Config
{
    protected $config = [];

    /**
     * Constructor to load or create the configuration file.
     *
     * @param string|null $filePath Path to the custom configuration file
     * @throws \Exception
     */
    public function __construct($filePath = null)
    {
        $rootConfigFolder = __DIR__ . '/config';
        $defaultConfigFile = $rootConfigFolder . '/buyerlistapi.php';

        // Use custom file if provided
        if ($filePath && file_exists($filePath)) {
            $this->config = require $filePath;
        }
        // Check if default config file exists
        elseif (file_exists($defaultConfigFile)) {
            $this->config = require $defaultConfigFile;
        } else {
            // Create the config folder and file if they don't exist
            $this->createDefaultConfig($rootConfigFolder, $defaultConfigFile);
            $this->config = require $defaultConfigFile; // Load the newly created config
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

    /**
     * Create the default configuration folder and file.
     *
     * @param string $configFolder Path to the configuration folder
     * @param string $configFile Path to the configuration file
     * @throws \Exception
     */
    private function createDefaultConfig($configFolder, $configFile)
    {
        // Create the config folder if it doesn't exist
        if (!is_dir($configFolder)) {
            if (!mkdir($configFolder, 0755, true) && !is_dir($configFolder)) {
                throw new \Exception('Failed to create configuration folder.');
            }
        }

        // Create the default config file
        $defaultConfigContent = <<<'PHP'
<?php

return [
    'base_url' => 'https://exttrk.cakemarketing.com/d.ashx',
    'default_params' => [
        'ckm_campaign_id' => '2590',
        'ckm_key'         => 'FTuoNmuSGs',
        'country'         => 'US',
        'opt_in'          => 'true',
    ],
];
PHP;

        if (!file_put_contents($configFile, $defaultConfigContent)) {
            throw new \Exception('Failed to create configuration file.');
        }
    }
}
