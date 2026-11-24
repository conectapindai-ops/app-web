-- CONECTA PINDAÍ - BANCO DE DADOS
CREATE TABLE IF NOT EXISTS lojas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  whatsapp VARCHAR(20),
  descricao VARCHAR(255),
  ativo TINYINT DEFAULT 1
);
CREATE TABLE IF NOT EXISTS produtos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  loja_id INT,
  nome VARCHAR(150),
  preco DECIMAL(10,2),
  preco_antigo DECIMAL(10,2) NULL,
  foto VARCHAR(255),
  FOREIGN KEY (loja_id) REFERENCES lojas(id)
);
INSERT INTO lojas (nome, whatsapp, descricao) VALUES
('RJ Calçados','557792043651','Calçados em Pindaí'),
('Shekhinah - Casa do Pão Caseiro','5577981222468','Pão caseiro em Pindaí'),
('Óticas JML','5577981329647','Visualize sua nova versão'),
('Carbono Cell','5577981413984','Celulares e som em Pindaí'),
('Carbono Magazine','557791063067','Utilidades para casa em Pindaí');
INSERT INTO produtos (loja_id, nome, preco, preco_antigo) VALUES
(1,'Mule Beira Rio',99.90,NULL),(1,'Papete Moleca',129.90,NULL),(1,'Rasteirinha Beira Rio',114.90,NULL),
(2,'Pão Caseiro Recheado',12.00,NULL),(2,'Pão Caseiro',7.00,NULL),(2,'Esfirra',2.00,NULL),
(3,'Óculos Genesis preto com dourado',260.00,290.00),(3,'Óculos Genesis sem aro dourado',280.00,320.00),(3,'Óculos de Sol Ray-Ban marrom',989.00,1099.00),
(4,'Tecno Spark Go 1S 64GB',690.00,NULL),(4,'Galaxy A57 8GB + 256GB',2390.00,NULL),(4,'Caixa JBL PartyBox Stage 320',2890.00,NULL),
(5,'Mop Giratório 360°',65.00,NULL),(5,'Ventilador Mondial Super Power',178.00,NULL),(5,'Moto Elétrica',3600.00,NULL);

CREATE TABLE IF NOT EXISTS app_records (
 id VARCHAR(100) PRIMARY KEY,
 collection VARCHAR(120) NOT NULL,
 value_json LONGTEXT NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 INDEX idx_collection (collection)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
