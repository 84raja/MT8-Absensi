<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Jadwal_mapel;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $jadwals = Jadwal_mapel::paginate(5);

        return view('admin.laporan.index', compact('jadwals'));
    }
}
