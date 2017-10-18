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

	INSERT INTO profile (profileId)
	VALUES(
	UNHEL(REPLACE("dc12ace9-3796-4902-931c-722e4f19bfd2"))

	DELETE FROM profile WHERE profileHandle;
	WHERE profileHandle Like%dolphins%;

	UPDATE profilePhone
	SET profilePhone = "+5058883323"
	WHERE profileId = "dc12ace9-3796-4902-931c-722e4f19bfd2"

	SELECT profileEmail
	FROM profile
	WHERE profileEmail Like "%@cnm%"


	INSERT INTO post (postTitle)
	VALUES("The great Bambino")

	DELETE FROM post WHERE postContent LIKE "%mastermind%"

	UPDATE postDate
	Set postDate = "today"

	SELECT postTitle
	FROM post
	WHERE profileHandle like "superheron"


	INSERT INTO comment (commentContent)
	VALUES("I wanna rock")

	DELETE FROM comment WHERE commentDate < 06/01/2017

	UPDATE commentTitle
	SET commentTitle = "where code will take us"

	SELECT commentId
	FROM comment
	WHEN commentContent LIKE "danceclub"
