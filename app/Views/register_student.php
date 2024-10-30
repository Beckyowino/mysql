<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<?php $showSearchBar = false; ?>  <!-- Set to show search bar -->

<h1>Student Registration</h1>
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success"><?= session()->get('success') ?></div>
    <?php endif; ?>
    <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger"><?= session()->get('error') ?></div>
    <?php endif; ?>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

            <form action="<?php echo base_url('/register_student/saveStudent') ?>" id="studentForm" method="post" enctype="multipart/form-data">
                <label for="firstname">First Name:</label>
                <input class="form-control" type="text" name="firstname" required><br><br>
                <label for="lastname">Last Name:</label>
                <input class="form-control" type="text" name="lastname" required><br><br>
                <label for="photo">Photo:</label>
                <input class="form-control" type="file" name="photo" required><br><br>
                <label for="date_of_birth">Date of Birth:</label>
                <input class="form-control" type="date" name="date_of_birth" required><br><br>
                <input class="btn btn-primary" type="submit" value="Register">
            </form>

            <div id="student-data"></div>

</div></div></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#studentForm').on('submit', function(e) {
            e.preventDefault();

            // Create a FormData object to handle the file upload
            var formData = new FormData(this);

            // Send the data using AJAX
            $.ajax({
                url: '<?= base_url('/register_student/saveStudent') ?>', // Update the URL as needed
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === 'success') {
                alert(response.message);
                $('#studentForm')[0].reset();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + error);
            }
});
 });
});

</script>
<?= $this->endSection() ?>
