

<body>
 

    <div class="container mt-5 mb-5">
        <div class="row mb-1">
            <h1>Dane studenta</h1>
        </div>
      
        <table class="table table-hover table-striped">
            <tbody>
                <tr>
                    <th scope="col">Imię</th>
                    <td>{{ $student->first_name }}</td>
                </tr>
                <tr>
                    <th scope="col">Nazwisko</th>
                    <td>{{ $student->last_name }}</td>
                </tr>
                <tr>
                    <th scope="col">Email</th>
                    <td>{{ $student->email }}</td>
                </tr>
                <tr>
                    <th scope="col">Data urodzenia</th>
                    <td>{{ $student->date_of_birth }}</td>
                </tr>
                <tr>
                    <th scope="col">Inne szczegóły</th>
                    <td>{{ $student->other_details }}</td>
                </tr>
                <tr>
                    <th scope="col"></th>
                    <td><a href="{{ route('students.edit', $student->student_id) }}" class="btn btn-primary mb-2">Edycja</a>
                        <form method="POST" action="{{ route('students.destroy', $student->student_id) }}">
                            @csrf
                            @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Usuń"/>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

   
</body>

</html>
