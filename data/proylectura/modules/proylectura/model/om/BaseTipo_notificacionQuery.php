<?php


/**
 * Base class that represents a query for the 'tipo_notificacion' table.
 *
 * 
 *
 * @method     Tipo_notificacionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     Tipo_notificacionQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     Tipo_notificacionQuery orderByImagen($order = Criteria::ASC) Order by the imagen column
 *
 * @method     Tipo_notificacionQuery groupById() Group by the id column
 * @method     Tipo_notificacionQuery groupByNombre() Group by the nombre column
 * @method     Tipo_notificacionQuery groupByImagen() Group by the imagen column
 *
 * @method     Tipo_notificacionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     Tipo_notificacionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     Tipo_notificacionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Tipo_notificacionQuery leftJoinNotificacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Notificacion relation
 * @method     Tipo_notificacionQuery rightJoinNotificacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Notificacion relation
 * @method     Tipo_notificacionQuery innerJoinNotificacion($relationAlias = null) Adds a INNER JOIN clause to the query using the Notificacion relation
 *
 * @method     Tipo_notificacion findOne(PropelPDO $con = null) Return the first Tipo_notificacion matching the query
 * @method     Tipo_notificacion findOneOrCreate(PropelPDO $con = null) Return the first Tipo_notificacion matching the query, or a new Tipo_notificacion object populated from the query conditions when no match is found
 *
 * @method     Tipo_notificacion findOneById(int $id) Return the first Tipo_notificacion filtered by the id column
 * @method     Tipo_notificacion findOneByNombre(string $nombre) Return the first Tipo_notificacion filtered by the nombre column
 * @method     Tipo_notificacion findOneByImagen(string $imagen) Return the first Tipo_notificacion filtered by the imagen column
 *
 * @method     array findById(int $id) Return Tipo_notificacion objects filtered by the id column
 * @method     array findByNombre(string $nombre) Return Tipo_notificacion objects filtered by the nombre column
 * @method     array findByImagen(string $imagen) Return Tipo_notificacion objects filtered by the imagen column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseTipo_notificacionQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseTipo_notificacionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Tipo_notificacion', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new Tipo_notificacionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    Tipo_notificacionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof Tipo_notificacionQuery) {
			return $criteria;
		}
		$query = new Tipo_notificacionQuery();
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
	 * @return    Tipo_notificacion|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = Tipo_notificacionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(Tipo_notificacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Tipo_notificacion A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NOMBRE`, `IMAGEN` FROM `tipo_notificacion` WHERE `ID` = :p0';
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
			$obj = new Tipo_notificacion();
			$obj->hydrate($row);
		Tipo_notificacionPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Tipo_notificacion|array|mixed the result, formatted by the current formatter
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
	 * @return    Tipo_notificacionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(Tipo_notificacionPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    Tipo_notificacionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(Tipo_notificacionPeer::ID, $keys, Criteria::IN);
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
	 * @return    Tipo_notificacionQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(Tipo_notificacionPeer::ID, $id, $comparison);
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
	 * @return    Tipo_notificacionQuery The current query, for fluid interface
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
		return $this->addUsingAlias(Tipo_notificacionPeer::NOMBRE, $nombre, $comparison);
	}

	/**
	 * Filter the query on the imagen column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByImagen('fooValue');   // WHERE imagen = 'fooValue'
	 * $query->filterByImagen('%fooValue%'); // WHERE imagen LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $imagen The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Tipo_notificacionQuery The current query, for fluid interface
	 */
	public function filterByImagen($imagen = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($imagen)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $imagen)) {
				$imagen = str_replace('*', '%', $imagen);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(Tipo_notificacionPeer::IMAGEN, $imagen, $comparison);
	}

	/**
	 * Filter the query by a related Notificacion object
	 *
	 * @param     Notificacion $notificacion  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Tipo_notificacionQuery The current query, for fluid interface
	 */
	public function filterByNotificacion($notificacion, $comparison = null)
	{
		if ($notificacion instanceof Notificacion) {
			return $this
				->addUsingAlias(Tipo_notificacionPeer::ID, $notificacion->getId_tipo_notificacion(), $comparison);
		} elseif ($notificacion instanceof PropelCollection) {
			return $this
				->useNotificacionQuery()
				->filterByPrimaryKeys($notificacion->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByNotificacion() only accepts arguments of type Notificacion or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Notificacion relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    Tipo_notificacionQuery The current query, for fluid interface
	 */
	public function joinNotificacion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Notificacion');

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
			$this->addJoinObject($join, 'Notificacion');
		}

		return $this;
	}

	/**
	 * Use the Notificacion relation Notificacion object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NotificacionQuery A secondary query class using the current class as primary query
	 */
	public function useNotificacionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinNotificacion($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Notificacion', 'NotificacionQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Tipo_notificacion $tipo_notificacion Object to remove from the list of results
	 *
	 * @return    Tipo_notificacionQuery The current query, for fluid interface
	 */
	public function prune($tipo_notificacion = null)
	{
		if ($tipo_notificacion) {
			$this->addUsingAlias(Tipo_notificacionPeer::ID, $tipo_notificacion->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseTipo_notificacionQuery