<html>
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
        <h1>Activities for Learner {{ $learner_id }} for Course {{ $course_id }} for Assessment {{ $course_assessment_id }}</h1>


        <section class="mt-5 container">
            <table class="table table-striped" id="table">
                <thead>
                    <tr>
                        <th scope="col">Assessment Activity ID</th>
                        <th scope="col">Course Assessment</th>
                        <th scope="col">Max Marks</th>
                        <th scope="col">Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assessment_activities as $key => $val)

                    <tr>
                        <th scope="row">{{$val->assessmentactivity_id}}</th>
                        <td>{{$val->courseassessment_id}}</td>
                        <td>{{$val->weightage}}</td>
                        <td><a href={{ route('learners.create', ['course_id' => $course_id, 'learner_id' => $learner_id, 'course_assessment_id' => $course_assessment_id, 'assessmentactivity_id' => $val->assessmentactivity_id]) }}>{{$val->type}}</a></td>
                        <td>
                            {{-- <a href="{{ route('courseAssessments.edit', $val->id) }}" class="btn btn-secondary">Edit</a>
                            <a href="{{ route('courseAssessments.show', $val->id) }}" class="btn btn-danger">Delete</a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
             </section>
    </body>
</html>
