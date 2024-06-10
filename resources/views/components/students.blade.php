<div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
    <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
        <div class="w-full md:w-1/2">
            <form class="flex items-center">
                <label for="simple-search" class="sr-only">Procurar</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" id="simple-search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Procurar" required="">
                </div>
            </form>
        </div>
        <div class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
            <button type="button" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-black dark:text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                adicionar alunos
            </button>
            
            
            <div class="flex items-center w-full space-x-3 md:w-auto">
                <form class="max-w-sm mx-auto">
                    <select id="searchOptions" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                      <option value="Nome">Nome</option>
                      <option value="Matricula">Matrícula</option>
                      <option value="CPF">CPF</option>
                      <option value="Responsavel">Responsável</option>
                    </select>
                  </form>
                  
                  
                <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4 h-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                    </svg>
                    Situação
                    <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 111.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z" />
                    </svg>
                </button>
                <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                    <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                        Categoria
                    </h6>
                    <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                        <li class="flex items-center">
                            <input id="apple" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                            <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                Ativos
                            </label>
                        </li>
                        <li class="flex items-center">
                            <input id="fitbit" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                            <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                Cancelados
                            </label>
                        </li>
                        <li class="flex items-center">
                            <input id="dell" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                            <label for="dell" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                Formados
                            </label>
                        </li>
                        <li class="flex items-center">
                            <input id="asus" type="checkbox" value="" checked class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                            <label for="asus" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                Trancados
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Nome</th>
                <th scope="col" class="px-6 py-3">Curso</th>
                <th scope="col" class="px-6 py-3">Situação</th>
                <th scope="col" class="px-6 py-3">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-2 text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="text-base font-semibold">{{ $student->nome }}</div>
                    <div class="font-normal text-gray-500">{{ $student->numero }}</div>
                </th>
                <td class="px-6 py-4">{{ $student->curso }}</td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        @php
                        $colorClass = '';
                        $situacao = strtolower($student->situacao_cadastral);
                        switch ($student->situacao_cadastral) {
                        case 'Ativo':
                        $colorClass = 'bg-green-500';
                        break;
                        case 'Trancado':
                        $colorClass = 'bg-yellow-500';
                        break;
                        case 'Cancelado':
                        $colorClass = 'bg-red-500';
                        break;
                        case 'Formado':
                        $colorClass = 'bg-blue-500';
                        break;
                        default:
                        $colorClass = 'bg-gray-500';
                        break;
                        }
                        @endphp
                        <div class="h-2.5 w-2.5 rounded-full {{ $colorClass }} me-2"></div> {{ $student->situacao_cadastral }}
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex space-x-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M9 8h10M9 12h10M9 16h10M4.99 8H5m-.02 4h.01m0 4H5" />
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
