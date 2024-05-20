<?php

namespace App\Http\Controllers;

use App\Models\ExamResult;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateExamResultRequest;
use App\Http\Requests\StoreExamResultRequest;
use Illuminate\Support\Facades\Gate;

class ExamResultController extends Controller
{
    public function index()
    {
        return view('exam_results.index', [
            'exam_results' => ExamResult::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('exam_results.create', ['students' => $students]);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'exam_name' => 'required|string',
            'exam_date' => 'required|date',
            'subject' => 'required|string',
            'score' => 'required|numeric|min:0|max:100',
        ]);

        $exam_result = new ExamResult();
        $exam_result->student_id = $request->student_id;
        $exam_result->exam_name = $request->exam_name;
        $exam_result->exam_date = $request->exam_date;
        $exam_result->subject = $request->subject;
        $exam_result->score = $request->score;
        $exam_result->save();

        return redirect()->route('exam_results.index')->with('success', 'Wynik egzaminu został dodany pomyślnie.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamResult $exam_result)
    {
        return view('exam_results.show', [
            'exam_result' => $exam_result
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamResult $exam_result)
    {
        $students = Student::all();
        return view('exam_results.edit', [
            'exam_result' => $exam_result,
            'students' => $students,
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExamResultRequest $request, ExamResult $exam_result)
    {
        Gate::authorize('update', $exam_result);

        $input = $request->all();
        $exam_result->update($input);

        return redirect()->route('exam_results.index')->with('success', 'Wynik egzaminu został zaktualizowany.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamResult $exam_result)
    {
        $exam_result->delete();
        return redirect()->route('exam_results.index')->with('success', 'Wynik egzaminu został usunięty.');
    }
}
