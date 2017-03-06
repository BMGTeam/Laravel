
        <?php 
        use App\users;
        $user = users::find($_GET['id'])->toJson();
        echo $user;
        // echo "'{\"name\":'$user->name', 'email':'$user->email'}'";

        ?>
        

