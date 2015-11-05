CREATE TABLE users(
  id INT PRIMARY KEY auto_increment,
  username VARCHAR(50) NOT NULL ,
  password VARCHAR(100) NOT NULL
);

CREATE TABLE blogs(
  id INT PRIMARY KEY auto_increment,
  name VARCHAR (100) NOT NULL ,
  desctext VARCHAR (200) NOT NULL ,
  contents TEXT NOT NULL,
  imgurl VARCHAR (100) NOT NULL ,
  zan INT DEFAULT 0,
  date VARCHAR (50) NOT NULL
);

CREATE TABLE tag(
  id INT PRIMARY KEY auto_increment,
  name VARCHAR (20) NOT NULL
);

CREATE TABLE blogs_tag_table(
  id INT PRIMARY KEY auto_increment,
  blog_id INT NOT NULL ,
  tag_id INT NOT NULL ,
  FOREIGN KEY (blog_id) REFERENCES blogs (id),
  FOREIGN KEY (tag_id) REFERENCES tag (id)
);

CREATE TABLE comments(
  id INT PRIMARY KEY auto_increment,
  contents VARCHAR (200) NOT NULL ,
  date TIME NOT NULL,
  blog_id INT NOT null,
  FOREIGN KEY (blog_id) REFERENCES blogs (id)
);


INSERT INTO users VALUES (1,"wer","123");

INSERT INTO tag VALUES (1,"编程");
INSERT INTO tag VALUES (2,"技术");
INSERT INTO tag VALUES (3,"架构");
