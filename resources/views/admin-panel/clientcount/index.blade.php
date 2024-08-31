@extends('admin-panel.master')
@section('title','Client Count Index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Client Count</h1>
                        </div>
                        
                    </div>
                </div>

                <div class="card-body">
                    @if(Session('successMsg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{Session('successMsg')}}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    @if($clientCount->count() < 1)
                    <form action="{{url('admin/client_counts/store')}}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="number" name="count" class="form-control @error('count') is-invalid @enderror" style="border-radius: 4px 0 0 4px">
                            <button type="submit" class="btn btn-info" style="border-radius: 0 4px 4px 0">Create</button>
                        </div>
                        <div>
                            @error('count')
                            <span><small class="text-danger">{{$message}}</small></span>
                            @enderror
                        </div>
                    </form>
                    @endif
                

                    <table class="table table-bordered table-hover my-3">
                        <thead>
                            <tr>
                                <th>Count</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($client)
                                <tr>
                                    <td>
                                        {{$client->count;}}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-success" id="addBtn" title="edit">
                                            <i class="fa-solid fa-user-plus"></i> Add More Client
                                        </button>

                                        <form action="{{url('admin/client_counts/'.$client->id.'/update')}}"  method="post" class="col-md-6" id="addForm" style="display:none;">
                                            @csrf
                                            <div class="input-group">
                                                <input type="number" name="count" class="form-control @error('count') is-invalid  @enderror" placeholder="Enter Client Count..." required>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa-solid fa-user-plus"></i> Add
                                                </button>
                                            </div>
                                            @error('count')
                                            <span><small class="text-danger">{{$message}}</small></span>
                                            @enderror
                                        </form>
                                    </td>
                                </tr>
                            @endif
                 
                        </tbody>
                    </table>
                </div>

                {{-- <div class="card-footer">
                     {{$projects->links()}} 
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    $(document).ready(function(){
        $('#addBtn').click(function(){
            $('#addBtn').fadeOut(300, function() {
                $('#addForm').fadeIn(300);
            });
        });
    });
</script>

@endsection