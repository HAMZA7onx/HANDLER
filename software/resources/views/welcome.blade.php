<form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="">Upload image</label><br>
    <input name="image" type="file"><br>
    @error('image')
        <div style="color:red;">{{$message}}</div>
    @enderror
    <br>

    <label for="">Name</label><br>
    <input name="name" type="text"><br>
    @error('name')
        <div style="color:red;">{{$message}}</div>
    @enderror
    <br>

    <label for="">Email</label><br>
    <input name="email" type="text"><br>
    @error('email')
        <div style="color:red;">{{$message}}</div>
    @enderror
    <br>

    <label for="">Password</label><br>
    <input name="password" type="text"><br>
    @error('password')
        <div style="color:red;">{{$message}}</div>
    @enderror
    <br>

    <button type="sumbit">submit</button>
</form>
