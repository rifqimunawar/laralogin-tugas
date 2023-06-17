<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak-PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <h2 class="text-center my-4">Data Penghuni Kosan</h2>

    <div class="container my-3">
      <table class="table table">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-start">Domisili</th>
            <th class="text-center"> Kamar</th>
            <th class="text-center"> Kampus</th>
            <th class="text-center"> WhatsApps</th>
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
        </tr>
        @endforeach
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>