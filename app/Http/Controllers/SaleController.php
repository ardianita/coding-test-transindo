<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesRequest;
use App\Models\Sales;
use App\Models\Trash;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function create()
    {
        $trash = Trash::all();

        return view('welcome', [
            'data' => $trash,
        ]);
    }

    public function store(SalesRequest $salesRequest)
    {
        $data = $salesRequest->validated();
        $harga = Trash::query()->where('id', $data['trash_id'])->first()->harga;
        $total = $harga * $data['qty'];
        $data['total'] = $total;
        dd($data);
        Sales::create($data);

        return 'berhasil';
    }
}
