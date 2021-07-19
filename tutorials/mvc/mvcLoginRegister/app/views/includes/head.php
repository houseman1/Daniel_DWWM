<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Allow web pulblishers to define how pages should be handled by caches
    Autoriser les éditeurs Web à définir comment les pages doivent être gérées par les caches
    no-cache : the response may be stored by any cache.
    no-cache : la réponse peut être stockée par n'importe quel cache.
    However, the stored response MUST always go through validation with the origin server first before using it
    Cependant, la réponse stockée DOIT toujours passer par la validation avec le serveur d'origine avant de l'utiliser -->
    <meta content="no-cache" http-equiv="Cache-Control">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- IE before version 11 will not necessarily use edge mode if you don't specify it.
    IE avant la version 11 n'utilisera pas nécessairement le mode Edge si vous ne le spécifiez pas. -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- SITENAME and URLROOT are defined in config.php
    SITENAME et URLROOT sont définis dans config.php -->
    <title><?php echo SITENAME; ?>></title>
    <link rel="stylesheet" href="public/css/style.css">

    <!-- Embed fonts from fonts.google.com
    Intégrer les polices de fonts.google.com -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Add font awesome and jquery
    Ajouter une police awesome et jquery -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>


