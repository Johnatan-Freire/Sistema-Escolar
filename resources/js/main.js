// Verificar a preferência do tema do usuário e aplicar a classe 'dark' se necessário
if (localStorage.getItem('theme') === 'dark' ||
    (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark');
}

// Função para alternar o tema e salvar a preferência no localStorage
function toggleTheme() {
    if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
    } else {
        document.documentElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');
    }
}

// Evento de DOMContentLoaded para configurar o botão de alternância de tema
document.addEventListener('DOMContentLoaded', function () {
    const toggleSwitch = document.getElementById('theme-toggle');
    if (toggleSwitch) {
        toggleSwitch.addEventListener('change', toggleTheme);

        // Atualizar a posição do botão de alternância com base no tema atual
        if (document.documentElement.classList.contains('dark')) {
            toggleSwitch.checked = true;
        } else {
            toggleSwitch.checked = false;
        }
    }
});

// Seleção de menu (efeito azulado) e alternância de ícones no header
document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('ul > li > a');

    menuItems.forEach(item => {
        item.addEventListener('click', function (event) {
            // Remover a classe ativa de todos os itens e alternar ícones
            menuItems.forEach(el => {
                el.classList.remove('active-link', 'text-blue-600', 'border-blue-600', 'dark:text-blue-500', 'dark:border-blue-500');
                const filledIcon = el.querySelector('.icon-filled');
                const emptyIcon = el.querySelector('.icon-empty');
                if (filledIcon && emptyIcon) {
                    filledIcon.classList.add('hidden');
                    emptyIcon.classList.remove('hidden');
                }
            });

            // Adicionar a classe ativa ao item clicado e alternar ícones
            this.classList.add('active-link', 'text-blue-600', 'border-blue-600', 'dark:text-blue-500', 'dark:border-blue-500');
            const filledIcon = this.querySelector('.icon-filled');
            const emptyIcon = this.querySelector('.icon-empty');
            if (filledIcon && emptyIcon) {
                filledIcon.classList.remove('hidden');
                emptyIcon.classList.add('hidden');
            }
        });
    });
});

//Jquery barra de pesquisa do aluno
$(document).ready(function () {
    const searchInput = $('#simple-search');
    const searchOptions = $('#searchOptions');
    const filterInputs = $('#filterDropdown input[type="checkbox"]');
    const searchForm = $('#searchForm');
    const filterForm = $('#filterForm');

    function fetchResults() {
        const formData = searchForm.serialize() + '&' + filterForm.serialize();
        $.ajax({
            url: searchForm.attr('action'),
            type: searchForm.attr('method'),
            data: formData,
            success: function (response) {
                const tableBody = $('#studentsTableBody');
                tableBody.empty();
                response.students.forEach(student => {
                    const colorClass = {
                        'ativo': 'bg-green-500',
                        'trancado': 'bg-yellow-500',
                        'cancelado': 'bg-red-500',
                        'formado': 'bg-blue-500'
                    }[student.situacao_cadastral.toLowerCase()] || 'bg-gray-500';

                    const row = `
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">${student.id}</td>
                            <th scope="row" class="px-6 py-2 text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="text-base font-semibold">${student.nome}</div>
                                <div class="font-normal text-gray-500">${student.numero}</div>
                            </th>
                            <td class="px-6 py-4">${student.curso}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full ${colorClass} me-2"></div> ${student.situacao_cadastral}
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
                        </tr>`;
                    tableBody.append(row);
                });
            }
        });
    }

    searchInput.on('input', fetchResults);
    searchOptions.on('change', fetchResults);
    filterInputs.on('change', fetchResults);
});