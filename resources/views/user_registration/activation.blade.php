<x-user-layout>
    <div class="card">
        <div class="card-body text-center">
            <h1 class="card-title text-center">Aktivasi Akun {{$preUser['username']}}</h1>
            <span>Masukan kode aktivasi yang dikirimkan melalui WhatsApp</span>
            <!-- Floating Labels Form -->
            <form class="row g-3 justify-content-center" action="{{ route('activation.store_activation') }}" method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingKode" name="activation_code" placeholder="Masukan Kode Aktivasi"
                             title="Kode Aktivasi">
                        <label for="floatingKode">Kode Aktivasi</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-key"></i>&nbsp; Aktifkan Akun
                    </button>
                </div>
            </form>

        </div>
    </div>

    <x-user-script>

    </x-user-script>



</x-user-layout>
