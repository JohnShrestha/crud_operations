<!DOCTYPE html>
<html lang="en-US">

<head>
  <title> Form</title>
  <link rel="stylesheet" href="{{ asset('assets/front-end/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <form method="POST" action="{{ route('student.update', $data['student']->id ) }}" enctype="multipart/form-data">
    @csrf

    <div class="container">
      <h1>Update Your Data</h1>`
      <div class="row">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $data['student']->name }}" class="form form-control" id="name"  placeholder="Enter Name">
        @if($errors->has('name'))
            <p id="name-error" class="text-danger " for="site_email"><span>{{ $errors->first('name') }}</span></p>
        @endif
      </div>
      <div class="row">
        <label for="address">Address</label>
        <input type="text" name="address" value="{{ $data['student']->address }}" id="address"  class="form form-control" placeholder="Address">
        <span class="text-danger">
          @if($errors->has('address'))
          <p id="address-error" class="text-danger " for="site_email"><span>{{ $errors->first('address') }}</span></p>
      @endif
      </div>
      <div class="row">
        <label for="contact">Contact No:</label>
        <input type="tel" name="contact" value="{{ $data['student']->contact }}" id="contact" class="form form-control" placeholder="98********">
        @if($errors->has('contact'))
            <p id="contact-error" class="text-danger " for="site_email"><span>{{ $errors->first('contact') }}</span></p>
        @endif
      </div>
      <div class="row">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $data['student']->email }}" id="email" class="form form-control" placeholder="Email">
        @if($errors->has('email'))
            <p id="emqil-error" class="text-danger " for="site_email"><span>{{ $errors->first('email') }}</span></p>
        @endif
      </div>
      <div class="row">
        <label for="gender"> Select your gender</label>
        <select name="gender" id="gender" class="form form-control" placeholder="Gender">
          <option value="Male" @if( $data['student']->gender =='Male' ): selected ? @endif>Male</option>
          <option value="Female"  @if( $data['student']->gender =='Female' ): selected ? @endif>Female</option>
          <option value="Other"  @if( $data['student']->gender =='Other' ): selected ? @endif>other</option>
        </select>
      </div>
      <div class="row">
        <label for="faculty"> Select you Faculty</label>
        <select name="faculty" id="faculty" class="form form-control" placeholder="Faculty">
          <option value="BCA" @if( $data['student']->faculty == 'BCA' ):  selected ? @endif>BCA</option>
          <option value="BIM" @if( $data['student']->faculty == 'BIM' ):  selected ? @endif >BIM</option>
          <option value="BIT" @if( $data['student']->faculty == 'BIT' ):  selected ? @endif>BIT</option>
          <option value="BSC CSIT" @if( $data['student']->faculty == 'BSC CSIT' ):  selected ? @endif>BSC CSIT</option>
        </select>
        <div class="row">
          <label for="image">Upload Your CV</label>
          <input type="file" name="image"  value="{{ $data['student']->image }}"  id="image"  accept="image/*" class="form-control">
          <img src="{{ asset('uploads/students/'.$data['student']->image) }}"width="70px" height="70px" alt="image">




        </div>
      </div>
      <div class="row">
        <button class="btn btn-success" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true">&nbsp;</i> Update</button>
      </div>
    </div>
  </form>
</body>
<script src="{{asset('assets/front-end/js/jquery-3.6.3.min.js')}}"></script>
<script src="{{asset('assets/front-end/js/bootstrap.min.js')}}"></script>

</html>
