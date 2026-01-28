USE sistema_clinica;

INSERT INTO usuarios (username, password) VALUES
('user1', '$2y$10$09hqcAb3cO8Z37OtL3i.teI9T9RCfHnNYejCtI1YpwAfnPkdWD0S'),
('user2', '$2y$10$09hqcAb3cO8Z37OtL3i.teI9T9RCfHnNYejCtI1YpwAfnPkdWD0S'),
('user3', '$2y$10$09hqcAb3cO8Z37OtL3i.teI9T9RCfHnNYejCtI1YpwAfnPkdWD0S'),
('user4', '$2y$10$09hqcAb3cO8Z37OtL3i.teI9T9RCfHnNYejCtI1YpwAfnPkdWD0S'),
('user5', '$2y$10$09hqcAb3cO8Z37OtL3i.teI9T9RCfHnNYejCtI1YpwAfnPkdWD0S');

INSERT INTO medicos (nome, especialidade, usuario_id) VALUES
('Fagner', 'Dentista', 1),
('Elton', 'Ortopedia', 2),
('Fabio', 'Cardiologia', 3),
('Lucas', 'Pediatria', 4),
('Ravi', 'Clínico Geral', 5);

INSERT INTO imagens (path) VALUES ('perfil.jpg');

INSERT INTO pacientes (nome, data_nascimento, tipo_sanguineo, imagem_id) VALUES
('paciente 1', '2001-02-01','A+',1),
('paciente 2', '2000-03-01','AB+',1),
('paciente 3', '2000-02-12','B-',1),
('paciente 4', '2020-11-06','O+',1),
('paciente 5', '2000-02-01','A-',1);

INSERT INTO consultas (observacoes, data_hora, medico_id, paciente_id) VALUES
('dente quebrado', NOW(), 1, 5),
('Fratura simples de rádio', NOW(), 2, 4),
('dor constante no peito', NOW(), 3, 3),
('Asma leve intermitente', NOW(), 4, 2),
('gripado a mais de 2 semanas e as vezes sente tontura', NOW(), 5, 1);