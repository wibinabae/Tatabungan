<x-head></x-head>


  <!-- ======= Header ======= -->
  <x-header></x-header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
<x-sidebar></x-sidebar>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
 

    <section class="section dashboard">
      <div class="row">
        {{ $slot }}
      </div>
    </section>

  </main>
<x-footer></x-footer>
  