<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ URL::asset('dist/css/common_background.css') }}">



    <title>Assessment Activities</title>
  </head>
  <body>
    <section class="container mt-5">
        <div class="">
            <a class="btn btn-info" href="/">Back to home</a> <a href="{{ route('assessment-activities.courses') }}" class="btn btn-primary">Add an Assessment Activity</a>
            <hr>
        </div>
        <table class="table table-striped" id="table">
            <thead>
                <tr>
                    <th scope="col">Assessment Activity ID</th>
                    <th scope="col">Course Assessment ID</th>
                    <th scope="col">Weightage</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assessment_activities as $key => $val)

                <tr>
                    <th scope="row">{{$val->assessmentactivity_id}}</th>
                    <td>{{$val->courseassessment_id}}</td>
                    <td>{{$val->weightage}}</td>
                    <td>{{$val->type}}</td>
                    <td>
                        {{-- <a href="{{ route('courseAssessments.edit', $val->id) }}" class="btn btn-secondary">Edit</a>
                        <a href="{{ route('courseAssessments.show', $val->id) }}" class="btn btn-danger">Delete</a> --}}
                    </td>
                </tr>
                @endforeach
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

