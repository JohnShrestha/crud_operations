<!DOCTYPE html>
<html lang="en-US">

<head>
    <title> Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset('assets/front-end/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="container mt-5">

            <table class="table" id="myTable">
    </div>
        <thead>
            <tr>
                <th scope="col">S.N</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Faculty</th>
                <th scope="col">Gender</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @if($data['student'])
            @foreach($data['student'] as $key => $row)
            <tr>
                <th scope="row">{{ $key + 1 }}</th>

                <td>{{$row->name}}</td>
                <td>{{ $row->address }}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->contact}}</td>
                <td>{{$row->faculty}}</td>
                <td>{{$row->gender}}</td>
                <td>
                   <img src=" {{ asset('uploads/students/'.$row->image) }}" width="70px" height="50px" alt="Image">
                </td>

                <td>
                     <a href="{{ url('form/edit/' .$row->id) }} " class="btn btn-success btn-sm">Update</a>
                     <a href="{{ url('form/delete/'.$row->id) }}" onclick = "return confirm('Are You Sure To Delete')" class="btn btn-danger btn-sm">Delete</a>

                </td>

            </tr>
            @endforeach
        @else
        <p> Data not founds !</p>
        @endif


        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
    crossorigin="anonymous"></script>
      <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
      <script>
        $(document).ready(function() {
          $('#myTable').DataTable();
        });
      </script>
      {{-- <div class="row" >
        {{$data['student']->links()}}
      </div> --}}
</body>
{{-- <script src="{{ asset('assets/front-end/js/jquery-3.6.3.min.js') }}"></script>
<script src="{{ asset('assets/front-end/js/bootstrap.min.js') }}"></script> --}}


</html>
