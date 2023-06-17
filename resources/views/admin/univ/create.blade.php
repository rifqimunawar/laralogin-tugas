@section('title') {{ 'Admin' }}@endsection
@extends('admin.layouts')
@section('content')

<!-- partial -->
  <div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="home-tab">
          <div class="d-sm-flex align-items-center justify-content-between border-bottom">
            <h4>Data Kamar Kosan</h4>
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
      
                      <form action="{{ route('univ.store') }}" method="post">
                        @csrf
                        <div class="mb-2">
                          <label for="name">Nama Kampus Baru</label>
                          <input class="form-control" type="text" name="name" aria-label="default input example">
                        </div>
                        
                        </div>
                        <div class="d-flex justify-content-end">
                          <a href="{{ route('univ.index') }}" class="btn btn-warning btn-sm m-2">Kembali</a>
                          <button type="submit" class="btn btn-primary btn-sm m-2">Simpan</button>
                        </div>
                      </form>
              
                  </div>
                </div>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection