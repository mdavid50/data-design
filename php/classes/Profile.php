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
    /**
     *  handle for the Profile that sent this Post; this is a foreign key
     * @var string $profileHandle
     **/
    private $profileHandle;
    /** activation token unique to user for verification
     * @var $profileActivationToken
     **/
    private $profileActivationToken;
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
 * @param uuid|Uuid $newProfileId id of this Profile or null if a new Profile
 * @param string $newProfileHandle name of the Profile chosen by user
 * @param string $newProfileActivationToken string containing user safeguard info for login
 * @param string $newProfileEmail email of Profile
 * @param string $newProfilePhone phone number of Profile user
 * @param string $newProfileHash string containing password hash
 * @param string $newProfileSalt string containing password salt
 * @throws \InvalidArgumentException if data types are not valid
 * @throws \RangeException if data values are out of bounds
 * @throws \TypeError if data types violate type hints
 * @throws \Exception if some other exception occurs
 * @Documentation https;// php.net/manual/en/language.oops5.decon.php
 **/
    public function __construct($newProfiletId, string $newProfileHandle, string $newProfileActivationToken, string $newProfileEmail, string  $newProfilePhone, $newProfileHash, $newProfileSalt)
    {
        try {
            $this->setProfileId($newProfileId);
            $this->setProfileHandle($newProfileHandle);
            $this->setProfileActivationToken($newProfileActivationToken);
            $this->setProfileEmail($newProfileEmail);
            $this->setProfilePhone($newProfilePhone);
            $this->setProfileHash($newProfileHash);
            $this->setProfileSalt($newProfileSalt);
        } catch (\InvalidArgumentException | \ RangeException | \Exception | \TypeError $exception) {
            // determine what exception type was thrown
            $exceptionType = get_class($exception);
            throw(new $exceptionType($exception->getMessage(), 0, $exception));
        }
    }

    /**
     *  accessor method for profile id
     *
     * @return Uuid value of profile id
     **/
    public function getProfileId(): Uuid {
        return ($this->profileId);
    }

    /**
     * mutator method for profile id
     *
     * @param Uuid / string $newProfileId new value of post id
     * @throws \RangeException if $newProfileId is not positive
     * @throws \ TypeError if $newProfileId is not a uuid or string
     **/
    public function setProfileId($newProfileId): void{
        try {
            $uuid = self::validateUuid($newProfileId);
        } catch (\InvalidArgumentException |\RangeException |\Exception |\TypeError $exception) {
            $exceptionType = get_class($exception);
            throw(new $exceptionType($exception->getMessage(), 0, $exception));
        }

        // convert and store the post id
        $this->profileId = $uuid;
    }

    /**
     *  accessor method for profile handle
     *
     * @return string value of profile handle
     **/
     public function getProfileHandle(): string {
    return ($this->profileHandle);
}

/**
* mutator method for profile handle
*
* @param string $newProfileHandle new value of handle
* @throws \InvalidArgumentException if $newProfileHandle is not a string or insecure
* @throws \RangeException if $newProfileHandle is > 128 characters
* @throws \TypeError if $newProfileHandle is not a string
**/
    public function setProfileHandle(string $newProfileHandle) : void {
        // verify the user name is secure
        $newProfileHandle = trim($newProfileHandle);
        $newProfileHandle = filter_var($newProfileHandle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        if(empty($newProfileHandle) === true) {
            throw(new \InvalidArgumentException("profile handle is empty or insecure"));
        }
        // verify the user name will fit in the database
        if(strlen($newProfileHandle) > 128) {
            throw(new \RangeException("profile handle is too large"));
        }
        // store the profile handle
        $this->profileHandle = $newProfileHandle;
    }

    /**
     *  accessor method for profile email
     *
     * @return string value of profile email
     **/
    public function getProfileEmail(): string{
        return ($this->profileEmail);
    }

    /**
     * mutator method for profile email
     *
     * @param string $newProfileEmail new value of handle
     * @throws \InvalidArgumentException if $newProfileEmail is not a string or insecure
     * @throws \RangeException if $newProfileEmail is > 128 characters
     * @throws \TypeError if $newProfileEmail is not a string
     **/
    public function setProfileEmail(string $newProfileEmail) : void {
        // verify the email is secure
        $newProfileEmail = trim($newProfileEmail);
        $newProfileEmail = filter_var($newProfileEmail, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        if(empty($newProfileEmail) === true) {
            throw(new \InvalidArgumentException("profile email is empty or insecure"));
        }
        // verify the email will fit in the database
        if(strlen($newProfileEmail) > 128) {
            throw(new \RangeException("profile email is too large"));
        }
        // store the profile email
        $this->profileEmail = $newProfileEmail;
    }

    /**
     *  accessor method for profile activation token
     *
     * @return string value of profile activation token
     **/
    public function getProfileActivationToken(): string{
        return ($this->profileEmail);
    }

    /**
     * mutator method for profile email
     *
     * @param string $newProfileEmail new value of handle
     * @throws \InvalidArgumentException if $newProfileEmail is not a string or insecure
     * @throws \RangeException if $newProfileEmail is > 128 characters
     * @throws \TypeError if $newProfileEmail is not a string
     **/
    public function setProfileEmail(string $newProfileEmail) : void {
        // verify the email is secure
        $newProfileEmail = trim($newProfileEmail);
        $newProfileEmail = filter_var($newProfileEmail, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        if(empty($newProfileEmail) === true) {
            throw(new \InvalidArgumentException("profile email is empty or insecure"));
        }
        // verify the email will fit in the database
        if(strlen($newProfileEmail) > 128) {
            throw(new \RangeException("profile email is too large"));
        }
        // store the profile email
        $this->profileEmail = $newProfileEmail;
    }

    /**
     *  accessor method for profile phone
     *
     * @return string value of profile phone
     **/
    public function getProfilePhone(): string{
        return ($this->profilePhone);
    }

    /**
     * mutator method for profile phone
     *
     * @param string $newProfilePhone new value of handle
     * @throws \InvalidArgumentException if $newProfilePhoneis    *not a string or insecure
     * @throws \RangeException if $newProfileEmail is > 128 characters
     * @throws \TypeError if $newProfileEmail is not a string
     **/
    public function setProfilePhone(string $newProfilePhone) : void {
        // verify the phone is secure
        $newProfilePhone = trim($newProfilePhone);
        $newProfilePhone = filter_var($newProfilePhone, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        if(empty($newProfilePhone) === true) {
            throw(new \InvalidArgumentException("profile phone is empty or insecure"));
        }
        // verify the phone will fit in the database
        if(strlen($newProfilePhone) > 128) {
            throw(new \RangeException("profile phone is too large"));
        }
        // store the profile phone
        $this->profilePhone = $newProfilePhone;
    }