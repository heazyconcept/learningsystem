<?php $data["PageTitle"] = "Users  - 90minsbet";  $data["PresentMenu"] = "users"; ?>
<?php $this->load->view("Admin/Partials/Head", $data); ?>
<?php $this->load->view("Admin/Partials/Navigation", $data); ?>


<div class="az-content-body">
    <h2 class="az-content-title">All Users</h2>


    <table id="datatable1" class="display responsive nowrap">
        <thead>
            <tr>
                <th class="wd-15p">Name</th>
                <th class="wd-15p">Phone Number</th>
                <th class="wd-20p">Email Address</th>
                <th class="wd-15p">Country</th>
                <th class="wd-10p">Date Registered</th>
                <th class="wd-25p"></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>







    <!-- your content goes here -->
</div><!-- az-content-body -->


<script>
    $(document).ready(function () {
        'use strict';

        var UsersTable = $('#datatable1').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?php echo base_url("adminAjax/GetUsers/".$UserType) ?>",
            dataType: "json",
            type: "GET"
        },
            columns: [
                { "data": "Name" },
                { "data": "Phone" },
                { "data": "Email" },
                { "data": "Country" },
                { "data": "DateRegistered" },
                { "data": "Action" },

            ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',

            }
        });


    // Select2
    $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
</script>
<?php $this->load->view("Admin/Partials/Script");