<h1 class="mt-6 font-bold ">Meus livros</h1>

<div class="grid grid-cols-4 gap-4">
    <div class="col-span-3 flex flex-col gap-4 ">
        <?php foreach ($livros as $livro) {
               require 'partials/_livro.php';
        }?>
    </div>

    <div>

        <div class="border border-stone-700 rounded ">
            <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Cadastre um novo livro</h1>
            <form action="/livro-criar" method="post" class="p-4 space-y-4">

                <?php if( $validacoes = flash()->get('validacoes') ): ?>
                    <div class="border-red-800 bg-red-900 text-red-400 px-4 py-1 rounded-md border-2 text-sm font-bold ">
                        <ul>
                            <li>Não foi possível avaliar...</li>
                            <?php foreach($validacoes as $validacao): ?>
                                <li><?=$validacao?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>


                <div class="flex flex-col">
                    <label for="" class="text-stone-500 mb-1">Título</label>
                    <input
                        type="text"
                        rows="6"
                        name="titulo"
                        class="border-stone-800 border-2 border rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 "
                        placeholder="Titulo do livro"
                    >
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-stone-500 mb-1">Autor</label>
                    <input
                        type="text"
                        rows="6"
                        name="autor"
                        class="border-stone-800 border-2 border rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 "
                        placeholder="Nome do Autor"
                    >
                </div>

                <div class="flex flex-col">
                    <label for="" class="text-stone-500 mb-1">Descrição</label>
                    <textarea
                        type="text"
                        rows="6"
                        name="descricao"
                        class="border-stone-800 border-2 border rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 "
                        placeholder="Um breve resumo do livro"
                    ></textarea>
                </div>

                <div class="flex flex-col">
                    <label for="" class="text-stone-500 mb-1">Ano de Lançamento</label>
                    <select
                        name="ano_lancamento"
                        class="border-stone-800 border-2 border rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 "
                    >
                        <?php foreach (range(1800, date('Y')) as $ano): ?>
                            <option value="<?=$ano?>"><?=$ano?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button
                    type="submit"
                    class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-800"
                >
                    Salvar
                </button>

            </form>
        </div>

    </div>
</div>