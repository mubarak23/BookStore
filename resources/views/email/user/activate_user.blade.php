@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Hello!',
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')

        <p>Thanks you for signin up on Borrow My Book, your account has been created successfully. Please click on the activation link below to activate account!</p>

    @include('beautymail::templates.sunny.contentEnd')

    @include('beautymail::templates.sunny.button', [
        	'title' => 'Activate Account',
        	'link' => 'http://127.0.0.1:8000/users/verifyemail/'.\Crypt::encrypt($user->id)
    ])

@stop