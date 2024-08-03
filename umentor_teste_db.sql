CREATE DATABASE umentor_teste;
USE umentor_teste;

CREATE TABLE colaboradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    situacao ENUM('ativo', 'inativado') NOT NULL,
    data_admissao DATE NOT NULL,
    data_hora_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_hora_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO colaboradores (nome, email, situacao, data_admissao) VALUES
('João Silva', 'joao.silva@exemplo.com', 'ativo', '2020-01-15'),
('Maria Oliveira', 'maria.oliveira@exemplo.com', 'ativo', '2019-02-20'),
('Pedro Santos', 'pedro.santos@exemplo.com', 'inativado', '2018-03-25'),
('Ana Lima', 'ana.lima@exemplo.com', 'ativo', '2021-04-30'),
('Lucas Costa', 'lucas.costa@exemplo.com', 'ativo', '2022-05-10'),
('Mariana Souza', 'mariana.souza@exemplo.com', 'ativo', '2020-06-15'),
('Carlos Pereira', 'carlos.pereira@exemplo.com', 'inativado', '2017-07-20'),
('Fernanda Almeida', 'fernanda.almeida@exemplo.com', 'ativo', '2018-08-25'),
('Ricardo Fernandes', 'ricardo.fernandes@exemplo.com', 'ativo', '2019-09-30'),
('Juliana Castro', 'juliana.castro@exemplo.com', 'inativado', '2020-10-15'),
('Gustavo Rocha', 'gustavo.rocha@exemplo.com', 'ativo', '2021-11-20'),
('Patricia Ribeiro', 'patricia.ribeiro@exemplo.com', 'ativo', '2019-12-25'),
('André Martins', 'andre.martins@exemplo.com', 'inativado', '2020-01-30'),
('Renata Barbosa', 'renata.barbosa@exemplo.com', 'ativo', '2021-02-10'),
('Felipe Mendes', 'felipe.mendes@exemplo.com', 'ativo', '2022-03-15'),
('Aline Carvalho', 'aline.carvalho@exemplo.com', 'ativo', '2019-04-20'),
('Thiago Teixeira', 'thiago.teixeira@exemplo.com', 'inativado', '2018-05-25'),
('Camila Nunes', 'camila.nunes@exemplo.com', 'ativo', '2020-06-30'),
('Bruno Cardoso', 'bruno.cardoso@exemplo.com', 'ativo', '2021-07-10'),
('Vanessa Araujo', 'vanessa.araujo@exemplo.com', 'ativo', '2019-08-15');

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (id, nome, email, permission_user, empresa, senha, data_criacao) VALUES
(1, 'permanent', 'user@system.com', '1234567!', '2024-08-01 18:08:51');
