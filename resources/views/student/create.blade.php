<!DOCTYPE html>
<html lang="en-US">

<head>
    <title> Form</title>
    <link rel="stylesheet" href="{{ asset('assets/front-end/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="container">
            <h1>Application Form</h1>
            <div class="row">
                <label for="name">Name</label>
                <input type="text" name="name" class="form form-control" id="name"
                    value="{{ old('name') }}" placeholder="Enter Name">
                @if ($errors->has('name'))
                    <p id="name-error" class="text-danger " for="site_email"><span>{{ $errors->first('name') }}</span>
                    </p>
                @endif
            </div>
            <div class="row">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="{{ old('address') }}"
                    class="form form-control" placeholder="Address">
                @if ($errors->has('address'))
                    <p id="address-error" class="text-danger " for="site_email">
                        <span>{{ $errors->first('address') }}</span>
                    </p>
                @endif
            </div>
            <div class="row">
                <label for="contact">Contact No:</label>
                <input type="tel" name="contact" id="contact" value="{{ old('contact') }}"
                    class="form form-control" placeholder="98********">
                @if ($errors->has('contact'))
                    <p id="contact-error" class="text-danger " for="site_email">
                        <span>{{ $errors->first('contact') }}</span>
                    </p>
                @endif
            </div>
            <div class="row">
                <label for="email">Email</label>
                <input type="" name="email" id="email" value="{{ old('email') }}"
                    class="form form-control" placeholder="Email">
                @if ($errors->has('email'))
                    <p id="email-error" class="text-danger " for="site_email"><span>{{ $errors->first('email') }}</span>
                    </p>
                @endif
            </div>
            <div class="row">
                <label for="gender"> Select your gender</label>
                <select name="gender" id="gender" value="{{ old('gender') }}" class="form form-control"
                    placeholder="Gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">other</option>
                </select>

            </div>
            <div class="row">
                <label for="faculty"> Select you Faculty</label>
                <select name="faculty" id="faculty" value="{{ old('faculty') }}" class="form form-control"
                    placeholder="Faculty">
                    <option value="BCA">BCA</option>
                    <option value="BIM">BIM</option>
                    <option value="BIT">BIT</option>
                    <option value="BSC CSIT">BSC CSIT</option>
                </select>


                <div class="row">
                    <label for="image">Upload Your CV</label>
                    <input type="file" name="image" id="image" accept="image/*">
                </div>
            </div>
            <div class="row">
                <button class="btn btn-success" type="submit"><i class="fa fa-paper-plane-o"
                        aria-hidden="true">&nbsp;</i> Submit</button>&nbsp; &nbsp;
                <button class="btn btn-warning" type="reset"><i class="fa fa-trash"
                        aria-hidden="true">&nbsp;</i>reset</button>
            </div>
        </div>
    </form>
</body>
<script src="{{ asset('assets/front-end/js/jquery-3.6.3.min.js') }}"></script>
<script src="{{ asset('assets/front-end/js/bootstrap.min.js') }}"></script>

</html>
