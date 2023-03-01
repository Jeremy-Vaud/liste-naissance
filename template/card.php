<div class="text-center w-[280px] py-16 mx-auto my-5 shadow-[0_35px_60px_-15px_rgba(0,0,0,0.3)] rounded-lg">
    <h2 class="mb-6 text-xl"><?= htmlentities($elt->get("title")) ?></h2>
    <img src="<?= htmlentities($elt->get("img")) ?>" class="w-[200px] h-[200px] object-cover mx-auto mb-3">
    <a href="<?= htmlentities($elt->get("link")) ?>" target="_blank" class="link-primary">Lien vers boutique</a>
    <p class="text-lg my-3"><?= number_format($elt->get("price"), 2,","," ") ?> €</p>
    <div>
        <?php if ($elt->get("bought")) { ?>
            <p class="text-gray-500 py-1 alreadyBought">Déjà réservé</p>
            <button id="<?= $elt->get("id") ?>" class="btn-primary btn hidden">J'offre ce cadeau</button>
        <?php } else { ?>
            <p class="text-gray-500 py-1 hidden alreadyBought">Déjà réservé</p>
            <button id="<?= $elt->get("id") ?>" class="py-1 px-6 btn-primary btn">J'offre ce cadeau</button>
        <?php } ?>
    </div>
</div>