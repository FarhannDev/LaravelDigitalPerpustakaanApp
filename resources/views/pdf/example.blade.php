<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    </style>
</head>

<body>

    <div class="table-responsive my-3" style="overflow-x:auto;">
        <table class="table  table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Status</th>
                    <th scope="col">Diterbitkan</th>
                    <th scope="col">Diperbarui</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($items as $item)
                <tr>
                    <th>{{ $loop->index + 1 }}</th>
                    <td>
                        {{ $item->title }}
                    </td>
                    <td>{{ $item->category['category_name'] }}</td>
                    <td>{{ $item->isbn }}</td>
                    <td>{{ $item->total_books }} Buku</td>
                    <td>
                        @if ($item->is_status === 'publish')
                        <p class="text-success text-capitalize text-start">{{ $item->is_status }}</p>
                        @else
                        <p class="text-danger text-capitalize text-start">{{ $item->is_status }}</p>
                        @endif
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>