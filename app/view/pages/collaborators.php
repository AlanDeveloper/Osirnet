<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/resources/css/style.css">
    <link rel="stylesheet" href="app/resources/css/collaborators.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300&display=swap" rel="stylesheet">
    <title><?php echo $data['title'] ?></title>
</head>
<body>
    <main>
        <div class="banner">
            <h1>Osirnet</h1>
        </div>
        <h3 class="title">Colaboradores</h3>
        <a class="btn btn-primary" href=<?php echo BASE_URL."documentos"; ?>>Ver documentos</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col" class="sector">Setor</th>
                    <th scope="col" class="office">Cargo</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i=0, $objs = $data['query']; $i < count($objs); $i++): ?>
                    <tr>
                        <th scope="row"><?php echo $objs[$i]['id']; ?></th>
                        <td><?php echo $objs[$i]['nome']; ?></td>
                        <td class="sector"><?php echo $objs[$i]['setor']; ?></td>
                        <td class="office"><?php echo $objs[$i]['cargo']; ?></td>
                        <td><a class="btn btn-primary" href="<?php echo BASE_URL . 'anexar?colaborador='.$objs[$i]['id']; ?>">Anexar documento</a></td>
                    </tr>
                <?php endfor; ?>
                <?php if (count($data['query']) === 0): ?>
                    <tr>
                        <td class="notFound" colspan="5">Nenhum colaborador disponível.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>