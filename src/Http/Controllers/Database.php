<?php

namespace KapilPaul\LaravelMount\Http\Controllers;

use Artisan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use KapilPaul\LaravelMount\Http\Requests\Mount\InstallRequest;
use KapilPaul\LaravelMount\Utilities\Installer;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Database\QueryException;
use PDOException;
use Illuminate\Session\TokenMismatchException;

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

        try{
            // Check database connection
            if (!Installer::createDbTables($host, $port, $database, $username, $password, $dbConnection)) {
                $message = "Invalid database connection";
                return redirect()->route('requirement.show')->with(['error' => $message]);
            }

            Installer::updateEnv([
                'APP_NAME' => "\"$request->app_name\"",
                'APP_ENV' => $request->app_env,
                'APP_URL' => $request->app_url,
                'APP_LOG_LEVEL' => $request->app_log_level,
                'APP_DEBUG' => $request->app_debug ? $request->app_debug : "false",
                "BROADCAST_DRIVER" => $request->broadcast_driver,
                "CACHE_DRIVER" => $request->cache_driver,
                "SESSION_DRIVER" => $request->session_driver,
                "SESSION_LIFETIME" => $request->session_lifetime,
                "QUEUE_DRIVER" => $request->queue_driver,
                "REDIS_HOST" => $request->redis_host,
                "REDIS_PASSWORD" => $request->redis_password,
                "REDIS_PORT" => $request->redis_port,
                "MAIL_DRIVER" => $request->mail_driver,
                "MAIL_HOST" => $request->mail_host,
                "MAIL_PORT" => $request->mail_port,
                "MAIL_USERNAME" => $request->mail_username,
                "MAIL_PASSWORD" => $request->mail_password,
                "MAIL_ENCRYPTION" => $request->mail_encryption,
                "PUSHER_APP_ID" => $request->pusher_app_id,
                "PUSHER_APP_KEY" => $request->pusher_app_key,
                "PUSHER_APP_SECRET" => $request->pusher_app_secret,
                "PUSHER_APP_CLUSTER" => $request->pusher_app_cluster
            ]);

            // Make the final touches
            Installer::finalTouches();

            return view('laravelmount::success.show');
        }catch(PDOException $e){
            return redirect()->back()->with(['error' => "PDOException Error!"]);
        }catch(QueryException $e){
            return redirect()->back()->with(['error' => "QueryException Error!"]);
        } catch (TokenMismatchException $e){
            return redirect('/');
        }  catch (MethodNotAllowedHttpException $e){
            return redirect('/');
        }
    }
}
