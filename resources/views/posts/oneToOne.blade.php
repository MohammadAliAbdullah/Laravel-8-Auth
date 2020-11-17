@extends('layouts.user')

@section('title')
    Post
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
    Post Model function Category { return $this->belongsTo('App\Models\Category', 'user_roles', 'role_id');}
</p>
<table border="1">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>title</th>
                <th>description</th>
                <th>User name => User Model</th>
                <th>Category Name => Category Model</th>
            </tr>
        </thead>
        <body>
            @foreach ($posts as $post)
                <tr align="center">
                    <td>{{ $post->id }}</td>
                    <td >{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->category_id }}</td>
                </tr>
            @endforeach
        </body>
</table>
@endsection