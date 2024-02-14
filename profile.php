<?php
include('helper/functions.php');

session_start();
$user = $_SESSION['user'];
$user = getUserById($user['id']);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <a href="Home.php">Home</a>
            <a href="subscriptions.php">Subcription</a>
            <a href="profile.php">Profile</a>
           
        </nav>
    </header>

    <main class="profile__container">
        <div class="profile">
            <h1>Profile Information</h1>
            <div class="profile-info">
                <div class="profile-info-item">
                    <span>Email:</span>
                    <span><?php echo $user['email']; ?></span>
                </div>
                <div class="profile-info-item">
                    <span>Subscription:</span>
                    <span><?php echo $user['subscription_status']; ?></span>
                </div>
                <div class="profile-info-item">
                    <span>Conversion Left:</span>
                    <?php if ($user['subscription_status'] == 'free') : ?>
                        <span>
                            <?php echo $user['conversions_left']; ?>
                        </span>
                    <?php else : ?>
                        <span>Unlimited</span>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </main>

</body>

</html>