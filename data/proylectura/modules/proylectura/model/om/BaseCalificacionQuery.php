<?php


/**
 * Base class that represents a query for the 'calificacion' table.
 *
 * 
 *
 * @method     CalificacionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CalificacionQuery orderByPuntuacion($order = Criteria::ASC) Order by the puntuacion column
 * @method     CalificacionQuery orderByComentario($order = Criteria::ASC) Order by the comentario column
 * @method     CalificacionQuery orderById_usuario($order = Criteria::ASC) Order by the id_usuario column
 * @method     CalificacionQuery orderById_lista($order = Criteria::ASC) Order by the id_lista column
 *
 * @method     CalificacionQuery groupById() Group by the id column
 * @method     CalificacionQuery groupByPuntuacion() Group by the puntuacion column
 * @method     CalificacionQuery groupByComentario() Group by the comentario column
 * @method     CalificacionQuery groupById_usuario() Group by the id_usuario column
 * @method     CalificacionQuery groupById_lista() Group by the id_lista column
 *
 * @method     CalificacionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CalificacionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CalificacionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Calificacion findOne(PropelPDO $con = null) Return the first Calificacion matching the query
 * @method     Calificacion findOneOrCreate(PropelPDO $con = null) Return the first Calificacion matching the query, or a new Calificacion object populated from the query conditions when no match is found
 *
 * @method     Calificacion findOneById(int $id) Return the first Calificacion filtered by the id column
 * @method     Calificacion findOneByPuntuacion(int $puntuacion) Return the first Calificacion filtered by the puntuacion column
 * @method     Calificacion findOneByComentario(string $comentario) Return the first Calificacion filtered by the comentario column
 * @method     Calificacion findOneById_usuario(int $id_usuario) Return the first Calificacion filtered by the id_usuario column
 * @method     Calificacion findOneById_lista(int $id_lista) Return the first Calificacion filtered by the id_lista column
 *
 * @method     array findById(int $id) Return Calificacion objects filtered by the id column
 * @method     array findByPuntuacion(int $puntuacion) Return Calificacion objects filtered by the puntuacion column
 * @method     array findByComentario(string $comentario) Return Calificacion objects filtered by the comentario column
 * @method     array findById_usuario(int $id_usuario) Return Calificacion objects filtered by the id_usuario column
 * @method     array findById_lista(int $id_lista) Return Calificacion objects filtered by the id_lista column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseCalificacionQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseCalificacionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Calificacion', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CalificacionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CalificacionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CalificacionQuery) {
			return $criteria;
		}
		$query = new CalificacionQuery();
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
	 * @return    Calificacion|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = CalificacionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(CalificacionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Calificacion A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `PUNTUACION`, `COMENTARIO`, `ID_USUARIO`, `ID_LISTA` FROM `calificacion` WHERE `ID` = :p0';
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
			$obj = new Calificacion();
			$obj->hydrate($row);
		CalificacionPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Calificacion|array|mixed the result, formatted by the current formatter
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
	 * @return    CalificacionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CalificacionPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CalificacionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CalificacionPeer::ID, $keys, Criteria::IN);
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
	 * @return    CalificacionQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CalificacionPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the puntuacion column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPuntuacion(1234); // WHERE puntuacion = 1234
	 * $query->filterByPuntuacion(array(12, 34)); // WHERE puntuacion IN (12, 34)
	 * $query->filterByPuntuacion(array('min' => 12)); // WHERE puntuacion > 12
	 * </code>
	 *
	 * @param     mixed $puntuacion The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CalificacionQuery The current query, for fluid interface
	 */
	public function filterByPuntuacion($puntuacion = null, $comparison = null)
	{
		if (is_array($puntuacion)) {
			$useMinMax = false;
			if (isset($puntuacion['min'])) {
				$this->addUsingAlias(CalificacionPeer::PUNTUACION, $puntuacion['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($puntuacion['max'])) {
				$this->addUsingAlias(CalificacionPeer::PUNTUACION, $puntuacion['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CalificacionPeer::PUNTUACION, $puntuacion, $comparison);
	}

	/**
	 * Filter the query on the comentario column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByComentario('fooValue');   // WHERE comentario = 'fooValue'
	 * $query->filterByComentario('%fooValue%'); // WHERE comentario LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $comentario The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CalificacionQuery The current query, for fluid interface
	 */
	public function filterByComentario($comentario = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($comentario)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $comentario)) {
				$comentario = str_replace('*', '%', $comentario);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CalificacionPeer::COMENTARIO, $comentario, $comparison);
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
	 * @param     mixed $id_usuario The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CalificacionQuery The current query, for fluid interface
	 */
	public function filterById_usuario($id_usuario = null, $comparison = null)
	{
		if (is_array($id_usuario)) {
			$useMinMax = false;
			if (isset($id_usuario['min'])) {
				$this->addUsingAlias(CalificacionPeer::ID_USUARIO, $id_usuario['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_usuario['max'])) {
				$this->addUsingAlias(CalificacionPeer::ID_USUARIO, $id_usuario['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CalificacionPeer::ID_USUARIO, $id_usuario, $comparison);
	}

	/**
	 * Filter the query on the id_lista column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_lista(1234); // WHERE id_lista = 1234
	 * $query->filterById_lista(array(12, 34)); // WHERE id_lista IN (12, 34)
	 * $query->filterById_lista(array('min' => 12)); // WHERE id_lista > 12
	 * </code>
	 *
	 * @param     mixed $id_lista The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CalificacionQuery The current query, for fluid interface
	 */
	public function filterById_lista($id_lista = null, $comparison = null)
	{
		if (is_array($id_lista)) {
			$useMinMax = false;
			if (isset($id_lista['min'])) {
				$this->addUsingAlias(CalificacionPeer::ID_LISTA, $id_lista['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_lista['max'])) {
				$this->addUsingAlias(CalificacionPeer::ID_LISTA, $id_lista['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CalificacionPeer::ID_LISTA, $id_lista, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Calificacion $calificacion Object to remove from the list of results
	 *
	 * @return    CalificacionQuery The current query, for fluid interface
	 */
	public function prune($calificacion = null)
	{
		if ($calificacion) {
			$this->addUsingAlias(CalificacionPeer::ID, $calificacion->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseCalificacionQuery