@extends('welcome')

@section('styles')
<style>
.ic{
    margin-right:0.5rem;
    cursor:pointer;
}
</style>

@stop
 
@section('content')
@switch($status)
            @case(1)
                <div class="alert alert-success" role="alert">
                Password has been updated successfully!
                </div>
        @break
        @case(2)
            <div class="alert alert-danger" role="alert">
            Admin has been deleted!
            </div>
        @break
            @default
        @endswitch
<div style="margin:auto;" class="mt-3 table-responsive table-wrapper-scroll-y my-custom-scrollbar2">

      
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($admins as $admin)
    <tr>
      <th scope="row">{{$admin['id']}} </th>
      <td>{{$admin['name']}} </td>
      <td>{{$admin['email']}} </td>
      <td> @if($admin['role']=='p')
           Priviledged
            @else
            Regular

            @endif
      
      
      </td>
      <td>{{$admin['created_at']}} </td>
      <td>   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adminDelete{{$admin['id']}}">
            <span><i class="fas fa-trash-alt"></i></span>
            </button>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adminUpdate{{$admin['id']}}">
                <span> <i class="fas fa-wrench"></i></span> 
            </button>
    </td>
       
    </tr>
    
@endforeach
    
  </tbody>
</table>

@foreach($admins as $admin)


<!-- Admin Modals -->
<div class="modal fade" id="adminDelete{{$admin['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Confirm </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete?
        <form  method="POST" id="adminForm{{$admin['id']}}" 
        action="{{action('attendencePageController@deleteAdmin') }}" >
        {{ csrf_field() }}
                <input  style="display:none;" type="text" name="aid" value="{{$admin['id']}}">
        
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" form="adminForm{{$admin['id']}}">Delete</button>
      </div>
    </div>
  </div>
</div>
</div>

@endforeach
@foreach($admins as $admin)



<!-- Admin Update modals -->
<div class="modal fade" id="adminUpdate{{$admin['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Update Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form   method="POST" id="adminUpForm{{$admin['id']}}" 
        action="{{action('attendencePageController@updatePassword') }}" >
        {{ csrf_field() }}
        <div class="form-group">
    
        <input type="text" style="display:none;" name="aid" value="{{$admin['id']}}"> 
            <label for="Password">New Password</label>
            <input name="newPassword" type="password" class="form-control" id="Password" required>
        </div>
        
        
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" form="adminUpForm{{$admin['id']}}">Update</button>
      </div>
    </div>
  </div>
</div>
</div>
@endforeach
@stop