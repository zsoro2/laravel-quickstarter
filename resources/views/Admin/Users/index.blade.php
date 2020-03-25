@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Eszközök</h1>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Elérhető eszközök</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                serverSide: true,
                ajax: "{{ route('admin.users.datatables') }}",
                columns: [
                    { name: 'name' },
                    { name: 'created_at' },
                    { name: 'action', orderable: false, searchable:false}
                ]
            });
        });
    </script>
@endsection

