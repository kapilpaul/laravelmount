<?php

namespace KapilPaul\LaravelMount\Utilities;

use Artisan;
use Config;
use DB;
use File;
use Illuminate\Support\Facades\Storage;

/**
 * Class Installer
 *
 * Contains all of the Business logic to install the app. Either through the CLI or the `/install` web UI.
 *
 * @package App\Utilities
 */
class Installer
{
    public static function checkServerRequirements()
    {
        $requirements = array();
        $requirementsCheck = static::getAllRequirements();

        if (version_compare(PHP_VERSION, static::checkRequiredPHPversion(), '<=')) {
            $requirements['php'] = "PHP Version should be ". static::checkRequiredPHPversion() ." or Higher!";
        }

        if (ini_get('safe_mode')) {
            $requirements['safe_mode'] = 'Safe Mode should be disabled.';
        }

        if (ini_get('register_globals')) {
            $requirements['register_globals'] = 'Register Globals should be disabled.';
        }

        if (ini_get('magic_quotes_gpc')) {
            $requirements['magic_quotes_gpc'] = 'Magic Quotes should be disabled.';
        }

        if (!ini_get('file_uploads')) {
            $requirements['file_uploads'] = 'File Uploads should be enabled.';
        }

        if (!class_exists('PDO')) {
            $requirements['PDO'] = "MySQL PDO extension needs to be loaded!";
        }

        if (!extension_loaded('openssl')) {
            $requirements['openssl'] = "OpenSSL extension needs to be loaded!";
        }

        if (!extension_loaded('tokenizer')) {
            $requirements[] = "Tokenizer extension needs to be loaded!";
        }

        if (!extension_loaded('mbstring')) {
            $requirements['mbstring'] = "mbstring extension needs to be loaded!";
        }

        if (!extension_loaded('curl')) {
            $requirements['curl'] = "cURL extension needs to be loaded!";
        }

        if (!extension_loaded('xml')) {
            $requirements['xml'] = "XML extension needs to be loaded!";
        }

        if (!extension_loaded('zip')) {
            $requirements['zip'] = "ZIP extension needs to be loaded!";
        }

        if (!extension_loaded('fileinfo')) {
            $requirements['fileinfo'] = "FileInfo extension needs to be loaded!";
        }

        if (!is_writable(base_path('storage/app'))) {
            $requirements['storage_app'] = "storage/app directory needs to be writable!";
        }

        if(! File::exists(base_path('storage/app/uploads'))) {
            Storage::makeDirectory('uploads');
        }

        if (!is_writable(base_path('storage/app/uploads'))) {
            $requirements['storage_app_uploads'] = "storage/app/uploads directory needs to be writable!";
        }

        if (!is_writable(base_path('storage/framework'))) {
            $requirements['storage_framework'] = "storage/framework directory needs to be writable!";
        }

        if (!is_writable(base_path('storage/logs'))) {
            $requirements['storage_logs'] = "storage/logs directory needs to be writable!";
        }


        return [
            'requirements' => $requirements,
            'requirementsCheck' => $requirementsCheck
        ];
    }

    /**
     * @return mixed
     */
    public static function getAllRequirements() {
        $requirementsCheck['php'] = 'PHP (Version '. static::checkRequiredPHPversion() .' required)';
        $requirementsCheck['safe_mode'] = 'Safe Mode';
        $requirementsCheck['register_globals'] = 'Register Globals';
        $requirementsCheck['magic_quotes_gpc'] = 'Magic Quotes Gpc';
        $requirementsCheck['file_uploads'] = 'File Uploads';
        $requirementsCheck['PDO'] = 'PDO';
        $requirementsCheck['openssl'] = 'openssl';
        $requirementsCheck['tokenizer'] = 'Tokenizer';
        $requirementsCheck['mbstring'] = 'mbstring';
        $requirementsCheck['curl'] = 'curl';
        $requirementsCheck['xml'] = 'xml';
        $requirementsCheck['zip'] = 'zip';
        $requirementsCheck['fileinfo'] = 'fileinfo';
        $requirementsCheck['storage_app'] = 'storage/app';
        $requirementsCheck['storage_app_uploads'] = 'storage/app/uploads';
        $requirementsCheck['storage_framework'] = 'storage/framework';
        $requirementsCheck['storage_logs'] = 'storage/logs';

        return $requirementsCheck;
    }


    /**
     * Create a default .env file.
     *
     * @return void
     */
	public static function createDefaultEnvFile()
	{
        // Rename file
        if (!File::exists(base_path('.env.example'))) {
            $envPath = base_path('.env');
            touch($envPath);

            $envFileData =
                "APP_NAME=Kapil\n".
                "APP_ENV=local\n".
                "APP_KEY=\n".
                "APP_DEBUG=true\n".
                "APP_INSTALLED=false\n".
                "APP_URL=http://localhost\n\n".
                "LOG_CHANNEL=stack\n\n".
                "DB_CONNECTION=mysql\n".
                "DB_HOST=127.0.0.1\n".
                "DB_PORT=3306\n".
                "DB_DATABASE=homestead\n".
                "DB_USERNAME=homestead\n".
                "DB_PASSWORD=secret\n\n".
                "BROADCAST_DRIVER=log\n".
                "CACHE_DRIVER=file\n".
                "SESSION_DRIVER=file\n".
                "SESSION_LIFETIME=120\n".
                "QUEUE_DRIVER=sync\n\n".
                "REDIS_HOST=127.0.0.1\n".
                "REDIS_PASSWORD=null\n".
                "REDIS_PORT=6379\n\n".
                "MAIL_DRIVER=smtp\n".
                "MAIL_HOST=smtp.mailtrap.io\n".
                "MAIL_PORT= 2525\n".
                "MAIL_USERNAME=null\n".
                "MAIL_PASSWORD=null\n".
                "MAIL_ENCRYPTION=null\n\n".
                "PUSHER_APP_ID=\n".
                "PUSHER_APP_KEY=\n".
                "PUSHER_APP_SECRET=\n".
                "PUSHER_APP_CLUSTER=mt1\n\n".
                "MIX_PUSHER_APP_KEY=\"\${PUSHER_APP_KEY}\"\n".
                "MIX_PUSHER_APP_CLUSTER=\"\${PUSHER_APP_CLUSTER}\"\n";

            file_put_contents($envPath, $envFileData);
        } else {
            if (is_file(base_path('.env.example'))) {
                File::move(base_path('.env.example'), base_path('.env'));
            }
        }

        // Update .env file
        static::updateEnv([
            'APP_KEY'   =>  'base64:'.base64_encode(random_bytes(32)),
            'APP_URL'   =>  url('/'),
        ]);
	}

    public static function createDbTables($host, $port, $database, $username, $password, $dbConnection)
    {
        if (!static::isDbValid($host, $port, $database, $username, $password, $dbConnection)) {
            return false;
        }

        // Set database details
        static::saveDbVariables($host, $port, $database, $username, $password, $dbConnection);

        // Try to increase the maximum execution time
        set_time_limit(300); // 5 minutes

        // Create tables
        Artisan::call('migrate', ['--force' => true]);

        return true;
    }

    /**
     * Check if the database exists and is accessible.
     *
     * @param $host
     * @param $port
     * @param $database
     * @param $host
     * @param $database
     * @param $username
     * @param $password
     *
     * @return bool
     */
    public static function isDbValid($host, $port, $database, $username, $password, $dbConnection)
    {
        Config::set('database.connections.install_test', [
            'host'      => $host,
            'port'      => $port,
            'database'  => $database,
            'username'  => $username,
            'password'  => $password,
            'driver'    => $dbConnection,
            'charset'   => env('DB_CHARSET', 'utf8mb4'),
        ]);

        try {
            DB::connection('install_test')->getPdo();
        } catch (\Exception $e) {;
            return false;
        }

        // Purge test connection
        DB::purge('install_test');

        return true;
    }

    public static function saveDbVariables($host, $port, $database, $username, $password, $dbConnection)
    {
        $prefix = strtolower(str_random(3) . '_');

        // Update .env file
        static::updateEnv([
            'DB_CONNECTION'     =>  $dbConnection,
            'DB_HOST'           =>  $host,
            'DB_PORT'           =>  $port,
            'DB_DATABASE'       =>  $database,
            'DB_USERNAME'       =>  $username,
            'DB_PASSWORD'       =>  $password,
            'DB_PREFIX'         =>  $prefix,
        ]);

        $con = $dbConnection;

        // Change current connection
        $db = Config::get('database.connections.' . $con);

        $db['host'] = $host;
        $db['database'] = $database;
        $db['username'] = $username;
        $db['password'] = $password;
        $db['prefix'] = $prefix;

        Config::set('database.connections.' . $con, $db);

        DB::purge($con);
        DB::reconnect($con);
    }


    public static function finalTouches()
    {
        // Update .env file
        static::updateEnv([
            'APP_LOCALE'    =>  session('locale'),
            'APP_INSTALLED' =>  'true'
        ]);

        // Rename the robots.txt file
        try {
            File::move(base_path('robots.txt.dist'), base_path('robots.txt'));
        } catch (\Exception $e) {
            // nothing to do
        }
    }

    public static function updateEnv($data)
    {
        if (empty($data) || !is_array($data) || !is_file(base_path('.env'))) {
            return false;
        }

        $env = file_get_contents(base_path('.env'));

        $env = explode("\n", $env);

        foreach ($data as $data_key => $data_value) {
            foreach ($env as $env_key => $env_value) {
                $entry = explode('=', $env_value, 2);

                // Check if new or old key
                if ($entry[0] == $data_key) {
                    $env[$env_key] = $data_key . '=' . $data_value;
                } else {
                    $env[$env_key] = $env_value;
                }
            }
        }

        if(isset($data['APP_INSTALLED'])) {
            $env['APP_INSTALLED'] = 'APP_INSTALLED' . '=' . $data['APP_INSTALLED'];
        }

        $env = implode("\n", $env);

        file_put_contents(base_path('.env'), $env);

        return true;
    }

    /**
     * @return array
     */
    private static function getPhpVersionInfo()
    {
        $currentVersionFull = PHP_VERSION;
        preg_match("#^\d+(\.\d+)*#", $currentVersionFull, $filtered);
        $currentVersion = $filtered[0];

        return [
            'full' => $currentVersionFull,
            'version' => $currentVersion
        ];
    }

    /**
     * Check PHP version requirement.
     *
     * @return array
     */
    public static function checkRequiredPHPversion()
    {
        $getComposerData = file_get_contents(base_path('composer.json'));
        $composerValues = json_decode($getComposerData, true);

        if($version = $composerValues['require']['php']) {
            $version = str_replace('^', '', $version);
            return $version;
        }

        return false;
    }

}
