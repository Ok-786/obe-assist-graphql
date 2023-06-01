<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Marking</title>
  </head>
@php
                $course_registrations = \DB::table('course_registration')
                ->join('learner', 'course_registration.learner_id', '=', 'learner.learner_id')
                ->select('course_registration.*', 'learner.name as name', 'learner.email')
                ->where('course_registration.course_id', $course_id)
                ->get();
@endphp
  <body>
    <center><h3>Showing Learners from Course {{ $course_id }}</h3></center>
    <section class="container mt-5">
        <div class="">
            <a class="btn btn-info" href="/">Back to home</a>
            <hr>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"> Learner ID</th>
                    <th scope="col">Learner Name</th>
                    <th scope="col">Learner Email</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($course_registrations as $registrations)
                @php
                $learner_id = DB::selectOne('SELECT learner_id FROM course_registration WHERE course_id = :course_id', ['course_id' => $course_id])->learner_id;
                $name =    DB::selectOne('SELECT name FROM learner WHERE learner_id = :learner_id', ['learner_id' => $learner_id])->name;
                $email =    DB::selectOne('SELECT email FROM learner WHERE learner_id = :learner_id', ['learner_id' => $learner_id])->email;
                @endphp
                    <tr>
                        <td>{{ $registrations->learner_id }}</td>
                        <td><a href="{{ route('learners.activities', ['course_id' => $course_id, 'learner_id' => $registrations->learner_id]) }}"> {{ $registrations->name }}</a></td>
                        <td>{{ $registrations->email }}</td>
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
