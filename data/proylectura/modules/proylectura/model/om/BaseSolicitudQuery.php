<?php


/**
 * Base class that represents a query for the 'solicitud' table.
 *
 * 
 *
 * @method     SolicitudQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SolicitudQuery orderById_libro($order = Criteria::ASC) Order by the id_libro column
 * @method     SolicitudQuery orderById_usuario_solicitante($order = Criteria::ASC) Order by the id_usuario_solicitante column
 * @method     SolicitudQuery orderById_estado($order = Criteria::ASC) Order by the id_estado column
 * @method     SolicitudQuery orderByFecha_solic($order = Criteria::ASC) Order by the fecha_solic column
 * @method     SolicitudQuery orderByHora_solic($order = Criteria::ASC) Order by the hora_solic column
 * @method     SolicitudQuery orderByFecha_aprob($order = Criteria::ASC) Order by the fecha_aprob column
 * @method     SolicitudQuery orderByHora_aprob($order = Criteria::ASC) Order by the hora_aprob column
 *
 * @method     SolicitudQuery groupById() Group by the id column
 * @method     SolicitudQuery groupById_libro() Group by the id_libro column
 * @method     SolicitudQuery groupById_usuario_solicitante() Group by the id_usuario_solicitante column
 * @method     SolicitudQuery groupById_estado() Group by the id_estado column
 * @method     SolicitudQuery groupByFecha_solic() Group by the fecha_solic column
 * @method     SolicitudQuery groupByHora_solic() Group by the hora_solic column
 * @method     SolicitudQuery groupByFecha_aprob() Group by the fecha_aprob column
 * @method     SolicitudQuery groupByHora_aprob() Group by the hora_aprob column
 *
 * @method     SolicitudQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SolicitudQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SolicitudQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SolicitudQuery leftJoinLibro($relationAlias = null) Adds a LEFT JOIN clause to the query using the Libro relation
 * @method     SolicitudQuery rightJoinLibro($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Libro relation
 * @method     SolicitudQuery innerJoinLibro($relationAlias = null) Adds a INNER JOIN clause to the query using the Libro relation
 *
 * @method     SolicitudQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     SolicitudQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     SolicitudQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     SolicitudQuery leftJoinSolicitud_estado($relationAlias = null) Adds a LEFT JOIN clause to the query using the Solicitud_estado relation
 * @method     SolicitudQuery rightJoinSolicitud_estado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Solicitud_estado relation
 * @method     SolicitudQuery innerJoinSolicitud_estado($relationAlias = null) Adds a INNER JOIN clause to the query using the Solicitud_estado relation
 *
 * @method     Solicitud findOne(PropelPDO $con = null) Return the first Solicitud matching the query
 * @method     Solicitud findOneOrCreate(PropelPDO $con = null) Return the first Solicitud matching the query, or a new Solicitud object populated from the query conditions when no match is found
 *
 * @method     Solicitud findOneById(int $id) Return the first Solicitud filtered by the id column
 * @method     Solicitud findOneById_libro(int $id_libro) Return the first Solicitud filtered by the id_libro column
 * @method     Solicitud findOneById_usuario_solicitante(int $id_usuario_solicitante) Return the first Solicitud filtered by the id_usuario_solicitante column
 * @method     Solicitud findOneById_estado(int $id_estado) Return the first Solicitud filtered by the id_estado column
 * @method     Solicitud findOneByFecha_solic(string $fecha_solic) Return the first Solicitud filtered by the fecha_solic column
 * @method     Solicitud findOneByHora_solic(string $hora_solic) Return the first Solicitud filtered by the hora_solic column
 * @method     Solicitud findOneByFecha_aprob(string $fecha_aprob) Return the first Solicitud filtered by the fecha_aprob column
 * @method     Solicitud findOneByHora_aprob(string $hora_aprob) Return the first Solicitud filtered by the hora_aprob column
 *
 * @method     array findById(int $id) Return Solicitud objects filtered by the id column
 * @method     array findById_libro(int $id_libro) Return Solicitud objects filtered by the id_libro column
 * @method     array findById_usuario_solicitante(int $id_usuario_solicitante) Return Solicitud objects filtered by the id_usuario_solicitante column
 * @method     array findById_estado(int $id_estado) Return Solicitud objects filtered by the id_estado column
 * @method     array findByFecha_solic(string $fecha_solic) Return Solicitud objects filtered by the fecha_solic column
 * @method     array findByHora_solic(string $hora_solic) Return Solicitud objects filtered by the hora_solic column
 * @method     array findByFecha_aprob(string $fecha_aprob) Return Solicitud objects filtered by the fecha_aprob column
 * @method     array findByHora_aprob(string $hora_aprob) Return Solicitud objects filtered by the hora_aprob column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseSolicitudQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSolicitudQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Solicitud', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SolicitudQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SolicitudQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SolicitudQuery) {
			return $criteria;
		}
		$query = new SolicitudQuery();
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
	 * @return    Solicitud|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SolicitudPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SolicitudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Solicitud A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ID_LIBRO`, `ID_USUARIO_SOLICITANTE`, `ID_ESTADO`, `FECHA_SOLIC`, `HORA_SOLIC`, `FECHA_APROB`, `HORA_APROB` FROM `solicitud` WHERE `ID` = :p0';
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
			$obj = new Solicitud();
			$obj->hydrate($row);
		SolicitudPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Solicitud|array|mixed the result, formatted by the current formatter
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
	 * @return    SolicitudQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SolicitudPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SolicitudQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SolicitudPeer::ID, $keys, Criteria::IN);
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
	 * @return    SolicitudQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SolicitudPeer::ID, $id, $comparison);
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
	 * @return    SolicitudQuery The current query, for fluid interface
	 */
	public function filterById_libro($id_libro = null, $comparison = null)
	{
		if (is_array($id_libro)) {
			$useMinMax = false;
			if (isset($id_libro['min'])) {
				$this->addUsingAlias(SolicitudPeer::ID_LIBRO, $id_libro['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_libro['max'])) {
				$this->addUsingAlias(SolicitudPeer::ID_LIBRO, $id_libro['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SolicitudPeer::ID_LIBRO, $id_libro, $comparison);
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
	 * @see       filterByUsuario()
	 *
	 * @param     mixed $id_usuario_solicitante The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitudQuery The current query, for fluid interface
	 */
	public function filterById_usuario_solicitante($id_usuario_solicitante = null, $comparison = null)
	{
		if (is_array($id_usuario_solicitante)) {
			$useMinMax = false;
			if (isset($id_usuario_solicitante['min'])) {
				$this->addUsingAlias(SolicitudPeer::ID_USUARIO_SOLICITANTE, $id_usuario_solicitante['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_usuario_solicitante['max'])) {
				$this->addUsingAlias(SolicitudPeer::ID_USUARIO_SOLICITANTE, $id_usuario_solicitante['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SolicitudPeer::ID_USUARIO_SOLICITANTE, $id_usuario_solicitante, $comparison);
	}

	/**
	 * Filter the query on the id_estado column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_estado(1234); // WHERE id_estado = 1234
	 * $query->filterById_estado(array(12, 34)); // WHERE id_estado IN (12, 34)
	 * $query->filterById_estado(array('min' => 12)); // WHERE id_estado > 12
	 * </code>
	 *
	 * @see       filterBySolicitud_estado()
	 *
	 * @param     mixed $id_estado The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitudQuery The current query, for fluid interface
	 */
	public function filterById_estado($id_estado = null, $comparison = null)
	{
		if (is_array($id_estado)) {
			$useMinMax = false;
			if (isset($id_estado['min'])) {
				$this->addUsingAlias(SolicitudPeer::ID_ESTADO, $id_estado['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_estado['max'])) {
				$this->addUsingAlias(SolicitudPeer::ID_ESTADO, $id_estado['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SolicitudPeer::ID_ESTADO, $id_estado, $comparison);
	}

	/**
	 * Filter the query on the fecha_solic column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFecha_solic('2011-03-14'); // WHERE fecha_solic = '2011-03-14'
	 * $query->filterByFecha_solic('now'); // WHERE fecha_solic = '2011-03-14'
	 * $query->filterByFecha_solic(array('max' => 'yesterday')); // WHERE fecha_solic > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $fecha_solic The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitudQuery The current query, for fluid interface
	 */
	public function filterByFecha_solic($fecha_solic = null, $comparison = null)
	{
		if (is_array($fecha_solic)) {
			$useMinMax = false;
			if (isset($fecha_solic['min'])) {
				$this->addUsingAlias(SolicitudPeer::FECHA_SOLIC, $fecha_solic['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fecha_solic['max'])) {
				$this->addUsingAlias(SolicitudPeer::FECHA_SOLIC, $fecha_solic['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SolicitudPeer::FECHA_SOLIC, $fecha_solic, $comparison);
	}

	/**
	 * Filter the query on the hora_solic column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHora_solic('fooValue');   // WHERE hora_solic = 'fooValue'
	 * $query->filterByHora_solic('%fooValue%'); // WHERE hora_solic LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $hora_solic The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitudQuery The current query, for fluid interface
	 */
	public function filterByHora_solic($hora_solic = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($hora_solic)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $hora_solic)) {
				$hora_solic = str_replace('*', '%', $hora_solic);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SolicitudPeer::HORA_SOLIC, $hora_solic, $comparison);
	}

	/**
	 * Filter the query on the fecha_aprob column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFecha_aprob('2011-03-14'); // WHERE fecha_aprob = '2011-03-14'
	 * $query->filterByFecha_aprob('now'); // WHERE fecha_aprob = '2011-03-14'
	 * $query->filterByFecha_aprob(array('max' => 'yesterday')); // WHERE fecha_aprob > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $fecha_aprob The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitudQuery The current query, for fluid interface
	 */
	public function filterByFecha_aprob($fecha_aprob = null, $comparison = null)
	{
		if (is_array($fecha_aprob)) {
			$useMinMax = false;
			if (isset($fecha_aprob['min'])) {
				$this->addUsingAlias(SolicitudPeer::FECHA_APROB, $fecha_aprob['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fecha_aprob['max'])) {
				$this->addUsingAlias(SolicitudPeer::FECHA_APROB, $fecha_aprob['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SolicitudPeer::FECHA_APROB, $fecha_aprob, $comparison);
	}

	/**
	 * Filter the query on the hora_aprob column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHora_aprob('fooValue');   // WHERE hora_aprob = 'fooValue'
	 * $query->filterByHora_aprob('%fooValue%'); // WHERE hora_aprob LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $hora_aprob The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitudQuery The current query, for fluid interface
	 */
	public function filterByHora_aprob($hora_aprob = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($hora_aprob)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $hora_aprob)) {
				$hora_aprob = str_replace('*', '%', $hora_aprob);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SolicitudPeer::HORA_APROB, $hora_aprob, $comparison);
	}

	/**
	 * Filter the query by a related Libro object
	 *
	 * @param     Libro|PropelCollection $libro The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitudQuery The current query, for fluid interface
	 */
	public function filterByLibro($libro, $comparison = null)
	{
		if ($libro instanceof Libro) {
			return $this
				->addUsingAlias(SolicitudPeer::ID_LIBRO, $libro->getId(), $comparison);
		} elseif ($libro instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SolicitudPeer::ID_LIBRO, $libro->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    SolicitudQuery The current query, for fluid interface
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
	 * @return    SolicitudQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(SolicitudPeer::ID_USUARIO_SOLICITANTE, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SolicitudPeer::ID_USUARIO_SOLICITANTE, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    SolicitudQuery The current query, for fluid interface
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
	 * Filter the query by a related Solicitud_estado object
	 *
	 * @param     Solicitud_estado|PropelCollection $solicitud_estado The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitudQuery The current query, for fluid interface
	 */
	public function filterBySolicitud_estado($solicitud_estado, $comparison = null)
	{
		if ($solicitud_estado instanceof Solicitud_estado) {
			return $this
				->addUsingAlias(SolicitudPeer::ID_ESTADO, $solicitud_estado->getId(), $comparison);
		} elseif ($solicitud_estado instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SolicitudPeer::ID_ESTADO, $solicitud_estado->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterBySolicitud_estado() only accepts arguments of type Solicitud_estado or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Solicitud_estado relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SolicitudQuery The current query, for fluid interface
	 */
	public function joinSolicitud_estado($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Solicitud_estado');

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
			$this->addJoinObject($join, 'Solicitud_estado');
		}

		return $this;
	}

	/**
	 * Use the Solicitud_estado relation Solicitud_estado object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    Solicitud_estadoQuery A secondary query class using the current class as primary query
	 */
	public function useSolicitud_estadoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSolicitud_estado($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Solicitud_estado', 'Solicitud_estadoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Solicitud $solicitud Object to remove from the list of results
	 *
	 * @return    SolicitudQuery The current query, for fluid interface
	 */
	public function prune($solicitud = null)
	{
		if ($solicitud) {
			$this->addUsingAlias(SolicitudPeer::ID, $solicitud->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseSolicitudQuery