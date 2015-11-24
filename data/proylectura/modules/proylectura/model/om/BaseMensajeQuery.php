<?php


/**
 * Base class that represents a query for the 'mensaje' table.
 *
 * 
 *
 * @method     MensajeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MensajeQuery orderById_usuario_destinatario($order = Criteria::ASC) Order by the id_usuario_destinatario column
 * @method     MensajeQuery orderById_usuario_remitente($order = Criteria::ASC) Order by the id_usuario_remitente column
 * @method     MensajeQuery orderBymensaje($order = Criteria::ASC) Order by the mensaje column
 *
 * @method     MensajeQuery groupById() Group by the id column
 * @method     MensajeQuery groupById_usuario_destinatario() Group by the id_usuario_destinatario column
 * @method     MensajeQuery groupById_usuario_remitente() Group by the id_usuario_remitente column
 * @method     MensajeQuery groupBymensaje() Group by the mensaje column
 *
 * @method     MensajeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MensajeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MensajeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MensajeQuery leftJoinUsuarioRelatedById_usuario_destinatario($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedById_usuario_destinatario relation
 * @method     MensajeQuery rightJoinUsuarioRelatedById_usuario_destinatario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedById_usuario_destinatario relation
 * @method     MensajeQuery innerJoinUsuarioRelatedById_usuario_destinatario($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedById_usuario_destinatario relation
 *
 * @method     MensajeQuery leftJoinUsuarioRelatedById_usuario_remitente($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedById_usuario_remitente relation
 * @method     MensajeQuery rightJoinUsuarioRelatedById_usuario_remitente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedById_usuario_remitente relation
 * @method     MensajeQuery innerJoinUsuarioRelatedById_usuario_remitente($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedById_usuario_remitente relation
 *
 * @method     Mensaje findOne(PropelPDO $con = null) Return the first Mensaje matching the query
 * @method     Mensaje findOneOrCreate(PropelPDO $con = null) Return the first Mensaje matching the query, or a new Mensaje object populated from the query conditions when no match is found
 *
 * @method     Mensaje findOneById(int $id) Return the first Mensaje filtered by the id column
 * @method     Mensaje findOneById_usuario_destinatario(int $id_usuario_destinatario) Return the first Mensaje filtered by the id_usuario_destinatario column
 * @method     Mensaje findOneById_usuario_remitente(int $id_usuario_remitente) Return the first Mensaje filtered by the id_usuario_remitente column
 * @method     Mensaje findOneBymensaje(string $mensaje) Return the first Mensaje filtered by the mensaje column
 *
 * @method     array findById(int $id) Return Mensaje objects filtered by the id column
 * @method     array findById_usuario_destinatario(int $id_usuario_destinatario) Return Mensaje objects filtered by the id_usuario_destinatario column
 * @method     array findById_usuario_remitente(int $id_usuario_remitente) Return Mensaje objects filtered by the id_usuario_remitente column
 * @method     array findBymensaje(string $mensaje) Return Mensaje objects filtered by the mensaje column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseMensajeQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseMensajeQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Mensaje', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MensajeQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MensajeQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MensajeQuery) {
			return $criteria;
		}
		$query = new MensajeQuery();
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
	 * @return    Mensaje|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = MensajePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(MensajePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Mensaje A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ID_USUARIO_DESTINATARIO`, `ID_USUARIO_REMITENTE`, `MENSAJE` FROM `mensaje` WHERE `ID` = :p0';
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
			$obj = new Mensaje();
			$obj->hydrate($row);
		MensajePeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Mensaje|array|mixed the result, formatted by the current formatter
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
	 * @return    MensajeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MensajePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MensajeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MensajePeer::ID, $keys, Criteria::IN);
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
	 * @return    MensajeQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MensajePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_usuario_destinatario column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_usuario_destinatario(1234); // WHERE id_usuario_destinatario = 1234
	 * $query->filterById_usuario_destinatario(array(12, 34)); // WHERE id_usuario_destinatario IN (12, 34)
	 * $query->filterById_usuario_destinatario(array('min' => 12)); // WHERE id_usuario_destinatario > 12
	 * </code>
	 *
	 * @see       filterByUsuarioRelatedById_usuario_destinatario()
	 *
	 * @param     mixed $id_usuario_destinatario The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MensajeQuery The current query, for fluid interface
	 */
	public function filterById_usuario_destinatario($id_usuario_destinatario = null, $comparison = null)
	{
		if (is_array($id_usuario_destinatario)) {
			$useMinMax = false;
			if (isset($id_usuario_destinatario['min'])) {
				$this->addUsingAlias(MensajePeer::ID_USUARIO_DESTINATARIO, $id_usuario_destinatario['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_usuario_destinatario['max'])) {
				$this->addUsingAlias(MensajePeer::ID_USUARIO_DESTINATARIO, $id_usuario_destinatario['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MensajePeer::ID_USUARIO_DESTINATARIO, $id_usuario_destinatario, $comparison);
	}

	/**
	 * Filter the query on the id_usuario_remitente column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_usuario_remitente(1234); // WHERE id_usuario_remitente = 1234
	 * $query->filterById_usuario_remitente(array(12, 34)); // WHERE id_usuario_remitente IN (12, 34)
	 * $query->filterById_usuario_remitente(array('min' => 12)); // WHERE id_usuario_remitente > 12
	 * </code>
	 *
	 * @see       filterByUsuarioRelatedById_usuario_remitente()
	 *
	 * @param     mixed $id_usuario_remitente The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MensajeQuery The current query, for fluid interface
	 */
	public function filterById_usuario_remitente($id_usuario_remitente = null, $comparison = null)
	{
		if (is_array($id_usuario_remitente)) {
			$useMinMax = false;
			if (isset($id_usuario_remitente['min'])) {
				$this->addUsingAlias(MensajePeer::ID_USUARIO_REMITENTE, $id_usuario_remitente['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_usuario_remitente['max'])) {
				$this->addUsingAlias(MensajePeer::ID_USUARIO_REMITENTE, $id_usuario_remitente['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MensajePeer::ID_USUARIO_REMITENTE, $id_usuario_remitente, $comparison);
	}

	/**
	 * Filter the query on the mensaje column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBymensaje('fooValue');   // WHERE mensaje = 'fooValue'
	 * $query->filterBymensaje('%fooValue%'); // WHERE mensaje LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $mensaje The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MensajeQuery The current query, for fluid interface
	 */
	public function filterBymensaje($mensaje = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($mensaje)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $mensaje)) {
				$mensaje = str_replace('*', '%', $mensaje);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MensajePeer::MENSAJE, $mensaje, $comparison);
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MensajeQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedById_usuario_destinatario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(MensajePeer::ID_USUARIO_DESTINATARIO, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MensajePeer::ID_USUARIO_DESTINATARIO, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuarioRelatedById_usuario_destinatario() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedById_usuario_destinatario relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MensajeQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedById_usuario_destinatario($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedById_usuario_destinatario');

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
			$this->addJoinObject($join, 'UsuarioRelatedById_usuario_destinatario');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedById_usuario_destinatario relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedById_usuario_destinatarioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUsuarioRelatedById_usuario_destinatario($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedById_usuario_destinatario', 'UsuarioQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MensajeQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedById_usuario_remitente($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(MensajePeer::ID_USUARIO_REMITENTE, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MensajePeer::ID_USUARIO_REMITENTE, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuarioRelatedById_usuario_remitente() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedById_usuario_remitente relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MensajeQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedById_usuario_remitente($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedById_usuario_remitente');

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
			$this->addJoinObject($join, 'UsuarioRelatedById_usuario_remitente');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedById_usuario_remitente relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedById_usuario_remitenteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUsuarioRelatedById_usuario_remitente($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedById_usuario_remitente', 'UsuarioQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Mensaje $mensaje Object to remove from the list of results
	 *
	 * @return    MensajeQuery The current query, for fluid interface
	 */
	public function prune($mensaje = null)
	{
		if ($mensaje) {
			$this->addUsingAlias(MensajePeer::ID, $mensaje->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseMensajeQuery