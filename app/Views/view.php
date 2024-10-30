<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<?php $showSearchBar = false; ?>  <!-- Set to show search bar -->

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

<h2><b>First name: </b><?= $student['firstname'] ?></h2>
<h2><b>Last name: </b><?= $student['lastname'] ?></h2>
<h2><b>DOB: </b><?= $student['date_of_birth'] ?></h2>
<h2><b>Photo: </b></h2><img src="<?php echo base_url('uploads/' . esc($student['photo'])) ?>" style="width: 350px; height: auto;">
</div></div></div>
<a href="<?= base_url('students/edit/'. $student['id'])?>" class="btn btn-primary">Edit</a>
<a href="<?= base_url('students/delete/' . $student['id'])?>" class="btn btn-danger">Delete</a>

<?= $this->endSection() ?>