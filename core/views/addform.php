
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Add user</h2>
    <form action="http://localhost/test/" method="post">
        <input type="text" name="nom">
        <input type="text" name="prenom">
        <button type="submit">add</button>

    </form>
    
    <?php foreach ($users as $user) {
        echo "user $user->id : $user->nom ,$user->prenom ,$user->age <br>" ;
    }    
    ?>
   
   
</body>
</html>
