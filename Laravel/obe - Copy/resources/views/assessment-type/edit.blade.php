<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Program</title>
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
                Edit Program
            </div>
            <div class="card-body">
                <form action="{{ route('assessment-type.update', $data->id)}}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="">Assessment Type</label>
                    <input type="text" class="form-control" name="assessment_type" value="{{$data->assessment_type}}">
                    @error('program_name') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>

                <div class="form-group">
                    <label for="">Assessment Description</label>
                    <input type="text" class="form-control" name="dept_id" value="{{$data->assessment_description}}">
                    @error('dept_id') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>

                {{-- <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                    @error('password') <p class="text text-danger">{{ $message }}</p> @enderror

                </div> --}}
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
