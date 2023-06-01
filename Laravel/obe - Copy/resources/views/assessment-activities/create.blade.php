<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add an Assessment Activity</title>
  </head>
  @php
  $result = DB::table('assessment_activities')->max('assessmentactivity_id');
  $maxAssessmentActivitytId = $result;
@endphp
  <body>
    <center><h3>Create an Activity for Course {{ $course_id }} Course Assessment {{ $course_assessment_id }}</h3></center>
    <section class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <div class="card col-lg-6 offset-lg-3">
            <div class="card-header">
                Add an Assessment Activity
            </div>
            <div class="card-body">
                <form action="{{ route('assessment-activities.store')}}" method="post">

                @csrf

                <div class="form-group">
                    <label for="">Course ID</label>
                    <input type="text" class="form-control" value="{{ $course_id }}" disabled>
                    @error('assessment_description') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>

                <div class="form-group">
                    <label for="">Assessment Activity ID</label>
                    <input type="number" class="form-control"  value="{{ ($maxAssessmentActivitytId+1) }}" disabled>

                    <input type="number" value="{{ ($maxAssessmentActivitytId+1) }}" name="assessmentactivity_id" hidden>
                    @error('assessmentactivity_id') <p class="text text-danger">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label for="">Course Assessment ID</label>
                    <input type="text" value="{{ $course_assessment_id }}" class="form-control" disabled>

                    <input type="number" value="{{ $course_assessment_id }}" name="courseassessment_id" hidden>
                    @error('courseassessment_id') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>

                <div class="form-group">
                    <label for="">Weightage</label>
                    <input type="number" class="form-control" name="weightage">
                    @error('weightage') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>

                <div class="form-group">
                    <label for="">Type</label>
                    <input type="text"  class="form-control" name="type">
                    @error('type') <p class="text text-danger">{{ $message }}</p> @enderror

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
