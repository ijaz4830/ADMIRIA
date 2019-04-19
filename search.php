<?php include('server.php')?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Products</title>
    <link rel="stylesheet" type="text/css" href="search.css">
</head>
<body>
<div class="header">
    <h2>Attributes</h2>
</div>

<form method="post" action="search.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Minimum Price</label>
        <input type="number" name="min" >
    </div>
    <div class="input-group">
        <label>Max Price</label>
        <input type="number" name="max">
    </div>

    <div class="input-group">
        <button type="submit" class="btn" name="search">Search Products</button>
    </div>
</form>
</body>
</html>



