@extends('layouts.user')

@section('title')
    user create
@endsection

@section('content')
<h1>Eloquent: Relationships ORM => One To One </h1> <hr>
<h4>hasOne</h4>
<p>
    <strong>User Model Work</strong><br>
    <strong>
        একটি টেবিলের আইডি যদি অন্য টেবিলে ব্যবহার হয় তাহলে ওই সংশ্লিষ্ট মডেলে BelongsTo টু ব্যবহার হয়। যদি বিপরীত ক্ষেত্রে ব্যবহার হয়, hasOne ব্যবহার হয়।
    </strong><br>
    User Model Join with Phone -> user_id; <br>
User Model function {return $this->hasOne(User::class)}
</p>
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap" id="ShowUser">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone => Phone Model</th>
            </tr>
        </thead>
        <body>
            @foreach ($users as $user)
                <tr align="center">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phones}}</td>
                </tr>
            @endforeach
        </body>
</table>
<h4>BelongsTo</h4>
<p>
    <strong>Phone Model Work</strong><br>
    <strong>
        একটি টেবিলের আইডি যদি অন্য টেবিলে ব্যবহার হয় তাহলে ওই সংশ্লিষ্ট মডেলে BelongsTo টু ব্যবহার হয়। যদি বিপরীত ক্ষেত্রে ব্যবহার হয়, hasOne ব্যবহার হয়।
    </strong><br>
    Phone-> Model Join with User -> id; <br>
    Phone Model function user {return $this->BelongsTo(User::class)}
<strong>Phone Model function user {return $this->BelongsTo(User::class)} <br> <em style="color: red">In you use function name users() then error</em> </strong>
</p>
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap" id="ShowUser">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name=> User Model</th>
                <th>Email =>User Model </th>
                <th>Phone</th>
            </tr>
        </thead>
        <body>
            @foreach ($phones as $phone)
                <tr align="center">
                    <td>{{ $phone->id }}</td>
                    <td>{{ $phone->user->name }}</td>
                    <td>{{ $phone->user->email }}</td>
                    <td>{{ $phone->phone}}</td>
                </tr>
            @endforeach
        </body>
</table>
@endsection