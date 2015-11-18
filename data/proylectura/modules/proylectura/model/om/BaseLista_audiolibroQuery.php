<?php


/**
 * Base class that represents a query for the 'lista_audiolibro' table.
 *
 * 
 *
 * @method     Lista_audiolibroQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     Lista_audiolibroQuery orderById_audiolibro($order = Criteria::ASC) Order by the id_audiolibro column
 * @method     Lista_audiolibroQuery orderById_lista($order = Criteria::ASC) Order by the id_lista column
 *
 * @method     Lista_audiolibroQuery groupById() Group by the id column
 * @method     Lista_audiolibroQuery groupById_audiolibro() Group by the id_audiolibro column
 * @method     Lista_audiolibroQuery groupById_lista() Group by the id_lista column
 *
 * @method     Lista_audiolibroQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     Lista_audiolibroQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     Lista_audiolibroQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Lista_audiolibro findOne(PropelPDO $con = null) Return the first Lista_audiolibro matching the query
 * @method     Lista_audiolibro findOneOrCreate(PropelPDO $con = null) Return the first Lista_audiolibro matching the query, or a new Lista_audiolibro object populated from the query conditions when no match is found
 *
 * @method     Lista_audiolibro findOneById(int $id) Return the first Lista_audiolibro filtered by the id column
 * @method     Lista_audiolibro findOneById_audiolibro(int $id_audiolibro) Return the first Lista_audiolibro filtered by the id_audiolibro column
 * @method     Lista_audiolibro findOneById_lista(int $id_lista) Return the first Lista_audiolibro filtered by the id_lista column
 *
 * @method     array findById(int $id) Return Lista_audiolibro objects filtered by the id column
 * @method     array findById_audiolibro(int $id_audiolibro) Return Lista_audiolibro objects filtered by the id_audiolibro column
 * @method     array findById_lista(int $id_lista) Return Lista_audiolibro objects filtered by the id_lista column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseLista_audiolibroQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseLista_audiolibroQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Lista_audiolibro', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new Lista_audiolibroQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    Lista_audiolibroQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof Lista_audiolibroQuery) {
			return $criteria;
		}
		$query = new Lista_audiolibroQuery();
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
	 * @return    Lista_audiolibro|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = Lista_audiolibroPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(Lista_audiolibroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Lista_audiolibro A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ID_AUDIOLIBRO`, `ID_LISTA` FROM `lista_audiolibro` WHERE `ID` = :p0';
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
			$obj = new Lista_audiolibro();
			$obj->hydrate($row);
		Lista_audiolibroPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Lista_audiolibro|array|mixed the result, formatted by the current formatter
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
	 * @return    Lista_audiolibroQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(Lista_audiolibroPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    Lista_audiolibroQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(Lista_audiolibroPeer::ID, $keys, Criteria::IN);
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
	 * @return    Lista_audiolibroQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(Lista_audiolibroPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_audiolibro column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_audiolibro(1234); // WHERE id_audiolibro = 1234
	 * $query->filterById_audiolibro(array(12, 34)); // WHERE id_audiolibro IN (12, 34)
	 * $query->filterById_audiolibro(array('min' => 12)); // WHERE id_audiolibro > 12
	 * </code>
	 *
	 * @param     mixed $id_audiolibro The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Lista_audiolibroQuery The current query, for fluid interface
	 */
	public function filterById_audiolibro($id_audiolibro = null, $comparison = null)
	{
		if (is_array($id_audiolibro)) {
			$useMinMax = false;
			if (isset($id_audiolibro['min'])) {
				$this->addUsingAlias(Lista_audiolibroPeer::ID_AUDIOLIBRO, $id_audiolibro['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_audiolibro['max'])) {
				$this->addUsingAlias(Lista_audiolibroPeer::ID_AUDIOLIBRO, $id_audiolibro['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(Lista_audiolibroPeer::ID_AUDIOLIBRO, $id_audiolibro, $comparison);
	}

	/**
	 * Filter the query on the id_lista column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_lista(1234); // WHERE id_lista = 1234
	 * $query->filterById_lista(array(12, 34)); // WHERE id_lista IN (12, 34)
	 * $query->filterById_lista(array('min' => 12)); // WHERE id_lista > 12
	 * </code>
	 *
	 * @param     mixed $id_lista The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Lista_audiolibroQuery The current query, for fluid interface
	 */
	public function filterById_lista($id_lista = null, $comparison = null)
	{
		if (is_array($id_lista)) {
			$useMinMax = false;
			if (isset($id_lista['min'])) {
				$this->addUsingAlias(Lista_audiolibroPeer::ID_LISTA, $id_lista['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_lista['max'])) {
				$this->addUsingAlias(Lista_audiolibroPeer::ID_LISTA, $id_lista['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(Lista_audiolibroPeer::ID_LISTA, $id_lista, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Lista_audiolibro $lista_audiolibro Object to remove from the list of results
	 *
	 * @return    Lista_audiolibroQuery The current query, for fluid interface
	 */
	public function prune($lista_audiolibro = null)
	{
		if ($lista_audiolibro) {
			$this->addUsingAlias(Lista_audiolibroPeer::ID, $lista_audiolibro->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseLista_audiolibroQuery