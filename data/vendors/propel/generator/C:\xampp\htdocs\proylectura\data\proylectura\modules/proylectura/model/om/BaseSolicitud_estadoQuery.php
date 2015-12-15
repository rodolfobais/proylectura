<?php


/**
 * Base class that represents a query for the 'solicitud_estado' table.
 *
 * 
 *
 * @method     Solicitud_estadoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     Solicitud_estadoQuery orderByDescrp($order = Criteria::ASC) Order by the descrp column
 *
 * @method     Solicitud_estadoQuery groupById() Group by the id column
 * @method     Solicitud_estadoQuery groupByDescrp() Group by the descrp column
 *
 * @method     Solicitud_estadoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     Solicitud_estadoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     Solicitud_estadoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Solicitud_estadoQuery leftJoinSolicitud($relationAlias = null) Adds a LEFT JOIN clause to the query using the Solicitud relation
 * @method     Solicitud_estadoQuery rightJoinSolicitud($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Solicitud relation
 * @method     Solicitud_estadoQuery innerJoinSolicitud($relationAlias = null) Adds a INNER JOIN clause to the query using the Solicitud relation
 *
 * @method     Solicitud_estado findOne(PropelPDO $con = null) Return the first Solicitud_estado matching the query
 * @method     Solicitud_estado findOneOrCreate(PropelPDO $con = null) Return the first Solicitud_estado matching the query, or a new Solicitud_estado object populated from the query conditions when no match is found
 *
 * @method     Solicitud_estado findOneById(int $id) Return the first Solicitud_estado filtered by the id column
 * @method     Solicitud_estado findOneByDescrp(string $descrp) Return the first Solicitud_estado filtered by the descrp column
 *
 * @method     array findById(int $id) Return Solicitud_estado objects filtered by the id column
 * @method     array findByDescrp(string $descrp) Return Solicitud_estado objects filtered by the descrp column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseSolicitud_estadoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSolicitud_estadoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Solicitud_estado', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new Solicitud_estadoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    Solicitud_estadoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof Solicitud_estadoQuery) {
			return $criteria;
		}
		$query = new Solicitud_estadoQuery();
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
	 * @return    Solicitud_estado|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = Solicitud_estadoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(Solicitud_estadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Solicitud_estado A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `DESCRP` FROM `solicitud_estado` WHERE `ID` = :p0';
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
			$obj = new Solicitud_estado();
			$obj->hydrate($row);
		Solicitud_estadoPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Solicitud_estado|array|mixed the result, formatted by the current formatter
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
	 * @return    Solicitud_estadoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(Solicitud_estadoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    Solicitud_estadoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(Solicitud_estadoPeer::ID, $keys, Criteria::IN);
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
	 * @return    Solicitud_estadoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(Solicitud_estadoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the descrp column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDescrp('fooValue');   // WHERE descrp = 'fooValue'
	 * $query->filterByDescrp('%fooValue%'); // WHERE descrp LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $descrp The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Solicitud_estadoQuery The current query, for fluid interface
	 */
	public function filterByDescrp($descrp = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($descrp)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $descrp)) {
				$descrp = str_replace('*', '%', $descrp);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(Solicitud_estadoPeer::DESCRP, $descrp, $comparison);
	}

	/**
	 * Filter the query by a related Solicitud object
	 *
	 * @param     Solicitud $solicitud  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Solicitud_estadoQuery The current query, for fluid interface
	 */
	public function filterBySolicitud($solicitud, $comparison = null)
	{
		if ($solicitud instanceof Solicitud) {
			return $this
				->addUsingAlias(Solicitud_estadoPeer::ID, $solicitud->getId_estado(), $comparison);
		} elseif ($solicitud instanceof PropelCollection) {
			return $this
				->useSolicitudQuery()
				->filterByPrimaryKeys($solicitud->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySolicitud() only accepts arguments of type Solicitud or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Solicitud relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    Solicitud_estadoQuery The current query, for fluid interface
	 */
	public function joinSolicitud($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Solicitud');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Solicitud');
		}

		return $this;
	}

	/**
	 * Use the Solicitud relation Solicitud object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SolicitudQuery A secondary query class using the current class as primary query
	 */
	public function useSolicitudQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSolicitud($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Solicitud', 'SolicitudQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Solicitud_estado $solicitud_estado Object to remove from the list of results
	 *
	 * @return    Solicitud_estadoQuery The current query, for fluid interface
	 */
	public function prune($solicitud_estado = null)
	{
		if ($solicitud_estado) {
			$this->addUsingAlias(Solicitud_estadoPeer::ID, $solicitud_estado->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseSolicitud_estadoQuery