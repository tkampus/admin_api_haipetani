<?php

namespace App\Http\Controllers\WEB;

use App\Models\chat;
use App\Models\event;
use App\Models\u_ahli;
use App\Models\u_petani;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class linkcontroller extends Controller
{
    public function getimgchat($id)
    {
        $chat = chat::find($id);
        $imagePath = $chat->gambar_pesan;

        if (Storage::exists($imagePath)) {
            $imageContents = $this->getimg($imagePath);
            return response($imageContents, 200)
                ->header('Content-Type', 'image/jpeg')
                ->header('Content-Disposition', 'inline; filename="' . $chat->id . '.jpeg"');
        } else {
            return abort(404);
        }
    }
    public function getimgevent($id)
    {
        $event = event::find($id);
        $imagePath = $event->gambar;

        if (Storage::exists($imagePath)) {
            $imageContents = $this->getimg($imagePath);
            return response($imageContents, 200)
                ->header('Content-Type', 'image/jpeg')
                ->header('Content-Disposition', 'inline; filename="' . $event->judul . '.jpeg"');
        } else {
            return abort(404);
        }
    }
    public function getimgprofil($role, $nohp, $update)
    {
        switch ($role) {
            case 'petani':
                $data = u_petani::where('nohp', $nohp)->first();
                break;
            case 'ahli':
                $data = u_ahli::where('nohp', $nohp)->first();
                break;
            default:
                return abort(404);
                break;
        }
        if ($data->gambar == null) {
            return abort(404);
        }
        $imagePath = $data->gambar;

        if (Storage::exists($imagePath)) {
            $imageContents = $this->getimg($imagePath);
            return response($imageContents, 200)
                ->header('Content-Type', 'image/jpeg')
                ->header('Content-Disposition', 'inline; filename="' . $data->nohp . '.jpeg"');
        } else {
            return abort(404);
        }
    }
}