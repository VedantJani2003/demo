<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Block Data</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
</head>
<body>

    <table id="example" class="display">
        <thead>
            <tr>
                <th>Block Name</th>
                <th>Floor Number</th>
                <th>Room Number</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <!-- The table data will be populated dynamically using JavaScript -->
        </tbody>
    </table>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "processing": true,
                "serverSide": false,
                "ajax": "<?php echo base_url('Hotel_Controller/getdata'); ?>",
                "columns": [
                    { "data": "BlockName" },
                    { "data": "FloorNumber" },
                    { "data": "RoomNumber" },
                    { "data": "Satus" }
                ]
            });
        });
    </script>

</body>
</html>
