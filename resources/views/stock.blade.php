@extends('layouts.main')

@section('container')

<header class="p-3 text-white">
    <div class="container">
        <nav class="navbar navbar-dark ">
            <div class="container-fluid">
              <a class="navbar-brand fw-bold" href="/">Warung-app</a>
              <form class="d-flex" action="/stok/search">
                <input class="form-control form-control-dark me-2" type="text" placeholder="Cari stok" name="search" value="{{ old('search') }}">
                <button class="btn btn-outline-info fw-bold" type="submit">Search</button>
              </form>
            </div>
        </nav>
    </div>
</header>



<div class="container p-3">
  @include('stock_add')

    {{-- tabel stok--}}
    <table class="table text-light my-4">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Id</th>
            <th scope="col">Nama Stok</th>
            <th scope="col">Harga</th>
            <th scope="col">Sisa Stok</th>
            <th scope="col">Tgl Dibuat</th>
            <th scope="col">Tgl Diupdate</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          @foreach($stocks as $stock)
            <tr>
              <th scope="row">{{ $i }}</th>
              <td>{{ $stock->id }}</td>
              <td>{{ $stock->nama_stok }}</td>
              <td>Rp. {{ $stock->harga }}</td>
              <td>{{ $stock->sisa_stok }}</td>
              <td>{{ $stock->created_at }}</td>
              <td>{{ $stock->updated_at }}</td>
              <td>
                
                <button class="btn btn-outline-warning fw-bold" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $stock->id }}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg>
                Edit</button>
                
                @include('stock_edit')

                <button class="btn btn-outline-danger fw-bold" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $stock->id }}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                  </svg>
                Hapus</button>

                @include('stock_delete')

              </td>
            </tr>
            <?php $i++ ?>
          @endforeach
        </tbody>
    </table>
  
    {{ $stocks->links() }}
</div>



@endsection