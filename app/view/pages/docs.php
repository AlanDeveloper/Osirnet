<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/resources/css/style.css">
    <link rel="stylesheet" href="app/resources/css/docs.css">
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
        <h3 class="title">Documentos</h3>
        <div class="navigate">
            <a href="<?php echo BASE_URL.'colaborador'; ?>" class="btn btn-secondary">Voltar</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Adicionar documento</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col" class="flag">Flag</th>
                    <th scope="col" class="dtCreation">Data criação</th>
                    <th scope="col" class="dtModification">Data modificação</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i=0, $objs = $data['query']['docs']; $i < count($objs); $i++): ?>
                    <tr>
                        <th scope="row"><?php echo $objs[$i]['id']; ?></th>
                        <td><?php echo $objs[$i]['nome_doc']; ?></td>
                        <td class="flag"><?php echo $objs[$i]['flag']; ?></td>
                        <td style="display: none;"><?php echo $objs[$i]['id_modificador']; ?></td>
                        <td class="dtCreation"><?php echo $objs[$i]['data_criacao']; ?></td>
                        <td class="dtModification"><?php echo $objs[$i]['data_modificado']; ?></td>
                        <td><button type="button" class="btn btn-dark text-white editForm" data-bs-toggle="modal" data-bs-target="#editModal">Editar</button></td>
                        <td>
                            <form action="<?php echo BASE_URL.'documentos/'.$objs[$i]['id']; ?>">
                                <input type="hidden" name='_method' value="DELETE">
                                <button type="submit" class="btn btn-danger text-white">Deletar</button>
                            </form>
                        </td>
                    </tr>
                <?php endfor; ?>
                <?php if (count($data['query']['docs']) === 0): ?>
                    <tr>
                        <td class="notFound" colspan="5">Nenhum documento disponível.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Adicionar documento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" method="POST" novalidate>
                        <div class="col-md-12">
                            <label for="validationDefault01" class="form-label">Nome do documento</label>
                            <input type="text" class="form-control" id="validationDefault01" name="nome_doc" placeholder="Digite um nome" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault04" class="form-label">Documento obrigatório</label>
                            <select class="form-select" id="validationDefault04" name="flag" required>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault05" class="form-label">Colaborador</label>
                            <select class="form-select" id="validationDefault05" name="id_collaborator" required>
                                <?php for ($i=0, $objs = $data['query']['collaborators']; $i < count($objs); $i++): ?>
                                    <option value="<?php echo $objs[$i]['id']; ?>"><?php echo $objs[$i]['nome']; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                            <button class="btn btn-primary" type="submit">Enviar</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Editar documento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation editModalForm" method="POST" action="<?php echo BASE_URL.'documentos/'; ?>" novalidate>
                        <input type="hidden" name='_method' value="PUT">
                        <div class="col-md-12">
                            <label for="nome_doc" class="form-label">Nome do documento</label>
                            <input type="text" class="form-control" id="nome_doc" name="nome_doc" placeholder="Digite um nome" required>
                        </div>
                        <div class="col-md-6">
                            <label for="flag" class="form-label">Documento obrigatório</label>
                            <select class="form-select" id="flag" name="flag" required>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="id_collaborator" class="form-label">Colaborador</label>
                            <select class="form-select" id="id_collaborator" name="id_collaborator" required>
                                <?php for ($i=0, $objs = $data['query']['collaborators']; $i < count($objs); $i++): ?>
                                    <option value="<?php echo $objs[$i]['id']; ?>"><?php echo $objs[$i]['nome']; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
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

        const action = $('.editModalForm').attr('action');

        $(document).ready(function() {
            $('.editForm').on('click', function() {
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                let data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                $('#nome_doc').val(data[0]);
                $('#flag').val(data[1]);
                $('#id_collaborator').val(data[2]);

                $('.editModalForm').attr('action', action + $tr.children("th").text());
            });
        });
    </script>
</body>
</html>