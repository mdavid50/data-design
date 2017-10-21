<?php
namespace Edu\Cnm\DataDesign;

require_once ("autoloader.php");
require_once (dirname(__DIR__,2) . "../vendor/autoloader.php");

use Ramsey\Uuid\Uuid;

/**
 * This is the Post entity for reddit
 *
 * This is a creating tables to store date of posts made from by Profiles.
 *
 * @author Matt David <mcdav3636@gmail.com>
 * @version 3.0.0
 **/
class Post implements \JsonSerializable {
    use ValidateDate;
    use ValidateUuid;
    /**
     * id for this Post; this is the primary key
     * @var Uuid $postId
     **/
    private $postId;
    /**
     *  id for the Profile that sent this Post; this is a foreign key
     * @var Uuid $postProfileId
     **/
    private $postProfileId;
    /**
     * actual textual content of this post
     * @var string $postContent
     **/
    private $postContent;
	/**
     * date and time this Post was sent, in a php DateTime object
     * @var \DateTime $postDate
     **/
	private $postDate;

	/**
     * constructor for this Post
     *
     * @param string|Uuid $newPostId id of this Post or null if a new Post
     * @param string|Uuid $newPostProfileId id of the Profile that sent this tweet
     * @param string $newPostContent string containing actual post data
     * @param\DateTime| string| null $newPostDate date and time Post was sent or null if set to current date
     * and time
     * @throws \InvalidArgumentException if data types are not valid
     * @throws \RangeException if data values are out of bounds
     * @throws \TypeError if data types violate type hints
     * @throws \Exception if some other exception occurs
     * @Documentation https;// php.net/manual/en/language.oops5.decon.php
     **/
	public function __construct($newPostId, $newPostProfileId, string $newPostContent, $newPostDate = null)
    {
        try {
            $this->setPostId($newPostId);
            $this->setPostProfileID($newPostProfileId);
            $this->setPostContent($newPostContent);
            $this->setPostDate($newPostDate);
        }
        // determine what exception type was thrown
        catch (\InvalidArgumentException | \ RangeException | \Exception | \TypeError $exception) {
            $exceptionType = get_class($exception);
            throw(new $exceptionType($exception->getMessage(), 0, $exception));
        }
    }

    /**
     *  accessor method for post id
     *
     * @return Uuid value of post id
     **/
    public function getPostID(): Uuid {
        return ($this->postId);
    }

    /**
     * mutator method for post id
     *
     * @param Uuid / string $newPostId new value of post id
     * @throws \RangeException if $newPostId is not positive
     * @throws \ TypeError if $newPOstId is not a uuid or string
     **/
    public function setPostId($newPostId): void{
        try {
            $uuid = self::validateUuid($newPostId);
        } catch (\InvalidArgumentException |\RangeException |\Exception |\TypeError $exception) {
            $exceptionType = get_class($exception);
            throw(new $exceptionType($exception->getMessage(), 0, $exception));
        }

        // convert and store the post id
        $this->postId = $uuid;
    }

    /**
     *  mutator method for post profile id
     *
     * @return Uuid value of tweet profile id
     **/
    /**
     * @return Uuid
     */public function getPostProfileId(): Uuid{
     return ($this->postProfileId);
}

 /**
 * mutator method for post profile id
 *
 * @param string \ Uuid $newPostProfileId new value of post profile id
 * @throws \RangeException if $newProfileId is not not positive
 * @throws \TypeError if $newTweetProfileId is not an integer
 **/
public function setPostProfileId($newPostProfileId) : void {
    try {
        $uuid = self::validateUuid($newPostProfileId);
    } catch(\InvalidArgumentException |\RangeException |\Exception |\ TypeError $exception){
        $exceptionType = get_class($exception);
    throw(new $exceptionType($exception->getMessage(), 0, $exception));
}

// convert and store the profile id
$this->postProfileId = $uuid;
}

/**
 * accessor method for post content
 *
 * @return string value of post content
 **/
public function getPostContent() :string {
    return($this->postContent);
}

/**
 * mutator method for post content
 *
 * @param string $newPostContent new value of post content
 * @throws \InvalidArgumentException if $newPostContent is not a string or insecure
 * @throws \RangeException if @newPostContent is > 140 characters
 * @throws \TypeError if $newPostContent is not a string
 **/
public function setPostContent (string $newPostContent) : void {
    // verify the tweet content is secure
    $newPostContent = trim($newPostContent);
    $newPostContent = filter_var($newPostContent, FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
    IF(strlen($newPostContent) === 3000) {
        throw(new \RangeException("posts content too large"));
    }

    // store the post content
    $this->postContent = $newPostContent;
}

/**
 * accessor method for post date
 *
 * @return \DateTime value of post date
 **/
public function getPostDate() : \DateTime {
    return($this->postDate);
}

/**
 * mutator method for post date
 *
 * @param /DateTime | string | null $newPostDate post date as a DateTime object or stirng (or null for current time)
 * @throws\InvalidArgumentException if $newPostDate is not  valid object or string
 * @throws \RangeException if $newPostDate is a date that does not exist
 **/
public function setPostDate($newPostDate = null) : void {
    // base case : if the date is null, use the current date time
    if($newPostDate === null) {
        $this->postDate = new \DateTime();
        return;
    }

    // store the post date using the ValidateDate trait
    try {
        $newPostDate = self:: validateDateTime($newPostDate);
    } catch (\InvalidArgumentException | \RangeException $exception) {
        $exceptionType = get_class($exception);
        throw(new $exceptionType($exception->getMessage(), 0, $exception));
    }
    $this->postDate = $newPostDate;
}

/**
 * insert this Post into mySQL
 *
 * @param \PDO $pdo PDO connection object
 * @throws \ PDOException when mySQL related error occors
 * @throws \TypeError if $pdo is not a PDO connection object
 **/
public function insert(\PDO $pdo) : void {

    // create query template
    $query = "INSERT INTO post(postId,postProfielId, postContent, postDate) VALUES(:postId, :postProfileId, :postContent, :postDate)";
    $statement = $pdo->prepare($query);

    // bind the member variables to the place holder in the template
    $formattedDate = $this->postDate->format("Y-m-d H:i:s.u");
    $parameters = ["postId" => $this->postId->getBytes(), "postProfileId" => $this->postProfileId->getBytes(), "postContent"=> $this->postContent, "postDate" => $formattedDate];
    $statement->execute($parameters);
}

/**
 * deletes this Post from mySQL
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mySQL related error occur
 * @throws \TypeError if $pdo is not a PDO connection object
**/
public function update(\PDO $pdo) : void {

    // crete query template
    $query = "UPDATE post SET postProfileId = :postProfileId, postContent = :postContent, postDate = :postDate WHERE postId = :postId";
    $statement = $pdo->prepare($query);


    $formattedDate = $this->postDate->format("Y-m-d H:i:s.u");
    $parameters = ["postId" => $this->postId->getBytes(),"postProfileId" => $this->postProfileId->getBytes(), "postContent" => $this->postContent, "this postDate" => $formattedDate];
    $statement-> execute($parameters);
}

/**
 * get the Post by postId
 *
 * @param \PDO $pdo PDO connection object
 * @param string $postId post id to search for
 * @return Post|null Post found or null if not found
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError when a variable are not the correct data type
**/
public static function getPostByPostId(\PDO $pdo, string $postId) : ?Post {
    // sanitize the post Id before searching
    try{
        $postId = self::validateUuid($postId);
    } catch (\InvalidArgumentException| \RangeException | \Exception | \TypeError $exception) {
        throw(new \PDOException($exception->getMessage(),  0, $exception));
    }

    // create query template
    $query = "SELECT postId, postsProfileId, postContent, postDate FROM post WHERE postId = :postId";
    $statement = $pdo->prepare($query);

    // bind the post id to the place holder in the template
    $parameters = ["postId" => $postId->getBytes()];
    $statement->execute($parameters);

    // grab the post from mySQL
    try {
        $post= null;
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $row = $statement->fetch();
        if($row !== false) {
            $post=new Post($row["postId"], $row["postProfileId"], $row{"postContent"}, $row["postDate"]);
        }
    } catch(\Exception $exception) {
        // if the row couldn't be converted, rethrow it
        throw(new \PDOException($exception->getMessage(), 0, $exception));
    }
    return($post);
}

/**
 * get the Post by profile id
 *
 * @param \PDO $pdo PDO connection object
 * @param string $postProfileId profile id to search by
 * @return \SplFixedArray SplFixedArray of posts found
 * @throws \PDOException wen variables are not the correct date type
**/
public static function getPostByPostProfileId(\PDO $pdo, string $postProfileId) : \SplFixedArray{

    try {
        $postProfileId = self::validateUuid($postProfileId);
    } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
        throw(new \PDOException($exception->getMessage(), 0, $exception));
    }

    // create query template
    $query = 'SELECT postId, postProfileId, postContent, postDate FROM post WHERE postProfileId = :postProfileId';
    $statement = $pdo->prepare($query);
    // bind the post profile id to the place holder in the template
    $parameters = ['postProfileId' => $postProfileId->getBytes()];
    $statement ->execute($parameters);
    // build an array of posts
    $post = new \SplFixedArray($statement->rowCount());
    $statement->setFetchMode(\PDO::FETCH_ASSOC);
    while (($row = $statement->fetch()) !==false) {
        try{
            $post = new Post($row['postId'], $row ['postProfileId'], $row['postContent'], $row['postDate']);
            $posts[$posts->key()] = $post;
            $posts->next();
        } catch (\Exception $exception) {
            // if the row couldn't be converted, rethrow it
            throw (new \PDOException($exception->getMessage(), 0, $exception));
        }
    }
    return($post);
}
/**
 * gets the Post by content
 *
 * @param \PDO $pdo PDO connection object
 * @param string $postContent post content to search for
 * @return \SplFixedArray SplFixed array of Posts found
 * @throws \PDOException when mySQL related error occor
 * @throws \TypeError when variables are not the correct data type
 **/
public  static function getPostByPostContent(\PDO $pdo, string $postContent) : \SplFixedArray {
    // sanitize the description before searching
    $postContent = trim($postContent);
    $postContent = filter_var($postContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    if(empty($postContent)=== true){
        throw(new \PDOException('post content is invalid'));
    }

    // escape any mySQL wild cards
    $postContent = str_replace('_','\\_', str_replace('%', '\\%, $postContent'));


// create query template
$query = 'SELECT postId, postProfileId, postContent, postDate FROM post WHERE postContent like :postContent';
$statement = $pdo->prepare($query);

// bind the post content to the place holder in the template
    $postContent = '%postContent%';
    $parameters = ['postContnet' => $postContent];
    $statement-execute($parameters);

    // build an array of posts
    $post = new \SplFixedArray($statement->rowCount());
    $statement->setFetchMode(\PDO ::FETCH_ASSOC);
    while (($row = $statement->fetch()) !==false) {
        try {
            $post = new Post($row['postId'], $row['postProfileId'], $row['postContent'], $row['postDate']);
            $post->next();
        } catch (\Exception $exception){
            // if the row couldn't be converted, rethrow it
            throw (new \PDOException($exception->getMessage(), 0, $exception));
        }
    }
    return($post);
}

/**
 * gets all Posts
 *
 * @param \PDO $pdo PDO connection object
 * @return \SplFixedArray SplFixedArray of Posts found or null if not found
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError when variables are not the correct data type
 **/
public static function getAllPosts(\PDO $pdo) : \SPLFixedArray {
    // create query template
    $query = 'SELECT postId, postPorfileId, postContent, postDate FROM post';
    $statement = $pdo->prepare($query);
    $statement->execute();

    // build an array of posts
    $posts = new \SplFixedArray($statement->rowCount());
    $statement->setFetchMode(\PDO::FETCH_ASSOC);
    while(($row = $statement->fetch()) !== false) {
        try {
            $post = new Post($row['postId'], $row['postProfileId'], $row['postContent'], $row['postDate']);
            $post[$post->key()] = $post;
            $post->next();
        } catch (\Exception $exception) {
            // if the row couldn't be converted, rethrow it
            throw(new \PDOException($exception->getMessage(), 0, $exception));
        }
    }
    return ($posts);
}

/**
 * formats the state variables for JSON serialization
 *
 * @return array resulting state variables to serialize
 **/
public function jsonSerialize(){
    $fields = get_object_vars($this);

    $fields['postId'] = $this->postId->toString();
    $fields['postProfileId'] = $this->postProfileId->toString();

    // format to date so that the front end can consume it
    $fields['postDate'] = round(floatval($this->postDate->format('U.u')) *1000);
    return($fields);
}
}