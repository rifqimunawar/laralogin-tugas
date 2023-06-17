@section('title') {{ 'Admin' }}@endsection
@extends('admin.layouts')
@section('content')

<!-- partial -->
  <div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="home-tab">
          <div class="d-sm-flex align-items-center justify-content-between border-bottom">
            <h4>Data Penghuni Kosan</h4>
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
                </div>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection