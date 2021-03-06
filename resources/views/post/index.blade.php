@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Simple Laravel CRUD Ajax</h1>
        </div>
    </div>


    <div class="row">
        <div class="table table-responsive">
            <table class="table table-bordered" id="table">

                <tr>
                    <th width="150px">No</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th class="text-center" width="150px">
                        <a href="#" class="create-modal btn btn-success btn-sm">
                            <i class="glyphicon glyphicon-plus"></i>Add Post
                        </a>
                    </th>
                </tr>

                {{ csrf_field() }}

                <?php $no=1; ?>
                @foreach($posts as $post)
                    <tr class="posts{{ $post->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->body }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$post->id}}" data-title="{{ $post->title }}" data-body="{{ $post->body }}">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$post->id}}" data-title="{{ $post->title }}" data-body="{{ $post->body }}">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                            <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$post->id}}" data-title="{{ $post->title }}" data-body="{{ $post->body }}">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $posts->links() }} <!--this is for pagination-->
        </div>
    </div>


    {{-- form create post --}}
 <div id="create" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Post</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group row add">
                            <label class="control-label col-sm-2" for="title">Title :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Your Title Here" required>
                                <p class="error text-center alert alert-danger hidden"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="body">Body :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="body" name="body" placeholder="Your Body Part Here" required>
                                <p class="error text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add" class="btn btn-info">
                        <span class="glyphicon glyphicon-plus"></span>Save Post
                    </button>

                    <button type="submit" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span>Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Form Show POST --}}
    <div id="show" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">ID :</label>
                        <span id="i"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Title :</label>
                        <span id="ti"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Body :</label>
                        <span id="by"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span>Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Form Edit and Delete Post --}}
    <div id="myModal"class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="modal">
                        <div class="form-group">
                            <label class="control-label col-sm-2"for="id">ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fid" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2"for="title">Title</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="t">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2"for="body">Body</label>
                            <div class="col-sm-10">
                                <textarea type="name" class="form-control" id="b"></textarea>
                            </div>
                        </div>
                    </form>

                    {{-- Form Delete Post --}}
                    <div class="deleteContent">
                        Are You sure want to delete <span class="title"></span>?
                        <span class="hidden id"></span>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                        <span id="footer_action_button" class="glyphicon"></span>
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span>close
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection
