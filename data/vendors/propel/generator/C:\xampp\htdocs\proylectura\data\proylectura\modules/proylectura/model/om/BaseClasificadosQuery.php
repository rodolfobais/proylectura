<?php


/**
 * Base class that represents a query for the 'clasificados' table.
 *
 * 
 *
 * @method     ClasificadosQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClasificadosQuery orderById_libro($order = Criteria::ASC) Order by the id_libro column
 * @method     ClasificadosQuery orderByTexto_corto($order = Criteria::ASC) Order by the texto_corto column
 * @method     ClasificadosQuery orderByTexto_largo($order = Criteria::ASC) Order by the texto_largo column
 *
 * @method     ClasificadosQuery groupById() Group by the id column
 * @method     ClasificadosQuery groupById_libro() Group by the id_libro column
 * @method     ClasificadosQuery groupByTexto_corto() Group by the texto_corto column
 * @method     ClasificadosQuery groupByTexto_largo() Group by the texto_largo column
 *
 * @method     ClasificadosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClasificadosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClasificadosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClasificadosQuery leftJoinLibro($relationAlias = null) Adds a LEFT JOIN clause to the query using the Libro relation
 * @method     ClasificadosQuery rightJoinLibro($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Libro relation
 * @method     ClasificadosQuery innerJoinLibro($relationAlias = null) Adds a INNER JOIN clause to the query using the Libro relation
 *
 * @method     Clasificados findOne(PropelPDO $con = null) Return the first Clasificados matching the query
 * @method     Clasificados findOneOrCreate(PropelPDO $con = null) Return the first Clasificados matching the query, or a new Clasificados object populated from the query conditions when no match is found
 *
 * @method     Clasificados findOneById(int $id) Return the first Clasificados filtered by the id column
 * @method     Clasificados findOneById_libro(int $id_libro) Return the first Clasificados filtered by the id_libro column
 * @method     Clasificados findOneByTexto_corto(string $texto_corto) Return the first Clasificados filtered by the texto_corto column
 * @method     Clasificados findOneByTexto_largo(string $texto_largo) Return the first Clasificados filtered by the texto_largo column
 *
 * @method     array findById(int $id) Return Clasificados objects filtered by the id column
 * @method     array findById_libro(int $id_libro) Return Clasificados objects filtered by the id_libro column
 * @method     array findByTexto_corto(string $texto_corto) Return Clasificados objects filtered by the texto_corto column
 * @method     array findByTexto_largo(string $texto_largo) Return Clasificados objects filtered by the texto_largo column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseClasificadosQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseClasificadosQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Clasificados', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClasificadosQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClasificadosQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClasificadosQuery) {
			return $criteria;
		}
		$query = new ClasificadosQuery();
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
	 * @return    Clasificados|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ClasificadosPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ClasificadosPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Clasificados A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ID_LIBRO`, `TEXTO_CORTO`, `TEXTO_LARGO` FROM `clasificados` WHERE `ID` = :p0';
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
			$obj = new Clasificados();
			$obj->hydrate($row);
		ClasificadosPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Clasificados|array|mixed the result, formatted by the current formatter
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
	 * @return    ClasificadosQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClasificadosPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClasificadosQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClasificadosPeer::ID, $keys, Criteria::IN);
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
	 * @return    ClasificadosQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClasificadosPeer::ID, $id, $comparison);
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
	 * @return    ClasificadosQuery The current query, for fluid interface
	 */
	public function filterById_libro($id_libro = null, $comparison = null)
	{
		if (is_array($id_libro)) {
			$useMinMax = false;
			if (isset($id_libro['min'])) {
				$this->addUsingAlias(ClasificadosPeer::ID_LIBRO, $id_libro['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_libro['max'])) {
				$this->addUsingAlias(ClasificadosPeer::ID_LIBRO, $id_libro['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClasificadosPeer::ID_LIBRO, $id_libro, $comparison);
	}

	/**
	 * Filter the query on the texto_corto column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTexto_corto('fooValue');   // WHERE texto_corto = 'fooValue'
	 * $query->filterByTexto_corto('%fooValue%'); // WHERE texto_corto LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $texto_corto The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClasificadosQuery The current query, for fluid interface
	 */
	public function filterByTexto_corto($texto_corto = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($texto_corto)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $texto_corto)) {
				$texto_corto = str_replace('*', '%', $texto_corto);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClasificadosPeer::TEXTO_CORTO, $texto_corto, $comparison);
	}

	/**
	 * Filter the query on the texto_largo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTexto_largo('fooValue');   // WHERE texto_largo = 'fooValue'
	 * $query->filterByTexto_largo('%fooValue%'); // WHERE texto_largo LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $texto_largo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClasificadosQuery The current query, for fluid interface
	 */
	public function filterByTexto_largo($texto_largo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($texto_largo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $texto_largo)) {
				$texto_largo = str_replace('*', '%', $texto_largo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClasificadosPeer::TEXTO_LARGO, $texto_largo, $comparison);
	}

	/**
	 * Filter the query by a related Libro object
	 *
	 * @param     Libro|PropelCollection $libro The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClasificadosQuery The current query, for fluid interface
	 */
	public function filterByLibro($libro, $comparison = null)
	{
		if ($libro instanceof Libro) {
			return $this
				->addUsingAlias(ClasificadosPeer::ID_LIBRO, $libro->getId(), $comparison);
		} elseif ($libro instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ClasificadosPeer::ID_LIBRO, $libro->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    ClasificadosQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     Clasificados $clasificados Object to remove from the list of results
	 *
	 * @return    ClasificadosQuery The current query, for fluid interface
	 */
	public function prune($clasificados = null)
	{
		if ($clasificados) {
			$this->addUsingAlias(ClasificadosPeer::ID, $clasificados->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseClasificadosQuery