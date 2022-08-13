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

        // To fix :
        // Eté obligé de passer les propriétés Protected en Public pour envoie BDD


        require __DIR__.'/../05-composer/vendor/autoload.php';
        require 'config/db.php';

        spl_autoload_register(function ($class) {
            $class = str_replace('Rpg\\', '',$class);
            require 'src/'.$class.'.php';
        });

        use Rpg\Character;
        use Rpg\Guerrier;
        use Rpg\Mage;
        use Rpg\Chasseur;

        function toClean($value) {
            return trim(htmlspecialchars($value));
        }

        $pseudo = ucfirst(toClean($_POST['pseudo'] ?? ''));
        $tribe = $_POST['tribe'] ?? null;
        $class = $_POST['class'] ?? null;
        // $object = ucfirst(toClean($_POST['pseudo'] ?? null));
        // $characters = [];

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

            if ($class == 'guerrier') {
                $object = new Guerrier($pseudo, $tribe, $class);

                $query = $db->prepare('INSERT INTO characters (pseudo, tribe, class, health)
                    Values (:pseudo, :tribe, :class, :health)');

                $query->execute([

                    ':pseudo' => $object->pseudo,
                    ':tribe' => $object->tribe,
                    ':class' => $object->class,
                    ':health' => $object->health,

                ]);
            }
            
            if ($class == 'mage') {
                $object = new Mage($pseudo, $tribe, $class);

                $query = $db->prepare('INSERT INTO characters (pseudo, tribe, class, health)
                    Values (:pseudo, :tribe, :class, :health)');

                $query->execute([

                    ':pseudo' => $object->pseudo,
                    ':tribe' => $object->tribe,
                    ':class' => $object->class,
                    ':health' => $object->health,

                ]);
            } 

            if ($class == 'chasseur') {
                $object = new Chasseur($pseudo, $tribe, $class);

                $query = $db->prepare('INSERT INTO characters (pseudo, tribe, class, health)
                    Values (:pseudo, :tribe, :class, :health)');

                $query->execute([

                    ':pseudo' => $object->pseudo,
                    ':tribe' => $object->tribe,
                    ':class' => $object->class,
                    ':health' => $object->health,

                ]);
            }
        
        }

        $query = $db->query('SELECT * FROM characters');
        $characters = $query->fetchall();

    ?>

    <div>

        <div class="w-2/3 mx-auto">

            <!-- Début formulaire -->

            <form class="w-2/3 mx-auto border rounded-lg my-6 p-5 flex flex-col" method="POST">

                <h1 class="text-center text-3xl my-6">Création de personnages</h1>

                <!-- Nom -->

                <input placeholder="votre nom..." class="my-6 rounded-lg" type="text" name="pseudo" id="pseudo">

                <!-- Nom aléatoire -->

                <!-- <div class="flex flex-row items-center">
                    <input class="my-6 rounded-lg" type="checkbox" name="randPseudo" id="randPseudo">
                    <span class="ml-1">Générer un nom aléatoire</span>
                </div> -->

                <!-- Tribue -->

                <label for="tribe">Votre tribu ?</label>
                <select class="my-6 rounded-lg" name="tribe" id="tribe">
                    <option value="">Choisir</option>
                    <option value="humain">Humain</option>
                    <option value="nain">Nain</option>
                    <option value="elfe">Elfe</option>
                </select>

                <!-- Classe -->

                <label for="class">Votre classe ?</label>
                <div class="flex flex-row justify-between">
                    
                    <!-- Guerrier -->

                    <div class="w-1/3">
                        <div class="flex flex-row items-center">
                            <input type="radio" name="class" id="class" value="guerrier">
                            <span class="ml-1">Guerrier</span>
                        </div>
                        <img class="" src="img/guerrier.jpg">
                        
                    </div>

                    <!-- Mage -->

                    <div class="w-1/3">
                        <div class="flex flex-row items-center">
                            <input type="radio" name="class" id="class" value="mage">
                            <span class="ml-1">Mage</span>
                        </div>
                        <img class="" src="img/mage.jpg">
                    </div>

                    <!-- Chasseur -->

                    <div class="w-1/3">
                        <div class="flex flex-row items-center">
                            <input type="radio" name="class" id="class" value="chasseur">
                            <span class="ml-1">Chasseur</span>
                        </div>
                        <img class="" src="img/chasseur.jpg">
                    </div>
                </div>
                
                <!-- Button  -->

                <div class="my-6">
                    <button class="bg-blue-300 hover:bg-blue-600 duration-500 rounded-lg text-center text-white p-2">Créer</button>
                </div>

                <!-- Div erreurs -->

                <?php if (!empty($errors)) { ?>
                    <div class='w-full bg-red-100 my-6 p-3 rounded-lg'>
                        <p>Il manque des données pour la création de votre personnage.</p>
                        <?php foreach ($errors as $error) { ?>
                                <p>- <?= $error; ?></p>
                        <?php } ?>  
                    </div>                  
                <?php } ?>

                <!-- Div succès -->

                <?php if ($success) { ?>
                    <div class="w-full bg-green-100 my-6 p-3 rounded-lg">
                        <p>Votre personnage a été créé avec succès.</p>
                        <p>Félicitations <?= $pseudo; ?>, vous êtes un <?= $class; ?> <?= $tribe; ?>. Partons combattre!</p>
                    </div>
                <?php } ?>


            </form>
        </div>

        <div class="w-2/3 mx-auto  border rounded-lg my-6 p-5">
          
            <h1 class="text-center text-3xl my-6">Liste des personnages</h1>

            <!-- <?= dump($characters); ?> -->

            <div class="flex flex-row flex-wrap gap-3">

                <?php foreach ($characters as $character) { ?>

                    <div class="w-1/3 border rounded-lg bg-blue-100 p-2 mx-auto cursor-pointer">
                        <?php if ($character['class'] == 'guerrier') { ?>
                            <img class="w-2/3 mx-auto mb-2" src="img/guerrier.jpg">
                        <?php } ?>
                        <?php if ($character['class'] == 'mage') { ?>
                            <img class="w-2/3 mx-auto mb-2" src="img/mage.jpg">
                        <?php } ?>
                        <?php if ($character['class'] == 'chasseur') { ?>
                            <img class="w-2/3 mx-auto mb-2" src="img/chasseur.jpg">
                        <?php } ?>


                        <p class="mb-2 font-bold">Pseudo: <?= $character['pseudo']; ?></p>
                        <p class="mb-2 font-bold">Tribue: <?= ucfirst($character['tribe']); ?></p>
                        <p class="mb-2 font-bold">Classe: <?= ucfirst($character['class']); ?></p>
                        <p class="mb-2 font-bold">Santé: <?= $character['health']; ?></p>
                        <a href="#" class="bg-blue-300 hover:bg-blue-500 border rounded-lg text-center duration-500 text-white p-2 my-2">Incarner</a>
                    </div>

                <?php } ?>

            </div>
        </div>

    </div>

</body>
</html>