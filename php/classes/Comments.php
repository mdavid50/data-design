<?php
namespace Edu\Cnm\DataDesign;

require_once ("autoloader.php");
require_once (dirname(__DIR__,2) . "../vendor/autoload.php");

use Ramsey\Uuid\Uuid;

/**
 * This is the Comments entity for reddit
 *
 * This is a creating tables to store date of comments made from by Profiles.
 *
 * @author Matt David <mcdav3636@gmail.com>
 * @version 3.0.0
 **/
class Comments implements \JsonSerializable {
    use ValidateDate;
    use ValidateUuid;
    /**
     * id for this Comments; this is the primary key
     * @var Uuid $postId
     **/
    private $commentsId;
    /**
     *  id for the Profile that sent this Comments; this is a foreign key
     * @var Uuid $commentsProfileId
     **/
    private $commentsProfileId;
    /**
     * id for post id; this is a foreign key
     * @var Uuid $commentsPostID
     **/
    private $commentsPostId;
    /**
     * id for the comments Comments; this is a foreign key
     * @var Uuid $commentsCommentsId
     **/
    private $commentsCommentsId;
    /**
     * title for comments
     * @var string $commentsTitle
     **/
    private $commentsTitle;
    /**
     * actual textual content of this comments
     * @var string $commentsContent
     **/
    private $commentsContent;
    /**
     * date and time this Comments was sent, in a php DateTime object
     * @var \DateTime $commentsDate
     **/
    private $commentsDate;

    /**
     * constructor for this Comments
     *
     * @param string|Uuid $newCommentsId id of this Comments or null if a new Post
     * @param string|Uuid $newCommentsProfileId id of the Profile that sent this comments
     * @param string|Uuid $newCommentsPostId id of the post this comments were made on
     * @param string|Uuid $newCommentsCommentsId id of the comments on comments
     * @param string $newCommentsTitle is title of comments made
     * @param string $newCommentsContent string containing actual comments data
     * @param\DateTime| string| null $newCommentsDate date and time Comments was sent or null if set to current date
     * and time
     * @throws \InvalidArgumentException if data types are not valid
     * @throws \RangeException if data values are out of bounds
     * @throws \TypeError if data types violate type hints
     * @throws \Exception if some other exception occurs
     * @Documentation https;// php.net/manual/en/language.oops5.decon.php
     **/
	public function __construct($newCommentsId, $newCommentsProfileId, $newCommentsPostId, $newCommentsCommentsId, string $newCommentsTitle, string $newCommentsContent, $newPostDate = null)
    {
        try {
            $this->setCommentsId($newCommentsId);
            $this->setCommentsProfileID($newCommentsProfileId);
            $this->setCommentsPostId($newCommentsPostId);
            $this->setCommentsCommentsId($newCommentsCommentsId);
            $this->setCommentsTitle($newCommentsTitle);
            $this->setCommentsContent($newCommentsContent);
            $this->setCommentsDate($newPostDate);
        }
            // determine what exception type was thrown
        catch (\InvalidArgumentException | \ RangeException | \Exception | \TypeError $exception) {
            $exceptionType = get_class($exception);
            throw(new $exceptionType($exception->getMessage(), 0, $exception));
        }
    }

    /**
     * accessor method for comments id
     *
     * @return Uuid value of comments id
     **/
	public function getCommentsId(): Uuid {
        return $this->commentsId;
    }
	/**
     * mutator method for comments id
     *
     * @param Uuid $newCommentsId new value of comments id
     * @throws \UnexpectedValueException if $newCommentsId is not a UUID
     **/
	public function setCommentsId($newCommentsId) : void {
        try {
            $uuid = self::validateUuid($newCommentsId);
        } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
            $exceptionType = get_class($exception);
            throw(new $exceptionType($exception->getMessage(), 0, $exception));
        }
        //convert and store the comments id
        $this->commentsId = $uuid;
    }
	/**
     * accessor method for comments profile id
     *
     * @return Uuid value of comments profile id
     **/
	public function getCommentsProfileId() {
        return $this->commentsProfileId;
    }
	/**
     * mutator method for comments profile id
     *
     * @param Uuid $newCommentsProfileId new value of comments profile id
     * @throws \UnexpectedValueException if $newCommentsProfileId is not a UUID
     **/
	public function setCommentsProfileId($newCommentsProfileId) : void {
        try {
            $uuid = self::validateUuid($newCommentsProfileId);
        } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
            $exceptionType = get_class($exception);
            throw(new $exceptionType($exception->getMessage(), 0, $exception));
        }
        //convert and store the comments profile id
        $this->commentsProfileId = $uuid;
    }
	/**
     * accessor method for comments post id
     *
     * @return Uuid value of comments post id
     **/
	public function getCommentsPostId() {
        return $this->commentsPostId;
    }
	/**
     * mutator method for comments post id
     *
     * @param Uuid $newCommentsPostId new value of comments post id
     * @throws \UnexpectedValueException if $newCommentsPostId is not a UUID
     **/
	public function setCommentsPostId($newCommentsPostId) : void {
        try {
            $uuid = self::validateUuid($newCommentsPostId);
        } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
            $exceptionType = get_class($exception);
            throw(new $exceptionType($exception->getMessage(), 0, $exception));
        }
        //convert and store the comments post id
        $this->commentsPostId = $uuid;
    }
	/**
     * accessor method for comments comments id
     *
     * @return Uuid value of comments comments id
     **/
	public function getCommentsCommentsId() {
        return $this->commentsCommentsId;
    }
	/**
     * mutator method for comments comments id
     *
     * @param Uuid $newCommentsCommentsId new value of comments comments id
     * @throws \UnexpectedValueException if $newCommentsCommentsId is not a UUID
     **/
	public function setCommentsCommentsId($newCommentsCommentsId) : void {
        try {
            $uuid = self::validateUuid($newCommentsCommentsId);
        } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
            $exceptionType = get_class($exception);
            throw(new $exceptionType($exception->getMessage(), 0, $exception));
        }
        //convert and store the comments comments id
        $this->commentsCommentsId = $uuid;
    }

    /**
     * accessor method for comments title
     *
     * @return string value of comments title
     **/
	public function getCommentsTitle() {
        return $this->commentsTitle;
    }
	/**
     * mutator method for comments content
     *
     * @param string $newCommentsTitle new value of comments title
     * @throws \InvalidArgumentException if $newCommentsTitle is not a string or insecure
     * @throws \RangeException if $newCommentsTitle is > 3000 characters
     *@throws \TypeError if $newCommentsTitle is not a string
     **/
	public function setCommentsTitle($newCommentsTitle) : void {
        //verify the post title is secure
        $newCommentsTitle = trim($newCommentsTitle);
        $newCommentsTitle = filter_var($newCommentsTitle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        if(empty($newCommentsTitle) === true) {
            throw(new \InvalidArgumentException("comments title is empty or insecure"));
        }
        //verify the comments title will fit in the database
        if(strlen($newCommentsTitle) > 3000) {
            throw(new \RangeException("comments title too large"));
        }
        //store the comments title
        $this->commentsTitle = $newCommentsTitle;
    }

	/**
     * accessor method for comments content
     *
     * @return string value of comments content
     **/
	public function getCommentsContent() {
        return $this->commentsContent;
    }
	/**
     * mutator method for comments content
     *
     * @param string $newCommentsContent new value of comments content
     * @throws \InvalidArgumentException if $newCommentsContent is not a string or insecure
     * @throws \RangeException if $newCommentsContent is > 3000 characters
     *@throws \TypeError if $newCommentsContent is not a string
     **/
	public function setCommentsContent($newCommentsContent) : void {
        //verify the post content is secure
        $newCommentsContent = trim($newCommentsContent);
        $newCommentsContent = filter_var($newCommentsContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        if(empty($newCommentsContent) === true) {
            throw(new \InvalidArgumentException("comments content is empty or insecure"));
        }
        //verify the comments content will fit in the database
        if(strlen($newCommentsContent) > 3000) {
            throw(new \RangeException("comments content too large"));
        }
        //store the comments content
        $this->commentsContent = $newCommentsContent;
    }
	/**
     * accessor method for comment date
     *
     * @return \DateTime value of comments date
     **/
	public function getCommentsDate() : \DateTime {
        return($this->commentsDate);
    }
	/**
     * mutator method for comments date
     *
     * @param \DateTime|string|null $newCommentsDate comments date as a DateTime object or string (or null to load the current time)
     * @throws \InvalidArgumentException if $newCommentsDate is not a valid object or string
     * @throws \RangeException if $newCommentsDate is a date that does not exist
     **/
	public function setCommentsDate($newCommentsDate = null) : void {
        // base case: if the date is null, use the current date and time
        if($newCommentsDate === null) {
            $this->commentsDate = new \DateTime();
            return;
        }
        // store the comments date using the ValidateDate trait
        try {
            $newCommentsDate = self::validateDateTime($newCommentsDate);
        } catch(\InvalidArgumentException | \RangeException $exception) {
            $exceptionType = get_class($exception);
            throw(new $exceptionType($exception->getMessage(), 0, $exception));
        }
        $this->commentsDate = $newCommentsDate;
    }

    /**
     * insert this Comments into mySQL
     *
     * @param \PDO $pdo PDO connection object
     * @throws \ PDOException when mySQL related error occur
     * @throws \TypeError if $pdo is not a PDO connection object
     **/
    public function insert(\PDO $pdo) : void {
// create query template
        $query = "INSERT INTO comments(commentsId,commentsProfileId, commentsPostId, commentsCommentsId, commentsTitle,
 commentsContent, commentsDate) VALUES(:commentsId, :commentsProfileId, :commentsPostId, :commentsCommentsId,
:commentsTitle, :commentsContent, :commentsDate)";
        $statement = $pdo->prepare($query);

// bind the member variables to the place holder in the template
        $formattedDate = $this->commentsDate->format("Y-m-d H:i:s.u");
        $parameters = ["commentsId" => $this->commentsId->getBytes(), "commentsProfileId" => $this->commentsProfileId->getBytes(),
        "commentsPostId" => $this->commentsPostId->getBytes(), "commentsCommentsId" => $this->commentsCommentsId->getBytes(),
         "commentsTitle" => $this->commentsTitle,   "commentsContent"=> $this->commentsContent, "commentsDate" => $formattedDate];
        $statement->execute($parameters);
    }

    /**
     * deletes this Comments from mySQL
     *
     * @param \PDO $pdo PDO connection object
     * @throws \PDOException when mySQL related error occur
     * @throws \TypeError if $pdo is not a PDO connection object
     **/
    public function delete(\PDO $pdo) : void {

        // create query template
        $query = 'DELETE FROM comments WHERE  commentsId = :commentsId';
        $statement = $pdo->prepare($query);

        // bind the member variables to the place holders in the template

        $parameters = ['commentsId' =>$this->commentsId->getBytes()];
        $statement-> execute($parameters);
    }

    /**
     * get the Comments by commentsId
     *
     * @param \PDO $pdo PDO connection object
     * @param string $commentsId comments id to search for
     * @return Comments|null Comments found or null if not found
     * @throws \PDOException when mySQL related errors occur
     * @throws \TypeError when a variable are not the correct data type
     **/
    public static function getCommentsByCommentsId(\PDO $pdo, string $commentsId) : ?Comments {
        // sanitize the comments Id before searching
        try{
            $commentsId = self::validateUuid($commentsId);
        } catch (\InvalidArgumentException| \RangeException | \Exception | \TypeError $exception) {
            throw(new \PDOException($exception->getMessage(),  0, $exception));
        }

        // create query template
        $query = "SELECT commentsId, commentsProfileId, commentsPostId, commentsCommentsId, commentsTitle, 
commentsContent, commentsDate FROM comments WHERE commentsId = :commentsId";
        $statement = $pdo->prepare($query);

        // bind the comments id to the place holder in the template
        $parameters = ["commentsId" => $commentsId->getBytes()];
        $statement->execute($parameters);

        // grab the comments from mySQL
        try {
            $comments = null;
            $statement->setFetchMode(\PDO::FETCH_ASSOC);
            $row = $statement->fetch();
            if($row !== false) {
                $comments= new comments($row["commentsId"], $row["commentsProfileId"], $row["commentsPostId"],
                $row["commentsCommentsId"], $row["commentsTitle"], $row["commentsContent"], $row["commentsDate"]);
            }
        } catch(\Exception $exception) {
            // if the row couldn't be converted, rethrow it
            throw(new \PDOException($exception->getMessage(), 0, $exception));
        }
        return($comments);
    }

    /**
     * get the comments by profile id
     *
     * @param \PDO $pdo PDO connection object
     * @param string $commentsProfileId profile id to search by
     * @return \SplFixedArray SplFixedArray of posts found
     * @throws \PDOException wen variables are not the correct date type
     **/
    public static function getCommentsByCommentsProfileId(\PDO $pdo, string $commentsProfileId) : \SplFixedArray{

        try {
            $commentsProfileId = self::validateUuid($commentsProfileId);
        } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
            throw(new \PDOException($exception->getMessage(), 0, $exception));
        }
// create query template
        $query = "SELECT commentsId, commentsProfileId, commentsPostId, commentsCommentsId, commentsTitle, 
commentsContent, commentsDate FROM comments WHERE commentsProfileId = :commentsProfileId";
        $statement = $pdo->prepare($query);

        // bind the comments profile id to the place holder in the template
        $parameters = ["commentsProfileId" => $commentsProfileId->getBytes()];
        $statement->execute($parameters);

        // grab the comments from mySQL
        try {
            $comments = null;
            $statement->setFetchMode(\PDO::FETCH_ASSOC);
            $row = $statement->fetch();
            if($row !== false) {
                $comments= new comments($row["commentsId"], $row["commentsProfileId"], $row["commentsPostId"],
                    $row["commentsCommentsId"], $row["commentsTitle"], $row["commentsContent"], $row["commentsDate"]);
            }
        } catch(\Exception $exception) {
            // if the row couldn't be converted, rethrow it
            throw(new \PDOException($exception->getMessage(), 0, $exception));
        }
        return($comments);
    }

    /**
     * get the comments by post id
     *
     * @param \PDO $pdo PDO connection object
     * @param string $commentsPostId post id to search by
     * @return \SplFixedArray SplFixedArray of posts found
     * @throws \PDOException wen variables are not the correct date type
     **/
    public static function getCommentsByCommentsPostId(\PDO $pdo, string $commentsPostId) : \SplFixedArray{

        try {
            $commentsPostId = self::validateUuid($commentsPostId);
        } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
            throw(new \PDOException($exception->getMessage(), 0, $exception));
        }
// create query template
        $query = "SELECT commentsId, commentsProfileId, commentsPostId, commentsCommentsId, commentsTitle, 
commentsContent, commentsDate FROM comments WHERE commentsProfileId = :commentsProfileId";
        $statement = $pdo->prepare($query);

        // bind the comments post id to the place holder in the template
        $parameters = ["commentsPostId" => $commentsPostId->getBytes()];
        $statement->execute($parameters);

        // grab the comments from mySQL
        try {
            $comments = null;
            $statement->setFetchMode(\PDO::FETCH_ASSOC);
            $row = $statement->fetch();
            if($row !== false) {
                $comments= new comments($row["commentsId"], $row["commentsProfileId"], $row["commentsPostId"],
                    $row["commentsCommentsId"], $row["commentsTitle"], $row["commentsContent"], $row["commentsDate"]);
            }
        } catch(\Exception $exception) {
            // if the row couldn't be converted, rethrow it
            throw(new \PDOException($exception->getMessage(), 0, $exception));
        }
        return($comments);
    }

    /**
     * get the comments by comments comments id
     *
     * @param \PDO $pdo PDO connection object
     * @param string $commentsCommentsId profile id to search by
     * @return \SplFixedArray SplFixedArray of posts found
     * @throws \PDOException wen variables are not the correct date type
     **/
    public static function getCommentsByCommentsCommentsId(\PDO $pdo, string $commentsCommentsId) : \SplFixedArray{

        try {
            $commentsCommentsId = self::validateUuid($commentsCommentsId);
        } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
            throw(new \PDOException($exception->getMessage(), 0, $exception));
        }
// create query template
        $query = "SELECT commentsId, commentsProfileId, commentsPostId, commentsCommentsId, commentsTitle, 
commentsContent, commentsDate FROM comments WHERE commentsCommentsId = :commentsCommentsId";
        $statement = $pdo->prepare($query);

        // bind the comments comments id to the place holder in the template
        $parameters = ["commentsCommentsId" => $commentsCommentsId->getBytes()];
        $statement->execute($parameters);

        // grab the comments from mySQL
        try {
            $comments = null;
            $statement->setFetchMode(\PDO::FETCH_ASSOC);
            $row = $statement->fetch();
            if($row !== false) {
                $comments= new comments($row["commentsId"], $row["commentsProfileId"], $row["commentsPostId"],
                    $row["commentsCommentsId"], $row["commentsTitle"], $row["commentsContent"], $row["commentsDate"]);
            }
        } catch(\Exception $exception) {
            // if the row couldn't be converted, rethrow it
            throw(new \PDOException($exception->getMessage(), 0, $exception));
        }
        return($comments);
    }

    /**
     * gets the Comments by title
     *
     * @param \PDO $pdo PDO connection object
     * @param string $commentsTitle comments title to search for
     * @return \SplFixedArray SplFixed array of Comments found
     * @throws \PDOException when mySQL related error occur
     * @throws \TypeError when variables are not the correct data type
     **/
    public  static function getPostByPostContent(\PDO $pdo, string $commentsTitle) : \SplFixedArray {
        // sanitize the description before searching
        $commentsTitle = trim($commentsTitle);
        $commentsTitle = filter_var($commentsTitle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        if(empty($commentTitle)=== true){
            throw(new \PDOException('comments content is invalid'));
        }

        // escape any mySQL wild cards
        $commentTitle = str_replace('_','\\_', str_replace('%', '\\%, $postContent'));

// create query template
        $query = "SELECT commentsId, commentsProfileId, commentsPostId, commentsCommentsId, commentsTitle, 
commentsContent, commentsDate FROM comments WHERE commentsTitle = :commentsTitle";
        $statement = $pdo->prepare($query);

        // bind the comments title to the place holder in the template
        $parameters = ["commentsTitle" => $commentsTitle];
        $statement->execute($parameters);


        // build an array of comments
        $comments = new \SplFixedArray($statement->rowCount());
        $statement->setFetchMode(\PDO ::FETCH_ASSOC);
        while (($row = $statement->fetch()) !==false) {
            try {
                $comments = new Comments($row['commentsId'], $row['commentsProfileId'], $row['commentsPostId'], $row['commentsCommentsId'],
                 $row['commentsTitle'], $row['commentsContent'], $row['commentsDate']);
                $comments->next();
            } catch (\Exception $exception){
                // if the row couldn't be converted, rethrow it
                throw (new \PDOException($exception->getMessage(), 0, $exception));
            }
        }
        return($comments);
    }

    /**
     * gets the Comments by content
     *
     * @param \PDO $pdo PDO connection object
     * @param string $commentsContent comments content to search for
     * @return \SplFixedArray SplFixed array of Comments found
     * @throws \PDOException when mySQL related error occur
     * @throws \TypeError when variables are not the correct data type
     **/
    public  static function getCommentsByCommentsContent(\PDO $pdo, string $commentsContent) : \SplFixedArray
    {
        // sanitize the description before searching
        $commentsContent = trim($commentsContent);
        $commentsContent = filter_var($commentsContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        if (empty($commentsContent) === true) {
            throw(new \PDOException('comments content is invalid'));
        }

        // escape any mySQL wild cards
        $commentsContent = str_replace('_', '\\_', str_replace('%', '\\%, $commentsContent'));

        // create query template
        $query = "SELECT commentsId, commentsProfileId, commentsPostId, commentsCommentsId, commentsTitle, 
commentsContent, commentsDate FROM comments WHERE commentsContent = :commentsContent";
        $statement = $pdo->prepare($query);

        // bind the comments content to the place holder in the template
        $parameters = ["commentsContent" => $commentsContent];
        $statement->execute($parameters);


        // build an array of comments
        $comments = new \SplFixedArray($statement->rowCount());
        $statement->setFetchMode(\PDO ::FETCH_ASSOC);
        while (($row = $statement->fetch()) !== false) {
            try {
                $comments = new Comments($row['commentsId'], $row['commentsProfileId'], $row['commentsPostId'], $row['commentsCommentsId'],
                    $row['commentsTitle'], $row['commentsContent'], $row['commentsDate']);
                $comments->next();
            } catch (\Exception $exception) {
                // if the row couldn't be converted, rethrow it
                throw (new \PDOException($exception->getMessage(), 0, $exception));
            }
        }
        return ($comments);
    }


        public function jsonSerialize() {
        $fields = get_object_vars($this);
        $fields["commentsId"] = $this->commentsId;
        $fields["commentsProfileId"] = $this->commentsProfileId;
        $fields["commentsPostId"] = $this->commentsPostId;
        $fields["commentsCommentsId"] = $this->commentsCommentsId;
        $fields["commentsContent"] = $this->commentsContent;
        //format the date so that the front end can consume it
        $fields["commentsDate"] = round(floatval($this->commentsDate->format("U.u")) * 1000);
        return($fields);
    }
}
