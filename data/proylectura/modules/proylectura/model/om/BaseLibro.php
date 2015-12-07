<?php


/**
 * Base class that represents a row from the 'libro' table.
 *
 * 
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseLibro extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'LibroPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        LibroPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the nombre field.
	 * @var        string
	 */
	protected $nombre;

	/**
	 * The value for the fecha field.
	 * @var        string
	 */
	protected $fecha;

	/**
	 * The value for the id_genero field.
	 * @var        int
	 */
	protected $id_genero;

	/**
	 * The value for the autor field.
	 * @var        string
	 */
	protected $autor;

	/**
	 * The value for the image field.
	 * @var        string
	 */
	protected $image;

	/**
	 * The value for the sinopsis field.
	 * @var        string
	 */
	protected $sinopsis;

	/**
	 * The value for the fecha_ult_acc field.
	 * @var        string
	 */
	protected $fecha_ult_acc;

	/**
	 * The value for the hora_ult_acc field.
	 * @var        string
	 */
	protected $hora_ult_acc;

	/**
	 * The value for the usuario_ult_acc field.
	 * @var        int
	 */
	protected $usuario_ult_acc;

	/**
	 * The value for the id_privacidad field.
	 * @var        int
	 */
	protected $id_privacidad;

	/**
	 * The value for the es_editable field.
	 * @var        string
	 */
	protected $es_editable;

	/**
	 * @var        Usuario
	 */
	protected $aUsuario;

	/**
	 * @var        Privacidad
	 */
	protected $aPrivacidad;

	/**
	 * @var        Genero
	 */
	protected $aGenero;

	/**
	 * @var        array Audiolibro[] Collection to store aggregation of Audiolibro objects.
	 */
	protected $collAudiolibros;

	/**
	 * @var        array Calificacion[] Collection to store aggregation of Calificacion objects.
	 */
	protected $collCalificacions;

	/**
	 * @var        array Comentario[] Collection to store aggregation of Comentario objects.
	 */
	protected $collComentarios;

	/**
	 * @var        array Libro_colaborador[] Collection to store aggregation of Libro_colaborador objects.
	 */
	protected $collLibro_colaboradors;

	/**
	 * @var        array Libro_version[] Collection to store aggregation of Libro_version objects.
	 */
	protected $collLibro_versions;

	/**
	 * @var        array Slider_mae[] Collection to store aggregation of Slider_mae objects.
	 */
	protected $collSlider_maes;

	/**
	 * @var        array Postulantes[] Collection to store aggregation of Postulantes objects.
	 */
	protected $collPostulantess;

	/**
	 * @var        array Clasificados[] Collection to store aggregation of Clasificados objects.
	 */
	protected $collClasificadoss;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $audiolibrosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $calificacionsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $comentariosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $libro_colaboradorsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $libro_versionsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $slider_maesScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $postulantessScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $clasificadossScheduledForDeletion = null;

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [nombre] column value.
	 * 
	 * @return     string
	 */
	public function getNombre()
	{
		return $this->nombre;
	}

	/**
	 * Get the [optionally formatted] temporal [fecha] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getFecha($format = '%x')
	{
		if ($this->fecha === null) {
			return null;
		}


		if ($this->fecha === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->fecha);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [id_genero] column value.
	 * 
	 * @return     int
	 */
	public function getId_genero()
	{
		return $this->id_genero;
	}

	/**
	 * Get the [autor] column value.
	 * 
	 * @return     string
	 */
	public function getAutor()
	{
		return $this->autor;
	}

	/**
	 * Get the [image] column value.
	 * 
	 * @return     string
	 */
	public function getImage()
	{
		return $this->image;
	}

	/**
	 * Get the [sinopsis] column value.
	 * 
	 * @return     string
	 */
	public function getSinopsis()
	{
		return $this->sinopsis;
	}

	/**
	 * Get the [optionally formatted] temporal [fecha_ult_acc] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getFecha_ult_acc($format = '%x')
	{
		if ($this->fecha_ult_acc === null) {
			return null;
		}


		if ($this->fecha_ult_acc === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->fecha_ult_acc);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_ult_acc, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [hora_ult_acc] column value.
	 * 
	 * @return     string
	 */
	public function getHora_ult_acc()
	{
		return $this->hora_ult_acc;
	}

	/**
	 * Get the [usuario_ult_acc] column value.
	 * 
	 * @return     int
	 */
	public function getUsuario_ult_acc()
	{
		return $this->usuario_ult_acc;
	}

	/**
	 * Get the [id_privacidad] column value.
	 * 
	 * @return     int
	 */
	public function getId_privacidad()
	{
		return $this->id_privacidad;
	}

	/**
	 * Get the [es_editable] column value.
	 * 
	 * @return     string
	 */
	public function getEs_editable()
	{
		return $this->es_editable;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Libro The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = LibroPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [nombre] column.
	 * 
	 * @param      string $v new value
	 * @return     Libro The current object (for fluent API support)
	 */
	public function setNombre($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = LibroPeer::NOMBRE;
		}

		return $this;
	} // setNombre()

	/**
	 * Sets the value of [fecha] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Libro The current object (for fluent API support)
	 */
	public function setFecha($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->fecha !== null || $dt !== null) {
			$currentDateAsString = ($this->fecha !== null && $tmpDt = new DateTime($this->fecha)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->fecha = $newDateAsString;
				$this->modifiedColumns[] = LibroPeer::FECHA;
			}
		} // if either are not null

		return $this;
	} // setFecha()

	/**
	 * Set the value of [id_genero] column.
	 * 
	 * @param      int $v new value
	 * @return     Libro The current object (for fluent API support)
	 */
	public function setId_genero($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_genero !== $v) {
			$this->id_genero = $v;
			$this->modifiedColumns[] = LibroPeer::ID_GENERO;
		}

		if ($this->aGenero !== null && $this->aGenero->getId() !== $v) {
			$this->aGenero = null;
		}

		return $this;
	} // setId_genero()

	/**
	 * Set the value of [autor] column.
	 * 
	 * @param      string $v new value
	 * @return     Libro The current object (for fluent API support)
	 */
	public function setAutor($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->autor !== $v) {
			$this->autor = $v;
			$this->modifiedColumns[] = LibroPeer::AUTOR;
		}

		return $this;
	} // setAutor()

	/**
	 * Set the value of [image] column.
	 * 
	 * @param      string $v new value
	 * @return     Libro The current object (for fluent API support)
	 */
	public function setImage($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->image !== $v) {
			$this->image = $v;
			$this->modifiedColumns[] = LibroPeer::IMAGE;
		}

		return $this;
	} // setImage()

	/**
	 * Set the value of [sinopsis] column.
	 * 
	 * @param      string $v new value
	 * @return     Libro The current object (for fluent API support)
	 */
	public function setSinopsis($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sinopsis !== $v) {
			$this->sinopsis = $v;
			$this->modifiedColumns[] = LibroPeer::SINOPSIS;
		}

		return $this;
	} // setSinopsis()

	/**
	 * Sets the value of [fecha_ult_acc] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Libro The current object (for fluent API support)
	 */
	public function setFecha_ult_acc($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->fecha_ult_acc !== null || $dt !== null) {
			$currentDateAsString = ($this->fecha_ult_acc !== null && $tmpDt = new DateTime($this->fecha_ult_acc)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->fecha_ult_acc = $newDateAsString;
				$this->modifiedColumns[] = LibroPeer::FECHA_ULT_ACC;
			}
		} // if either are not null

		return $this;
	} // setFecha_ult_acc()

	/**
	 * Set the value of [hora_ult_acc] column.
	 * 
	 * @param      string $v new value
	 * @return     Libro The current object (for fluent API support)
	 */
	public function setHora_ult_acc($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->hora_ult_acc !== $v) {
			$this->hora_ult_acc = $v;
			$this->modifiedColumns[] = LibroPeer::HORA_ULT_ACC;
		}

		return $this;
	} // setHora_ult_acc()

	/**
	 * Set the value of [usuario_ult_acc] column.
	 * 
	 * @param      int $v new value
	 * @return     Libro The current object (for fluent API support)
	 */
	public function setUsuario_ult_acc($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->usuario_ult_acc !== $v) {
			$this->usuario_ult_acc = $v;
			$this->modifiedColumns[] = LibroPeer::USUARIO_ULT_ACC;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
		}

		return $this;
	} // setUsuario_ult_acc()

	/**
	 * Set the value of [id_privacidad] column.
	 * 
	 * @param      int $v new value
	 * @return     Libro The current object (for fluent API support)
	 */
	public function setId_privacidad($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_privacidad !== $v) {
			$this->id_privacidad = $v;
			$this->modifiedColumns[] = LibroPeer::ID_PRIVACIDAD;
		}

		if ($this->aPrivacidad !== null && $this->aPrivacidad->getId() !== $v) {
			$this->aPrivacidad = null;
		}

		return $this;
	} // setId_privacidad()

	/**
	 * Set the value of [es_editable] column.
	 * 
	 * @param      string $v new value
	 * @return     Libro The current object (for fluent API support)
	 */
	public function setEs_editable($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->es_editable !== $v) {
			$this->es_editable = $v;
			$this->modifiedColumns[] = LibroPeer::ES_EDITABLE;
		}

		return $this;
	} // setEs_editable()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->nombre = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->fecha = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->id_genero = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->autor = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->image = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->sinopsis = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->fecha_ult_acc = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->hora_ult_acc = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->usuario_ult_acc = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->id_privacidad = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->es_editable = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 12; // 12 = LibroPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Libro object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aGenero !== null && $this->id_genero !== $this->aGenero->getId()) {
			$this->aGenero = null;
		}
		if ($this->aUsuario !== null && $this->usuario_ult_acc !== $this->aUsuario->getId()) {
			$this->aUsuario = null;
		}
		if ($this->aPrivacidad !== null && $this->id_privacidad !== $this->aPrivacidad->getId()) {
			$this->aPrivacidad = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LibroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = LibroPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUsuario = null;
			$this->aPrivacidad = null;
			$this->aGenero = null;
			$this->collAudiolibros = null;

			$this->collCalificacions = null;

			$this->collComentarios = null;

			$this->collLibro_colaboradors = null;

			$this->collLibro_versions = null;

			$this->collSlider_maes = null;

			$this->collPostulantess = null;

			$this->collClasificadoss = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LibroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = LibroQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LibroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				LibroPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aUsuario !== null) {
				if ($this->aUsuario->isModified() || $this->aUsuario->isNew()) {
					$affectedRows += $this->aUsuario->save($con);
				}
				$this->setUsuario($this->aUsuario);
			}

			if ($this->aPrivacidad !== null) {
				if ($this->aPrivacidad->isModified() || $this->aPrivacidad->isNew()) {
					$affectedRows += $this->aPrivacidad->save($con);
				}
				$this->setPrivacidad($this->aPrivacidad);
			}

			if ($this->aGenero !== null) {
				if ($this->aGenero->isModified() || $this->aGenero->isNew()) {
					$affectedRows += $this->aGenero->save($con);
				}
				$this->setGenero($this->aGenero);
			}

			if ($this->isNew() || $this->isModified()) {
				// persist changes
				if ($this->isNew()) {
					$this->doInsert($con);
				} else {
					$this->doUpdate($con);
				}
				$affectedRows += 1;
				$this->resetModified();
			}

			if ($this->audiolibrosScheduledForDeletion !== null) {
				if (!$this->audiolibrosScheduledForDeletion->isEmpty()) {
		AudiolibroQuery::create()
						->filterByPrimaryKeys($this->audiolibrosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->audiolibrosScheduledForDeletion = null;
				}
			}

			if ($this->collAudiolibros !== null) {
				foreach ($this->collAudiolibros as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->calificacionsScheduledForDeletion !== null) {
				if (!$this->calificacionsScheduledForDeletion->isEmpty()) {
		CalificacionQuery::create()
						->filterByPrimaryKeys($this->calificacionsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->calificacionsScheduledForDeletion = null;
				}
			}

			if ($this->collCalificacions !== null) {
				foreach ($this->collCalificacions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->comentariosScheduledForDeletion !== null) {
				if (!$this->comentariosScheduledForDeletion->isEmpty()) {
		ComentarioQuery::create()
						->filterByPrimaryKeys($this->comentariosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->comentariosScheduledForDeletion = null;
				}
			}

			if ($this->collComentarios !== null) {
				foreach ($this->collComentarios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->libro_colaboradorsScheduledForDeletion !== null) {
				if (!$this->libro_colaboradorsScheduledForDeletion->isEmpty()) {
		Libro_colaboradorQuery::create()
						->filterByPrimaryKeys($this->libro_colaboradorsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->libro_colaboradorsScheduledForDeletion = null;
				}
			}

			if ($this->collLibro_colaboradors !== null) {
				foreach ($this->collLibro_colaboradors as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->libro_versionsScheduledForDeletion !== null) {
				if (!$this->libro_versionsScheduledForDeletion->isEmpty()) {
		Libro_versionQuery::create()
						->filterByPrimaryKeys($this->libro_versionsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->libro_versionsScheduledForDeletion = null;
				}
			}

			if ($this->collLibro_versions !== null) {
				foreach ($this->collLibro_versions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->slider_maesScheduledForDeletion !== null) {
				if (!$this->slider_maesScheduledForDeletion->isEmpty()) {
		Slider_maeQuery::create()
						->filterByPrimaryKeys($this->slider_maesScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->slider_maesScheduledForDeletion = null;
				}
			}

			if ($this->collSlider_maes !== null) {
				foreach ($this->collSlider_maes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->postulantessScheduledForDeletion !== null) {
				if (!$this->postulantessScheduledForDeletion->isEmpty()) {
		PostulantesQuery::create()
						->filterByPrimaryKeys($this->postulantessScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->postulantessScheduledForDeletion = null;
				}
			}

			if ($this->collPostulantess !== null) {
				foreach ($this->collPostulantess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->clasificadossScheduledForDeletion !== null) {
				if (!$this->clasificadossScheduledForDeletion->isEmpty()) {
		ClasificadosQuery::create()
						->filterByPrimaryKeys($this->clasificadossScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->clasificadossScheduledForDeletion = null;
				}
			}

			if ($this->collClasificadoss !== null) {
				foreach ($this->collClasificadoss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Insert the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @throws     PropelException
	 * @see        doSave()
	 */
	protected function doInsert(PropelPDO $con)
	{
		$modifiedColumns = array();
		$index = 0;

		$this->modifiedColumns[] = LibroPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . LibroPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(LibroPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(LibroPeer::NOMBRE)) {
			$modifiedColumns[':p' . $index++]  = '`NOMBRE`';
		}
		if ($this->isColumnModified(LibroPeer::FECHA)) {
			$modifiedColumns[':p' . $index++]  = '`FECHA`';
		}
		if ($this->isColumnModified(LibroPeer::ID_GENERO)) {
			$modifiedColumns[':p' . $index++]  = '`ID_GENERO`';
		}
		if ($this->isColumnModified(LibroPeer::AUTOR)) {
			$modifiedColumns[':p' . $index++]  = '`AUTOR`';
		}
		if ($this->isColumnModified(LibroPeer::IMAGE)) {
			$modifiedColumns[':p' . $index++]  = '`IMAGE`';
		}
		if ($this->isColumnModified(LibroPeer::SINOPSIS)) {
			$modifiedColumns[':p' . $index++]  = '`SINOPSIS`';
		}
		if ($this->isColumnModified(LibroPeer::FECHA_ULT_ACC)) {
			$modifiedColumns[':p' . $index++]  = '`FECHA_ULT_ACC`';
		}
		if ($this->isColumnModified(LibroPeer::HORA_ULT_ACC)) {
			$modifiedColumns[':p' . $index++]  = '`HORA_ULT_ACC`';
		}
		if ($this->isColumnModified(LibroPeer::USUARIO_ULT_ACC)) {
			$modifiedColumns[':p' . $index++]  = '`USUARIO_ULT_ACC`';
		}
		if ($this->isColumnModified(LibroPeer::ID_PRIVACIDAD)) {
			$modifiedColumns[':p' . $index++]  = '`ID_PRIVACIDAD`';
		}
		if ($this->isColumnModified(LibroPeer::ES_EDITABLE)) {
			$modifiedColumns[':p' . $index++]  = '`ES_EDITABLE`';
		}

		$sql = sprintf(
			'INSERT INTO `libro` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`ID`':
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
						break;
					case '`NOMBRE`':
						$stmt->bindValue($identifier, $this->nombre, PDO::PARAM_STR);
						break;
					case '`FECHA`':
						$stmt->bindValue($identifier, $this->fecha, PDO::PARAM_STR);
						break;
					case '`ID_GENERO`':
						$stmt->bindValue($identifier, $this->id_genero, PDO::PARAM_INT);
						break;
					case '`AUTOR`':
						$stmt->bindValue($identifier, $this->autor, PDO::PARAM_STR);
						break;
					case '`IMAGE`':
						$stmt->bindValue($identifier, $this->image, PDO::PARAM_STR);
						break;
					case '`SINOPSIS`':
						$stmt->bindValue($identifier, $this->sinopsis, PDO::PARAM_STR);
						break;
					case '`FECHA_ULT_ACC`':
						$stmt->bindValue($identifier, $this->fecha_ult_acc, PDO::PARAM_STR);
						break;
					case '`HORA_ULT_ACC`':
						$stmt->bindValue($identifier, $this->hora_ult_acc, PDO::PARAM_STR);
						break;
					case '`USUARIO_ULT_ACC`':
						$stmt->bindValue($identifier, $this->usuario_ult_acc, PDO::PARAM_INT);
						break;
					case '`ID_PRIVACIDAD`':
						$stmt->bindValue($identifier, $this->id_privacidad, PDO::PARAM_INT);
						break;
					case '`ES_EDITABLE`':
						$stmt->bindValue($identifier, $this->es_editable, PDO::PARAM_STR);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

		try {
			$pk = $con->lastInsertId();
		} catch (Exception $e) {
			throw new PropelException('Unable to get autoincrement id.', $e);
		}
		$this->setId($pk);

		$this->setNew(false);
	}

	/**
	 * Update the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @see        doSave()
	 */
	protected function doUpdate(PropelPDO $con)
	{
		$selectCriteria = $this->buildPkeyCriteria();
		$valuesCriteria = $this->buildCriteria();
		BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
	}

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aUsuario !== null) {
				if (!$this->aUsuario->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuario->getValidationFailures());
				}
			}

			if ($this->aPrivacidad !== null) {
				if (!$this->aPrivacidad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPrivacidad->getValidationFailures());
				}
			}

			if ($this->aGenero !== null) {
				if (!$this->aGenero->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGenero->getValidationFailures());
				}
			}


			if (($retval = LibroPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAudiolibros !== null) {
					foreach ($this->collAudiolibros as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCalificacions !== null) {
					foreach ($this->collCalificacions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collComentarios !== null) {
					foreach ($this->collComentarios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLibro_colaboradors !== null) {
					foreach ($this->collLibro_colaboradors as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLibro_versions !== null) {
					foreach ($this->collLibro_versions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSlider_maes !== null) {
					foreach ($this->collSlider_maes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPostulantess !== null) {
					foreach ($this->collPostulantess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClasificadoss !== null) {
					foreach ($this->collClasificadoss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LibroPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNombre();
				break;
			case 2:
				return $this->getFecha();
				break;
			case 3:
				return $this->getId_genero();
				break;
			case 4:
				return $this->getAutor();
				break;
			case 5:
				return $this->getImage();
				break;
			case 6:
				return $this->getSinopsis();
				break;
			case 7:
				return $this->getFecha_ult_acc();
				break;
			case 8:
				return $this->getHora_ult_acc();
				break;
			case 9:
				return $this->getUsuario_ult_acc();
				break;
			case 10:
				return $this->getId_privacidad();
				break;
			case 11:
				return $this->getEs_editable();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['Libro'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Libro'][$this->getPrimaryKey()] = true;
		$keys = LibroPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getFecha(),
			$keys[3] => $this->getId_genero(),
			$keys[4] => $this->getAutor(),
			$keys[5] => $this->getImage(),
			$keys[6] => $this->getSinopsis(),
			$keys[7] => $this->getFecha_ult_acc(),
			$keys[8] => $this->getHora_ult_acc(),
			$keys[9] => $this->getUsuario_ult_acc(),
			$keys[10] => $this->getId_privacidad(),
			$keys[11] => $this->getEs_editable(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aUsuario) {
				$result['Usuario'] = $this->aUsuario->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aPrivacidad) {
				$result['Privacidad'] = $this->aPrivacidad->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aGenero) {
				$result['Genero'] = $this->aGenero->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collAudiolibros) {
				$result['Audiolibros'] = $this->collAudiolibros->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collCalificacions) {
				$result['Calificacions'] = $this->collCalificacions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collComentarios) {
				$result['Comentarios'] = $this->collComentarios->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collLibro_colaboradors) {
				$result['Libro_colaboradors'] = $this->collLibro_colaboradors->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collLibro_versions) {
				$result['Libro_versions'] = $this->collLibro_versions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collSlider_maes) {
				$result['Slider_maes'] = $this->collSlider_maes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collPostulantess) {
				$result['Postulantess'] = $this->collPostulantess->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collClasificadoss) {
				$result['Clasificadoss'] = $this->collClasificadoss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LibroPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNombre($value);
				break;
			case 2:
				$this->setFecha($value);
				break;
			case 3:
				$this->setId_genero($value);
				break;
			case 4:
				$this->setAutor($value);
				break;
			case 5:
				$this->setImage($value);
				break;
			case 6:
				$this->setSinopsis($value);
				break;
			case 7:
				$this->setFecha_ult_acc($value);
				break;
			case 8:
				$this->setHora_ult_acc($value);
				break;
			case 9:
				$this->setUsuario_ult_acc($value);
				break;
			case 10:
				$this->setId_privacidad($value);
				break;
			case 11:
				$this->setEs_editable($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LibroPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecha($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId_genero($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAutor($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setImage($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSinopsis($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecha_ult_acc($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setHora_ult_acc($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUsuario_ult_acc($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId_privacidad($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setEs_editable($arr[$keys[11]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(LibroPeer::DATABASE_NAME);

		if ($this->isColumnModified(LibroPeer::ID)) $criteria->add(LibroPeer::ID, $this->id);
		if ($this->isColumnModified(LibroPeer::NOMBRE)) $criteria->add(LibroPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(LibroPeer::FECHA)) $criteria->add(LibroPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(LibroPeer::ID_GENERO)) $criteria->add(LibroPeer::ID_GENERO, $this->id_genero);
		if ($this->isColumnModified(LibroPeer::AUTOR)) $criteria->add(LibroPeer::AUTOR, $this->autor);
		if ($this->isColumnModified(LibroPeer::IMAGE)) $criteria->add(LibroPeer::IMAGE, $this->image);
		if ($this->isColumnModified(LibroPeer::SINOPSIS)) $criteria->add(LibroPeer::SINOPSIS, $this->sinopsis);
		if ($this->isColumnModified(LibroPeer::FECHA_ULT_ACC)) $criteria->add(LibroPeer::FECHA_ULT_ACC, $this->fecha_ult_acc);
		if ($this->isColumnModified(LibroPeer::HORA_ULT_ACC)) $criteria->add(LibroPeer::HORA_ULT_ACC, $this->hora_ult_acc);
		if ($this->isColumnModified(LibroPeer::USUARIO_ULT_ACC)) $criteria->add(LibroPeer::USUARIO_ULT_ACC, $this->usuario_ult_acc);
		if ($this->isColumnModified(LibroPeer::ID_PRIVACIDAD)) $criteria->add(LibroPeer::ID_PRIVACIDAD, $this->id_privacidad);
		if ($this->isColumnModified(LibroPeer::ES_EDITABLE)) $criteria->add(LibroPeer::ES_EDITABLE, $this->es_editable);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LibroPeer::DATABASE_NAME);
		$criteria->add(LibroPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Libro (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setNombre($this->getNombre());
		$copyObj->setFecha($this->getFecha());
		$copyObj->setId_genero($this->getId_genero());
		$copyObj->setAutor($this->getAutor());
		$copyObj->setImage($this->getImage());
		$copyObj->setSinopsis($this->getSinopsis());
		$copyObj->setFecha_ult_acc($this->getFecha_ult_acc());
		$copyObj->setHora_ult_acc($this->getHora_ult_acc());
		$copyObj->setUsuario_ult_acc($this->getUsuario_ult_acc());
		$copyObj->setId_privacidad($this->getId_privacidad());
		$copyObj->setEs_editable($this->getEs_editable());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getAudiolibros() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAudiolibro($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCalificacions() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCalificacion($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getComentarios() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addComentario($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getLibro_colaboradors() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addLibro_colaborador($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getLibro_versions() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addLibro_version($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSlider_maes() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSlider_mae($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPostulantess() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPostulantes($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClasificadoss() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClasificados($relObj->copy($deepCopy));
				}
			}

			//unflag object copy
			$this->startCopy = false;
		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Libro Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     LibroPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new LibroPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Libro The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuario(Usuario $v = null)
	{
		if ($v === null) {
			$this->setUsuario_ult_acc(NULL);
		} else {
			$this->setUsuario_ult_acc($v->getId());
		}

		$this->aUsuario = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addLibro($this);
		}

		return $this;
	}


	/**
	 * Get the associated Usuario object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Usuario The associated Usuario object.
	 * @throws     PropelException
	 */
	public function getUsuario(PropelPDO $con = null)
	{
		if ($this->aUsuario === null && ($this->usuario_ult_acc !== null)) {
			$this->aUsuario = UsuarioQuery::create()->findPk($this->usuario_ult_acc, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUsuario->addLibros($this);
			 */
		}
		return $this->aUsuario;
	}

	/**
	 * Declares an association between this object and a Privacidad object.
	 *
	 * @param      Privacidad $v
	 * @return     Libro The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPrivacidad(Privacidad $v = null)
	{
		if ($v === null) {
			$this->setId_privacidad(NULL);
		} else {
			$this->setId_privacidad($v->getId());
		}

		$this->aPrivacidad = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Privacidad object, it will not be re-added.
		if ($v !== null) {
			$v->addLibro($this);
		}

		return $this;
	}


	/**
	 * Get the associated Privacidad object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Privacidad The associated Privacidad object.
	 * @throws     PropelException
	 */
	public function getPrivacidad(PropelPDO $con = null)
	{
		if ($this->aPrivacidad === null && ($this->id_privacidad !== null)) {
			$this->aPrivacidad = PrivacidadQuery::create()->findPk($this->id_privacidad, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aPrivacidad->addLibros($this);
			 */
		}
		return $this->aPrivacidad;
	}

	/**
	 * Declares an association between this object and a Genero object.
	 *
	 * @param      Genero $v
	 * @return     Libro The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setGenero(Genero $v = null)
	{
		if ($v === null) {
			$this->setId_genero(NULL);
		} else {
			$this->setId_genero($v->getId());
		}

		$this->aGenero = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Genero object, it will not be re-added.
		if ($v !== null) {
			$v->addLibro($this);
		}

		return $this;
	}


	/**
	 * Get the associated Genero object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Genero The associated Genero object.
	 * @throws     PropelException
	 */
	public function getGenero(PropelPDO $con = null)
	{
		if ($this->aGenero === null && ($this->id_genero !== null)) {
			$this->aGenero = GeneroQuery::create()->findPk($this->id_genero, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aGenero->addLibros($this);
			 */
		}
		return $this->aGenero;
	}


	/**
	 * Initializes a collection based on the name of a relation.
	 * Avoids crafting an 'init[$relationName]s' method name
	 * that wouldn't work when StandardEnglishPluralizer is used.
	 *
	 * @param      string $relationName The name of the relation to initialize
	 * @return     void
	 */
	public function initRelation($relationName)
	{
		if ('Audiolibro' == $relationName) {
			return $this->initAudiolibros();
		}
		if ('Calificacion' == $relationName) {
			return $this->initCalificacions();
		}
		if ('Comentario' == $relationName) {
			return $this->initComentarios();
		}
		if ('Libro_colaborador' == $relationName) {
			return $this->initLibro_colaboradors();
		}
		if ('Libro_version' == $relationName) {
			return $this->initLibro_versions();
		}
		if ('Slider_mae' == $relationName) {
			return $this->initSlider_maes();
		}
		if ('Postulantes' == $relationName) {
			return $this->initPostulantess();
		}
		if ('Clasificados' == $relationName) {
			return $this->initClasificadoss();
		}
	}

	/**
	 * Clears out the collAudiolibros collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAudiolibros()
	 */
	public function clearAudiolibros()
	{
		$this->collAudiolibros = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAudiolibros collection.
	 *
	 * By default this just sets the collAudiolibros collection to an empty array (like clearcollAudiolibros());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initAudiolibros($overrideExisting = true)
	{
		if (null !== $this->collAudiolibros && !$overrideExisting) {
			return;
		}
		$this->collAudiolibros = new PropelObjectCollection();
		$this->collAudiolibros->setModel('Audiolibro');
	}

	/**
	 * Gets an array of Audiolibro objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Libro is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Audiolibro[] List of Audiolibro objects
	 * @throws     PropelException
	 */
	public function getAudiolibros($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAudiolibros || null !== $criteria) {
			if ($this->isNew() && null === $this->collAudiolibros) {
				// return empty collection
				$this->initAudiolibros();
			} else {
				$collAudiolibros = AudiolibroQuery::create(null, $criteria)
					->filterByLibro($this)
					->find($con);
				if (null !== $criteria) {
					return $collAudiolibros;
				}
				$this->collAudiolibros = $collAudiolibros;
			}
		}
		return $this->collAudiolibros;
	}

	/**
	 * Sets a collection of Audiolibro objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $audiolibros A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAudiolibros(PropelCollection $audiolibros, PropelPDO $con = null)
	{
		$this->audiolibrosScheduledForDeletion = $this->getAudiolibros(new Criteria(), $con)->diff($audiolibros);

		foreach ($audiolibros as $audiolibro) {
			// Fix issue with collection modified by reference
			if ($audiolibro->isNew()) {
				$audiolibro->setLibro($this);
			}
			$this->addAudiolibro($audiolibro);
		}

		$this->collAudiolibros = $audiolibros;
	}

	/**
	 * Returns the number of related Audiolibro objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Audiolibro objects.
	 * @throws     PropelException
	 */
	public function countAudiolibros(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAudiolibros || null !== $criteria) {
			if ($this->isNew() && null === $this->collAudiolibros) {
				return 0;
			} else {
				$query = AudiolibroQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByLibro($this)
					->count($con);
			}
		} else {
			return count($this->collAudiolibros);
		}
	}

	/**
	 * Method called to associate a Audiolibro object to this object
	 * through the Audiolibro foreign key attribute.
	 *
	 * @param      Audiolibro $l Audiolibro
	 * @return     Libro The current object (for fluent API support)
	 */
	public function addAudiolibro(Audiolibro $l)
	{
		if ($this->collAudiolibros === null) {
			$this->initAudiolibros();
		}
		if (!$this->collAudiolibros->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddAudiolibro($l);
		}

		return $this;
	}

	/**
	 * @param	Audiolibro $audiolibro The audiolibro object to add.
	 */
	protected function doAddAudiolibro($audiolibro)
	{
		$this->collAudiolibros[]= $audiolibro;
		$audiolibro->setLibro($this);
	}

	/**
	 * Clears out the collCalificacions collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCalificacions()
	 */
	public function clearCalificacions()
	{
		$this->collCalificacions = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCalificacions collection.
	 *
	 * By default this just sets the collCalificacions collection to an empty array (like clearcollCalificacions());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initCalificacions($overrideExisting = true)
	{
		if (null !== $this->collCalificacions && !$overrideExisting) {
			return;
		}
		$this->collCalificacions = new PropelObjectCollection();
		$this->collCalificacions->setModel('Calificacion');
	}

	/**
	 * Gets an array of Calificacion objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Libro is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Calificacion[] List of Calificacion objects
	 * @throws     PropelException
	 */
	public function getCalificacions($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCalificacions || null !== $criteria) {
			if ($this->isNew() && null === $this->collCalificacions) {
				// return empty collection
				$this->initCalificacions();
			} else {
				$collCalificacions = CalificacionQuery::create(null, $criteria)
					->filterByLibro($this)
					->find($con);
				if (null !== $criteria) {
					return $collCalificacions;
				}
				$this->collCalificacions = $collCalificacions;
			}
		}
		return $this->collCalificacions;
	}

	/**
	 * Sets a collection of Calificacion objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $calificacions A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setCalificacions(PropelCollection $calificacions, PropelPDO $con = null)
	{
		$this->calificacionsScheduledForDeletion = $this->getCalificacions(new Criteria(), $con)->diff($calificacions);

		foreach ($calificacions as $calificacion) {
			// Fix issue with collection modified by reference
			if ($calificacion->isNew()) {
				$calificacion->setLibro($this);
			}
			$this->addCalificacion($calificacion);
		}

		$this->collCalificacions = $calificacions;
	}

	/**
	 * Returns the number of related Calificacion objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Calificacion objects.
	 * @throws     PropelException
	 */
	public function countCalificacions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCalificacions || null !== $criteria) {
			if ($this->isNew() && null === $this->collCalificacions) {
				return 0;
			} else {
				$query = CalificacionQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByLibro($this)
					->count($con);
			}
		} else {
			return count($this->collCalificacions);
		}
	}

	/**
	 * Method called to associate a Calificacion object to this object
	 * through the Calificacion foreign key attribute.
	 *
	 * @param      Calificacion $l Calificacion
	 * @return     Libro The current object (for fluent API support)
	 */
	public function addCalificacion(Calificacion $l)
	{
		if ($this->collCalificacions === null) {
			$this->initCalificacions();
		}
		if (!$this->collCalificacions->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddCalificacion($l);
		}

		return $this;
	}

	/**
	 * @param	Calificacion $calificacion The calificacion object to add.
	 */
	protected function doAddCalificacion($calificacion)
	{
		$this->collCalificacions[]= $calificacion;
		$calificacion->setLibro($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Libro is new, it will return
	 * an empty collection; or if this Libro has previously
	 * been saved, it will retrieve related Calificacions from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Libro.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Calificacion[] List of Calificacion objects
	 */
	public function getCalificacionsJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CalificacionQuery::create(null, $criteria);
		$query->joinWith('Usuario', $join_behavior);

		return $this->getCalificacions($query, $con);
	}

	/**
	 * Clears out the collComentarios collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addComentarios()
	 */
	public function clearComentarios()
	{
		$this->collComentarios = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collComentarios collection.
	 *
	 * By default this just sets the collComentarios collection to an empty array (like clearcollComentarios());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initComentarios($overrideExisting = true)
	{
		if (null !== $this->collComentarios && !$overrideExisting) {
			return;
		}
		$this->collComentarios = new PropelObjectCollection();
		$this->collComentarios->setModel('Comentario');
	}

	/**
	 * Gets an array of Comentario objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Libro is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Comentario[] List of Comentario objects
	 * @throws     PropelException
	 */
	public function getComentarios($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collComentarios || null !== $criteria) {
			if ($this->isNew() && null === $this->collComentarios) {
				// return empty collection
				$this->initComentarios();
			} else {
				$collComentarios = ComentarioQuery::create(null, $criteria)
					->filterByLibro($this)
					->find($con);
				if (null !== $criteria) {
					return $collComentarios;
				}
				$this->collComentarios = $collComentarios;
			}
		}
		return $this->collComentarios;
	}

	/**
	 * Sets a collection of Comentario objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $comentarios A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setComentarios(PropelCollection $comentarios, PropelPDO $con = null)
	{
		$this->comentariosScheduledForDeletion = $this->getComentarios(new Criteria(), $con)->diff($comentarios);

		foreach ($comentarios as $comentario) {
			// Fix issue with collection modified by reference
			if ($comentario->isNew()) {
				$comentario->setLibro($this);
			}
			$this->addComentario($comentario);
		}

		$this->collComentarios = $comentarios;
	}

	/**
	 * Returns the number of related Comentario objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Comentario objects.
	 * @throws     PropelException
	 */
	public function countComentarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collComentarios || null !== $criteria) {
			if ($this->isNew() && null === $this->collComentarios) {
				return 0;
			} else {
				$query = ComentarioQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByLibro($this)
					->count($con);
			}
		} else {
			return count($this->collComentarios);
		}
	}

	/**
	 * Method called to associate a Comentario object to this object
	 * through the Comentario foreign key attribute.
	 *
	 * @param      Comentario $l Comentario
	 * @return     Libro The current object (for fluent API support)
	 */
	public function addComentario(Comentario $l)
	{
		if ($this->collComentarios === null) {
			$this->initComentarios();
		}
		if (!$this->collComentarios->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddComentario($l);
		}

		return $this;
	}

	/**
	 * @param	Comentario $comentario The comentario object to add.
	 */
	protected function doAddComentario($comentario)
	{
		$this->collComentarios[]= $comentario;
		$comentario->setLibro($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Libro is new, it will return
	 * an empty collection; or if this Libro has previously
	 * been saved, it will retrieve related Comentarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Libro.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Comentario[] List of Comentario objects
	 */
	public function getComentariosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ComentarioQuery::create(null, $criteria);
		$query->joinWith('Usuario', $join_behavior);

		return $this->getComentarios($query, $con);
	}

	/**
	 * Clears out the collLibro_colaboradors collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addLibro_colaboradors()
	 */
	public function clearLibro_colaboradors()
	{
		$this->collLibro_colaboradors = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collLibro_colaboradors collection.
	 *
	 * By default this just sets the collLibro_colaboradors collection to an empty array (like clearcollLibro_colaboradors());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initLibro_colaboradors($overrideExisting = true)
	{
		if (null !== $this->collLibro_colaboradors && !$overrideExisting) {
			return;
		}
		$this->collLibro_colaboradors = new PropelObjectCollection();
		$this->collLibro_colaboradors->setModel('Libro_colaborador');
	}

	/**
	 * Gets an array of Libro_colaborador objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Libro is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Libro_colaborador[] List of Libro_colaborador objects
	 * @throws     PropelException
	 */
	public function getLibro_colaboradors($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collLibro_colaboradors || null !== $criteria) {
			if ($this->isNew() && null === $this->collLibro_colaboradors) {
				// return empty collection
				$this->initLibro_colaboradors();
			} else {
				$collLibro_colaboradors = Libro_colaboradorQuery::create(null, $criteria)
					->filterByLibro($this)
					->find($con);
				if (null !== $criteria) {
					return $collLibro_colaboradors;
				}
				$this->collLibro_colaboradors = $collLibro_colaboradors;
			}
		}
		return $this->collLibro_colaboradors;
	}

	/**
	 * Sets a collection of Libro_colaborador objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $libro_colaboradors A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setLibro_colaboradors(PropelCollection $libro_colaboradors, PropelPDO $con = null)
	{
		$this->libro_colaboradorsScheduledForDeletion = $this->getLibro_colaboradors(new Criteria(), $con)->diff($libro_colaboradors);

		foreach ($libro_colaboradors as $libro_colaborador) {
			// Fix issue with collection modified by reference
			if ($libro_colaborador->isNew()) {
				$libro_colaborador->setLibro($this);
			}
			$this->addLibro_colaborador($libro_colaborador);
		}

		$this->collLibro_colaboradors = $libro_colaboradors;
	}

	/**
	 * Returns the number of related Libro_colaborador objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Libro_colaborador objects.
	 * @throws     PropelException
	 */
	public function countLibro_colaboradors(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collLibro_colaboradors || null !== $criteria) {
			if ($this->isNew() && null === $this->collLibro_colaboradors) {
				return 0;
			} else {
				$query = Libro_colaboradorQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByLibro($this)
					->count($con);
			}
		} else {
			return count($this->collLibro_colaboradors);
		}
	}

	/**
	 * Method called to associate a Libro_colaborador object to this object
	 * through the Libro_colaborador foreign key attribute.
	 *
	 * @param      Libro_colaborador $l Libro_colaborador
	 * @return     Libro The current object (for fluent API support)
	 */
	public function addLibro_colaborador(Libro_colaborador $l)
	{
		if ($this->collLibro_colaboradors === null) {
			$this->initLibro_colaboradors();
		}
		if (!$this->collLibro_colaboradors->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddLibro_colaborador($l);
		}

		return $this;
	}

	/**
	 * @param	Libro_colaborador $libro_colaborador The libro_colaborador object to add.
	 */
	protected function doAddLibro_colaborador($libro_colaborador)
	{
		$this->collLibro_colaboradors[]= $libro_colaborador;
		$libro_colaborador->setLibro($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Libro is new, it will return
	 * an empty collection; or if this Libro has previously
	 * been saved, it will retrieve related Libro_colaboradors from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Libro.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Libro_colaborador[] List of Libro_colaborador objects
	 */
	public function getLibro_colaboradorsJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = Libro_colaboradorQuery::create(null, $criteria);
		$query->joinWith('Usuario', $join_behavior);

		return $this->getLibro_colaboradors($query, $con);
	}

	/**
	 * Clears out the collLibro_versions collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addLibro_versions()
	 */
	public function clearLibro_versions()
	{
		$this->collLibro_versions = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collLibro_versions collection.
	 *
	 * By default this just sets the collLibro_versions collection to an empty array (like clearcollLibro_versions());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initLibro_versions($overrideExisting = true)
	{
		if (null !== $this->collLibro_versions && !$overrideExisting) {
			return;
		}
		$this->collLibro_versions = new PropelObjectCollection();
		$this->collLibro_versions->setModel('Libro_version');
	}

	/**
	 * Gets an array of Libro_version objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Libro is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Libro_version[] List of Libro_version objects
	 * @throws     PropelException
	 */
	public function getLibro_versions($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collLibro_versions || null !== $criteria) {
			if ($this->isNew() && null === $this->collLibro_versions) {
				// return empty collection
				$this->initLibro_versions();
			} else {
				$collLibro_versions = Libro_versionQuery::create(null, $criteria)
					->filterByLibro($this)
					->find($con);
				if (null !== $criteria) {
					return $collLibro_versions;
				}
				$this->collLibro_versions = $collLibro_versions;
			}
		}
		return $this->collLibro_versions;
	}

	/**
	 * Sets a collection of Libro_version objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $libro_versions A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setLibro_versions(PropelCollection $libro_versions, PropelPDO $con = null)
	{
		$this->libro_versionsScheduledForDeletion = $this->getLibro_versions(new Criteria(), $con)->diff($libro_versions);

		foreach ($libro_versions as $libro_version) {
			// Fix issue with collection modified by reference
			if ($libro_version->isNew()) {
				$libro_version->setLibro($this);
			}
			$this->addLibro_version($libro_version);
		}

		$this->collLibro_versions = $libro_versions;
	}

	/**
	 * Returns the number of related Libro_version objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Libro_version objects.
	 * @throws     PropelException
	 */
	public function countLibro_versions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collLibro_versions || null !== $criteria) {
			if ($this->isNew() && null === $this->collLibro_versions) {
				return 0;
			} else {
				$query = Libro_versionQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByLibro($this)
					->count($con);
			}
		} else {
			return count($this->collLibro_versions);
		}
	}

	/**
	 * Method called to associate a Libro_version object to this object
	 * through the Libro_version foreign key attribute.
	 *
	 * @param      Libro_version $l Libro_version
	 * @return     Libro The current object (for fluent API support)
	 */
	public function addLibro_version(Libro_version $l)
	{
		if ($this->collLibro_versions === null) {
			$this->initLibro_versions();
		}
		if (!$this->collLibro_versions->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddLibro_version($l);
		}

		return $this;
	}

	/**
	 * @param	Libro_version $libro_version The libro_version object to add.
	 */
	protected function doAddLibro_version($libro_version)
	{
		$this->collLibro_versions[]= $libro_version;
		$libro_version->setLibro($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Libro is new, it will return
	 * an empty collection; or if this Libro has previously
	 * been saved, it will retrieve related Libro_versions from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Libro.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Libro_version[] List of Libro_version objects
	 */
	public function getLibro_versionsJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = Libro_versionQuery::create(null, $criteria);
		$query->joinWith('Usuario', $join_behavior);

		return $this->getLibro_versions($query, $con);
	}

	/**
	 * Clears out the collSlider_maes collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSlider_maes()
	 */
	public function clearSlider_maes()
	{
		$this->collSlider_maes = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSlider_maes collection.
	 *
	 * By default this just sets the collSlider_maes collection to an empty array (like clearcollSlider_maes());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initSlider_maes($overrideExisting = true)
	{
		if (null !== $this->collSlider_maes && !$overrideExisting) {
			return;
		}
		$this->collSlider_maes = new PropelObjectCollection();
		$this->collSlider_maes->setModel('Slider_mae');
	}

	/**
	 * Gets an array of Slider_mae objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Libro is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Slider_mae[] List of Slider_mae objects
	 * @throws     PropelException
	 */
	public function getSlider_maes($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSlider_maes || null !== $criteria) {
			if ($this->isNew() && null === $this->collSlider_maes) {
				// return empty collection
				$this->initSlider_maes();
			} else {
				$collSlider_maes = Slider_maeQuery::create(null, $criteria)
					->filterByLibro($this)
					->find($con);
				if (null !== $criteria) {
					return $collSlider_maes;
				}
				$this->collSlider_maes = $collSlider_maes;
			}
		}
		return $this->collSlider_maes;
	}

	/**
	 * Sets a collection of Slider_mae objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $slider_maes A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setSlider_maes(PropelCollection $slider_maes, PropelPDO $con = null)
	{
		$this->slider_maesScheduledForDeletion = $this->getSlider_maes(new Criteria(), $con)->diff($slider_maes);

		foreach ($slider_maes as $slider_mae) {
			// Fix issue with collection modified by reference
			if ($slider_mae->isNew()) {
				$slider_mae->setLibro($this);
			}
			$this->addSlider_mae($slider_mae);
		}

		$this->collSlider_maes = $slider_maes;
	}

	/**
	 * Returns the number of related Slider_mae objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Slider_mae objects.
	 * @throws     PropelException
	 */
	public function countSlider_maes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSlider_maes || null !== $criteria) {
			if ($this->isNew() && null === $this->collSlider_maes) {
				return 0;
			} else {
				$query = Slider_maeQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByLibro($this)
					->count($con);
			}
		} else {
			return count($this->collSlider_maes);
		}
	}

	/**
	 * Method called to associate a Slider_mae object to this object
	 * through the Slider_mae foreign key attribute.
	 *
	 * @param      Slider_mae $l Slider_mae
	 * @return     Libro The current object (for fluent API support)
	 */
	public function addSlider_mae(Slider_mae $l)
	{
		if ($this->collSlider_maes === null) {
			$this->initSlider_maes();
		}
		if (!$this->collSlider_maes->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddSlider_mae($l);
		}

		return $this;
	}

	/**
	 * @param	Slider_mae $slider_mae The slider_mae object to add.
	 */
	protected function doAddSlider_mae($slider_mae)
	{
		$this->collSlider_maes[]= $slider_mae;
		$slider_mae->setLibro($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Libro is new, it will return
	 * an empty collection; or if this Libro has previously
	 * been saved, it will retrieve related Slider_maes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Libro.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Slider_mae[] List of Slider_mae objects
	 */
	public function getSlider_maesJoinSlider_categ($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = Slider_maeQuery::create(null, $criteria);
		$query->joinWith('Slider_categ', $join_behavior);

		return $this->getSlider_maes($query, $con);
	}

	/**
	 * Clears out the collPostulantess collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPostulantess()
	 */
	public function clearPostulantess()
	{
		$this->collPostulantess = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPostulantess collection.
	 *
	 * By default this just sets the collPostulantess collection to an empty array (like clearcollPostulantess());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initPostulantess($overrideExisting = true)
	{
		if (null !== $this->collPostulantess && !$overrideExisting) {
			return;
		}
		$this->collPostulantess = new PropelObjectCollection();
		$this->collPostulantess->setModel('Postulantes');
	}

	/**
	 * Gets an array of Postulantes objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Libro is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Postulantes[] List of Postulantes objects
	 * @throws     PropelException
	 */
	public function getPostulantess($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPostulantess || null !== $criteria) {
			if ($this->isNew() && null === $this->collPostulantess) {
				// return empty collection
				$this->initPostulantess();
			} else {
				$collPostulantess = PostulantesQuery::create(null, $criteria)
					->filterByLibro($this)
					->find($con);
				if (null !== $criteria) {
					return $collPostulantess;
				}
				$this->collPostulantess = $collPostulantess;
			}
		}
		return $this->collPostulantess;
	}

	/**
	 * Sets a collection of Postulantes objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $postulantess A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setPostulantess(PropelCollection $postulantess, PropelPDO $con = null)
	{
		$this->postulantessScheduledForDeletion = $this->getPostulantess(new Criteria(), $con)->diff($postulantess);

		foreach ($postulantess as $postulantes) {
			// Fix issue with collection modified by reference
			if ($postulantes->isNew()) {
				$postulantes->setLibro($this);
			}
			$this->addPostulantes($postulantes);
		}

		$this->collPostulantess = $postulantess;
	}

	/**
	 * Returns the number of related Postulantes objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Postulantes objects.
	 * @throws     PropelException
	 */
	public function countPostulantess(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPostulantess || null !== $criteria) {
			if ($this->isNew() && null === $this->collPostulantess) {
				return 0;
			} else {
				$query = PostulantesQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByLibro($this)
					->count($con);
			}
		} else {
			return count($this->collPostulantess);
		}
	}

	/**
	 * Method called to associate a Postulantes object to this object
	 * through the Postulantes foreign key attribute.
	 *
	 * @param      Postulantes $l Postulantes
	 * @return     Libro The current object (for fluent API support)
	 */
	public function addPostulantes(Postulantes $l)
	{
		if ($this->collPostulantess === null) {
			$this->initPostulantess();
		}
		if (!$this->collPostulantess->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddPostulantes($l);
		}

		return $this;
	}

	/**
	 * @param	Postulantes $postulantes The postulantes object to add.
	 */
	protected function doAddPostulantes($postulantes)
	{
		$this->collPostulantess[]= $postulantes;
		$postulantes->setLibro($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Libro is new, it will return
	 * an empty collection; or if this Libro has previously
	 * been saved, it will retrieve related Postulantess from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Libro.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Postulantes[] List of Postulantes objects
	 */
	public function getPostulantessJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PostulantesQuery::create(null, $criteria);
		$query->joinWith('Usuario', $join_behavior);

		return $this->getPostulantess($query, $con);
	}

	/**
	 * Clears out the collClasificadoss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClasificadoss()
	 */
	public function clearClasificadoss()
	{
		$this->collClasificadoss = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClasificadoss collection.
	 *
	 * By default this just sets the collClasificadoss collection to an empty array (like clearcollClasificadoss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initClasificadoss($overrideExisting = true)
	{
		if (null !== $this->collClasificadoss && !$overrideExisting) {
			return;
		}
		$this->collClasificadoss = new PropelObjectCollection();
		$this->collClasificadoss->setModel('Clasificados');
	}

	/**
	 * Gets an array of Clasificados objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Libro is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Clasificados[] List of Clasificados objects
	 * @throws     PropelException
	 */
	public function getClasificadoss($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collClasificadoss || null !== $criteria) {
			if ($this->isNew() && null === $this->collClasificadoss) {
				// return empty collection
				$this->initClasificadoss();
			} else {
				$collClasificadoss = ClasificadosQuery::create(null, $criteria)
					->filterByLibro($this)
					->find($con);
				if (null !== $criteria) {
					return $collClasificadoss;
				}
				$this->collClasificadoss = $collClasificadoss;
			}
		}
		return $this->collClasificadoss;
	}

	/**
	 * Sets a collection of Clasificados objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $clasificadoss A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setClasificadoss(PropelCollection $clasificadoss, PropelPDO $con = null)
	{
		$this->clasificadossScheduledForDeletion = $this->getClasificadoss(new Criteria(), $con)->diff($clasificadoss);

		foreach ($clasificadoss as $clasificados) {
			// Fix issue with collection modified by reference
			if ($clasificados->isNew()) {
				$clasificados->setLibro($this);
			}
			$this->addClasificados($clasificados);
		}

		$this->collClasificadoss = $clasificadoss;
	}

	/**
	 * Returns the number of related Clasificados objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Clasificados objects.
	 * @throws     PropelException
	 */
	public function countClasificadoss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collClasificadoss || null !== $criteria) {
			if ($this->isNew() && null === $this->collClasificadoss) {
				return 0;
			} else {
				$query = ClasificadosQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByLibro($this)
					->count($con);
			}
		} else {
			return count($this->collClasificadoss);
		}
	}

	/**
	 * Method called to associate a Clasificados object to this object
	 * through the Clasificados foreign key attribute.
	 *
	 * @param      Clasificados $l Clasificados
	 * @return     Libro The current object (for fluent API support)
	 */
	public function addClasificados(Clasificados $l)
	{
		if ($this->collClasificadoss === null) {
			$this->initClasificadoss();
		}
		if (!$this->collClasificadoss->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddClasificados($l);
		}

		return $this;
	}

	/**
	 * @param	Clasificados $clasificados The clasificados object to add.
	 */
	protected function doAddClasificados($clasificados)
	{
		$this->collClasificadoss[]= $clasificados;
		$clasificados->setLibro($this);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->nombre = null;
		$this->fecha = null;
		$this->id_genero = null;
		$this->autor = null;
		$this->image = null;
		$this->sinopsis = null;
		$this->fecha_ult_acc = null;
		$this->hora_ult_acc = null;
		$this->usuario_ult_acc = null;
		$this->id_privacidad = null;
		$this->es_editable = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collAudiolibros) {
				foreach ($this->collAudiolibros as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCalificacions) {
				foreach ($this->collCalificacions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collComentarios) {
				foreach ($this->collComentarios as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLibro_colaboradors) {
				foreach ($this->collLibro_colaboradors as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLibro_versions) {
				foreach ($this->collLibro_versions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSlider_maes) {
				foreach ($this->collSlider_maes as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPostulantess) {
				foreach ($this->collPostulantess as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClasificadoss) {
				foreach ($this->collClasificadoss as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collAudiolibros instanceof PropelCollection) {
			$this->collAudiolibros->clearIterator();
		}
		$this->collAudiolibros = null;
		if ($this->collCalificacions instanceof PropelCollection) {
			$this->collCalificacions->clearIterator();
		}
		$this->collCalificacions = null;
		if ($this->collComentarios instanceof PropelCollection) {
			$this->collComentarios->clearIterator();
		}
		$this->collComentarios = null;
		if ($this->collLibro_colaboradors instanceof PropelCollection) {
			$this->collLibro_colaboradors->clearIterator();
		}
		$this->collLibro_colaboradors = null;
		if ($this->collLibro_versions instanceof PropelCollection) {
			$this->collLibro_versions->clearIterator();
		}
		$this->collLibro_versions = null;
		if ($this->collSlider_maes instanceof PropelCollection) {
			$this->collSlider_maes->clearIterator();
		}
		$this->collSlider_maes = null;
		if ($this->collPostulantess instanceof PropelCollection) {
			$this->collPostulantess->clearIterator();
		}
		$this->collPostulantess = null;
		if ($this->collClasificadoss instanceof PropelCollection) {
			$this->collClasificadoss->clearIterator();
		}
		$this->collClasificadoss = null;
		$this->aUsuario = null;
		$this->aPrivacidad = null;
		$this->aGenero = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(LibroPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseLibro
