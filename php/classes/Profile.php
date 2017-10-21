<?php
namespace Edu\Cnm\DataDesign;

require_once ("autoloader.php");
require_once (dirname(__DIR__,2) . "../vendor/autoload.php");

use Ramsey\Uuid\Uuid;

/**
 * This is the Profile entity for reddit
 *
 * This is creating tables to store date of Profiles made from by users.
 *
 * @author Matt David <mcdav3636@gmail.com>
 * @version 3.0.0
 **/
class Profile implements \JsonSerializable {
    use ValidateDate;
    use ValidateUuid;
    /**
     * id for this Profile; this is the primary key
     * @var Uuid $profileId
     **/
    private $profileId;
    /** activation token unique to user for verification
     * @var $profileActivationToken
     **/
    private $profileActivationToken;
    /**
     *  handle for the Profile that sent this Post; this is a foreign key
     * @var string $profileHandle
     **/
    private $profileHandle;
    /**
     * email for Profile user
     * @var string $profileEmail
     **/
    private $profileEmail;
    /**
     * phone number of Profile user
     * @var string $profilePhone
     **/
    private $profilePhone;
    /**
     * hash for Profile
     * @var $profileHash
     */
    private $profileHash;
    /**
     * salt for Profile
     * @var $profileSalt
     */
    private $profileSalt;

/**
 * constructor for this Profile
 *
 * @param string|Uuid $newProfileId id of this Profile or null if a new Post
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