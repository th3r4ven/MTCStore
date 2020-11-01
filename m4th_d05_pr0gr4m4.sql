-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 20-Mar-2020 às 18:49
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m4th_d05_pr0gr4m4`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `m4th_5ubc4t3g0r145`
--

DROP TABLE IF EXISTS `m4th_5ubc4t3g0r145`;
CREATE TABLE IF NOT EXISTS `m4th_5ubc4t3g0r145` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subdescricao` varchar(50) DEFAULT NULL,
  `id_categoria_pai` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descricao` (`subdescricao`),
  KEY `id_categoria_pai` (`id_categoria_pai`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `m4th_5ubc4t3g0r145`
--

INSERT INTO `m4th_5ubc4t3g0r145` (`id`, `subdescricao`, `id_categoria_pai`) VALUES
(1, 'Sem+sub-categoria', 1),
(2, 'Camisa+Polo', 2),
(3, 'Camisa+Simples', 2),
(4, 'Cal%C3%A7a+Jeans', 3),
(5, 'Cal%C3%A7a+Jogger', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `m4th_c4t3g0r145`
--

DROP TABLE IF EXISTS `m4th_c4t3g0r145`;
CREATE TABLE IF NOT EXISTS `m4th_c4t3g0r145` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descricao` (`descricao`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `m4th_c4t3g0r145`
--

INSERT INTO `m4th_c4t3g0r145` (`id`, `descricao`) VALUES
(1, 'Sem+categoria'),
(2, 'Camisetas'),
(3, 'Cal%C3%A7as'),
(4, 'Kit+mistos'),
(5, '%C3%93culos+de+sol');

-- --------------------------------------------------------

--
-- Estrutura da tabela `m4th_cl13nt35`
--

DROP TABLE IF EXISTS `m4th_cl13nt35`;
CREATE TABLE IF NOT EXISTS `m4th_cl13nt35` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `data_nascimento` varchar(14) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero` int(11) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT 'Cliente',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `m4th_cl13nt35`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `m4th_cup0n5`
--

DROP TABLE IF EXISTS `m4th_cup0n5`;
CREATE TABLE IF NOT EXISTS `m4th_cup0n5` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_cupon` varchar(30) NOT NULL,
  `porcentagem_desconto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_cupon` (`codigo_cupon`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `m4th_cup0n5`
--

INSERT INTO `m4th_cup0n5` (`id`, `codigo_cupon`, `porcentagem_desconto`) VALUES
(1, '15OFF', 15),
(2, '5OFF', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `m4th_p3d1d05`
--

DROP TABLE IF EXISTS `m4th_p3d1d05`;
CREATE TABLE IF NOT EXISTS `m4th_p3d1d05` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `entrega_total` decimal(10,2) NOT NULL,
  `status_pedido` varchar(20) DEFAULT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `orderNote` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `m4th_p3d1d05_d3t41l`
--

DROP TABLE IF EXISTS `m4th_p3d1d05_d3t41l`;
CREATE TABLE IF NOT EXISTS `m4th_p3d1d05_d3t41l` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `entrega` decimal(10,2) NOT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pedido` (`id_pedido`),
  KEY `id_produto` (`id_produto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `m4th_pr0dut05`
--

DROP TABLE IF EXISTS `m4th_pr0dut05`;
CREATE TABLE IF NOT EXISTS `m4th_pr0dut05` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descricaoBreve` varchar(500) NOT NULL,
  `descricaoProd` varchar(5000) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `preco_promo` decimal(10,2) DEFAULT NULL,
  `estoque` int(11) NOT NULL,
  `cupom` tinyint(1) NOT NULL,
  `destaque` tinyint(1) NOT NULL,
  `sku_ean` int(11) DEFAULT NULL,
  `marca` varchar(50) NOT NULL,
  `medidas` varchar(50) NOT NULL,
  `imagens` varchar(500) NOT NULL,
  `entrega` tinyint(1) NOT NULL,
  `id_variacao` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_sub_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `titulo` (`titulo`),
  UNIQUE KEY `sku_ean` (`sku_ean`),
  KEY `id_variacao` (`id_variacao`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_sub_categoria` (`id_sub_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `m4th_pr0dut05`
--

INSERT INTO `m4th_pr0dut05` (`id`, `titulo`, `descricaoBreve`, `descricaoProd`, `preco`, `preco_promo`, `estoque`, `cupom`, `destaque`, `sku_ean`, `marca`, `medidas`, `imagens`, `entrega`, `id_variacao`, `id_categoria`, `id_sub_categoria`) VALUES
(1, 'Kit+com+3+camisas+Vira+Lata+Originais+em+tecido+Piquet+%E2%80%93+Frete+Gr%C3%A1tis', 'Camisa+Polo+Vira+Lata%2C+%C3%A9+praticamente+um+cl%C3%A1ssico+que+n%C3%A3o+pode+faltar+no+vestu%C3%A1rio+Masculino%2C+podendo+ser+usado+como+estilo+casual+e+chique+para+diversas+ocasi%C3%B5es%2C+al%C3%A9m+disso+%C3%A9+o+tipo+de+pe%C3%A7a+que+nunca+sai+de+moda.', 'A+Polo+VIRA+LATA+%C3%A9+aquele+modelo+que+te+deixa+pronto+para+sair+sem+precisar+pensar+muito+na+roupa%2C+de+forma+r%C3%A1pida%2C+pr%C3%A1tica+e+confort%C3%A1vel%2C+voc%C3%AA+consegue+um+visual+com+estilo+e+eleg%C3%A2ncia+de+acordo+com+a+ocasi%C3%A3o.+Pode+ser+combinada+facilmente+com+bermudas%2C+shorts+e+cal%C3%A7as+jeans.Mostre+personalidade+por+meio+do+seu+estilo.%3Cbr%3E%3Cbr%3E%0A%0APor+gen%C3%AAro+---+Masculino%3Cbr%3E%0AMarca+---+Vira+Lata+Wear%3Cbr%3E%0APor+Tipo%2FCole%C3%A7%C3%A3o+---+Camisa+Polo%3Cbr%3E%0AMaterial+---+Malha+Piquet%3Cbr%3E%0ACores+---+Cores+sortidas+e+sem+op%C3%A7%C3%A3o+de+escolha%3Cbr%3E%0AItens+Inclusos+---+3+Camisa+Polo%3Cbr%3E%0AGarantia+---+7+Dias+para+defeito+de+fabrica%C3%A7%C3%A3o%3Cbr%3E%3Cbr%3E%0A%0A---+Medidas+---%3Cbr%3E%0AP++++---+62+X+50%3Cbr%3E%0AM+++---+66+X+52%3Cbr%3E%0AG++++---+70+X+54%3Cbr%3E%0AGG+---+71+X+58%3Cbr%3E', '199.00', '139.00', 500, 1, 0, 250, 'Vira+Lata+Wear', '3%3B30%3B28%3B0.800', 'http%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fkit03-polo.png%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fpolo-preta.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fpolo-vermelha.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fpolo-branca.jpg%3B', 1, 6, 2, 2),
(2, 'Kit+com+5+camisas+Vira+Lata+Originais+em+tecido+Piquet+%E2%80%93+Frete+Gr%C3%A1tis', 'Camisa+Polo+Vira+Lata%2C+%C3%A9+praticamente+um+cl%C3%A1ssico+que+n%C3%A3o+pode+faltar+no+vestu%C3%A1rio+Masculino%2C+podendo+ser+usado+como+estilo+casual+e+chique+para+diversas+ocasi%C3%B5es%2C+al%C3%A9m+disso+%C3%A9+o+tipo+de+pe%C3%A7a+que+nunca+sai+de+moda.', 'A+Polo+VIRA+LATA+%C3%A9+aquele+modelo+que+te+deixa+pronto+para+sair+sem+precisar+pensar+muito+na+roupa%2C+de+forma+r%C3%A1pida%2C+pr%C3%A1tica+e+confort%C3%A1vel%2C+voc%C3%AA+consegue+um+visual+com+estilo+e+eleg%C3%A2ncia+de+acordo+com+a+ocasi%C3%A3o.+Pode+ser+combinada+facilmente+com+bermudas%2C+shorts+e+cal%C3%A7as+jeans.Mostre+personalidade+por+meio+do+seu+estilo.%3Cbr%3E%3Cbr%3E%0A%0APor+gen%C3%AAro+---+Masculino%3Cbr%3E%0AMarca+---+Vira+Lata+Wear%3Cbr%3E%0APor+Tipo%2FCole%C3%A7%C3%A3o+---+Camisa+Polo%3Cbr%3E%0AMaterial+---+Malha+Piquet%3Cbr%3E%0ACores+---+Cores+sortidas+e+sem+op%C3%A7%C3%A3o+de+escolha%3Cbr%3E%0AItens+Inclusos+---+5+Camisa+Polo%3Cbr%3E%0AGarantia+---+7+Dias+para+defeito+de+fabrica%C3%A7%C3%A3o%3Cbr%3E%3Cbr%3E%0A%0A---+Medidas+---%3Cbr%3E%0AP++++---+62+X+50%3Cbr%3E%0AM+++---+66+X+52%3Cbr%3E%0AG++++---+70+X+54%3Cbr%3E%0AGG+---+71+X+58%3Cbr%3E', '299.00', '189.00', 500, 1, 0, 993, 'Vira+Lata+Wear', '5%3B30%3B28%3B1.350', 'http%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fkit05.png%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fpolo-azul.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fpolo-vermelha.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fpolo-preta.jpg%3B', 1, 6, 2, 2),
(3, 'Kit+com+10+camisas+Vira+Lata+Originais+em+tecido+Piquet+%E2%80%93+Frete+Gr%C3%A1tis', 'Camisa+Polo+Vira+Lata%2C+%C3%A9+praticamente+um+cl%C3%A1ssico+que+n%C3%A3o+pode+faltar+no+vestu%C3%A1rio+Masculino%2C+podendo+ser+usado+como+estilo+casual+e+chique+para+diversas+ocasi%C3%B5es%2C+al%C3%A9m+disso+%C3%A9+o+tipo+de+pe%C3%A7a+que+nunca+sai+de+moda.', 'A+Polo+VIRA+LATA+%C3%A9+aquele+modelo+que+te+deixa+pronto+para+sair+sem+precisar+pensar+muito+na+roupa%2C+de+forma+r%C3%A1pida%2C+pr%C3%A1tica+e+confort%C3%A1vel%2C+voc%C3%AA+consegue+um+visual+com+estilo+e+eleg%C3%A2ncia+de+acordo+com+a+ocasi%C3%A3o.+Pode+ser+combinada+facilmente+com+bermudas%2C+shorts+e+cal%C3%A7as+jeans.Mostre+personalidade+por+meio+do+seu+estilo.%3Cbr%3E%3Cbr%3E%0A%0APor+gen%C3%AAro+---+Masculino%3Cbr%3E%0AMarca+---+Vira+Lata+Wear%3Cbr%3E%0APor+Tipo%2FCole%C3%A7%C3%A3o+---+Camisa+Polo%3Cbr%3E%0AMaterial+---+Malha+Piquet%3Cbr%3E%0ACores+---+Cores+sortidas+e+sem+op%C3%A7%C3%A3o+de+escolha%3Cbr%3E%0AItens+Inclusos+---+10+Camisa+Polo%3Cbr%3E%0AGarantia+---+7+Dias+para+defeito+de+fabrica%C3%A7%C3%A3o%3Cbr%3E%3Cbr%3E%0A%0A---+Medidas+---%3Cbr%3E%0AP++++---+62+X+50%3Cbr%3E%0AM+++---+66+X+52%3Cbr%3E%0AG++++---+70+X+54%3Cbr%3E%0AGG+---+71+X+58%3Cbr%3E', '599.00', '299.90', 500, 1, 1, 1042, 'Vira+Lata+Wear', '10%3B30%3B28%3B2%2C500', 'http%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fkit10.png%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fpolo-preta.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fpolo-branca.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fpolo-azul.jpg%3B', 1, 6, 2, 2),
(4, 'Kit+com+3+camisetas+Vira+Lata+Originais+Algod%C3%A3o+%E2%80%93+Frete+Gr%C3%A1tis', 'Camiseta+em+Fio+Penteado+30.1+Vira+Lata+%C3%A9+uma+pe%C3%A7a+de+roupa+que+n%C3%A3o+pode+faltar+no+vestu%C3%A1rio+Masculino%2C+%C3%A9+vers%C3%A1til+e+pode+ser+usada+em+diversas+ocasi%C3%B5es.', 'Camiseta+em+Fio+Penteado+30.1+%C3%A9+uma+pe%C3%A7a+de+roupa+que+n%C3%A3o+pode+faltar+no+vestu%C3%A1rio+Masculino%2C+%C3%A9+vers%C3%A1til+e+pode+ser+usada+em+diversas+ocasi%C3%B5es.+A+camiseta+VIRA+LATA+%C3%A9+aquele+modelo+que+te+deixa+pronto+para+sair+sem+precisar+pensar+muito+na+roupa%2C+de+forma+r%C3%A1pida%2C+pr%C3%A1tica+e+confort%C3%A1vel%2C+voc%C3%AA+consegue+um+visual+casual+e+estiloso.+Pode+ser+combinada+facilmente+com+bermudas%2C+shorts+e+cal%C3%A7as+jeans.+Mostre+personalidade+por+meio+do+seu+estilo.%3Cbr%3E%3Cbr%3E%0A%0APor+g%C3%AAnero+---+Masculino%3Cbr%3E%0AMarca+--+Vira+Lata%3Cbr%3E%0APor+tipo%2Fcole%C3%A7%C3%A3o+---+Camiseta+casual%3Cbr%3E%0AMaterial+--+Fio+Penteado+30.1%3Cbr%3E%0ACores+---+Cores+sortidas+sem+op%C3%A7%C3%A3o+de+escolha%2A%3Cbr%3E%0AItens+inclusos+---+3+Camisetas%3Cbr%3E%0AGarantia%097+Dias+para+defeito+de+fabrica%C3%A7%C3%A3o%3Cbr%3E%3Cbr%3E%0A%0A%2AAlgumas+cores+podem+se+repetir.%3Cbr%3E', '189.90', '109.90', 500, 1, 0, 3129, 'Vira+Lata+Wear', '2%3B30%3B28%3B0%2C750', 'http%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2FKIT-3-2.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fa-5.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fa-10.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fa-3.jpg%3B', 1, 2, 2, 3),
(5, 'Kit+com+5+camisetas+Vira+Lata+Originais+Algod%C3%A3o+%E2%80%93+Frete+Gr%C3%A1tis', 'Camiseta+em+Fio+Penteado+30.1+Vira+Lata+%C3%A9+uma+pe%C3%A7a+de+roupa+que+n%C3%A3o+pode+faltar+no+vestu%C3%A1rio+Masculino%2C+%C3%A9+vers%C3%A1til+e+pode+ser+usada+em+diversas+ocasi%C3%B5es.', 'Camiseta+em+Fio+Penteado+30.1+%C3%A9+uma+pe%C3%A7a+de+roupa+que+n%C3%A3o+pode+faltar+no+vestu%C3%A1rio+Masculino%2C+%C3%A9+vers%C3%A1til+e+pode+ser+usada+em+diversas+ocasi%C3%B5es.+A+camiseta+VIRA+LATA+%C3%A9+aquele+modelo+que+te+deixa+pronto+para+sair+sem+precisar+pensar+muito+na+roupa%2C+de+forma+r%C3%A1pida%2C+pr%C3%A1tica+e+confort%C3%A1vel%2C+voc%C3%AA+consegue+um+visual+casual+e+estiloso.+Pode+ser+combinada+facilmente+com+bermudas%2C+shorts+e+cal%C3%A7as+jeans.+Mostre+personalidade+por+meio+do+seu+estilo.%3Cbr%3E%3Cbr%3E%0A%0APor+g%C3%AAnero+---+Masculino%3Cbr%3E%0AMarca+--+Vira+Lata%3Cbr%3E%0APor+tipo%2Fcole%C3%A7%C3%A3o+---+Camiseta+casual%3Cbr%3E%0AMaterial+--+Fio+Penteado+30.1%3Cbr%3E%0ACores+---+Cores+sortidas+sem+op%C3%A7%C3%A3o+de+escolha%2A%3Cbr%3E%0AItens+inclusos+---+5+Camisetas%3Cbr%3E%0AGarantia%097+Dias+para+defeito+de+fabrica%C3%A7%C3%A3o%3Cbr%3E%0A%0A%2AAlgumas+cores+podem+se+repetir.%3Cbr%3E', '289.90', '169.90', 500, 1, 0, 3051, 'Vira+Lata+Wear', '3.5%3B30%3B28%3B1', 'http%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2FKIT-5-1.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fa-4.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fa-10.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fa-3.jpg%3B', 1, 2, 2, 3),
(6, 'Kit+com+10+camisetas+Vira+Lata+Originais+Algod%C3%A3o+%E2%80%93+Frete+Gr%C3%A1tis', 'Camiseta+em+Fio+Penteado+30.1+Vira+Lata+%C3%A9+uma+pe%C3%A7a+de+roupa+que+n%C3%A3o+pode+faltar+no+vestu%C3%A1rio+Masculino%2C+%C3%A9+vers%C3%A1til+e+pode+ser+usada+em+diversas+ocasi%C3%B5es.', 'Camiseta+em+Fio+Penteado+30.1+%C3%A9+uma+pe%C3%A7a+de+roupa+que+n%C3%A3o+pode+faltar+no+vestu%C3%A1rio+Masculino%2C+%C3%A9+vers%C3%A1til+e+pode+ser+usada+em+diversas+ocasi%C3%B5es.+A+camiseta+VIRA+LATA+%C3%A9+aquele+modelo+que+te+deixa+pronto+para+sair+sem+precisar+pensar+muito+na+roupa%2C+de+forma+r%C3%A1pida%2C+pr%C3%A1tica+e+confort%C3%A1vel%2C+voc%C3%AA+consegue+um+visual+casual+e+estiloso.+Pode+ser+combinada+facilmente+com+bermudas%2C+shorts+e+cal%C3%A7as+jeans.+Mostre+personalidade+por+meio+do+seu+estilo.%3Cbr%3E%3Cbr%3E%0A%0APor+g%C3%AAnero+---+Masculino%3Cbr%3E%0AMarca+--+Vira+Lata%3Cbr%3E%0APor+tipo%2Fcole%C3%A7%C3%A3o+---+Camiseta+casual%3Cbr%3E%0AMaterial+--+Fio+Penteado+30.1%3Cbr%3E%0ACores+---+Cores+sortidas+sem+op%C3%A7%C3%A3o+de+escolha%2A%3Cbr%3E%0AItens+inclusos+---+10+Camisetas%3Cbr%3E%0AGarantia%097+Dias+para+defeito+de+fabrica%C3%A7%C3%A3o%3Cbr%3E%0A%0A%2AAlgumas+cores+podem+se+repetir.%3Cbr%3E', '389.90', '279.90', 500, 1, 1, 3105, 'Vira+Lata+Wear', '7%3B30%3B28%3B2', 'http%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2FKIT-10-2.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fa-9.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fa-10.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fa-5.jpg%3B', 1, 2, 2, 3),
(7, 'Super+kit+2+camisa+polo+%2B+2+cal%C3%A7a+jeans+Vira+lata+wear', 'Camisa+Polo+Vira+Lata+Wear%2C+%C3%A9+praticamente+um+cl%C3%A1ssico+que+n%C3%A3o+pode+faltar+no+vestu%C3%A1rio+Masculino%2C+podendo+ser+usado+como+estilo+casual+e+chique+para+diversas+ocasi%C3%B5es%2C+al%C3%A9m+disso+%C3%A9+o+tipo+de+pe%C3%A7a+que+nunca+sai+de+moda.', 'Camisa+Polo+Vira+Lata+Wear%2C+%C3%A9+praticamente+um+cl%C3%A1ssico+que+n%C3%A3o+pode+faltar+no+vestu%C3%A1rio+Masculino%2C+podendo+ser+usado+como+estilo+casual+e+chique+para+diversas+ocasi%C3%B5es%2C+al%C3%A9m+disso+%C3%A9+o+tipo+de+pe%C3%A7a+que+nunca+sai+de+moda.%3Cbr%3E%3Cbr%3E%0A%0AA+Polo+VIRA+LATA+%C3%A9+aquele+modelo+que+te+deixa+pronto+para+sair+sem+precisar+pensar+muito+na+roupa%2C+de+forma+r%C3%A1pida%2C+pr%C3%A1tica+e+confort%C3%A1vel%2C+voc%C3%AA+consegue+um+visual+com+estilo+e+eleg%C3%A2ncia+de+acordo+com+a+ocasi%C3%A3o.+Pode+ser+combinada+facilmente+com+bermudas%2C+shorts+e+cal%C3%A7as+jeans.Mostre+personalidade+por+meio+do+seu+estilo.%3Cbr%3E%3Cbr%3E%0A%0APor+g%C3%AAnero+---+Masculino%3Cbr%3E%0AMarca+---+Vira+Lata%3Cbr%3E%0APor+tipo%2Fcole%C3%A7%C3%A3o+---+Kit+Super+camisa+polo+%2B+Jeans%3Cbr%3E%0AMaterial+---+Malha+piquet+%2B+Jeans%3Cbr%3E%0ACor+variadas%3Cbr%3E%0AItens+inclusos+---+2+Camisas+Polo+%2B+2+Cal%C3%A7as+jeans+Vira+Lata%3Cbr%3E%0AGarantia+---+7+Dias+para+defeito+de+fabrica%C3%A7%C3%A3o%3Cbr%3E%0A', '389.90', '189.90', 500, 1, 1, 1791, 'Vira+Lata+Wear', '10%3B30%3B28%3B1%2C200', 'http%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fkitcalca.png%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fjeans-1.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fpolo-preta.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fjeans-6.jpg%3B', 1, 7, 4, 1),
(8, 'Kit+03+Cal%C3%A7as+Jeans+Vira+Lata', 'A+Cal%C3%A7a+Jeans++Vira+Lata+%C3%A9+confeccionada+em+tecido+de+alta+qualidade+para+juntar+a+durabilidade%2C+conforto+e+estilo+em+uma+%C3%BAnica+pe%C3%A7a.+Os+Jeans+possuem+qualidade+premium+e+acabamento+perfeito+com+garantia+Vira+Lata.', 'A+Cal%C3%A7a+Jeans++Vira+Lata+%C3%A9+confeccionada+em+tecido+de+alta+qualidade+para+juntar+a+durabilidade%2C+conforto+e+estilo+em+uma+%C3%BAnica+pe%C3%A7a.+Os+Jeans+possuem+qualidade+premium+e+acabamento+perfeito+com+garantia+Vira+Lata.%3Cbr%3E%3Cbr%3E%0A%0APor+g%C3%AAnero+---+Unissex%3Cbr%3E%0AMaterial+Principal+---+Jeans%3Cbr%3E%0AMarca+---+Vira+Lata+Wear%3Cbr%3E%0ATipo+da+Cintura+--+Cintura+m%C3%A9dia%3Cbr%3E%0ACorte+da+cal%C3%A7a+---+Slim+Fit%3Cbr%3E%0ATemporada+de+lan%C3%A7amento+---+Primavera%2FVer%C3%A3o%3Cbr%3E%0APor+tipo%2Fcole%C3%A7%C3%A3o+---+Kit+Jeans%3Cbr%3E%0AItens+inclusos+---+03+Cal%C3%A7as+jeans+Variadas%3Cbr%3E%0AGaratia+---+7+Dias+contra+defeito+de+fabrica%C3%A7%C3%A3o%3Cbr%3E', '327.00', '199.00', 500, 1, 0, 5294, 'Vira+Lata+Wear', '7%3B15%3B30%3B1', 'http%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2FWhatsApp-Image-2019-11-28-at-15.43.48.jpeg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fjeans-5.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fjeans-6.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fjeans-4.jpg%3B', 1, 3, 3, 4),
(9, 'Kit+05+Cal%C3%A7as+Jeans+Vira+Lata', 'A+Cal%C3%A7a+Jeans++Vira+Lata+%C3%A9+confeccionada+em+tecido+de+alta+qualidade+para+juntar+a+durabilidade%2C+conforto+e+estilo+em+uma+%C3%BAnica+pe%C3%A7a.+Os+Jeans+possuem+qualidade+premium+e+acabamento+perfeito+com+garantia+Vira+Lata.', 'A+Cal%C3%A7a+Jeans++Vira+Lata+%C3%A9+confeccionada+em+tecido+de+alta+qualidade+para+juntar+a+durabilidade%2C+conforto+e+estilo+em+uma+%C3%BAnica+pe%C3%A7a.+Os+Jeans+possuem+qualidade+premium+e+acabamento+perfeito+com+garantia+Vira+Lata.%3Cbr%3E%3Cbr%3E%0A%0APor+g%C3%AAnero+---+Unissex%3Cbr%3E%0AMaterial+Principal+---+Jeans%3Cbr%3E%0AMarca+---+Vira+Lata+Wear%3Cbr%3E%0ATipo+da+Cintura+--+Cintura+m%C3%A9dia%3Cbr%3E%0ACorte+da+cal%C3%A7a+---+Slim+Fit%3Cbr%3E%0ATemporada+de+lan%C3%A7amento+---+Primavera%2FVer%C3%A3o%3Cbr%3E%0APor+tipo%2Fcole%C3%A7%C3%A3o+---+Kit+Jeans%3Cbr%3E%0AItens+inclusos+---+05+Cal%C3%A7as+jeans+Variadas%3Cbr%3E%0AGaratia+---+7+Dias+contra+defeito+de+fabrica%C3%A7%C3%A3o%3Cbr%3E', '545.00', '299.00', 500, 1, 0, 6584, 'Vira+Lata+Wear', '7%3B15%3B30%3B2', 'http%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2FWhatsApp-Image-2019-11-28-at-15.43.47-1.jpeg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fjeans-6.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fjeans-5.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fjeans-1.jpg%3B', 1, 3, 3, 4),
(10, 'Kit+10+Cal%C3%A7as+Jeans+Vira+Lata', 'A+Cal%C3%A7a+Jeans++Vira+Lata+%C3%A9+confeccionada+em+tecido+de+alta+qualidade+para+juntar+a+durabilidade%2C+conforto+e+estilo+em+uma+%C3%BAnica+pe%C3%A7a.+Os+Jeans+possuem+qualidade+premium+e+acabamento+perfeito+com+garantia+Vira+Lata.', 'A+Cal%C3%A7a+Jeans++Vira+Lata+%C3%A9+confeccionada+em+tecido+de+alta+qualidade+para+juntar+a+durabilidade%2C+conforto+e+estilo+em+uma+%C3%BAnica+pe%C3%A7a.+Os+Jeans+possuem+qualidade+premium+e+acabamento+perfeito+com+garantia+Vira+Lata.%3Cbr%3E%0A%0APor+g%C3%AAnero+---+Unissex%3Cbr%3E%0AMaterial+Principal+---+Jeans%3Cbr%3E%0AMarca+---+Vira+Lata+Wear%3Cbr%0ATipo+da+Cintura+--+Cintura+m%C3%A9dia%3Cbr%0ACorte+da+cal%C3%A7a+---+Slim+Fit%3Cbr%3E%0ATemporada+de+lan%C3%A7amento+---+Primavera%2FVer%C3%A3o%3Cbr%3E%0APor+tipo%2Fcole%C3%A7%C3%A3o+---+Kit+Jeans%3Cbr%3E%0AItens+inclusos+---+10+Cal%C3%A7as+jeans+Variadas%3Cbr%3E%0AGaratia+---+7+Dias+contra+defeito+de+fabrica%C3%A7%C3%A3o%3Cbr%3E', '1090.00', '499.10', 50, 1, 1, 684658, 'Vira+Lata+Wear', '10%3B15%3B30%3B5', 'http%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2FWhatsApp-Image-2019-11-28-at-15.43.47.jpeg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fjeans-2.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fjeans-1.jpg%3Bhttp%3A%2F%2Flocalhost%2Fsite%2Fassets%2Fimages%2Fjeans-5.jpg%3B', 1, 3, 3, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `m4th_usu4r105`
--

DROP TABLE IF EXISTS `m4th_usu4r105`;
CREATE TABLE IF NOT EXISTS `m4th_usu4r105` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `senha` varchar(75) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `m4th_usu4r105`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `m4th_v4r14c40`
--

DROP TABLE IF EXISTS `m4th_v4r14c40`;
CREATE TABLE IF NOT EXISTS `m4th_v4r14c40` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `tipos` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `m4th_v4r14c40`
--

INSERT INTO `m4th_v4r14c40` (`id`, `nome`, `tipos`) VALUES
(1, 'Sem+varia%C3%A7%C3%A3o', ''),
(2, 'Tamanho+Fio+penteado', 'P%7CM%7CG%7CGG'),
(3, 'Tamanho+Cal%C3%A7a', '38%7C40%7C42%7C44%7C46%7C48'),
(4, 'Voltagem', '110+V%7C220+V'),
(5, 'Cor', 'Branco%7CAzul%7CVermelho'),
(6, 'Tamanho+Polo', 'P%7CM%7CG%7CGG'),
(7, 'Camisa+Polo%2FJeans', 'P+38%7CP+40%7CP+42%7CP+44%7CP+46%7CP+48%7C%3Cbr%3EM+38%7CM+40%7CM+42%7CM+44%7CM+46%7CM+48%7C%3Cbr%3EG+38%7CG+40%7CG+42%7CG+44%7CG+46%7CG+48%7C%3Cbr%3EGG+38%7CGG+40%7CGG+42%7CGG+44%7CGG+46%7CGG+48');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
