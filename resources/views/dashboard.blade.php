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
          Ini adalah Halaman Dashboard, yang nantinya akan menampilkan informasi mengenai ringkasan dari user, 
          seperti jumlah buku tabungan, nilai yang sudah di tabungkan, dan lain sebagainya.
        </div>
      </section>
    </x-layout>