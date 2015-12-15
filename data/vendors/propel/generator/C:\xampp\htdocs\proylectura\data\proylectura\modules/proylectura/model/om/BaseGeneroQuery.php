<?php


/**
 * Base class that represents a query for the 'genero' table.
 *
 * 
 *
 * @method     GeneroQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     GeneroQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 *
 * @method     GeneroQuery groupById() Group by the id column
 * @method     GeneroQuery groupByNombre() Group by the nombre column
 *
 * @method     GeneroQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     GeneroQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     GeneroQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     GeneroQuery leftJoinLibro($relationAlias = null) Adds a LEFT JOIN clause to the query using the Libro relation
 * @method     GeneroQuery rightJoinLibro($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Libro relation
 * @method     GeneroQuery innerJoinLibro($relationAlias = null) Adds a INNER JOIN clause to the query using the Libro relation
 *
 * @method     GeneroQuery leftJoinUsuario_intereses($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario_intereses relation
 * @method     GeneroQuery rightJoinUsuario_intereses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario_intereses relation
 * @method     GeneroQuery innerJoinUsuario_intereses($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario_intereses relation
 *
 * @method     GeneroQuery leftJoinLista($relationAlias = null) Adds a LEFT JOIN clause to the query using the Lista relation
 * @method     GeneroQuery rightJoinLista($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Lista relation
 * @method     GeneroQuery innerJoinLista($relationAlias = null) Adds a INNER JOIN clause to the query using the Lista relation
 *
 * @method     Genero findOne(PropelPDO $con = null) Return the first Genero matching the query
 * @method     Genero findOneOrCreate(PropelPDO $con = null) Return the first Genero matching the query, or a new Genero object populated from the query conditions when no match is found
 *
 * @method     Genero findOneById(int $id) Return the first Genero filtered by the id column
 * @method     Genero findOneByNombre(string $nombre) Return the first Genero filtered by the nombre column
 *
 * @method     array findById(int $id) Return Genero objects filtered by the id column
 * @method     array findByNombre(string $nombre) Return Genero objects filtered by the nombre column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseGeneroQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseGeneroQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Genero', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new GeneroQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    GeneroQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof GeneroQuery) {
			return $criteria;
		}
		$query = new GeneroQuery();
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
	 * @return    Genero|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = GeneroPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(GeneroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Genero A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NOMBRE` FROM `genero` WHERE `ID` = :p0';
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
			$obj = new Genero();
			$obj->hydrate($row);
		GeneroPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Genero|array|mixed the result, formatted by the current formatter
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
	 * @return    GeneroQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(GeneroPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    GeneroQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(GeneroPeer::ID, $keys, Criteria::IN);
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
	 * @return    GeneroQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(GeneroPeer::ID, $id, $comparison);
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
	 * @return    GeneroQuery The current query, for fluid interface
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
		return $this->addUsingAlias(GeneroPeer::NOMBRE, $nombre, $comparison);
	}

	/**
	 * Filter the query by a related Libro object
	 *
	 * @param     Libro $libro  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneroQuery The current query, for fluid interface
	 */
	public function filterByLibro($libro, $comparison = null)
	{
		if ($libro instanceof Libro) {
			return $this
				->addUsingAlias(GeneroPeer::ID, $libro->getId_genero(), $comparison);
		} elseif ($libro instanceof PropelCollection) {
			return $this
				->useLibroQuery()
				->filterByPrimaryKeys($libro->getPrimaryKeys())
				->endUse();
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
	 * @return    GeneroQuery The current query, for fluid interface
	 */
	public function joinLibro($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useLibroQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinLibro($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Libro', 'LibroQuery');
	}

	/**
	 * Filter the query by a related Usuario_intereses object
	 *
	 * @param     Usuario_intereses $usuario_intereses  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneroQuery The current query, for fluid interface
	 */
	public function filterByUsuario_intereses($usuario_intereses, $comparison = null)
	{
		if ($usuario_intereses instanceof Usuario_intereses) {
			return $this
				->addUsingAlias(GeneroPeer::ID, $usuario_intereses->getId_genero(), $comparison);
		} elseif ($usuario_intereses instanceof PropelCollection) {
			return $this
				->useUsuario_interesesQuery()
				->filterByPrimaryKeys($usuario_intereses->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByUsuario_intereses() only accepts arguments of type Usuario_intereses or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Usuario_intereses relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GeneroQuery The current query, for fluid interface
	 */
	public function joinUsuario_intereses($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Usuario_intereses');

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
			$this->addJoinObject($join, 'Usuario_intereses');
		}

		return $this;
	}

	/**
	 * Use the Usuario_intereses relation Usuario_intereses object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    Usuario_interesesQuery A secondary query class using the current class as primary query
	 */
	public function useUsuario_interesesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUsuario_intereses($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Usuario_intereses', 'Usuario_interesesQuery');
	}

	/**
	 * Filter the query by a related Lista object
	 *
	 * @param     Lista $lista  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneroQuery The current query, for fluid interface
	 */
	public function filterByLista($lista, $comparison = null)
	{
		if ($lista instanceof Lista) {
			return $this
				->addUsingAlias(GeneroPeer::ID, $lista->getId_genero(), $comparison);
		} elseif ($lista instanceof PropelCollection) {
			return $this
				->useListaQuery()
				->filterByPrimaryKeys($lista->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByLista() only accepts arguments of type Lista or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Lista relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GeneroQuery The current query, for fluid interface
	 */
	public function joinLista($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Lista');

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
			$this->addJoinObject($join, 'Lista');
		}

		return $this;
	}

	/**
	 * Use the Lista relation Lista object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ListaQuery A secondary query class using the current class as primary query
	 */
	public function useListaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinLista($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Lista', 'ListaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Genero $genero Object to remove from the list of results
	 *
	 * @return    GeneroQuery The current query, for fluid interface
	 */
	public function prune($genero = null)
	{
		if ($genero) {
			$this->addUsingAlias(GeneroPeer::ID, $genero->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseGeneroQuery