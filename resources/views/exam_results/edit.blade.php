<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Wynik Egzaminu</title>
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
        }
        .max-w-md {
            max-width: 28rem;
        }
        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }
        .bg-white {
            background-color: #ffffff;
        }
        .shadow-md {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .rounded-lg {
            border-radius: 0.5rem;
        }
        .overflow-hidden {
            overflow: hidden;
        }
        .bg-gray-100 {
            background-color: #f3f4f6;
        }
        .border-b {
            border-bottom-width: 1px;
            border-bottom-style: solid;
            border-bottom-color: #d1d5db;
        }
        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .py-3 {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }
        .text-lg {
            font-size: 1.125rem;
        }
        .font-semibold {
            font-weight: 600;
        }
        .p-4 {
            padding: 1rem;
        }
        .mb-4 {
            margin-bottom: 1rem;
        }
        .block {
            display: block;
        }
        .text-gray-700 {
            color: #4b5563;
        }
        .mt-1 {
            margin-top: 0.25rem;
        }
        .form-select {
            appearance: none;
            background-color: #fff;
            border-color: #d1d5db;
            border-width: 1px;
            border-radius: 0.375rem;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0.75rem;
            padding-right: 2.5rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #1f2937;
            transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
            transition-duration: 0.2s;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
        .focus\:outline-none:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
        }
        .focus\:shadow-outline:focus {
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
        }
        .bg-blue-500 {
            background-color: #3b82f6;
        }
        .hover\:bg-blue-700:hover {
            background-color: #1d4ed8;
        }
        .text-white {
            color: #fff;
        }
        .font-bold {
            font-weight: 700;
        }
        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .rounded {
            border-radius: 0.375rem;
        }
        .focus\:outline-none:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
        }
        .focus\:shadow-outline:focus {
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
        }
    </style>
</head>
<body>
    <div class="container mx-auto mt-5">
        <div class="max-w-md mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-gray-100 border-b border-gray-200 px-4 py-3">
               
            <h4 class="text-lg font-semibold">Edytuj Wynik Egzaminu</h4>
            </div>
            <div class="p-4">
                <form method="POST" action="{{ route('exam_results.update', $exam_result->result_id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="student_id" class="block text-gray-700 font-semibold mb-2">Student</label>
                        <select id="student_id" name="student_id" class="form-select block w-full mt-1 focus:outline-none focus:shadow-outline">
                            @foreach($students as $student)
                                <option value="{{ $student->student_id }}" @if($student->id === $exam_result->student_id) selected @endif>{{ $student->first_name }} {{ $student->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="exam_name" class="block text-gray-700 font-semibold mb-2">Nazwa Egzaminu</label>
                        <input type="text" id="exam_name" name="exam_name" class="form-input block w-full mt-1 focus:outline-none focus:shadow-outline" required value="{{ $exam_result->exam_name }}">
                    </div>
                    <div class="mb-4">
                        <label for="exam_date" class="block text-gray-700 font-semibold mb-2">Data Egzaminu</label>
                        <input type="date" id="exam_date" name="exam_date" class="form-input block w-full mt-1 focus:outline-none focus:shadow-outline" required value="{{ $exam_result->exam_date }}">
                    </div>
                    <div class="mb-4">
                        <label for="subject" class="block text-gray-700 font-semibold mb-2">Przedmiot</label>
                        <input type="text" id="subject" name="subject" class="form-input block w-full mt-1 focus:outline-none focus:shadow-outline" required value="{{ $exam_result->subject }}">
                    </div>
                    <div class="mb-4">
                        <label for="score" class="block text-gray-700 font-semibold mb-2">Wynik</label>
                        <input type="number" id="score" name="score" class="form-input block w-full mt-1 focus:outline-none focus:shadow-outline" required min="0" max="100" value="{{ $exam_result->score }}">
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Aktualizuj Wynik</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
