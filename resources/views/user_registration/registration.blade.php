<x-user-layout>
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <h2 class="card-title text-center">Pendaftaran Akun Tatabungan</h2>

            <!-- Floating Labels Form -->
            <form class="row g-3" action="{{ route('register.store_register') }}" method="POST">
                @csrf

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="fullname"
                            placeholder="Nama Lengkap" required>
                        <label for="floatingName">Nama Lengkap</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingUsername" name="username"
                            placeholder="Nama Pengguna" required>
                        <label for="floatingUsername">Username</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="tel" class="form-control" id="floatingWa" name="wa_number"
                            placeholder="Nomor Whatsapp" pattern="\d*" title="Nomor whatsapp harus angka" required>
                        <label for="floatingWa">Nomor Whatsapp</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingEmail" name="email"
                            placeholder="Email Aktif" required>
                        <label for="floatingEmail">Email Aktif</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" name="gender" aria-label="JenisKelamin"
                            required>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <label for="floatingSelect">Jenis Kelamin</label>
                    </div>
                </div>
            

                <div class="text-center">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#confirmationModal">
                        Kirim Data Pendaftaran (Belum dipake)
                    </button>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        Kirim Data Pendaftaran
                    </button>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>

    <!-- Modal Konfirmasi-->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
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
    </div>

    <x-user-script>

        <script>
            $('#provinceSelect').change(function() {
                var provinceCode = $(this).val();
                console.log(provinceCode);

                if (provinceCode) {
                    $.ajax({
                        // url: '{{ url('get-cities') }}/' + provinceCode,
                        url: '{{ url('getCitiesByProvince') }}/' + provinceCode,
                        type: 'GET',
                        success: function(data) {
                            $('#citySelect').empty();
                            $('#citySelect').append('<option value="">Pilih Kota</option>');

                            $.each(data, function(index, city) {
                                $('#citySelect').append('<option value="' + city.code + '">' + city
                                    .name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#citySelect').empty();
                    $('#citySelect').append('<option value="">Pilih Kota</option>');
                }
            });

            $('#citySelect').change(function() {
                var cityCode = $(this).val();
                console.log(cityCode);

                if (cityCode) {
                    $.ajax({
                        url: '{{ url('getDistrictsByCity') }}/' + cityCode,
                        type: 'GET',
                        success: function(data) {
                            $('#districtSelect').empty();
                            $('#districtSelect').append('<option value="">Pilih Kecamatan</option>');

                            // $.each(data, function(index, district) {
                            //     $('#districtSelect').append('<option value="' + district.code + '">' + district.name + '</option>');
                            // });
                            $.each(data, function(index, district) {
                                $('#districtSelect').append('<option value="' + district.code +
                                    '">' + district
                                    .name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#districtSelect').empty();
                    $('#districtSelect').append('<option value="">Pilih Kecamatan</option>');
                }
            });

            $('#districtSelect').change(function() {
                var districtCode = $(this).val();
                console.log(districtCode);
                if (districtCode) {
                    $.ajax({
                        url: '{{ url('getVillagesByDistrict') }}/' + districtCode,
                        type: 'GET',
                        success: function(data) {
                            $('#villageSelect').empty();
                            $('#villageSelect').append('<option value="">Pilih Kecamatan</option>');

                            $.each(data, function(index, district) {
                                $('#villageSelect').append('<option value="' + district.code +
                                    '">' + district.name + '</option>');
                            })
                        }
                    });
                } else {
                    $('#villageSelect').empty();
                    $('#villageSelect').append('<option value="">Pilih Kecamatan</option>');
                }
            })
        </script>
        <script>
            var wa = document.getElementById('floatingWa');
            var modalWa = document.getElementById('modalWaDisplay');
            wa.addEventListener('input', function() {
                modalWa.innerHTML = wa.value;
            });
        </script>

    </x-user-script>



</x-user-layout>
