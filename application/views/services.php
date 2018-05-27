<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href=<?= base_url("assets/boot/bootstrap.min.css"); ?> >
    <link rel="stylesheet" href=<?= base_url("assets/font-awesome-4.7.0/css/font-awesome.min.css") ?> >
    <link rel="stylesheet" href=<?= base_url("assets/css/main.css") ?> >
    <title>SeekHostel</title>
</head>
<body>
<div class="content">
    <?php $this->load->view('header') ?>
    <div>
        <div class="after-head">
            <div class="option">
                <span><h2> <?php if(isset($message)){ echo $message;}  ?> </h2>
                </span>
                
                
   
    <footer style="background-color: #1d2124">
        <div >
<?php $this->load->view('footer') ?>

        </div>
    </footer>
</div>
<script src=<?= base_url("assets/js/main.js") ?>></script>
<script src=<?= base_url("assets/js/myjquery.js") ?> ></script>
<script src= <?=  base_url("assets/boot/popper.js") ?> </script>
<script src= <?= base_url("assets/boot/jquery.js") ?> ></script>
<script src=<?= base_url("assets/boot/bootstrap.js") ?> ></script>
</body>
</html>
