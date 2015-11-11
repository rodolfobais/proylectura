<?php


/**
 * Base class that represents a query for the 'usuario' table.
 *
 * 
 *
 * @method     UsuarioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     UsuarioQuery orderByNick($order = Criteria::ASC) Order by the nick column
 * @method     UsuarioQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     UsuarioQuery orderBymail($order = Criteria::ASC) Order by the mail column
 * @method     UsuarioQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     UsuarioQuery orderByAdmin($order = Criteria::ASC) Order by the admin column
 *
 * @method     UsuarioQuery groupById() Group by the id column
 * @method     UsuarioQuery groupByNick() Group by the nick column
 * @method     UsuarioQuery groupByNombre() Group by the nombre column
 * @method     UsuarioQuery groupBymail() Group by the mail column
 * @method     UsuarioQuery groupByPassword() Group by the password column
 * @method     UsuarioQuery groupByAdmin() Group by the admin column
 *
 * @method     UsuarioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UsuarioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UsuarioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Usuario findOne(PropelPDO $con = null) Return the first Usuario matching the query
 * @method     Usuario findOneOrCreate(PropelPDO $con = null) Return the first Usuario matching the query, or a new Usuario object populated from the query conditions when no match is found
 *
 * @method     Usuario findOneById(int $id) Return the first Usuario filtered by the id column
 * @method     Usuario findOneByNick(string $nick) Return the first Usuario filtered by the nick column
 * @method     Usuario findOneByNombre(string $nombre) Return the first Usuario filtered by the nombre column
 * @method     Usuario findOneBymail(string $mail) Return the first Usuario filtered by the mail column
 * @method     Usuario findOneByPassword(string $password) Return the first Usuario filtered by the password column
 * @method     Usuario findOneByAdmin(int $admin) Return the first Usuario filtered by the admin column
 *
 * @method     array findById(int $id) Return Usuario objects filtered by the id column
 * @method     array findByNick(string $nick) Return Usuario objects filtered by the nick column
 * @method     array findByNombre(string $nombre) Return Usuario objects filtered by the nombre column
 * @method     array findBymail(string $mail) Return Usuario objects filtered by the mail column
 * @method     array findByPassword(string $password) Return Usuario objects filtered by the password column
 * @method     array findByAdmin(int $admin) Return Usuario objects filtered by the admin column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseUsuarioQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseUsuarioQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Usuario', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UsuarioQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UsuarioQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UsuarioQuery) {
			return $criteria;
		}
		$query = new UsuarioQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Usuario|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = UsuarioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Usuario A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NICK`, `NOMBRE`, `MAIL`, `PASSWORD`, `ADMIN` FROM `usuario` WHERE `ID` = :p0';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key, PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new Usuario();
			$obj->hydrate($row);
		UsuarioPeer::addInstanceToPool($obj, (string) $key);
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Usuario|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UsuarioPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UsuarioPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UsuarioPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the nick column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNick('fooValue');   // WHERE nick = 'fooValue'
	 * $query->filterByNick('%fooValue%'); // WHERE nick LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nick The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByNick($nick = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nick)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nick)) {
				$nick = str_replace('*', '%', $nick);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::NICK, $nick, $comparison);
	}

	/**
	 * Filter the query on the nombre column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNombre('fooValue');   // WHERE nombre = 'fooValue'
	 * $query->filterByNombre('%fooValue%'); // WHERE nombre LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nombre The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByNombre($nombre = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nombre)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nombre)) {
				$nombre = str_replace('*', '%', $nombre);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::NOMBRE, $nombre, $comparison);
	}

	/**
	 * Filter the query on the mail column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBymail('fooValue');   // WHERE mail = 'fooValue'
	 * $query->filterBymail('%fooValue%'); // WHERE mail LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $mail The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterBymail($mail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($mail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $mail)) {
				$mail = str_replace('*', '%', $mail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::MAIL, $mail, $comparison);
	}

	/**
	 * Filter the query on the password column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
	 * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $password The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByPassword($password = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($password)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $password)) {
				$password = str_replace('*', '%', $password);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the admin column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAdmin(1234); // WHERE admin = 1234
	 * $query->filterByAdmin(array(12, 34)); // WHERE admin IN (12, 34)
	 * $query->filterByAdmin(array('min' => 12)); // WHERE admin > 12
	 * </code>
	 *
	 * @param     mixed $admin The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByAdmin($admin = null, $comparison = null)
	{
		if (is_array($admin)) {
			$useMinMax = false;
			if (isset($admin['min'])) {
				$this->addUsingAlias(UsuarioPeer::ADMIN, $admin['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($admin['max'])) {
				$this->addUsingAlias(UsuarioPeer::ADMIN, $admin['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::ADMIN, $admin, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Usuario $usuario Object to remove from the list of results
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function prune($usuario = null)
	{
		if ($usuario) {
			$this->addUsingAlias(UsuarioPeer::ID, $usuario->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseUsuarioQuery