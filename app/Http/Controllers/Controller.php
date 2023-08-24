<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function saveimg($folder, $image, $oldimge = null)
    {
        $nameImg = $folder . '_' . Str::random(30) . '.' . $image->getClientOriginalExtension();
        if ($oldimge) {
            if (Storage::exists($oldimge)) {
                Storage::delete($oldimge);
            }
        }
        $path = $image->storeAs('public/gambar/' . $folder, $nameImg);
        return $path;
    }
    public function delimg($oldimge)
    {
        if ($oldimge) {
            if (Storage::exists($oldimge)) {
                Storage::delete($oldimge);
            }
        }
        return 1;
    }

    public function getimg($image)
    {
        return Storage::get($image);
    }
}
