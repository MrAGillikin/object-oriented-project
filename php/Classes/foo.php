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
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");
use Ramsey\Uuid\Uuid;

class author {
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
	public function setAuthorId(int $newAuthorId): void {
		// verify the author ID is valid
		$newAuthorId = filter_var($newAuthorId, FILTER_VALIDATE_INT);
		if($newAuthorId === false) {
			throw(new UnexpectedValueException("Author ID is not a valid value"));
		}
		$this->authorId = intval($newAuthorId);
	}

	/**
	 * accessor method for authorAvatarUrl
	 *
	 * @return String authorAvatarUrl
	 */
	public function getAuthorAvatarUrl(): ?string {
		return ($this->authorAvatarUrl);
	}
	/**
	 * Mutator method for authorAvatarUrl. NEEDS WORK!
	 *
	 * @param string $newAuthorAvatarUrl new value of authorAvatarUrl
	 * @throws
	 */
	public function setAuthorAvatarUrl(string $newAuthorAvatarUrl): void {

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
	 * @throws
	 */
	public function setAuthorActivationToken(string $newAuthorActivationToken): void{

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
	 * @throws
	 */
	public function setAuthorEmail(string $newAuthorEmail): void{

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
	 * @throws
	 */
	public function setAuthorHash(string $newAuthorHash): void{

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
	 * @throws
	 */
	public function setAuthorUsername(string $newAuthorUsername): void{

		$this->authorUsername = $newAuthorUsername;
	}

	/**
	 * Constructor method for Author object
	 *
	 * @param AuthorId, AuthorAvatarUrl, AuthorActivationToken, authorEmail, authorHash, authorUsername
	 */
	public function __construct(Uuid $newAuthorId, string $newAuthorAvatarUrl, string $newAuthorActivationToken, string $newAuthorEmail, string $newAuthorHash, string $newAuthorUsername): void {
		$this->setAuthorId($newAuthorId);
		$this->setAuthorAvatarUrl($newAuthorAvatarUrl);
		$this->setAuthorActivationToken($newAuthorActivationToken);
		$this->setAuthorEmail($newAuthorEmail);
		$this->setAuthorHash($newAuthorHash);
		$this->setAuthorUsername($newAuthorUsername);
	}
}




?>