-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/06/2026 às 13:27
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
-- Banco de dados: `test`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acessos`
--

CREATE TABLE `acessos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_acesso` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `acessos`
--

INSERT INTO `acessos` (`id`, `id_usuario`, `data_acesso`) VALUES
(1, 1, '2026-06-07 15:42:23'),
(2, 1, '2026-06-09 14:09:07'),
(3, 1, '2026-06-09 14:10:11'),
(4, 1, '2026-06-09 16:21:42'),
(5, 1, '2026-06-09 20:23:47');

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(11) NOT NULL,
  `matricula` varchar(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `num_autorizacoes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `matricula`, `nome`, `id_turma`, `num_autorizacoes`) VALUES
(546, '20260002', 'Aluno da EEEP 02', 1, 6),
(547, '20260003', 'Aluno da EEEP 03', 1, 1),
(548, '20260004', 'Aluno da EEEP 04', 1, 0),
(549, '20260005', 'Aluno da EEEP 05', 1, 0),
(550, '20260006', 'Aluno da EEEP 06', 1, 0),
(551, '20260007', 'Aluno da EEEP 07', 1, 0),
(552, '20260008', 'Aluno da EEEP 08', 1, 0),
(553, '20260009', 'Aluno da EEEP 09', 1, 0),
(554, '20260010', 'Aluno da EEEP 10', 1, 0),
(555, '20260011', 'Aluno da EEEP 11', 1, 0),
(556, '20260012', 'Aluno da EEEP 12', 1, 0),
(557, '20260013', 'Aluno da EEEP 13', 1, 0),
(558, '20260014', 'Aluno da EEEP 14', 1, 0),
(559, '20260015', 'Aluno da EEEP 15', 1, 0),
(560, '20260016', 'Aluno da EEEP 16', 1, 0),
(561, '20260017', 'Aluno da EEEP 17', 1, 0),
(562, '20260018', 'Aluno da EEEP 18', 1, 0),
(563, '20260019', 'Aluno da EEEP 19', 1, 0),
(564, '20260020', 'Aluno da EEEP 20', 1, 0),
(565, '20260021', 'Aluno da EEEP 21', 1, 0),
(566, '20260022', 'Aluno da EEEP 22', 1, 0),
(567, '20260023', 'Aluno da EEEP 23', 1, 0),
(568, '20260024', 'Aluno da EEEP 24', 1, 0),
(569, '20260025', 'Aluno da EEEP 25', 1, 0),
(570, '20260026', 'Aluno da EEEP 26', 1, 0),
(571, '20260027', 'Aluno da EEEP 27', 1, 0),
(572, '20260028', 'Aluno da EEEP 28', 1, 0),
(573, '20260029', 'Aluno da EEEP 29', 1, 0),
(574, '20260030', 'Aluno da EEEP 30', 1, 0),
(575, '20260031', 'Aluno da EEEP 31', 1, 0),
(576, '20260032', 'Aluno da EEEP 32', 1, 0),
(577, '20260033', 'Aluno da EEEP 33', 1, 0),
(578, '20260034', 'Aluno da EEEP 34', 1, 0),
(579, '20260035', 'Aluno da EEEP 35', 1, 0),
(580, '20260036', 'Aluno da EEEP 36', 1, 0),
(581, '20260037', 'Aluno da EEEP 37', 1, 0),
(582, '20260038', 'Aluno da EEEP 38', 1, 0),
(583, '20260039', 'Aluno da EEEP 39', 1, 0),
(584, '20260040', 'Aluno da EEEP 40', 1, 0),
(585, '20260041', 'Aluno da EEEP 41', 1, 0),
(586, '20260042', 'Aluno da EEEP 42', 1, 0),
(587, '20260043', 'Aluno da EEEP 43', 1, 0),
(588, '20260044', 'Aluno da EEEP 44', 1, 0),
(589, '20260045', 'Aluno da EEEP 45', 1, 0),
(590, '20260046', 'Aluno da EEEP 46', 4, 0),
(591, '20260047', 'Aluno da EEEP 47', 4, 0),
(592, '20260048', 'Aluno da EEEP 48', 4, 0),
(593, '20260049', 'Aluno da EEEP 49', 4, 0),
(594, '20260050', 'Aluno da EEEP 50', 4, 0),
(595, '20260051', 'Aluno da EEEP 51', 4, 0),
(596, '20260052', 'Aluno da EEEP 52', 4, 0),
(597, '20260053', 'Aluno da EEEP 53', 4, 0),
(598, '20260054', 'Aluno da EEEP 54', 4, 0),
(599, '20260055', 'Aluno da EEEP 55', 4, 0),
(600, '20260056', 'Aluno da EEEP 56', 4, 0),
(601, '20260057', 'Aluno da EEEP 57', 4, 0),
(602, '20260058', 'Aluno da EEEP 58', 4, 0),
(603, '20260059', 'Aluno da EEEP 59', 4, 0),
(604, '20260060', 'Aluno da EEEP 60', 4, 0),
(605, '20260061', 'Aluno da EEEP 61', 4, 0),
(606, '20260062', 'Aluno da EEEP 62', 4, 0),
(607, '20260063', 'Aluno da EEEP 63', 4, 0),
(608, '20260064', 'Aluno da EEEP 64', 4, 0),
(609, '20260065', 'Aluno da EEEP 65', 4, 0),
(610, '20260066', 'Aluno da EEEP 66', 4, 0),
(611, '20260067', 'Aluno da EEEP 67', 4, 0),
(612, '20260068', 'Aluno da EEEP 68', 4, 0),
(613, '20260069', 'Aluno da EEEP 69', 4, 0),
(614, '20260070', 'Aluno da EEEP 70', 4, 0),
(615, '20260071', 'Aluno da EEEP 71', 4, 0),
(616, '20260072', 'Aluno da EEEP 72', 4, 0),
(617, '20260073', 'Aluno da EEEP 73', 4, 0),
(618, '20260074', 'Aluno da EEEP 74', 4, 0),
(619, '20260075', 'Aluno da EEEP 75', 4, 0),
(620, '20260076', 'Aluno da EEEP 76', 4, 0),
(621, '20260077', 'Aluno da EEEP 77', 4, 0),
(622, '20260078', 'Aluno da EEEP 78', 4, 0),
(623, '20260079', 'Aluno da EEEP 79', 4, 0),
(624, '20260080', 'Aluno da EEEP 80', 4, 0),
(625, '20260081', 'Aluno da EEEP 81', 4, 0),
(626, '20260082', 'Aluno da EEEP 82', 4, 0),
(627, '20260083', 'Aluno da EEEP 83', 4, 0),
(628, '20260084', 'Aluno da EEEP 84', 4, 0),
(629, '20260085', 'Aluno da EEEP 85', 4, 0),
(630, '20260086', 'Aluno da EEEP 86', 4, 0),
(631, '20260087', 'Aluno da EEEP 87', 4, 0),
(632, '20260088', 'Aluno da EEEP 88', 4, 0),
(633, '20260089', 'Aluno da EEEP 89', 4, 0),
(634, '20260090', 'Aluno da EEEP 90', 4, 0),
(635, '20260091', 'Aluno da EEEP 91', 7, 0),
(636, '20260092', 'Aluno da EEEP 92', 7, 0),
(637, '20260093', 'Aluno da EEEP 93', 7, 0),
(638, '20260094', 'Aluno da EEEP 94', 7, 0),
(639, '20260095', 'Aluno da EEEP 95', 7, 0),
(640, '20260096', 'Aluno da EEEP 96', 7, 0),
(641, '20260097', 'Aluno da EEEP 97', 7, 0),
(642, '20260098', 'Aluno da EEEP 98', 7, 0),
(643, '20260099', 'Aluno da EEEP 99', 7, 0),
(644, '20260100', 'Aluno da EEEP 100', 7, 0),
(645, '20260101', 'Aluno da EEEP 101', 7, 0),
(646, '20260102', 'Aluno da EEEP 102', 7, 0),
(647, '20260103', 'Aluno da EEEP 103', 7, 0),
(648, '20260104', 'Aluno da EEEP 104', 7, 0),
(649, '20260105', 'Aluno da EEEP 105', 7, 0),
(650, '20260106', 'Aluno da EEEP 106', 7, 0),
(651, '20260107', 'Aluno da EEEP 107', 7, 0),
(652, '20260108', 'Aluno da EEEP 108', 7, 0),
(653, '20260109', 'Aluno da EEEP 109', 7, 0),
(654, '20260110', 'Aluno da EEEP 110', 7, 0),
(655, '20260111', 'Aluno da EEEP 111', 7, 0),
(656, '20260112', 'Aluno da EEEP 112', 7, 0),
(657, '20260113', 'Aluno da EEEP 113', 7, 0),
(658, '20260114', 'Aluno da EEEP 114', 7, 0),
(659, '20260115', 'Aluno da EEEP 115', 7, 0),
(660, '20260116', 'Aluno da EEEP 116', 7, 0),
(661, '20260117', 'Aluno da EEEP 117', 7, 0),
(662, '20260118', 'Aluno da EEEP 118', 7, 0),
(663, '20260119', 'Aluno da EEEP 119', 7, 0),
(664, '20260120', 'Aluno da EEEP 120', 7, 0),
(665, '20260121', 'Aluno da EEEP 121', 7, 0),
(666, '20260122', 'Aluno da EEEP 122', 7, 0),
(667, '20260123', 'Aluno da EEEP 123', 7, 0),
(668, '20260124', 'Aluno da EEEP 124', 7, 0),
(669, '20260125', 'Aluno da EEEP 125', 7, 0),
(670, '20260126', 'Aluno da EEEP 126', 7, 0),
(671, '20260127', 'Aluno da EEEP 127', 7, 0),
(672, '20260128', 'Aluno da EEEP 128', 7, 0),
(673, '20260129', 'Aluno da EEEP 129', 7, 0),
(674, '20260130', 'Aluno da EEEP 130', 7, 0),
(675, '20260131', 'Aluno da EEEP 131', 7, 0),
(676, '20260132', 'Aluno da EEEP 132', 7, 0),
(677, '20260133', 'Aluno da EEEP 133', 7, 0),
(678, '20260134', 'Aluno da EEEP 134', 7, 0),
(679, '20260135', 'Aluno da EEEP 135', 7, 0),
(680, '20260136', 'Aluno da EEEP 136', 10, 0),
(681, '20260137', 'Aluno da EEEP 137', 10, 0),
(682, '20260138', 'Aluno da EEEP 138', 10, 0),
(683, '20260139', 'Aluno da EEEP 139', 10, 0),
(684, '20260140', 'Aluno da EEEP 140', 10, 0),
(685, '20260141', 'Aluno da EEEP 141', 10, 0),
(686, '20260142', 'Aluno da EEEP 142', 10, 0),
(687, '20260143', 'Aluno da EEEP 143', 10, 0),
(688, '20260144', 'Aluno da EEEP 144', 10, 0),
(689, '20260145', 'Aluno da EEEP 145', 10, 0),
(690, '20260146', 'Aluno da EEEP 146', 10, 0),
(691, '20260147', 'Aluno da EEEP 147', 10, 0),
(692, '20260148', 'Aluno da EEEP 148', 10, 0),
(693, '20260149', 'Aluno da EEEP 149', 10, 0),
(694, '20260150', 'Aluno da EEEP 150', 10, 0),
(695, '20260151', 'Aluno da EEEP 151', 10, 0),
(696, '20260152', 'Aluno da EEEP 152', 10, 0),
(697, '20260153', 'Aluno da EEEP 153', 10, 0),
(698, '20260154', 'Aluno da EEEP 154', 10, 0),
(699, '20260155', 'Aluno da EEEP 155', 10, 0),
(700, '20260156', 'Aluno da EEEP 156', 10, 0),
(701, '20260157', 'Aluno da EEEP 157', 10, 0),
(702, '20260158', 'Aluno da EEEP 158', 10, 0),
(703, '20260159', 'Aluno da EEEP 159', 10, 0),
(704, '20260160', 'Aluno da EEEP 160', 10, 0),
(705, '20260161', 'Aluno da EEEP 161', 10, 0),
(706, '20260162', 'Aluno da EEEP 162', 10, 0),
(707, '20260163', 'Aluno da EEEP 163', 10, 0),
(708, '20260164', 'Aluno da EEEP 164', 10, 0),
(709, '20260165', 'Aluno da EEEP 165', 10, 0),
(710, '20260166', 'Aluno da EEEP 166', 10, 0),
(711, '20260167', 'Aluno da EEEP 167', 10, 0),
(712, '20260168', 'Aluno da EEEP 168', 10, 0),
(713, '20260169', 'Aluno da EEEP 169', 10, 0),
(714, '20260170', 'Aluno da EEEP 170', 10, 0),
(715, '20260171', 'Aluno da EEEP 171', 10, 0),
(716, '20260172', 'Aluno da EEEP 172', 10, 0),
(717, '20260173', 'Aluno da EEEP 173', 10, 0),
(718, '20260174', 'Aluno da EEEP 174', 10, 0),
(719, '20260175', 'Aluno da EEEP 175', 10, 0),
(720, '20260176', 'Aluno da EEEP 176', 10, 0),
(721, '20260177', 'Aluno da EEEP 177', 10, 0),
(722, '20260178', 'Aluno da EEEP 178', 10, 0),
(723, '20260179', 'Aluno da EEEP 179', 10, 0),
(724, '20260180', 'Aluno da EEEP 180', 10, 0),
(725, '20260181', 'Aluno da EEEP 181', 2, 0),
(726, '20260182', 'Aluno da EEEP 182', 2, 0),
(727, '20260183', 'Aluno da EEEP 183', 2, 0),
(728, '20260184', 'Aluno da EEEP 184', 2, 0),
(729, '20260185', 'Aluno da EEEP 185', 2, 0),
(730, '20260186', 'Aluno da EEEP 186', 2, 0),
(731, '20260187', 'Aluno da EEEP 187', 2, 0),
(732, '20260188', 'Aluno da EEEP 188', 2, 0),
(733, '20260189', 'Aluno da EEEP 189', 2, 0),
(734, '20260190', 'Aluno da EEEP 190', 2, 0),
(735, '20260191', 'Aluno da EEEP 191', 2, 0),
(736, '20260192', 'Aluno da EEEP 192', 2, 0),
(737, '20260193', 'Aluno da EEEP 193', 2, 0),
(738, '20260194', 'Aluno da EEEP 194', 2, 0),
(739, '20260195', 'Aluno da EEEP 195', 2, 0),
(740, '20260196', 'Aluno da EEEP 196', 2, 0),
(741, '20260197', 'Aluno da EEEP 197', 2, 0),
(742, '20260198', 'Aluno da EEEP 198', 2, 0),
(743, '20260199', 'Aluno da EEEP 199', 2, 0),
(744, '20260200', 'Aluno da EEEP 200', 2, 0),
(745, '20260201', 'Aluno da EEEP 201', 2, 0),
(746, '20260202', 'Aluno da EEEP 202', 2, 0),
(747, '20260203', 'Aluno da EEEP 203', 2, 0),
(748, '20260204', 'Aluno da EEEP 204', 2, 0),
(749, '20260205', 'Aluno da EEEP 205', 2, 0),
(750, '20260206', 'Aluno da EEEP 206', 2, 0),
(751, '20260207', 'Aluno da EEEP 207', 2, 0),
(752, '20260208', 'Aluno da EEEP 208', 2, 0),
(753, '20260209', 'Aluno da EEEP 209', 2, 0),
(754, '20260210', 'Aluno da EEEP 210', 2, 0),
(755, '20260211', 'Aluno da EEEP 211', 2, 0),
(756, '20260212', 'Aluno da EEEP 212', 2, 0),
(757, '20260213', 'Aluno da EEEP 213', 2, 0),
(758, '20260214', 'Aluno da EEEP 214', 2, 0),
(759, '20260215', 'Aluno da EEEP 215', 2, 0),
(760, '20260216', 'Aluno da EEEP 216', 2, 0),
(761, '20260217', 'Aluno da EEEP 217', 2, 0),
(762, '20260218', 'Aluno da EEEP 218', 2, 0),
(763, '20260219', 'Aluno da EEEP 219', 2, 0),
(764, '20260220', 'Aluno da EEEP 220', 2, 0),
(765, '20260221', 'Aluno da EEEP 221', 2, 0),
(766, '20260222', 'Aluno da EEEP 222', 2, 0),
(767, '20260223', 'Aluno da EEEP 223', 2, 0),
(768, '20260224', 'Aluno da EEEP 224', 2, 0),
(769, '20260225', 'Aluno da EEEP 225', 2, 0),
(770, '20260226', 'Aluno da EEEP 226', 5, 0),
(771, '20260227', 'Aluno da EEEP 227', 5, 0),
(772, '20260228', 'Aluno da EEEP 228', 5, 0),
(773, '20260229', 'Aluno da EEEP 229', 5, 0),
(774, '20260230', 'Aluno da EEEP 230', 5, 0),
(775, '20260231', 'Aluno da EEEP 231', 5, 0),
(776, '20260232', 'Aluno da EEEP 232', 5, 0),
(777, '20260233', 'Aluno da EEEP 233', 5, 0),
(778, '20260234', 'Aluno da EEEP 234', 5, 0),
(779, '20260235', 'Aluno da EEEP 235', 5, 0),
(780, '20260236', 'Aluno da EEEP 236', 5, 0),
(781, '20260237', 'Aluno da EEEP 237', 5, 0),
(782, '20260238', 'Aluno da EEEP 238', 5, 0),
(783, '20260239', 'Aluno da EEEP 239', 5, 0),
(784, '20260240', 'Aluno da EEEP 240', 5, 0),
(785, '20260241', 'Aluno da EEEP 241', 5, 0),
(786, '20260242', 'Aluno da EEEP 242', 5, 0),
(787, '20260243', 'Aluno da EEEP 243', 5, 0),
(788, '20260244', 'Aluno da EEEP 244', 5, 0),
(789, '20260245', 'Aluno da EEEP 245', 5, 0),
(790, '20260246', 'Aluno da EEEP 246', 5, 0),
(791, '20260247', 'Aluno da EEEP 247', 5, 0),
(792, '20260248', 'Aluno da EEEP 248', 5, 0),
(793, '20260249', 'Aluno da EEEP 249', 5, 0),
(794, '20260250', 'Aluno da EEEP 250', 5, 0),
(795, '20260251', 'Aluno da EEEP 251', 5, 0),
(796, '20260252', 'Aluno da EEEP 252', 5, 0),
(797, '20260253', 'Aluno da EEEP 253', 5, 0),
(798, '20260254', 'Aluno da EEEP 254', 5, 0),
(799, '20260255', 'Aluno da EEEP 255', 5, 0),
(800, '20260256', 'Aluno da EEEP 256', 5, 0),
(801, '20260257', 'Aluno da EEEP 257', 5, 0),
(802, '20260258', 'Aluno da EEEP 258', 5, 0),
(803, '20260259', 'Aluno da EEEP 259', 5, 0),
(804, '20260260', 'Aluno da EEEP 260', 5, 0),
(805, '20260261', 'Aluno da EEEP 261', 5, 0),
(806, '20260262', 'Aluno da EEEP 262', 5, 0),
(807, '20260263', 'Aluno da EEEP 263', 5, 0),
(808, '20260264', 'Aluno da EEEP 264', 5, 0),
(809, '20260265', 'Aluno da EEEP 265', 5, 0),
(810, '20260266', 'Aluno da EEEP 266', 5, 0),
(811, '20260267', 'Aluno da EEEP 267', 5, 0),
(812, '20260268', 'Aluno da EEEP 268', 5, 0),
(813, '20260269', 'Aluno da EEEP 269', 5, 0),
(814, '20260270', 'Aluno da EEEP 270', 5, 0),
(815, '20260271', 'Aluno da EEEP 271', 8, 0),
(816, '20260272', 'Aluno da EEEP 272', 8, 0),
(817, '20260273', 'Aluno da EEEP 273', 8, 0),
(818, '20260274', 'Aluno da EEEP 274', 8, 0),
(819, '20260275', 'Aluno da EEEP 275', 8, 0),
(820, '20260276', 'Aluno da EEEP 276', 8, 0),
(821, '20260277', 'Aluno da EEEP 277', 8, 0),
(822, '20260278', 'Aluno da EEEP 278', 8, 0),
(823, '20260279', 'Aluno da EEEP 279', 8, 0),
(824, '20260280', 'Aluno da EEEP 280', 8, 0),
(825, '20260281', 'Aluno da EEEP 281', 8, 0),
(826, '20260282', 'Aluno da EEEP 282', 8, 0),
(827, '20260283', 'Aluno da EEEP 283', 8, 0),
(828, '20260284', 'Aluno da EEEP 284', 8, 0),
(829, '20260285', 'Aluno da EEEP 285', 8, 0),
(830, '20260286', 'Aluno da EEEP 286', 8, 0),
(831, '20260287', 'Aluno da EEEP 287', 8, 0),
(832, '20260288', 'Aluno da EEEP 288', 8, 0),
(833, '20260289', 'Aluno da EEEP 289', 8, 0),
(834, '20260290', 'Aluno da EEEP 290', 8, 0),
(835, '20260291', 'Aluno da EEEP 291', 8, 0),
(836, '20260292', 'Aluno da EEEP 292', 8, 0),
(837, '20260293', 'Aluno da EEEP 293', 8, 0),
(838, '20260294', 'Aluno da EEEP 294', 8, 0),
(839, '20260295', 'Aluno da EEEP 295', 8, 0),
(840, '20260296', 'Aluno da EEEP 296', 8, 0),
(841, '20260297', 'Aluno da EEEP 297', 8, 0),
(842, '20260298', 'Aluno da EEEP 298', 8, 0),
(843, '20260299', 'Aluno da EEEP 299', 8, 0),
(844, '20260300', 'Aluno da EEEP 300', 8, 0),
(845, '20260301', 'Aluno da EEEP 301', 8, 0),
(846, '20260302', 'Aluno da EEEP 302', 8, 0),
(847, '20260303', 'Aluno da EEEP 303', 8, 0),
(848, '20260304', 'Aluno da EEEP 304', 8, 0),
(849, '20260305', 'Aluno da EEEP 305', 8, 0),
(850, '20260306', 'Aluno da EEEP 306', 8, 0),
(851, '20260307', 'Aluno da EEEP 307', 8, 0),
(852, '20260308', 'Aluno da EEEP 308', 8, 0),
(853, '20260309', 'Aluno da EEEP 309', 8, 0),
(854, '20260310', 'Aluno da EEEP 310', 8, 0),
(855, '20260311', 'Aluno da EEEP 311', 8, 0),
(856, '20260312', 'Aluno da EEEP 312', 8, 0),
(857, '20260313', 'Aluno da EEEP 313', 8, 0),
(858, '20260314', 'Aluno da EEEP 314', 8, 0),
(859, '20260315', 'Aluno da EEEP 315', 8, 0),
(860, '20260316', 'Aluno da EEEP 316', 11, 0),
(861, '20260317', 'Aluno da EEEP 317', 11, 0),
(862, '20260318', 'Aluno da EEEP 318', 11, 0),
(863, '20260319', 'Aluno da EEEP 319', 11, 0),
(864, '20260320', 'Aluno da EEEP 320', 11, 0),
(865, '20260321', 'Aluno da EEEP 321', 11, 0),
(866, '20260322', 'Aluno da EEEP 322', 11, 0),
(867, '20260323', 'Aluno da EEEP 323', 11, 0),
(868, '20260324', 'Aluno da EEEP 324', 11, 0),
(869, '20260325', 'Aluno da EEEP 325', 11, 0),
(870, '20260326', 'Aluno da EEEP 326', 11, 0),
(871, '20260327', 'Aluno da EEEP 327', 11, 0),
(872, '20260328', 'Aluno da EEEP 328', 11, 0),
(873, '20260329', 'Aluno da EEEP 329', 11, 0),
(874, '20260330', 'Aluno da EEEP 330', 11, 0),
(875, '20260331', 'Aluno da EEEP 331', 11, 0),
(876, '20260332', 'Aluno da EEEP 332', 11, 0),
(877, '20260333', 'Aluno da EEEP 333', 11, 0),
(878, '20260334', 'Aluno da EEEP 334', 11, 0),
(879, '20260335', 'Aluno da EEEP 335', 11, 0),
(880, '20260336', 'Aluno da EEEP 336', 11, 0),
(881, '20260337', 'Aluno da EEEP 337', 11, 0),
(882, '20260338', 'Aluno da EEEP 338', 11, 0),
(883, '20260339', 'Aluno da EEEP 339', 11, 0),
(884, '20260340', 'Aluno da EEEP 340', 11, 0),
(885, '20260341', 'Aluno da EEEP 341', 11, 0),
(886, '20260342', 'Aluno da EEEP 342', 11, 0),
(887, '20260343', 'Aluno da EEEP 343', 11, 0),
(888, '20260344', 'Aluno da EEEP 344', 11, 0),
(889, '20260345', 'Aluno da EEEP 345', 11, 0),
(890, '20260346', 'Aluno da EEEP 346', 11, 0),
(891, '20260347', 'Aluno da EEEP 347', 11, 0),
(892, '20260348', 'Aluno da EEEP 348', 11, 0),
(893, '20260349', 'Aluno da EEEP 349', 11, 0),
(894, '20260350', 'Aluno da EEEP 350', 11, 0),
(895, '20260351', 'Aluno da EEEP 351', 11, 0),
(896, '20260352', 'Aluno da EEEP 352', 11, 0),
(897, '20260353', 'Aluno da EEEP 353', 11, 0),
(898, '20260354', 'Aluno da EEEP 354', 11, 0),
(899, '20260355', 'Aluno da EEEP 355', 11, 0),
(900, '20260356', 'Aluno da EEEP 356', 11, 0),
(901, '20260357', 'Aluno da EEEP 357', 11, 0),
(902, '20260358', 'Aluno da EEEP 358', 11, 0),
(903, '20260359', 'Aluno da EEEP 359', 11, 0),
(904, '20260360', 'Aluno da EEEP 360', 11, 0),
(905, '20260361', 'Aluno da EEEP 361', 3, 0),
(906, '20260362', 'Aluno da EEEP 362', 3, 0),
(907, '20260363', 'Aluno da EEEP 363', 3, 0),
(908, '20260364', 'Aluno da EEEP 364', 3, 0),
(909, '20260365', 'Aluno da EEEP 365', 3, 0),
(910, '20260366', 'Aluno da EEEP 366', 3, 0),
(911, '20260367', 'Aluno da EEEP 367', 3, 0),
(912, '20260368', 'Aluno da EEEP 368', 3, 0),
(913, '20260369', 'Aluno da EEEP 369', 3, 0),
(914, '20260370', 'Aluno da EEEP 370', 3, 0),
(915, '20260371', 'Aluno da EEEP 371', 3, 0),
(916, '20260372', 'Aluno da EEEP 372', 3, 0),
(917, '20260373', 'Aluno da EEEP 373', 3, 0),
(918, '20260374', 'Aluno da EEEP 374', 3, 0),
(919, '20260375', 'Aluno da EEEP 375', 3, 0),
(920, '20260376', 'Aluno da EEEP 376', 3, 0),
(921, '20260377', 'Aluno da EEEP 377', 3, 0),
(922, '20260378', 'Aluno da EEEP 378', 3, 0),
(923, '20260379', 'Aluno da EEEP 379', 3, 0),
(924, '20260380', 'Aluno da EEEP 380', 3, 0),
(925, '20260381', 'Aluno da EEEP 381', 3, 0),
(926, '20260382', 'Aluno da EEEP 382', 3, 0),
(927, '20260383', 'Aluno da EEEP 383', 3, 0),
(928, '20260384', 'Aluno da EEEP 384', 3, 0),
(929, '20260385', 'Aluno da EEEP 385', 3, 0),
(930, '20260386', 'Aluno da EEEP 386', 3, 0),
(931, '20260387', 'Aluno da EEEP 387', 3, 0),
(932, '20260388', 'Aluno da EEEP 388', 3, 0),
(933, '20260389', 'Aluno da EEEP 389', 3, 0),
(934, '20260390', 'Aluno da EEEP 390', 3, 0),
(935, '20260391', 'Aluno da EEEP 391', 3, 0),
(936, '20260392', 'Aluno da EEEP 392', 3, 0),
(937, '20260393', 'Aluno da EEEP 393', 3, 0),
(938, '20260394', 'Aluno da EEEP 394', 3, 0),
(939, '20260395', 'Aluno da EEEP 395', 3, 0),
(940, '20260396', 'Aluno da EEEP 396', 3, 0),
(941, '20260397', 'Aluno da EEEP 397', 3, 0),
(942, '20260398', 'Aluno da EEEP 398', 3, 0),
(943, '20260399', 'Aluno da EEEP 399', 3, 0),
(944, '20260400', 'Aluno da EEEP 400', 3, 0),
(945, '20260401', 'Aluno da EEEP 401', 3, 0),
(946, '20260402', 'Aluno da EEEP 402', 3, 0),
(947, '20260403', 'Aluno da EEEP 403', 3, 0),
(948, '20260404', 'Aluno da EEEP 404', 3, 0),
(949, '20260405', 'Aluno da EEEP 405', 3, 0),
(950, '20260406', 'Aluno da EEEP 406', 6, 0),
(951, '20260407', 'Aluno da EEEP 407', 6, 0),
(952, '20260408', 'Aluno da EEEP 408', 6, 0),
(953, '20260409', 'Aluno da EEEP 409', 6, 0),
(954, '20260410', 'Aluno da EEEP 410', 6, 0),
(955, '20260411', 'Aluno da EEEP 411', 6, 0),
(956, '20260412', 'Aluno da EEEP 412', 6, 0),
(957, '20260413', 'Aluno da EEEP 413', 6, 0),
(958, '20260414', 'Aluno da EEEP 414', 6, 0),
(959, '20260415', 'Aluno da EEEP 415', 6, 0),
(960, '20260416', 'Aluno da EEEP 416', 6, 0),
(961, '20260417', 'Aluno da EEEP 417', 6, 0),
(962, '20260418', 'Aluno da EEEP 418', 6, 0),
(963, '20260419', 'Aluno da EEEP 419', 6, 0),
(964, '20260420', 'Aluno da EEEP 420', 6, 0),
(965, '20260421', 'Aluno da EEEP 421', 6, 0),
(966, '20260422', 'Aluno da EEEP 422', 6, 0),
(967, '20260423', 'Aluno da EEEP 423', 6, 0),
(968, '20260424', 'Aluno da EEEP 424', 6, 0),
(969, '20260425', 'Aluno da EEEP 425', 6, 0),
(970, '20260426', 'Aluno da EEEP 426', 6, 0),
(971, '20260427', 'Aluno da EEEP 427', 6, 0),
(972, '20260428', 'Aluno da EEEP 428', 6, 0),
(973, '20260429', 'Aluno da EEEP 429', 6, 0),
(974, '20260430', 'Aluno da EEEP 430', 6, 0),
(975, '20260431', 'Aluno da EEEP 431', 6, 0),
(976, '20260432', 'Aluno da EEEP 432', 6, 0),
(977, '20260433', 'Aluno da EEEP 433', 6, 0),
(978, '20260434', 'Aluno da EEEP 434', 6, 0),
(979, '20260435', 'Aluno da EEEP 435', 6, 0),
(980, '20260436', 'Aluno da EEEP 436', 6, 0),
(981, '20260437', 'Aluno da EEEP 437', 6, 0),
(982, '20260438', 'Aluno da EEEP 438', 6, 0),
(983, '20260439', 'Aluno da EEEP 439', 6, 0),
(984, '20260440', 'Aluno da EEEP 440', 6, 0),
(985, '20260441', 'Aluno da EEEP 441', 6, 0),
(986, '20260442', 'Aluno da EEEP 442', 6, 0),
(987, '20260443', 'Aluno da EEEP 443', 6, 0),
(988, '20260444', 'Aluno da EEEP 444', 6, 0),
(989, '20260445', 'Aluno da EEEP 445', 6, 0),
(990, '20260446', 'Aluno da EEEP 446', 6, 0),
(991, '20260447', 'Aluno da EEEP 447', 6, 0),
(992, '20260448', 'Aluno da EEEP 448', 6, 0),
(993, '20260449', 'Aluno da EEEP 449', 6, 0),
(994, '20260450', 'Aluno da EEEP 450', 6, 0),
(995, '20260451', 'Aluno da EEEP 451', 9, 0),
(996, '20260452', 'Aluno da EEEP 452', 9, 0),
(997, '20260453', 'Aluno da EEEP 453', 9, 0),
(998, '20260454', 'Aluno da EEEP 454', 9, 0),
(999, '20260455', 'Aluno da EEEP 455', 9, 0),
(1000, '20260456', 'Aluno da EEEP 456', 9, 0),
(1001, '20260457', 'Aluno da EEEP 457', 9, 0),
(1002, '20260458', 'Aluno da EEEP 458', 9, 0),
(1003, '20260459', 'Aluno da EEEP 459', 9, 0),
(1004, '20260460', 'Aluno da EEEP 460', 9, 0),
(1005, '20260461', 'Aluno da EEEP 461', 9, 0),
(1006, '20260462', 'Aluno da EEEP 462', 9, 0),
(1007, '20260463', 'Aluno da EEEP 463', 9, 0),
(1008, '20260464', 'Aluno da EEEP 464', 9, 0),
(1009, '20260465', 'Aluno da EEEP 465', 9, 0),
(1010, '20260466', 'Aluno da EEEP 466', 9, 0),
(1011, '20260467', 'Aluno da EEEP 467', 9, 0),
(1012, '20260468', 'Aluno da EEEP 468', 9, 0),
(1013, '20260469', 'Aluno da EEEP 469', 9, 0),
(1014, '20260470', 'Aluno da EEEP 470', 9, 0),
(1015, '20260471', 'Aluno da EEEP 471', 9, 0),
(1016, '20260472', 'Aluno da EEEP 472', 9, 0),
(1017, '20260473', 'Aluno da EEEP 473', 9, 0),
(1018, '20260474', 'Aluno da EEEP 474', 9, 0),
(1019, '20260475', 'Aluno da EEEP 475', 9, 0),
(1020, '20260476', 'Aluno da EEEP 476', 9, 0),
(1021, '20260477', 'Aluno da EEEP 477', 9, 0),
(1022, '20260478', 'Aluno da EEEP 478', 9, 0),
(1023, '20260479', 'Aluno da EEEP 479', 9, 0),
(1024, '20260480', 'Aluno da EEEP 480', 9, 0),
(1025, '20260481', 'Aluno da EEEP 481', 9, 0),
(1026, '20260482', 'Aluno da EEEP 482', 9, 0),
(1027, '20260483', 'Aluno da EEEP 483', 9, 0),
(1028, '20260484', 'Aluno da EEEP 484', 9, 0),
(1029, '20260485', 'Aluno da EEEP 485', 9, 0),
(1030, '20260486', 'Aluno da EEEP 486', 9, 0),
(1031, '20260487', 'Aluno da EEEP 487', 9, 0),
(1032, '20260488', 'Aluno da EEEP 488', 9, 0),
(1033, '20260489', 'Aluno da EEEP 489', 9, 0),
(1034, '20260490', 'Aluno da EEEP 490', 9, 0),
(1035, '20260491', 'Aluno da EEEP 491', 9, 0),
(1036, '20260492', 'Aluno da EEEP 492', 9, 0),
(1037, '20260493', 'Aluno da EEEP 493', 9, 0),
(1038, '20260494', 'Aluno da EEEP 494', 9, 0),
(1039, '20260495', 'Aluno da EEEP 495', 9, 0),
(1040, '20260496', 'Aluno da EEEP 496', 12, 0),
(1041, '20260497', 'Aluno da EEEP 497', 12, 0),
(1042, '20260498', 'Aluno da EEEP 498', 12, 0),
(1043, '20260499', 'Aluno da EEEP 499', 12, 0),
(1044, '20260500', 'Aluno da EEEP 500', 12, 0),
(1045, '20260501', 'Aluno da EEEP 501', 12, 0),
(1046, '20260502', 'Aluno da EEEP 502', 12, 0),
(1047, '20260503', 'Aluno da EEEP 503', 12, 0),
(1048, '20260504', 'Aluno da EEEP 504', 12, 0),
(1049, '20260505', 'Aluno da EEEP 505', 12, 0),
(1050, '20260506', 'Aluno da EEEP 506', 12, 0),
(1051, '20260507', 'Aluno da EEEP 507', 12, 0),
(1052, '20260508', 'Aluno da EEEP 508', 12, 0),
(1053, '20260509', 'Aluno da EEEP 509', 12, 0),
(1054, '20260510', 'Aluno da EEEP 510', 12, 0),
(1055, '20260511', 'Aluno da EEEP 511', 12, 0),
(1056, '20260512', 'Aluno da EEEP 512', 12, 0),
(1057, '20260513', 'Aluno da EEEP 513', 12, 0),
(1058, '20260514', 'Aluno da EEEP 514', 12, 0),
(1059, '20260515', 'Aluno da EEEP 515', 12, 0),
(1060, '20260516', 'Aluno da EEEP 516', 12, 0),
(1061, '20260517', 'Aluno da EEEP 517', 12, 0),
(1062, '20260518', 'Aluno da EEEP 518', 12, 0),
(1063, '20260519', 'Aluno da EEEP 519', 12, 0),
(1064, '20260520', 'Aluno da EEEP 520', 12, 0),
(1065, '20260521', 'Aluno da EEEP 521', 12, 0),
(1066, '20260522', 'Aluno da EEEP 522', 12, 0),
(1067, '20260523', 'Aluno da EEEP 523', 12, 0),
(1068, '20260524', 'Aluno da EEEP 524', 12, 0),
(1069, '20260525', 'Aluno da EEEP 525', 12, 0),
(1070, '20260526', 'Aluno da EEEP 526', 12, 0),
(1071, '20260527', 'Aluno da EEEP 527', 12, 0),
(1072, '20260528', 'Aluno da EEEP 528', 12, 0),
(1073, '20260529', 'Aluno da EEEP 529', 12, 0),
(1074, '20260530', 'Aluno da EEEP 530', 12, 0),
(1075, '20260531', 'Aluno da EEEP 531', 12, 0),
(1076, '20260532', 'Aluno da EEEP 532', 12, 0),
(1077, '20260533', 'Aluno da EEEP 533', 12, 0),
(1078, '20260534', 'Aluno da EEEP 534', 12, 0),
(1079, '20260535', 'Aluno da EEEP 535', 12, 0),
(1080, '20260536', 'Aluno da EEEP 536', 12, 0),
(1081, '20260537', 'Aluno da EEEP 537', 12, 0),
(1082, '20260538', 'Aluno da EEEP 538', 12, 0),
(1083, '20260539', 'Aluno da EEEP 539', 12, 0),
(1084, '20260540', 'Aluno da EEEP 540', 12, 0),
(1085, '20260001', 'Aluno da EEEP 01', 1, 20),
(1086, '12039812', 'bRENA', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `autorizacoes`
--

CREATE TABLE `autorizacoes` (
  `id` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `observacao` varchar(255) NOT NULL DEFAULT 'Sem observação',
  `data_emissao` datetime NOT NULL,
  `entrada` time DEFAULT NULL,
  `saida` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `autorizacoes`
--

INSERT INTO `autorizacoes` (`id`, `id_aluno`, `id_usuario`, `tipo`, `observacao`, `data_emissao`, `entrada`, `saida`) VALUES
(28, 1085, 1, 'saida_almoco', 'asdfafsd', '2026-06-09 16:21:58', '00:00:00', '00:00:00'),
(29, 1085, 1, 'saida', 'Tava dormindo aluno nojento velho esquisito ', '2026-06-09 20:51:38', '00:00:00', '09:00:00'),
(30, 1085, 1, 'fardamento_incompleto', 'KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK', '2026-06-09 21:08:45', '00:00:00', '00:00:00'),
(31, 1085, 1, 'saida', 'tava futricando os ovos na aula ', '2026-06-10 06:17:53', '00:00:00', '09:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome_curso`) VALUES
(1, 'Desenvolvimento de Sistemas'),
(2, 'Eletromecânica'),
(3, 'Multimídia'),
(4, 'Produção de Áudio e Vídeo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `series`
--

CREATE TABLE `series` (
  `id_serie` int(11) NOT NULL,
  `nome_serie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `series`
--

INSERT INTO `series` (`id_serie`, `nome_serie`) VALUES
(1, '1º Ano'),
(2, '2º Ano'),
(3, '3º Ano');

-- --------------------------------------------------------

--
-- Estrutura para tabela `turmas`
--

CREATE TABLE `turmas` (
  `id_turma` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_serie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `turmas`
--

INSERT INTO `turmas` (`id_turma`, `id_curso`, `id_serie`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3),
(7, 3, 1),
(8, 3, 2),
(9, 3, 3),
(10, 4, 1),
(11, 4, 2),
(12, 4, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `login`, `senha`) VALUES
(1, 'Mateus', 'mateus280808@gmail.com', 'admin', '$2y$10$fMiWfUYNM/B5ffsCg4qdleQborTHyya37DP2eSIse2cPlryvtGZqW');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_acessos_usuarios` (`id_usuario`);

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`),
  ADD UNIQUE KEY `UQ_Matricula` (`matricula`),
  ADD KEY `fk_alunos_turmas` (`id_turma`);

--
-- Índices de tabela `autorizacoes`
--
ALTER TABLE `autorizacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_autorizacoes_alunos` (`id_aluno`),
  ADD KEY `fk_autorizacoes_usuarios` (`id_usuario`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices de tabela `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id_serie`);

--
-- Índices de tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `fk_turmas_series` (`id_serie`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acessos`
--
ALTER TABLE `acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1087;

--
-- AUTO_INCREMENT de tabela `autorizacoes`
--
ALTER TABLE `autorizacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `series`
--
ALTER TABLE `series`
  MODIFY `id_serie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `acessos`
--
ALTER TABLE `acessos`
  ADD CONSTRAINT `fk_acessos_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Restrições para tabelas `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `fk_alunos_turmas` FOREIGN KEY (`id_turma`) REFERENCES `turmas` (`id_turma`);

--
-- Restrições para tabelas `autorizacoes`
--
ALTER TABLE `autorizacoes`
  ADD CONSTRAINT `fk_autorizacoes_alunos` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id_aluno`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_autorizacoes_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
