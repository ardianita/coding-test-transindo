@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-8">
                    <h2 class="mt-2 page-title">Halaman Pengelolaan Jenis Sampah</h2>
                </div>
                <div class="row">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <a class="btn btn-primary btn-sm mt-1 mb-2" href="{{ route('categories.create') }}">Tambah</a>
                        <div class="card-body">
                            <!-- table -->
                            <table class="table table-bordered" id="myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Jenis Sampah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $d['name'] }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-primary" href="{{ route('categories.edit', $d['id']) }}">Edit</a>
                                            <form action="{{ route('categories.delete', $d['id']) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- simple table -->
            </div>
        </div>
    </div>
</div>
@endsection