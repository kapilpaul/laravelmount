<?php

namespace KapilPaul\LaravelMount\Http\Requests\Mount;

use Illuminate\Foundation\Http\FormRequest;

class InstallRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'app_name'              => 'required',
            'app_env'               => 'required',
            'app_url'               => 'required',
            'app_log_level'         => 'required',
            'app_debug'             => 'required',
            'database_connection'   => 'required',
            'database_hostname'     => 'required',
            'database_port'         => 'required',
            'database_name'         => 'required',
            'database_username'     => 'required'
        ];
    }

    public function messages()
    {
        return [
            'app_name.required'  => 'App Name is required',
            'app_env.required'  => 'App Environment is required',
            'app_url.required'  => 'App URL is required',
            'app_log_level.required'  => 'App Log Level is required',
            'app_debug.required'  => 'App Debug is required',
            'database_connection.required'  => 'Database Connection is required',
            'database_hostname.required'  => 'Database Hostname is required',
            'database_port.required'  => 'Database Port is required',
            'database_name.required'  => 'Database Name is required',
            'database_username.required'  => 'Database User Name is required',
            'database_password.required'  => 'Database Password is required',
        ];
    }
}
