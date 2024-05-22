<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj nowy kurs</title>
    
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .invalid-feedback, .text-danger {
            color: #ff0000;
            font-size: 14px;
            margin-top: 5px;
        }
        .text-center {
            text-align: center;
        }
        .mt-4 {
            margin-top: 1.5rem;
        }
        .mb-4 {
            margin-bottom: 1.5rem;
        }
        .mb-2 {
            margin-bottom: 0.5rem;
        }
    </style>
</head>
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
