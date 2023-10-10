<?php

namespace App\Http\Controllers;

use App\Models\Trash;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\TrashRequest;
use Illuminate\Support\Facades\Storage;

class TrashController extends Controller
{
    public function index()
    {
        $data = Trash::all();

        return view('sampah.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        $category = Category::all();

        return view('sampah.create', [
            'categories' => $category,
        ]);
    }

    public function store(TrashRequest $trashRequest)
    {
        $data = $trashRequest->validated();
        $trashRequest->file('foto')->store('foto-sampah');
        Trash::create($data);

        return redirect()->route('trash.index');
    }

    public function edit(Trash $trash)
    {
        $categories = Category::all();
        return view('sampah.edit', [
            'data' => $trash,
            'categories' => $categories,
        ]);
    }

    public function update(TrashRequest $trashRequest, Trash $trash)
    {
        $data = $trashRequest->validated();
        if ($trashRequest->hasFile('foto')) {
            Storage::delete($trash->foto);
            $foto = $trashRequest->file('foto')->store('foto-sampah');
            $data['foto'] = $foto;
        }
        $trash->update($data);

        return redirect()->route('trash.index');
    }

    public function destroy(Trash $trash)
    {
        $trash->delete();
        Storage::delete($trash->foto);
        return redirect()->route('trash.index');
    }
}
