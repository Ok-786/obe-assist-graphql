<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Course</title>
  </head>
  @php

        $result = DB::table('courses')->max('course_id');

        $maxCourseId = $result;

    @endphp
  <body>
    <section class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <div class="card col-lg-6 offset-lg-3">
            <div class="card-header">
                Add Course
            </div>
            <div class="card-body">
                <form action="{{ route('courses.store')}}" method="post">

                @csrf
                <div class="form-group">
                    <label for="">Course ID</label>
                    <input type="number" class="form-control"  value="{{ ($maxCourseId+1) }}" disabled>
                    <input type="number" name="course_id" value="{{ ($maxCourseId+1) }}" hidden>
                    @error('course_id') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>




                <div class="form-group">
                    <label for="">Course Title</label>
                    <input type="text" class="form-control" name="course_title" placeholder="OOP">
                    @error('credit_hrs') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>

                <div class="form-group">
                    <label for="">Course Description</label>
                    <textarea name="course_description" cols="30" rows="3" class="form-control"></textarea>
                    @error('course_description') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>

                <div class="form-group">
                    <label for="">Program ID</label>
                    {{-- <input type="text" class="form-control" name="course_title" placeholder="OOP"> --}}
                    <select name="program_id"  class="form-control">
                        @foreach ($programs as $key => $val)
                            <option value="{{ $val->program_id }}"> {{ $val->program_name }} </option>
                        @endforeach
                    </select>
                    @error('program_id') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>

                <div class="form-group">
                    <label for="">Credit Hours</label>
                    {{-- <input type="text" class="form-control" name="course_title" placeholder="OOP"> --}}
                    <select name="course_credits" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    @error('credit_hrs') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>

                <div class="form-group">
                    <label for="">Course Type</label>
                    <input type="text" class="form-control" name="course_type">
                    @error('credit_hrs') <p class="text text-danger">{{ $message }}</p> @enderror

                </div>


                <div class="form-group">
                    <label for="">Course Code</label>
                    <input type="text" class="form-control" name="course_code">
                    @error('credit_hrs') <p class="text text-danger">{{ $message }}</p> @enderror

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
