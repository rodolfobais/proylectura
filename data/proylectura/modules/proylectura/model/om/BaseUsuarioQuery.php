<?php


/**
 * Base class that represents a query for the 'usuario' table.
 *
 * 
 *
 * @method     UsuarioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     UsuarioQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     UsuarioQuery orderBymail($order = Criteria::ASC) Order by the mail column
 * @method     UsuarioQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     UsuarioQuery orderByAdmin($order = Criteria::ASC) Order by the admin column
 * @method     UsuarioQuery orderByEducacion($order = Criteria::ASC) Order by the educacion column
 * @method     UsuarioQuery orderByLugar($order = Criteria::ASC) Order by the lugar column
 * @method     UsuarioQuery orderByNota($order = Criteria::ASC) Order by the nota column
 *
 * @method     UsuarioQuery groupById() Group by the id column
 * @method     UsuarioQuery groupByNombre() Group by the nombre column
 * @method     UsuarioQuery groupBymail() Group by the mail column
 * @method     UsuarioQuery groupByPassword() Group by the password column
 * @method     UsuarioQuery groupByAdmin() Group by the admin column
 * @method     UsuarioQuery groupByEducacion() Group by the educacion column
 * @method     UsuarioQuery groupByLugar() Group by the lugar column
 * @method     UsuarioQuery groupByNota() Group by the nota column
 *
 * @method     UsuarioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UsuarioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UsuarioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UsuarioQuery leftJoinAmistadRelatedById_usuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the AmistadRelatedById_usuario relation
 * @method     UsuarioQuery rightJoinAmistadRelatedById_usuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AmistadRelatedById_usuario relation
 * @method     UsuarioQuery innerJoinAmistadRelatedById_usuario($relationAlias = null) Adds a INNER JOIN clause to the query using the AmistadRelatedById_usuario relation
 *
 * @method     UsuarioQuery leftJoinAmistadRelatedByid_usuarioamigo($relationAlias = null) Adds a LEFT JOIN clause to the query using the AmistadRelatedByid_usuarioamigo relation
 * @method     UsuarioQuery rightJoinAmistadRelatedByid_usuarioamigo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AmistadRelatedByid_usuarioamigo relation
 * @method     UsuarioQuery innerJoinAmistadRelatedByid_usuarioamigo($relationAlias = null) Adds a INNER JOIN clause to the query using the AmistadRelatedByid_usuarioamigo relation
 *
 * @method     UsuarioQuery leftJoinCalificacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Calificacion relation
 * @method     UsuarioQuery rightJoinCalificacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Calificacion relation
 * @method     UsuarioQuery innerJoinCalificacion($relationAlias = null) Adds a INNER JOIN clause to the query using the Calificacion relation
 *
 * @method     UsuarioQuery leftJoinComentario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Comentario relation
 * @method     UsuarioQuery rightJoinComentario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Comentario relation
 * @method     UsuarioQuery innerJoinComentario($relationAlias = null) Adds a INNER JOIN clause to the query using the Comentario relation
 *
 * @method     UsuarioQuery leftJoinLibroRelatedByUsuario_ult_acc($relationAlias = null) Adds a LEFT JOIN clause to the query using the LibroRelatedByUsuario_ult_acc relation
 * @method     UsuarioQuery rightJoinLibroRelatedByUsuario_ult_acc($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LibroRelatedByUsuario_ult_acc relation
 * @method     UsuarioQuery innerJoinLibroRelatedByUsuario_ult_acc($relationAlias = null) Adds a INNER JOIN clause to the query using the LibroRelatedByUsuario_ult_acc relation
 *
 * @method     UsuarioQuery leftJoinLibroRelatedById_usuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the LibroRelatedById_usuario relation
 * @method     UsuarioQuery rightJoinLibroRelatedById_usuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LibroRelatedById_usuario relation
 * @method     UsuarioQuery innerJoinLibroRelatedById_usuario($relationAlias = null) Adds a INNER JOIN clause to the query using the LibroRelatedById_usuario relation
 *
 * @method     UsuarioQuery leftJoinUsuario_intereses($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario_intereses relation
 * @method     UsuarioQuery rightJoinUsuario_intereses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario_intereses relation
 * @method     UsuarioQuery innerJoinUsuario_intereses($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario_intereses relation
 *
 * @method     UsuarioQuery leftJoinLista($relationAlias = null) Adds a LEFT JOIN clause to the query using the Lista relation
 * @method     UsuarioQuery rightJoinLista($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Lista relation
 * @method     UsuarioQuery innerJoinLista($relationAlias = null) Adds a INNER JOIN clause to the query using the Lista relation
 *
 * @method     UsuarioQuery leftJoinLibro_colaborador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Libro_colaborador relation
 * @method     UsuarioQuery rightJoinLibro_colaborador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Libro_colaborador relation
 * @method     UsuarioQuery innerJoinLibro_colaborador($relationAlias = null) Adds a INNER JOIN clause to the query using the Libro_colaborador relation
 *
 * @method     UsuarioQuery leftJoinLibro_version($relationAlias = null) Adds a LEFT JOIN clause to the query using the Libro_version relation
 * @method     UsuarioQuery rightJoinLibro_version($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Libro_version relation
 * @method     UsuarioQuery innerJoinLibro_version($relationAlias = null) Adds a INNER JOIN clause to the query using the Libro_version relation
 *
 * @method     UsuarioQuery leftJoinMensajeRelatedById_usuario_destinatario($relationAlias = null) Adds a LEFT JOIN clause to the query using the MensajeRelatedById_usuario_destinatario relation
 * @method     UsuarioQuery rightJoinMensajeRelatedById_usuario_destinatario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MensajeRelatedById_usuario_destinatario relation
 * @method     UsuarioQuery innerJoinMensajeRelatedById_usuario_destinatario($relationAlias = null) Adds a INNER JOIN clause to the query using the MensajeRelatedById_usuario_destinatario relation
 *
 * @method     UsuarioQuery leftJoinMensajeRelatedById_usuario_remitente($relationAlias = null) Adds a LEFT JOIN clause to the query using the MensajeRelatedById_usuario_remitente relation
 * @method     UsuarioQuery rightJoinMensajeRelatedById_usuario_remitente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MensajeRelatedById_usuario_remitente relation
 * @method     UsuarioQuery innerJoinMensajeRelatedById_usuario_remitente($relationAlias = null) Adds a INNER JOIN clause to the query using the MensajeRelatedById_usuario_remitente relation
 *
 * @method     UsuarioQuery leftJoinNotificacionRelatedById_emisor($relationAlias = null) Adds a LEFT JOIN clause to the query using the NotificacionRelatedById_emisor relation
 * @method     UsuarioQuery rightJoinNotificacionRelatedById_emisor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NotificacionRelatedById_emisor relation
 * @method     UsuarioQuery innerJoinNotificacionRelatedById_emisor($relationAlias = null) Adds a INNER JOIN clause to the query using the NotificacionRelatedById_emisor relation
 *
 * @method     UsuarioQuery leftJoinNotificacionRelatedById_receptor($relationAlias = null) Adds a LEFT JOIN clause to the query using the NotificacionRelatedById_receptor relation
 * @method     UsuarioQuery rightJoinNotificacionRelatedById_receptor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NotificacionRelatedById_receptor relation
 * @method     UsuarioQuery innerJoinNotificacionRelatedById_receptor($relationAlias = null) Adds a INNER JOIN clause to the query using the NotificacionRelatedById_receptor relation
 *
 * @method     UsuarioQuery leftJoinSolicitud($relationAlias = null) Adds a LEFT JOIN clause to the query using the Solicitud relation
 * @method     UsuarioQuery rightJoinSolicitud($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Solicitud relation
 * @method     UsuarioQuery innerJoinSolicitud($relationAlias = null) Adds a INNER JOIN clause to the query using the Solicitud relation
 *
 * @method     UsuarioQuery leftJoinPostulantes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Postulantes relation
 * @method     UsuarioQuery rightJoinPostulantes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Postulantes relation
 * @method     UsuarioQuery innerJoinPostulantes($relationAlias = null) Adds a INNER JOIN clause to the query using the Postulantes relation
 *
 * @method     Usuario findOne(PropelPDO $con = null) Return the first Usuario matching the query
 * @method     Usuario findOneOrCreate(PropelPDO $con = null) Return the first Usuario matching the query, or a new Usuario object populated from the query conditions when no match is found
 *
 * @method     Usuario findOneById(int $id) Return the first Usuario filtered by the id column
 * @method     Usuario findOneByNombre(string $nombre) Return the first Usuario filtered by the nombre column
 * @method     Usuario findOneBymail(string $mail) Return the first Usuario filtered by the mail column
 * @method     Usuario findOneByPassword(string $password) Return the first Usuario filtered by the password column
 * @method     Usuario findOneByAdmin(int $admin) Return the first Usuario filtered by the admin column
 * @method     Usuario findOneByEducacion(string $educacion) Return the first Usuario filtered by the educacion column
 * @method     Usuario findOneByLugar(string $lugar) Return the first Usuario filtered by the lugar column
 * @method     Usuario findOneByNota(string $nota) Return the first Usuario filtered by the nota column
 *
 * @method     array findById(int $id) Return Usuario objects filtered by the id column
 * @method     array findByNombre(string $nombre) Return Usuario objects filtered by the nombre column
 * @method     array findBymail(string $mail) Return Usuario objects filtered by the mail column
 * @method     array findByPassword(string $password) Return Usuario objects filtered by the password column
 * @method     array findByAdmin(int $admin) Return Usuario objects filtered by the admin column
 * @method     array findByEducacion(string $educacion) Return Usuario objects filtered by the educacion column
 * @method     array findByLugar(string $lugar) Return Usuario objects filtered by the lugar column
 * @method     array findByNota(string $nota) Return Usuario objects filtered by the nota column
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseUsuarioQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseUsuarioQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'proylectura', $modelName = 'Usuario', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UsuarioQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UsuarioQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UsuarioQuery) {
			return $criteria;
		}
		$query = new UsuarioQuery();
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
	 * @return    Usuario|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = UsuarioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Usuario A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NOMBRE`, `MAIL`, `PASSWORD`, `ADMIN`, `EDUCACION`, `LUGAR`, `NOTA` FROM `usuario` WHERE `ID` = :p0';
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
			$obj = new Usuario();
			$obj->hydrate($row);
		UsuarioPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Usuario|array|mixed the result, formatted by the current formatter
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
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UsuarioPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UsuarioPeer::ID, $keys, Criteria::IN);
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
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UsuarioPeer::ID, $id, $comparison);
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
	 * @return    UsuarioQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UsuarioPeer::NOMBRE, $nombre, $comparison);
	}

	/**
	 * Filter the query on the mail column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBymail('fooValue');   // WHERE mail = 'fooValue'
	 * $query->filterBymail('%fooValue%'); // WHERE mail LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $mail The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterBymail($mail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($mail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $mail)) {
				$mail = str_replace('*', '%', $mail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::MAIL, $mail, $comparison);
	}

	/**
	 * Filter the query on the password column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
	 * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $password The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByPassword($password = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($password)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $password)) {
				$password = str_replace('*', '%', $password);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the admin column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAdmin(1234); // WHERE admin = 1234
	 * $query->filterByAdmin(array(12, 34)); // WHERE admin IN (12, 34)
	 * $query->filterByAdmin(array('min' => 12)); // WHERE admin > 12
	 * </code>
	 *
	 * @param     mixed $admin The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByAdmin($admin = null, $comparison = null)
	{
		if (is_array($admin)) {
			$useMinMax = false;
			if (isset($admin['min'])) {
				$this->addUsingAlias(UsuarioPeer::ADMIN, $admin['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($admin['max'])) {
				$this->addUsingAlias(UsuarioPeer::ADMIN, $admin['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::ADMIN, $admin, $comparison);
	}

	/**
	 * Filter the query on the educacion column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEducacion('fooValue');   // WHERE educacion = 'fooValue'
	 * $query->filterByEducacion('%fooValue%'); // WHERE educacion LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $educacion The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByEducacion($educacion = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($educacion)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $educacion)) {
				$educacion = str_replace('*', '%', $educacion);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::EDUCACION, $educacion, $comparison);
	}

	/**
	 * Filter the query on the lugar column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLugar('fooValue');   // WHERE lugar = 'fooValue'
	 * $query->filterByLugar('%fooValue%'); // WHERE lugar LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $lugar The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByLugar($lugar = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($lugar)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $lugar)) {
				$lugar = str_replace('*', '%', $lugar);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::LUGAR, $lugar, $comparison);
	}

	/**
	 * Filter the query on the nota column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNota('fooValue');   // WHERE nota = 'fooValue'
	 * $query->filterByNota('%fooValue%'); // WHERE nota LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nota The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByNota($nota = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nota)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nota)) {
				$nota = str_replace('*', '%', $nota);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::NOTA, $nota, $comparison);
	}

	/**
	 * Filter the query by a related Amistad object
	 *
	 * @param     Amistad $amistad  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByAmistadRelatedById_usuario($amistad, $comparison = null)
	{
		if ($amistad instanceof Amistad) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $amistad->getId_usuario(), $comparison);
		} elseif ($amistad instanceof PropelCollection) {
			return $this
				->useAmistadRelatedById_usuarioQuery()
				->filterByPrimaryKeys($amistad->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAmistadRelatedById_usuario() only accepts arguments of type Amistad or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AmistadRelatedById_usuario relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinAmistadRelatedById_usuario($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AmistadRelatedById_usuario');

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
			$this->addJoinObject($join, 'AmistadRelatedById_usuario');
		}

		return $this;
	}

	/**
	 * Use the AmistadRelatedById_usuario relation Amistad object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AmistadQuery A secondary query class using the current class as primary query
	 */
	public function useAmistadRelatedById_usuarioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAmistadRelatedById_usuario($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AmistadRelatedById_usuario', 'AmistadQuery');
	}

	/**
	 * Filter the query by a related Amistad object
	 *
	 * @param     Amistad $amistad  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByAmistadRelatedByid_usuarioamigo($amistad, $comparison = null)
	{
		if ($amistad instanceof Amistad) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $amistad->getid_usuarioamigo(), $comparison);
		} elseif ($amistad instanceof PropelCollection) {
			return $this
				->useAmistadRelatedByid_usuarioamigoQuery()
				->filterByPrimaryKeys($amistad->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAmistadRelatedByid_usuarioamigo() only accepts arguments of type Amistad or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AmistadRelatedByid_usuarioamigo relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinAmistadRelatedByid_usuarioamigo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AmistadRelatedByid_usuarioamigo');

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
			$this->addJoinObject($join, 'AmistadRelatedByid_usuarioamigo');
		}

		return $this;
	}

	/**
	 * Use the AmistadRelatedByid_usuarioamigo relation Amistad object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AmistadQuery A secondary query class using the current class as primary query
	 */
	public function useAmistadRelatedByid_usuarioamigoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAmistadRelatedByid_usuarioamigo($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AmistadRelatedByid_usuarioamigo', 'AmistadQuery');
	}

	/**
	 * Filter the query by a related Calificacion object
	 *
	 * @param     Calificacion $calificacion  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByCalificacion($calificacion, $comparison = null)
	{
		if ($calificacion instanceof Calificacion) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $calificacion->getId_usuario(), $comparison);
		} elseif ($calificacion instanceof PropelCollection) {
			return $this
				->useCalificacionQuery()
				->filterByPrimaryKeys($calificacion->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByCalificacion() only accepts arguments of type Calificacion or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Calificacion relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinCalificacion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Calificacion');

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
			$this->addJoinObject($join, 'Calificacion');
		}

		return $this;
	}

	/**
	 * Use the Calificacion relation Calificacion object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CalificacionQuery A secondary query class using the current class as primary query
	 */
	public function useCalificacionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCalificacion($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Calificacion', 'CalificacionQuery');
	}

	/**
	 * Filter the query by a related Comentario object
	 *
	 * @param     Comentario $comentario  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByComentario($comentario, $comparison = null)
	{
		if ($comentario instanceof Comentario) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $comentario->getId_usuario(), $comparison);
		} elseif ($comentario instanceof PropelCollection) {
			return $this
				->useComentarioQuery()
				->filterByPrimaryKeys($comentario->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByComentario() only accepts arguments of type Comentario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Comentario relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinComentario($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Comentario');

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
			$this->addJoinObject($join, 'Comentario');
		}

		return $this;
	}

	/**
	 * Use the Comentario relation Comentario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ComentarioQuery A secondary query class using the current class as primary query
	 */
	public function useComentarioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinComentario($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Comentario', 'ComentarioQuery');
	}

	/**
	 * Filter the query by a related Libro object
	 *
	 * @param     Libro $libro  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByLibroRelatedByUsuario_ult_acc($libro, $comparison = null)
	{
		if ($libro instanceof Libro) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $libro->getUsuario_ult_acc(), $comparison);
		} elseif ($libro instanceof PropelCollection) {
			return $this
				->useLibroRelatedByUsuario_ult_accQuery()
				->filterByPrimaryKeys($libro->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByLibroRelatedByUsuario_ult_acc() only accepts arguments of type Libro or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the LibroRelatedByUsuario_ult_acc relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinLibroRelatedByUsuario_ult_acc($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('LibroRelatedByUsuario_ult_acc');

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
			$this->addJoinObject($join, 'LibroRelatedByUsuario_ult_acc');
		}

		return $this;
	}

	/**
	 * Use the LibroRelatedByUsuario_ult_acc relation Libro object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LibroQuery A secondary query class using the current class as primary query
	 */
	public function useLibroRelatedByUsuario_ult_accQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinLibroRelatedByUsuario_ult_acc($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'LibroRelatedByUsuario_ult_acc', 'LibroQuery');
	}

	/**
	 * Filter the query by a related Libro object
	 *
	 * @param     Libro $libro  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByLibroRelatedById_usuario($libro, $comparison = null)
	{
		if ($libro instanceof Libro) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $libro->getId_usuario(), $comparison);
		} elseif ($libro instanceof PropelCollection) {
			return $this
				->useLibroRelatedById_usuarioQuery()
				->filterByPrimaryKeys($libro->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByLibroRelatedById_usuario() only accepts arguments of type Libro or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the LibroRelatedById_usuario relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinLibroRelatedById_usuario($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('LibroRelatedById_usuario');

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
			$this->addJoinObject($join, 'LibroRelatedById_usuario');
		}

		return $this;
	}

	/**
	 * Use the LibroRelatedById_usuario relation Libro object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LibroQuery A secondary query class using the current class as primary query
	 */
	public function useLibroRelatedById_usuarioQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinLibroRelatedById_usuario($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'LibroRelatedById_usuario', 'LibroQuery');
	}

	/**
	 * Filter the query by a related Usuario_intereses object
	 *
	 * @param     Usuario_intereses $usuario_intereses  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByUsuario_intereses($usuario_intereses, $comparison = null)
	{
		if ($usuario_intereses instanceof Usuario_intereses) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $usuario_intereses->getId_usuario(), $comparison);
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
	 * @return    UsuarioQuery The current query, for fluid interface
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
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByLista($lista, $comparison = null)
	{
		if ($lista instanceof Lista) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $lista->getId_usuario(), $comparison);
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
	 * @return    UsuarioQuery The current query, for fluid interface
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
	 * Filter the query by a related Libro_colaborador object
	 *
	 * @param     Libro_colaborador $libro_colaborador  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByLibro_colaborador($libro_colaborador, $comparison = null)
	{
		if ($libro_colaborador instanceof Libro_colaborador) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $libro_colaborador->getIdusuario(), $comparison);
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
	 * @return    UsuarioQuery The current query, for fluid interface
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
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByLibro_version($libro_version, $comparison = null)
	{
		if ($libro_version instanceof Libro_version) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $libro_version->getIdusuario(), $comparison);
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
	 * @return    UsuarioQuery The current query, for fluid interface
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
	 * Filter the query by a related Mensaje object
	 *
	 * @param     Mensaje $mensaje  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByMensajeRelatedById_usuario_destinatario($mensaje, $comparison = null)
	{
		if ($mensaje instanceof Mensaje) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $mensaje->getId_usuario_destinatario(), $comparison);
		} elseif ($mensaje instanceof PropelCollection) {
			return $this
				->useMensajeRelatedById_usuario_destinatarioQuery()
				->filterByPrimaryKeys($mensaje->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByMensajeRelatedById_usuario_destinatario() only accepts arguments of type Mensaje or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the MensajeRelatedById_usuario_destinatario relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinMensajeRelatedById_usuario_destinatario($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('MensajeRelatedById_usuario_destinatario');

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
			$this->addJoinObject($join, 'MensajeRelatedById_usuario_destinatario');
		}

		return $this;
	}

	/**
	 * Use the MensajeRelatedById_usuario_destinatario relation Mensaje object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MensajeQuery A secondary query class using the current class as primary query
	 */
	public function useMensajeRelatedById_usuario_destinatarioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMensajeRelatedById_usuario_destinatario($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'MensajeRelatedById_usuario_destinatario', 'MensajeQuery');
	}

	/**
	 * Filter the query by a related Mensaje object
	 *
	 * @param     Mensaje $mensaje  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByMensajeRelatedById_usuario_remitente($mensaje, $comparison = null)
	{
		if ($mensaje instanceof Mensaje) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $mensaje->getId_usuario_remitente(), $comparison);
		} elseif ($mensaje instanceof PropelCollection) {
			return $this
				->useMensajeRelatedById_usuario_remitenteQuery()
				->filterByPrimaryKeys($mensaje->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByMensajeRelatedById_usuario_remitente() only accepts arguments of type Mensaje or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the MensajeRelatedById_usuario_remitente relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinMensajeRelatedById_usuario_remitente($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('MensajeRelatedById_usuario_remitente');

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
			$this->addJoinObject($join, 'MensajeRelatedById_usuario_remitente');
		}

		return $this;
	}

	/**
	 * Use the MensajeRelatedById_usuario_remitente relation Mensaje object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MensajeQuery A secondary query class using the current class as primary query
	 */
	public function useMensajeRelatedById_usuario_remitenteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMensajeRelatedById_usuario_remitente($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'MensajeRelatedById_usuario_remitente', 'MensajeQuery');
	}

	/**
	 * Filter the query by a related Notificacion object
	 *
	 * @param     Notificacion $notificacion  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByNotificacionRelatedById_emisor($notificacion, $comparison = null)
	{
		if ($notificacion instanceof Notificacion) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $notificacion->getId_emisor(), $comparison);
		} elseif ($notificacion instanceof PropelCollection) {
			return $this
				->useNotificacionRelatedById_emisorQuery()
				->filterByPrimaryKeys($notificacion->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByNotificacionRelatedById_emisor() only accepts arguments of type Notificacion or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the NotificacionRelatedById_emisor relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinNotificacionRelatedById_emisor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('NotificacionRelatedById_emisor');

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
			$this->addJoinObject($join, 'NotificacionRelatedById_emisor');
		}

		return $this;
	}

	/**
	 * Use the NotificacionRelatedById_emisor relation Notificacion object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NotificacionQuery A secondary query class using the current class as primary query
	 */
	public function useNotificacionRelatedById_emisorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinNotificacionRelatedById_emisor($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'NotificacionRelatedById_emisor', 'NotificacionQuery');
	}

	/**
	 * Filter the query by a related Notificacion object
	 *
	 * @param     Notificacion $notificacion  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByNotificacionRelatedById_receptor($notificacion, $comparison = null)
	{
		if ($notificacion instanceof Notificacion) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $notificacion->getId_receptor(), $comparison);
		} elseif ($notificacion instanceof PropelCollection) {
			return $this
				->useNotificacionRelatedById_receptorQuery()
				->filterByPrimaryKeys($notificacion->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByNotificacionRelatedById_receptor() only accepts arguments of type Notificacion or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the NotificacionRelatedById_receptor relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinNotificacionRelatedById_receptor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('NotificacionRelatedById_receptor');

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
			$this->addJoinObject($join, 'NotificacionRelatedById_receptor');
		}

		return $this;
	}

	/**
	 * Use the NotificacionRelatedById_receptor relation Notificacion object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NotificacionQuery A secondary query class using the current class as primary query
	 */
	public function useNotificacionRelatedById_receptorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinNotificacionRelatedById_receptor($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'NotificacionRelatedById_receptor', 'NotificacionQuery');
	}

	/**
	 * Filter the query by a related Solicitud object
	 *
	 * @param     Solicitud $solicitud  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterBySolicitud($solicitud, $comparison = null)
	{
		if ($solicitud instanceof Solicitud) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $solicitud->getId_usuario_solicitante(), $comparison);
		} elseif ($solicitud instanceof PropelCollection) {
			return $this
				->useSolicitudQuery()
				->filterByPrimaryKeys($solicitud->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySolicitud() only accepts arguments of type Solicitud or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Solicitud relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinSolicitud($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Solicitud');

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
			$this->addJoinObject($join, 'Solicitud');
		}

		return $this;
	}

	/**
	 * Use the Solicitud relation Solicitud object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SolicitudQuery A secondary query class using the current class as primary query
	 */
	public function useSolicitudQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSolicitud($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Solicitud', 'SolicitudQuery');
	}

	/**
	 * Filter the query by a related Postulantes object
	 *
	 * @param     Postulantes $postulantes  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByPostulantes($postulantes, $comparison = null)
	{
		if ($postulantes instanceof Postulantes) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $postulantes->getId_postulante(), $comparison);
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
	 * @return    UsuarioQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     Usuario $usuario Object to remove from the list of results
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function prune($usuario = null)
	{
		if ($usuario) {
			$this->addUsingAlias(UsuarioPeer::ID, $usuario->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseUsuarioQuery