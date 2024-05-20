<body>
    <div class="container mt-5 mb-5">
        <div class="row mt-4 mb-4 text-center">
            <h1>Dodaj nowy kurs</h1>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <form method="POST" action="{{ route('courses.store') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group mb-2">
                        <label for="course_name" class="form-label">Nazwa kursu</label>
                        <input id="course_name" name="course_name" type="text" class="form-control @if ($errors->first('course_name') && request()->isMethod('POST')) is-invalid @endif" value="{{ old('course_name') }}">
                        @if ($errors->first('course_name') && request()->isMethod('POST'))
                            <div class="invalid-feedback">Nieprawidłowa nazwa kursu!</div>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label for="course_description" class="form-label">Opis kursu</label>
                        <textarea id="course_description" name="course_description" class="form-control @if ($errors->first('course_description') && request()->isMethod('POST')) is-invalid @endif">{{ old('course_description') }}</textarea>
                        @if ($errors->first('course_description') && request()->isMethod('POST'))
                            <div class="invalid-feedback">Nieprawidłowy opis kursu!</div>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label for="instructor_id" class="form-label">ID instruktora</label>
                        <input id="instructor_id" name="instructor_id" type="text" class="form-control @if ($errors->first('instructor_id') && request()->isMethod('POST')) is-invalid @endif" value="{{ old('instructor_id') }}">
                        @if ($errors->first('instructor_id') && request()->isMethod('POST'))
                            <div class="invalid-feedback">Nieprawidłowe ID instruktora!</div>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label for="start_date" class="form-label">Data rozpoczęcia</label>
                        <input id="start_date" name="start_date" type="date" class="form-control @if ($errors->first('start_date') && request()->isMethod('POST')) is-invalid @endif" value="{{ old('start_date') }}">
                        @if ($errors->first('start_date') && request()->isMethod('POST'))
                            <div class="invalid-feedback">Nieprawidłowa data rozpoczęcia!</div>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label for="end_date" class="form-label">Data zakończenia</label>
                        <input id="end_date" name="end_date" type="date" class="form-control @if ($errors->first('end_date') && request()->isMethod('POST')) is-invalid @endif" value="{{ old('end_date') }}">
                        @if ($errors->first('end_date') && request()->isMethod('POST'))
                            <div class="invalid-feedback">Nieprawidłowa data zakończenia!</div>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label for="max_capacity" class="form-label">Maksymalna pojemność</label>
                        <input id="max_capacity" name="max_capacity" type="number" class="form-control @if ($errors->first('max_capacity') && request()->isMethod('POST')) is-invalid @endif" value="{{ old('max_capacity') }}">
                        @if ($errors->first('max_capacity') && request()->isMethod('POST'))
                            <div class="invalid-feedback">Nieprawidłowa maksymalna pojemność!</div>
                        @endif
                    </div>
                    <div class="text-center mt-4 mb-4">
                        <input class="btn btn-success" type="submit" value="Dodaj kurs">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
