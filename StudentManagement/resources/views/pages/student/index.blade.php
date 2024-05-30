@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-title">Student Details</h1>
        </div><br/>
        <div class="col-lg-5">
                <form class="form-add" action="{{ route('student.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="studentname" class="label">Student Name</label>
                      <input type="text" name="name"  class="form-control" id="input"  placeholder="Enter Student Name">
                    </div>
                    <div class="form-group">
                      <label for="inputage" class="label">Age</label>
                      <input type="number" name="age" class="form-control" id="input" placeholder="Enter Student Age">
                    </div>
                    <div class="form-group">
                    <label for="status" class="label" name="status">Status</label>
                    <select class="form-control" id="input">
                        <option selected>Select...</option>
                        <option>Active</option>
                        <option>Inactive</option>
                      </select>
                    </div>
                    <div class="mb-3">
                        <label for="formFile"  class="label">Input Student Image</label>
                        <input class="form-control" type="file" id="input" name="image">
                      </div>
                    
                    <button type="submit" class="btn btn-primary" id="button">Submit</button>
                  </form>
            
        </div>
        <div class="col-lg-12" id="table">
            <table class="table">
                <thead class="-table table-hover table-dark">
                  <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Student Age</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $key => $task)
                    <tr>
                        <th scope="row">{{ $task->id }}</th>
                        <td>@if ($task->image)
                            <img src="{{ asset('storage/images/' . $task->image) }}" alt="{{ $task->id }}" class="img-thumbnail" width="70px" height="70px"/>
                        @else
                            No image
                        @endif
                    </td>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->age }}</td>
                        <td>
                            @if ( $task->status == 'Active' )
                                <h5><span class="badge rounded-pill bg-success" width="50px">Active</span>  </h5> 
                            @else
                            <h5><span class="badge rounded-pill bg-warning">Inactive</span>  </h5>
                                
                          
                            @endif
                            </td>
                        <td><a href="{{ route('student.delete',$task->id) }}"><button class="btn btn-danger">Delete</button></a>
                            <a href="{{ route('student.done',$task->id) }}"><button class="btn btn-primary">Status</button></a>
                            <a href="javascript:void(0)" ><button class="btn btn-warning" onclick="formEdit({{$task->id }})">
                                Edit</button></a></td>
                      </tr>
                      {{-- data-toggle="modal" data-target="#exampleModal" --}}
                    @endforeach
                  
                  
                  
                </tbody>
              </table>
              
        </div> 
        
        </div>

    </div>
    
    
</div>

{{-- Edit model create --}}

<div class="modal fade" id="formedit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formeditLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="formeditLabel">Student Details Update</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="formeditcontainer">
          
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save Changes</button>
        </div> --}}
      </div>
    </div>
  </div>

    
@endsection

@push('css')
    <style>
        .page-title{
            padding-top: 5vh;
            color: rgb(116, 236, 162);
            font-family: 'Times New Roman', Times, serif;
            font-size: 4em;
        }
        .form-add{
            background-color: rgb(255, 255, 255);
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            width: 600px;
            margin-left: 60%; 
        }
        .label{
            margin-left: 3%;
        }
        #input{
            width:560px;
            margin-left: 3%;  
        }
        #button{
        margin-left: 40%;
        }
        #table{
            margin-top: 5%
        }
    </style>
    
@endpush

@push('js')

    <script>
        function formEdit(task_id){
        var data ={
            task_id : task_id,

        }
        $.ajax({
            url: "{{ route ('student.edit') }}",
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf.token"]').attr('content'),
            },
            type:'GET',
            dataType:'',
            data:data,
            success: function(response){
                $('#formedit').modal('show');
                $('#formeditcontainer').html(response);
            }
        });
    }
        </script>
    
@endpush