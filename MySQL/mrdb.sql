CREATE TABLE user (
  user_id int NOT NULL AUTO_INCREMENT,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  name varchar(255) NOT NULL,
  date_joined DATETIME DEFAULT CURRENT_TIMESTAMP,
  access_level int DEFAULT 2,
  PRIMARY KEY  (user_id)
);

INSERT INTO user (email, password, name, access_level)
  values ('ben.mccarty@live.com', 'testpassword', 'Ben', 0);

CREATE TABLE question_deck (
  question_id int NOT NULL AUTO_INCREMENT,
  approved Boolean NOT NULL DEFAULT 0,
  entered_by_user int NOT NULL DEFAULT 1,
  best_worst_question varchar(5) NOT NULL DEFAULT 'Best',
  person varchar(255),
  question varchar(255) NOT NULL,
  date_entered DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (question_id)
);

INSERT INTO question_deck (approved, person, question)
  values (1, 'Matt Damon', 'Best Matt Damon Movie');
