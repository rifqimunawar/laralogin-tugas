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
                      
                      <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mahasiswa</th>
                                <th>Mata Kuliah</th>
                                <th>Dosen</th>
                                <th>Semester</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $penghuni)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $penghuni->name }}</td>
                                <td>
                                    <ul type="none">
                                        @foreach ($penghuni->penghuni as $huni)
                                        <li>
                                            @if ($penghuni->penghuni)
                                                {{ $huni->name }}
                                            @else
                                                -                                                    
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                                {{-- <td>
                                    <ul type="none">
                                        @foreach ($matkul->matkul as $mk)
                                        <li>
                                            @if ($matkul->matkul)
                                                {{ $mk->dosen }}
                                            @else
                                                -                                                    
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>  
                                </td> --}}
                                <td>
                                    <ul type="none">
                                        @foreach ($matkul->matkul as $mk)
                                        <li>
                                            @if ($matkul->matkul)
                                                {{ $mk->semester }}
                                            @else
                                                -                                                    
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul type="none">
                                        @foreach ($matkul->matkul as $mk)
                                        <li>
                                            @if ($matkul->matkul)
                                                {{ $mk->pivot->nilai }}
                                            @else
                                                -                                                    
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                                {{-- <td>{{ $data->nilai }}</td> --}}
                            </tr>
                            @php
                                $no++;
                            @endphp
                            @endforeach
                        </tbody>
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


