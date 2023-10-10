@extends('layouts.app')
@section('content')
<div class="container my-3">
    <div class="row">
        <div class="col-md">
            <div class="card-body">
                @if (Route::has('login'))
                @auth
                @else
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm float-right">Log in</a>
                @endauth
                @endif
            </div>
        </div>
        <div class="card-body">
            <h2>Pemilihan Sampah</h2>
            <form method="POST" action="{{ route('sale.store') }}">
                @csrf
                <div class="row mb-3">
                    <div class="form-group">
                        <label>Jenis Sampah</label>
                        <select name="trash_id" class="form-control @error('trash_id') is-invalid @enderror">
                            <option value="">--- PILIH JENIS SAMPAH ---</option>
                            @foreach ($data as $d)
                            <option value="{{ $d['id'] }}" {{ ($d['id'] === old('trash_id')) ? 'selected' : ''  }}>{{ $d['name'] }}</option>
                            @endforeach
                        </select>
                        @error('trash_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" min="1" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ old('qty') }}">

                        @error('qty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection