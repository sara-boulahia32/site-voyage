<?php
include('config.php');

// Récupérer les activités
$sql = "SELECT * FROM activites";
$result = mysqli_query($conn, $sql);

// Vérification des résultats
if (!$result) {
    die("Erreur lors de la récupération des activités : " . mysqli_error($conn));
}
if (mysqli_num_rows($result) == 0) {
    echo "<p>Aucune activité disponible pour le moment.</p>";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activités</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="style.css">

    <style>
        .font-bebas{
            font-family: "Bebas Neue", serif;
        }
        .textlarge{
            font-size: 80px;
        }
    </style>
</head>
<body  class="bg-[url('img/denys-nevozhai-guNIjIuUcgY-unsplash.jpg')] bg-no-repeat bg-center  h-screen">
    
<div class="flex justify-between items-center px-16 pt-[20px]">
            <a href="#">
                <img src="img/Cendre_moderne_cercle_lignes_café_nova_logo-removebg-preview.png" class="max-w-full h-auto w-[200px] " alt="logo">
            </a>
            <div class="block lg:hidden">
          <button id="menu-button" class="text-emerald-700 focus:outline-none">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
              </svg>
          </button>
      </div>
            <div class="hidden font-bebas lg:flex space-x-8">
               
                <a href="index.php" class="font-bold text-white lg:text-lg p-2 hover:font-bold">Acceuil</a>
                
                <div><a href="activites.php" class="font-semibold text-white lg:text-lg p-2 hover:font-bold">Activités</a><hr class="border-t-4 border-emerald-700 opacity-80 w-20 "></div>
                <a href="reservations.php" class="font-semibold text-white lg:text-lg p-2 hover:font-bold">Mes Réservations</a>
                <a href="login.php" class="font-semibold text-white lg:text-lg p-2 hover:font-bold">Se Connecter</a>
                
                <div class="flex space-x-4 pt-2 text-white">
                    <a href="#" class="text-white w-[20px] h-[20px]">
                    <img src="./img/User.png" alt="user logo">
                </a>
                <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                    <a href="#"><i class='bx bxl-pinterest'></i></a>
                    <a href="#"><i class='bx bxl-whatsapp'></i></a>
                    <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                    
                </div>
          
            </div>
        </div>
        
        
      
      <div id="menu" class="fixed top-0 left-0 h-screen w-[70%] bg-emerald-700	  px-4 py-2 transform -translate-x-full transition-transform duration-300 ease-in-out lg:hidden flex-col justify-center items-center space-y-4 z-50 hidden pt-[20%]">
        <div class="text-center space-y-8">
        <div><a href="#" class="font-semibold text-white hover:text-[#F7E0A1]">Activités</a></div>
          <div><a href="#" class="font-semibold text-white hover:text-[#F7E0A1]">Mes Réservations</a></div>
          <div><a href="#" class="font-semibold text-white hover:text-[#F7E0A1]">Se Connecter</a></div>
          <div><a href="#" class="font-semibold text-white hover:text-[#F7E0A1]">Evolutions</a></div>
          <div><a href="#" class="font-semibold text-white hover:bg-[#F7E0A1] hover:rounded-lg hover:py-2 hover:px-3 hover:shadow-2xl hover:scale-105 transition hover:text-[#7F000F]">Sign in</a></div>
      </div>
      </div>
      <div class="text-center mt-8">
    <button id="show-form-btn" class="px-4 py-2 bg-emerald-700 text-white rounded-lg hover:bg-emerald-600">
        Ajouter une Activité
    </button>
</div>

<div id="form-container" class=" bg-white p-6 shadow-lg rounded-lg mt-8 max-w-md mx-auto">

    <form action="ajouter_activiter.php" method="POST">
        
        <div class="mb-4">
            <label for="titre" class="block text-gray-700 font-bold mb-2">Titre :</label>
            <input type="text" id="titre" name="titre" required class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description :</label>
            <textarea id="description" name="description" rows="4" required class="w-full px-4 py-2 border rounded-lg"></textarea>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Destination :</label>
            <input type="text" name="destination" rows="4" required class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label for="prix" class="block text-gray-700 font-bold mb-2">Prix (€) :</label>
            <input type="number" id="prix" name="prix" required class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label for="prix" class="block text-gray-700 font-bold mb-2">Date de début :</label>
            <input type="date" name="date_debut" required class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label for="prix" class="block text-gray-700 font-bold mb-2">Date de fin:</label>
            <input type="date" name="date_fin" required class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label for="prix" class="block text-gray-700 font-bold mb-2">Places disponibles:</label>
            <input type="number" name="places_disponibles" required class="w-full px-4 py-2 border rounded-lg">
        </div>
        <button type="submit" class="px-4 py-2 bg-emerald-700 text-white rounded-lg hover:bg-emerald-600">
            Ajouter
        </button>
    </form>
</div>


      <main class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 p-4">
    <?php while ($activite = mysqli_fetch_assoc($result)): ?>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- <img src="img/activites/<?= htmlspecialchars($activite['image']) ?>" alt="<?= htmlspecialchars($activite['titre']) ?>" class="w-full h-48 object-cover"> -->
            <div class="p-4">
                <h2 class="text-xl font-bold mb-2"><?= htmlspecialchars($activite['titre']) ?></h2>
                <p class="text-gray-700 mb-4"><?= htmlspecialchars($activite['description']) ?></p>
                <p class="text-gray-700 mb-4">Destination : <?= htmlspecialchars($activite['destination'] ?? '') ?></p>
                <p class="text-green-600 font-semibold">Prix : <?= htmlspecialchars($activite['prix'] ?? '') ?> €</p>
                <p class="text-green-600 font-semibold">Date de début : <?= htmlspecialchars($activite['date_debut'] ?? '') ?></p>
                <p class="text-green-600 font-semibold">Date de fin : <?= htmlspecialchars($activite['date_fin'] ?? '') ?></p>
                <p class="text-green-600 font-semibold">Places disponibles : <?= htmlspecialchars($activite['places_disponibles']?? '') ?></p>
                <div class="flex justify-between">
                <a href="reserver.php?id=<?= $activite['id_activite'] ?>" class="inline-block mt-4 px-4 py-2 bg-emerald-700 text-white rounded-lg hover:bg-emerald-600">Réserver</a>
                
                            <a class="content-center" href="modifierClient.php?id_client=<?php echo $data["id_client"]; ?>">Edit</a>
                            <a class="content-center" href="supprimerClient.php?id_client=<?php echo $data["id_client"]; ?>">🗑️</a>




                                                        </div>
                        
            </div>
        </div>
    <?php endwhile; ?>
</main>

    <script src="script.js"></script>
</body>
</html>
