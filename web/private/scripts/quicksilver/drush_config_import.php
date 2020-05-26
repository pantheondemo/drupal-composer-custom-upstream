<?php
// Import all config changes.
echo "Importing configuration from yml files...\n";
passthru('drush cim -y');
echo "Import of configuration complete.\n";

// Check for environment specific imports.
if (!empty($_ENV['PANTHEON_ENVIRONMENT'])) {
    $env = strtolower($_ENV['PANTHEON_ENVIRONMENT']);
    $configs = scandir('./config');

    // If env exists as import directory.
    if (!empty($configs[$env])) {
        passthru("drush cim ${env} -y");
    }
    
}

// Clear all cache
echo "Rebuilding cache.\n";
passthru('drush cr');
echo "Rebuilding cache complete.\n";
