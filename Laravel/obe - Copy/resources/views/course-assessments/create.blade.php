<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add a Course Assessment</title>
  </head>
  @php
      $result = DB::table('course_assessments')->max('course_assessment_id');
      $maxCourseAssessmentId = $result;
      $course_title = DB::selectOne('SELECT course_title FROM courses WHERE course_id = :course_id', ['course_id' => $course_id])->course_title;


  @endphp
  <body>
    <div style="background-color: #5390bc; color:white">
        <center><h3>Add Course Assessment for Course {{ $course_id ." ". $course_title}}</h3></center>
    </div>
    <section class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <div class="card col-lg-6 offset-lg-3">
            <div class="card-header">
                Add a Course Assessment
            </div>
            <div class="card-body">
                <form action="{{ route('course-assessments.store')}}" method="post">

                @csrf
                <div class="form-group">
                    <label for="">Course Assessment ID</label>
                    <input type="number" class="form-control"  value="{{ ($maxCourseAssessmentId+1) }}" disabled>
                    <input type="number" name="course_assessment_id" value="{{ ($maxCourseAssessmentId+1) }}" hidden>
                    @error('course_assessment_id') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>

                <div class="form-group">
                    <label for="">Course ID</label>
                    {{-- <input type="text" class="form-control" name="course_name" placeholder="OOP" > --}}
                    <input type="text" value="{{ $course_id." ".$course_title }}" class="form-control" disabled>
                    @error('assessment_description') <p class="text text-danger">{{ $message }}</p> @enderror
                    <input type="number" name="course_id" hidden value="{{ $course_id }}">
                </div>
                <div class="form-group">
                    <label for="">Assessment ID</label>
                    <select name="assessment_id" class="form-control">
                        @foreach ($assessments as $key => $val)

                        <option class="assessments" value="{{$val->assessment_id}}" info="">{{$val->assessment_type}}</option>

                        @endforeach

                    </select>
                    @error('assessment_id') <p class="text text-danger">{{ $message }}</p> @enderror
                </div>



                <br>
                <div class="form-group">
                    <input type="submit" name="submit" value="Submit" class="btn btn-warning">
                    <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                </div>

                </form>
            </div>
        </div>
    </section>
    <hr>
    <div style="background-color: #5390bc; color:white">
        <center><h3>Already Added Course Assessments for Course {{ $course_id ." ". $course_title}}</h3></center>
    </div>

    <section class="mt-5 container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Course Assessment ID</th>
                    <th scope="col">Course ID</th>
                    <th scope="col">Assessment ID</th>
                </tr>
            </thead>
            <tbody>

                    @foreach ($course_assessments as $key => $val)
                    @php
                        $assessment_type = DB::selectOne('SELECT assessment_type FROM assessments WHERE assessment_id = :assessment_id', ['assessment_id' => $val->assessment_id])->assessment_type;

                    @endphp
                    <tr>
                        <td>{{ $val->course_assessment_id }}</td>
                        <td>{{ $course_title }}</td>
                        <td>{{ $assessment_type }}</td>
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

    <script>
        function getAssessments(){
            var course_id = document.getElementById("course_id").value;
            console.log(course_id);

            var assessments = document.getElementsByClassName("assessments")
            console.log(assessments[0].value);
            console.log(assessments[2].value);
            console.log(assessments[4].value);
        }

    </script>
  </body>
</html>
