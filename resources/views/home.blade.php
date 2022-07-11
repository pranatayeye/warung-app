@extends('layouts.main')

@section('container')
    <div class="masthead bg-dark text-secondary px-4 py-5 text-center" style="min-height: 100vh;">
        <div class="py-5">
          <img src="{{ asset('img/logo warung app.png') }}" alt="logo warung-app">
          <h1 class="display-5 fw-bold text-white mb-3">Warung-app</h1>
          <p class="fs-6 fw-bold fst-italic">Sistem kelola stok barang warung sederhana.</p>
          <div class="col-lg-6 mx-auto">
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
              <a type="button" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold" href="/stok" role="button">Stok Barang</a>
              {{-- <a type="button" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold disabled" href="#" role="button">Pembayaran</a> --}}
            </div>
          </div>
        </div>
    </div>

@endsection