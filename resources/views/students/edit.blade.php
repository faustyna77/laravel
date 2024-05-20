<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj dane studenta</title>
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
            <h1 class="text-3xl font-bold">Edytuj dane studenta</h1>
        </div>

        <div class="row justify-center">
            <div class="col-6">
                <form method="POST" action="{{ route('students.update', $student->student_id) }}" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="first_name" class="form-label">Imię</label>
                        <input id="first_name" name="first_name" type="text" class="form-control" value="{{ $student->first_name }}">
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="last_name" class="form-label">Nazwisko</label>
                        <input id="last_name" name="last_name" type="text" class="form-control" value="{{ $student->last_name }}">
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="email" class="form-control" value="{{ $student->email }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="date_of_birth" class="form-label">Data urodzenia</label>
                        <input id="date_of_birth" name="date_of_birth" type="date" class="form-control" value="{{ $student->date_of_birth }}">
                        @error('date_of_birth')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="other_details" class="form-label">Dodatkowe informacje</label>
                        <textarea id="other_details" name="other_details" class="form-control">{{ $student->other_details }}</textarea>
                        @error('other_details')
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
