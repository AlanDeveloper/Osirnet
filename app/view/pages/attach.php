<?php
    function attachKey($objs, $key) {
        for ($i=0; $i < count($objs); $i++) { 
            if ($objs[$i]['id_tipo_documento'] === $key) return $objs[$i]['id'];
        }
        return null;
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/resources/css/style.css">
    <link rel="stylesheet" href="app/resources/css/attach.css">
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
        <h3 class="title">Anexar documentos</h3>
        <div class="navigate">
            <a href="<?php echo BASE_URL.'colaborador'; ?>" class="btn btn-secondary">Voltar</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Flag</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i=0, $objs = $data['query']['docs']; $i < count($objs); $i++): ?>
                    <tr>
                        <th scope="row"><?php echo $objs[$i]['id']; ?></th>
                        <td><?php echo $objs[$i]['nome_doc']; ?></td>
                        <td><?php echo $objs[$i]['flag']; ?></td>
                        <?php if (isset($data['query']['attachs']) && attachKey($data['query']['attachs'], $objs[$i]['id']) !== null): ?>
                            <td>
                                <form action="<?php echo BASE_URL.'anexar/'.attachKey($data['query']['attachs'], $objs[$i]['id']); ?>">
                                    <input type="hidden" name='_method' value="DELETE">
                                    <input type="hidden" name="colaborador" value="<?php echo $_GET['colaborador']; ?>">
                                    <button type="submit" class="btn btn-danger text-white">Desanexar</button>
                                </form>
                            </td>
                        <?php else: ?>
                            <td><button type="button" class="btn btn-primary attachForm" data-bs-toggle="modal" data-bs-target="#attachModal">Anexar</button></td>
                        <?php endif; ?>
                    </tr>
                <?php endfor; ?>
                <?php if (count($data['query']['docs']) === 0): ?>
                    <tr>
                        <td class="notFound" colspan="5">Nenhum documento disponível.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="modal fade" id="attachModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Anexar documento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                             <div class="col-md-12">
                                <label for="validationDefault01" class="form-label">Caminho do documento</label>
                                <input type="text" class="form-control" id="validationDefault01" name="caminho_documento" placeholder="Digite o caminho" required>
                            </div>
                            <input type="hidden" name="id_tipo_documento" id="id_tipo_documento">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                                <button class="btn btn-primary" type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="app/resources/js/jquery.min.js"></script>
    <script src="app/resources/js/bootstrap.min.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })();

        $(document).ready(function() {
            $('.attachForm').on('click', function() {
                $('#attachModal').modal('show');

                $tr = $(this).closest('tr');

                $('#id_tipo_documento').val($tr.children("th").text());
            });
        });
    </script>
</body>
</html>