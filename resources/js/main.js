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
        toggleSwitch.classList.add('light');
    } else {
        document.documentElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');
        toggleSwitch.classList.remove('light');
    }
}

// Evento de DOMContentLoaded para configurar o botão de alternância de tema
document.addEventListener('DOMContentLoaded', function () {
    const toggleSwitch = document.getElementById('theme-toggle');
    toggleSwitch.addEventListener('click', toggleTheme);

    // Atualizar a posição do botão de alternância com base no tema atual
    if (document.documentElement.classList.contains('dark')) {
        toggleSwitch.classList.remove('light');
    } else {
        toggleSwitch.classList.add('light');
    }
});


//seleção de menu (efeito azulado)
document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('ul > li > a');

    menuItems.forEach(item => {
        item.addEventListener('click', function (event) {
            event.preventDefault(); // Evitar comportamento padrão
            // Remove a classe ativa de todos os itens
            menuItems.forEach(el => {
                el.classList.remove('active-link', 'text-blue-600', 'border-blue-600', 'dark:text-blue-500', 'dark:border-blue-500');
            });
            // Adicione a classe ativa ao item clicado
            this.classList.add('active-link', 'text-blue-600', 'border-blue-600', 'dark:text-blue-500', 'dark:border-blue-500');
        });
    });
});


//alternancia de icone header
document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('ul > li > a');

    menuItems.forEach(item => {
        item.addEventListener('click', function (event) {
            event.preventDefault(); // Evitar comportamento padrão

            // Remove a classe ativa de todos os itens e alterna ícones
            menuItems.forEach(el => {
                el.classList.remove('active-link', 'text-blue-600', 'border-blue-600', 'dark:text-blue-500', 'dark:border-blue-500');
                const filledIcon = el.querySelector('.icon-filled');
                const emptyIcon = el.querySelector('.icon-empty');
                if (filledIcon && emptyIcon) {
                    filledIcon.classList.add('hidden');
                    emptyIcon.classList.remove('hidden');
                }
            });

            // Adicione a classe ativa ao item clicado e alterna ícones
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
