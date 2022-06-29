<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prisma ERP - Emissão de relatórios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">    <title>Document</title>
</head>
<body>
        <div class="row">
            <h1 class="h1">Contratantes</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">CNPJ</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Número de ordens</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($contratantes as $contratante)
                    <tr>
                        <td class="font-weight-bold">{{ $contratante->nome }}</td>
                        <td>{{ $contratante->cnpj }}</td>
                        <td>{{ $contratante->endereco }}</td>
                        <td>{{ $contratante->cidade }}</td>
                        <td>{{ $contratante->estado }}</td>
                        <td>{{ $contratante->ordens()->count() }}</td>
                    </tr>            
                    @endforeach
                </tbody>
            </table>
            
        </div>
</body>
</html>