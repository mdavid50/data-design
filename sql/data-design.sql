DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS post;
DROP TABLE IF EXISTS profile;

CREATE TABLE profile (
  profileId BINARY(16) NOT NULL,
  profileHandle VARCHAR (32) NOT NULL,
  profielEmail VARCHAR (128) NOT NULL,
  profilePhone VARCHAR (32),
  profileHash CHAR (128) NOT NULL,
  profileSalt CHAR (64) NOT NULL,
  PRIMARY KEY (profileId),
  UNIQUE (profileHandle),
  UNIQUE (profileEmail)
);
CREATE TABLE post (
  postId BINARY(16) NOT NULL,
  postProfileId BINARY (16) NOT NULL,
  postTitle VARCHAR (140) NOT NULL,
  postContent VARCHAR (3000) NOT NULL,
  postDate DATETIME (6) NOT NULL
  PRIMARY KEY (postId),
  FOREIGN KEY (postProfileId)
);

CREATE TABLE comments (
  commentsId BINARY (16) NOT NULL,
  commentsPostId BINARY (16) NOT NULL,
  commentsProfileId BINARY (16) NOT NULL,
  commentsTitle VARCHAR (128) NOT NULL,
  commentsContent VARCHAR (3000) NOT NULL,
  commentsDate DATETIME (6) NOT NULL,
  commentsCommentId BINARY (16)
  PRIMARY KEY (commentsId),
  FOREIGN KEY (commentsPostId),
  FOREIGN KEY (commentsProfileId)
);