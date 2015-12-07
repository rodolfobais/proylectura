<?php


/**
 * Base class that represents a query for the 'notificacion' table.
 *
 * 
 *
 * @method     NotificacionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     NotificacionQuery orderById_emisor($order = Criteria::ASC) Order by the id_emisor column
 * @method     NotificacionQuery orderById_receptor($order = Criteria::ASC) Order by the id_receptor column
 * @method     NotificacionQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method     NotificacionQuery orderById_tipo_notificacion($order = Criteria::ASC) Order by the id_tipo_notificacion column
 *
 * @method     NotificacionQuery groupById() Group by the id column
 * @method     NotificacionQuery groupById_emisor() Group by the id_emisor column
 * @method     NotificacionQuery groupById_receptor() Group by the id_receptor column
 * @method     NotificacionQuery groupByDescripcion() Group by the descripcion column
 * @method     NotificacionQuery groupById_tipo_notificacion() Group by the id_tipo_notificacion column
 *
 * @method     NotificacionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     NotificacionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     NotificacionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     NotificacionQuery leftJoinUsuarioRelatedById_emisor($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedById_emisor relation
 * @method     NotificacionQuery rightJoinUsuarioRelatedById_emisor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedById_emisor relation
 * @method     NotificacionQuery innerJoinUsuarioRelatedById_emisor($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedById_emisor relation
 *
 * @method     NotificacionQuery leftJoinUsuarioRelatedById_receptor($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedById_receptor relation
 * @method     NotificacionQuery rightJoinUsuarioRelatedById_receptor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedById_receptor relation
 * @method     NotificacionQuery innerJoinUsuarioRelatedById_receptor($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedById_receptor relation
 *
 * @method     NotificacionQuery leftJoinTipo_notificacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tipo_notificacion relation
 * @method     NotificacionQuery rightJoinTipo_notificacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tipo_notificacion relation
 * @method     NotificacionQuery innerJoinTipo_notificacion($relationAlias = null) Adds a INNER JOIN clause to the query using the Tipo_notificacion relation
 *
 * @method     Notificacion findOne(PropelPDO $con = null) Return the first Notificacion matching the query
 * @method     Notificacion findOneOrCreate(PropelPDO $con = null) Return the first Notificacion matching the query, or a new Notificacion object populated from the query conditions when no match is found
 *
 * @method     Notificacion findOneById(int $id) Return the first Notificacion filtered by the id column
 * @method     Notificacion findOneById_emisor(int $id_emisor) Return the first Notificacion filtered by the id_emisor column
 * @method     Notificacion findOneById_receptor(int $id_receptor) Return the first Notificacion filtered by the id_receptor column
 * @method     Notificacion findOneByDescripcion(string $descripcion) Return the first Notificacion filtered by the descripcion column
 * @method     Notificacion findOneById_tipo_notificacion(int $id_tipo_notificacion) Return the first Notificacion filtered by the id_tipo_notificacion column
 *
 * @method     array findById(int $id) Return Notificacion objects filtered by the id column
 * @method     array findById_emisor(int $id_emisor) Return Notificacion objects filtered by the id_emisor column
 * @method     array findById_receptor(int $id_receptor) Return Notificacion objects filtered by the id_receptor column
 * @method     array findByDescripcion(string $descripcion) Return Notificacion objects filtered by the descripcion column
 * @method     array findById_tipo_notificacion(int $id_tipo_notificacion) Return Notificacion objects filtered by the id_tipo_notificacion column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseNotificacionQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseNotificacionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Notificacion', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new NotificacionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    NotificacionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof NotificacionQuery) {
			return $criteria;
		}
		$query = new NotificacionQuery();
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
	 * @return    Notificacion|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = NotificacionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(NotificacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Notificacion A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ID_EMISOR`, `ID_RECEPTOR`, `DESCRIPCION`, `ID_TIPO_NOTIFICACION` FROM `notificacion` WHERE `ID` = :p0';
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
			$obj = new Notificacion();
			$obj->hydrate($row);
		NotificacionPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Notificacion|array|mixed the result, formatted by the current formatter
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
	 * @return    NotificacionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(NotificacionPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    NotificacionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(NotificacionPeer::ID, $keys, Criteria::IN);
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
	 * @return    NotificacionQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(NotificacionPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_emisor column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_emisor(1234); // WHERE id_emisor = 1234
	 * $query->filterById_emisor(array(12, 34)); // WHERE id_emisor IN (12, 34)
	 * $query->filterById_emisor(array('min' => 12)); // WHERE id_emisor > 12
	 * </code>
	 *
	 * @see       filterByUsuarioRelatedById_emisor()
	 *
	 * @param     mixed $id_emisor The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NotificacionQuery The current query, for fluid interface
	 */
	public function filterById_emisor($id_emisor = null, $comparison = null)
	{
		if (is_array($id_emisor)) {
			$useMinMax = false;
			if (isset($id_emisor['min'])) {
				$this->addUsingAlias(NotificacionPeer::ID_EMISOR, $id_emisor['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_emisor['max'])) {
				$this->addUsingAlias(NotificacionPeer::ID_EMISOR, $id_emisor['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NotificacionPeer::ID_EMISOR, $id_emisor, $comparison);
	}

	/**
	 * Filter the query on the id_receptor column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_receptor(1234); // WHERE id_receptor = 1234
	 * $query->filterById_receptor(array(12, 34)); // WHERE id_receptor IN (12, 34)
	 * $query->filterById_receptor(array('min' => 12)); // WHERE id_receptor > 12
	 * </code>
	 *
	 * @see       filterByUsuarioRelatedById_receptor()
	 *
	 * @param     mixed $id_receptor The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NotificacionQuery The current query, for fluid interface
	 */
	public function filterById_receptor($id_receptor = null, $comparison = null)
	{
		if (is_array($id_receptor)) {
			$useMinMax = false;
			if (isset($id_receptor['min'])) {
				$this->addUsingAlias(NotificacionPeer::ID_RECEPTOR, $id_receptor['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_receptor['max'])) {
				$this->addUsingAlias(NotificacionPeer::ID_RECEPTOR, $id_receptor['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NotificacionPeer::ID_RECEPTOR, $id_receptor, $comparison);
	}

	/**
	 * Filter the query on the descripcion column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDescripcion('fooValue');   // WHERE descripcion = 'fooValue'
	 * $query->filterByDescripcion('%fooValue%'); // WHERE descripcion LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $descripcion The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NotificacionQuery The current query, for fluid interface
	 */
	public function filterByDescripcion($descripcion = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($descripcion)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $descripcion)) {
				$descripcion = str_replace('*', '%', $descripcion);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(NotificacionPeer::DESCRIPCION, $descripcion, $comparison);
	}

	/**
	 * Filter the query on the id_tipo_notificacion column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_tipo_notificacion(1234); // WHERE id_tipo_notificacion = 1234
	 * $query->filterById_tipo_notificacion(array(12, 34)); // WHERE id_tipo_notificacion IN (12, 34)
	 * $query->filterById_tipo_notificacion(array('min' => 12)); // WHERE id_tipo_notificacion > 12
	 * </code>
	 *
	 * @see       filterByTipo_notificacion()
	 *
	 * @param     mixed $id_tipo_notificacion The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NotificacionQuery The current query, for fluid interface
	 */
	public function filterById_tipo_notificacion($id_tipo_notificacion = null, $comparison = null)
	{
		if (is_array($id_tipo_notificacion)) {
			$useMinMax = false;
			if (isset($id_tipo_notificacion['min'])) {
				$this->addUsingAlias(NotificacionPeer::ID_TIPO_NOTIFICACION, $id_tipo_notificacion['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_tipo_notificacion['max'])) {
				$this->addUsingAlias(NotificacionPeer::ID_TIPO_NOTIFICACION, $id_tipo_notificacion['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NotificacionPeer::ID_TIPO_NOTIFICACION, $id_tipo_notificacion, $comparison);
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NotificacionQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedById_emisor($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(NotificacionPeer::ID_EMISOR, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(NotificacionPeer::ID_EMISOR, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuarioRelatedById_emisor() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedById_emisor relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NotificacionQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedById_emisor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedById_emisor');

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
			$this->addJoinObject($join, 'UsuarioRelatedById_emisor');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedById_emisor relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedById_emisorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUsuarioRelatedById_emisor($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedById_emisor', 'UsuarioQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NotificacionQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedById_receptor($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(NotificacionPeer::ID_RECEPTOR, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(NotificacionPeer::ID_RECEPTOR, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuarioRelatedById_receptor() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedById_receptor relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NotificacionQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedById_receptor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedById_receptor');

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
			$this->addJoinObject($join, 'UsuarioRelatedById_receptor');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedById_receptor relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedById_receptorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUsuarioRelatedById_receptor($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedById_receptor', 'UsuarioQuery');
	}

	/**
	 * Filter the query by a related Tipo_notificacion object
	 *
	 * @param     Tipo_notificacion|PropelCollection $tipo_notificacion The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NotificacionQuery The current query, for fluid interface
	 */
	public function filterByTipo_notificacion($tipo_notificacion, $comparison = null)
	{
		if ($tipo_notificacion instanceof Tipo_notificacion) {
			return $this
				->addUsingAlias(NotificacionPeer::ID_TIPO_NOTIFICACION, $tipo_notificacion->getId(), $comparison);
		} elseif ($tipo_notificacion instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(NotificacionPeer::ID_TIPO_NOTIFICACION, $tipo_notificacion->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByTipo_notificacion() only accepts arguments of type Tipo_notificacion or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Tipo_notificacion relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NotificacionQuery The current query, for fluid interface
	 */
	public function joinTipo_notificacion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Tipo_notificacion');

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
			$this->addJoinObject($join, 'Tipo_notificacion');
		}

		return $this;
	}

	/**
	 * Use the Tipo_notificacion relation Tipo_notificacion object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    Tipo_notificacionQuery A secondary query class using the current class as primary query
	 */
	public function useTipo_notificacionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinTipo_notificacion($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Tipo_notificacion', 'Tipo_notificacionQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Notificacion $notificacion Object to remove from the list of results
	 *
	 * @return    NotificacionQuery The current query, for fluid interface
	 */
	public function prune($notificacion = null)
	{
		if ($notificacion) {
			$this->addUsingAlias(NotificacionPeer::ID, $notificacion->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseNotificacionQuery