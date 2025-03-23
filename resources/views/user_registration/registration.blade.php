<x-user-layout>
    <div class="card">
        <div class="card-body">
          <h2 class="card-title text-center">Pendaftaran Akun Tatabungan</h2>

          <!-- Floating Labels Form -->
          <form class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingName" placeholder="Nama Pengguna">
                <label for="floatingName">Nama Pengguna</label>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" aria-label="JenisKelamin">
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
                </select>
                <label for="floatingSelect">Jenis Kelamin</label>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-floating">
                <input type="date" class="form-control" id="floatingTtl" placeholder="Tanggal Lahir">
                <label for="floatingTtl">Tanggal Lahir</label>
              </div>
            </div>
            <div class="col-md-6">
                  <div class="form-floating">
                <input type="tel" class="form-control" id="floatingWa" placeholder="Nomor Whatsapp" pattern="\d*" title="Nomor whatsapp harus angka">
                <label for="floatingWa">Nomor Whatsapp</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="email" class="form-control" id="floatingEmail" placeholder="Email Aktif">
                <label for="floatingEmail">Email Aktif</label>
              </div>
            </div>
            
            <div class="col-12">
              <div class="form-floating">
                <textarea class="form-control" placeholder="Alamat" id="floatingTextarea" style="height: 100px;"></textarea>
                <label for="floatingTextarea">Alamat</label>
              </div>
            </div>          
            
            <div class="text-center">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmationModal">
                Kirim Data Pendaftaran
            </button>
            </div>
          </form><!-- End floating Labels Form -->

        </div>
    </div>

    <!-- Modal Konfirmasi-->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Pengiriman</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              Apakah anda yakin data yang anda masukkan sudah benar? <br><br>
              Kode aktivasi akan dikirimkan ke nomor whatsapp &nbsp;<span class="badge bg-success" id="modalWaDisplay"></span>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Perbarui Data</button>
              <a href="/link-tujuan" class="btn btn-primary">Kirim</a>
          </div>
      </div>
  </div>
</div>

    <x-user-script>
      <script>
        var wa = document.getElementById('floatingWa');
        var modalWa = document.getElementById('modalWaDisplay');
        wa.addEventListener('input', function(){
          modalWa.innerHTML = wa.value;
        });
      </script>
      </x-user-script>

    
  
</x-user-layout>