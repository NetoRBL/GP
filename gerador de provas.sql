-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Jun-2019 às 01:20
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gerador de provas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `COD` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`COD`, `login`, `senha`) VALUES
(1, 'oi', 'oi');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `COD` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `imgSnos1` varchar(100) NOT NULL,
  `caixa1` varchar(100) NOT NULL,
  `caixa2` varchar(100) NOT NULL,
  `caixa3` varchar(100) NOT NULL,
  `sobrenos` varchar(100) NOT NULL,
  `imgSnos2` varchar(100) NOT NULL,
  `cargo1` varchar(100) NOT NULL,
  `cargo2` varchar(100) NOT NULL,
  `informacoes` varchar(1000) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `CNPJ` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`COD`, `nome`, `imgSnos1`, `caixa1`, `caixa2`, `caixa3`, `sobrenos`, `imgSnos2`, `cargo1`, `cargo2`, `informacoes`, `telefone`, `email`, `CNPJ`) VALUES
(1, 'SmarTest', 'c97f34bf5bd48aa9420b61168d1cf1a593184ec5.jpg', '?gilidade', 'Facilidade', 'Qualidade', ' A melhor empresa dedicada  ao desenvolvimento de provas e cadastro de quest?es.', '140c36bd2ae1c147df42c162853fe5cee92ad89c.png', 'Pet', 'PROFESSORA / CEO', 'SmartTest', '(88) 9 4002-8922', 'smartest@outlook.com', '12.432.432/4567-09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `COD` int(11) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`COD`, `login`, `senha`, `email`, `nome`) VALUES
(75, 'qwer', '1161e6ffd3637b302a5cd74076283a7bd1fc20d3', 'qwer', 'qwer'),
(76, 'teste', '2e6f9b0d5885b6010f9167787445617f553a735f', 'teste@bol.com', 'Teste'),
(77, 'pedro', '4410d99cefe57ec2c2cdbd3f1d5cf862bb4fb6f8', 'pedro@hotmail.com', 'pedro'),
(78, 'lucas', '10c25665e49274c39b8e8f7ad6e2a3d0b0bc5052', 'lucas@gmail.com', 'Lucas'),
(79, 'Pedro123', '4410d99cefe57ec2c2cdbd3f1d5cf862bb4fb6f8', 'pedro123@hotmail.com', 'Pedro Victor'),
(80, 'Davi', '20beed61f5d64368b9aba66e91a1d2a090a0d4ae', 'ola@bol.com', 'Davi');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_prova_questoes`
--

CREATE TABLE `professor_prova_questoes` (
  `fk_Professor_COD` int(11) DEFAULT NULL,
  `fk_Prova_COD` int(11) DEFAULT NULL,
  `fk_Questoes_COD` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prova`
--

CREATE TABLE `prova` (
  `COD` int(11) NOT NULL,
  `qtd_questoes` int(11) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `cabecalho` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

CREATE TABLE `questoes` (
  `COD` int(11) NOT NULL,
  `dificuldade` varchar(20) DEFAULT NULL,
  `disciplina` varchar(100) NOT NULL,
  `concurso` varchar(20) DEFAULT NULL,
  `enunciado` varchar(2000) DEFAULT NULL,
  `conteudo` varchar(50) DEFAULT NULL,
  `alternativa_1` varchar(1000) DEFAULT NULL,
  `alternativa_2` varchar(1000) DEFAULT NULL,
  `alternativa_3` varchar(1000) DEFAULT NULL,
  `alternativa_4` varchar(1000) DEFAULT NULL,
  `alternativa_5` varchar(1000) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`COD`, `dificuldade`, `disciplina`, `concurso`, `enunciado`, `conteudo`, `alternativa_1`, `alternativa_2`, `alternativa_3`, `alternativa_4`, `alternativa_5`, `imagem`) VALUES
(67, 'facil', 'portugues', 'enem', 'eu gostava muito de passeá? saí com as minhas co lgas? brincá na porta di casa di vôlei? andá de patins? bicicleta? quando eu levava um tombo ou outro? eu era a::? a palhaça da turma? ((risos))? eu acho que foi uma das fases mais? assim? gostosas da minha vida foi? essa fase de quinze? dos meus treze aos dezessete anos?\r\n\r\nA.P.S., sexo feminino, 38 anos, nível de ensino fundamental. Projeto Fala Goiana, UFG. 2010 (inédito).\r\n\r\nUm aspecto da composição estrutural que caracteriza o relato pessoal de A.P.S. como modalidade falada da língua é', 'INTERPRETAÇÃO DE TEXTO', 'predomínio de linguagem informal entrecortada por pausas.', 'vocabulário regional desconhecido em outras varidades do português.', 'realização do plural conforme as regras da tradição gramatical.', 'ausência de elementos promotores de coesão entre os eventos narrados.', 'presença de frases incompreensíveis a um leitor inciante.', NULL),
(68, 'facil', 'portugues', 'spaece', '“Ele era o inimigo do rei”, nas palavras de seu biógrafo, Lira Neto. Ou, ainda, “um romancista que colecionava desafetos, azucrinava D. Pedro II e acabou inventando o Brasil”. Assim era José de Alencar (1829-1877), o conhecido autor de O guarani e Iracema, tido como o pai do romance no Brasil. Além de criar clássicos da literatura brasileira com temas nativistas, indianistas e históricos, ele foi também folhetinista, diretor de jornal, autor de peças de teatro, advogado, deputado federal e até ministro da Justiça. Para ajudar na descoberta das múltiplas facetas desse personagem do século XIX, parte de seu acervo inédito será digitalizada.\r\n\r\nCom base no texto, que trata do papel do escritor José de Alencar e da futura digitalização de sua obra, depreende-se que', 'INTERPRETAÇÃO DE TEXTO', 'a digitalização dos textos é importante para que os leitores possam compreender seus romances.', 'o conhecido autor de O guarani e Iracema foi importante porque deixou uma vasta obra literária com temática atemporal.\r\n', 'a divulgação das obras de José de Alencar, por meio da digitalização, demonstra sua importância para a história do Brasil Imperial.', 'a digitalização dos textos de José de Alencar terá importante papel na preservação da memória linguística e da identidade nacional.', 'o grande romancista José de Alencar é importante porque se destacou por sua temática indianista.', NULL),
(69, 'facil', 'portugues', 'enem', 'Com o advento da internet, as versões de revistas e livros também se adaptaram às novas tecnologias. A análise do texto publicitário apresentado revela que o surgimento das novas tecnologias', 'INTERPRETAÇÃO DE TEXTO', 'proporcionou mudanças no paradigma de consumo e oferta de revistas e livros.', 'incentivou a desvalorização das revistas e livros impres sos.', 'viabilizou a aquisição de novos equipamentos digitais.', 'aqueceu o mercado de venda de computadores.', '\r\ndiminuiu os incentivos à compra de eletrônicos.', '9be31c18c5aa3487a682915c926cc46a461d3c7a.png'),
(71, 'facil', 'portugues', 'enem', 'As palavras e as expressões são mediadoras dos sentidos produzidos nos textos. Na fala de Hagar, a expressão “é como se” ajuda a conduzir o conteúdo enunciado para o campo da\r\n\r\n', 'INTERPRETAÇÃO DE TEXTO', 'conformidade, pois as condições meteorológicas evden ciam um acontecimento ruim.', 'reflexibilidade, pois o personagem se refere aos tubrões usando um pronome reflexivo.', 'condicionalidade, pois a atenção dos personagens é a condição necessária para a sua sobrevivência.', 'possibilidade, pois a proximidade dos tubarões leva à suposição do perigo iminente para os homens.', 'impessoalidade, pois o personagem usa a terceira pessoa para expressar o distanciamento dos fatos.', '3e9b702c542349481fbe76e3e336711405847479.png'),
(72, 'facil', 'portugues', 'enem', 'Considerando-se a finalidade comunicativa comum do gênero e o contexto específico do Sistema de Biblioteca da UFG, esse cartaz tem função predominantemente', 'INTERPRETAÇÃO DE TEXTO', 'socializadora, contribuindo para a popularização da arte.\r\n', 'sedutora, considerando a leitura como uma obra de arte.', 'estética, propiciando uma apreciação despretensiosa da obra.', 'educativa, orientando o comportamento de usuários de um serviço.\r\n', 'contemplativa, evidenciando a importância de artistas internacionais', '566fb4125faba494adf3149a525ca6aade528577.png'),
(73, 'facil', 'portugues', 'enem', 'A publicidade, de uma forma geral, alia elementos verbais e imagéticos na constituição de seus textos. Nessa peça publicitária, cujo tema é a sustentabilidade, o autor procura convencer o leitor a\r\n\r\n', 'INTERPRETAÇÃO DE TEXTO', 'assumir uma atitude reflexiva diante dos fenômenos naturais.', 'evitar o consumo excessivo de produtos reutilizáveis.', 'aderir à onda sustentável, evitando o consumo excesivo.\r\n', 'abraçar a campanha, desenvolvendo projetos sustentáveis.', 'consumir produtos de modo responsável e ecológico.', 'f8f8678f74c660ab3e9dfa1beb8d174972fb527b.png'),
(74, 'facil', 'portugues', 'enem', 'Os meios de comunicação podem contribuir para a resolução de problemas sociais, entre os quais o da violência sexual infantil. Nesse sentido, a propaganda usa a metáfora do pesadelo para', 'FIGURAS DE LINGUAGEM', ' informar crianças vítimas de violência sexual sobre os perigos dessa prática, contribuindo para erradicá-la.', ' denunciar ocorrências de abuso sexual contra meninas, com o objetivo de colocar criminosos na cadeia.', 'destacar que a violência sexual infantil predomina durante a noite, o que requer maior cuidado dos responsáveis nesse período.', ' dar a devida dimensão do que é abuso sexual para uma criança, enfatizando a importância da denúncia.', 'chamar a atenção para o fato de o abuso infantil durante o sono, sendo confundido por algumas crianças com um pesadelo.', '88682aea33d25c406a8fc4f2d2cf99e87e9768a2.jpg'),
(75, 'facil', 'portugues', 'enem', 'O argumento presente na charge consiste em uma metáfora relativa à teoria evolucionista e ao desenvolvimento tecnológico. Considerando o contexto apresentado, verifica-se que o impacto tecnológico pode ocasionar:', 'FIGURAS DE LINGUAGEM', 'o surgimento de um homem dependente de um novo modelo tecnológico.', 'a mudança do homem em razão dos novos inventos que destroem sua realidade.', 'a problemática social de grande exclusão digital a partir da interferência da máquina.', 'a invenção de equipamentos que dificultam o trabalho do homem, em sua esfera social.', 'o retrocesso do desenvolvimento do homem em face da criação de ferramentas como lança, máquina e computador.', '0510728811432b23d270963270b10eae8c1724a0.jpg'),
(76, 'facil', 'portugues', 'enem', 'Quando você  afirma que enterrou “no dedo um alfinete”, que embarcou “no trem” e que serrou “os pés da mesa”, recorre a um tipo de figura de linguagem denominada:', 'FIGURAS DE LINGUAGEM', 'metonímia', 'antítese', 'paródia', 'alegoria', 'catacrese', NULL),
(77, 'facil', 'portugues', 'enem', 'Nos versos: “Bomba atômica que aterra\r\nPomba atônita da paz\r\nPomba tonta, bomba atômica...”\r\n\r\nA repetição de determinados elemento fônicos é um recurso estilístico denominado:', 'FIGURAS DE LINGUAGEM', '	\r\nhiperbibasmo', 'sinédoque', 'metonímia', 'aliteração', 'metáfora', NULL),
(78, 'facil', 'portugues', 'enem', 'Leia os versos e depois assinale a alternativa correta:\r\n\r\n“Amo do nauta o doloroso grito\r\nEm frágil prancha sobre o mar de horrores,\r\nPorque meu seio se tornou pedra,\r\nPorque minh’alma descorou de dores.” (Fagundes Varela)\r\n\r\nNo primeiro verso, há uma figura que se traduz por:', 'FIGURAS DE LINGUAGEM', 'pleonasmo', '	\r\nhipérbato', 'gradação', 'anacoluto', '	\r\nanáfora', NULL),
(79, 'facil', 'quimica', 'uece', 'Quanto é 1 + 1', 'SOLUÇÕES – CONCENTRAÇÕES', '123', '321', 'qwe', 'eq', 'qwe', '9d334f4d32af194ad629f315a906255bc1ab5d70.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`COD`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`COD`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`COD`);

--
-- Indexes for table `professor_prova_questoes`
--
ALTER TABLE `professor_prova_questoes`
  ADD KEY `FK_Professor_Prova_Questoes_1` (`fk_Professor_COD`),
  ADD KEY `FK_Professor_Prova_Questoes_2` (`fk_Prova_COD`),
  ADD KEY `FK_Professor_Prova_Questoes_3` (`fk_Questoes_COD`);

--
-- Indexes for table `prova`
--
ALTER TABLE `prova`
  ADD PRIMARY KEY (`COD`);

--
-- Indexes for table `questoes`
--
ALTER TABLE `questoes`
  ADD PRIMARY KEY (`COD`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `COD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `COD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `COD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `prova`
--
ALTER TABLE `prova`
  MODIFY `COD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questoes`
--
ALTER TABLE `questoes`
  MODIFY `COD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `professor_prova_questoes`
--
ALTER TABLE `professor_prova_questoes`
  ADD CONSTRAINT `FK_Professor_Prova_Questoes_1` FOREIGN KEY (`fk_Professor_COD`) REFERENCES `professor` (`COD`),
  ADD CONSTRAINT `FK_Professor_Prova_Questoes_2` FOREIGN KEY (`fk_Prova_COD`) REFERENCES `prova` (`COD`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_Professor_Prova_Questoes_3` FOREIGN KEY (`fk_Questoes_COD`) REFERENCES `questoes` (`COD`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
