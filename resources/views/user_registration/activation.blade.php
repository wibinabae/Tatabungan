<x-user-layout>
    <div class="card">
        <div class="card-body text-center">
            <h1 class="card-title text-center">Aktivasi Akun {{$preUser['username']}}</h1>
            <span>Masukan kode aktivasi yang dikirimkan melalui WhatsApp</span>
            <!-- Floating Labels Form -->
            <form class="row g-3 justify-content-center">

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="tel" class="form-control" id="floatingKode" placeholder="Masukan Kode Aktivasi"
                            pattern="\d*" title="Kode Aktivasi">
                        <label for="floatingKode">Kode Aktivasi</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-primary">
                        <i class="bi bi-key"></i>&nbsp; Aktifkan Akun
                    </button>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>

    <!-- Modal Konfirmasi-->
    {{-- <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Pengiriman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin data yang anda masukkan sudah benar? <br><br>
                    Kode aktivasi akan dikirimkan ke nomor whatsapp &nbsp;<span class="badge bg-success"
                        id="modalWaDisplay"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Perbarui Data</button>
                    <a href="/aktivasi" class="btn btn-primary">Kirim</a>
                </div>
            </div>
        </div>
    </div> --}}

    <x-user-script>

    </x-user-script>



</x-user-layout>
