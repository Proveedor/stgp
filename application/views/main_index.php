<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <div>
        <?php if(isset($name)): ?>
            <p>Usuario: <?php echo $name; ?></p>
        <?php else: ?>    
            <p>No esta logueado<p>
        <?php endif ?>
    </div>
</body>
</html>