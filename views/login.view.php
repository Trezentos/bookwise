<div class="mt-6 grid grid-cols-2 gap-2">
    <div class="border border-stone-700 rounded ">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Login</h1>
        <form action="" method="post" class="p-4 space-y-4">

            <?php if( $validacoes = flash()->get('validacoes_login') ): ?>
                <div class="border-red-800 bg-red-900 text-red-400 px-4 py-1 rounded-md border-2 text-sm font-bold ">
                    <ul>
                        <li>Não foi possível autenticar!</li>
                        <?php foreach($validacoes as $validacao): ?>
                            <li><?=$validacao?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="flex flex-col">
                <label for="" class="text-stone-500 mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    class="border-stone-800 border-2 border rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 "
                    placeholder="Email"
                >
            </div>
            <div class="flex flex-col">
                <label for="" class="text-stone-500 mb-1">Senha</label>
                <input
                    type="password"
                    name="senha"
                    class="border-stone-800 border-2 border rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 "
                    placeholder="Senha"
                >
            </div>

            <button
                type="submit"
                class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-800"
            >
                Logar
            </button>

        </form>
    </div>

    <div class="border border-stone-700 rounded ">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Registro</h1>
        <form method="post" class="p-4 space-y-4" action="/registrar">



            <?php if( $validacoes = flash()->get('validacoes_registrar') ): ?>
                <div class="border-red-800 bg-red-900 text-red-400 px-4 py-1 rounded-md border-2 text-sm font-bold ">
                    <ul>
                        <li>Não foi possível registrar!</li>
                        <?php foreach($validacoes as $validacao): ?>
                            <li><?=$validacao?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="flex flex-col">
                <label for="" class="text-stone-500 mb-1">Nome</label>
                <input
                        type="text"
                        name="nome"
                        class="border-stone-800 border-2 border rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 "
                        placeholder="Nome"
                >
            </div>
            <div class="flex flex-col">
                <label for="" class="text-stone-500 mb-1">Email</label>
                <input
                        type="text"
                        name="email"
                        class="border-stone-800 border-2 border rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 "
                        placeholder="E-mail"
                >
            </div>
            <div class="flex flex-col">
                <label for="" class="text-stone-500 mb-1">Confirmar Email</label>
                <input
                        type="email"
                        name="email_confirmacao"
                        class="border-stone-800 border-2 border rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 "
                        placeholder="Confirme o seu e-mail"
                >
            </div>
            <div class="flex flex-col">
                <label for="" class="text-stone-500 mb-1">Senha</label>
                <input
                        type="password"
                        name="senha"
                        class="border-stone-800 border-2 border rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 "
                        placeholder="Password"
                >
            </div>

            <button type="reset"
                    class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-800">
                Cancelar
            </button>
            <button type="submit"
                    class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-800">
                Registrar
            </button>

        </form>
    </div>
</div>
