-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2024 at 06:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigetutoria`
--

-- --------------------------------------------------------

--
-- Table structure for table `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id_avaliacao` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `teste_numero` int(11) NOT NULL,
  `supervisor` varchar(255) NOT NULL,
  `data_realizacao` date NOT NULL,
  `data_registo` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `local` varchar(255) NOT NULL,
  `modalidade` varchar(50) NOT NULL,
  `tipo_avaliacao` enum('Teste','Exame') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avaliacoes`
--

INSERT INTO `avaliacoes` (`id_avaliacao`, `id_disciplina`, `id_docente`, `teste_numero`, `supervisor`, `data_realizacao`, `data_registo`, `hora_inicio`, `hora_fim`, `local`, `modalidade`, `tipo_avaliacao`) VALUES
(2, 1, 4, 1, 'lirio manga', '2024-12-30', '2024-12-27', '09:00:00', '11:00:00', 'Sala A1', 'Presencial', 'Teste');

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` varchar(100) NOT NULL,
  `id_faculdade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`id_curso`, `nome_curso`, `id_faculdade`) VALUES
(1, 'Informatica', 1),
(2, 'ED.Visual', 1),
(5, 'Agropecuaria', 1),
(6, 'Electronica', 1);

-- --------------------------------------------------------

--
-- Table structure for table `disciplina`
--

CREATE TABLE `disciplina` (
  `id_disciplina` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `nome_disciplina` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `disciplina`
--

INSERT INTO `disciplina` (`id_disciplina`, `id_curso`, `nome_disciplina`) VALUES
(1, 1, 'PTPIII'),
(2, 1, 'Matematica Discreta');

-- --------------------------------------------------------

--
-- Table structure for table `docente`
--

CREATE TABLE `docente` (
  `id_docente` int(11) NOT NULL,
  `id_faculdade` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `nome_docente` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `docente`
--

INSERT INTO `docente` (`id_docente`, `id_faculdade`, `id_curso`, `id_disciplina`, `nome_docente`, `password`, `email`) VALUES
(3, 1, 1, 1, 'Armando Maxa', NULL, NULL),
(4, 1, 1, 1, 'lirio', 'manga', 'liriomanga@gmail.com'),
(7, 1, 1, 1, 'Antonio Marcos', NULL, NULL),
(10, 1, 1, 1, 'Gojo', NULL, NULL),
(11, 1, 1, 1, 'Itachi', NULL, NULL),
(12, 1, 1, 1, 'Ricardo Uainda', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculdade`
--

CREATE TABLE `faculdade` (
  `id_faculdade` int(11) NOT NULL,
  `nome_facul` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `faculdade`
--

INSERT INTO `faculdade` (`id_faculdade`, `nome_facul`, `endereco`) VALUES
(1, 'fet', 'Up-MAPUTO'),
(5, 'Ciências da Terra e Ambiente', 'UP-campus'),
(6, 'FLC', 'UP-Sede');

-- --------------------------------------------------------

--
-- Table structure for table `relatorio`
--

CREATE TABLE `relatorio` (
  `id_relatorio` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `criado_em:` date NOT NULL,
  `tipo_relatorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutoria`
--

CREATE TABLE `tutoria` (
  `id_tutoria` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_termino` datetime NOT NULL,
  `data_registo` date NOT NULL,
  `data_realizacao` date NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tutoria`
--

INSERT INTO `tutoria` (`id_tutoria`, `id_disciplina`, `id_docente`, `hora_inicio`, `hora_termino`, `data_registo`, `data_realizacao`, `descricao`) VALUES
(11, 1, 3, '25:00:44', '2024-09-11 14:00:43', '2024-09-18', '2024-09-03', 'Essa tutoria designa-se a dispensar');

-- --------------------------------------------------------

--
-- Table structure for table `tutoria1`
--

CREATE TABLE `tutoria1` (
  `id_tutoria` int(10) NOT NULL,
  `id_docente` int(11) DEFAULT NULL,
  `hora_inicio` varchar(100) NOT NULL,
  `hora_termino` varchar(100) NOT NULL,
  `data_registo` varchar(100) NOT NULL,
  `data_realizacao` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `id_disciplina` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutoria1`
--

INSERT INTO `tutoria1` (`id_tutoria`, `id_docente`, `hora_inicio`, `hora_termino`, `data_registo`, `data_realizacao`, `descricao`, `id_disciplina`) VALUES
(1, 1, '13:09', '15:09', '2024-09-08', '2024-09-08', 'tutoria', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD KEY `fk_avaliacoes_disciplinas` (`id_disciplina`),
  ADD KEY `fk_avaliacoes_docentes` (`id_docente`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `FK_faculdade_curso` (`id_faculdade`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disciplina`),
  ADD KEY `fk_curso_disciplina` (`id_curso`);

--
-- Indexes for table `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id_docente`),
  ADD KEY `fk_docente_curso` (`id_curso`),
  ADD KEY `fk_faculdade_docente` (`id_faculdade`),
  ADD KEY `fk_disciplina_docente` (`id_disciplina`);

--
-- Indexes for table `faculdade`
--
ALTER TABLE `faculdade`
  ADD PRIMARY KEY (`id_faculdade`);

--
-- Indexes for table `relatorio`
--
ALTER TABLE `relatorio`
  ADD PRIMARY KEY (`id_relatorio`),
  ADD KEY `fk_relatorio_docente` (`id_docente`);

--
-- Indexes for table `tutoria1`
--
ALTER TABLE `tutoria1`
  ADD PRIMARY KEY (`id_tutoria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `docente`
--
ALTER TABLE `docente`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `faculdade`
--
ALTER TABLE `faculdade`
  MODIFY `id_faculdade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `relatorio`
--
ALTER TABLE `relatorio`
  MODIFY `id_relatorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutoria1`
--
ALTER TABLE `tutoria1`
  MODIFY `id_tutoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `fk_avaliacoes_disciplinas` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_avaliacoes_docentes` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `FK_faculdade_curso` FOREIGN KEY (`id_faculdade`) REFERENCES `faculdade` (`id_faculdade`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `fk_curso_disciplina` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE;

--
-- Constraints for table `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `fk_disciplina_docente` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_docente_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_faculdade_docente` FOREIGN KEY (`id_faculdade`) REFERENCES `faculdade` (`id_faculdade`) ON DELETE CASCADE;

--
-- Constraints for table `relatorio`
--
ALTER TABLE `relatorio`
  ADD CONSTRAINT `fk_relatorio_docente` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE CASCADE;

--
-- Constraints for table `tutoria`
--
ALTER TABLE `tutoria`
  ADD CONSTRAINT `fk_disciplina_tutoria` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_docente_tutoria` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
