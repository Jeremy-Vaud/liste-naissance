<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="dist/output.css" rel="stylesheet">
    <title>Liste de naissance</title>
</head>

<body class="container mx-auto">
    <h1 class="text-center text-3xl py-6">Liste de naissance</h1>
    <div class="flex flex-wrap">
        <?= $cards ?>
    </div>
    <div id="bg-modal" class="fixed w-screen h-screen bg-black opacity-50 top-0 left-0 hidden"></div>
    <div id="modal" class="fixed w-[300px] bg-white top-1/2 left-1/2 translate-x-[-50%] translate-y-[-50%] rounded-lg text-center p-6 hidden">
        <form id="modal-form">
            <input type="hidden" id="item-id" name="id">
            <label for="name">Votre nom:</label>
            <input type="text" id="name" name="name" class="w-full py-1 px-3 mb-6">
            <button type="submit" class="btn-primary">j'offre ce cadeau</button>
        </form>
        <div id="modal-success" class="hidden mb-6">
            <p class="text-2xl">Merci!</p>
        </div>
        <div id="modal-error" class="hidden mb-6">
            <p>Une erreur est survenue!</p>
        </div>
        <button id="modal-close" class="text-gray-500 cursor-pointer my-2">Fermer</button>
    </div>
    <script src="dist/main.js"></script>
</body>

</html>