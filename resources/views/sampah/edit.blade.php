@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('trash.update', $data['id']) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="form-group">
                            <label>Nama Sampah</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data['name'] }}">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <div class="col-md">
                                <select name="category_id" id="category" class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">--- PILIH JENIS SAMPAH ---</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}" {{ ($data['category_id'] === $category['id']) ? 'selected' : $category['name']  }}>{{ $category['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ $data['deskripsi'] }}">

                            @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="col-md">
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}">
                                @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ $data['harga'] }}">
                            @error('harga')
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