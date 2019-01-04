<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 13/12/2018
 * Time: 12:48
 */

namespace App\Repositories;


use Illuminate\Http\Request;

class UploadRepository
{
    public static function upload(Request $request)
    {

        if (null !== ($request->file('Avatar'))){
            $original_doc = $request->file('Avatar')->getClientOriginalName();
            $upload = $request->file('Avatar')->move(public_path('/img'), $original_doc);
            return $upload;
        }
        return null;
    }
}