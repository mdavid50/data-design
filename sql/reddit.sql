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

create table comment (
	commentid binary (16)
	commentpostid binary (16)
	commentprofileid binary (16)
	commenttitle varchar (128)
	commentcontent varchar (65536)
	commentdate datetime (6)
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
