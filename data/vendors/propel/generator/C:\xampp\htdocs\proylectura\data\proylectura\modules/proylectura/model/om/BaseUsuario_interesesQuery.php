<?php


/**
 * Base class that represents a query for the 'usuario_intereses' table.
 *
 * 
 *
 * @method     Usuario_interesesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     Usuario_interesesQuery orderById_usuario($order = Criteria::ASC) Order by the id_usuario column
 * @method     Usuario_interesesQuery orderById_genero($order = Criteria::ASC) Order by the id_genero column
 *
 * @method     Usuario_interesesQuery groupById() Group by the id column
 * @method     Usuario_interesesQuery groupById_usuario() Group by the id_usuario column
 * @method     Usuario_interesesQuery groupById_genero() Group by the id_genero column
 *
 * @method     Usuario_interesesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     Usuario_interesesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     Usuario_interesesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Usuario_interesesQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     Usuario_interesesQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     Usuario_interesesQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     Usuario_interesesQuery leftJoinGenero($relationAlias = null) Adds a LEFT JOIN clause to the query using the Genero relation
 * @method     Usuario_interesesQuery rightJoinGenero($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Genero relation
 * @method     Usuario_interesesQuery innerJoinGenero($relationAlias = null) Adds a INNER JOIN clause to the query using the Genero relation
 *
 * @method     Usuario_intereses findOne(PropelPDO $con = null) Return the first Usuario_intereses matching the query
 * @method     Usuario_intereses findOneOrCreate(PropelPDO $con = null) Return the first Usuario_intereses matching the query, or a new Usuario_intereses object populated from the query conditions when no match is found
 *
 * @method     Usuario_intereses findOneById(int $id) Return the first Usuario_intereses filtered by the id column
 * @method     Usuario_intereses findOneById_usuario(int $id_usuario) Return the first Usuario_intereses filtered by the id_usuario column
 * @method     Usuario_intereses findOneById_genero(int $id_genero) Return the first Usuario_intereses filtered by the id_genero column
 *
 * @method     array findById(int $id) Return Usuario_intereses objects filtered by the id column
 * @method     array findById_usuario(int $id_usuario) Return Usuario_intereses objects filtered by the id_usuario column
 * @method     array findById_genero(int $id_genero) Return Usuario_intereses objects filtered by the id_genero column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseUsuario_interesesQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseUsuario_interesesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Usuario_intereses', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new Usuario_interesesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    Usuario_interesesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof Usuario_interesesQuery) {
			return $criteria;
		}
		$query = new Usuario_interesesQuery();
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
	 * @return    Usuario_intereses|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = Usuario_interesesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(Usuario_interesesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Usuario_intereses A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ID_USUARIO`, `ID_GENERO` FROM `usuario_intereses` WHERE `ID` = :p0';
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
			$obj = new Usuario_intereses();
			$obj->hydrate($row);
		Usuario_interesesPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Usuario_intereses|array|mixed the result, formatted by the current formatter
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
	 * @return    Usuario_interesesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(Usuario_interesesPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    Usuario_interesesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(Usuario_interesesPeer::ID, $keys, Criteria::IN);
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
	 * @return    Usuario_interesesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(Usuario_interesesPeer::ID, $id, $comparison);
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
	 * @return    Usuario_interesesQuery The current query, for fluid interface
	 */
	public function filterById_usuario($id_usuario = null, $comparison = null)
	{
		if (is_array($id_usuario)) {
			$useMinMax = false;
			if (isset($id_usuario['min'])) {
				$this->addUsingAlias(Usuario_interesesPeer::ID_USUARIO, $id_usuario['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_usuario['max'])) {
				$this->addUsingAlias(Usuario_interesesPeer::ID_USUARIO, $id_usuario['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(Usuario_interesesPeer::ID_USUARIO, $id_usuario, $comparison);
	}

	/**
	 * Filter the query on the id_genero column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_genero(1234); // WHERE id_genero = 1234
	 * $query->filterById_genero(array(12, 34)); // WHERE id_genero IN (12, 34)
	 * $query->filterById_genero(array('min' => 12)); // WHERE id_genero > 12
	 * </code>
	 *
	 * @see       filterByGenero()
	 *
	 * @param     mixed $id_genero The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Usuario_interesesQuery The current query, for fluid interface
	 */
	public function filterById_genero($id_genero = null, $comparison = null)
	{
		if (is_array($id_genero)) {
			$useMinMax = false;
			if (isset($id_genero['min'])) {
				$this->addUsingAlias(Usuario_interesesPeer::ID_GENERO, $id_genero['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_genero['max'])) {
				$this->addUsingAlias(Usuario_interesesPeer::ID_GENERO, $id_genero['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(Usuario_interesesPeer::ID_GENERO, $id_genero, $comparison);
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Usuario_interesesQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(Usuario_interesesPeer::ID_USUARIO, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(Usuario_interesesPeer::ID_USUARIO, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    Usuario_interesesQuery The current query, for fluid interface
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
	 * Filter the query by a related Genero object
	 *
	 * @param     Genero|PropelCollection $genero The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Usuario_interesesQuery The current query, for fluid interface
	 */
	public function filterByGenero($genero, $comparison = null)
	{
		if ($genero instanceof Genero) {
			return $this
				->addUsingAlias(Usuario_interesesPeer::ID_GENERO, $genero->getId(), $comparison);
		} elseif ($genero instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(Usuario_interesesPeer::ID_GENERO, $genero->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByGenero() only accepts arguments of type Genero or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Genero relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    Usuario_interesesQuery The current query, for fluid interface
	 */
	public function joinGenero($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Genero');

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
			$this->addJoinObject($join, 'Genero');
		}

		return $this;
	}

	/**
	 * Use the Genero relation Genero object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GeneroQuery A secondary query class using the current class as primary query
	 */
	public function useGeneroQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinGenero($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Genero', 'GeneroQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Usuario_intereses $usuario_intereses Object to remove from the list of results
	 *
	 * @return    Usuario_interesesQuery The current query, for fluid interface
	 */
	public function prune($usuario_intereses = null)
	{
		if ($usuario_intereses) {
			$this->addUsingAlias(Usuario_interesesPeer::ID, $usuario_intereses->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseUsuario_interesesQuery