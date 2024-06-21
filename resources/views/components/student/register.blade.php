<div class="p-4">
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <fieldset class="border border-gray-300 p-4 mb-6 rounded-lg">
            <legend class="text-lg font-medium text-gray-900 dark:text-white">Dados Pessoais</legend>
            <div class="grid gap-6 mb-6 md:grid-cols-3">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome Completo</label>
                    <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Maria Clara Oliveira" required />
                </div>
                <div>
                    <label for="cpf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CPF</label>
                    <input type="text" id="cpf" name="cpf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="012.345.678-90" required />
                </div>
                <div>
                    <label for="date_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data de Nascimento</label>
                    <input type="date" id="date_birth" name="date_birth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div>
                    <label for="responsible_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do Responsável</label>
                    <input type="text" id="responsible_name" name="responsible_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Antônio Vilmar Silva" />
                </div>
                <div>
                    <label for="responsible_cpf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CPF do Responsável</label>
                    <input type="text" id="responsible_cpf" name="responsible_cpf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="012.345.678-91" />
                </div>
                <div>
                    <label for="responsible_date_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data de Nascimento do Responsável</label>
                    <input type="date" id="responsible_date_birth" name="responsible_date_birth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número para Contato</label>
                    <input type="text" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="(26) 98547-3256" required />
                </div>
                <div>
                    <label for="phone2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número para Contato 2</label>
                    <input type="text" id="phone2" name="phone2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="(61) 99632-5874" />
                </div>
            </div>
        </fieldset>

        <fieldset class="border border-gray-300 p-4 mb-6 rounded-lg">
            <legend class="text-lg font-medium text-gray-900 dark:text-white">Localização</legend>
            <div class="grid gap-6 mb-6 md:grid-cols-3">
                <div>
                    <label for="zip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CEP</label>
                    <input type="text" id="zip" name="zip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="01234-567" onblur="pesquisacep(this.value);" required />
                </div>
                <div>
                    <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cidade</label>
                    <input type="text" id="city" name="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Brasília" disabled required />
                </div>
                <div>
                    <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                    <input type="text" id="state" name="state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="DF" disabled required />
                </div>
                <div>
                    <label for="neighborhood" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bairro</label>
                    <input type="text" id="neighborhood" name="neighborhood" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Lago Sul" disabled required />
                </div>
                <div>
                    <label for="street" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rua</label>
                    <input type="text" id="street" name="street" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Quadra 04" required />
                </div>
                <div>
                    <label for="house_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número</label>
                    <input type="number" id="house_number" name="house_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="01" required />
                </div>
            </div>
        </fieldset>

        <legend class="text-lg font-medium text-gray-900 dark:text-white">Observações</legend>
        <label for="notes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observações</label>
        <textarea id="notes" name="notes" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Aluno PCD e possui disponibilidade somente nas terças e quartas."></textarea>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 w-full mt-5">Register</button>
    </form>
</div>
