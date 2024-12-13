<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_client = 1; // Remplacer par l'ID du client connecté
    $id_activite = $_POST['id_activite'];

    $sql = "INSERT INTO reservations (id_client, id_activite) VALUES ('$id_client', '$id_activite')";
    if (!mysqli_query($conn, $sql)) {
        die("Erreur lors de la réservation : " . mysqli_error($conn));
    }

    header("Location: reservations.php");
    exit();
}

$id_activite = $_GET['id'];
$sql = "SELECT * FROM activites WHERE id_activite = '$id_activite'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erreur lors de la récupération de l'activité : " . mysqli_error($conn));
}

$activite = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver <?= htmlspecialchars($activite['titre']) ?></title>
    <link rel="stylesheet" href="style.css">
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
<body>
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
                    <a href="client.php">
                    <img src="./img/User.png" alt="user logo"></a>
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
      

    <main>
        <h2><?= htmlspecialchars($activite['titre']) ?></h2>
        <p><?= htmlspecialchars($activite['description']) ?></p>
        <form method="POST">
            <input type="hidden" name="id_activite" value="<?= $id_activite ?>">
            <button class="bg-emerald-700 p-2" type="submit">Confirmer la Réservation</button>
        </form>
    </main>
</body>
</html>
