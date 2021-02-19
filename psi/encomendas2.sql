-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendas_produtos`
--

CREATE TABLE `encomendas_produtos` (
  `id_enc_prod` int(11) AUTO_INCREMENT NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_encomenda` int(11) NOT NULL,
  `quantidade` int(11) default 0,
    `preco` double default 0,
    `desconto` double default 0,
    `obervacoes` varchar(255) default null,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  primary key (`id_enc_prod`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `encomendas_produtos`
--

INSERT INTO `encomendas_produtos` (`id_enc_prod`, `id_produto`, `id_encomenda`, `quantidade`, `preco`,`updated_at`, `created_at`) VALUES
(1, 1, 1, 2, 1.5, '2020-12-02 00:00:00', '2020-12-31 00:00:00'),
(2, 2, 1,3, 10.5, '2020-12-03 00:00:00', '2020-12-25 00:00:00'),
(3, 3, 3,3, 11.5, '2020-12-11 00:00:00', '2020-12-22 00:00:00'),
(4, 4, 4, 2, 21.5,'2020-12-03 00:00:00', '2020-12-31 00:00:00');



--
-- Estrutura da tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `id_vendedor` int(11) AUTO_INCREMENT  NOT NULL,
  `nome` varchar(50)  NOT NULL,
  `especialidade` varchar(50) NULL,
  `email` varchar(255) NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  primary key (`id_vendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `vendedores`
--

INSERT INTO `vendedores` (`id_vendedor`, `nome`, `especialidade`, `email`, `updated_at`, `created_at`) VALUES
(1, 'Manuel Pacheco', 'Eletrónica', 'mpacheco@Gmail.com', '2020-11-05 00:00:00', '2020-11-05 00:00:00'),
(2, 'Noé Silva', 'Informática', 'nsilva@gmail.com', '2020-11-05 00:00:00', '2020-11-05 00:00:00'),
(3, 'Luís Gomes', 'Fotografia', 'lgomes', '2020-11-05 00:00:00', '2020-11-05 00:00:00'),
(4, 'António Filipe', 'Informática', 'afilipe@gmail.com', '2020-11-05 00:00:00', '2020-11-05 00:00:00'),
(5, 'Tiago Machado', 'Informática', 'tmachado@gmail.com', '2020-11-05 00:00:00', '2020-11-05 00:00:00');



--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) AUTO_INCREMENT NOT NULL,
  `designacao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(9) default 0,
  `preco` double default 0,
    `id_categoria` int(11) DEFAULT NULL,
  `observacoes` varchar(255) NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  primary key (`id_produto`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `designacao`, `stock`, `preco`, `id_categoria`, `updated_at`, `created_at`) VALUES
(1, 'TV LG', 100, 150, 2, '2020-12-02 00:00:00', '2020-12-02 00:00:00'),
(2, 'TV SONY', 200, 50, 2, '2020-12-25 00:00:00', '2020-12-31 00:00:00'),
(3, 'PC ASUS', 50, 250, 1, '2020-12-04 00:00:00', '2020-12-30 00:00:00'),
(4, 'Apple iPhone', 200, 1000,5, '2020-12-02 00:00:00', '2020-12-31 00:00:00');

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `designacao` varchar(50) NOT NULL,
    `icone` varchar(100) default null,
   `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  primary key (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `designacao`, `created_at`, `updated_at`) VALUES
(1, 'Informática', '2020-11-05 12:49:31', '2020-11-05 12:49:31'),
(2, 'TV', '2020-11-05 12:49:31', '2020-11-05 12:49:31'),
(3, 'Gamming', '2020-11-05 13:16:28', '2020-11-05 13:11:34'),
(4, 'Fotografia', '2020-11-05 13:11:34', '2020-11-05 13:11:34'),
(5, 'Mobile', '2020-11-05 13:16:35', '2020-11-05 13:12:24');



--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id_fornecedor` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `morada` varchar(100)  NULL,
  `id_categoria` int(11) null,
  `telefone` varchar(13) default null,
    `obervacoes` varchar(255) default null,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  primary key (`id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id_fornecedor`, `nome`, `morada`, `id_categoria` , `telefone`, `created_at`, `updated_at`) VALUES
(1, 'Oreo', 'Rua das Oreos',1, '923456781', '2020-11-05 12:53:20', '2020-11-05 12:53:20'),
(2, 'Nerf', 'Rua das Nerfs',1, '981234567', '2020-11-05 12:53:20', '2020-11-05 12:53:20'),
(3, 'IKEA', 'Rua do IKEA',3, '918589899', '2020-11-05 13:12:14', '2020-11-05 13:12:14'),
(4, 'Porto Editora', 'Rua do Porto Editora',3, '910608608', '2020-11-05 13:12:14', '2020-11-05 13:12:14'),
(5, 'Cozinhas LDA', 'Rua da Cozinha', 4, '918589898', '2020-11-05 13:12:40', '2020-11-05 13:12:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores_produtos`
--

CREATE TABLE `fornecedores_produtos` (
  `id_for_prod` int(11) NOT NULL,
  `id_fornecedor` int(11) default NULL,
  `id_produto` int(11) default NULL,
  `preco` double default 0,
  `observacoes`  varchar(255) default null,
   `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  primary key (`id_for_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



INSERT INTO `fornecedores_produtos` (`id_for_prod`, `id_fornecedor`, `updated_at`, `created_at`, `id_produto`, `preco`) VALUES
(1, 1, '2020-11-05 13:02:06', '2020-11-05 13:02:06', 1, 100),
(2, 1, '2020-11-05 13:02:22', '2020-11-05 13:02:22', 2, 150),
(3, 2, '2020-11-05 13:20:52', '2020-11-05 13:20:52', 3, 100),
(4, 2, '2020-11-05 13:21:00', '2020-11-05 13:21:00', 4, 150),
(5, 2, '2020-11-05 13:21:08', '2020-11-05 13:21:08', 5, 200);

