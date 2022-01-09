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
                        <?php if (isset($data['query']['attachs'][0]) && array_search($objs[$i]['id'], $data['query']['attachs'][0])): ?>
                            <td>
                                <form action="<?php echo BASE_URL.'anexar/7'; ?>">
                                    <input type="hidden" name='_method' value="DELETE">
                                    <button type="submit" class="btn btn-danger text-white">Desanexar</button>
                                </form>
                            </td>
                        <?php else: ?>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Anexar</button></td>
                        <?php endif; ?>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                             <div class="col-md-12">
                                <label for="validationDefault01" class="form-label">First name</label>
                                <input type="text" class="form-control" id="validationDefault01" name="caminho_documento" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </form>
                        <!-- <form class="row g-3 needs-validation" method="POST" novalidate>
                            <div class="col-md-12">
                                <label for="validationDefault01" class="form-label">First name</label>
                                <input type="text" class="form-control" id="validationDefault01" name="nome_doc" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault04" class="form-label">Documento obrigatório</label>
                                <select class="form-select" id="validationDefault04" name="flag" required>
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault05" class="form-label">Colaboradores</label>
                                <select class="form-select" id="validationDefault05" name="id_collaborator" required>
                                    
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </main>
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
    </script>
</body>
</html>