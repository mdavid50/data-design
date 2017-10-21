DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS post;
DROP TABLE IF EXISTS profile;

CREATE TABLE profile (
  profileId BINARY(16) NOT NULL,
  profileHandle VARCHAR (32) NOT NULL,
  profileEmail VARCHAR (128) NOT NULL,
  profilePhone VARCHAR (32),
  profileHash CHAR (128) NOT NULL,
  profileSalt CHAR (64) NOT NULL,
  UNIQUE (profileHandle),
  UNIQUE (profileEmail),
  PRIMARY KEY (profileId)
);

CREATE TABLE post (
  postId BINARY(16) NOT NULL,
  postProfileId BINARY (16) NOT NULL,
  postTitle VARCHAR (140) NOT NULL,
  postContent VARCHAR (3000) NOT NULL,
  postDate DATETIME (6) NOT NULL,
  INDEX (postProfileId),
  FOREIGN KEY (postProfileId) REFERENCES profile(profileId),
  PRIMARY KEY (postId)
);

CREATE TABLE comments (
  commentsId BINARY (16) NOT NULL,
  commentsPostId BINARY (16) NOT NULL,
  commentsProfileId BINARY (16) NOT NULL,
  commentsTitle VARCHAR (128) NOT NULL,
  commentsContent VARCHAR (3000) NOT NULL,
  commentsDate DATETIME (6) NOT NULL,
  commentsCommentId BINARY (16),
  INDEX(commentsPostId),
  INDEX (commentsProfileId),
  FOREIGN KEY (commentsPostId) REFERENCES post(postId),
  FOREIGN KEY (commentsProfileId) REFERENCES profile(profileId),
  PRIMARY KEY (commentsId)
);

INSERT INTO profile (profileId, profileHandle, profileEmail, profilePhone, profileHash, profileSalt)
VALUES(
  -- generated UUID for profile id converted to binary
   UNHEX(REPLACE('dc12ace9-3796-4902-931c-722e4f19bfd2','-', '')),
  -- profile handle chosen by user
  'mdavid',
  -- email
 'mcdavid3636@gmail.com',
  '50599864252','894e65fe9b536b64d7a1940e46ec9cb923fab7f1d63be350b43106851235cb23e798e19a85fee1ecd84e988dbbbf1c59881b003d94f9a23dcfd132fca5ef27bd', 'd79d674bb81c24fff3a8af16cb4c6c2b28eec296d4c05745d08e9178e3144f5d2478564'
);

INSERT INTO post (postId, postProfileId, postTitle, postContent, postDate)
    VALUES(
        -- genereated UUID for post id converted to binary
        UNHEX(REPLACE('db910b19-11c8-4087-b0c1-d33b92ca74b3','-', '')),
      -- post profile id converted from binary


)