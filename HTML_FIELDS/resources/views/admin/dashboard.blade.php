@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            @if(session()->has('success'))
            <div class="alert alert-success mb-25" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        @endif
        
            <div class="card">
               
                <div class="card-body">
                    <button type="button" class="btn-shadow  btn btn-info text-white pull-right" style="position: absolute;right: 10px;top: 5px;" onclick="location.href='{{ url('admin/add/form')}}'">
                        Add Field
                    </button><br>
                    <h2>HTML Form Field List</h2>
                    
                    <table class="table table-bordered" >
                        <thead>
                            <tr>
                                <th> Label</th>
                                <th> Sample</th>
                                <th> HTML Field</th>
                                <th> Comments</th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($list as $item)
                              <tr>
                                  <td> {{$item->label}} </td>
                                  <td> {{$item->sample}} </td>
                                  <td> {{$item->field}} </td>
                                  <td> {{($item->comments!=0) ? $item->comments : ""}} </td>
                                  <td> 
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <button type="button" class="btn mr-2 mb-2 btn-primary"  onclick="location.href='{{ url('admin/edit/form/')}}/{{$item->id}}'">
                                            Edit
                                            </button>
                                        </li>
                                        <li>    
                                            <button type="button" class="btn mr-2 mb-2 btn-danger" onclick="location.href='{{ url('admin/delete/field')}}/{{$item->id}}'">
                                                Delete
                                            </button>
                                        </li>
                                    </ul>
                                  </td>
                              </tr>
                             @endforeach
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}

@endsection
