<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj dane rejestracji</title>
  
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
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row mt-4 mb-4 text-center">
            <h1 class="text-3xl font-bold">Edytuj dane rejestracji</h1>
        </div>

        <div class="row justify-center">
            <div class="col-6">
                <form method="POST" action="{{ route('registrations.update', $registration->registration_id) }}" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="student_id" class="form-label">Identyfikator studenta</label>
                        <input id="student_id" name="student_id" type="number" class="form-control" value="{{ $registration->student_id }}">
                        @error('student_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="course_id" class="form-label">Identyfikator kursu</label>
                        <input id="course_id" name="course_id" type="number" class="form-control" value="{{ $registration->course_id }}">
                        @error('course_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="registration_date" class="form-label">Data rejestracji</label>
                        <input id="registration_date" name="registration_date" type="date" class="form-control" value="{{ $registration->registration_date }}">
                        @error('registration_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="status" class="form-label">Status</label>
                        <input id="status" name="status" type="text" class="form-control" value="{{ $registration->status }}">
                        @error('status')
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
