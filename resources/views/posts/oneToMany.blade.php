@extends('layouts.user')

@section('title')
    user create
@endsection

@section('content')
<h1>Eloquent: Relationships ORM => One To One </h1> <hr>
<h4>BelongsTo</h4>
<p>
    <strong>User Model Work</strong><br>
    <strong>
        একটি টেবিলের আইডি যদি অন্য টেবিলে ব্যবহার হয় তাহলে ওই সংশ্লিষ্ট মডেলে BelongsTo টু ব্যবহার হয়। যদি বিপরীত ক্ষেত্রে ব্যবহার হয়, hasOne ব্যবহার হয়।
    </strong><br>
    <strong>
        সংযোগকৃত মডেলে যদি ডাটা কম থাকে তাহলে ডাটা তুলে আনার ক্ষেত্রে নিম্মোক্ত এরে ফাংশন ব্যবহার করতে হবে
        <br> <em style="color: red">user->user_role['role_id']</em> 
    </strong><br>

    Post Model Join with User -> user_id; <br>
    Post Model Join with Category -> categorie_id; <br>
    Post Model function User {return $this->hasOne(User::class)} <br>
    Post Model function Category { return $this->belongsToMany('App\Models\Role', 'user_roles', 'role_id');}
</p>
<div class="card-body table-responsive p-0">
    
</div> 

<hr>
<h4>hasOne</h4>
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

