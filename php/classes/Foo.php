<?php
namespace Edu/Cnm/DataDesign;

require_once ("autoload.php")
require_once (data-design(_DIR_,2) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;

/**
 * Section of Reddit post with comments
 *
 * This is a small example of what data might be stored from a service like Reddit when posts are posted and
 *commented on. This could be added to for a more complete site outlook
 *
 * @author Matt David <mcdav3636@gmail.com>
 * @version 3.0.0
 **/
class Post impliments
{
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
    private $postContent
	/**
     * date and time this Post was sent, in a php DateTime object
     * @var \DateTime $postDate
     **/
	private $postDate;
	/**
     * constructor for this Post
     *
     * @param string\Uuid $newPostId id of this Post or null if a new Post
     * @param string\Uuid $newPostProfileId id of the Profile that sent this tweet
     * @param string $newPostContent string containing actual post data
     * @param\DateTime\ string\ null $newPostDate date and time Post was sent or null if set to current date
     * and time
     * @throws \InvalidArgumentException if data types are not valid
     * @throws \RangeException if data values are out of bounds
     * @throws \TypeError if data types violate type hints
     * @throws \Exception if some other exception occurs
     * @Docmumentation https;// php.net/manual/en/language.oops5.decon.php
     **/
	public function __construct($newPostId, $newPostProfileId, string $newPostContent, $newPostDate = null)
    {
        try {
            $this->setPostId($newPostId);
            $this->setPostProfileID($newPostProfileId);
            $this->setPostContent($newPostContent);
            $this->setPostDate($newPostDate);
        } // determine what exception tupe was thrown
        catch (\InvalidArgumentException | \ RangeException | \Exception | \TypeError $exception) {
            $exceptionType = get_class($exception);
            throw(new $exceptionType($exception->getMessage(), 0, $exception));
        }
    }

    /**
     *  accessor method for post id
     *
     * @return Uuid calue of post id
     **/
    public function getPostID(): Uuid
    {
        return ($this->postId);
    }

    /**
     * mutator methof of post id
     *
     * @param Uuid / string $newPostId new calue of post id
     * @throws \RangeException if $newPostId is not positive
     * @throws \ TypeError if $newPOstId is not a uuid or string
     **/
    public function setPostId($newPostId): void{
        try {
            $uuid = self;;
            validateUuid($newPostId);
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
 * @param string \ Uuid $newpostProfileId new value of post profile id
 * @throws \RangeException if $newProfileId is not an integer
 **/
public function setPostProfileId(
    $newPostProfileId) : void {
    try {
        $uuid = self::validateUuid
    }
}
)
}