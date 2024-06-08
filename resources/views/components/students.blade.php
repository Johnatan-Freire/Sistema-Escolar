<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M9 8h10M9 12h10M9 16h10M4.99 8H5m-.02 4h.01m0 4H5"/>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
