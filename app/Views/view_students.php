<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<?php $showSearchBar = true; ?>  <!-- Set to show search bar -->

<head>
    <title>View students</title>
    <style>
        table {
        border-collapse: collapse;
        border: 1px solid #ddd;
        }

        th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
        }  
    </style>
</head>
<body>
<h1>View Students</h1>
<div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

<table class="table table-striped">
        <thead>  
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>DOB</td>
            <td>Photo</td>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach($students as $student):
        ?>
            <tr>
                <td><?php echo $student['firstname']?></td>
                <td><?php echo $student['lastname']?></td>
                <td><?php echo $student['date_of_birth']?></td>
                <td>
                <img src="<?php echo base_url('uploads/' . esc($student['photo'])) ?>"  style="width: 100px; height: auto;">
                </td>
                <td>
                <a href="<?php echo base_url('students/view/'. $student['id'])?>" class="btn btn-info">View</a>
                </td>
                </tr>
        <?php endforeach; ?>  
        </tbody>      

    </table> 
    </div></div></div>  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#search-input').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            
            $('table tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
    </script>
 </body>
<?= $this->endSection() ?>
