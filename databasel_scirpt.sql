CREATE TABLE entrega (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    recebedor_nome varchar(255),
    num_pedido varchar(255),
    recebedor_cpf varchar(255),
    client_id varchar(255),
    data_entrega varchar(255) 
);

CREATE TABLE usuario (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usuario varchar(255),
    senha varchar(255)
);