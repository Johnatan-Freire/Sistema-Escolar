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
