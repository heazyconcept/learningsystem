<?php $data["PageTitle"] = "Testimonials  - 90minsbet";  $data["PresentMenu"] = "testimonials"; ?>
<?php $this->load->view("Admin/Partials/Head", $data); ?>
<?php $this->load->view("Admin/Partials/Navigation", $data); ?>


<div class="az-content-body">
<a href="<?php echo base_url('admin/AddTestimonial') ?>" class="btn btn-az-primary pull-right">Add New Testimonial</a>
    <h2 class="az-content-title">All Testimonials</h2>
   


    <table id="TestimonialTable" class="display responsive nowrap">
        <thead>
            <tr>
                <th class="wd-15p">Date</th>
                <th class="wd-15p">Testimonial</th>
                <th class="wd-20p">By</th>
                <th class="wd-15p">Country</th>
                <th class="wd-10p">Status</th>
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

        var UsersTable = $('#TestimonialTable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?php echo base_url("adminAjax/GetTestimonial/") ?>",
            dataType: "json",
            type: "GET"
        },
            columns: [
                { "data": "Date" },
                { "data": "Testimonial" },
                { "data": "By" },
                { "data": "Country" },
                { "data": "Status" },
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