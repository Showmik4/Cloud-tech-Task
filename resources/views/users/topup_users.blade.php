<div class="table-responsive">

    <h3 class="text-center p-2 bg-primary">Top 10 Users</h3>
    <table class="table table-bordered" id="topTopUpUsersTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<script>
$(document).ready(function () 
{
 
    $('#topTopUpUsersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('getTopTopUpUsers') }}", // Define the route for fetching TopTopUpUser data
       
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'count', name: 'count' }
        ]
    });
});
</script>