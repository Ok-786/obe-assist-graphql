


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add PEO</title>
  </head>
  <body>

    @php

        $result = DB::table('peo')->max('peo_id');

        $maxPeoId = $result;

        $program_name = DB::selectOne('SELECT program_name FROM program WHERE program_id = :program_id', ['program_id' => $program_id])->program_name;
    @endphp

<div style="background-color: #5390bc; color:white">
    <center><h3>Create PEO for Program {{ $program_id ." ". $program_name}}</h3></center>
</div>
    <section class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <div class="card col-lg-6 offset-lg-3">
            <div class="card-header">
                Add PEO
            </div>
            <div class="card-body">
                <form action="{{ route('peo.store')}}" method="post">

                @csrf
                <div class="form-group">
                    <label for="">PEO ID</label>
                    <input type="number" class="form-control" value="{{ ($maxPeoId+1) }}" disabled>
                    <input type="number" name="peo_id" value="{{ ($maxPeoId+1) }}" hidden>
                    @error('peo_id') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>

                <div class="form-group">
                    <label for="">PEO Description</label>
                    <input type="text" class="form-control" name="peo_description" >
                    @error('peo_description') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>

                <div class="form-group">
                    <label for="">Program ID</label>

                        <input type="text" value="{{ $program_id . " " . $program_name }}" class="form-control" disabled>

                    @error('program_id') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>
                <input type="number" name="program_id" hidden value="{{ $program_id }}">

                <div class="form-group">
                    <label for="">Schema ID</label>
                    {{-- <input type="text" class="form-control" name="program_id" > --}}

                    {{-- <select name="schema_id" class="form-control"> --}}

                        {{-- @foreach ($programs as $key => $val)
                        <option value="{{$val->program_name}}" info="">{{$val->program_name}}</option>
                        @endforeach --}}

                        <input type="number" class="form-control" name="schema_id">

                    @error('schema_id') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>

                <br> <br>
                <div class="form-group">
                    <input type="submit" name="submit" value="Submit" class="btn btn-warning">
                </div>

                </form>
            </div>
        </div>
    </section>

    <hr>
    <br>
    <div style="background-color: #5390bc; color:white">
    <center> <h3>Already Defined PEOS for the {{ $program_name }} Program</h3> </center>
    </div>
    <section class="container mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">PEO ID</th>
                    <th scope="col">PEO Description</th>
                    <th scope="col">Program ID</th>
                    <th scope="col">Schema ID</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $peos = DB::select("SELECT * FROM peo WHERE program_id = :program_id", ['program_id' => $program_id]);

                    foreach ($peos as $key=>$val) {
                        echo "<tr> <td> " . $val->peo_id . "</td>";
                        echo "<td> " . $val->peo_description . "</td>";
                        echo "<td> " . $val->program_id . "</td>";
                        echo "<td>" . $val->schema_id . "</td>";
                        echo '<td><a  class="btn btn-secondary" href="' . route("peo.edit", $val->peo_id).'">Edit</a> <a  class="btn btn-danger" href="' . route("peo.destroy", $val->peo_id).'">Delete</a>';
                        //     echo `<td><a href="{{ route('peo.edit', $val->peo_id) }}" class="btn btn-secondary">Edit</a>
                    //     <a href="{{ route('peo.show', $val->peo_id) }}" class="btn btn-danger">Delete</a>
                    // </td>`;
                    }
                @endphp
            </tbody>

        </table>
    </section>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
