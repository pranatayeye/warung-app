<div class="modal fade" id="modalDelete{{ $stock->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark text-light">
        <div class="d-grid gap-2 d-md-flex justify-content-end pt-2 pe-2">
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="container p-5 text-center">
          <div>
            <h4>Hapus data Stok?</h4>
          </div>
          <div class="pt-2">
            <a href="/stok/delete/{{ $stock->id }}" class="btn btn-outline-danger fw-bold">Hapus stok</a>
          </div>
        </div>
      </div>
        
    </div>
  </div>