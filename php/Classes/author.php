<?php
/**
 * Profile for an Author
 *
 * This class represents the information about an author which would be stored in a database.
 *
 * @author Alistair Gillikin <agillikin1@cnm.edu>
**/

namespace agillikin1\ObjectOriented;
require_once("autoload.php");
use Ramsey\Uuid\Uuid;

class author {
	use ValidateDate;
	use ValidateUuid;
	/**
	 * Id for this author. This is the primary Key, and the index.
	 */
	private $authorId;
	/**
	 * url for the author's Avatar.
	 */
	private $authorAvatarUrl;
	/**
	 * Activation token for the author's account.
	 */
	private $authorActivationToken;
	/**
	 * The author's email address. It is unique.
	 */
	private $authorEmail;
	/**
	 * The hash for the author's password
	 */
	private $authorHash;
	/**
	 * The author's username. It is unique.
	 */
	private $authorUsername;

	/**
	 * A string Statement. It does not need to be unique.
	 */
	private $statement = "";

	/**
	 * accessor method for authorId
	 *
	 * @return Uuid of authorId (should fit in Binary)
	 */
	public function getAuthorId(): Uuid {
		return ($this->authorId);
	}

	/**
	 * Mutator method for authorId
	 *
	 * @param int $newAuthorId new value of authorId
	 * @throws UnexpectedValueException if $newAuthorId is not an Int. (Should actually be binary)
	 */
	public function setAuthorId(string $newAuthorId): void {
		// verify the author ID is valid
		//$newAuthorId = filter_var($newAuthorId, FILTER_VALIDATE_INT);
		//if($newAuthorId === false) {
		//	throw(new UnexpectedValueException("Author ID is not a valid value"));
		//}

		try {
			$uuid = self::validateUuid($newAuthorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}

		$this->authorId = $uuid;
	}

	/**
	 * accessor method for authorAvatarUrl
	 *
	 * @return String authorAvatarUrl
	 */
	public function getAuthorAvatarUrl(): string {
		return ($this->authorAvatarUrl);
	}
	/**
	 * Mutator method for authorAvatarUrl. Updated.
	 *
	 * @param string $newAuthorAvatarUrl new value of authorAvatarUrl
	 * @throws \InvalidArgumentException if $newAuthorAvatarUrl is not a string or insecure
	 * @throws \TypeError if $newTweetContent is not a string
	 */
	public function setAuthorAvatarUrl(string $newAuthorAvatarUrl): void {
		$newAuthorAvatarUrl = trim($newAuthorAvatarUrl);
		$newAuthorAvatarUrl = filter_var($newAuthorAvatarUrl, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorAvatarUrl) === true) {
			throw(new \InvalidArgumentException("input is empty or insecure"));
		}
		$this->authorAvatatarUrl = $newAuthorAvatarUrl;
	}

	/**
	 * Accessor method for authorActivationToken.
	 *
	 * @return string authorActivationToken
	 */
	public function getAuthorActivationToken(): ?string {
		return ($this->authorActivationToken);
	}
	/**
	 * Mutator method for authorActivationToken. Needs additional sanitizing
	 *
	 * @param string $newAuthorActivationToken new value of authorActivationToken
	 * @throws \InvalidArgumentException if $newAuthorActivationToken is empty or insecure
	 */
	public function setAuthorActivationToken(string $newAuthorActivationToken): void{
		$newAuthorActivationToken = strtolower(trim($newAuthorActivationToken));
		$newAuthorActivationToken = filter_var($newAuthorActivationToken, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorActivationToken) === true) {
			throw(new \InvalidArgumentException("input is empty"));
		}
		if(ctype_xdigit($newAuthorActivationToken) === false) {
			throw(new\RangeException("user activation is not valid"));
		}
		if(strlen($newAuthorActivationToken) !== 32) {
			throw(new\RangeException("user activation token has to be 32 characters."));
		}

		$this->authorActivationToken = $newAuthorActivationToken;
	}

	/**
	 * Acessor method for authorEmail
	 *
	 * @return string authorEmail
	 */
	public function getAuthorEmail(): string {
		return ($this->authorEmail);
	}
	/**
	 * Mutator method for authorEmail. Needs additional sanitizing
	 *
	 * @param string $newAuthorEmail new value of authorEmail
	 * @throws \InvalidArgumentException if $newAuthorEmail is empty or insecure
	 */
	public function setAuthorEmail(string $newAuthorEmail): void{
		$newAuthorEmail = trim($newAuthorEmail);
		$newAuthorEmail = filter_var($newAuthorEmail, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorEmail) === true) {
			throw(new \InvalidArgumentException("input is empty or insecure"));
		}
		$this->authorEmail = $newAuthorEmail;
	}

	/**
	 * Acessor method for authorHash
	 *
	 * @return string authorHash
	 */
	public function getAuthorHash(): string {
		return ($this->authorHash);
	}
	/**
	 * Mutator method for authorHash. Needs additional sanitizing
	 *
	 * @param string $newAuthorHash new value of authorHash
	 * @throws \InvalidArgumentException if $newAuthorHash is empty or insecure
	 */
	public function setAuthorHash(string $newAuthorHash): void{
		$newAuthorHash = trim($newAuthorHash);
		$newAuthorHash = filter_var($newAuthorHash, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorHash) === true) {
			throw(new \InvalidArgumentException("input is empty or insecure"));
		}
		$this->authorHash = $newAuthorHash;
	}

	/**
	 * Acessor method for authorUsername
	 *
	 * @return string authorUsername
	 */
	public function getAuthorUsername(): string {
		return ($this->authorUsername);
	}
	/**
	 * Mutator method for authorUsername. Needs additional sanitizing
	 *
	 * @param string $newAuthorUsername new value of authorUsername
	 * @throws \InvalidArgumentException if input is empty or insecure
	 */
	public function setAuthorUsername(string $newAuthorUsername): void{
		$newAuthorUsername = trim($newAuthorUsername);
		$newAuthorUsername = filter_var($newAuthorUsername, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorUsername) === true) {
			throw(new \InvalidArgumentException("input is empty or insecure"));
		}
		$this->authorUsername = $newAuthorUsername;
	}

	/**
	 * Setter method for statement.
	 * @param string newStatement
	 * @throws \InvalidArgumentException if input is empty or insecure.
	 */
	public function setStatement(string $newStatement): void{
		$newStatement = trim($newStatement);
		$newStatement = filter_var($newStatement, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newStatement) === true) {
			throw(new \InvalidArgumentException("input is empty or insecure"));
		}
		$this->statement = $newStatement;
	}
	/**
	 * Accessor method for statement
	 *
	 * @return string statement
	 */
	public function getStatement(): string {
		return ($this->statement);
	}

	/**
	 * Accessor method for ??? that returns a string.
	 *
	 * @return string
	 */
	public function getFooByBar():string{

		return "Foo";
	}

	/**
	 * Accessor Method for ??? that returns an array.
	 *
	 * @return array
	 */
	public function getFooByBar(): array{
		return [
			"Foo", "Bar",
		];
	}


	/**
	 * Constructor method for Author object
	 *
	 * @param $newAuthorId, $newAuthorAvatarUrl, $newAuthorActivationToken, $newAuthorEmail, $newAuthorHash, $newAuthorUsername
	 */
	public function __construct(string $newAuthorId, string $newAuthorAvatarUrl, string $newAuthorActivationToken, string $newAuthorEmail, string $newAuthorHash, string $newAuthorUsername) {
		$this->setAuthorId($newAuthorId);
		$this->setAuthorAvatarUrl($newAuthorAvatarUrl);
		$this->setAuthorActivationToken($newAuthorActivationToken);
		$this->setAuthorEmail($newAuthorEmail);
		$this->setAuthorHash($newAuthorHash);
		$this->setAuthorUsername($newAuthorUsername);
	}
}




?>