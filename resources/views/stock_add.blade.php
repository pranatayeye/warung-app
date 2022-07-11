{{-- tambah stok --}}
<div class="row">
    <div class="col-6">
      <button class="btn btn-outline-info fw-bold" data-bs-toggle="modal" data-bs-target="#modaladd" type="submit">Tambah stok</button>
    </div>
    <div class="col-6 text-end">
      <h5 class="text-light">Jumlah Data : {{ $stocks->total() }}</h5>
    </div>
</div>

<div class="modal" id="modaladd" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content bg-dark text-light">
            <div class="container">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Stok</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    
                    <form method="HEAD" action="/stok/store" class="pt-4 pb-4 d-grid gap-3">
                    {{ csrf_field() }}
                        <div class="col-sm-6 col-12">
                        <label for="nama_stok" class="form-label">Nama Stok</label>
                        <input type="text" class="form-control" name="nama_stok" required>
                        </div>
                        
                        <div class="col-sm-6 col-12">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select" aria-label="kategori" name="kategori">
                            <option selected disabled>Pilih salah satu</option>
                            <option value="100">Makanan</option>
                            <option value="200">Bukan makanan</option>
                            <option value="300">Rumah tangga</option>
                            <option value="400">Mainan</option>
                            <option value="500">Alat tulis</option>
                        </select>
                        </div>

                        <div class="col-sm-6 col-12">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" required>
                        </div>
                        
                        <div class="col-sm-6 col-12">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" required>
                        </div>
            
                    <hr class="my-4">
            
                    <button class="w-100 btn btn-outline-info fw-bold btn-lg" type="submit">Simpan stok</button>
                    </form>
                
            </div>
        
        </div>
    </div>
</div>