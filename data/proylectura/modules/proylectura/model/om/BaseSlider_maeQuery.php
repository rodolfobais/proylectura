<?php


/**
 * Base class that represents a query for the 'slider_mae' table.
 *
 * 
 *
 * @method     Slider_maeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     Slider_maeQuery orderById_libro($order = Criteria::ASC) Order by the id_libro column
 * @method     Slider_maeQuery orderByPosicion($order = Criteria::ASC) Order by the posicion column
 * @method     Slider_maeQuery orderById_categoria($order = Criteria::ASC) Order by the id_categoria column
 *
 * @method     Slider_maeQuery groupById() Group by the id column
 * @method     Slider_maeQuery groupById_libro() Group by the id_libro column
 * @method     Slider_maeQuery groupByPosicion() Group by the posicion column
 * @method     Slider_maeQuery groupById_categoria() Group by the id_categoria column
 *
 * @method     Slider_maeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     Slider_maeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     Slider_maeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Slider_maeQuery leftJoinLibro($relationAlias = null) Adds a LEFT JOIN clause to the query using the Libro relation
 * @method     Slider_maeQuery rightJoinLibro($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Libro relation
 * @method     Slider_maeQuery innerJoinLibro($relationAlias = null) Adds a INNER JOIN clause to the query using the Libro relation
 *
 * @method     Slider_maeQuery leftJoinSlider_categ($relationAlias = null) Adds a LEFT JOIN clause to the query using the Slider_categ relation
 * @method     Slider_maeQuery rightJoinSlider_categ($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Slider_categ relation
 * @method     Slider_maeQuery innerJoinSlider_categ($relationAlias = null) Adds a INNER JOIN clause to the query using the Slider_categ relation
 *
 * @method     Slider_mae findOne(PropelPDO $con = null) Return the first Slider_mae matching the query
 * @method     Slider_mae findOneOrCreate(PropelPDO $con = null) Return the first Slider_mae matching the query, or a new Slider_mae object populated from the query conditions when no match is found
 *
 * @method     Slider_mae findOneById(int $id) Return the first Slider_mae filtered by the id column
 * @method     Slider_mae findOneById_libro(int $id_libro) Return the first Slider_mae filtered by the id_libro column
 * @method     Slider_mae findOneByPosicion(int $posicion) Return the first Slider_mae filtered by the posicion column
 * @method     Slider_mae findOneById_categoria(int $id_categoria) Return the first Slider_mae filtered by the id_categoria column
 *
 * @method     array findById(int $id) Return Slider_mae objects filtered by the id column
 * @method     array findById_libro(int $id_libro) Return Slider_mae objects filtered by the id_libro column
 * @method     array findByPosicion(int $posicion) Return Slider_mae objects filtered by the posicion column
 * @method     array findById_categoria(int $id_categoria) Return Slider_mae objects filtered by the id_categoria column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseSlider_maeQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSlider_maeQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Slider_mae', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new Slider_maeQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    Slider_maeQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof Slider_maeQuery) {
			return $criteria;
		}
		$query = new Slider_maeQuery();
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
	 * @return    Slider_mae|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = Slider_maePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(Slider_maePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Slider_mae A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ID_LIBRO`, `POSICION`, `ID_CATEGORIA` FROM `slider_mae` WHERE `ID` = :p0';
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
			$obj = new Slider_mae();
			$obj->hydrate($row);
		Slider_maePeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Slider_mae|array|mixed the result, formatted by the current formatter
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
	 * @return    Slider_maeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(Slider_maePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    Slider_maeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(Slider_maePeer::ID, $keys, Criteria::IN);
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
	 * @return    Slider_maeQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(Slider_maePeer::ID, $id, $comparison);
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
	 * @return    Slider_maeQuery The current query, for fluid interface
	 */
	public function filterById_libro($id_libro = null, $comparison = null)
	{
		if (is_array($id_libro)) {
			$useMinMax = false;
			if (isset($id_libro['min'])) {
				$this->addUsingAlias(Slider_maePeer::ID_LIBRO, $id_libro['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_libro['max'])) {
				$this->addUsingAlias(Slider_maePeer::ID_LIBRO, $id_libro['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(Slider_maePeer::ID_LIBRO, $id_libro, $comparison);
	}

	/**
	 * Filter the query on the posicion column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPosicion(1234); // WHERE posicion = 1234
	 * $query->filterByPosicion(array(12, 34)); // WHERE posicion IN (12, 34)
	 * $query->filterByPosicion(array('min' => 12)); // WHERE posicion > 12
	 * </code>
	 *
	 * @param     mixed $posicion The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Slider_maeQuery The current query, for fluid interface
	 */
	public function filterByPosicion($posicion = null, $comparison = null)
	{
		if (is_array($posicion)) {
			$useMinMax = false;
			if (isset($posicion['min'])) {
				$this->addUsingAlias(Slider_maePeer::POSICION, $posicion['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($posicion['max'])) {
				$this->addUsingAlias(Slider_maePeer::POSICION, $posicion['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(Slider_maePeer::POSICION, $posicion, $comparison);
	}

	/**
	 * Filter the query on the id_categoria column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_categoria(1234); // WHERE id_categoria = 1234
	 * $query->filterById_categoria(array(12, 34)); // WHERE id_categoria IN (12, 34)
	 * $query->filterById_categoria(array('min' => 12)); // WHERE id_categoria > 12
	 * </code>
	 *
	 * @see       filterBySlider_categ()
	 *
	 * @param     mixed $id_categoria The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Slider_maeQuery The current query, for fluid interface
	 */
	public function filterById_categoria($id_categoria = null, $comparison = null)
	{
		if (is_array($id_categoria)) {
			$useMinMax = false;
			if (isset($id_categoria['min'])) {
				$this->addUsingAlias(Slider_maePeer::ID_CATEGORIA, $id_categoria['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_categoria['max'])) {
				$this->addUsingAlias(Slider_maePeer::ID_CATEGORIA, $id_categoria['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(Slider_maePeer::ID_CATEGORIA, $id_categoria, $comparison);
	}

	/**
	 * Filter the query by a related Libro object
	 *
	 * @param     Libro|PropelCollection $libro The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Slider_maeQuery The current query, for fluid interface
	 */
	public function filterByLibro($libro, $comparison = null)
	{
		if ($libro instanceof Libro) {
			return $this
				->addUsingAlias(Slider_maePeer::ID_LIBRO, $libro->getId(), $comparison);
		} elseif ($libro instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(Slider_maePeer::ID_LIBRO, $libro->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    Slider_maeQuery The current query, for fluid interface
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
	 * Filter the query by a related Slider_categ object
	 *
	 * @param     Slider_categ|PropelCollection $slider_categ The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Slider_maeQuery The current query, for fluid interface
	 */
	public function filterBySlider_categ($slider_categ, $comparison = null)
	{
		if ($slider_categ instanceof Slider_categ) {
			return $this
				->addUsingAlias(Slider_maePeer::ID_CATEGORIA, $slider_categ->getId(), $comparison);
		} elseif ($slider_categ instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(Slider_maePeer::ID_CATEGORIA, $slider_categ->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterBySlider_categ() only accepts arguments of type Slider_categ or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Slider_categ relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    Slider_maeQuery The current query, for fluid interface
	 */
	public function joinSlider_categ($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Slider_categ');

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
			$this->addJoinObject($join, 'Slider_categ');
		}

		return $this;
	}

	/**
	 * Use the Slider_categ relation Slider_categ object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    Slider_categQuery A secondary query class using the current class as primary query
	 */
	public function useSlider_categQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSlider_categ($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Slider_categ', 'Slider_categQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Slider_mae $slider_mae Object to remove from the list of results
	 *
	 * @return    Slider_maeQuery The current query, for fluid interface
	 */
	public function prune($slider_mae = null)
	{
		if ($slider_mae) {
			$this->addUsingAlias(Slider_maePeer::ID, $slider_mae->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseSlider_maeQuery