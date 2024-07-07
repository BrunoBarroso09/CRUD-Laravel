@extends('layout.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Show Category Detail
                            <a href="{{ url('category') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}" disabled/>
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" rows="3" class="form-control" disabled>{!! $category->description !!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <br/>
                            <input type="checkbox" name="status" {{ $category->status == 1 ? 'checked':'' }} style="width:30px;height:30px;" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
