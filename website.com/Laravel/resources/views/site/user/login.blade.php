@extends('site.main')

@section('content')
<?php
    $prefix     = 'user';
    $name_model = 'user';
    $link_image = url("uploads/admin/{$prefix}");
?>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if( Session('flag'))
                    <div class="alert alert-{{ session('flag') }}">
                        {{ session('message') }}
                    </div>
                @endif
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="login" method="POST">
                            @csrf
							<input placeholder="Username" type="text" name="username" value="{{old('name')}}" required/>
							<input placeholder="Password" type="password" name="password" required />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" name="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="register" method="POST" enctype="multipart/form-data">
                            @csrf
							<input type="text" name="name" value="{{old('name')}}" placeholder="Name *" />
							<input type="email" name="email" value="{{old('email')}}" placeholder="Email" />
                            <input type="address" name="address" value="{{old('address')}}" placeholder="Address" />
                            <input type="phone" name="phone" value="{{old('phone')}}" placeholder="Phone" />
                            <input type="username" name="username" value="{{old('username')}}" placeholder="Username *" />
							<input type="password" name="password" value="{{old('password')}}" placeholder="Password *" />
                            <input type="password" name="re_password" placeholder="Re-Password*"/>
                            <label>Avartar</label>
                            <input type="file" name="image">
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
@endsection	
