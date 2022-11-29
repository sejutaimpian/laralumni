<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KabarModel;
use Illuminate\Http\Request;

class KabarController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Kabar Alumni',
            'profile' => $this->profile,

            'kabar' => KabarModel::getJoinKabarAkun()
        ];
        return view('dashboard/kabaralumni', $data);
    }
}
