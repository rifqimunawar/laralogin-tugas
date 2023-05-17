<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rifqi Munawar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    
    <!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            Tugas PBF <br /></h1>
            <h4><span class="text-primary">Rifqi Munawar</span>
            </h4>
          <p style="color: hsl(217, 10%, 50.8%)">
            Kelas TIF A1 -> 41037006211013
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
              <form method="POST" action="authenticate">
                @csrf
                <div class="d-flex align-items-center justify-content-center mb-6 pb-1 text-center">
                  <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                  <span class="h1 fw-bold mb-0">
                    <img style="width: 100px; height: 100px; object-fit:cover" src="{{ asset('img/uninus.jpg') }}" alt="">
                  </span>
                </div>                    

                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                <div class="form-outline mb-4">
                  <input type="username" name="username" id="form2Example17" class="form-control form-control-lg" />
                  <label class="form-label" for="form2Example17">Username</label>
                </div>

                <div class="form-outline mb-4">
                  @if(Session::has('error'))
                  <div class="alert alert-danger">
                      {{ Session::get('error') }}
                  </div>
                  @endif
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" />
                  <label class="form-label" for="form2Example27">Password</label>
                </div>

                <div class="pt-1 mb-4 text-center">
                  <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                  <a class="btn btn-secondary btn-lg btn-block" href="/register">Register</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->

    <!-- sweetalert untuk notifikasi -->
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>