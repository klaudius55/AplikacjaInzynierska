<table>
    <thead>
    <tr>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Czas pracy</th>

    </tr>
    </thead>
    <tbody>
    @foreach($taskworkers as $taskworker)
        <tr>
            <td>{{ $taskworker->worker->name??''}}</td>
            <td>{{$taskworker->worker->surname??'' }}</td>
            <td>{{ $taskworker->cp}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
