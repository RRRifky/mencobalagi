@extends('layout.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barangkeluar.store') }}" method="POST" enctype="multipart/form-data">                    
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">TGL_keluar</label>
                                <input type="date" class="form-control @error('tgl_keluar') is-invalid @enderror" name="tgl_keluar" value="{{ old('tgl_keluar') }}" placeholder="Masukkan Tanggal">
                            
                                <!-- error message untuk nama -->
                                @error('tgl_keluar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">QTY</label>
                                <input type="text" class="form-control @error('qty_keluar') is-invalid @enderror" name="qty_keluar" value="{{ old('qty_keluar') }}" placeholder="Masukkan Quantity">
                            
                                <!-- error message untuk nis -->
                                @error('qty_keluar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">BARANG_ID</label>
                                <select class="form-control" name="barang_id" id="">
                                    @foreach($barang as $barangIdrow)
                                        <option value="{{$barangIdrow->id}}">Merk barang: {{$barangIdrow->merk}} -- Stok sekarang: {{$barangIdrow->stok}}</option>
                                    @endforeach
                                </select>
                            
                                <!-- error message untuk nis -->
                                @error('barang_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            <a href="{{ route('barangkeluar.index') }}" class="btn btn-md btn-primary">Back</a>

                        </form> 
                    </div>
                </div>
                @if(session('Success'))
    <div class="alert alert-success">
        {{ session('Success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

 

            </div>
        </div>
    </div>
@endsection