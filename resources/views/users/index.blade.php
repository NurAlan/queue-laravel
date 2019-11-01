@extends('theme')
@section('title','Users')
@section('content')
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">TAMBAH</button>
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Users</h4>
                <p class="card-category"> Data seluruh user</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="users-table">
                        <thead class="text-primary">
                            <th>
                                No
                            </th>
                            <th>
                                Username
                            </th>
                            <th>
                                <center>Action</center>
                            </th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="addUser" method="POST" action="{{ url('user/store') }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" required minlength="3" placeholder="admin">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" required minlength="6" placeholder="Example Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>

@stop
@push('sripts')
<script>
    var table = $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! url("user/getData") !!}',
            columns: [{
                data: 'id',
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1 + '.';
                }
            }, {
                data: 'username',
                name: 'username'
            }, {
                data: 'action',
                name: 'action'
            }]
        })
    })

    $('#addUser').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: {
                username: $('#username').val(),
                password: $('#password').val(),
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                $.notify({
                    icon: "notifications",
                    message: data.message
                }, {
                    type: 'success' + 'asd',
                    timer: 500,
                    placement: {
                        from: 'top',
                        align: 'right'
                    }
                })
                setTimeout(function() {
                    location.reload();
                }, 800);
            },
            error: function(xhr) {
                console.log(xhr);
            }
        })
    });
</script>
@endpush
