<?php


/**
 * Base class that represents a query for the 'postulantes' table.
 *
 * 
 *
 * @method     PostulantesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PostulantesQuery orderById_libro($order = Criteria::ASC) Order by the id_libro column
 * @method     PostulantesQuery orderById_postulante($order = Criteria::ASC) Order by the id_postulante column
 * @method     PostulantesQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 *
 * @method     PostulantesQuery groupById() Group by the id column
 * @method     PostulantesQuery groupById_libro() Group by the id_libro column
 * @method     PostulantesQuery groupById_postulante() Group by the id_postulante column
 * @method     PostulantesQuery groupByEstado() Group by the estado column
 *
 * @method     PostulantesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PostulantesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PostulantesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PostulantesQuery leftJoinLibro($relationAlias = null) Adds a LEFT JOIN clause to the query using the Libro relation
 * @method     PostulantesQuery rightJoinLibro($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Libro relation
 * @method     PostulantesQuery innerJoinLibro($relationAlias = null) Adds a INNER JOIN clause to the query using the Libro relation
 *
 * @method     PostulantesQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     PostulantesQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     PostulantesQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     Postulantes findOne(PropelPDO $con = null) Return the first Postulantes matching the query
 * @method     Postulantes findOneOrCreate(PropelPDO $con = null) Return the first Postulantes matching the query, or a new Postulantes object populated from the query conditions when no match is found
 *
 * @method     Postulantes findOneById(int $id) Return the first Postulantes filtered by the id column
 * @method     Postulantes findOneById_libro(int $id_libro) Return the first Postulantes filtered by the id_libro column
 * @method     Postulantes findOneById_postulante(int $id_postulante) Return the first Postulantes filtered by the id_postulante column
 * @method     Postulantes findOneByEstado(int $estado) Return the first Postulantes filtered by the estado column
 *
 * @method     array findById(int $id) Return Postulantes objects filtered by the id column
 * @method     array findById_libro(int $id_libro) Return Postulantes objects filtered by the id_libro column
 * @method     array findById_postulante(int $id_postulante) Return Postulantes objects filtered by the id_postulante column
 * @method     array findByEstado(int $estado) Return Postulantes objects filtered by the estado column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BasePostulantesQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePostulantesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Postulantes', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PostulantesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PostulantesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PostulantesQuery) {
			return $criteria;
		}
		$query = new PostulantesQuery();
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
	 * @return    Postulantes|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PostulantesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PostulantesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Postulantes A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ID_LIBRO`, `ID_POSTULANTE`, `ESTADO` FROM `postulantes` WHERE `ID` = :p0';
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
			$obj = new Postulantes();
			$obj->hydrate($row);
		PostulantesPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Postulantes|array|mixed the result, formatted by the current formatter
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
	 * @return    PostulantesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PostulantesPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PostulantesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PostulantesPeer::ID, $keys, Criteria::IN);
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
	 * @return    PostulantesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PostulantesPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_libro column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_libro(1234); // WHERE id_libro = 1234
	 * $query->filterById_libro(array(12, 34)); // WHERE id_libro IN (12, 34)
	 * $query->filterById_libro(array('min' => 12)); // WHERE id_libro > 12
	 * </code>
	 *
	 * @see       filterByLibro()
	 *
	 * @param     mixed $id_libro The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostulantesQuery The current query, for fluid interface
	 */
	public function filterById_libro($id_libro = null, $comparison = null)
	{
		if (is_array($id_libro)) {
			$useMinMax = false;
			if (isset($id_libro['min'])) {
				$this->addUsingAlias(PostulantesPeer::ID_LIBRO, $id_libro['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_libro['max'])) {
				$this->addUsingAlias(PostulantesPeer::ID_LIBRO, $id_libro['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PostulantesPeer::ID_LIBRO, $id_libro, $comparison);
	}

	/**
	 * Filter the query on the id_postulante column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_postulante(1234); // WHERE id_postulante = 1234
	 * $query->filterById_postulante(array(12, 34)); // WHERE id_postulante IN (12, 34)
	 * $query->filterById_postulante(array('min' => 12)); // WHERE id_postulante > 12
	 * </code>
	 *
	 * @see       filterByUsuario()
	 *
	 * @param     mixed $id_postulante The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostulantesQuery The current query, for fluid interface
	 */
	public function filterById_postulante($id_postulante = null, $comparison = null)
	{
		if (is_array($id_postulante)) {
			$useMinMax = false;
			if (isset($id_postulante['min'])) {
				$this->addUsingAlias(PostulantesPeer::ID_POSTULANTE, $id_postulante['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_postulante['max'])) {
				$this->addUsingAlias(PostulantesPeer::ID_POSTULANTE, $id_postulante['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PostulantesPeer::ID_POSTULANTE, $id_postulante, $comparison);
	}

	/**
	 * Filter the query on the estado column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEstado(1234); // WHERE estado = 1234
	 * $query->filterByEstado(array(12, 34)); // WHERE estado IN (12, 34)
	 * $query->filterByEstado(array('min' => 12)); // WHERE estado > 12
	 * </code>
	 *
	 * @param     mixed $estado The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostulantesQuery The current query, for fluid interface
	 */
	public function filterByEstado($estado = null, $comparison = null)
	{
		if (is_array($estado)) {
			$useMinMax = false;
			if (isset($estado['min'])) {
				$this->addUsingAlias(PostulantesPeer::ESTADO, $estado['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($estado['max'])) {
				$this->addUsingAlias(PostulantesPeer::ESTADO, $estado['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PostulantesPeer::ESTADO, $estado, $comparison);
	}

	/**
	 * Filter the query by a related Libro object
	 *
	 * @param     Libro|PropelCollection $libro The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostulantesQuery The current query, for fluid interface
	 */
	public function filterByLibro($libro, $comparison = null)
	{
		if ($libro instanceof Libro) {
			return $this
				->addUsingAlias(PostulantesPeer::ID_LIBRO, $libro->getId(), $comparison);
		} elseif ($libro instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PostulantesPeer::ID_LIBRO, $libro->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    PostulantesQuery The current query, for fluid interface
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
	 * @return    PostulantesQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(PostulantesPeer::ID_POSTULANTE, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PostulantesPeer::ID_POSTULANTE, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    PostulantesQuery The current query, for fluid interface
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
	 * @param     Postulantes $postulantes Object to remove from the list of results
	 *
	 * @return    PostulantesQuery The current query, for fluid interface
	 */
	public function prune($postulantes = null)
	{
		if ($postulantes) {
			$this->addUsingAlias(PostulantesPeer::ID, $postulantes->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BasePostulantesQuery