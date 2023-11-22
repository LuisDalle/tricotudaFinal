-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/11/2023 às 03:57
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_tricotuda`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb2_carrinhosalvo`
--

CREATE TABLE `tb2_carrinhosalvo` (
  `PK_CarrinhoSalvoID` int(11) NOT NULL,
  `FK_ClienteID` int(11) NOT NULL,
  `NR_ProdutoID` int(255) NOT NULL,
  `DT_CriadoEm` timestamp NULL DEFAULT current_timestamp(),
  `NR_Quantidade` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb2_carrinhosalvo`
--

INSERT INTO `tb2_carrinhosalvo` (`PK_CarrinhoSalvoID`, `FK_ClienteID`, `NR_ProdutoID`, `DT_CriadoEm`, `NR_Quantidade`) VALUES
(14, 1, 7, '2023-11-22 02:39:17', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb3_categorias`
--

CREATE TABLE `tb3_categorias` (
  `PK_CategoriaID` int(11) NOT NULL,
  `TX_NomeCategoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb3_categorias`
--

INSERT INTO `tb3_categorias` (`PK_CategoriaID`, `TX_NomeCategoria`) VALUES
(1, 'Blusas'),
(2, 'Vestidos'),
(3, 'Casacos'),
(4, 'Cintos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb4_clientes`
--

CREATE TABLE `tb4_clientes` (
  `PK_ClienteID` int(11) NOT NULL,
  `TX_Nome` varchar(255) NOT NULL,
  `TX_Email` varchar(255) NOT NULL,
  `TX_Senha` varchar(255) NOT NULL,
  `TX_Endereco` varchar(255) DEFAULT NULL,
  `DT_CriadoEm` timestamp NULL DEFAULT current_timestamp(),
  `DT_AtualizadoEm` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NM_CEP` int(11) DEFAULT NULL,
  `NM_Numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb4_clientes`
--

INSERT INTO `tb4_clientes` (`PK_ClienteID`, `TX_Nome`, `TX_Email`, `TX_Senha`, `TX_Endereco`, `DT_CriadoEm`, `DT_AtualizadoEm`, `NM_CEP`, `NM_Numero`) VALUES
(1, 'luis', 'luisdalle@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Cruzeiro Velho Quadra 4 Bloco V ', '2023-10-17 23:39:58', '2023-11-22 02:11:51', 70648223, 32),
(2, 'teste', 'teste', '698dc19d489c4e4db73e28a713eab07b', 'teste', '2023-11-01 05:14:43', '2023-11-01 05:14:43', NULL, NULL),
(5, 'aaaaaaaa', 'aaaaaaaa', '3dbe00a167653a1aaee01d93e77e730e', 'aaaaaaaaa', '2023-11-01 05:31:38', '2023-11-01 05:31:38', NULL, NULL),
(8, 'teste de novo', 'usuario', '81dc9bdb52d04dc20036dbd8313ed055', 'fodase', '2023-11-01 05:37:36', '2023-11-01 05:37:36', NULL, NULL),
(9, 'TESTE TESTE', 'teste@teste.com', 'fcea920f7412b5da7be0cf42b8c93759', NULL, '2023-11-15 00:43:46', '2023-11-15 00:43:46', NULL, NULL),
(11, 'teste', 'teste@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2023-11-21 17:14:09', '2023-11-21 17:14:09', 70648223, NULL),
(12, 'aaaaaaaaaa', 'aaaaaaa', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2023-11-21 17:15:58', '2023-11-21 17:15:58', 70648223, NULL),
(13, 'email novo', 'emailnovo', 'e10adc3949ba59abbe56e057f20f883e', '203456789101112', '2023-11-21 18:16:19', '2023-11-21 19:37:15', 70648223, 12345),
(16, 'BBBB', 'abcde', 'e10adc3949ba59abbe56e057f20f883e', 'aaa', '2023-11-21 18:22:11', '2023-11-21 18:31:47', 2147483642, 32),
(17, 'aaa', '222', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2023-11-21 19:13:36', '2023-11-21 19:13:36', 141421, NULL),
(21, '111', 'excluir', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2023-11-21 22:25:15', '2023-11-21 22:25:15', 54362354, NULL),
(23, '5621', 'generico', 'caf1a3dfb505ffed0d024130f58c5cfa', 'rwfwq', '2023-11-21 22:31:58', '2023-11-21 23:33:31', 1345123, 89);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb7_cupons`
--

CREATE TABLE `tb7_cupons` (
  `PK_CuponID` int(11) NOT NULL,
  `TX_CodigoCupon` varchar(50) NOT NULL,
  `NR_Desconto` decimal(5,2) NOT NULL,
  `DT_Validade` date NOT NULL,
  `DT_CriadoEm` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb7_cupons`
--

INSERT INTO `tb7_cupons` (`PK_CuponID`, `TX_CodigoCupon`, `NR_Desconto`, `DT_Validade`, `DT_CriadoEm`) VALUES
(1, 'MOLINA10', 10.00, '2023-11-30', '2023-11-22 00:12:23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb8_estoque`
--

CREATE TABLE `tb8_estoque` (
  `PK_EstoqueID` int(11) NOT NULL,
  `FK_ProdutoID` int(11) NOT NULL,
  `NR_Quantidade` int(11) NOT NULL,
  `DT_UltimaAtualizacao` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb15_produtos`
--

CREATE TABLE `tb15_produtos` (
  `PK_ProdutoID` int(11) NOT NULL,
  `TX_Nome` varchar(255) NOT NULL,
  `TX_Descricao` text DEFAULT NULL,
  `NR_Preco` decimal(10,2) NOT NULL,
  `NR_Estoque` int(11) NOT NULL,
  `FK_CategoriaID` int(11) NOT NULL,
  `DT_CriadoEm` timestamp NULL DEFAULT current_timestamp(),
  `DT_AtualizadoEm` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TX_CaminhoImagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb15_produtos`
--

INSERT INTO `tb15_produtos` (`PK_ProdutoID`, `TX_Nome`, `TX_Descricao`, `NR_Preco`, `NR_Estoque`, `FK_CategoriaID`, `DT_CriadoEm`, `DT_AtualizadoEm`, `TX_CaminhoImagem`) VALUES
(1, 'Blusa BH Verde Claro', 'Blusa BH Verde Claro', 200.00, 1, 1, '2023-11-01 02:21:39', '2023-11-22 01:27:43', 'img/Trico-BH-VerdeClaro_1.jpg'),
(2, 'Vestido Longo Marrom', 'Vestido Longo Marrom', 400.00, 2, 2, '2023-11-01 02:22:26', '2023-11-22 01:29:43', 'img/Trico-Boston-Marrom_1.jpg'),
(3, 'Vestido Preto e Branco', 'Vestido Preto e Branco', 450.00, 3, 2, '2023-11-01 03:08:33', '2023-11-22 01:30:50', 'img/Trico-Budapeste-BrancoPreto_1.jpg'),
(4, 'Vestido Caramelo e Preto', 'Vestido Caramelo e Preto', 450.00, 1, 2, '2023-11-22 01:32:13', '2023-11-22 01:32:13', 'img/Trico-Budapeste-CarameloPreto_1.jpg'),
(5, 'Blusa Manga Comprida Verde Escura', 'Blusa Manga Comprida Verde Escura', 200.00, 0, 1, '2023-11-22 01:33:24', '2023-11-22 02:05:39', 'img/Trico-Londres-VerdeEsc_1.jpg'),
(6, 'Blusa Manga Comprida Areia Claro', 'Blusa Manga Comprida Areia Claro', 300.00, 0, 1, '2023-11-22 01:34:40', '2023-11-22 01:34:40', 'img/Trico-Paris-AreiaClaro_1.jpg'),
(7, 'Vestido Pink Neon', 'Vestido Pink Neon', 350.00, 0, 2, '2023-11-22 01:53:32', '2023-11-22 01:53:32', 'img/Trico-Milao-PinkNeon_1.jpg'),
(8, 'Blusa Manga Comprida Preta', NULL, 400.00, 0, 1, '2023-11-22 01:54:35', '2023-11-22 01:54:35', 'img/Trico-Paris-Preto_3.jpg'),
(9, 'Blusa Manga Curta Vermelha', 'Blusa Manga Curta Vermelha', 300.00, 0, 1, '2023-11-22 01:55:20', '2023-11-22 01:55:20', 'img/Trico-Pequim-Vermelho_1.jpg'),
(10, 'Blusa Manga Curta Branca', 'Blusa Manga Curta Branca', 300.00, 0, 1, '2023-11-22 01:55:59', '2023-11-22 01:55:59', 'img/Trico-Pequim-Branco_2.jpg'),
(11, 'Cinto Cores Diversas', 'Cinto Cores Diversas', 170.00, 0, 4, '2023-11-22 01:56:42', '2023-11-22 01:56:42', 'img/Cinto-Brasil_4.jpg'),
(12, 'Casaco Azul Marinho', 'Casaco Azul Marinho', 400.00, 0, 3, '2023-11-22 01:57:21', '2023-11-22 01:57:21', 'img/Trico-Petropolis-AzulMarinho_2.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb2_carrinhosalvo`
--
ALTER TABLE `tb2_carrinhosalvo`
  ADD PRIMARY KEY (`PK_CarrinhoSalvoID`),
  ADD KEY `FK_ClienteID` (`FK_ClienteID`);

--
-- Índices de tabela `tb3_categorias`
--
ALTER TABLE `tb3_categorias`
  ADD PRIMARY KEY (`PK_CategoriaID`);

--
-- Índices de tabela `tb4_clientes`
--
ALTER TABLE `tb4_clientes`
  ADD PRIMARY KEY (`PK_ClienteID`),
  ADD UNIQUE KEY `TX_Email` (`TX_Email`);

--
-- Índices de tabela `tb7_cupons`
--
ALTER TABLE `tb7_cupons`
  ADD PRIMARY KEY (`PK_CuponID`),
  ADD UNIQUE KEY `TX_CodigoCupon` (`TX_CodigoCupon`);

--
-- Índices de tabela `tb8_estoque`
--
ALTER TABLE `tb8_estoque`
  ADD PRIMARY KEY (`PK_EstoqueID`),
  ADD KEY `FK_ProdutoID` (`FK_ProdutoID`);

--
-- Índices de tabela `tb15_produtos`
--
ALTER TABLE `tb15_produtos`
  ADD PRIMARY KEY (`PK_ProdutoID`),
  ADD KEY `FK_CategoriaID` (`FK_CategoriaID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb2_carrinhosalvo`
--
ALTER TABLE `tb2_carrinhosalvo`
  MODIFY `PK_CarrinhoSalvoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb3_categorias`
--
ALTER TABLE `tb3_categorias`
  MODIFY `PK_CategoriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb4_clientes`
--
ALTER TABLE `tb4_clientes`
  MODIFY `PK_ClienteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `tb7_cupons`
--
ALTER TABLE `tb7_cupons`
  MODIFY `PK_CuponID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb8_estoque`
--
ALTER TABLE `tb8_estoque`
  MODIFY `PK_EstoqueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb15_produtos`
--
ALTER TABLE `tb15_produtos`
  MODIFY `PK_ProdutoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb2_carrinhosalvo`
--
ALTER TABLE `tb2_carrinhosalvo`
  ADD CONSTRAINT `tb2_carrinhosalvo_ibfk_1` FOREIGN KEY (`FK_ClienteID`) REFERENCES `tb4_clientes` (`PK_ClienteID`);

--
-- Restrições para tabelas `tb8_estoque`
--
ALTER TABLE `tb8_estoque`
  ADD CONSTRAINT `tb8_estoque_ibfk_1` FOREIGN KEY (`FK_ProdutoID`) REFERENCES `tb15_produtos` (`PK_ProdutoID`);

--
-- Restrições para tabelas `tb15_produtos`
--
ALTER TABLE `tb15_produtos`
  ADD CONSTRAINT `tb15_produtos_ibfk_1` FOREIGN KEY (`FK_CategoriaID`) REFERENCES `tb3_categorias` (`PK_CategoriaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
