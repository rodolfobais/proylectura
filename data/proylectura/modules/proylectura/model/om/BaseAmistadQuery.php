<?php


/**
 * Base class that represents a query for the 'amistad' table.
 *
 * 
 *
 * @method     AmistadQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AmistadQuery orderById_usuario($order = Criteria::ASC) Order by the id_usuario column
 * @method     AmistadQuery orderByid_usuarioamigo($order = Criteria::ASC) Order by the id_usuarioamigo column
 * @method     AmistadQuery orderByestado($order = Criteria::ASC) Order by the estado column
 *
 * @method     AmistadQuery groupById() Group by the id column
 * @method     AmistadQuery groupById_usuario() Group by the id_usuario column
 * @method     AmistadQuery groupByid_usuarioamigo() Group by the id_usuarioamigo column
 * @method     AmistadQuery groupByestado() Group by the estado column
 *
 * @method     AmistadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AmistadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AmistadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Amistad findOne(PropelPDO $con = null) Return the first Amistad matching the query
 * @method     Amistad findOneOrCreate(PropelPDO $con = null) Return the first Amistad matching the query, or a new Amistad object populated from the query conditions when no match is found
 *
 * @method     Amistad findOneById(int $id) Return the first Amistad filtered by the id column
 * @method     Amistad findOneById_usuario(int $id_usuario) Return the first Amistad filtered by the id_usuario column
 * @method     Amistad findOneByid_usuarioamigo(int $id_usuarioamigo) Return the first Amistad filtered by the id_usuarioamigo column
 * @method     Amistad findOneByestado(int $estado) Return the first Amistad filtered by the estado column
 *
 * @method     array findById(int $id) Return Amistad objects filtered by the id column
 * @method     array findById_usuario(int $id_usuario) Return Amistad objects filtered by the id_usuario column
 * @method     array findByid_usuarioamigo(int $id_usuarioamigo) Return Amistad objects filtered by the id_usuarioamigo column
 * @method     array findByestado(int $estado) Return Amistad objects filtered by the estado column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseAmistadQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseAmistadQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Amistad', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AmistadQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AmistadQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AmistadQuery) {
			return $criteria;
		}
		$query = new AmistadQuery();
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
	 * @return    Amistad|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = AmistadPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(AmistadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Amistad A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ID_USUARIO`, `ID_USUARIOAMIGO`, `ESTADO` FROM `amistad` WHERE `ID` = :p0';
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
			$obj = new Amistad();
			$obj->hydrate($row);
		AmistadPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Amistad|array|mixed the result, formatted by the current formatter
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
	 * @return    AmistadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AmistadPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AmistadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AmistadPeer::ID, $keys, Criteria::IN);
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
	 * @return    AmistadQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AmistadPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_usuario column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_usuario(1234); // WHERE id_usuario = 1234
	 * $query->filterById_usuario(array(12, 34)); // WHERE id_usuario IN (12, 34)
	 * $query->filterById_usuario(array('min' => 12)); // WHERE id_usuario > 12
	 * </code>
	 *
	 * @param     mixed $id_usuario The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AmistadQuery The current query, for fluid interface
	 */
	public function filterById_usuario($id_usuario = null, $comparison = null)
	{
		if (is_array($id_usuario)) {
			$useMinMax = false;
			if (isset($id_usuario['min'])) {
				$this->addUsingAlias(AmistadPeer::ID_USUARIO, $id_usuario['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_usuario['max'])) {
				$this->addUsingAlias(AmistadPeer::ID_USUARIO, $id_usuario['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AmistadPeer::ID_USUARIO, $id_usuario, $comparison);
	}

	/**
	 * Filter the query on the id_usuarioamigo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByid_usuarioamigo(1234); // WHERE id_usuarioamigo = 1234
	 * $query->filterByid_usuarioamigo(array(12, 34)); // WHERE id_usuarioamigo IN (12, 34)
	 * $query->filterByid_usuarioamigo(array('min' => 12)); // WHERE id_usuarioamigo > 12
	 * </code>
	 *
	 * @param     mixed $id_usuarioamigo The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AmistadQuery The current query, for fluid interface
	 */
	public function filterByid_usuarioamigo($id_usuarioamigo = null, $comparison = null)
	{
		if (is_array($id_usuarioamigo)) {
			$useMinMax = false;
			if (isset($id_usuarioamigo['min'])) {
				$this->addUsingAlias(AmistadPeer::ID_USUARIOAMIGO, $id_usuarioamigo['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_usuarioamigo['max'])) {
				$this->addUsingAlias(AmistadPeer::ID_USUARIOAMIGO, $id_usuarioamigo['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AmistadPeer::ID_USUARIOAMIGO, $id_usuarioamigo, $comparison);
	}

	/**
	 * Filter the query on the estado column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByestado(1234); // WHERE estado = 1234
	 * $query->filterByestado(array(12, 34)); // WHERE estado IN (12, 34)
	 * $query->filterByestado(array('min' => 12)); // WHERE estado > 12
	 * </code>
	 *
	 * @param     mixed $estado The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AmistadQuery The current query, for fluid interface
	 */
	public function filterByestado($estado = null, $comparison = null)
	{
		if (is_array($estado)) {
			$useMinMax = false;
			if (isset($estado['min'])) {
				$this->addUsingAlias(AmistadPeer::ESTADO, $estado['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($estado['max'])) {
				$this->addUsingAlias(AmistadPeer::ESTADO, $estado['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AmistadPeer::ESTADO, $estado, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Amistad $amistad Object to remove from the list of results
	 *
	 * @return    AmistadQuery The current query, for fluid interface
	 */
	public function prune($amistad = null)
	{
		if ($amistad) {
			$this->addUsingAlias(AmistadPeer::ID, $amistad->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseAmistadQuery