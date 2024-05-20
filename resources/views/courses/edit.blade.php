<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj dane kursu</title>
    <!-- Dodaj swoje własne style CSS tutaj -->
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
        .invalid-feedback {
            color: #ff0000;
            font-size: 14px;
            margin-top: 5px;
        }
        .btn {
            background-color: #28a745;
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
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row mt-4 mb-4 text-center">
            <h1 class="text-3xl font-bold">Edytuj dane kursu</h1>
        </div>

        <div class="row justify-center">
            <div class="col-6">
                <form method="POST" action="{{ route('courses.update', $course->course_id) }}" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="course_name" class="form-label">Nazwa kursu</label>
                        <input id="course_name" name="course_name" type="text" class="form-control" value="{{ $course->course_name }}">
                        @error('course_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="course_description" class="form-label">Opis kursu</label>
                        <textarea id="course_description" name="course_description" class="form-control">{{ $course->course_description }}</textarea>
                        @error('course_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="instructor_id" class="form-label">ID instruktora</label>
                        <input id="instructor_id" name="instructor_id" type="text" class="form-control" value="{{ $course->instructor_id }}">
                        @error('instructor_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="start_date" class="form-label">Data rozpoczęcia</label>
                        <input id="start_date" name="start_date" type="date" class="form-control" value="{{ $course->start_date }}">
                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="end_date" class="form-label">Data zakończenia</label>
                        <input id="end_date" name="end_date" type="date" class="form-control" value="{{ $course->end_date }}">
                        @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="max_capacity" class="form-label">Maksymalna pojemność</label>
                        <input id="max_capacity" name="max_capacity" type="number" class="form-control" value="{{ $course->max_capacity }}">
                        @error('max_capacity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center mt-4 mb-4">
                        <input class="btn" type="submit" value="Aktualizuj dane">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
