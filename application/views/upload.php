<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('Roommate/uptest');?>

<input type="file" name="userfile" size="20"  />

<br /><br />

<input type="submit" value="upload" name = "up"/>

</form>

<img src=<?= $error ?> />
</body>
</html>