INSERT INTO tb_usuario (nome_usuario, email_usuario, senha_usuario, data_cadastro) VALUES ('Gustavo','gustavo@gmail.com','123','2022-11-17');

INSERT INTO tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario) VALUES ('SABESP','1436216600','Rua das águas, 155',1);
INSERT INTO tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario) VALUES ('Loja da Mel','1436022000','Av. das acácias, 500',1);

INSERT INTO tb_categoria (nome_categoria, id_usuario) VALUES ('Receitas',1);
INSERT INTO tb_categoria (nome_categoria, id_usuario) VALUES ('Despesas',1);

INSERT INTO tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario) VALUES ('Banco Itau','001','0101-1',0,1);
INSERT INTO tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario) VALUES ('Banco Santander','002','0202-2',0,1);

INSERT INTO tb_movimento (tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario) 
			VALUES (1,'2022-11-17',2500,'Salário do Mês',1,1,1,1);
INSERT INTO tb_movimento (tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario) 
			VALUES (2,'2022-11-17',150,'Pagamento de Conta de água',2,1,2,1);

#-------------------------- USUARIO 2 -------------------------------------------------------------------------------------------------------
INSERT INTO tb_usuario (nome_usuario, email_usuario, senha_usuario, data_cadastro) VALUES ('Joice','joice@gmail.com','123','2022-11-16');

INSERT INTO tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario) VALUES ('ETEC Jaú','1436028055','Rua Rui Barbosa, 300',2);
INSERT INTO tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario) VALUES ('Loja da Sônia','1421049966','Av. das nações, 2-60',2);

INSERT INTO tb_categoria (nome_categoria, id_usuario) VALUES ('Salário',2);
INSERT INTO tb_categoria (nome_categoria, id_usuario) VALUES ('Vestuário',2);

INSERT INTO tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario) VALUES ('Banco do Brasil','003','0303-1',0,2);
INSERT INTO tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario) VALUES ('Banco Bradesco','004','0404-1',0,2);

INSERT INTO tb_movimento (tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario) 
			VALUES (1,'2022-11-16',5000,'Salário de Novembro',3,3,4,2);
INSERT INTO tb_movimento (tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario) 
			VALUES (2,'2022-11-16',250,'Conta Loja de Roupa',4,3,3,2);

#-------------------------- USUARIO 3 -------------------------------------------------------------------------------------------------------
INSERT INTO tb_usuario (nome_usuario, email_usuario, senha_usuario, data_cadastro) VALUES ('Guilherme','guilherme@gmail.com','123','2022-11-15');
INSERT INTO tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario) VALUES ('SP Tecnologia','1425009941','Av. João Goulart, 98',3);
INSERT INTO tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario) VALUES ('Colégio Elite','1436213003','Trav. Ricardo Auler, 551',3);
INSERT INTO tb_categoria (nome_categoria, id_usuario) VALUES ('Serviços',3);
INSERT INTO tb_categoria (nome_categoria, id_usuario) VALUES ('Colégio',3);
INSERT INTO tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario) VALUES ('Banco Sicoob','005','0505-2',0,3);
INSERT INTO tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario) VALUES ('Banco Itau','006','0606-3',0,3);
INSERT INTO tb_movimento (tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario) 
			VALUES (1,'2022-11-16',3200,'Desenvolvimento de Site',5,5,5,3);
INSERT INTO tb_movimento (tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario) 
			VALUES (2,'2022-11-16',250,'Conta Loja de Roupa',6,5,6,3);


# ------------------------- USUARIO 4 ---------------------
INSERT INTO tb_usuario (nome_usuario, email_usuario, senha_usuario, data_cadastro) VALUES ('Deborah','deborah@gmail.com','123','2022-11-17');
INSERT INTO tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario) VALUES ('Pizza Fone','1421025544','Av. Brasil, 547',4);
INSERT INTO tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario) VALUES ('CNA Idiomas','1436259314','Rua das flores, 87',4);
INSERT INTO tb_categoria (nome_categoria, id_usuario) VALUES ('Alimentação',4);
INSERT INTO tb_categoria (nome_categoria, id_usuario) VALUES ('Aulas',4);
INSERT INTO tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario) VALUES ('Banco Santander','007','0707-8',0,4);
INSERT INTO tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario) VALUES ('Banco Caixa','008','0808-9',0,4);
INSERT INTO tb_movimento (tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario) 
			VALUES (1,'2022-11-16',3200,'Aulas Dadas',8,7,8,4);
INSERT INTO tb_movimento (tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario) 
			VALUES (2,'2022-11-16',250,'Conta Loja de Roupa',7,7,7,4);


# -------------------- USUARIO 5 ---------------------
INSERT INTO tb_usuario (nome_usuario, email_usuario, senha_usuario, data_cadastro) VALUES ('André','andre@gmail.com','123','2022-11-16');
INSERT INTO tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario) VALUES ('Açougue do João','14997381417','Rua Ricardo Maciel, 55',5);
INSERT INTO tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario) VALUES ('Pastelaria do Japones','1436210055','Rua Humaitá, 300',5);
INSERT INTO tb_categoria (nome_categoria, id_usuario) VALUES ('Artes Gráficas',5);
INSERT INTO tb_categoria (nome_categoria, id_usuario) VALUES ('Alimentação',5);
INSERT INTO tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario) VALUES ('Banco Itau','009','0909-9',0,5);
INSERT INTO tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario) VALUES ('Banco do Brasil','010','1010-9',0,5);
INSERT INTO tb_movimento (tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario) 
			VALUES (1,'2022-11-16',5870,'Design de fachada',9,9,9,5);
INSERT INTO tb_movimento (tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario) 
			VALUES (2,'2022-11-16',250,'Jantar de Domingo',10,9,10,5);
            
            
# ======================== ATIVIDADE ========================
# 1 - Nome do Usuário e Nome da categoria
SELECT usu.nome_usuario, cat.nome_categoria
FROM tb_usuario usu
INNER JOIN tb_categoria cat
	ON cat.id_usuario = usu.id_usuario;
    
# 2 - Nome do Usuário, Nome da Empresa, Telefone e Endereço da Empresa
SELECT usu.nome_usuario, emp.nome_empresa, emp.endereco_empresa, emp.telefone_empresa
FROM tb_usuario usu
INNER JOIN tb_empresa emp
	ON emp.id_usuario = usu.id_usuario;
    
# 3 - Nome do Usuário, nome do Banco, Saldo, numero da conta, e-mail do usuário
SELECT usu.nome_usuario, usu.email_usuario, ct.banco_conta, ct.saldo_conta, ct.numero_conta
FROM tb_usuario usu
INNER JOIN tb_conta ct
	ON ct.id_usuario = usu.id_usuario;
    
# 4 - Data movimento, Tipo do movimento, valor do movimento, nome do usuário
SELECT mov.data_movimento, mov.tipo_movimento, mov.valor_movimento, usu.nome_usuario
FROM tb_movimento mov
INNER JOIN tb_usuario usu
	ON usu.id_usuario = mov.id_usuario;
    
# 5 - Data movimento, Tipo do movimento, valor do movimento, nome do usuário, nome da categoria
SELECT mov.data_movimento, mov.tipo_movimento, mov.valor_movimento, usu.nome_usuario, cat.nome_categoria
FROM tb_movimento mov
INNER JOIN tb_usuario usu
	ON usu.id_usuario = mov.id_usuario
INNER JOIN tb_categoria cat
	ON cat.id_categoria = mov.id_categoria;
    
# 6 - Nome da Categoria, Nome da Empresa, Nome do Usuario, data do movimento, Valor do movimento, e-mail do usuário
SELECT mov.data_movimento, mov.valor_movimento, emp.nome_empresa, cat.nome_categoria, usu.nome_usuario, usu.email_usuario
FROM tb_movimento mov
INNER JOIN tb_usuario usu
	ON usu.id_usuario = mov.id_usuario
INNER JOIN	tb_empresa emp
	ON emp.id_empresa = mov.id_empresa
INNER JOIN tb_categoria cat
	ON cat.id_categoria = mov.id_categoria;
    
# 7 - Nome do banco, numero da conta, nome da categoria, nome da empresa, nome do usuario, data do movimento, valor do movimento
SELECT mov.data_movimento, mov.valor_movimento, bco.banco_conta, bco.numero_conta, emp.nome_empresa, usu.nome_usuario, cat.nome_categoria
FROM tb_movimento mov
INNER JOIN tb_conta bco
	ON bco.id_conta = mov.id_conta
INNER JOIN tb_empresa emp
	ON emp.id_empresa = mov.id_empresa
INNER JOIN tb_categoria cat
	ON cat.id_categoria = mov.id_categoria
INNER JOIN tb_usuario usu
	ON usu.id_usuario = mov.id_usuario;

#-------- Relatório com Filtro -------#
# 1 - Resultado: nome do usuário e nome da categoria cujo o nome do usuário tenha a palavra 'a';
SELECT usu.nome_usuario, cat.nome_categoria
FROM tb_usuario usu
INNER JOIN tb_categoria cat
	ON cat.id_usuario = usu.id_usuario
WHERE usu.nome_usuario like '%a%';

# 2 - Resultado: Nome do usuário e noma da categora cuja as categorias foram cadastradas pelo usuário cod.1
SELECT usu.nome_usuario, cat.nome_categoria
FROM tb_usuario usu
INNER JOIN tb_categoria cat
	ON cat.id_usuario = usu.id_usuario
WHERE cat.id_usuario = 1;

# 3 - Resultado: Nome da Categoria, nome da empresa, nome do usuario, data do movimento, valor movimento de todas as entradas (1)
SELECT cat.nome_categoria, emp.nome_empresa, usu.nome_usuario, mov.data_movimento, mov.valor_movimento
FROM tb_movimento mov
INNER JOIN tb_usuario usu
	ON usu.id_usuario = mov.id_usuario
INNER JOIN tb_empresa emp
	ON emp.id_empresa = mov.id_empresa
INNER JOIN tb_categoria cat
	ON cat.id_categoria = mov.id_categoria
WHERE mov.tipo_movimento = 1;

# 4 - Resultado: Nome do banco, número da conta, nome da categoria, nome da empresa, nome do usuario, data do movimento, 
# valor do movimento de todas as entradas feitas pelo usuario 1 e 2
SELECT bco.banco_conta, bco.numero_conta, cat.nome_categoria, emp.nome_empresa, usu.nome_usuario, mov.data_movimento, mov.valor_movimento
FROM tb_movimento mov
INNER JOIN tb_conta bco
	ON bco.id_conta = mov.id_conta
INNER JOIN tb_categoria cat
	ON cat.id_categoria = mov.id_categoria
INNER JOIN tb_empresa emp
	ON emp.id_empresa = mov.id_empresa
INNER JOIN tb_usuario usu
	ON usu.id_usuario = mov.id_usuario
WHERE mov.tipo_movimento = 1 AND mov.id_usuario IN (1,2);

# 5 - Resultado: Nome do banco, número da conta, nome da categoria, nome da empresa, nome do usuario, data do movimento, 
# valor do movimento de todas as entradas e saídas no período do dia '2020-01-01' até hoje
SELECT bco.banco_conta, bco.numero_conta, cat.nome_categoria, emp.nome_empresa, usu.nome_usuario, mov.data_movimento, mov.valor_movimento
FROM tb_movimento mov
INNER JOIN tb_conta bco
	ON bco.id_conta = mov.id_conta
INNER JOIN tb_categoria cat
	ON cat.id_categoria = mov.id_categoria
INNER JOIN tb_empresa emp
	ON emp.id_empresa = mov.id_empresa
INNER JOIN tb_usuario usu
	ON usu.id_usuario = mov.id_usuario
WHERE mov.data_movimento BETWEEN '2020-01-01' AND now();

SELECT * from tb_categoria where id_usuario = 1;

SELECT id_conta, banco_conta, agencia_conta, numero_conta, saldo_conta
                        FROM tb_conta
                        WHERE id_usuario = 1
                        AND saldo_conta <=250;
                        
SELECT id_movimento,
                               id_conta,
                               tipo_movimento,
                               date_format(data_movimento, "%d/%m/%Y") as data_movimento,
                               valor_movimento
                        FROM tb_movimento 
                        WHERE id_usuario = 1
                        AND id_conta = 12;