CREATE TABLE profile (
	profileId BINARY(16)
	profileHandle VARCHAR (32)
	profielEmail VARCHAR (128)
	profilePhone VARCHAR (32)
	profileHash CHAR (128)
	profileSalt CHAR (64)
);
CREATE TABLE post (
	postId BINARY(16)
	postProfileId BINARY (16)
	postTitle VARCHAR (140)
	postContent VARCHAR (65536)
	postDate DATETIME (6)
);

CREATE TABLE comment (
	commentId BINARY (16)
	commentPostId BINARY (16)
	commentProfileId BINARY (16)
	commentTitle VARCHAR (128)
	commentContent VARCHAR (65536)
	commentDate DATETIME (6)
	commentCommentId (16)
)