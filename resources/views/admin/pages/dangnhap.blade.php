@extends("admin/layouts/headerlogin")
@section("content")
<div class="row">
  <div class="col-lg-3"></div>
  <div class="col-lg-6"><section class="section main-section">
    <div class="card">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-lock"></i></span>
          Login
        </p>
        <div class="panel-heading">
                @if(Session::has('matb')) 
                @if(Session::get('matb')=='0')
                <div class="alert alert-danger">
                  {{Session::get('noidung')}}
                </div>
                @endif
                @endif
          </div>
      </header>
      <div class="card-content">
        <form action="dang-nhap-admin" method="POST">
        {{csrf_field()}}
          <div class="field spaced">
            <label class="label">Login</label>
            <div class="control icons-left">
              <input class="input" type="text" style="height:50px;" name="email" placeholder="user@example.com" autocomplete="username">
              <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
            </div>
            <p class="help">
              Please enter your login
            </p>
            @if($errors->has('email'))
              <label style="color:red">
                {{$errors->first('email')}}
              </label>
              @endif
          </div>

          <div class="field spaced">
            <label class="label">Password</label>
            <p class="control icons-left">
              <input class="input" style="height:50px;"  type="password" name="password" placeholder="Password" autocomplete="current-password">
              <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
            </p>
            <p class="help">
              Please enter your password
            </p>
            @if($errors->has('password'))
              <label style="color:red">
                {{$errors->first('password')}}
              </label>
              @endif
          </div>

          <div class="field spaced">
            <div class="control">
              <label class="checkbox"><input type="checkbox" name="remember" value="1" checked>
                <span class="check"></span>
                <span class="control-label">Remember</span>
              </label>
            </div>
          </div>

          <hr>

          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button blue">
                Login
              </button>
            </div>
            <div class="control">
              <a href="{{route('trangchu')}}" class="button">
                Back
              </a>
            </div>
          </div>

        </form>
      </div>
    </div>

  </section></div>
  <div class="col-lg-3"></div>
</div>

@endsection

