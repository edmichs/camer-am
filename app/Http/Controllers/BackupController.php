<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class BackupController extends Controller
{
    /**
     * Display a backup page and buttons.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_bd()
    {
        return view('Pages.Sauvegarde.database');
    }

    /**
     * create_bd_backup
     *
     * @return \Illuminate\Http\Response
     */
    public function create_bd_backup()
    {
        try {
            Artisan::queue('backup:run', ['--only-db'=> true]);
            $msg = 'Base de données extraite, zipper et telecharger avec succès.';
            Log::info($msg);
        } catch (\Exception $exception) {
            $msg = 'Probléme de sauvegarde . Exception : '.$exception->getMessage();
            Log::error($msg);
        }

        return redirect()->route("sauvegarde.bd")->with(['message'=>$msg]);
    }

}
