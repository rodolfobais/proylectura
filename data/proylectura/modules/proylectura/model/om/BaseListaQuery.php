<?php


/**
 * Base class that represents a query for the 'lista' table.
 *
 * 
 *
 * @method     ListaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ListaQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ListaQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 * @method     ListaQuery orderById_visibilidad($order = Criteria::ASC) Order by the id_visibilidad column
 * @method     ListaQuery orderById_usuario($order = Criteria::ASC) Order by the id_usuario column
 * @method     ListaQuery orderById_genero($order = Criteria::ASC) Order by the id_genero column
 *
 * @method     ListaQuery groupById() Group by the id column
 * @method     ListaQuery groupByNombre() Group by the nombre column
 * @method     ListaQuery groupByFecha() Group by the fecha column
 * @method     ListaQuery groupById_visibilidad() Group by the id_visibilidad column
 * @method     ListaQuery groupById_usuario() Group by the id_usuario column
 * @method     ListaQuery groupById_genero() Group by the id_genero column
 *
 * @method     ListaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ListaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ListaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ListaQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     ListaQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     ListaQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     ListaQuery leftJoinGenero($relationAlias = null) Adds a LEFT JOIN clause to the query using the Genero relation
 * @method     ListaQuery rightJoinGenero($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Genero relation
 * @method     ListaQuery innerJoinGenero($relationAlias = null) Adds a INNER JOIN clause to the query using the Genero relation
 *
 * @method     ListaQuery leftJoinLista_audiolibro($relationAlias = null) Adds a LEFT JOIN clause to the query using the Lista_audiolibro relation
 * @method     ListaQuery rightJoinLista_audiolibro($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Lista_audiolibro relation
 * @method     ListaQuery innerJoinLista_audiolibro($relationAlias = null) Adds a INNER JOIN clause to the query using the Lista_audiolibro relation
 *
 * @method     Lista findOne(PropelPDO $con = null) Return the first Lista matching the query
 * @method     Lista findOneOrCreate(PropelPDO $con = null) Return the first Lista matching the query, or a new Lista object populated from the query conditions when no match is found
 *
 * @method     Lista findOneById(int $id) Return the first Lista filtered by the id column
 * @method     Lista findOneByNombre(string $nombre) Return the first Lista filtered by the nombre column
 * @method     Lista findOneByFecha(string $fecha) Return the first Lista filtered by the fecha column
 * @method     Lista findOneById_visibilidad(int $id_visibilidad) Return the first Lista filtered by the id_visibilidad column
 * @method     Lista findOneById_usuario(int $id_usuario) Return the first Lista filtered by the id_usuario column
 * @method     Lista findOneById_genero(int $id_genero) Return the first Lista filtered by the id_genero column
 *
 * @method     array findById(int $id) Return Lista objects filtered by the id column
 * @method     array findByNombre(string $nombre) Return Lista objects filtered by the nombre column
 * @method     array findByFecha(string $fecha) Return Lista objects filtered by the fecha column
 * @method     array findById_visibilidad(int $id_visibilidad) Return Lista objects filtered by the id_visibilidad column
 * @method     array findById_usuario(int $id_usuario) Return Lista objects filtered by the id_usuario column
 * @method     array findById_genero(int $id_genero) Return Lista objects filtered by the id_genero column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseListaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseListaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Lista', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ListaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ListaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ListaQuery) {
			return $criteria;
		}
		$query = new ListaQuery();
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
	 * @return    Lista|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ListaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ListaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Lista A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NOMBRE`, `FECHA`, `ID_VISIBILIDAD`, `ID_USUARIO`, `ID_GENERO` FROM `lista` WHERE `ID` = :p0';
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
			$obj = new Lista();
			$obj->hydrate($row);
		ListaPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Lista|array|mixed the result, formatted by the current formatter
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
	 * @return    ListaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ListaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ListaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ListaPeer::ID, $keys, Criteria::IN);
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
	 * @return    ListaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ListaPeer::ID, $id, $comparison);
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
	 * @return    ListaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ListaPeer::NOMBRE, $nombre, $comparison);
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
	 * @return    ListaQuery The current query, for fluid interface
	 */
	public function filterByFecha($fecha = null, $comparison = null)
	{
		if (is_array($fecha)) {
			$useMinMax = false;
			if (isset($fecha['min'])) {
				$this->addUsingAlias(ListaPeer::FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fecha['max'])) {
				$this->addUsingAlias(ListaPeer::FECHA, $fecha['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ListaPeer::FECHA, $fecha, $comparison);
	}

	/**
	 * Filter the query on the id_visibilidad column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById_visibilidad(1234); // WHERE id_visibilidad = 1234
	 * $query->filterById_visibilidad(array(12, 34)); // WHERE id_visibilidad IN (12, 34)
	 * $query->filterById_visibilidad(array('min' => 12)); // WHERE id_visibilidad > 12
	 * </code>
	 *
	 * @param     mixed $id_visibilidad The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ListaQuery The current query, for fluid interface
	 */
	public function filterById_visibilidad($id_visibilidad = null, $comparison = null)
	{
		if (is_array($id_visibilidad)) {
			$useMinMax = false;
			if (isset($id_visibilidad['min'])) {
				$this->addUsingAlias(ListaPeer::ID_VISIBILIDAD, $id_visibilidad['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_visibilidad['max'])) {
				$this->addUsingAlias(ListaPeer::ID_VISIBILIDAD, $id_visibilidad['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ListaPeer::ID_VISIBILIDAD, $id_visibilidad, $comparison);
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
	 * @return    ListaQuery The current query, for fluid interface
	 */
	public function filterById_usuario($id_usuario = null, $comparison = null)
	{
		if (is_array($id_usuario)) {
			$useMinMax = false;
			if (isset($id_usuario['min'])) {
				$this->addUsingAlias(ListaPeer::ID_USUARIO, $id_usuario['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_usuario['max'])) {
				$this->addUsingAlias(ListaPeer::ID_USUARIO, $id_usuario['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ListaPeer::ID_USUARIO, $id_usuario, $comparison);
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
	 * @return    ListaQuery The current query, for fluid interface
	 */
	public function filterById_genero($id_genero = null, $comparison = null)
	{
		if (is_array($id_genero)) {
			$useMinMax = false;
			if (isset($id_genero['min'])) {
				$this->addUsingAlias(ListaPeer::ID_GENERO, $id_genero['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($id_genero['max'])) {
				$this->addUsingAlias(ListaPeer::ID_GENERO, $id_genero['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ListaPeer::ID_GENERO, $id_genero, $comparison);
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ListaQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(ListaPeer::ID_USUARIO, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ListaPeer::ID_USUARIO, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    ListaQuery The current query, for fluid interface
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
	 * @return    ListaQuery The current query, for fluid interface
	 */
	public function filterByGenero($genero, $comparison = null)
	{
		if ($genero instanceof Genero) {
			return $this
				->addUsingAlias(ListaPeer::ID_GENERO, $genero->getId(), $comparison);
		} elseif ($genero instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ListaPeer::ID_GENERO, $genero->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    ListaQuery The current query, for fluid interface
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
	 * Filter the query by a related Lista_audiolibro object
	 *
	 * @param     Lista_audiolibro $lista_audiolibro  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ListaQuery The current query, for fluid interface
	 */
	public function filterByLista_audiolibro($lista_audiolibro, $comparison = null)
	{
		if ($lista_audiolibro instanceof Lista_audiolibro) {
			return $this
				->addUsingAlias(ListaPeer::ID, $lista_audiolibro->getId_lista(), $comparison);
		} elseif ($lista_audiolibro instanceof PropelCollection) {
			return $this
				->useLista_audiolibroQuery()
				->filterByPrimaryKeys($lista_audiolibro->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByLista_audiolibro() only accepts arguments of type Lista_audiolibro or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Lista_audiolibro relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ListaQuery The current query, for fluid interface
	 */
	public function joinLista_audiolibro($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Lista_audiolibro');

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
			$this->addJoinObject($join, 'Lista_audiolibro');
		}

		return $this;
	}

	/**
	 * Use the Lista_audiolibro relation Lista_audiolibro object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    Lista_audiolibroQuery A secondary query class using the current class as primary query
	 */
	public function useLista_audiolibroQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinLista_audiolibro($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Lista_audiolibro', 'Lista_audiolibroQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Lista $lista Object to remove from the list of results
	 *
	 * @return    ListaQuery The current query, for fluid interface
	 */
	public function prune($lista = null)
	{
		if ($lista) {
			$this->addUsingAlias(ListaPeer::ID, $lista->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseListaQuery