


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
  @php
      $query = "SELECT ca.*, a.assessment_type
          FROM course_assessments ca
          JOIN courses c ON c.course_id = ca.course_id
          JOIN assessments a ON a.assessment_id = ca.assessment_id
          WHERE c.course_id = :course_id";

        $courseAssessments = DB::select($query, ['course_id' => $course_id]);
  @endphp
  <body>
    <h1>Activities for for Course {{ $course_id }} Learner {{ $learner_id }}</h1>
    <section class="container mt-5">
        <div class="">
            <a class="btn btn-info" href="/">Back to home</a>
            <hr>
        </div>
        <table class="table table-striped" id="table">
            <thead>
                <tr>
                    <th scope="col">Assessment Activity</th>
                    <th scope="col">Course Assessment</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courseAssessments as $courseAssessment)

                <tr>
                    <td scope="row"> {{$courseAssessment->course_assessment_id}}</td>
                    <td scope="row"><a href="{{ route('learners.markActivities', ['course_id' => $course_id, 'learner_id' => $learner_id, 'course_assessment_id' => $courseAssessment->course_assessment_id]) }}"> {{$courseAssessment->assessment_type}}</a></td>

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

