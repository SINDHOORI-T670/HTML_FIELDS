@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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

                <div class="card-body">
                    <button type="button" class="btn-shadow  btn btn-info text-white pull-right"  onclick="location.href='{{ url('admin/home')}}'">
                        << Back
                    </button><br>
                    <h2>Edit HTML Form Application</h2>
                    <form method="post" action="{{url('admin/update/form')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <label>Label Name <strong style="color:red">*</strong></label>
                        <input type="text" name="label" class="form-control" value="{{$data->label}}">
                        @if ($errors->has('label'))
                            <p id="firstname-error" style="color:red">{{ $errors->first('label') }}</p>
                        @endif
                        <br>
                        <label>Samble <strong style="color:red">*</strong></label>
                        <input type="text" name="sample" class="form-control" value="{{$data->sample}}">
                        @if ($errors->has('sample'))
                                                <p id="firstname-error" style="color:red">{{ $errors->first('sample') }}</p>
                                            @endif<br>
                        <label>Html Field <strong style="color:red">*</strong></label>
                        <select class="form-control" name="field" id="field">
                            <option value="0">Select field</option>
                            <option @if($data->field=="text") selected @else @endif value="text">Text</option>
                            <option @if($data->field=="number") selected @else @endif value="number">Number</option>
                            <option @if($data->field=="select") selected @else @endif value="select">Select</option>
                        </select>
                        @if ($errors->has('field'))
                                                <p id="firstname-error" style="color:red">{{ $errors->first('field') }}</p>
                                            @endif<br>
                        {{-- <div id="list">
                            <label>Option list</label>
                            <input type="text" name="addmore[0][option]" placeholder="Enter option" class="form-control" /> <button type="button" name="add" id="add" class="btn btn-success">+</button>
                        </div> --}}
                        @if($data->field=="select") 
                        <div id="list" style="display:block;">
                            <label>Option list</label>
                            @if ($errors->has('addmore'))
                                <p id="firstname-error" style="color:red">{{ $errors->first('addmore') }}</p>
                            @endif
                            <table class="table table-bordered" id="dynamicTable">  
                                <tr>
                                    <th>option <strong style="color:red">*</strong></th>
                                    <th><button type="button" name="add" id="add" class="btn btn-success">Add More</button></th>
                                </tr>
                                  
                                    @foreach(explode(',',$data->comments) as $key => $item)
                                    <tr>
                                        <td>
                                            <input type="text" name="addmore[{{$key}}+1000][option]" placeholder="Enter Option" class="form-control" value={{$item}} />&nbsp;
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger remove-tr">Remove</button>
                                        </td> 
                                    </tr>  
                                    @endforeach
                                
                            </table> 
                            
                        </div>
                        @endif
                        <input type="submit" name="button" class="form-control btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}

@endsection
