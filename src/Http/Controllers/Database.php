<?php

namespace KapilPaul\LaravelMount\Http\Controllers;

use Artisan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use KapilPaul\LaravelMount\Http\Requests\Mount\InstallRequest;
use KapilPaul\LaravelMount\Utilities\Installer;

class Database extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function store(InstallRequest $request)
    {
        $host           = $request['database_hostname'];
        $port           = $request['database_port'];
        $dbConnection   = $request['database_connection'];
        $database       = $request['database_name'];
        $username       = $request['database_username'];
        $password       = $request['database_password'];

        // Check database connection
        if (!Installer::createDbTables($host, $port, $database, $username, $password, $dbConnection)) {
            $message = "Invalid database connection";
            return redirect()->route('requirement.show')->with(['error' => $message]);
        }

        Installer::updateEnv([
            'APP_NAME'          =>  $request['app_name'],
            'APP_ENV'           =>  $request['app_env'],
            'APP_DEBUG'         =>  $request['app_debug'],
            'APP_LOG_LEVEL'     =>  $request['app_log_level'],
            'APP_URL'           =>  $request['app_url'],
        ]);

        // Make the final touches
        Installer::finalTouches();

        return view('laravelmount::success.show');
    }
}
