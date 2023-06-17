@section('title') {{ 'Admin' }}@endsection
@extends('admin.layouts')
@section('content')

<!-- partial -->
  <div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="home-tab">
          <div class="d-sm-flex align-items-center justify-content-between border-bottom">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
              </li>
              <li class="nav-item">
                <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
              </li>
            </ul>
            <div>
              <div class="btn-wrapper">
                <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
              </div>
            </div>
          </div>
          <div class="tab-content tab-content-basic">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
              <div class="row">
                <div class="col-sm-12">
                  <div class="statistics-details d-flex align-items-center justify-content-between">

                    <div class="container my-3">
                      <a class="btn btn-success mb-3 mx-3" href="{{ route('penghuni.create') }}">Tambah Penghuni Kos</a>
                      <table class="table table-striped table-hover">
                        <tr>
                            <td class="text-center">No</td>
                            <td class="text-center">Nama</td>
                            <td class="text-start">Domisili</td>
                            <td class="text-center"> Kamar</td>
                            <td class="text-center"> Kampus</td>
                            <td class="text-center"> WhatsApps</td>
                            <td class="text-center"> Aksi</td>
                        </tr>
                        @foreach ($penghunies as $penghuni)
                        <tr>
                          <td class="text-center">{{ $loop->iteration }}</td>
                          <td class="text-start">{{ $penghuni->name }}</td>
                          <td class="text-start">{{ $penghuni->domisili }}</td>
                          <td class="text-start">{{ $penghuni->kamars->name }}</td>
                          <td class="text-start">
                            @foreach ($penghuni->univ as $universitas)
                              @if ($universitas)
                                {{ $universitas->name }}
                              @else
                                -
                              @endif
                            @endforeach
                          </td>
                          <td class="text-start">
                            @if ($penghuni->phone)
                              {{ $penghuni->phone->phone }}
                            @else
                              -
                            @endif
                          </td>
                          <td class="text-center">
                              <form action="/penghuni/{{ $penghuni->id }}/" method="POST">
                                <a href="/penghuni/{{ $penghuni->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm
                                  ('Apakah Anda yakin ingin menghapus foto ini?')">Hapus</button>
                              </form>
                          </td>
                        </tr>
                        @endforeach
                      </table>
                    </div>

                    {{-- <div>
                      <p class="statistics-title">Bounce Rate</p>
                      <h3 class="rate-percentage">32.53%</h3>
                      <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                    </div>
                    <div>
                      <p class="statistics-title">Page Views</p>
                      <h3 class="rate-percentage">7,682</h3>
                      <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                    </div>
                    <div>
                      <p class="statistics-title">New Sessions</p>
                      <h3 class="rate-percentage">68.8</h3>
                      <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                    </div>
                    <div class="d-none d-md-block">
                      <p class="statistics-title">Avg. Time on Site</p>
                      <h3 class="rate-percentage">2m:35s</h3>
                      <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                    </div>
                    <div class="d-none d-md-block">
                      <p class="statistics-title">New Sessions</p>
                      <h3 class="rate-percentage">68.8</h3>
                      <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                    </div>
                    <div class="d-none d-md-block">
                      <p class="statistics-title">Avg. Time on Site</p>
                      <h3 class="rate-percentage">2m:35s</h3>
                      <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                    </div>
                  </div> --}}
                </div>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
{{-- <div class="col-lg-6 mb-5 mb-lg-0">
  <div class="card">
    <div class="card-body py-5 px-md-5">
      
      <h1>Ini Halaman Dashboard <br> Selamat Datang <br> 
        <span class="text-primary"> {{ $user->name }} </span> </h1>
        <br> <h4>Silahkan Logout</h4>
        <a href="/logout" class="btn btn-success" >Logout</a>
    </div>
  </div>
</div> --}}