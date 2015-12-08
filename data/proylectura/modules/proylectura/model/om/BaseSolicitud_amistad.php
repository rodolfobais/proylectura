<?php


/**
 * Base class that represents a row from the 'solicitud_amistad' table.
 *
 * 
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseSolicitud_amistad extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'Solicitud_amistadPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        Solicitud_amistadPeer
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
	 * The value for the id_usuario_solicitado field.
	 * @var        int
	 */
	protected $id_usuario_solicitado;

	/**
	 * The value for the id_usuario_solicitante field.
	 * @var        int
	 */
	protected $id_usuario_solicitante;

	/**
	 * The value for the estado field.
	 * @var        int
	 */
	protected $estado;

	/**
	 * @var        Usuario
	 */
	protected $aUsuarioRelatedById_libro;

	/**
	 * @var        Usuario
	 */
	protected $aUsuarioRelatedById_usuario_solicitante;

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
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [id_usuario_solicitado] column value.
	 * 
	 * @return     int
	 */
	public function getId_libro()
	{
		return $this->id_usuario_solicitado;
	}

	/**
	 * Get the [id_usuario_solicitante] column value.
	 * 
	 * @return     int
	 */
	public function getId_usuario_solicitante()
	{
		return $this->id_usuario_solicitante;
	}

	/**
	 * Get the [estado] column value.
	 * 
	 * @return     int
	 */
	public function getestado()
	{
		return $this->estado;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Solicitud_amistad The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = Solicitud_amistadPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [id_usuario_solicitado] column.
	 * 
	 * @param      int $v new value
	 * @return     Solicitud_amistad The current object (for fluent API support)
	 */
	public function setId_libro($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_usuario_solicitado !== $v) {
			$this->id_usuario_solicitado = $v;
			$this->modifiedColumns[] = Solicitud_amistadPeer::ID_USUARIO_SOLICITADO;
		}

		if ($this->aUsuarioRelatedById_libro !== null && $this->aUsuarioRelatedById_libro->getId() !== $v) {
			$this->aUsuarioRelatedById_libro = null;
		}

		return $this;
	} // setId_libro()

	/**
	 * Set the value of [id_usuario_solicitante] column.
	 * 
	 * @param      int $v new value
	 * @return     Solicitud_amistad The current object (for fluent API support)
	 */
	public function setId_usuario_solicitante($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_usuario_solicitante !== $v) {
			$this->id_usuario_solicitante = $v;
			$this->modifiedColumns[] = Solicitud_amistadPeer::ID_USUARIO_SOLICITANTE;
		}

		if ($this->aUsuarioRelatedById_usuario_solicitante !== null && $this->aUsuarioRelatedById_usuario_solicitante->getId() !== $v) {
			$this->aUsuarioRelatedById_usuario_solicitante = null;
		}

		return $this;
	} // setId_usuario_solicitante()

	/**
	 * Set the value of [estado] column.
	 * 
	 * @param      int $v new value
	 * @return     Solicitud_amistad The current object (for fluent API support)
	 */
	public function setestado($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->estado !== $v) {
			$this->estado = $v;
			$this->modifiedColumns[] = Solicitud_amistadPeer::ESTADO;
		}

		return $this;
	} // setestado()

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
			$this->id_usuario_solicitado = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->id_usuario_solicitante = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->estado = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 4; // 4 = Solicitud_amistadPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Solicitud_amistad object", $e);
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

		if ($this->aUsuarioRelatedById_libro !== null && $this->id_usuario_solicitado !== $this->aUsuarioRelatedById_libro->getId()) {
			$this->aUsuarioRelatedById_libro = null;
		}
		if ($this->aUsuarioRelatedById_usuario_solicitante !== null && $this->id_usuario_solicitante !== $this->aUsuarioRelatedById_usuario_solicitante->getId()) {
			$this->aUsuarioRelatedById_usuario_solicitante = null;
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
			$con = Propel::getConnection(Solicitud_amistadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = Solicitud_amistadPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUsuarioRelatedById_libro = null;
			$this->aUsuarioRelatedById_usuario_solicitante = null;
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
			$con = Propel::getConnection(Solicitud_amistadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = Solicitud_amistadQuery::create()
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
			$con = Propel::getConnection(Solicitud_amistadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				Solicitud_amistadPeer::addInstanceToPool($this);
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

			if ($this->aUsuarioRelatedById_libro !== null) {
				if ($this->aUsuarioRelatedById_libro->isModified() || $this->aUsuarioRelatedById_libro->isNew()) {
					$affectedRows += $this->aUsuarioRelatedById_libro->save($con);
				}
				$this->setUsuarioRelatedById_libro($this->aUsuarioRelatedById_libro);
			}

			if ($this->aUsuarioRelatedById_usuario_solicitante !== null) {
				if ($this->aUsuarioRelatedById_usuario_solicitante->isModified() || $this->aUsuarioRelatedById_usuario_solicitante->isNew()) {
					$affectedRows += $this->aUsuarioRelatedById_usuario_solicitante->save($con);
				}
				$this->setUsuarioRelatedById_usuario_solicitante($this->aUsuarioRelatedById_usuario_solicitante);
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

		$this->modifiedColumns[] = Solicitud_amistadPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . Solicitud_amistadPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(Solicitud_amistadPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(Solicitud_amistadPeer::ID_USUARIO_SOLICITADO)) {
			$modifiedColumns[':p' . $index++]  = '`ID_USUARIO_SOLICITADO`';
		}
		if ($this->isColumnModified(Solicitud_amistadPeer::ID_USUARIO_SOLICITANTE)) {
			$modifiedColumns[':p' . $index++]  = '`ID_USUARIO_SOLICITANTE`';
		}
		if ($this->isColumnModified(Solicitud_amistadPeer::ESTADO)) {
			$modifiedColumns[':p' . $index++]  = '`ESTADO`';
		}

		$sql = sprintf(
			'INSERT INTO `solicitud_amistad` (%s) VALUES (%s)',
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
					case '`ID_USUARIO_SOLICITADO`':
						$stmt->bindValue($identifier, $this->id_usuario_solicitado, PDO::PARAM_INT);
						break;
					case '`ID_USUARIO_SOLICITANTE`':
						$stmt->bindValue($identifier, $this->id_usuario_solicitante, PDO::PARAM_INT);
						break;
					case '`ESTADO`':
						$stmt->bindValue($identifier, $this->estado, PDO::PARAM_INT);
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

			if ($this->aUsuarioRelatedById_libro !== null) {
				if (!$this->aUsuarioRelatedById_libro->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuarioRelatedById_libro->getValidationFailures());
				}
			}

			if ($this->aUsuarioRelatedById_usuario_solicitante !== null) {
				if (!$this->aUsuarioRelatedById_usuario_solicitante->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuarioRelatedById_usuario_solicitante->getValidationFailures());
				}
			}


			if (($retval = Solicitud_amistadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = Solicitud_amistadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getId_libro();
				break;
			case 2:
				return $this->getId_usuario_solicitante();
				break;
			case 3:
				return $this->getestado();
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
		if (isset($alreadyDumpedObjects['Solicitud_amistad'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Solicitud_amistad'][$this->getPrimaryKey()] = true;
		$keys = Solicitud_amistadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getId_libro(),
			$keys[2] => $this->getId_usuario_solicitante(),
			$keys[3] => $this->getestado(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aUsuarioRelatedById_libro) {
				$result['UsuarioRelatedById_libro'] = $this->aUsuarioRelatedById_libro->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUsuarioRelatedById_usuario_solicitante) {
				$result['UsuarioRelatedById_usuario_solicitante'] = $this->aUsuarioRelatedById_usuario_solicitante->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
		$pos = Solicitud_amistadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setId_libro($value);
				break;
			case 2:
				$this->setId_usuario_solicitante($value);
				break;
			case 3:
				$this->setestado($value);
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
		$keys = Solicitud_amistadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId_libro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId_usuario_solicitante($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setestado($arr[$keys[3]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(Solicitud_amistadPeer::DATABASE_NAME);

		if ($this->isColumnModified(Solicitud_amistadPeer::ID)) $criteria->add(Solicitud_amistadPeer::ID, $this->id);
		if ($this->isColumnModified(Solicitud_amistadPeer::ID_USUARIO_SOLICITADO)) $criteria->add(Solicitud_amistadPeer::ID_USUARIO_SOLICITADO, $this->id_usuario_solicitado);
		if ($this->isColumnModified(Solicitud_amistadPeer::ID_USUARIO_SOLICITANTE)) $criteria->add(Solicitud_amistadPeer::ID_USUARIO_SOLICITANTE, $this->id_usuario_solicitante);
		if ($this->isColumnModified(Solicitud_amistadPeer::ESTADO)) $criteria->add(Solicitud_amistadPeer::ESTADO, $this->estado);

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
		$criteria = new Criteria(Solicitud_amistadPeer::DATABASE_NAME);
		$criteria->add(Solicitud_amistadPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Solicitud_amistad (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setId_libro($this->getId_libro());
		$copyObj->setId_usuario_solicitante($this->getId_usuario_solicitante());
		$copyObj->setestado($this->getestado());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

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
	 * @return     Solicitud_amistad Clone of current object.
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
	 * @return     Solicitud_amistadPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new Solicitud_amistadPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Solicitud_amistad The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuarioRelatedById_libro(Usuario $v = null)
	{
		if ($v === null) {
			$this->setId_libro(NULL);
		} else {
			$this->setId_libro($v->getId());
		}

		$this->aUsuarioRelatedById_libro = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addSolicitud_amistadRelatedById_libro($this);
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
	public function getUsuarioRelatedById_libro(PropelPDO $con = null)
	{
		if ($this->aUsuarioRelatedById_libro === null && ($this->id_usuario_solicitado !== null)) {
			$this->aUsuarioRelatedById_libro = UsuarioQuery::create()->findPk($this->id_usuario_solicitado, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUsuarioRelatedById_libro->addSolicitud_amistadsRelatedById_libro($this);
			 */
		}
		return $this->aUsuarioRelatedById_libro;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Solicitud_amistad The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuarioRelatedById_usuario_solicitante(Usuario $v = null)
	{
		if ($v === null) {
			$this->setId_usuario_solicitante(NULL);
		} else {
			$this->setId_usuario_solicitante($v->getId());
		}

		$this->aUsuarioRelatedById_usuario_solicitante = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addSolicitud_amistadRelatedById_usuario_solicitante($this);
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
	public function getUsuarioRelatedById_usuario_solicitante(PropelPDO $con = null)
	{
		if ($this->aUsuarioRelatedById_usuario_solicitante === null && ($this->id_usuario_solicitante !== null)) {
			$this->aUsuarioRelatedById_usuario_solicitante = UsuarioQuery::create()->findPk($this->id_usuario_solicitante, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUsuarioRelatedById_usuario_solicitante->addSolicitud_amistadsRelatedById_usuario_solicitante($this);
			 */
		}
		return $this->aUsuarioRelatedById_usuario_solicitante;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->id_usuario_solicitado = null;
		$this->id_usuario_solicitante = null;
		$this->estado = null;
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
		} // if ($deep)

		$this->aUsuarioRelatedById_libro = null;
		$this->aUsuarioRelatedById_usuario_solicitante = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(Solicitud_amistadPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseSolicitud_amistad
