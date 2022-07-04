<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prisma ERP - Emissão de relatórios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="row">
        <h1 class="h1">Funcionários</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Matrícula</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Número de ordens</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($funcionarios as $funcionario)
                <tr>
                    <td class="font-weight-bold">{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->matricula }}</td>
                    <td>{{ $funcionario->tipo }}</td>
                    <td>{{ $funcionario->ordens()->count() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>