<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
<form class="" action="{{ route('student.update', $task->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="studentname" class="label">Student Name</label>
      <input type="text" name="name"  class="form-control"   value="{{ $task->name }}">
    </div>
    <div class="form-group">
      <label for="inputage" class="label">Age</label>
      <input type="number" name="age" class="form-control"  value="{{ $task->age }}">
    </div>
    <div class="form-group">
    <label for="status" class="label" name="status" >Status</label>
    <select class="form-control" name="status" >
        <option selected>Select...</option>
        <option {{ $task->status == 'Active' ? 'selected' : '' }}>Active</option>
        <option {{ $task->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
      </select>
    </div>
    <div class="mb-3">
        <label for="formFile"  class="label">Input Student Image</label>
    <div>
        @if ($task->image)
                        <img src="{{ asset('storage/images/' . $task->image) }}" alt="{{ $task->id }}" class="img-thumbnail" width="100" height="100">
                    @else
                        No image
                    @endif
                </div>
                    <input class="form-control" type="file"  name="image">
      </div>
    
    <button type= "submit" class="btn btn-primary" id="button">Update</button>
  </form>
    </div>
</body>
</html>