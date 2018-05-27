<!DOCTYPE html>
<html lang="en">
<head>
<title>SeekHostel</title>
</head>
<body>

<?= form_open_multipart('admin/multiple') ?>
<input type="file" name="other_images[]" multiple="multiple"> 
<input type="submit" name="go" class="btn btn-primary">
<?= form_close() ?>
    

</body>
</html>