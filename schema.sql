CREATE TABLE colaborador(
    id INT AUTO_INCREMENT,
    nome VARCHAR(100),
    setor VARCHAR(255),
    cargo VARCHAR(255),
    PRIMARY KEY (id)
);

INSERT INTO colaborador (nome, setor, cargo)
    VALUES
        ('João Silva', 'Financeiro', 'Gerente'),
        ('Maria Pereira', 'Financeiro', 'Analista'),
        ('Rodrigo Soares', 'Financeiro', 'Analista'),
        ('Pedro Rodrigues', 'Comercial', 'Vendedor(a)'),
        ('Marcia Silveira', 'Comercial', 'Vendedor(a)'),
        ('Paola Martins', 'Comercial', 'Gerente');

CREATE TABLE tipo_documento(
    id INT AUTO_INCREMENT,
    nome_doc VARCHAR(255),
    flag INT(1) COMMENT "0 - Não obrigatorio, 1 - obrigatorio",
    data_criacao DATETIME,
    data_modificado DATETIME,
    id_criador INT,
    id_modificador INT,
    PRIMARY KEY (id)
);

CREATE TABLE documento_colaborador(
    id INT AUTO_INCREMENT,
    id_colaborador INT,
    id_tipo_documento INT,
    caminho_documento VARCHAR(255),
    FOREIGN KEY (id_colaborador) REFERENCES colaborador (id), FOREIGN
    KEY (id_tipo_documento) REFERENCES tipo_documento (id), PRIMARY KEY
    (id)
);