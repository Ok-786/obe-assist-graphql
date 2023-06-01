<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ URL::asset('dist/css/common_background.css') }}">

    <title>Add A Mapping</title>
  </head>
  <body>
    <section class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <div class="card col-lg-6 offset-lg-3">
            <div class="card-header">
                Add a Mapping
            </div>
            <div class="card-body">
                <form action="{{ route('mapping.store')}}" method="post">

                @csrf
                <div class="form-group">
                    <label for="">PEO ID</label>
                    {{-- <input type="text" class="form-control" name="program_id" placeholder="BCSE"> --}}
                    <select name="peo_id" class="form-control">

                    @foreach($peos as $key => $val)
                        <option value="{{ $val->peo_id }}">{{ $val->peo_id." ".$val->peo_description }}</option>
                    @endforeach
                    </select>
                    @error('CLO ID') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>

                <div class="form-group">
                    <label for="">CLO ID</label>
                    {{-- <input type="text" class="form-control" name="program_id" placeholder="BCSE"> --}}
                    <select name="clo_id" class="form-control">

                    @foreach($clos as $key => $val)
                        <option value="{{ $val->clo_id }}">{{ $val->clo_id." ".$val->clo_description }}</option>
                    @endforeach
                    </select>
                    @error('CLO ID') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>
                <br>
                <div class="form-group">
                    <input type="submit" name="submit" value="Submit" class="btn btn-warning">
                </div>

                </form>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
