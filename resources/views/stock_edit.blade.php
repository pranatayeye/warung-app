<div class="modal" id="modalEdit{{ $stock->id }}" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content bg-dark text-light">
            <div class="container">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Stok</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    
                    <form method="HEAD" action="/stok/update/{{ $stock->id }}" class="pt-4 pb-4 d-grid gap-3">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                        <div class="col-sm-6 col-12">
                        <label for="nama_stok" class="form-label">Nama Stok</label>
                        <input type="text" class="form-control" name="nama_stok" value="{{ $stock->nama_stok }}" required>
                        </div>
                        
                        <div class="col-sm-6 col-12">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" value="{{ $stock->harga }}" required>
                        </div>
                        
                        <div class="col-sm-6 col-12">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" value="{{ $stock->sisa_stok }}" required>
                        </div>
            
                    <hr class="my-4">
            
                    <button class="w-100 btn btn-outline-info fw-bold btn-lg" type="submit">Simpan stok</button>
                    </form>
                
            </div>
        
        </div>
    </div>
</div>