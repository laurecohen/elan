<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/css/uikit.min.css" />
        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit-icons.min.js"></script>
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/style.css">
    <title><?= $titre ?></title>
</head>
<body>
    <div class="uk-container uk-container-xlarge uk-padding">
        <div>
            <?= $contenu ?>
        </div>
    </div>
</body>
</html>