-- Insertion des utilisateurs
INSERT INTO users (id, name, email, password, role) VALUES
  (1, 'Admin User', 'admin@example.com', '$2y$10$tzg.YfpNth7aUm30eINBvuT/H3p4sQ7R2su3jBZGI9CQlB0e3u1xW', 'admin'),
  (2, 'John Doe', 'user@example.com', '$2y$10$tzg.YfpNth7aUm30eINBvuT/H3p4sQ7R2su3jBZGI9CQlB0e3u1xW', 'user'),
  (3, 'Jane Smith', 'user2@example.com', '$2y$10$tzg.YfpNth7aUm30eINBvuT/H3p4sQ7R2su3jBZGI9CQlB0e3u1xW', 'user');

-- Insertion des compétences
INSERT INTO skills (id, name) VALUES
  (1, 'HTML'),
  (2, 'CSS'),
  (3, 'JavaScript'),
  (4, 'PHP'),
  (5, 'MySQL'),
  (6, 'Python'),
  (7, 'Java'),
  (8, 'C#');

-- Insertion des projets
INSERT INTO projects (id, title, description, user_id, image) VALUES
  (1, 'Admin Project 1', 'Description pour Admin Project 1', 1, '/public/uploads/default.jpg'),
  (2, 'Admin Project 2', 'Description pour Admin Project 2', 1, '/public/uploads/default.jpg'),
  (3, 'Admin Project 3', 'Description pour Admin Project 3', 1, '/public/uploads/default.jpg'),
  (4, 'John\'s Project 1', 'Description pour John\'s Project 1', 2, '/public/uploads/default.jpg'),
  (5, 'John\'s Project 2', 'Description pour John\'s Project 2', 2, '/public/uploads/default.jpg'),
  (6, 'John\'s Project 3', 'Description pour John\'s Project 3', 2, '/public/uploads/default.jpg'),
  (7, 'Jane\'s Project 1', 'Description pour Jane\'s Project 1', 3, '/public/uploads/default.jpg'),
  (8, 'Jane\'s Project 2', 'Description pour Jane\'s Project 2', 3, '/public/uploads/default.jpg'),
  (9, 'Jane\'s Project 3', 'Description pour Jane\'s Project 3', 3, '/public/uploads/default.jpg');

-- Lier les projets aux compétences
INSERT INTO project_skills (project_id, skill_id) VALUES
  (1, 1),
  (1, 2),
  (1, 3),
  (2, 4),
  (2, 5),
  (3, 6),
  (3, 7),

  (4, 1),
  (4, 3),
  (5, 4),
  (5, 5),
  (6, 6),

  (7, 2),
  (7, 3),
  (8, 4),
  (8, 5),
  (9, 7);
