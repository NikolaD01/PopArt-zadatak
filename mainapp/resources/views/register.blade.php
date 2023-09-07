<x-layout>
  <div class="container py-md-12">
    <div class="col-lg-12 pl-lg-5 pb-3 py-lg-5">
      <form action="/register-user" method="POST" id="registration-form">
        @csrf
        <div class="form-group">
          <label for="username-register" class="text-muted mb-1"><small>Username</small></label>
          <input value="{{old('username')}}" ="username" id="username-register" class="form-control" type="text" placeholder="Pick a username" autocomplete="off" />
          @error('username')
            <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
          @enderror
        </div>

        <div class="form-group">
          <label for="email-register" class="text-muted mb-1"><small>Email</small></label>
          <input value="{{old('email')}}" name="email" id="email-register" class="form-control" type="text" placeholder="you@example.com" autocomplete="off" />
          @error('email')
            <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
          @enderror
        </div>

        <div class="form-group">
          <label for="password-register" class="text-muted mb-1"><small>Password</small></label>
          <input name="password" id="password-register" class="form-control" type="password" placeholder="Create a password" />
          @error('password')
            <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
          @enderror
        </div>

        <div class="form-group">
          <label for="password-register-confirm" class="text-muted mb-1"><small>Confirm Password</small></label>
          <input name="password_confirmation" id="password-register-confirm" class="form-control" type="password" placeholder="Confirm password" />
          @error('password_confirmation')
            <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
          @enderror
        </div>

        <div class="row justify-content-center">
          <button type="submit" class="py-3 mt-4 btn btn-lg btn-success ">Sign up for PopArt market</button>
        </div>
      </form>
    </div>
  </div>
</x-layout>