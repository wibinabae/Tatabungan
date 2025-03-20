<x-layout>
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
          </ol>
        </nav>
      </div>
      <section class="section dashboard">
        <div class="row">
          Ini adalah Halaman Buku Tabungan, yang nantinya akan menampilkan akan buku tabungan yang dimiliki masing-masing user.
          User nantinya bisa me-klik buku tabungan tersebut dan ketika berhasil diklik maka akan menampilkan riwayat pembayaran tabungan. 
        </div>
      </section>
    </x-layout>