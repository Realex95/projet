<?php include 'action/users/authentification.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/head.php'; ?>

<?php 
    
    $user_id = $_SESSION['auth'];
    
    require('action/database.php');
    $stmt = $bdd->prepare('SELECT * FROM urls WHERE user_id = :user_id');
    $stmt->execute(['user_id' => $user_id]);
    $urls = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo '<h2>Liste des URLs raccourcies :</h2>';
    echo '<ul>';
    foreach ($urls as $url) {
        echo '<li><a href="' . $url['long_url'] . '">' . $url['short_url'] . '</a></li>';
    }
    echo '</ul>';
    
    if (!empty($_POST['url'])) {
        $shortUrl = bin2hex(random_bytes(4));
    
        $stmt = $bdd->prepare('INSERT INTO urls (user_id, long_url, short_url) VALUES (:user_id, :long_url, :short_url)');
        $stmt->execute(['user_id' => $user_id, 'long_url' => $_POST['url'], 'short_url' => $shortUrl]);
    
        echo '<p>URL raccourcie : <a href="' . $shortUrl . '">' . $shortUrl . '</a></p>';
    }
    
    echo '<h2>Raccourcir une nouvelle URL :</h2>';
    echo '<form method="post">';
    echo '<label for="url">URL à raccourcir :</label>';
    echo '<input type="text" name="url" id="url" required>';
    echo '<button type="submit">Raccourcir</button>';
    echo '</form>';
    
    if (!empty($_SERVER['REQUEST_URI'])) {
        $urlCode = substr($_SERVER['REQUEST_URI'], 1);
        $stmt = $bdd->prepare('SELECT * FROM urls WHERE short_url = :short_url');
        $stmt->execute(['short_url' => $urlCode]);
        $url = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($url) {
            http_response_code(301);
            header("Location: " . $url['long_url']);
            exit;
        } else {
        }
    }
?>