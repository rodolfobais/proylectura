<?php


/**
 * Base class that represents a query for the 'notificacion' table.
 *
 * 
 *
 * @method     NotificacionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     NotificacionQuery orderById_notificacion($order = Criteria::ASC) Order by the id_notificacion column
 * @method     NotificacionQuery orderById_usuario($order = Criteria::ASC) Order by the id_usuario column
 * @method     NotificacionQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 *
 * @method     NotificacionQuery groupById() Group by the id column
 * @method     NotificacionQuery groupById_notificacion() Group by the id_notificacion column
 * @method     NotificacionQuery groupById_usuario() Group by the id_usuario column
 * @method     NotificacionQuery groupByDescripcion() Group by the descripcion column
 *
 * @method     NotificacionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     NotificacionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     NotificacionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     NotificacionQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     NotificacionQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     NotificacionQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     Notificacion findOne(PropelPDO $con = null) Return the first Notificacion matching the query
 * @method     Notificacion findOneOrCreate(PropelPDO $con = null) Return the first Notificacion matching the query, or a new Notificacion object populated from the query conditions when no match is found
 *
 * @method     Notificacion findOneById(int $id) Return the first Notificacion filtered by the id column
 * @method     Notificacion findOneById_notificacion(int $id_notificacion) Return the first Notificacion filtered by the id_notificacion column
 * @method     Notificacion findOneById_usuario(int $id_usuario) Return the first Notificacion filtered by the id_usuario column
 * @method     Notificacion findOneByDescripcion(string $descripcion) Return the first Notificacion filtered by the descripcion column
 *
 * @method     array findById(int $id) Return Notificacion objects filtered by the id column
 * @method     array findById_notificacion(int $id_notificacion) Return Notificacion objects filtered by the id_notificacion column
 * @method     array findById_usuario(int $id_usuario) Return Notificacion objects filtered by the id_usuario column
 * @method     array findByDescripcion(string $descripcion) Return Notificacion objects filtered by the descripcion column
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
		$sql = 'SELECT `ID`, `ID_NOTIFICACION`, `ID_USUARIO`, `DESCRIPCION` FROM `notificacion` WHERE `ID` = :p0';
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
	 * Filter the query on the id_notificacion column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_notificacion(1234); // WHERE id_notificacion = 1234
	 * $query->filterById_notificacion(array(12, 34)); // WHERE id_notificacion IN (12, 34)
	 * $query->filterById_notificacion(array('min' => 12)); // WHERE id_notificacion > 12
	 * </code>
	 *
	 * @param     mixed $id_notificacion The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NotificacionQuery The current query, for fluid interface
	 */
	public function filterById_notificacion($id_notificacion = null, $comparison = null)
	{
		if (is_array($id_notificacion)) {
			$useMinMax = false;
			if (isset($id_notificacion['min'])) {
				$this->addUsingAlias(NotificacionPeer::ID_NOTIFICACION, $id_notificacion['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_notificacion['max'])) {
				$this->addUsingAlias(NotificacionPeer::ID_NOTIFICACION, $id_notificacion['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NotificacionPeer::ID_NOTIFICACION, $id_notificacion, $comparison);
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
	 * @see       filterByUsuario()
	 *
	 * @param     mixed $id_usuario The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NotificacionQuery The current query, for fluid interface
	 */
	public function filterById_usuario($id_usuario = null, $comparison = null)
	{
		if (is_array($id_usuario)) {
			$useMinMax = false;
			if (isset($id_usuario['min'])) {
				$this->addUsingAlias(NotificacionPeer::ID_USUARIO, $id_usuario['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_usuario['max'])) {
				$this->addUsingAlias(NotificacionPeer::ID_USUARIO, $id_usuario['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NotificacionPeer::ID_USUARIO, $id_usuario, $comparison);
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
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NotificacionQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(NotificacionPeer::ID_USUARIO, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(NotificacionPeer::ID_USUARIO, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuario() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Usuario relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NotificacionQuery The current query, for fluid interface
	 */
	public function joinUsuario($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Usuario');

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
			$this->addJoinObject($join, 'Usuario');
		}

		return $this;
	}

	/**
	 * Use the Usuario relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUsuario($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Usuario', 'UsuarioQuery');
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