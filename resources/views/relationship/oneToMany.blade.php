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
    <strong>
        সংযোগকৃত মডেলে যদি ডাটা কম থাকে তাহলে ডাটা তুলে আনার ক্ষেত্রে নিম্মোক্ত এরে ফাংশন ব্যবহার করতে হবে
        <br> <em style="color: red">user->user_role['role_id']</em> 
    </strong><br>

    User Model Join with UserRole -> role_id; <br>
User Model function User_role {return $this->hasOne(User::class)} <br>
User Model function role {return $this->belongsToMany('App\Models\Role', 'user_roles', 'role_id');}
</p>
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap" id="ShowUser">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Role => UserRole Model</th>
                <th>Role Name => Role Model</th>
            </tr>
        </thead>
        <body>
            @foreach ($users as $user)
                <tr align="center">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->user_role['role_id']}}</td>
                    {{-- <td>{{ $user->roles}}</td> --}}
                    @foreach ($user->roles as $role)
                        <td>{{ $role->name }}</td>
                    @endforeach
                    {{-- <td>{{$projects[$loop->index]->name}}</td> --}}

                    {{-- <td>{{ $user->roles->name}}</td> --}}
                    {{-- <td>{{ $user->user_role->role_id}}</td> --}}
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
    UserRole Model Join with User -> id; <br>
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    } <br>
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }<br>
    User Model : <br>
    public function user_role()
    {
        return $this->hasOne('App\Models\UserRole');
    }<br>
    Role Model : <br>
    public function user_roles()
    {
        return $this->hasOne('App\Models\UserRole', 'user_roles', 'role_id');
    } <br>
</p>
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap" id="ShowUser">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name=> User Model</th>
                <th>User id  </th>
                <th>Role id</th>
                <th>Role Name=> Role Model</th>
            </tr>
        </thead>
        <body>
                @foreach ($user_roles as $user_role)
                    <tr align="center">
                        <td>{{ $user_role->id }}</td>
                        <td>{{ $user_role->user->name}}</td>
                        <td>{{ $user_role->user_id}}</td>
                        <td>{{ $user_role->role_id }}</td>
                        <td>{{ $user_role->role['name'] }}</td>
                    </tr>
                @endforeach
        </body>
</table>
@endsection