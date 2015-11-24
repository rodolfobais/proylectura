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
	 * The value for the hash field.
	 * @var        string
	 */
	protected $hash;

	/**
	 * The value for the id_genero field.
	 * @var        int
	 */
	protected $id_genero;

	/**
	 * The value for the id_autor field.
	 * @var        int
	 */
	protected $id_autor;

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
	 * The value for the texto field.
	 * @var        resource
	 */
	protected $texto;

	/**
	 * @var        array Libro_colaborador[] Collection to store aggregation of Libro_colaborador objects.
	 */
	protected $collLibro_colaboradors;

	/**
	 * @var        array Libro_version[] Collection to store aggregation of Libro_version objects.
	 */
	protected $collLibro_versions;

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
	protected $libro_colaboradorsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $libro_versionsScheduledForDeletion = null;

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
	 * Get the [hash] column value.
	 * 
	 * @return     string
	 */
	public function getHash()
	{
		return $this->hash;
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
	 * Get the [id_autor] column value.
	 * 
	 * @return     int
	 */
	public function getId_autor()
	{
		return $this->id_autor;
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
	 * Get the [texto] column value.
	 * 
	 * @return     resource
	 */
	public function getTexto()
	{
		return $this->texto;
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
	 * Set the value of [hash] column.
	 * 
	 * @param      string $v new value
	 * @return     Libro The current object (for fluent API support)
	 */
	public function setHash($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->hash !== $v) {
			$this->hash = $v;
			$this->modifiedColumns[] = LibroPeer::HASH;
		}

		return $this;
	} // setHash()

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

		return $this;
	} // setId_genero()

	/**
	 * Set the value of [id_autor] column.
	 * 
	 * @param      int $v new value
	 * @return     Libro The current object (for fluent API support)
	 */
	public function setId_autor($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_autor !== $v) {
			$this->id_autor = $v;
			$this->modifiedColumns[] = LibroPeer::ID_AUTOR;
		}

		return $this;
	} // setId_autor()

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
	 * Set the value of [texto] column.
	 * 
	 * @param      resource $v new value
	 * @return     Libro The current object (for fluent API support)
	 */
	public function setTexto($v)
	{
		// Because BLOB columns are streams in PDO we have to assume that they are
		// always modified when a new value is passed in.  For example, the contents
		// of the stream itself may have changed externally.
		if (!is_resource($v) && $v !== null) {
			$this->texto = fopen('php://memory', 'r+');
			fwrite($this->texto, $v);
			rewind($this->texto);
		} else { // it's already a stream
			$this->texto = $v;
		}
		$this->modifiedColumns[] = LibroPeer::TEXTO;

		return $this;
	} // setTexto()

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
			$this->hash = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->id_genero = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->id_autor = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->image = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->sinopsis = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			if ($row[$startcol + 8] !== null) {
				$this->texto = fopen('php://memory', 'r+');
				fwrite($this->texto, $row[$startcol + 8]);
				rewind($this->texto);
			} else {
				$this->texto = null;
			}
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 9; // 9 = LibroPeer::NUM_HYDRATE_COLUMNS.

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

			$this->collLibro_colaboradors = null;

			$this->collLibro_versions = null;

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

			if ($this->isNew() || $this->isModified()) {
				// persist changes
				if ($this->isNew()) {
					$this->doInsert($con);
				} else {
					$this->doUpdate($con);
				}
				$affectedRows += 1;
				// Rewind the texto LOB column, since PDO does not rewind after inserting value.
				if ($this->texto !== null && is_resource($this->texto)) {
					rewind($this->texto);
				}

				$this->resetModified();
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
		if ($this->isColumnModified(LibroPeer::HASH)) {
			$modifiedColumns[':p' . $index++]  = '`HASH`';
		}
		if ($this->isColumnModified(LibroPeer::ID_GENERO)) {
			$modifiedColumns[':p' . $index++]  = '`ID_GENERO`';
		}
		if ($this->isColumnModified(LibroPeer::ID_AUTOR)) {
			$modifiedColumns[':p' . $index++]  = '`ID_AUTOR`';
		}
		if ($this->isColumnModified(LibroPeer::IMAGE)) {
			$modifiedColumns[':p' . $index++]  = '`IMAGE`';
		}
		if ($this->isColumnModified(LibroPeer::SINOPSIS)) {
			$modifiedColumns[':p' . $index++]  = '`SINOPSIS`';
		}
		if ($this->isColumnModified(LibroPeer::TEXTO)) {
			$modifiedColumns[':p' . $index++]  = '`TEXTO`';
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
					case '`HASH`':
						$stmt->bindValue($identifier, $this->hash, PDO::PARAM_STR);
						break;
					case '`ID_GENERO`':
						$stmt->bindValue($identifier, $this->id_genero, PDO::PARAM_INT);
						break;
					case '`ID_AUTOR`':
						$stmt->bindValue($identifier, $this->id_autor, PDO::PARAM_INT);
						break;
					case '`IMAGE`':
						$stmt->bindValue($identifier, $this->image, PDO::PARAM_STR);
						break;
					case '`SINOPSIS`':
						$stmt->bindValue($identifier, $this->sinopsis, PDO::PARAM_STR);
						break;
					case '`TEXTO`':
						if (is_resource($this->texto)) {
							rewind($this->texto);
						}
						$stmt->bindValue($identifier, $this->texto, PDO::PARAM_LOB);
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


			if (($retval = LibroPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
				return $this->getHash();
				break;
			case 4:
				return $this->getId_genero();
				break;
			case 5:
				return $this->getId_autor();
				break;
			case 6:
				return $this->getImage();
				break;
			case 7:
				return $this->getSinopsis();
				break;
			case 8:
				return $this->getTexto();
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
			$keys[3] => $this->getHash(),
			$keys[4] => $this->getId_genero(),
			$keys[5] => $this->getId_autor(),
			$keys[6] => $this->getImage(),
			$keys[7] => $this->getSinopsis(),
			$keys[8] => $this->getTexto(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collLibro_colaboradors) {
				$result['Libro_colaboradors'] = $this->collLibro_colaboradors->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collLibro_versions) {
				$result['Libro_versions'] = $this->collLibro_versions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
				$this->setHash($value);
				break;
			case 4:
				$this->setId_genero($value);
				break;
			case 5:
				$this->setId_autor($value);
				break;
			case 6:
				$this->setImage($value);
				break;
			case 7:
				$this->setSinopsis($value);
				break;
			case 8:
				$this->setTexto($value);
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
		if (array_key_exists($keys[3], $arr)) $this->setHash($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId_genero($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId_autor($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setImage($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSinopsis($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTexto($arr[$keys[8]]);
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
		if ($this->isColumnModified(LibroPeer::HASH)) $criteria->add(LibroPeer::HASH, $this->hash);
		if ($this->isColumnModified(LibroPeer::ID_GENERO)) $criteria->add(LibroPeer::ID_GENERO, $this->id_genero);
		if ($this->isColumnModified(LibroPeer::ID_AUTOR)) $criteria->add(LibroPeer::ID_AUTOR, $this->id_autor);
		if ($this->isColumnModified(LibroPeer::IMAGE)) $criteria->add(LibroPeer::IMAGE, $this->image);
		if ($this->isColumnModified(LibroPeer::SINOPSIS)) $criteria->add(LibroPeer::SINOPSIS, $this->sinopsis);
		if ($this->isColumnModified(LibroPeer::TEXTO)) $criteria->add(LibroPeer::TEXTO, $this->texto);

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
		$copyObj->setHash($this->getHash());
		$copyObj->setId_genero($this->getId_genero());
		$copyObj->setId_autor($this->getId_autor());
		$copyObj->setImage($this->getImage());
		$copyObj->setSinopsis($this->getSinopsis());
		$copyObj->setTexto($this->getTexto());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

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
	 * Initializes a collection based on the name of a relation.
	 * Avoids crafting an 'init[$relationName]s' method name
	 * that wouldn't work when StandardEnglishPluralizer is used.
	 *
	 * @param      string $relationName The name of the relation to initialize
	 * @return     void
	 */
	public function initRelation($relationName)
	{
		if ('Libro_colaborador' == $relationName) {
			return $this->initLibro_colaboradors();
		}
		if ('Libro_version' == $relationName) {
			return $this->initLibro_versions();
		}
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
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->nombre = null;
		$this->fecha = null;
		$this->hash = null;
		$this->id_genero = null;
		$this->id_autor = null;
		$this->image = null;
		$this->sinopsis = null;
		$this->texto = null;
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
		} // if ($deep)

		if ($this->collLibro_colaboradors instanceof PropelCollection) {
			$this->collLibro_colaboradors->clearIterator();
		}
		$this->collLibro_colaboradors = null;
		if ($this->collLibro_versions instanceof PropelCollection) {
			$this->collLibro_versions->clearIterator();
		}
		$this->collLibro_versions = null;
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
