CREATE TABLE profile (
	profileId BINARY(16) NOT NULL
	profileHandle VARCHAR (32) NOT NULL
	profielEmail VARCHAR (128) NOT NULL
	profilePhone VARCHAR (32)
	profileHash CHAR (128) NOT NULL
	profileSalt CHAR (64) NOT NULL
);
CREATE TABLE post (
	postId BINARY(16) NOT NULL
	postProfileId BINARY (16) NOT NULL
	postTitle VARCHAR (140) NOT NULL
	postContent VARCHAR (3000) NOT NULL
	postDate DATETIME (6) NOT NULL
);

create table comment (
	commentsId binary (16) NOT NULL
	commentsPostid binary (16) NOT NULL
	commentsProfileId binary (16) NOT NULL
	commentsTitle varchar (128) NOT NULL
	commentsContent varchar (3000) NOT NULL
	commentsDate datetime (6) NOT NULL
	commentCommentId (16)
)




	INSERT INTO post (postContent)
	VALUE



	delete from profile where profileHandle;
	where profileHandle like%dolphins%;

	update profilePhone
	set profilePhone = "+5058883323"
	where profileid = "dc12ace9-3796-4902-931c-722e4f19bfd2"

	select profileEmail
	from profile
	where profileEmail like "%@cnm%"


	insert into post (posttitle)
	values("the great bambino")

	delete from post where postcontent like "%mastermind%"

	update postdate
	set postdate = "today"

	select posttitle
	from post
	where profilehandle like "superheron"


	insert into comment (commentcontent)
	values("i wanna rock")

	delete from comment where commentdate < 06/01/2017

	update commentTitle
	set commenttitle = "where code will take us"

	select commentId
	from comment
	when commentcontent like "danceclub"

INSERT INTO profile (profileId, profileHandle, profileEmail, profilePhone, profileHash, profileSalt)
VALUES(
-- generated UUID for profile id converted to binary
UNHEX(REPLACE('dc12ace9-3796-4902-931c-722e4f19bfd2','-', '')),
-- profile handle chosen by user
'mdavid',
-- email
'mcdavid3636@gmail.com'
'50599864252','894e65fe9b536b64d7a1940e46ec9cb923fab7f1d63be350b43106851235cb23e798e19a85fee1ecd84e988dbbbf1c59881b003d94f9a23dcfd132fca5ef27bd'
,'d79d674bb81c24fff3a8af16cb4c6c2b28eec296d4c05745d08e9178e3144f5d2478564'
);

DELETE FROM profile WHERE profileId = 'dc12ace9-3796-4902-931c-722e4f19bfd2';

UPDATE profile
SET profileId =

SELECT profileId, profileHandle, profilePhone
FROM profile
WHERE profileId = 'dc12ace9-3796-4902-931c-722e4f19bfd2'

