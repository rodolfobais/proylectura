<?php


/**
 * Base class that represents a query for the 'libro_version' table.
 *
 * 
 *
 * @method     Libro_versionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     Libro_versionQuery orderByIdlibro($order = Criteria::ASC) Order by the idlibro column
 * @method     Libro_versionQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 * @method     Libro_versionQuery orderByHora($order = Criteria::ASC) Order by the hora column
 * @method     Libro_versionQuery orderByIdusuario($order = Criteria::ASC) Order by the idusuario column
 *
 * @method     Libro_versionQuery groupById() Group by the id column
 * @method     Libro_versionQuery groupByIdlibro() Group by the idlibro column
 * @method     Libro_versionQuery groupByFecha() Group by the fecha column
 * @method     Libro_versionQuery groupByHora() Group by the hora column
 * @method     Libro_versionQuery groupByIdusuario() Group by the idusuario column
 *
 * @method     Libro_versionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     Libro_versionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     Libro_versionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Libro_versionQuery leftJoinLibro($relationAlias = null) Adds a LEFT JOIN clause to the query using the Libro relation
 * @method     Libro_versionQuery rightJoinLibro($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Libro relation
 * @method     Libro_versionQuery innerJoinLibro($relationAlias = null) Adds a INNER JOIN clause to the query using the Libro relation
 *
 * @method     Libro_versionQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     Libro_versionQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     Libro_versionQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     Libro_version findOne(PropelPDO $con = null) Return the first Libro_version matching the query
 * @method     Libro_version findOneOrCreate(PropelPDO $con = null) Return the first Libro_version matching the query, or a new Libro_version object populated from the query conditions when no match is found
 *
 * @method     Libro_version findOneById(int $id) Return the first Libro_version filtered by the id column
 * @method     Libro_version findOneByIdlibro(int $idlibro) Return the first Libro_version filtered by the idlibro column
 * @method     Libro_version findOneByFecha(string $fecha) Return the first Libro_version filtered by the fecha column
 * @method     Libro_version findOneByHora(string $hora) Return the first Libro_version filtered by the hora column
 * @method     Libro_version findOneByIdusuario(int $idusuario) Return the first Libro_version filtered by the idusuario column
 *
 * @method     array findById(int $id) Return Libro_version objects filtered by the id column
 * @method     array findByIdlibro(int $idlibro) Return Libro_version objects filtered by the idlibro column
 * @method     array findByFecha(string $fecha) Return Libro_version objects filtered by the fecha column
 * @method     array findByHora(string $hora) Return Libro_version objects filtered by the hora column
 * @method     array findByIdusuario(int $idusuario) Return Libro_version objects filtered by the idusuario column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseLibro_versionQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseLibro_versionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Libro_version', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new Libro_versionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    Libro_versionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof Libro_versionQuery) {
			return $criteria;
		}
		$query = new Libro_versionQuery();
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
	 * @return    Libro_version|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = Libro_versionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(Libro_versionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Libro_version A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `IDLIBRO`, `FECHA`, `HORA`, `IDUSUARIO` FROM `libro_version` WHERE `ID` = :p0';
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
			$obj = new Libro_version();
			$obj->hydrate($row);
		Libro_versionPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Libro_version|array|mixed the result, formatted by the current formatter
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
	 * @return    Libro_versionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(Libro_versionPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    Libro_versionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(Libro_versionPeer::ID, $keys, Criteria::IN);
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
	 * @return    Libro_versionQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(Libro_versionPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the idlibro column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdlibro(1234); // WHERE idlibro = 1234
	 * $query->filterByIdlibro(array(12, 34)); // WHERE idlibro IN (12, 34)
	 * $query->filterByIdlibro(array('min' => 12)); // WHERE idlibro > 12
	 * </code>
	 *
	 * @see       filterByLibro()
	 *
	 * @param     mixed $idlibro The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Libro_versionQuery The current query, for fluid interface
	 */
	public function filterByIdlibro($idlibro = null, $comparison = null)
	{
		if (is_array($idlibro)) {
			$useMinMax = false;
			if (isset($idlibro['min'])) {
				$this->addUsingAlias(Libro_versionPeer::IDLIBRO, $idlibro['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idlibro['max'])) {
				$this->addUsingAlias(Libro_versionPeer::IDLIBRO, $idlibro['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(Libro_versionPeer::IDLIBRO, $idlibro, $comparison);
	}

	/**
	 * Filter the query on the fecha column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFecha('2011-03-14'); // WHERE fecha = '2011-03-14'
	 * $query->filterByFecha('now'); // WHERE fecha = '2011-03-14'
	 * $query->filterByFecha(array('max' => 'yesterday')); // WHERE fecha > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $fecha The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Libro_versionQuery The current query, for fluid interface
	 */
	public function filterByFecha($fecha = null, $comparison = null)
	{
		if (is_array($fecha)) {
			$useMinMax = false;
			if (isset($fecha['min'])) {
				$this->addUsingAlias(Libro_versionPeer::FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fecha['max'])) {
				$this->addUsingAlias(Libro_versionPeer::FECHA, $fecha['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(Libro_versionPeer::FECHA, $fecha, $comparison);
	}

	/**
	 * Filter the query on the hora column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHora('fooValue');   // WHERE hora = 'fooValue'
	 * $query->filterByHora('%fooValue%'); // WHERE hora LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $hora The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Libro_versionQuery The current query, for fluid interface
	 */
	public function filterByHora($hora = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($hora)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $hora)) {
				$hora = str_replace('*', '%', $hora);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(Libro_versionPeer::HORA, $hora, $comparison);
	}

	/**
	 * Filter the query on the idusuario column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdusuario(1234); // WHERE idusuario = 1234
	 * $query->filterByIdusuario(array(12, 34)); // WHERE idusuario IN (12, 34)
	 * $query->filterByIdusuario(array('min' => 12)); // WHERE idusuario > 12
	 * </code>
	 *
	 * @see       filterByUsuario()
	 *
	 * @param     mixed $idusuario The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Libro_versionQuery The current query, for fluid interface
	 */
	public function filterByIdusuario($idusuario = null, $comparison = null)
	{
		if (is_array($idusuario)) {
			$useMinMax = false;
			if (isset($idusuario['min'])) {
				$this->addUsingAlias(Libro_versionPeer::IDUSUARIO, $idusuario['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idusuario['max'])) {
				$this->addUsingAlias(Libro_versionPeer::IDUSUARIO, $idusuario['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(Libro_versionPeer::IDUSUARIO, $idusuario, $comparison);
	}

	/**
	 * Filter the query by a related Libro object
	 *
	 * @param     Libro|PropelCollection $libro The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Libro_versionQuery The current query, for fluid interface
	 */
	public function filterByLibro($libro, $comparison = null)
	{
		if ($libro instanceof Libro) {
			return $this
				->addUsingAlias(Libro_versionPeer::IDLIBRO, $libro->getId(), $comparison);
		} elseif ($libro instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(Libro_versionPeer::IDLIBRO, $libro->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByLibro() only accepts arguments of type Libro or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Libro relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    Libro_versionQuery The current query, for fluid interface
	 */
	public function joinLibro($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Libro');

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
			$this->addJoinObject($join, 'Libro');
		}

		return $this;
	}

	/**
	 * Use the Libro relation Libro object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LibroQuery A secondary query class using the current class as primary query
	 */
	public function useLibroQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinLibro($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Libro', 'LibroQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Libro_versionQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(Libro_versionPeer::IDUSUARIO, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(Libro_versionPeer::IDUSUARIO, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    Libro_versionQuery The current query, for fluid interface
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
	 * @param     Libro_version $libro_version Object to remove from the list of results
	 *
	 * @return    Libro_versionQuery The current query, for fluid interface
	 */
	public function prune($libro_version = null)
	{
		if ($libro_version) {
			$this->addUsingAlias(Libro_versionPeer::ID, $libro_version->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseLibro_versionQuery