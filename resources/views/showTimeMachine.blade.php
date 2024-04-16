@include('mainpage')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>integration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Time machine</h2>
        <table class="table" id="myTable">
            <thead>

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">timeRecordId</th>
                    <th scope="col">timeRecordGroupId</th>
                    <th scope="col">startTime</th>
                    <th scope="col">stopTime</th>
                    <th scope="col">personId</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->timeRecordId }}</td>
                        <td>{{ $item->timeRecordGroupId }}</td>
                        <td>{{ $item->startTime }}</td>
                        <td>{{ $item->stopTime }}</td>
                        <td>{{ $item->personId }}</td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>