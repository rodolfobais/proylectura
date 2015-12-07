<?php


/**
 * Base class that represents a row from the 'lista' table.
 *
 * 
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseLista extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ListaPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ListaPeer
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
	 * The value for the id_usuario field.
	 * @var        int
	 */
	protected $id_usuario;

	/**
	 * The value for the id_genero field.
	 * @var        int
	 */
	protected $id_genero;

	/**
	 * @var        Usuario
	 */
	protected $aUsuario;

	/**
	 * @var        Genero
	 */
	protected $aGenero;

	/**
	 * @var        array Lista_audiolibro[] Collection to store aggregation of Lista_audiolibro objects.
	 */
	protected $collLista_audiolibros;

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
	protected $lista_audiolibrosScheduledForDeletion = null;

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
	 * Get the [id_usuario] column value.
	 * 
	 * @return     int
	 */
	public function getId_usuario()
	{
		return $this->id_usuario;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Lista The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ListaPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [nombre] column.
	 * 
	 * @param      string $v new value
	 * @return     Lista The current object (for fluent API support)
	 */
	public function setNombre($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = ListaPeer::NOMBRE;
		}

		return $this;
	} // setNombre()

	/**
	 * Sets the value of [fecha] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Lista The current object (for fluent API support)
	 */
	public function setFecha($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->fecha !== null || $dt !== null) {
			$currentDateAsString = ($this->fecha !== null && $tmpDt = new DateTime($this->fecha)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->fecha = $newDateAsString;
				$this->modifiedColumns[] = ListaPeer::FECHA;
			}
		} // if either are not null

		return $this;
	} // setFecha()

	/**
	 * Set the value of [id_usuario] column.
	 * 
	 * @param      int $v new value
	 * @return     Lista The current object (for fluent API support)
	 */
	public function setId_usuario($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_usuario !== $v) {
			$this->id_usuario = $v;
			$this->modifiedColumns[] = ListaPeer::ID_USUARIO;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
		}

		return $this;
	} // setId_usuario()

	/**
	 * Set the value of [id_genero] column.
	 * 
	 * @param      int $v new value
	 * @return     Lista The current object (for fluent API support)
	 */
	public function setId_genero($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_genero !== $v) {
			$this->id_genero = $v;
			$this->modifiedColumns[] = ListaPeer::ID_GENERO;
		}

		if ($this->aGenero !== null && $this->aGenero->getId() !== $v) {
			$this->aGenero = null;
		}

		return $this;
	} // setId_genero()

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
			$this->id_usuario = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->id_genero = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 5; // 5 = ListaPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Lista object", $e);
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

		if ($this->aUsuario !== null && $this->id_usuario !== $this->aUsuario->getId()) {
			$this->aUsuario = null;
		}
		if ($this->aGenero !== null && $this->id_genero !== $this->aGenero->getId()) {
			$this->aGenero = null;
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
			$con = Propel::getConnection(ListaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ListaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUsuario = null;
			$this->aGenero = null;
			$this->collLista_audiolibros = null;

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
			$con = Propel::getConnection(ListaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = ListaQuery::create()
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
			$con = Propel::getConnection(ListaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ListaPeer::addInstanceToPool($this);
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

			if ($this->lista_audiolibrosScheduledForDeletion !== null) {
				if (!$this->lista_audiolibrosScheduledForDeletion->isEmpty()) {
		Lista_audiolibroQuery::create()
						->filterByPrimaryKeys($this->lista_audiolibrosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->lista_audiolibrosScheduledForDeletion = null;
				}
			}

			if ($this->collLista_audiolibros !== null) {
				foreach ($this->collLista_audiolibros as $referrerFK) {
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

		$this->modifiedColumns[] = ListaPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . ListaPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(ListaPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(ListaPeer::NOMBRE)) {
			$modifiedColumns[':p' . $index++]  = '`NOMBRE`';
		}
		if ($this->isColumnModified(ListaPeer::FECHA)) {
			$modifiedColumns[':p' . $index++]  = '`FECHA`';
		}
		if ($this->isColumnModified(ListaPeer::ID_USUARIO)) {
			$modifiedColumns[':p' . $index++]  = '`ID_USUARIO`';
		}
		if ($this->isColumnModified(ListaPeer::ID_GENERO)) {
			$modifiedColumns[':p' . $index++]  = '`ID_GENERO`';
		}

		$sql = sprintf(
			'INSERT INTO `lista` (%s) VALUES (%s)',
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
					case '`ID_USUARIO`':
						$stmt->bindValue($identifier, $this->id_usuario, PDO::PARAM_INT);
						break;
					case '`ID_GENERO`':
						$stmt->bindValue($identifier, $this->id_genero, PDO::PARAM_INT);
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

			if ($this->aGenero !== null) {
				if (!$this->aGenero->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGenero->getValidationFailures());
				}
			}


			if (($retval = ListaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLista_audiolibros !== null) {
					foreach ($this->collLista_audiolibros as $referrerFK) {
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
		$pos = ListaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getId_usuario();
				break;
			case 4:
				return $this->getId_genero();
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
		if (isset($alreadyDumpedObjects['Lista'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Lista'][$this->getPrimaryKey()] = true;
		$keys = ListaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getFecha(),
			$keys[3] => $this->getId_usuario(),
			$keys[4] => $this->getId_genero(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aUsuario) {
				$result['Usuario'] = $this->aUsuario->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aGenero) {
				$result['Genero'] = $this->aGenero->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collLista_audiolibros) {
				$result['Lista_audiolibros'] = $this->collLista_audiolibros->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = ListaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setId_usuario($value);
				break;
			case 4:
				$this->setId_genero($value);
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
		$keys = ListaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecha($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId_usuario($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId_genero($arr[$keys[4]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ListaPeer::DATABASE_NAME);

		if ($this->isColumnModified(ListaPeer::ID)) $criteria->add(ListaPeer::ID, $this->id);
		if ($this->isColumnModified(ListaPeer::NOMBRE)) $criteria->add(ListaPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(ListaPeer::FECHA)) $criteria->add(ListaPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(ListaPeer::ID_USUARIO)) $criteria->add(ListaPeer::ID_USUARIO, $this->id_usuario);
		if ($this->isColumnModified(ListaPeer::ID_GENERO)) $criteria->add(ListaPeer::ID_GENERO, $this->id_genero);

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
		$criteria = new Criteria(ListaPeer::DATABASE_NAME);
		$criteria->add(ListaPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Lista (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setNombre($this->getNombre());
		$copyObj->setFecha($this->getFecha());
		$copyObj->setId_usuario($this->getId_usuario());
		$copyObj->setId_genero($this->getId_genero());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getLista_audiolibros() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addLista_audiolibro($relObj->copy($deepCopy));
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
	 * @return     Lista Clone of current object.
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
	 * @return     ListaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ListaPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Lista The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuario(Usuario $v = null)
	{
		if ($v === null) {
			$this->setId_usuario(NULL);
		} else {
			$this->setId_usuario($v->getId());
		}

		$this->aUsuario = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addLista($this);
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
		if ($this->aUsuario === null && ($this->id_usuario !== null)) {
			$this->aUsuario = UsuarioQuery::create()->findPk($this->id_usuario, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUsuario->addListas($this);
			 */
		}
		return $this->aUsuario;
	}

	/**
	 * Declares an association between this object and a Genero object.
	 *
	 * @param      Genero $v
	 * @return     Lista The current object (for fluent API support)
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
			$v->addLista($this);
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
				$this->aGenero->addListas($this);
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
		if ('Lista_audiolibro' == $relationName) {
			return $this->initLista_audiolibros();
		}
	}

	/**
	 * Clears out the collLista_audiolibros collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addLista_audiolibros()
	 */
	public function clearLista_audiolibros()
	{
		$this->collLista_audiolibros = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collLista_audiolibros collection.
	 *
	 * By default this just sets the collLista_audiolibros collection to an empty array (like clearcollLista_audiolibros());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initLista_audiolibros($overrideExisting = true)
	{
		if (null !== $this->collLista_audiolibros && !$overrideExisting) {
			return;
		}
		$this->collLista_audiolibros = new PropelObjectCollection();
		$this->collLista_audiolibros->setModel('Lista_audiolibro');
	}

	/**
	 * Gets an array of Lista_audiolibro objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Lista is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Lista_audiolibro[] List of Lista_audiolibro objects
	 * @throws     PropelException
	 */
	public function getLista_audiolibros($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collLista_audiolibros || null !== $criteria) {
			if ($this->isNew() && null === $this->collLista_audiolibros) {
				// return empty collection
				$this->initLista_audiolibros();
			} else {
				$collLista_audiolibros = Lista_audiolibroQuery::create(null, $criteria)
					->filterByLista($this)
					->find($con);
				if (null !== $criteria) {
					return $collLista_audiolibros;
				}
				$this->collLista_audiolibros = $collLista_audiolibros;
			}
		}
		return $this->collLista_audiolibros;
	}

	/**
	 * Sets a collection of Lista_audiolibro objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $lista_audiolibros A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setLista_audiolibros(PropelCollection $lista_audiolibros, PropelPDO $con = null)
	{
		$this->lista_audiolibrosScheduledForDeletion = $this->getLista_audiolibros(new Criteria(), $con)->diff($lista_audiolibros);

		foreach ($lista_audiolibros as $lista_audiolibro) {
			// Fix issue with collection modified by reference
			if ($lista_audiolibro->isNew()) {
				$lista_audiolibro->setLista($this);
			}
			$this->addLista_audiolibro($lista_audiolibro);
		}

		$this->collLista_audiolibros = $lista_audiolibros;
	}

	/**
	 * Returns the number of related Lista_audiolibro objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Lista_audiolibro objects.
	 * @throws     PropelException
	 */
	public function countLista_audiolibros(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collLista_audiolibros || null !== $criteria) {
			if ($this->isNew() && null === $this->collLista_audiolibros) {
				return 0;
			} else {
				$query = Lista_audiolibroQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByLista($this)
					->count($con);
			}
		} else {
			return count($this->collLista_audiolibros);
		}
	}

	/**
	 * Method called to associate a Lista_audiolibro object to this object
	 * through the Lista_audiolibro foreign key attribute.
	 *
	 * @param      Lista_audiolibro $l Lista_audiolibro
	 * @return     Lista The current object (for fluent API support)
	 */
	public function addLista_audiolibro(Lista_audiolibro $l)
	{
		if ($this->collLista_audiolibros === null) {
			$this->initLista_audiolibros();
		}
		if (!$this->collLista_audiolibros->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddLista_audiolibro($l);
		}

		return $this;
	}

	/**
	 * @param	Lista_audiolibro $lista_audiolibro The lista_audiolibro object to add.
	 */
	protected function doAddLista_audiolibro($lista_audiolibro)
	{
		$this->collLista_audiolibros[]= $lista_audiolibro;
		$lista_audiolibro->setLista($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Lista is new, it will return
	 * an empty collection; or if this Lista has previously
	 * been saved, it will retrieve related Lista_audiolibros from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Lista.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Lista_audiolibro[] List of Lista_audiolibro objects
	 */
	public function getLista_audiolibrosJoinAudiolibro($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = Lista_audiolibroQuery::create(null, $criteria);
		$query->joinWith('Audiolibro', $join_behavior);

		return $this->getLista_audiolibros($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->nombre = null;
		$this->fecha = null;
		$this->id_usuario = null;
		$this->id_genero = null;
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
			if ($this->collLista_audiolibros) {
				foreach ($this->collLista_audiolibros as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collLista_audiolibros instanceof PropelCollection) {
			$this->collLista_audiolibros->clearIterator();
		}
		$this->collLista_audiolibros = null;
		$this->aUsuario = null;
		$this->aGenero = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(ListaPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseLista
