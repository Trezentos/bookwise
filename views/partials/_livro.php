<?php //dd(__DIR__); ?>

<div class="p-2 rounded border-stone-800 border-2 bg-stone-900">

    <div class=" flex ">
        <div class="w-1/3 w-40 mr-5 rounded is-hidden"><img src="<?=$livro->imagem ?>" alt=""></div>
        <div class="space-y-1">
            <a href="/livro?id=<?=$livro->id?>"  class="font-semibold hover:underline"><?=$livro->titulo?></a>
            <div class="text-xs italic">
                <?= $livro->autor .'<br><br>';?>
                <?=str_repeat('⭐', $livro->nota_avaliacao);?>
                (<?=$livro->count_avaliacoes?> Avaliações)
            </div>
        </div>

    </div>
    <div class="text-sm mt-2">
        <?=$livro->descricao?>
    </div>
</div>