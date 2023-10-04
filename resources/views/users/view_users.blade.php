<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
</head>
<body>
 
      @include('users.navbar')

      <div class="container">
       
        <div class="table-responsive">
            <table class="table table-bordered" id="topUsersTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div><br><br>
        <div class="mt-6">
          <form method="POST" action="{{ route('updateTopTopupUsers') }}">
            @csrf
            <button type="submit" class="btn btn-success">Update 10 Top Users</button>
          </form><br><br>
        </div>
        @include('users.topup_users');
      </div>

    

</body>
  <!-- Include jQuery and DataTables scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
        $('#topUsersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('getTopUsers') }}",
            pageLength: 2,
            columns: [
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' }
            ]
        });
    });
    </script>
</html>

