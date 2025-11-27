-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/11/2025 às 19:25
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hotel`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `nome`, `email`, `telefone`, `cpf`, `senha`) VALUES
(1, 'João Augusto Mergulhão Rosa', 'gutomergr.s@gmail.com', '18996065487', '54471694880', 'guto29-11G'),
(2, 'Villa do Sol', 'v1ll4s0l@gmail.com', '18999999999', '1234567890', 'Adm!n2025'),
(3, 'Ana Luisa', 'Analu@gmail', '11 99785652', '524626520', '1208');

-- --------------------------------------------------------

--
-- Estrutura para tabela `quartos`
--

CREATE TABLE `quartos` (
  `id` int(11) NOT NULL,
  `nome_quarto` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `reserva` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `quartos`
--

INSERT INTO `quartos` (`id`, `nome_quarto`, `descricao`, `img`, `valor`, `reserva`) VALUES
(1, 'Suíte Presidencial', 'Acomodação mais luxuosa e exclusiva do hotel.\r\n            Ampla área com vários ambientes separados: \r\n            Sala de estar.\r\n            Sala de jantar.\r\n            Escritório.\r\n            Closet.\r\n            Cama king size.\r\n            Banheiro com banheira de hidromassagem para duas pessoas.\r\n            Cozinha completa (em alguns casos).\r\n            Varanda com vista panorâmica (opcional).\r\n            Serviços VIP e acesso a lounges exclusivos.\r\n            Projetada para máximo conforto, privacidade e sofisticação.\r\n            Ideal para ocasiões especiais e hóspedes que buscam experiência premium.\r\n', '', 3000.00, NULL),
(2, 'Suíte Master', '  Tamanho: geralmente entre 40 m² e 60 m².\r\n            Ambientes: quarto com cama queen ou king size, sala de estar, varanda e banheiro privativo.\r\n            Comodidades: \r\n                Ar-condicionado.\r\n                TV de tela plana com canais a cabo.\r\n                Frigobar e cofre digital.\r\n                Wi-Fi gratuito.\r\n                Mesa de trabalho e área para refeições.\r\n                Produtos de higiene pessoal gratuitos.\r\n            Exemplos de comodidades adicionais: jacuzzi, sauna, cozinha privativa.\r\n\r\n', '', 3500.00, NULL),
(3, 'Suíte Premium', 'Ambiente espaçoso e elegante.\r\n            Cama king size com roupa de cama de alta qualidade.\r\n            Banheiro privativo com amenities de luxo.\r\n            TV de tela plana com canais a cabo e streaming.\r\n            Ar-condicionado com controle individual.\r\n            Wi-Fi de alta velocidade gratuito.\r\n            Área de estar confortável com poltronas ou sofá.\r\n            Mini bar abastecido.\r\n            Cofre digital para objetos de valor.\r\n            Varanda ou janela panorâmica com vista privilegiada (quando aplicável).\r\n            Serviço de quarto 24 horas.\r\n            Máquina de café expresso ou chaleira elétrica.\r\n            Mesa de trabalho com iluminação adequada.\r\n            Decoração sofisticada e iluminação ambiente ajustável.\r\n            Serviço de limpeza diário.\r\n', '', 990.00, NULL),
(4, 'Suíte Júnior', ' Ambiente confortável e funcional.\r\n            Cama queen size ou king size.\r\n            Banheiro privativo com amenities essenciais.\r\n            TV de tela plana com canais a cabo.\r\n            Ar-condicionado com controle individual.\r\n            Wi-Fi gratuito de alta velocidade.\r\n            Área de estar integrada ao quarto (sofá ou poltrona).\r\n            Mesa de trabalho compacta.\r\n            Cofre digital para pertences pessoais.\r\n            Decoração moderna e aconchegante.\r\n            Serviço de limpeza diário.\r\n            Chá e café disponíveis no quarto.\r\n', '', 550.00, NULL),
(5, 'Suíte Spa', 'Ambiente amplo e relaxante.\r\n            Cama king size com roupa de cama premium.\r\n            Banheiro privativo com banheira de hidromassagem ou jacuzzi.\r\n            Área exclusiva para tratamentos de spa dentro da suíte.\r\n            Sauna ou steam room privativo (em algumas unidades).\r\n            Amenidades de spa de alta qualidade (óleos essenciais, sais de banho, velas aromáticas).\r\n            TV de tela plana com canais a cabo e streaming.\r\n            Ar-condicionado com controle individual.\r\n            Wi-Fi de alta velocidade gratuito.\r\n            Área de estar confortável com sofá ou poltronas.\r\n            Mini bar com opções saudáveis e refrescantes.\r\n            Máquina de café expresso ou chaleira elétrica.\r\n            Serviço de quarto 24 horas.\r\n            Decoração zen com iluminação suave e elementos naturais.\r\n            Serviço de massagens e tratamentos disponíveis sob demanda.\r\n            Varanda ou janela com vista relaxante (quando aplicável).', '', 1000.00, NULL),
(6, 'Suíte econômica', ' Ambiente funcional e confortável.\r\n            Cama queen size ou duas camas de solteiro.\r\n            Banheiro privativo com amenidades básicas.\r\n            TV de tela plana com canais a cabo.\r\n            Ar-condicionado ou ventilador.\r\n            Wi-Fi gratuito.\r\n            Mesa de trabalho simples.\r\n            Armário ou espaço para roupas.\r\n            Serviço de limpeza diário.\r\n            Decoração prática e minimalista.\r\n            Chá e café disponíveis.', '', 500.00, NULL),
(7, 'Suíte Real', 'mbiente extremamente espaçoso e luxuoso.\r\n            Cama king size com roupa de cama de altíssima qualidade.\r\n            Banheiro privativo com banheira de hidromassagem, duchas separadas e amenities de luxo.\r\n            Sala de estar ampla e elegante com móveis sofisticados.\r\n            Sala de jantar privativa.\r\n            TV de tela plana grande com canais a cabo e sistema de som premium.\r\n            Ar-condicionado com controle individual.\r\n            Wi-Fi de alta velocidade gratuito.\r\n            Varanda ou terraço privativo com vista panorâmica (quando disponível).\r\n            Mini bar completo e adega de vinhos.\r\n            Cofre digital para objetos de valor.\r\n            Área de trabalho ampla com iluminação especial.\r\n            Serviço de quarto 24 horas e concierge personalizado.\r\n            Decoração refinada com detalhes em materiais nobres (madeira, mármore, etc.).\r\n            Amenidades exclusivas de spa e beleza.\r\n            Sistema de iluminação ambiente ajustável.\r\n            Serviço de limpeza e arrumação várias vezes ao dia.\r\n\r\n\r\n', '', 3500.00, NULL),
(8, 'Casa de campo', 'Ambiente rústico, acolhedor e espaçoso.\r\n            Construção em madeira, pedra ou materiais naturais.\r\n            Várias suítes com camas queen ou king size.\r\n            Banheiros privativos com amenidades básicas a sofisticadas.\r\n            Sala de estar ampla com lareira ou fogão a lenha.\r\n            Cozinha equipada para uso completo (fogão, geladeira, micro-ondas, utensílios).\r\n            Área externa com jardim, varanda e espaço para churrasco.\r\n            Wi-Fi disponível.\r\n            Área de jantar interna e externa.\r\n            Vista para natureza, montanhas ou campo aberto.\r\n            Espaços para lazer: churrasqueira, rede, piscina (quando aplicável).\r\n            Decoração simples, rústica e aconchegante.\r\n\r\n', '', 1800.00, NULL),
(9, 'Suíte elegante', ' Ambiente sofisticado e refinado.\r\n            Cama king size ou queen size com roupa de cama premium.\r\n            Banheiro privativo com acabamento em mármore e amenities de alta qualidade.\r\n            TV de tela plana com canais a cabo e sistema de som ambiente.\r\n            Ar-condicionado com controle individual.\r\n            Wi-Fi de alta velocidade gratuito.\r\n            Área de estar com poltronas confortáveis e mesa de centro.\r\n            Iluminação suave e decorativa para ambiente acolhedor.\r\n            Cofre digital para pertences pessoais.\r\n            Mini bar bem abastecido.\r\n            Mesa de trabalho elegante com boa iluminação.\r\n            Decoração clássica e atemporal com detalhes em madeira ou tecido sofisticado.\r\n            Serviço de limpeza diário.\r\n            Serviço de quarto 24 horas disponível.\r\n', '', 1900.00, NULL),
(10, 'Suíte mais mais', 'Ambiente ultra espaçoso e exclusivo.\r\n            Cama king size extra larga com lençóis de algodão egípcio e travesseiros de pluma.\r\n            Banheiro de luxo com banheira de hidromassagem, ducha dupla, sauna privativa e amenities de marcas premium.\r\n            Sala de estar ampla com sofá de design, poltronas e lareira moderna.\r\n            Sala de jantar particular com serviço de garçom exclusivo.\r\n            Varanda ou terraço privativo com vista panorâmica deslumbrante.\r\n            Sistema de som surround e TV de última geração com canais a cabo, streaming e controle por voz.\r\n            Ar-condicionado com controle climático individual e purificador de ar.\r\n            Wi-Fi ultra rápido e dedicado.\r\n            Mini bar gourmet com bebidas premium e snacks finos.\r\n            Máquina de café expresso profissional e utensílios para chá.\r\n            Escritório completo com tecnologia de ponta (impressora, scanner, iluminação regulável).            	    Serviço de concierge 24 horas e mordomo particular.\r\n            Decoração sofisticada com obras de arte exclusivas e design personalizado.\r\n            Sistema de iluminação inteligente com diversas opções de ambiente.\r\n            Amenidades exclusivas de spa e cuidados pessoais.\r\n            Segurança reforçada e privacidade total.', '', 10400.00, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `quartos_imagens`
--

CREATE TABLE `quartos_imagens` (
  `id` int(11) NOT NULL,
  `quartos_id` int(11) NOT NULL,
  `caminho_imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `quartos_imagens`
--

INSERT INTO `quartos_imagens` (`id`, `quartos_id`, `caminho_imagem`) VALUES
(9, 1, 'img_6911f0cf2cc4a.png'),
(10, 1, 'img_6911f0cf2d979.jpg'),
(11, 1, 'img_6911f0cf2e70c.png'),
(12, 2, 'img_6911f1583ca98.png'),
(13, 2, 'img_6911f1583d6fc.png'),
(14, 2, 'img_6911f1583e556.png'),
(18, 3, 'img_6911f1e3d3efc.jpg'),
(19, 3, 'img_6911f1e3d4cb7.jpg'),
(20, 3, 'img_6911f1e3d59ea.jpg'),
(21, 4, 'img_6911f23294f4f.jpg'),
(22, 4, 'img_6911f2329652a.png'),
(23, 4, 'img_6911f232970f4.png'),
(24, 5, 'img_6911f265b215b.jpg'),
(25, 5, 'img_6911f265b2cb0.jpg'),
(26, 5, 'img_6911f265b3744.jpg'),
(27, 6, 'img_6911f298aeb31.jpg'),
(28, 6, 'img_6911f298af7eb.jpg'),
(29, 6, 'img_6911f298b02b5.jpg'),
(30, 7, 'img_6911f2dfa215f.png'),
(31, 7, 'img_6911f2dfa2f4d.png'),
(32, 7, 'img_6911f2dfa3a7e.png'),
(33, 8, 'img_6911f32ce7ebe.jpg'),
(34, 8, 'img_6911f32ce8c6e.jpg'),
(35, 8, 'img_6911f32ce9930.jpg'),
(36, 9, 'img_6911f366a131f.png'),
(37, 9, 'img_6911f366a216c.png'),
(38, 9, 'img_6911f366a2e55.png'),
(39, 10, 'img_6911f3ad983f2.png'),
(40, 10, 'img_6911f3ad98ffa.png'),
(41, 10, 'img_6911f3ad99b74.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `data` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_quarto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `data`, `id_usuario`, `id_quarto`) VALUES
(1, '5200-02-15', 2, 1),
(2, '2002-02-15', 2, 2),
(3, '2002-02-15', 2, 2),
(4, '2002-02-15', 2, 2),
(5, '2002-02-15', 2, 2),
(6, '2002-02-15', 2, 2),
(7, '2002-02-15', 2, 2),
(8, '2002-02-15', 2, 2),
(9, '2002-02-15', 2, 2),
(10, '2002-02-15', 2, 2),
(11, '2002-02-15', 2, 2),
(12, '1999-12-07', 2, 5),
(13, '2025-11-24', 3, 10),
(15, '2222-02-15', 2, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices de tabela `quartos`
--
ALTER TABLE `quartos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `quartos_imagens`
--
ALTER TABLE `quartos_imagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `quartos`
--
ALTER TABLE `quartos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `quartos_imagens`
--
ALTER TABLE `quartos_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
