<?php
include('config.php');

$query = "SELECT * FROM clients";
            $result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Réservations</title>
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
            font-size: 50px;
        }
    </style>
</head>
<body >
<div class="flex justify-between items-center px-16 pt-[20px] bg-emerald-700">
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
                
                <a href="activites.php" class="font-bold text-white lg:text-lg p-2 hover:font-bold">Activités</a>
              
                <a href="reservations.php" class="font-semibold text-white p-2 lg:text-lg hover:font-bold">Mes Réservations</a>
                
           
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
      <div class="flex justify-around"><h1 class="text-center textlarge font-bebas my-8">Les clients</h1>
      <div class="text-center mt-8">
    <button id="show-form-client-btn" class="px-4 py-2 bg-emerald-700 text-white rounded-lg hover:bg-emerald-600 ">
        Ajouter un client
    </button>
</div>
</div>
<div id="form-container" class=" bg-white p-6 shadow-lg rounded-lg mt-8 max-w-md mx-auto">
<?php if (!empty($message)): ?>
        <p class="text-center text-green-600"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
    <form action="ajouter_client.php" method="POST">
        
        <div class="mb-4">
            <label for="titre" class="block text-gray-700 font-bold mb-2">Nom :</label>
            <input type="text" id="titre" name="nom" required class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Prenom :</label>
            <input type="text" id="description" name="prenom" rows="4" required class="w-full px-4 py-2 border rounded-lg"></input>
        </div>
        <div class="mb-4">
            <label for="prix" class="block text-gray-700 font-bold mb-2">Email :</label>
            <input type="email" id="prix" name="email" required class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label for="prix" class="block text-gray-700 font-bold mb-2">Telephone :</label>
            <input type="number"  name="telephone" required class="w-full px-4 py-2 border rounded-lg">
        </div>
        
        <div class="mb-4">
            <label for="prix" class="block text-gray-700 font-bold mb-2">Adresse :</label>
            <input type="text" name="adresse" required class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label for="prix" class="block text-gray-700 font-bold mb-2">Date de naissance :</label>
            <input type="date" name="date" required class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Mot de passe :</label>
            <input type="password" name="mot_de_passe" rows="4" required class="w-full px-4 py-2 border rounded-lg"></input>
        </div>
        <button type="submit" class="px-4 py-2 bg-emerald-700 text-white rounded-lg hover:bg-emerald-600">
            Ajouter
        </button>
    </form>
</div>
    <main>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table class="w-full text-left table-auto">
                <thead>
                <tr>
                        <th class="px-2 md:px-6 py-3"> </th>
                        <th class="px-2 md:px-6 py-3">Identifiant</th>
                        <th class="px-2 md:px-6 py-3">Nom</th>
                        <th class="px-2 md:px-6 py-3">Prenom</th>
                        <th class="px-2 md:px-6 py-3">Email</th>
                        <th class="px-2 md:px-6 py-3">Telephone</th>
                        <th class="px-2 md:px-6 py-3">Adresse</th>
                        <th class="px-2 md:px-6 py-3">Date de naissance</th>
                        <th class="px-2 md:px-6 py-3">Mot de passe</th>

                    </tr>
                </thead>
                <tbody>
                    <?php while ($reservation = mysqli_fetch_assoc($result)): ?>
                        <tr class="border-b">
                            <td class="px-2 md:px-6 py-3 flex space-x-2">
                            
                            <a  href="supprimerClient.php?id_client=<?php echo $data["id_client"]; ?>">🗑️</a>
                            <a href="modifierClient.php?id_client=<?php echo $data["id_client"]; ?>">Edit</a>
                        </td>
                            <td class="px-2 md:px-6 py-3"><?= htmlspecialchars($reservation['id_client']) ?></td>
                            <td class="px-2 md:px-6 py-3"><?= htmlspecialchars($reservation['nom']) ?></td>
                            <td class="px-2 md:px-6 py-3"><?= htmlspecialchars($reservation['prenom']) ?></td>
                            <td class="px-2 md:px-6 py-3"><?= htmlspecialchars($reservation['email']) ?></td>
                            <td class="px-2 md:px-6 py-3"><?= htmlspecialchars($reservation['telephone']) ?></td>
                            <td class="px-2 md:px-6 py-3"><?= htmlspecialchars($reservation['adresse']) ?></td>
                            <td class="px-2 md:px-6 py-3"><?= htmlspecialchars($reservation['date_naissance']) ?></td>
                            <td class="px-2 md:px-6 py-3"><?= htmlspecialchars($reservation['mot_de_passe']) ?></td>
                            
                            
                    </td>   
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun client trouvée.</p>
        <?php endif; ?>
    </main>
    <script src="script.js"></script>
</body>
</html>
