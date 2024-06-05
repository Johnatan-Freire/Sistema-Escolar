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
