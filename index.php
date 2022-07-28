<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tp RPG Personnage</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>

    <?php 
        require __DIR__.'/../05-composer/vendor/autoload.php';

        spl_autoload_register(function ($class) {
            $class = str_replace('Rpg\\', '',$class);
            require 'src/'.$class.'.php';
        });

        use Rpg\Character;
        use Rpg\Guerrier;
        use Rpg\Mage;
        use Rpg\Chasseur;

    ?>

    <div>
        <form class="" method="POST">

            <h1>POO RRPG</h1>

            <label for=""></label>
            <input type="text">

            <input type="checkbox">
            <span>Générer un nom aléatoire</span>

            <label for="">Votre tribu ?</label>
            <select name="" id="">
                <option value=""></option>
            </select>

            <label for="">Votre classe ?</label>
            <input type="radio">
            <input type="radio">
            <input type="radio">

            <div>
                <button>Créer</button>
            </div>


        </form>
    </div>

</body>
</html>