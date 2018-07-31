<?php

namespace KapilPaul\LaravelMount\Http\Controllers;

use App\Http\Controllers\Controller;
use File;
use KapilPaul\LaravelMount\Utilities\Installer;


class Requirements extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function show()
    {
        // Check requirements
        $requirements = Installer::checkServerRequirements();

        if (empty($requirements['requirements'])) {
            // Create the .env file
            if (!File::exists(base_path('.env'))) {
                Installer::createDefaultEnvFile();
            }
        }

        return view('laravelmount::index', compact('requirements'));
    }
}
