<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<?php $showSearchBar = false; ?>  <!-- Set to show search bar -->

    <?php if (session()->has(key: 'success')) : ?>
        <div class="alert alert-success"><?= session()->get('success') ?></div>
    <?php endif; ?>
    <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger"><?= session()->get('error') ?></div>
    <?php endif; ?>

    <?php
        $std =  (object) $student;
    ?>

    <form action="<?php echo current_url()?>" method="post" enctype="multipart/form-data">
        <label for="firstname">First Name:</label>
        <input type="text" class="form-control"name="firstname" value="<?php echo $std->firstname?>"required><br><br>
        <label for="lastname">Last Name:</label>
        <input type="text" class="form-control" name="lastname" value="<?php echo $std->lastname?>" required><br><br>
        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" class="form-control" name="date_of_birth" required><br><br>
        <label for="photo">Photo:</label>
        <input type="file" class="form-control" id="photo" name="photo">
        <input type="submit" class="btn btn-primary" value="Update">
    </form>
 
<?= $this->endSection() ?>
