<?php


/**
 * Base class that represents a query for the 'solicitud_amistad' table.
 *
 * 
 *
 * @method     Solicitud_amistadQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     Solicitud_amistadQuery orderById_usuario_solicitado($order = Criteria::ASC) Order by the id_usuario_solicitado column
 * @method     Solicitud_amistadQuery orderById_usuario_solicitante($order = Criteria::ASC) Order by the id_usuario_solicitante column
 * @method     Solicitud_amistadQuery orderByestado($order = Criteria::ASC) Order by the estado column
 *
 * @method     Solicitud_amistadQuery groupById() Group by the id column
 * @method     Solicitud_amistadQuery groupById_usuario_solicitado() Group by the id_usuario_solicitado column
 * @method     Solicitud_amistadQuery groupById_usuario_solicitante() Group by the id_usuario_solicitante column
 * @method     Solicitud_amistadQuery groupByestado() Group by the estado column
 *
 * @method     Solicitud_amistadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     Solicitud_amistadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     Solicitud_amistadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Solicitud_amistadQuery leftJoinUsuarioRelatedById_usuario_solicitado($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedById_usuario_solicitado relation
 * @method     Solicitud_amistadQuery rightJoinUsuarioRelatedById_usuario_solicitado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedById_usuario_solicitado relation
 * @method     Solicitud_amistadQuery innerJoinUsuarioRelatedById_usuario_solicitado($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedById_usuario_solicitado relation
 *
 * @method     Solicitud_amistadQuery leftJoinUsuarioRelatedById_usuario_solicitante($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedById_usuario_solicitante relation
 * @method     Solicitud_amistadQuery rightJoinUsuarioRelatedById_usuario_solicitante($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedById_usuario_solicitante relation
 * @method     Solicitud_amistadQuery innerJoinUsuarioRelatedById_usuario_solicitante($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedById_usuario_solicitante relation
 *
 * @method     Solicitud_amistad findOne(PropelPDO $con = null) Return the first Solicitud_amistad matching the query
 * @method     Solicitud_amistad findOneOrCreate(PropelPDO $con = null) Return the first Solicitud_amistad matching the query, or a new Solicitud_amistad object populated from the query conditions when no match is found
 *
 * @method     Solicitud_amistad findOneById(int $id) Return the first Solicitud_amistad filtered by the id column
 * @method     Solicitud_amistad findOneById_usuario_solicitado(int $id_usuario_solicitado) Return the first Solicitud_amistad filtered by the id_usuario_solicitado column
 * @method     Solicitud_amistad findOneById_usuario_solicitante(int $id_usuario_solicitante) Return the first Solicitud_amistad filtered by the id_usuario_solicitante column
 * @method     Solicitud_amistad findOneByestado(int $estado) Return the first Solicitud_amistad filtered by the estado column
 *
 * @method     array findById(int $id) Return Solicitud_amistad objects filtered by the id column
 * @method     array findById_usuario_solicitado(int $id_usuario_solicitado) Return Solicitud_amistad objects filtered by the id_usuario_solicitado column
 * @method     array findById_usuario_solicitante(int $id_usuario_solicitante) Return Solicitud_amistad objects filtered by the id_usuario_solicitante column
 * @method     array findByestado(int $estado) Return Solicitud_amistad objects filtered by the estado column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseSolicitud_amistadQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSolicitud_amistadQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Solicitud_amistad', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new Solicitud_amistadQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    Solicitud_amistadQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof Solicitud_amistadQuery) {
			return $criteria;
		}
		$query = new Solicitud_amistadQuery();
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
	 * @return    Solicitud_amistad|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = Solicitud_amistadPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(Solicitud_amistadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Solicitud_amistad A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ID_USUARIO_SOLICITADO`, `ID_USUARIO_SOLICITANTE`, `ESTADO` FROM `solicitud_amistad` WHERE `ID` = :p0';
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
			$obj = new Solicitud_amistad();
			$obj->hydrate($row);
		Solicitud_amistadPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Solicitud_amistad|array|mixed the result, formatted by the current formatter
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
	 * @return    Solicitud_amistadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(Solicitud_amistadPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    Solicitud_amistadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(Solicitud_amistadPeer::ID, $keys, Criteria::IN);
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
	 * @return    Solicitud_amistadQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(Solicitud_amistadPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_usuario_solicitado column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_usuario_solicitado(1234); // WHERE id_usuario_solicitado = 1234
	 * $query->filterById_usuario_solicitado(array(12, 34)); // WHERE id_usuario_solicitado IN (12, 34)
	 * $query->filterById_usuario_solicitado(array('min' => 12)); // WHERE id_usuario_solicitado > 12
	 * </code>
	 *
	 * @see       filterByUsuarioRelatedById_usuario_solicitado()
	 *
	 * @param     mixed $id_usuario_solicitado The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Solicitud_amistadQuery The current query, for fluid interface
	 */
	public function filterById_usuario_solicitado($id_usuario_solicitado = null, $comparison = null)
	{
		if (is_array($id_usuario_solicitado)) {
			$useMinMax = false;
			if (isset($id_usuario_solicitado['min'])) {
				$this->addUsingAlias(Solicitud_amistadPeer::ID_USUARIO_SOLICITADO, $id_usuario_solicitado['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_usuario_solicitado['max'])) {
				$this->addUsingAlias(Solicitud_amistadPeer::ID_USUARIO_SOLICITADO, $id_usuario_solicitado['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(Solicitud_amistadPeer::ID_USUARIO_SOLICITADO, $id_usuario_solicitado, $comparison);
	}

	/**
	 * Filter the query on the id_usuario_solicitante column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_usuario_solicitante(1234); // WHERE id_usuario_solicitante = 1234
	 * $query->filterById_usuario_solicitante(array(12, 34)); // WHERE id_usuario_solicitante IN (12, 34)
	 * $query->filterById_usuario_solicitante(array('min' => 12)); // WHERE id_usuario_solicitante > 12
	 * </code>
	 *
	 * @see       filterByUsuarioRelatedById_usuario_solicitante()
	 *
	 * @param     mixed $id_usuario_solicitante The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Solicitud_amistadQuery The current query, for fluid interface
	 */
	public function filterById_usuario_solicitante($id_usuario_solicitante = null, $comparison = null)
	{
		if (is_array($id_usuario_solicitante)) {
			$useMinMax = false;
			if (isset($id_usuario_solicitante['min'])) {
				$this->addUsingAlias(Solicitud_amistadPeer::ID_USUARIO_SOLICITANTE, $id_usuario_solicitante['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_usuario_solicitante['max'])) {
				$this->addUsingAlias(Solicitud_amistadPeer::ID_USUARIO_SOLICITANTE, $id_usuario_solicitante['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(Solicitud_amistadPeer::ID_USUARIO_SOLICITANTE, $id_usuario_solicitante, $comparison);
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
	 * @return    Solicitud_amistadQuery The current query, for fluid interface
	 */
	public function filterByestado($estado = null, $comparison = null)
	{
		if (is_array($estado)) {
			$useMinMax = false;
			if (isset($estado['min'])) {
				$this->addUsingAlias(Solicitud_amistadPeer::ESTADO, $estado['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($estado['max'])) {
				$this->addUsingAlias(Solicitud_amistadPeer::ESTADO, $estado['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(Solicitud_amistadPeer::ESTADO, $estado, $comparison);
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Solicitud_amistadQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedById_usuario_solicitado($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(Solicitud_amistadPeer::ID_USUARIO_SOLICITADO, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(Solicitud_amistadPeer::ID_USUARIO_SOLICITADO, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuarioRelatedById_usuario_solicitado() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedById_usuario_solicitado relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    Solicitud_amistadQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedById_usuario_solicitado($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedById_usuario_solicitado');

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
			$this->addJoinObject($join, 'UsuarioRelatedById_usuario_solicitado');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedById_usuario_solicitado relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedById_usuario_solicitadoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUsuarioRelatedById_usuario_solicitado($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedById_usuario_solicitado', 'UsuarioQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Solicitud_amistadQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedById_usuario_solicitante($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(Solicitud_amistadPeer::ID_USUARIO_SOLICITANTE, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(Solicitud_amistadPeer::ID_USUARIO_SOLICITANTE, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuarioRelatedById_usuario_solicitante() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedById_usuario_solicitante relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    Solicitud_amistadQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedById_usuario_solicitante($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedById_usuario_solicitante');

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
			$this->addJoinObject($join, 'UsuarioRelatedById_usuario_solicitante');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedById_usuario_solicitante relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedById_usuario_solicitanteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUsuarioRelatedById_usuario_solicitante($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedById_usuario_solicitante', 'UsuarioQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Solicitud_amistad $solicitud_amistad Object to remove from the list of results
	 *
	 * @return    Solicitud_amistadQuery The current query, for fluid interface
	 */
	public function prune($solicitud_amistad = null)
	{
		if ($solicitud_amistad) {
			$this->addUsingAlias(Solicitud_amistadPeer::ID, $solicitud_amistad->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseSolicitud_amistadQuery