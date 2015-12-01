<?php


/**
 * Base class that represents a query for the 'libro' table.
 *
 * 
 *
 * @method     LibroQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     LibroQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     LibroQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 * @method     LibroQuery orderByHash($order = Criteria::ASC) Order by the hash column
 * @method     LibroQuery orderById_genero($order = Criteria::ASC) Order by the id_genero column
 * @method     LibroQuery orderById_autor($order = Criteria::ASC) Order by the id_autor column
 * @method     LibroQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     LibroQuery orderBySinopsis($order = Criteria::ASC) Order by the sinopsis column
 * @method     LibroQuery orderByTexto($order = Criteria::ASC) Order by the texto column
 *
 * @method     LibroQuery groupById() Group by the id column
 * @method     LibroQuery groupByNombre() Group by the nombre column
 * @method     LibroQuery groupByFecha() Group by the fecha column
 * @method     LibroQuery groupByHash() Group by the hash column
 * @method     LibroQuery groupById_genero() Group by the id_genero column
 * @method     LibroQuery groupById_autor() Group by the id_autor column
 * @method     LibroQuery groupByImage() Group by the image column
 * @method     LibroQuery groupBySinopsis() Group by the sinopsis column
 * @method     LibroQuery groupByTexto() Group by the texto column
 *
 * @method     LibroQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     LibroQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     LibroQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     LibroQuery leftJoinLibro_colaborador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Libro_colaborador relation
 * @method     LibroQuery rightJoinLibro_colaborador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Libro_colaborador relation
 * @method     LibroQuery innerJoinLibro_colaborador($relationAlias = null) Adds a INNER JOIN clause to the query using the Libro_colaborador relation
 *
 * @method     LibroQuery leftJoinLibro_version($relationAlias = null) Adds a LEFT JOIN clause to the query using the Libro_version relation
 * @method     LibroQuery rightJoinLibro_version($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Libro_version relation
 * @method     LibroQuery innerJoinLibro_version($relationAlias = null) Adds a INNER JOIN clause to the query using the Libro_version relation
 *
 * @method     LibroQuery leftJoinSlider_mae($relationAlias = null) Adds a LEFT JOIN clause to the query using the Slider_mae relation
 * @method     LibroQuery rightJoinSlider_mae($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Slider_mae relation
 * @method     LibroQuery innerJoinSlider_mae($relationAlias = null) Adds a INNER JOIN clause to the query using the Slider_mae relation
 *
 * @method     LibroQuery leftJoinPostulantes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Postulantes relation
 * @method     LibroQuery rightJoinPostulantes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Postulantes relation
 * @method     LibroQuery innerJoinPostulantes($relationAlias = null) Adds a INNER JOIN clause to the query using the Postulantes relation
 *
 * @method     LibroQuery leftJoinClasificados($relationAlias = null) Adds a LEFT JOIN clause to the query using the Clasificados relation
 * @method     LibroQuery rightJoinClasificados($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Clasificados relation
 * @method     LibroQuery innerJoinClasificados($relationAlias = null) Adds a INNER JOIN clause to the query using the Clasificados relation
 *
 * @method     Libro findOne(PropelPDO $con = null) Return the first Libro matching the query
 * @method     Libro findOneOrCreate(PropelPDO $con = null) Return the first Libro matching the query, or a new Libro object populated from the query conditions when no match is found
 *
 * @method     Libro findOneById(int $id) Return the first Libro filtered by the id column
 * @method     Libro findOneByNombre(string $nombre) Return the first Libro filtered by the nombre column
 * @method     Libro findOneByFecha(string $fecha) Return the first Libro filtered by the fecha column
 * @method     Libro findOneByHash(string $hash) Return the first Libro filtered by the hash column
 * @method     Libro findOneById_genero(int $id_genero) Return the first Libro filtered by the id_genero column
 * @method     Libro findOneById_autor(int $id_autor) Return the first Libro filtered by the id_autor column
 * @method     Libro findOneByImage(string $image) Return the first Libro filtered by the image column
 * @method     Libro findOneBySinopsis(string $sinopsis) Return the first Libro filtered by the sinopsis column
 * @method     Libro findOneByTexto(resource $texto) Return the first Libro filtered by the texto column
 *
 * @method     array findById(int $id) Return Libro objects filtered by the id column
 * @method     array findByNombre(string $nombre) Return Libro objects filtered by the nombre column
 * @method     array findByFecha(string $fecha) Return Libro objects filtered by the fecha column
 * @method     array findByHash(string $hash) Return Libro objects filtered by the hash column
 * @method     array findById_genero(int $id_genero) Return Libro objects filtered by the id_genero column
 * @method     array findById_autor(int $id_autor) Return Libro objects filtered by the id_autor column
 * @method     array findByImage(string $image) Return Libro objects filtered by the image column
 * @method     array findBySinopsis(string $sinopsis) Return Libro objects filtered by the sinopsis column
 * @method     array findByTexto(resource $texto) Return Libro objects filtered by the texto column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseLibroQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseLibroQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Libro', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new LibroQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    LibroQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof LibroQuery) {
			return $criteria;
		}
		$query = new LibroQuery();
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
	 * @return    Libro|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = LibroPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(LibroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Libro A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NOMBRE`, `FECHA`, `HASH`, `ID_GENERO`, `ID_AUTOR`, `IMAGE`, `SINOPSIS`, `TEXTO` FROM `libro` WHERE `ID` = :p0';
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
			$obj = new Libro();
			$obj->hydrate($row);
		LibroPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Libro|array|mixed the result, formatted by the current formatter
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
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(LibroPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(LibroPeer::ID, $keys, Criteria::IN);
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
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(LibroPeer::ID, $id, $comparison);
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
	 * @return    LibroQuery The current query, for fluid interface
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
		return $this->addUsingAlias(LibroPeer::NOMBRE, $nombre, $comparison);
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
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function filterByFecha($fecha = null, $comparison = null)
	{
		if (is_array($fecha)) {
			$useMinMax = false;
			if (isset($fecha['min'])) {
				$this->addUsingAlias(LibroPeer::FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fecha['max'])) {
				$this->addUsingAlias(LibroPeer::FECHA, $fecha['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LibroPeer::FECHA, $fecha, $comparison);
	}

	/**
	 * Filter the query on the hash column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHash('fooValue');   // WHERE hash = 'fooValue'
	 * $query->filterByHash('%fooValue%'); // WHERE hash LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $hash The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function filterByHash($hash = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($hash)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $hash)) {
				$hash = str_replace('*', '%', $hash);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LibroPeer::HASH, $hash, $comparison);
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
	 * @param     mixed $id_genero The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function filterById_genero($id_genero = null, $comparison = null)
	{
		if (is_array($id_genero)) {
			$useMinMax = false;
			if (isset($id_genero['min'])) {
				$this->addUsingAlias(LibroPeer::ID_GENERO, $id_genero['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_genero['max'])) {
				$this->addUsingAlias(LibroPeer::ID_GENERO, $id_genero['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LibroPeer::ID_GENERO, $id_genero, $comparison);
	}

	/**
	 * Filter the query on the id_autor column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_autor(1234); // WHERE id_autor = 1234
	 * $query->filterById_autor(array(12, 34)); // WHERE id_autor IN (12, 34)
	 * $query->filterById_autor(array('min' => 12)); // WHERE id_autor > 12
	 * </code>
	 *
	 * @param     mixed $id_autor The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function filterById_autor($id_autor = null, $comparison = null)
	{
		if (is_array($id_autor)) {
			$useMinMax = false;
			if (isset($id_autor['min'])) {
				$this->addUsingAlias(LibroPeer::ID_AUTOR, $id_autor['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_autor['max'])) {
				$this->addUsingAlias(LibroPeer::ID_AUTOR, $id_autor['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LibroPeer::ID_AUTOR, $id_autor, $comparison);
	}

	/**
	 * Filter the query on the image column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByImage('fooValue');   // WHERE image = 'fooValue'
	 * $query->filterByImage('%fooValue%'); // WHERE image LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $image The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function filterByImage($image = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($image)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $image)) {
				$image = str_replace('*', '%', $image);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LibroPeer::IMAGE, $image, $comparison);
	}

	/**
	 * Filter the query on the sinopsis column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySinopsis('fooValue');   // WHERE sinopsis = 'fooValue'
	 * $query->filterBySinopsis('%fooValue%'); // WHERE sinopsis LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $sinopsis The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function filterBySinopsis($sinopsis = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sinopsis)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sinopsis)) {
				$sinopsis = str_replace('*', '%', $sinopsis);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LibroPeer::SINOPSIS, $sinopsis, $comparison);
	}

	/**
	 * Filter the query on the texto column
	 *
	 * @param     mixed $texto The value to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function filterByTexto($texto = null, $comparison = null)
	{
		return $this->addUsingAlias(LibroPeer::TEXTO, $texto, $comparison);
	}

	/**
	 * Filter the query by a related Libro_colaborador object
	 *
	 * @param     Libro_colaborador $libro_colaborador  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function filterByLibro_colaborador($libro_colaborador, $comparison = null)
	{
		if ($libro_colaborador instanceof Libro_colaborador) {
			return $this
				->addUsingAlias(LibroPeer::ID, $libro_colaborador->getIdlibro(), $comparison);
		} elseif ($libro_colaborador instanceof PropelCollection) {
			return $this
				->useLibro_colaboradorQuery()
				->filterByPrimaryKeys($libro_colaborador->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByLibro_colaborador() only accepts arguments of type Libro_colaborador or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Libro_colaborador relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function joinLibro_colaborador($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Libro_colaborador');

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
			$this->addJoinObject($join, 'Libro_colaborador');
		}

		return $this;
	}

	/**
	 * Use the Libro_colaborador relation Libro_colaborador object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    Libro_colaboradorQuery A secondary query class using the current class as primary query
	 */
	public function useLibro_colaboradorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinLibro_colaborador($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Libro_colaborador', 'Libro_colaboradorQuery');
	}

	/**
	 * Filter the query by a related Libro_version object
	 *
	 * @param     Libro_version $libro_version  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function filterByLibro_version($libro_version, $comparison = null)
	{
		if ($libro_version instanceof Libro_version) {
			return $this
				->addUsingAlias(LibroPeer::ID, $libro_version->getIdlibro(), $comparison);
		} elseif ($libro_version instanceof PropelCollection) {
			return $this
				->useLibro_versionQuery()
				->filterByPrimaryKeys($libro_version->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByLibro_version() only accepts arguments of type Libro_version or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Libro_version relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function joinLibro_version($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Libro_version');

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
			$this->addJoinObject($join, 'Libro_version');
		}

		return $this;
	}

	/**
	 * Use the Libro_version relation Libro_version object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    Libro_versionQuery A secondary query class using the current class as primary query
	 */
	public function useLibro_versionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinLibro_version($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Libro_version', 'Libro_versionQuery');
	}

	/**
	 * Filter the query by a related Slider_mae object
	 *
	 * @param     Slider_mae $slider_mae  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function filterBySlider_mae($slider_mae, $comparison = null)
	{
		if ($slider_mae instanceof Slider_mae) {
			return $this
				->addUsingAlias(LibroPeer::ID, $slider_mae->getId_libro(), $comparison);
		} elseif ($slider_mae instanceof PropelCollection) {
			return $this
				->useSlider_maeQuery()
				->filterByPrimaryKeys($slider_mae->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySlider_mae() only accepts arguments of type Slider_mae or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Slider_mae relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function joinSlider_mae($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Slider_mae');

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
			$this->addJoinObject($join, 'Slider_mae');
		}

		return $this;
	}

	/**
	 * Use the Slider_mae relation Slider_mae object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    Slider_maeQuery A secondary query class using the current class as primary query
	 */
	public function useSlider_maeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSlider_mae($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Slider_mae', 'Slider_maeQuery');
	}

	/**
	 * Filter the query by a related Postulantes object
	 *
	 * @param     Postulantes $postulantes  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function filterByPostulantes($postulantes, $comparison = null)
	{
		if ($postulantes instanceof Postulantes) {
			return $this
				->addUsingAlias(LibroPeer::ID, $postulantes->getId_libro(), $comparison);
		} elseif ($postulantes instanceof PropelCollection) {
			return $this
				->usePostulantesQuery()
				->filterByPrimaryKeys($postulantes->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByPostulantes() only accepts arguments of type Postulantes or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Postulantes relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function joinPostulantes($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Postulantes');

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
			$this->addJoinObject($join, 'Postulantes');
		}

		return $this;
	}

	/**
	 * Use the Postulantes relation Postulantes object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PostulantesQuery A secondary query class using the current class as primary query
	 */
	public function usePostulantesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPostulantes($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Postulantes', 'PostulantesQuery');
	}

	/**
	 * Filter the query by a related Clasificados object
	 *
	 * @param     Clasificados $clasificados  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function filterByClasificados($clasificados, $comparison = null)
	{
		if ($clasificados instanceof Clasificados) {
			return $this
				->addUsingAlias(LibroPeer::ID, $clasificados->getId_libro(), $comparison);
		} elseif ($clasificados instanceof PropelCollection) {
			return $this
				->useClasificadosQuery()
				->filterByPrimaryKeys($clasificados->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByClasificados() only accepts arguments of type Clasificados or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Clasificados relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function joinClasificados($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Clasificados');

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
			$this->addJoinObject($join, 'Clasificados');
		}

		return $this;
	}

	/**
	 * Use the Clasificados relation Clasificados object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClasificadosQuery A secondary query class using the current class as primary query
	 */
	public function useClasificadosQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinClasificados($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Clasificados', 'ClasificadosQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Libro $libro Object to remove from the list of results
	 *
	 * @return    LibroQuery The current query, for fluid interface
	 */
	public function prune($libro = null)
	{
		if ($libro) {
			$this->addUsingAlias(LibroPeer::ID, $libro->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseLibroQuery