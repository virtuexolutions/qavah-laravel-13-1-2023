@extends('admin.views.layouts.default')
@section('title')
Admin | Roles
@endsection
@section('content')


<div class="card card-primary card-outline">
          <div class="card-header">
           
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Edit Role
            </h3>
          </div>

          <div class="card-body">
          	@if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

          @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
          @endif

          @if($message = Session::get('error'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
          @endif

            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Role Page </a>
              </li>
            </ul>
           <br>
          <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">edit Content</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
              	@csrf
                <div class="card-body">
                
                 <div class="row">
                  
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Role Name</label>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <strong>Set Permissions:</strong>
                            </br>
                            @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br/>
                            @endforeach
                        </div>
                    </div>
                 </div> 
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
          

          </div>
          
        </div>

            
            
          </div>
          <!-- /.card -->
        </div>

@endsection
