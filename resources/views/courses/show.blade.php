<body>
    <div class="container mt-5 mb-5">
        <div class="row mb-1">
            <h1>Dane kursu</h1>
        </div>

        <table class="table table-hover table-striped">
            <tbody>
                <tr>
                    <th scope="col">Nazwa kursu</th>
                    <td>{{ $course->course_name }}</td>
                </tr>
                <tr>
                    <th scope="col">Opis kursu</th>
                    <td>{{ $course->course_description }}</td>
                </tr>
                <tr>
                    <th scope="col">ID instruktora</th>
                    <td>{{ $course->instructor_id }}</td>
                </tr>
                <tr>
                    <th scope="col">Data rozpoczęcia</th>
                    <td>{{ $course->start_date }}</td>
                </tr>
                <tr>
                    <th scope="col">Data zakończenia</th>
                    <td>{{ $course->end_date }}</td>
                </tr>
                <tr>
                    <th scope="col">Maksymalna pojemność</th>
                    <td>{{ $course->max_capacity }}</td>
                </tr>
                <tr>
                    <th scope="col"></th>
                    <td>
                        <a href="{{ route('courses.edit', $course->course_id) }}" class="btn btn-primary mb-2">Edycja</a>
                        <form method="POST" action="{{ route('courses.destroy', $course->course_id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Usuń" />
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
