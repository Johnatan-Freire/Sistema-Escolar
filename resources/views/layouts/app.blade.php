<!-- app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>
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
        document.addEventListener('DOMContentLoaded', function() {
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
        document.addEventListener('DOMContentLoaded', function() {
            const menuItems = document.querySelectorAll('ul > li > a');

            menuItems.forEach(item => {
                item.addEventListener('click', function(event) {
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


    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 dark:text-white">
    @include('templates.header')

    <div class="content">
        @yield('content')
    </div>

    @include('templates.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js" defer></script>
</body>
</html>
