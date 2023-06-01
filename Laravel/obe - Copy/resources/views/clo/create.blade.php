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
    $course_title = DB::selectOne('SELECT course_title FROM courses WHERE course_id = :course_id', ['course_id' => $course_id])->course_title;

    $result = DB::table('clo')->max('clo_id');
    $maxCloId = $result;
    @endphp
    <div style="background-color: #5390bc; color:white">
        <center><h3>Create a CLO for {{ $course_id . " " . $course_title}}</h3></center>
    </div>
    <section class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <div class="card col-lg-6 offset-lg-3">
            <div class="card-header">
                Add CLO
            </div>
            <div class="card-body">
                <form action="{{ route('clo.store')}}" method="post">

                @csrf
                <div class="form-group">
                    <label for="">CLO ID</label>
                    <input type="number" class="form-control" value="{{ ($maxCloId+1) }}" disabled>
                    <input type="number" value="{{ ($maxCloId+1) }}" name="clo_id" hidden>
                    @error('clo_id') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>

                <div class="form-group">
                    <label for="">CLO Description</label>
                    <input type="text" class="form-control" name="clo_description" >
                    @error('clo_description') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>

                <div class="form-group">
                    <label for="">Course ID</label>
                    <input type="text" class="form-control"  value="{{ $course_id." ".$course_title }}" disabled>

                    @error('course_id') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>
                <input name="course_id" type="number" hidden value="{{ $course_id }}">

                <div class="form-group">
                    <label for="">Resource Person ID</label>
                    <input type="number" class="form-control" name="resource_person_id">

                    @error('course_id') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>


                <br>
                <div class="form-group">
                    <input type="submit" name="submit" value="Submit" class="btn btn-warning">
                </div>

                </form>
            </div>
        </div>
    </section>
    <hr>

    <div style="background-color: #5390bc; color:white">
        <center><h3>Already created CLOs of {{ $course_id . " " . $course_title}}</h3></center>
    </div>
    <section class="container mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">CLO ID</th>
                    <th scope="col">CLO Description</th>
                    <th scope="col">Course ID</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $clos = DB::select("SELECT * FROM clo WHERE course_id = :course_id", ['course_id' => $course_id]);

                    foreach ($clos as $key=>$val) {
                        echo "<tr> <td> " . $val->clo_id . "</td>";
                        echo "<td> " . $val->clo_description . "</td>";
                        echo "<td> " . $val->course_id . "</td>";
                        echo '<td><a  class="btn btn-secondary" href="' . route("peo.edit", $val->clo_id).'">Edit</a> <a  class="btn btn-danger" href="' . route("peo.destroy", $val->clo_id).'">Delete</a>';
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

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
