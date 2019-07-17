<?php
/**
 * Profile for an Author
 *
 * This class represents the information about an author which would be stored in a database.
 *
 * @author Alistair Gillikin <agillikin1@cnm.edu>
**/

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
	 * @return value of authorId (should fit in Binary)
	 */
	public function getAuthorId() {
		return ($this->authorId);
	}

	/**
	 * Mutator method for authorId
	 *
	 * @param int $newAuthorId new value of authorId
	 * @throws UnexpectedValueException if $newAuthorId is not an Int. (Should actually be binary)
	 */
	public function setAuthorId(int $newAuthorId) {
		// verify the author ID is valid
		$newAuthorId = filter_var($newAuthorId, FILTER_VALIDATE_INT);
		if($newAuthorId === false) {
			throw(new UnexpectedValueException("Author ID is not a valid value"));
		}
		$this->authorId = intval($newAuthorId);
	}

	/**
	 * acessor method for authorAvatarUrl
	 *
	 * @return String authorAvatarUrl
	 */
	public function getAuthorAvatarUrl() {
		return ($this->authorAvatarUrl);
	}

	/**
	 * Mutator method for authorAvatarUrl
	 *
	 * @param string %newAuthorAvatarUrl new value of authorAvatarUrl
	 * @throws
	 */
	public function setAuthorAvatarUrl(string $newAuthorAvatarUrl) {

		$this->authorAvatatarUrl = $newAuthorAvatarUrl;
	}

}

?>