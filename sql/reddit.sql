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
	postContent VARCHAR (65536) NOT NULL
	postDate DATETIME (6) NOT NULL
);

create table comment (
	commentid binary (16) NOT NULL
	commentpostid binary (16) NOT NULL
	commentprofileid binary (16) NOT NULL
	commenttitle varchar (128) NOT NULL
	commentcontent varchar (65536) NOT NULL
	commentdate datetime (6) NOT NULL
	commentcommentid (16)
)


	statement

	insert into profile (profileid)
	values(
	unhel(replace("dc12ace9-3796-4902-931c-722e4f19bfd2"))

	delete from profile where profilehandle;
	where profilehandle like%dolphins%;

	update profilephone
	set profilephone = "+5058883323"
	where profileid = "dc12ace9-3796-4902-931c-722e4f19bfd2"

	select profileemail
	from profile
	where profileemail like "%@cnm%"


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

	update commenttitle
	set commenttitle = "where code will take us"

	select commentid
	from comment
	when commentcontent like "danceclub"
