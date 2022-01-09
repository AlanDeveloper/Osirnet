<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/resources/css/style.css">
    <title><?php echo $data['title'] ?></title>
</head>
<body>
    <main>
        <h2>Colaboradores</h2>
        <a class="btn btn-primary" href=<?php echo BASE_URL."documentos"; ?>>Ver documentos</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Setor</th>
                    <th scope="col">Cargo</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i=0, $objs = $data['query']; $i < count($objs); $i++): ?>
                    <tr>
                        <th scope="row"><?php echo $objs[$i]['id']; ?></th>
                        <td><?php echo $objs[$i]['nome']; ?></td>
                        <td><?php echo $objs[$i]['setor']; ?></td>
                        <td><?php echo $objs[$i]['cargo']; ?></td>
                        <td><a class="btn btn-primary" href="<?php echo BASE_URL . 'anexar?colaborador='.$objs[$i]['id']; ?>">Anexar documento</a></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </main>
</body>
</html>