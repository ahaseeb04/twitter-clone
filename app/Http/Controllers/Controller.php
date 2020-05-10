<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Undocumented function
     *
     * @param [type] $request
     * @return void
     */
    protected function validateFormBody($request)
    {
        $this->validate($request, [
            'body' => $request->media ? 'max:280' : 'required|max:280'
        ]);
    }
}
