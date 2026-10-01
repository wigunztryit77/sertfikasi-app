<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Peserta::with('skemaSertifikasi');

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('nik', 'like', '%' . $search . '%');

            });
        }

        $peserta = $query
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        return view('peserta-dashboard', compact('peserta'));
    }
}