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

        $pseudo = $_POST['pseudo'] ?? null;
        $tribe = $_POST['tribe'] ?? null;
        $class = $_POST['class'] ?? null;

        $errors = [];
        $success = false;

        if (!empty($_POST)) {

            if (empty($pseudo)) {
                $errors['pseudo'] = 'Entrez un pseudo.';
            }

            if (empty($tribe)) {
                $errors['tribe'] = 'Choisissez une tribue';
            }

            if (empty($class)) {
                $errors['class'] = 'Choisissez une classe.';
            }

        }

        if ((empty($errors)) && $pseudo != null && $tribe != null && $class != null) {
            $success = true;
        }

    ?>

    <div>

        <div class="w-2/3 mx-auto">
            <form class="w-2/3 mx-auto border rounded-lg my-6 p-5 flex flex-col" method="POST">

                <h1 class="text-center text-3xl my-6">Création de personnages</h1>

                <input placeholder="votre nom..." class="my-6 rounded-lg" type="text" name="pseudo" id="pseudo">

                <div class="flex flex-row items-center">
                    <input class="my-6 rounded-lg" type="checkbox" name="randPseudo" id="randPseudo">
                    <span class="ml-1">Générer un nom aléatoire</span>
                </div>

                <label for="tribe">Votre tribu ?</label>
                <select class="my-6 rounded-lg" name="tribe" id="tribe">
                    <option value="">Choisir</option>
                    <option value="humain">Humain</option>
                    <option value="nain">Nain</option>
                    <option value="elfe">Elfe</option>
                </select>

                <label for="class">Votre classe ?</label>
                <div class="flex flex-row justify-between">
                    
                    <div class="w-1/3">
                        <div class="flex flex-row items-center">
                            <input type="radio" name="class" id="class" value="guerrier">
                            <span class="ml-1">Guerrier</span>
                        </div>
                        <img class="" src="img/guerrier.jpg">
                        
                    </div>
                    <div class="w-1/3">
                        <div class="flex flex-row items-center">
                            <input type="radio" name="class" id="class" value="mage">
                            <span class="ml-1">Mage</span>
                        </div>
                        <img class="" src="img/mage.jpg">
                    </div>
                    <div class="w-1/3">
                        <div class="flex flex-row items-center">
                            <input type="radio" name="class" id="class" value="chasseur">
                            <span class="ml-1">Chasseur</span>
                        </div>
                        <img class="" src="img/chasseur.jpg">
                    </div>
                </div>
                

                <div class="my-6">
                    <button class="bg-blue-300 hover:bg-blue-600 duration-500 rounded-lg text-center text-white p-2">Créer</button>
                </div>

                <?php if (!empty($errors)) { ?>
                    <div class='w-full bg-red-100 my-6 p-3 rounded-lg'>
                        <?php foreach ($errors as $error) { ?>
                                <p>- <?= $error; ?></p>
                        <?php } ?>  
                    </div>                  
                <?php } ?>

                <?php if ($success) { ?>
                    <div class="w-full bg-green-100 my-6 p-3 rounded-lg">
                        <p>Votre personnage a été créé avec succès.</p>
                        <p>Félicitations <?= $pseudo; ?>, vous êtes un <?= $class; ?> <?= $tribe; ?>. Partons combattre!</p>
                    </div>
                <?php } ?>


            </form>
        </div>

        <div class="w-2/3 mx-auto  border rounded-lg my-6 p-5">
          

        </div>

    </div>

</body>
</html>