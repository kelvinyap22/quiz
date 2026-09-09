<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;

class KnowledgeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $informasi = Informasi::with('kategori')
            ->where('status', 'published')
            ->when($search, function ($query, $search) {
                return $query->where('judul', 'like', "%{$search}%")
                             ->orWhere('ringkasan', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(6);

        return view('public.index', compact('informasi', 'search'));
    }

    public function show(Informasi $informasi)
    {

        if ($informasi->status !== 'published') {
            abort(404);
        }

        return view('public.show', compact('informasi'));
    }
}