DROP TABLE user;
DROP TABLE question_deck;

CREATE TABLE user (
  user_id int NOT NULL AUTO_INCREMENT,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  name varchar(255) NOT NULL,
  date_joined DATETIME DEFAULT CURRENT_TIMESTAMP,
  last_logged DATETIME DEFAULT CURRENT_TIMESTAMP,
  access_level int DEFAULT 2,
  PRIMARY KEY  (user_id)
);

INSERT INTO user (email, password, name, access_level)
  values ('ben.mccarty@live.com', '$2y$10$fN820gfRLtokxarpAGjtf.UOAFfydTmjz6g97tcXZ2FU5b7DyvSBy', 'Ben', 0);

CREATE TABLE question_deck (
  question_id int NOT NULL AUTO_INCREMENT,
  approved Boolean DEFAULT 0,
  entered_by_user int DEFAULT 0,
  best_worst_question varchar(5) DEFAULT 'Best',
  query_type varchar(255),
  tv_movie varchar(255),
  query varchar(255),
  image_path varchar(255),
  date_entered DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (question_id)
);
