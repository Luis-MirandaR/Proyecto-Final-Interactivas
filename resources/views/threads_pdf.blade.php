<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hilos</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px;}
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left;}
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Lista de Hilos</h1>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Contenido</th>
                <th>Fecha de creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($threads as $thread)
                <tr>
                    <td>{{ $thread->title }}</td>
                    <td>{{ Str::limit($thread->content, 100) }}</td>
                    <td>{{ $thread->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>