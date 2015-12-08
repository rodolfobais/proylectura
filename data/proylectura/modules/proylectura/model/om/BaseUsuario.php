<?php


/**
 * Base class that represents a row from the 'usuario' table.
 *
 * 
 *
 * @package    propel.generator.proylectura.model.om
 */
abstract class BaseUsuario extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'UsuarioPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        UsuarioPeer
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
	 * The value for the nick field.
	 * @var        string
	 */
	protected $nick;

	/**
	 * The value for the nombre field.
	 * @var        string
	 */
	protected $nombre;

	/**
	 * The value for the mail field.
	 * @var        string
	 */
	protected $mail;

	/**
	 * The value for the password field.
	 * @var        string
	 */
	protected $password;

	/**
	 * The value for the admin field.
	 * @var        int
	 */
	protected $admin;

	/**
	 * @var        array Amistad[] Collection to store aggregation of Amistad objects.
	 */
	protected $collAmistadsRelatedById_usuario;

	/**
	 * @var        array Amistad[] Collection to store aggregation of Amistad objects.
	 */
	protected $collAmistadsRelatedByid_usuarioamigo;

	/**
	 * @var        array Calificacion[] Collection to store aggregation of Calificacion objects.
	 */
	protected $collCalificacions;

	/**
	 * @var        array Comentario[] Collection to store aggregation of Comentario objects.
	 */
	protected $collComentarios;

	/**
	 * @var        array Libro[] Collection to store aggregation of Libro objects.
	 */
	protected $collLibrosRelatedByUsuario_ult_acc;

	/**
	 * @var        array Libro[] Collection to store aggregation of Libro objects.
	 */
	protected $collLibrosRelatedById_usuario;

	/**
	 * @var        array Lista[] Collection to store aggregation of Lista objects.
	 */
	protected $collListas;

	/**
	 * @var        array Libro_colaborador[] Collection to store aggregation of Libro_colaborador objects.
	 */
	protected $collLibro_colaboradors;

	/**
	 * @var        array Libro_version[] Collection to store aggregation of Libro_version objects.
	 */
	protected $collLibro_versions;

	/**
	 * @var        array Mensaje[] Collection to store aggregation of Mensaje objects.
	 */
	protected $collMensajesRelatedById_usuario_destinatario;

	/**
	 * @var        array Mensaje[] Collection to store aggregation of Mensaje objects.
	 */
	protected $collMensajesRelatedById_usuario_remitente;

	/**
	 * @var        array Notificacion[] Collection to store aggregation of Notificacion objects.
	 */
	protected $collNotificacionsRelatedById_emisor;

	/**
	 * @var        array Notificacion[] Collection to store aggregation of Notificacion objects.
	 */
	protected $collNotificacionsRelatedById_receptor;

	/**
	 * @var        array Solicitud[] Collection to store aggregation of Solicitud objects.
	 */
	protected $collSolicitudsRelatedById_usuario_solicitado;

	/**
	 * @var        array Solicitud[] Collection to store aggregation of Solicitud objects.
	 */
	protected $collSolicitudsRelatedById_usuario_solicitante;

	/**
	 * @var        array Postulantes[] Collection to store aggregation of Postulantes objects.
	 */
	protected $collPostulantess;

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
	protected $amistadsRelatedById_usuarioScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $amistadsRelatedByid_usuarioamigoScheduledForDeletion = null;

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
	protected $librosRelatedByUsuario_ult_accScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $librosRelatedById_usuarioScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $listasScheduledForDeletion = null;

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
	protected $mensajesRelatedById_usuario_destinatarioScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $mensajesRelatedById_usuario_remitenteScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $notificacionsRelatedById_emisorScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $notificacionsRelatedById_receptorScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $solicitudsRelatedById_usuario_solicitadoScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $solicitudsRelatedById_usuario_solicitanteScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $postulantessScheduledForDeletion = null;

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
	 * Get the [nick] column value.
	 * 
	 * @return     string
	 */
	public function getNick()
	{
		return $this->nick;
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
	 * Get the [mail] column value.
	 * 
	 * @return     string
	 */
	public function getmail()
	{
		return $this->mail;
	}

	/**
	 * Get the [password] column value.
	 * 
	 * @return     string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Get the [admin] column value.
	 * 
	 * @return     int
	 */
	public function getAdmin()
	{
		return $this->admin;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UsuarioPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [nick] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setNick($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nick !== $v) {
			$this->nick = $v;
			$this->modifiedColumns[] = UsuarioPeer::NICK;
		}

		return $this;
	} // setNick()

	/**
	 * Set the value of [nombre] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setNombre($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = UsuarioPeer::NOMBRE;
		}

		return $this;
	} // setNombre()

	/**
	 * Set the value of [mail] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->mail !== $v) {
			$this->mail = $v;
			$this->modifiedColumns[] = UsuarioPeer::MAIL;
		}

		return $this;
	} // setmail()

	/**
	 * Set the value of [password] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = UsuarioPeer::PASSWORD;
		}

		return $this;
	} // setPassword()

	/**
	 * Set the value of [admin] column.
	 * 
	 * @param      int $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setAdmin($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->admin !== $v) {
			$this->admin = $v;
			$this->modifiedColumns[] = UsuarioPeer::ADMIN;
		}

		return $this;
	} // setAdmin()

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
			$this->nick = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->nombre = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->mail = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->password = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->admin = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 6; // 6 = UsuarioPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Usuario object", $e);
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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = UsuarioPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collAmistadsRelatedById_usuario = null;

			$this->collAmistadsRelatedByid_usuarioamigo = null;

			$this->collCalificacions = null;

			$this->collComentarios = null;

			$this->collLibrosRelatedByUsuario_ult_acc = null;

			$this->collLibrosRelatedById_usuario = null;

			$this->collListas = null;

			$this->collLibro_colaboradors = null;

			$this->collLibro_versions = null;

			$this->collMensajesRelatedById_usuario_destinatario = null;

			$this->collMensajesRelatedById_usuario_remitente = null;

			$this->collNotificacionsRelatedById_emisor = null;

			$this->collNotificacionsRelatedById_receptor = null;

			$this->collSolicitudsRelatedById_usuario_solicitado = null;

			$this->collSolicitudsRelatedById_usuario_solicitante = null;

			$this->collPostulantess = null;

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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = UsuarioQuery::create()
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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				UsuarioPeer::addInstanceToPool($this);
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
				$this->resetModified();
			}

			if ($this->amistadsRelatedById_usuarioScheduledForDeletion !== null) {
				if (!$this->amistadsRelatedById_usuarioScheduledForDeletion->isEmpty()) {
		AmistadQuery::create()
						->filterByPrimaryKeys($this->amistadsRelatedById_usuarioScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->amistadsRelatedById_usuarioScheduledForDeletion = null;
				}
			}

			if ($this->collAmistadsRelatedById_usuario !== null) {
				foreach ($this->collAmistadsRelatedById_usuario as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->amistadsRelatedByid_usuarioamigoScheduledForDeletion !== null) {
				if (!$this->amistadsRelatedByid_usuarioamigoScheduledForDeletion->isEmpty()) {
		AmistadQuery::create()
						->filterByPrimaryKeys($this->amistadsRelatedByid_usuarioamigoScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->amistadsRelatedByid_usuarioamigoScheduledForDeletion = null;
				}
			}

			if ($this->collAmistadsRelatedByid_usuarioamigo !== null) {
				foreach ($this->collAmistadsRelatedByid_usuarioamigo as $referrerFK) {
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

			if ($this->librosRelatedByUsuario_ult_accScheduledForDeletion !== null) {
				if (!$this->librosRelatedByUsuario_ult_accScheduledForDeletion->isEmpty()) {
		LibroQuery::create()
						->filterByPrimaryKeys($this->librosRelatedByUsuario_ult_accScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->librosRelatedByUsuario_ult_accScheduledForDeletion = null;
				}
			}

			if ($this->collLibrosRelatedByUsuario_ult_acc !== null) {
				foreach ($this->collLibrosRelatedByUsuario_ult_acc as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->librosRelatedById_usuarioScheduledForDeletion !== null) {
				if (!$this->librosRelatedById_usuarioScheduledForDeletion->isEmpty()) {
		LibroQuery::create()
						->filterByPrimaryKeys($this->librosRelatedById_usuarioScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->librosRelatedById_usuarioScheduledForDeletion = null;
				}
			}

			if ($this->collLibrosRelatedById_usuario !== null) {
				foreach ($this->collLibrosRelatedById_usuario as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->listasScheduledForDeletion !== null) {
				if (!$this->listasScheduledForDeletion->isEmpty()) {
		ListaQuery::create()
						->filterByPrimaryKeys($this->listasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->listasScheduledForDeletion = null;
				}
			}

			if ($this->collListas !== null) {
				foreach ($this->collListas as $referrerFK) {
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

			if ($this->mensajesRelatedById_usuario_destinatarioScheduledForDeletion !== null) {
				if (!$this->mensajesRelatedById_usuario_destinatarioScheduledForDeletion->isEmpty()) {
		MensajeQuery::create()
						->filterByPrimaryKeys($this->mensajesRelatedById_usuario_destinatarioScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->mensajesRelatedById_usuario_destinatarioScheduledForDeletion = null;
				}
			}

			if ($this->collMensajesRelatedById_usuario_destinatario !== null) {
				foreach ($this->collMensajesRelatedById_usuario_destinatario as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->mensajesRelatedById_usuario_remitenteScheduledForDeletion !== null) {
				if (!$this->mensajesRelatedById_usuario_remitenteScheduledForDeletion->isEmpty()) {
		MensajeQuery::create()
						->filterByPrimaryKeys($this->mensajesRelatedById_usuario_remitenteScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->mensajesRelatedById_usuario_remitenteScheduledForDeletion = null;
				}
			}

			if ($this->collMensajesRelatedById_usuario_remitente !== null) {
				foreach ($this->collMensajesRelatedById_usuario_remitente as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->notificacionsRelatedById_emisorScheduledForDeletion !== null) {
				if (!$this->notificacionsRelatedById_emisorScheduledForDeletion->isEmpty()) {
		NotificacionQuery::create()
						->filterByPrimaryKeys($this->notificacionsRelatedById_emisorScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->notificacionsRelatedById_emisorScheduledForDeletion = null;
				}
			}

			if ($this->collNotificacionsRelatedById_emisor !== null) {
				foreach ($this->collNotificacionsRelatedById_emisor as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->notificacionsRelatedById_receptorScheduledForDeletion !== null) {
				if (!$this->notificacionsRelatedById_receptorScheduledForDeletion->isEmpty()) {
		NotificacionQuery::create()
						->filterByPrimaryKeys($this->notificacionsRelatedById_receptorScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->notificacionsRelatedById_receptorScheduledForDeletion = null;
				}
			}

			if ($this->collNotificacionsRelatedById_receptor !== null) {
				foreach ($this->collNotificacionsRelatedById_receptor as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->solicitudsRelatedById_usuario_solicitadoScheduledForDeletion !== null) {
				if (!$this->solicitudsRelatedById_usuario_solicitadoScheduledForDeletion->isEmpty()) {
		SolicitudQuery::create()
						->filterByPrimaryKeys($this->solicitudsRelatedById_usuario_solicitadoScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->solicitudsRelatedById_usuario_solicitadoScheduledForDeletion = null;
				}
			}

			if ($this->collSolicitudsRelatedById_usuario_solicitado !== null) {
				foreach ($this->collSolicitudsRelatedById_usuario_solicitado as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->solicitudsRelatedById_usuario_solicitanteScheduledForDeletion !== null) {
				if (!$this->solicitudsRelatedById_usuario_solicitanteScheduledForDeletion->isEmpty()) {
		SolicitudQuery::create()
						->filterByPrimaryKeys($this->solicitudsRelatedById_usuario_solicitanteScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->solicitudsRelatedById_usuario_solicitanteScheduledForDeletion = null;
				}
			}

			if ($this->collSolicitudsRelatedById_usuario_solicitante !== null) {
				foreach ($this->collSolicitudsRelatedById_usuario_solicitante as $referrerFK) {
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

		$this->modifiedColumns[] = UsuarioPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . UsuarioPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(UsuarioPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(UsuarioPeer::NICK)) {
			$modifiedColumns[':p' . $index++]  = '`NICK`';
		}
		if ($this->isColumnModified(UsuarioPeer::NOMBRE)) {
			$modifiedColumns[':p' . $index++]  = '`NOMBRE`';
		}
		if ($this->isColumnModified(UsuarioPeer::MAIL)) {
			$modifiedColumns[':p' . $index++]  = '`MAIL`';
		}
		if ($this->isColumnModified(UsuarioPeer::PASSWORD)) {
			$modifiedColumns[':p' . $index++]  = '`PASSWORD`';
		}
		if ($this->isColumnModified(UsuarioPeer::ADMIN)) {
			$modifiedColumns[':p' . $index++]  = '`ADMIN`';
		}

		$sql = sprintf(
			'INSERT INTO `usuario` (%s) VALUES (%s)',
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
					case '`NICK`':
						$stmt->bindValue($identifier, $this->nick, PDO::PARAM_STR);
						break;
					case '`NOMBRE`':
						$stmt->bindValue($identifier, $this->nombre, PDO::PARAM_STR);
						break;
					case '`MAIL`':
						$stmt->bindValue($identifier, $this->mail, PDO::PARAM_STR);
						break;
					case '`PASSWORD`':
						$stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
						break;
					case '`ADMIN`':
						$stmt->bindValue($identifier, $this->admin, PDO::PARAM_INT);
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


			if (($retval = UsuarioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAmistadsRelatedById_usuario !== null) {
					foreach ($this->collAmistadsRelatedById_usuario as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAmistadsRelatedByid_usuarioamigo !== null) {
					foreach ($this->collAmistadsRelatedByid_usuarioamigo as $referrerFK) {
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

				if ($this->collLibrosRelatedByUsuario_ult_acc !== null) {
					foreach ($this->collLibrosRelatedByUsuario_ult_acc as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLibrosRelatedById_usuario !== null) {
					foreach ($this->collLibrosRelatedById_usuario as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collListas !== null) {
					foreach ($this->collListas as $referrerFK) {
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

				if ($this->collMensajesRelatedById_usuario_destinatario !== null) {
					foreach ($this->collMensajesRelatedById_usuario_destinatario as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMensajesRelatedById_usuario_remitente !== null) {
					foreach ($this->collMensajesRelatedById_usuario_remitente as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNotificacionsRelatedById_emisor !== null) {
					foreach ($this->collNotificacionsRelatedById_emisor as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNotificacionsRelatedById_receptor !== null) {
					foreach ($this->collNotificacionsRelatedById_receptor as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSolicitudsRelatedById_usuario_solicitado !== null) {
					foreach ($this->collSolicitudsRelatedById_usuario_solicitado as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSolicitudsRelatedById_usuario_solicitante !== null) {
					foreach ($this->collSolicitudsRelatedById_usuario_solicitante as $referrerFK) {
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
		$pos = UsuarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNick();
				break;
			case 2:
				return $this->getNombre();
				break;
			case 3:
				return $this->getmail();
				break;
			case 4:
				return $this->getPassword();
				break;
			case 5:
				return $this->getAdmin();
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
		if (isset($alreadyDumpedObjects['Usuario'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Usuario'][$this->getPrimaryKey()] = true;
		$keys = UsuarioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNick(),
			$keys[2] => $this->getNombre(),
			$keys[3] => $this->getmail(),
			$keys[4] => $this->getPassword(),
			$keys[5] => $this->getAdmin(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collAmistadsRelatedById_usuario) {
				$result['AmistadsRelatedById_usuario'] = $this->collAmistadsRelatedById_usuario->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collAmistadsRelatedByid_usuarioamigo) {
				$result['AmistadsRelatedByid_usuarioamigo'] = $this->collAmistadsRelatedByid_usuarioamigo->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collCalificacions) {
				$result['Calificacions'] = $this->collCalificacions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collComentarios) {
				$result['Comentarios'] = $this->collComentarios->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collLibrosRelatedByUsuario_ult_acc) {
				$result['LibrosRelatedByUsuario_ult_acc'] = $this->collLibrosRelatedByUsuario_ult_acc->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collLibrosRelatedById_usuario) {
				$result['LibrosRelatedById_usuario'] = $this->collLibrosRelatedById_usuario->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collListas) {
				$result['Listas'] = $this->collListas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collLibro_colaboradors) {
				$result['Libro_colaboradors'] = $this->collLibro_colaboradors->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collLibro_versions) {
				$result['Libro_versions'] = $this->collLibro_versions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collMensajesRelatedById_usuario_destinatario) {
				$result['MensajesRelatedById_usuario_destinatario'] = $this->collMensajesRelatedById_usuario_destinatario->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collMensajesRelatedById_usuario_remitente) {
				$result['MensajesRelatedById_usuario_remitente'] = $this->collMensajesRelatedById_usuario_remitente->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collNotificacionsRelatedById_emisor) {
				$result['NotificacionsRelatedById_emisor'] = $this->collNotificacionsRelatedById_emisor->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collNotificacionsRelatedById_receptor) {
				$result['NotificacionsRelatedById_receptor'] = $this->collNotificacionsRelatedById_receptor->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collSolicitudsRelatedById_usuario_solicitado) {
				$result['SolicitudsRelatedById_usuario_solicitado'] = $this->collSolicitudsRelatedById_usuario_solicitado->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collSolicitudsRelatedById_usuario_solicitante) {
				$result['SolicitudsRelatedById_usuario_solicitante'] = $this->collSolicitudsRelatedById_usuario_solicitante->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collPostulantess) {
				$result['Postulantess'] = $this->collPostulantess->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = UsuarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setNick($value);
				break;
			case 2:
				$this->setNombre($value);
				break;
			case 3:
				$this->setmail($value);
				break;
			case 4:
				$this->setPassword($value);
				break;
			case 5:
				$this->setAdmin($value);
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
		$keys = UsuarioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNick($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNombre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setmail($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPassword($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAdmin($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);

		if ($this->isColumnModified(UsuarioPeer::ID)) $criteria->add(UsuarioPeer::ID, $this->id);
		if ($this->isColumnModified(UsuarioPeer::NICK)) $criteria->add(UsuarioPeer::NICK, $this->nick);
		if ($this->isColumnModified(UsuarioPeer::NOMBRE)) $criteria->add(UsuarioPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(UsuarioPeer::MAIL)) $criteria->add(UsuarioPeer::MAIL, $this->mail);
		if ($this->isColumnModified(UsuarioPeer::PASSWORD)) $criteria->add(UsuarioPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(UsuarioPeer::ADMIN)) $criteria->add(UsuarioPeer::ADMIN, $this->admin);

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
		$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		$criteria->add(UsuarioPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Usuario (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setNick($this->getNick());
		$copyObj->setNombre($this->getNombre());
		$copyObj->setmail($this->getmail());
		$copyObj->setPassword($this->getPassword());
		$copyObj->setAdmin($this->getAdmin());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getAmistadsRelatedById_usuario() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAmistadRelatedById_usuario($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAmistadsRelatedByid_usuarioamigo() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAmistadRelatedByid_usuarioamigo($relObj->copy($deepCopy));
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

			foreach ($this->getLibrosRelatedByUsuario_ult_acc() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addLibroRelatedByUsuario_ult_acc($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getLibrosRelatedById_usuario() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addLibroRelatedById_usuario($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getListas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addLista($relObj->copy($deepCopy));
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

			foreach ($this->getMensajesRelatedById_usuario_destinatario() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addMensajeRelatedById_usuario_destinatario($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getMensajesRelatedById_usuario_remitente() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addMensajeRelatedById_usuario_remitente($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNotificacionsRelatedById_emisor() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNotificacionRelatedById_emisor($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNotificacionsRelatedById_receptor() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNotificacionRelatedById_receptor($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSolicitudsRelatedById_usuario_solicitado() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSolicitudRelatedById_usuario_solicitado($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSolicitudsRelatedById_usuario_solicitante() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSolicitudRelatedById_usuario_solicitante($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPostulantess() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPostulantes($relObj->copy($deepCopy));
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
	 * @return     Usuario Clone of current object.
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
	 * @return     UsuarioPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UsuarioPeer();
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
		if ('AmistadRelatedById_usuario' == $relationName) {
			return $this->initAmistadsRelatedById_usuario();
		}
		if ('AmistadRelatedByid_usuarioamigo' == $relationName) {
			return $this->initAmistadsRelatedByid_usuarioamigo();
		}
		if ('Calificacion' == $relationName) {
			return $this->initCalificacions();
		}
		if ('Comentario' == $relationName) {
			return $this->initComentarios();
		}
		if ('LibroRelatedByUsuario_ult_acc' == $relationName) {
			return $this->initLibrosRelatedByUsuario_ult_acc();
		}
		if ('LibroRelatedById_usuario' == $relationName) {
			return $this->initLibrosRelatedById_usuario();
		}
		if ('Lista' == $relationName) {
			return $this->initListas();
		}
		if ('Libro_colaborador' == $relationName) {
			return $this->initLibro_colaboradors();
		}
		if ('Libro_version' == $relationName) {
			return $this->initLibro_versions();
		}
		if ('MensajeRelatedById_usuario_destinatario' == $relationName) {
			return $this->initMensajesRelatedById_usuario_destinatario();
		}
		if ('MensajeRelatedById_usuario_remitente' == $relationName) {
			return $this->initMensajesRelatedById_usuario_remitente();
		}
		if ('NotificacionRelatedById_emisor' == $relationName) {
			return $this->initNotificacionsRelatedById_emisor();
		}
		if ('NotificacionRelatedById_receptor' == $relationName) {
			return $this->initNotificacionsRelatedById_receptor();
		}
		if ('SolicitudRelatedById_usuario_solicitado' == $relationName) {
			return $this->initSolicitudsRelatedById_usuario_solicitado();
		}
		if ('SolicitudRelatedById_usuario_solicitante' == $relationName) {
			return $this->initSolicitudsRelatedById_usuario_solicitante();
		}
		if ('Postulantes' == $relationName) {
			return $this->initPostulantess();
		}
	}

	/**
	 * Clears out the collAmistadsRelatedById_usuario collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAmistadsRelatedById_usuario()
	 */
	public function clearAmistadsRelatedById_usuario()
	{
		$this->collAmistadsRelatedById_usuario = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAmistadsRelatedById_usuario collection.
	 *
	 * By default this just sets the collAmistadsRelatedById_usuario collection to an empty array (like clearcollAmistadsRelatedById_usuario());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initAmistadsRelatedById_usuario($overrideExisting = true)
	{
		if (null !== $this->collAmistadsRelatedById_usuario && !$overrideExisting) {
			return;
		}
		$this->collAmistadsRelatedById_usuario = new PropelObjectCollection();
		$this->collAmistadsRelatedById_usuario->setModel('Amistad');
	}

	/**
	 * Gets an array of Amistad objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Amistad[] List of Amistad objects
	 * @throws     PropelException
	 */
	public function getAmistadsRelatedById_usuario($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAmistadsRelatedById_usuario || null !== $criteria) {
			if ($this->isNew() && null === $this->collAmistadsRelatedById_usuario) {
				// return empty collection
				$this->initAmistadsRelatedById_usuario();
			} else {
				$collAmistadsRelatedById_usuario = AmistadQuery::create(null, $criteria)
					->filterByUsuarioRelatedById_usuario($this)
					->find($con);
				if (null !== $criteria) {
					return $collAmistadsRelatedById_usuario;
				}
				$this->collAmistadsRelatedById_usuario = $collAmistadsRelatedById_usuario;
			}
		}
		return $this->collAmistadsRelatedById_usuario;
	}

	/**
	 * Sets a collection of AmistadRelatedById_usuario objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $amistadsRelatedById_usuario A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAmistadsRelatedById_usuario(PropelCollection $amistadsRelatedById_usuario, PropelPDO $con = null)
	{
		$this->amistadsRelatedById_usuarioScheduledForDeletion = $this->getAmistadsRelatedById_usuario(new Criteria(), $con)->diff($amistadsRelatedById_usuario);

		foreach ($amistadsRelatedById_usuario as $amistadRelatedById_usuario) {
			// Fix issue with collection modified by reference
			if ($amistadRelatedById_usuario->isNew()) {
				$amistadRelatedById_usuario->setUsuarioRelatedById_usuario($this);
			}
			$this->addAmistadRelatedById_usuario($amistadRelatedById_usuario);
		}

		$this->collAmistadsRelatedById_usuario = $amistadsRelatedById_usuario;
	}

	/**
	 * Returns the number of related Amistad objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Amistad objects.
	 * @throws     PropelException
	 */
	public function countAmistadsRelatedById_usuario(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAmistadsRelatedById_usuario || null !== $criteria) {
			if ($this->isNew() && null === $this->collAmistadsRelatedById_usuario) {
				return 0;
			} else {
				$query = AmistadQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuarioRelatedById_usuario($this)
					->count($con);
			}
		} else {
			return count($this->collAmistadsRelatedById_usuario);
		}
	}

	/**
	 * Method called to associate a Amistad object to this object
	 * through the Amistad foreign key attribute.
	 *
	 * @param      Amistad $l Amistad
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addAmistadRelatedById_usuario(Amistad $l)
	{
		if ($this->collAmistadsRelatedById_usuario === null) {
			$this->initAmistadsRelatedById_usuario();
		}
		if (!$this->collAmistadsRelatedById_usuario->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddAmistadRelatedById_usuario($l);
		}

		return $this;
	}

	/**
	 * @param	AmistadRelatedById_usuario $amistadRelatedById_usuario The amistadRelatedById_usuario object to add.
	 */
	protected function doAddAmistadRelatedById_usuario($amistadRelatedById_usuario)
	{
		$this->collAmistadsRelatedById_usuario[]= $amistadRelatedById_usuario;
		$amistadRelatedById_usuario->setUsuarioRelatedById_usuario($this);
	}

	/**
	 * Clears out the collAmistadsRelatedByid_usuarioamigo collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAmistadsRelatedByid_usuarioamigo()
	 */
	public function clearAmistadsRelatedByid_usuarioamigo()
	{
		$this->collAmistadsRelatedByid_usuarioamigo = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAmistadsRelatedByid_usuarioamigo collection.
	 *
	 * By default this just sets the collAmistadsRelatedByid_usuarioamigo collection to an empty array (like clearcollAmistadsRelatedByid_usuarioamigo());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initAmistadsRelatedByid_usuarioamigo($overrideExisting = true)
	{
		if (null !== $this->collAmistadsRelatedByid_usuarioamigo && !$overrideExisting) {
			return;
		}
		$this->collAmistadsRelatedByid_usuarioamigo = new PropelObjectCollection();
		$this->collAmistadsRelatedByid_usuarioamigo->setModel('Amistad');
	}

	/**
	 * Gets an array of Amistad objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Amistad[] List of Amistad objects
	 * @throws     PropelException
	 */
	public function getAmistadsRelatedByid_usuarioamigo($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAmistadsRelatedByid_usuarioamigo || null !== $criteria) {
			if ($this->isNew() && null === $this->collAmistadsRelatedByid_usuarioamigo) {
				// return empty collection
				$this->initAmistadsRelatedByid_usuarioamigo();
			} else {
				$collAmistadsRelatedByid_usuarioamigo = AmistadQuery::create(null, $criteria)
					->filterByUsuarioRelatedByid_usuarioamigo($this)
					->find($con);
				if (null !== $criteria) {
					return $collAmistadsRelatedByid_usuarioamigo;
				}
				$this->collAmistadsRelatedByid_usuarioamigo = $collAmistadsRelatedByid_usuarioamigo;
			}
		}
		return $this->collAmistadsRelatedByid_usuarioamigo;
	}

	/**
	 * Sets a collection of AmistadRelatedByid_usuarioamigo objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $amistadsRelatedByid_usuarioamigo A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAmistadsRelatedByid_usuarioamigo(PropelCollection $amistadsRelatedByid_usuarioamigo, PropelPDO $con = null)
	{
		$this->amistadsRelatedByid_usuarioamigoScheduledForDeletion = $this->getAmistadsRelatedByid_usuarioamigo(new Criteria(), $con)->diff($amistadsRelatedByid_usuarioamigo);

		foreach ($amistadsRelatedByid_usuarioamigo as $amistadRelatedByid_usuarioamigo) {
			// Fix issue with collection modified by reference
			if ($amistadRelatedByid_usuarioamigo->isNew()) {
				$amistadRelatedByid_usuarioamigo->setUsuarioRelatedByid_usuarioamigo($this);
			}
			$this->addAmistadRelatedByid_usuarioamigo($amistadRelatedByid_usuarioamigo);
		}

		$this->collAmistadsRelatedByid_usuarioamigo = $amistadsRelatedByid_usuarioamigo;
	}

	/**
	 * Returns the number of related Amistad objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Amistad objects.
	 * @throws     PropelException
	 */
	public function countAmistadsRelatedByid_usuarioamigo(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAmistadsRelatedByid_usuarioamigo || null !== $criteria) {
			if ($this->isNew() && null === $this->collAmistadsRelatedByid_usuarioamigo) {
				return 0;
			} else {
				$query = AmistadQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuarioRelatedByid_usuarioamigo($this)
					->count($con);
			}
		} else {
			return count($this->collAmistadsRelatedByid_usuarioamigo);
		}
	}

	/**
	 * Method called to associate a Amistad object to this object
	 * through the Amistad foreign key attribute.
	 *
	 * @param      Amistad $l Amistad
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addAmistadRelatedByid_usuarioamigo(Amistad $l)
	{
		if ($this->collAmistadsRelatedByid_usuarioamigo === null) {
			$this->initAmistadsRelatedByid_usuarioamigo();
		}
		if (!$this->collAmistadsRelatedByid_usuarioamigo->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddAmistadRelatedByid_usuarioamigo($l);
		}

		return $this;
	}

	/**
	 * @param	AmistadRelatedByid_usuarioamigo $amistadRelatedByid_usuarioamigo The amistadRelatedByid_usuarioamigo object to add.
	 */
	protected function doAddAmistadRelatedByid_usuarioamigo($amistadRelatedByid_usuarioamigo)
	{
		$this->collAmistadsRelatedByid_usuarioamigo[]= $amistadRelatedByid_usuarioamigo;
		$amistadRelatedByid_usuarioamigo->setUsuarioRelatedByid_usuarioamigo($this);
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
	 * If this Usuario is new, it will return
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
					->filterByUsuario($this)
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
				$calificacion->setUsuario($this);
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
					->filterByUsuario($this)
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
	 * @return     Usuario The current object (for fluent API support)
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
		$calificacion->setUsuario($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related Calificacions from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Calificacion[] List of Calificacion objects
	 */
	public function getCalificacionsJoinLibro($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CalificacionQuery::create(null, $criteria);
		$query->joinWith('Libro', $join_behavior);

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
	 * If this Usuario is new, it will return
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
					->filterByUsuario($this)
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
				$comentario->setUsuario($this);
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
					->filterByUsuario($this)
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
	 * @return     Usuario The current object (for fluent API support)
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
		$comentario->setUsuario($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related Comentarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Comentario[] List of Comentario objects
	 */
	public function getComentariosJoinLibro($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ComentarioQuery::create(null, $criteria);
		$query->joinWith('Libro', $join_behavior);

		return $this->getComentarios($query, $con);
	}

	/**
	 * Clears out the collLibrosRelatedByUsuario_ult_acc collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addLibrosRelatedByUsuario_ult_acc()
	 */
	public function clearLibrosRelatedByUsuario_ult_acc()
	{
		$this->collLibrosRelatedByUsuario_ult_acc = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collLibrosRelatedByUsuario_ult_acc collection.
	 *
	 * By default this just sets the collLibrosRelatedByUsuario_ult_acc collection to an empty array (like clearcollLibrosRelatedByUsuario_ult_acc());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initLibrosRelatedByUsuario_ult_acc($overrideExisting = true)
	{
		if (null !== $this->collLibrosRelatedByUsuario_ult_acc && !$overrideExisting) {
			return;
		}
		$this->collLibrosRelatedByUsuario_ult_acc = new PropelObjectCollection();
		$this->collLibrosRelatedByUsuario_ult_acc->setModel('Libro');
	}

	/**
	 * Gets an array of Libro objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Libro[] List of Libro objects
	 * @throws     PropelException
	 */
	public function getLibrosRelatedByUsuario_ult_acc($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collLibrosRelatedByUsuario_ult_acc || null !== $criteria) {
			if ($this->isNew() && null === $this->collLibrosRelatedByUsuario_ult_acc) {
				// return empty collection
				$this->initLibrosRelatedByUsuario_ult_acc();
			} else {
				$collLibrosRelatedByUsuario_ult_acc = LibroQuery::create(null, $criteria)
					->filterByUsuarioRelatedByUsuario_ult_acc($this)
					->find($con);
				if (null !== $criteria) {
					return $collLibrosRelatedByUsuario_ult_acc;
				}
				$this->collLibrosRelatedByUsuario_ult_acc = $collLibrosRelatedByUsuario_ult_acc;
			}
		}
		return $this->collLibrosRelatedByUsuario_ult_acc;
	}

	/**
	 * Sets a collection of LibroRelatedByUsuario_ult_acc objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $librosRelatedByUsuario_ult_acc A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setLibrosRelatedByUsuario_ult_acc(PropelCollection $librosRelatedByUsuario_ult_acc, PropelPDO $con = null)
	{
		$this->librosRelatedByUsuario_ult_accScheduledForDeletion = $this->getLibrosRelatedByUsuario_ult_acc(new Criteria(), $con)->diff($librosRelatedByUsuario_ult_acc);

		foreach ($librosRelatedByUsuario_ult_acc as $libroRelatedByUsuario_ult_acc) {
			// Fix issue with collection modified by reference
			if ($libroRelatedByUsuario_ult_acc->isNew()) {
				$libroRelatedByUsuario_ult_acc->setUsuarioRelatedByUsuario_ult_acc($this);
			}
			$this->addLibroRelatedByUsuario_ult_acc($libroRelatedByUsuario_ult_acc);
		}

		$this->collLibrosRelatedByUsuario_ult_acc = $librosRelatedByUsuario_ult_acc;
	}

	/**
	 * Returns the number of related Libro objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Libro objects.
	 * @throws     PropelException
	 */
	public function countLibrosRelatedByUsuario_ult_acc(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collLibrosRelatedByUsuario_ult_acc || null !== $criteria) {
			if ($this->isNew() && null === $this->collLibrosRelatedByUsuario_ult_acc) {
				return 0;
			} else {
				$query = LibroQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuarioRelatedByUsuario_ult_acc($this)
					->count($con);
			}
		} else {
			return count($this->collLibrosRelatedByUsuario_ult_acc);
		}
	}

	/**
	 * Method called to associate a Libro object to this object
	 * through the Libro foreign key attribute.
	 *
	 * @param      Libro $l Libro
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addLibroRelatedByUsuario_ult_acc(Libro $l)
	{
		if ($this->collLibrosRelatedByUsuario_ult_acc === null) {
			$this->initLibrosRelatedByUsuario_ult_acc();
		}
		if (!$this->collLibrosRelatedByUsuario_ult_acc->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddLibroRelatedByUsuario_ult_acc($l);
		}

		return $this;
	}

	/**
	 * @param	LibroRelatedByUsuario_ult_acc $libroRelatedByUsuario_ult_acc The libroRelatedByUsuario_ult_acc object to add.
	 */
	protected function doAddLibroRelatedByUsuario_ult_acc($libroRelatedByUsuario_ult_acc)
	{
		$this->collLibrosRelatedByUsuario_ult_acc[]= $libroRelatedByUsuario_ult_acc;
		$libroRelatedByUsuario_ult_acc->setUsuarioRelatedByUsuario_ult_acc($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related LibrosRelatedByUsuario_ult_acc from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Libro[] List of Libro objects
	 */
	public function getLibrosRelatedByUsuario_ult_accJoinPrivacidad($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = LibroQuery::create(null, $criteria);
		$query->joinWith('Privacidad', $join_behavior);

		return $this->getLibrosRelatedByUsuario_ult_acc($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related LibrosRelatedByUsuario_ult_acc from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Libro[] List of Libro objects
	 */
	public function getLibrosRelatedByUsuario_ult_accJoinGenero($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = LibroQuery::create(null, $criteria);
		$query->joinWith('Genero', $join_behavior);

		return $this->getLibrosRelatedByUsuario_ult_acc($query, $con);
	}

	/**
	 * Clears out the collLibrosRelatedById_usuario collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addLibrosRelatedById_usuario()
	 */
	public function clearLibrosRelatedById_usuario()
	{
		$this->collLibrosRelatedById_usuario = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collLibrosRelatedById_usuario collection.
	 *
	 * By default this just sets the collLibrosRelatedById_usuario collection to an empty array (like clearcollLibrosRelatedById_usuario());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initLibrosRelatedById_usuario($overrideExisting = true)
	{
		if (null !== $this->collLibrosRelatedById_usuario && !$overrideExisting) {
			return;
		}
		$this->collLibrosRelatedById_usuario = new PropelObjectCollection();
		$this->collLibrosRelatedById_usuario->setModel('Libro');
	}

	/**
	 * Gets an array of Libro objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Libro[] List of Libro objects
	 * @throws     PropelException
	 */
	public function getLibrosRelatedById_usuario($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collLibrosRelatedById_usuario || null !== $criteria) {
			if ($this->isNew() && null === $this->collLibrosRelatedById_usuario) {
				// return empty collection
				$this->initLibrosRelatedById_usuario();
			} else {
				$collLibrosRelatedById_usuario = LibroQuery::create(null, $criteria)
					->filterByUsuarioRelatedById_usuario($this)
					->find($con);
				if (null !== $criteria) {
					return $collLibrosRelatedById_usuario;
				}
				$this->collLibrosRelatedById_usuario = $collLibrosRelatedById_usuario;
			}
		}
		return $this->collLibrosRelatedById_usuario;
	}

	/**
	 * Sets a collection of LibroRelatedById_usuario objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $librosRelatedById_usuario A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setLibrosRelatedById_usuario(PropelCollection $librosRelatedById_usuario, PropelPDO $con = null)
	{
		$this->librosRelatedById_usuarioScheduledForDeletion = $this->getLibrosRelatedById_usuario(new Criteria(), $con)->diff($librosRelatedById_usuario);

		foreach ($librosRelatedById_usuario as $libroRelatedById_usuario) {
			// Fix issue with collection modified by reference
			if ($libroRelatedById_usuario->isNew()) {
				$libroRelatedById_usuario->setUsuarioRelatedById_usuario($this);
			}
			$this->addLibroRelatedById_usuario($libroRelatedById_usuario);
		}

		$this->collLibrosRelatedById_usuario = $librosRelatedById_usuario;
	}

	/**
	 * Returns the number of related Libro objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Libro objects.
	 * @throws     PropelException
	 */
	public function countLibrosRelatedById_usuario(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collLibrosRelatedById_usuario || null !== $criteria) {
			if ($this->isNew() && null === $this->collLibrosRelatedById_usuario) {
				return 0;
			} else {
				$query = LibroQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuarioRelatedById_usuario($this)
					->count($con);
			}
		} else {
			return count($this->collLibrosRelatedById_usuario);
		}
	}

	/**
	 * Method called to associate a Libro object to this object
	 * through the Libro foreign key attribute.
	 *
	 * @param      Libro $l Libro
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addLibroRelatedById_usuario(Libro $l)
	{
		if ($this->collLibrosRelatedById_usuario === null) {
			$this->initLibrosRelatedById_usuario();
		}
		if (!$this->collLibrosRelatedById_usuario->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddLibroRelatedById_usuario($l);
		}

		return $this;
	}

	/**
	 * @param	LibroRelatedById_usuario $libroRelatedById_usuario The libroRelatedById_usuario object to add.
	 */
	protected function doAddLibroRelatedById_usuario($libroRelatedById_usuario)
	{
		$this->collLibrosRelatedById_usuario[]= $libroRelatedById_usuario;
		$libroRelatedById_usuario->setUsuarioRelatedById_usuario($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related LibrosRelatedById_usuario from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Libro[] List of Libro objects
	 */
	public function getLibrosRelatedById_usuarioJoinPrivacidad($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = LibroQuery::create(null, $criteria);
		$query->joinWith('Privacidad', $join_behavior);

		return $this->getLibrosRelatedById_usuario($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related LibrosRelatedById_usuario from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Libro[] List of Libro objects
	 */
	public function getLibrosRelatedById_usuarioJoinGenero($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = LibroQuery::create(null, $criteria);
		$query->joinWith('Genero', $join_behavior);

		return $this->getLibrosRelatedById_usuario($query, $con);
	}

	/**
	 * Clears out the collListas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addListas()
	 */
	public function clearListas()
	{
		$this->collListas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collListas collection.
	 *
	 * By default this just sets the collListas collection to an empty array (like clearcollListas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initListas($overrideExisting = true)
	{
		if (null !== $this->collListas && !$overrideExisting) {
			return;
		}
		$this->collListas = new PropelObjectCollection();
		$this->collListas->setModel('Lista');
	}

	/**
	 * Gets an array of Lista objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Lista[] List of Lista objects
	 * @throws     PropelException
	 */
	public function getListas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collListas || null !== $criteria) {
			if ($this->isNew() && null === $this->collListas) {
				// return empty collection
				$this->initListas();
			} else {
				$collListas = ListaQuery::create(null, $criteria)
					->filterByUsuario($this)
					->find($con);
				if (null !== $criteria) {
					return $collListas;
				}
				$this->collListas = $collListas;
			}
		}
		return $this->collListas;
	}

	/**
	 * Sets a collection of Lista objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $listas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setListas(PropelCollection $listas, PropelPDO $con = null)
	{
		$this->listasScheduledForDeletion = $this->getListas(new Criteria(), $con)->diff($listas);

		foreach ($listas as $lista) {
			// Fix issue with collection modified by reference
			if ($lista->isNew()) {
				$lista->setUsuario($this);
			}
			$this->addLista($lista);
		}

		$this->collListas = $listas;
	}

	/**
	 * Returns the number of related Lista objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Lista objects.
	 * @throws     PropelException
	 */
	public function countListas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collListas || null !== $criteria) {
			if ($this->isNew() && null === $this->collListas) {
				return 0;
			} else {
				$query = ListaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuario($this)
					->count($con);
			}
		} else {
			return count($this->collListas);
		}
	}

	/**
	 * Method called to associate a Lista object to this object
	 * through the Lista foreign key attribute.
	 *
	 * @param      Lista $l Lista
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addLista(Lista $l)
	{
		if ($this->collListas === null) {
			$this->initListas();
		}
		if (!$this->collListas->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddLista($l);
		}

		return $this;
	}

	/**
	 * @param	Lista $lista The lista object to add.
	 */
	protected function doAddLista($lista)
	{
		$this->collListas[]= $lista;
		$lista->setUsuario($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related Listas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Lista[] List of Lista objects
	 */
	public function getListasJoinGenero($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ListaQuery::create(null, $criteria);
		$query->joinWith('Genero', $join_behavior);

		return $this->getListas($query, $con);
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
	 * If this Usuario is new, it will return
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
					->filterByUsuario($this)
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
				$libro_colaborador->setUsuario($this);
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
					->filterByUsuario($this)
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
	 * @return     Usuario The current object (for fluent API support)
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
		$libro_colaborador->setUsuario($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related Libro_colaboradors from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Libro_colaborador[] List of Libro_colaborador objects
	 */
	public function getLibro_colaboradorsJoinLibro($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = Libro_colaboradorQuery::create(null, $criteria);
		$query->joinWith('Libro', $join_behavior);

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
	 * If this Usuario is new, it will return
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
					->filterByUsuario($this)
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
				$libro_version->setUsuario($this);
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
					->filterByUsuario($this)
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
	 * @return     Usuario The current object (for fluent API support)
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
		$libro_version->setUsuario($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related Libro_versions from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Libro_version[] List of Libro_version objects
	 */
	public function getLibro_versionsJoinLibro($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = Libro_versionQuery::create(null, $criteria);
		$query->joinWith('Libro', $join_behavior);

		return $this->getLibro_versions($query, $con);
	}

	/**
	 * Clears out the collMensajesRelatedById_usuario_destinatario collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addMensajesRelatedById_usuario_destinatario()
	 */
	public function clearMensajesRelatedById_usuario_destinatario()
	{
		$this->collMensajesRelatedById_usuario_destinatario = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collMensajesRelatedById_usuario_destinatario collection.
	 *
	 * By default this just sets the collMensajesRelatedById_usuario_destinatario collection to an empty array (like clearcollMensajesRelatedById_usuario_destinatario());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initMensajesRelatedById_usuario_destinatario($overrideExisting = true)
	{
		if (null !== $this->collMensajesRelatedById_usuario_destinatario && !$overrideExisting) {
			return;
		}
		$this->collMensajesRelatedById_usuario_destinatario = new PropelObjectCollection();
		$this->collMensajesRelatedById_usuario_destinatario->setModel('Mensaje');
	}

	/**
	 * Gets an array of Mensaje objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Mensaje[] List of Mensaje objects
	 * @throws     PropelException
	 */
	public function getMensajesRelatedById_usuario_destinatario($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collMensajesRelatedById_usuario_destinatario || null !== $criteria) {
			if ($this->isNew() && null === $this->collMensajesRelatedById_usuario_destinatario) {
				// return empty collection
				$this->initMensajesRelatedById_usuario_destinatario();
			} else {
				$collMensajesRelatedById_usuario_destinatario = MensajeQuery::create(null, $criteria)
					->filterByUsuarioRelatedById_usuario_destinatario($this)
					->find($con);
				if (null !== $criteria) {
					return $collMensajesRelatedById_usuario_destinatario;
				}
				$this->collMensajesRelatedById_usuario_destinatario = $collMensajesRelatedById_usuario_destinatario;
			}
		}
		return $this->collMensajesRelatedById_usuario_destinatario;
	}

	/**
	 * Sets a collection of MensajeRelatedById_usuario_destinatario objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $mensajesRelatedById_usuario_destinatario A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setMensajesRelatedById_usuario_destinatario(PropelCollection $mensajesRelatedById_usuario_destinatario, PropelPDO $con = null)
	{
		$this->mensajesRelatedById_usuario_destinatarioScheduledForDeletion = $this->getMensajesRelatedById_usuario_destinatario(new Criteria(), $con)->diff($mensajesRelatedById_usuario_destinatario);

		foreach ($mensajesRelatedById_usuario_destinatario as $mensajeRelatedById_usuario_destinatario) {
			// Fix issue with collection modified by reference
			if ($mensajeRelatedById_usuario_destinatario->isNew()) {
				$mensajeRelatedById_usuario_destinatario->setUsuarioRelatedById_usuario_destinatario($this);
			}
			$this->addMensajeRelatedById_usuario_destinatario($mensajeRelatedById_usuario_destinatario);
		}

		$this->collMensajesRelatedById_usuario_destinatario = $mensajesRelatedById_usuario_destinatario;
	}

	/**
	 * Returns the number of related Mensaje objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Mensaje objects.
	 * @throws     PropelException
	 */
	public function countMensajesRelatedById_usuario_destinatario(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collMensajesRelatedById_usuario_destinatario || null !== $criteria) {
			if ($this->isNew() && null === $this->collMensajesRelatedById_usuario_destinatario) {
				return 0;
			} else {
				$query = MensajeQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuarioRelatedById_usuario_destinatario($this)
					->count($con);
			}
		} else {
			return count($this->collMensajesRelatedById_usuario_destinatario);
		}
	}

	/**
	 * Method called to associate a Mensaje object to this object
	 * through the Mensaje foreign key attribute.
	 *
	 * @param      Mensaje $l Mensaje
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addMensajeRelatedById_usuario_destinatario(Mensaje $l)
	{
		if ($this->collMensajesRelatedById_usuario_destinatario === null) {
			$this->initMensajesRelatedById_usuario_destinatario();
		}
		if (!$this->collMensajesRelatedById_usuario_destinatario->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddMensajeRelatedById_usuario_destinatario($l);
		}

		return $this;
	}

	/**
	 * @param	MensajeRelatedById_usuario_destinatario $mensajeRelatedById_usuario_destinatario The mensajeRelatedById_usuario_destinatario object to add.
	 */
	protected function doAddMensajeRelatedById_usuario_destinatario($mensajeRelatedById_usuario_destinatario)
	{
		$this->collMensajesRelatedById_usuario_destinatario[]= $mensajeRelatedById_usuario_destinatario;
		$mensajeRelatedById_usuario_destinatario->setUsuarioRelatedById_usuario_destinatario($this);
	}

	/**
	 * Clears out the collMensajesRelatedById_usuario_remitente collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addMensajesRelatedById_usuario_remitente()
	 */
	public function clearMensajesRelatedById_usuario_remitente()
	{
		$this->collMensajesRelatedById_usuario_remitente = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collMensajesRelatedById_usuario_remitente collection.
	 *
	 * By default this just sets the collMensajesRelatedById_usuario_remitente collection to an empty array (like clearcollMensajesRelatedById_usuario_remitente());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initMensajesRelatedById_usuario_remitente($overrideExisting = true)
	{
		if (null !== $this->collMensajesRelatedById_usuario_remitente && !$overrideExisting) {
			return;
		}
		$this->collMensajesRelatedById_usuario_remitente = new PropelObjectCollection();
		$this->collMensajesRelatedById_usuario_remitente->setModel('Mensaje');
	}

	/**
	 * Gets an array of Mensaje objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Mensaje[] List of Mensaje objects
	 * @throws     PropelException
	 */
	public function getMensajesRelatedById_usuario_remitente($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collMensajesRelatedById_usuario_remitente || null !== $criteria) {
			if ($this->isNew() && null === $this->collMensajesRelatedById_usuario_remitente) {
				// return empty collection
				$this->initMensajesRelatedById_usuario_remitente();
			} else {
				$collMensajesRelatedById_usuario_remitente = MensajeQuery::create(null, $criteria)
					->filterByUsuarioRelatedById_usuario_remitente($this)
					->find($con);
				if (null !== $criteria) {
					return $collMensajesRelatedById_usuario_remitente;
				}
				$this->collMensajesRelatedById_usuario_remitente = $collMensajesRelatedById_usuario_remitente;
			}
		}
		return $this->collMensajesRelatedById_usuario_remitente;
	}

	/**
	 * Sets a collection of MensajeRelatedById_usuario_remitente objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $mensajesRelatedById_usuario_remitente A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setMensajesRelatedById_usuario_remitente(PropelCollection $mensajesRelatedById_usuario_remitente, PropelPDO $con = null)
	{
		$this->mensajesRelatedById_usuario_remitenteScheduledForDeletion = $this->getMensajesRelatedById_usuario_remitente(new Criteria(), $con)->diff($mensajesRelatedById_usuario_remitente);

		foreach ($mensajesRelatedById_usuario_remitente as $mensajeRelatedById_usuario_remitente) {
			// Fix issue with collection modified by reference
			if ($mensajeRelatedById_usuario_remitente->isNew()) {
				$mensajeRelatedById_usuario_remitente->setUsuarioRelatedById_usuario_remitente($this);
			}
			$this->addMensajeRelatedById_usuario_remitente($mensajeRelatedById_usuario_remitente);
		}

		$this->collMensajesRelatedById_usuario_remitente = $mensajesRelatedById_usuario_remitente;
	}

	/**
	 * Returns the number of related Mensaje objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Mensaje objects.
	 * @throws     PropelException
	 */
	public function countMensajesRelatedById_usuario_remitente(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collMensajesRelatedById_usuario_remitente || null !== $criteria) {
			if ($this->isNew() && null === $this->collMensajesRelatedById_usuario_remitente) {
				return 0;
			} else {
				$query = MensajeQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuarioRelatedById_usuario_remitente($this)
					->count($con);
			}
		} else {
			return count($this->collMensajesRelatedById_usuario_remitente);
		}
	}

	/**
	 * Method called to associate a Mensaje object to this object
	 * through the Mensaje foreign key attribute.
	 *
	 * @param      Mensaje $l Mensaje
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addMensajeRelatedById_usuario_remitente(Mensaje $l)
	{
		if ($this->collMensajesRelatedById_usuario_remitente === null) {
			$this->initMensajesRelatedById_usuario_remitente();
		}
		if (!$this->collMensajesRelatedById_usuario_remitente->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddMensajeRelatedById_usuario_remitente($l);
		}

		return $this;
	}

	/**
	 * @param	MensajeRelatedById_usuario_remitente $mensajeRelatedById_usuario_remitente The mensajeRelatedById_usuario_remitente object to add.
	 */
	protected function doAddMensajeRelatedById_usuario_remitente($mensajeRelatedById_usuario_remitente)
	{
		$this->collMensajesRelatedById_usuario_remitente[]= $mensajeRelatedById_usuario_remitente;
		$mensajeRelatedById_usuario_remitente->setUsuarioRelatedById_usuario_remitente($this);
	}

	/**
	 * Clears out the collNotificacionsRelatedById_emisor collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNotificacionsRelatedById_emisor()
	 */
	public function clearNotificacionsRelatedById_emisor()
	{
		$this->collNotificacionsRelatedById_emisor = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNotificacionsRelatedById_emisor collection.
	 *
	 * By default this just sets the collNotificacionsRelatedById_emisor collection to an empty array (like clearcollNotificacionsRelatedById_emisor());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNotificacionsRelatedById_emisor($overrideExisting = true)
	{
		if (null !== $this->collNotificacionsRelatedById_emisor && !$overrideExisting) {
			return;
		}
		$this->collNotificacionsRelatedById_emisor = new PropelObjectCollection();
		$this->collNotificacionsRelatedById_emisor->setModel('Notificacion');
	}

	/**
	 * Gets an array of Notificacion objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Notificacion[] List of Notificacion objects
	 * @throws     PropelException
	 */
	public function getNotificacionsRelatedById_emisor($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNotificacionsRelatedById_emisor || null !== $criteria) {
			if ($this->isNew() && null === $this->collNotificacionsRelatedById_emisor) {
				// return empty collection
				$this->initNotificacionsRelatedById_emisor();
			} else {
				$collNotificacionsRelatedById_emisor = NotificacionQuery::create(null, $criteria)
					->filterByUsuarioRelatedById_emisor($this)
					->find($con);
				if (null !== $criteria) {
					return $collNotificacionsRelatedById_emisor;
				}
				$this->collNotificacionsRelatedById_emisor = $collNotificacionsRelatedById_emisor;
			}
		}
		return $this->collNotificacionsRelatedById_emisor;
	}

	/**
	 * Sets a collection of NotificacionRelatedById_emisor objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $notificacionsRelatedById_emisor A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNotificacionsRelatedById_emisor(PropelCollection $notificacionsRelatedById_emisor, PropelPDO $con = null)
	{
		$this->notificacionsRelatedById_emisorScheduledForDeletion = $this->getNotificacionsRelatedById_emisor(new Criteria(), $con)->diff($notificacionsRelatedById_emisor);

		foreach ($notificacionsRelatedById_emisor as $notificacionRelatedById_emisor) {
			// Fix issue with collection modified by reference
			if ($notificacionRelatedById_emisor->isNew()) {
				$notificacionRelatedById_emisor->setUsuarioRelatedById_emisor($this);
			}
			$this->addNotificacionRelatedById_emisor($notificacionRelatedById_emisor);
		}

		$this->collNotificacionsRelatedById_emisor = $notificacionsRelatedById_emisor;
	}

	/**
	 * Returns the number of related Notificacion objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Notificacion objects.
	 * @throws     PropelException
	 */
	public function countNotificacionsRelatedById_emisor(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNotificacionsRelatedById_emisor || null !== $criteria) {
			if ($this->isNew() && null === $this->collNotificacionsRelatedById_emisor) {
				return 0;
			} else {
				$query = NotificacionQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuarioRelatedById_emisor($this)
					->count($con);
			}
		} else {
			return count($this->collNotificacionsRelatedById_emisor);
		}
	}

	/**
	 * Method called to associate a Notificacion object to this object
	 * through the Notificacion foreign key attribute.
	 *
	 * @param      Notificacion $l Notificacion
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addNotificacionRelatedById_emisor(Notificacion $l)
	{
		if ($this->collNotificacionsRelatedById_emisor === null) {
			$this->initNotificacionsRelatedById_emisor();
		}
		if (!$this->collNotificacionsRelatedById_emisor->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNotificacionRelatedById_emisor($l);
		}

		return $this;
	}

	/**
	 * @param	NotificacionRelatedById_emisor $notificacionRelatedById_emisor The notificacionRelatedById_emisor object to add.
	 */
	protected function doAddNotificacionRelatedById_emisor($notificacionRelatedById_emisor)
	{
		$this->collNotificacionsRelatedById_emisor[]= $notificacionRelatedById_emisor;
		$notificacionRelatedById_emisor->setUsuarioRelatedById_emisor($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related NotificacionsRelatedById_emisor from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Notificacion[] List of Notificacion objects
	 */
	public function getNotificacionsRelatedById_emisorJoinTipo_notificacion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NotificacionQuery::create(null, $criteria);
		$query->joinWith('Tipo_notificacion', $join_behavior);

		return $this->getNotificacionsRelatedById_emisor($query, $con);
	}

	/**
	 * Clears out the collNotificacionsRelatedById_receptor collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNotificacionsRelatedById_receptor()
	 */
	public function clearNotificacionsRelatedById_receptor()
	{
		$this->collNotificacionsRelatedById_receptor = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNotificacionsRelatedById_receptor collection.
	 *
	 * By default this just sets the collNotificacionsRelatedById_receptor collection to an empty array (like clearcollNotificacionsRelatedById_receptor());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNotificacionsRelatedById_receptor($overrideExisting = true)
	{
		if (null !== $this->collNotificacionsRelatedById_receptor && !$overrideExisting) {
			return;
		}
		$this->collNotificacionsRelatedById_receptor = new PropelObjectCollection();
		$this->collNotificacionsRelatedById_receptor->setModel('Notificacion');
	}

	/**
	 * Gets an array of Notificacion objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Notificacion[] List of Notificacion objects
	 * @throws     PropelException
	 */
	public function getNotificacionsRelatedById_receptor($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNotificacionsRelatedById_receptor || null !== $criteria) {
			if ($this->isNew() && null === $this->collNotificacionsRelatedById_receptor) {
				// return empty collection
				$this->initNotificacionsRelatedById_receptor();
			} else {
				$collNotificacionsRelatedById_receptor = NotificacionQuery::create(null, $criteria)
					->filterByUsuarioRelatedById_receptor($this)
					->find($con);
				if (null !== $criteria) {
					return $collNotificacionsRelatedById_receptor;
				}
				$this->collNotificacionsRelatedById_receptor = $collNotificacionsRelatedById_receptor;
			}
		}
		return $this->collNotificacionsRelatedById_receptor;
	}

	/**
	 * Sets a collection of NotificacionRelatedById_receptor objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $notificacionsRelatedById_receptor A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNotificacionsRelatedById_receptor(PropelCollection $notificacionsRelatedById_receptor, PropelPDO $con = null)
	{
		$this->notificacionsRelatedById_receptorScheduledForDeletion = $this->getNotificacionsRelatedById_receptor(new Criteria(), $con)->diff($notificacionsRelatedById_receptor);

		foreach ($notificacionsRelatedById_receptor as $notificacionRelatedById_receptor) {
			// Fix issue with collection modified by reference
			if ($notificacionRelatedById_receptor->isNew()) {
				$notificacionRelatedById_receptor->setUsuarioRelatedById_receptor($this);
			}
			$this->addNotificacionRelatedById_receptor($notificacionRelatedById_receptor);
		}

		$this->collNotificacionsRelatedById_receptor = $notificacionsRelatedById_receptor;
	}

	/**
	 * Returns the number of related Notificacion objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Notificacion objects.
	 * @throws     PropelException
	 */
	public function countNotificacionsRelatedById_receptor(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNotificacionsRelatedById_receptor || null !== $criteria) {
			if ($this->isNew() && null === $this->collNotificacionsRelatedById_receptor) {
				return 0;
			} else {
				$query = NotificacionQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuarioRelatedById_receptor($this)
					->count($con);
			}
		} else {
			return count($this->collNotificacionsRelatedById_receptor);
		}
	}

	/**
	 * Method called to associate a Notificacion object to this object
	 * through the Notificacion foreign key attribute.
	 *
	 * @param      Notificacion $l Notificacion
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addNotificacionRelatedById_receptor(Notificacion $l)
	{
		if ($this->collNotificacionsRelatedById_receptor === null) {
			$this->initNotificacionsRelatedById_receptor();
		}
		if (!$this->collNotificacionsRelatedById_receptor->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNotificacionRelatedById_receptor($l);
		}

		return $this;
	}

	/**
	 * @param	NotificacionRelatedById_receptor $notificacionRelatedById_receptor The notificacionRelatedById_receptor object to add.
	 */
	protected function doAddNotificacionRelatedById_receptor($notificacionRelatedById_receptor)
	{
		$this->collNotificacionsRelatedById_receptor[]= $notificacionRelatedById_receptor;
		$notificacionRelatedById_receptor->setUsuarioRelatedById_receptor($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related NotificacionsRelatedById_receptor from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Notificacion[] List of Notificacion objects
	 */
	public function getNotificacionsRelatedById_receptorJoinTipo_notificacion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NotificacionQuery::create(null, $criteria);
		$query->joinWith('Tipo_notificacion', $join_behavior);

		return $this->getNotificacionsRelatedById_receptor($query, $con);
	}

	/**
	 * Clears out the collSolicitudsRelatedById_usuario_solicitado collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSolicitudsRelatedById_usuario_solicitado()
	 */
	public function clearSolicitudsRelatedById_usuario_solicitado()
	{
		$this->collSolicitudsRelatedById_usuario_solicitado = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSolicitudsRelatedById_usuario_solicitado collection.
	 *
	 * By default this just sets the collSolicitudsRelatedById_usuario_solicitado collection to an empty array (like clearcollSolicitudsRelatedById_usuario_solicitado());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initSolicitudsRelatedById_usuario_solicitado($overrideExisting = true)
	{
		if (null !== $this->collSolicitudsRelatedById_usuario_solicitado && !$overrideExisting) {
			return;
		}
		$this->collSolicitudsRelatedById_usuario_solicitado = new PropelObjectCollection();
		$this->collSolicitudsRelatedById_usuario_solicitado->setModel('Solicitud');
	}

	/**
	 * Gets an array of Solicitud objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Solicitud[] List of Solicitud objects
	 * @throws     PropelException
	 */
	public function getSolicitudsRelatedById_usuario_solicitado($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSolicitudsRelatedById_usuario_solicitado || null !== $criteria) {
			if ($this->isNew() && null === $this->collSolicitudsRelatedById_usuario_solicitado) {
				// return empty collection
				$this->initSolicitudsRelatedById_usuario_solicitado();
			} else {
				$collSolicitudsRelatedById_usuario_solicitado = SolicitudQuery::create(null, $criteria)
					->filterByUsuarioRelatedById_usuario_solicitado($this)
					->find($con);
				if (null !== $criteria) {
					return $collSolicitudsRelatedById_usuario_solicitado;
				}
				$this->collSolicitudsRelatedById_usuario_solicitado = $collSolicitudsRelatedById_usuario_solicitado;
			}
		}
		return $this->collSolicitudsRelatedById_usuario_solicitado;
	}

	/**
	 * Sets a collection of SolicitudRelatedById_usuario_solicitado objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $solicitudsRelatedById_usuario_solicitado A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setSolicitudsRelatedById_usuario_solicitado(PropelCollection $solicitudsRelatedById_usuario_solicitado, PropelPDO $con = null)
	{
		$this->solicitudsRelatedById_usuario_solicitadoScheduledForDeletion = $this->getSolicitudsRelatedById_usuario_solicitado(new Criteria(), $con)->diff($solicitudsRelatedById_usuario_solicitado);

		foreach ($solicitudsRelatedById_usuario_solicitado as $solicitudRelatedById_usuario_solicitado) {
			// Fix issue with collection modified by reference
			if ($solicitudRelatedById_usuario_solicitado->isNew()) {
				$solicitudRelatedById_usuario_solicitado->setUsuarioRelatedById_usuario_solicitado($this);
			}
			$this->addSolicitudRelatedById_usuario_solicitado($solicitudRelatedById_usuario_solicitado);
		}

		$this->collSolicitudsRelatedById_usuario_solicitado = $solicitudsRelatedById_usuario_solicitado;
	}

	/**
	 * Returns the number of related Solicitud objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Solicitud objects.
	 * @throws     PropelException
	 */
	public function countSolicitudsRelatedById_usuario_solicitado(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSolicitudsRelatedById_usuario_solicitado || null !== $criteria) {
			if ($this->isNew() && null === $this->collSolicitudsRelatedById_usuario_solicitado) {
				return 0;
			} else {
				$query = SolicitudQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuarioRelatedById_usuario_solicitado($this)
					->count($con);
			}
		} else {
			return count($this->collSolicitudsRelatedById_usuario_solicitado);
		}
	}

	/**
	 * Method called to associate a Solicitud object to this object
	 * through the Solicitud foreign key attribute.
	 *
	 * @param      Solicitud $l Solicitud
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addSolicitudRelatedById_usuario_solicitado(Solicitud $l)
	{
		if ($this->collSolicitudsRelatedById_usuario_solicitado === null) {
			$this->initSolicitudsRelatedById_usuario_solicitado();
		}
		if (!$this->collSolicitudsRelatedById_usuario_solicitado->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddSolicitudRelatedById_usuario_solicitado($l);
		}

		return $this;
	}

	/**
	 * @param	SolicitudRelatedById_usuario_solicitado $solicitudRelatedById_usuario_solicitado The solicitudRelatedById_usuario_solicitado object to add.
	 */
	protected function doAddSolicitudRelatedById_usuario_solicitado($solicitudRelatedById_usuario_solicitado)
	{
		$this->collSolicitudsRelatedById_usuario_solicitado[]= $solicitudRelatedById_usuario_solicitado;
		$solicitudRelatedById_usuario_solicitado->setUsuarioRelatedById_usuario_solicitado($this);
	}

	/**
	 * Clears out the collSolicitudsRelatedById_usuario_solicitante collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSolicitudsRelatedById_usuario_solicitante()
	 */
	public function clearSolicitudsRelatedById_usuario_solicitante()
	{
		$this->collSolicitudsRelatedById_usuario_solicitante = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSolicitudsRelatedById_usuario_solicitante collection.
	 *
	 * By default this just sets the collSolicitudsRelatedById_usuario_solicitante collection to an empty array (like clearcollSolicitudsRelatedById_usuario_solicitante());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initSolicitudsRelatedById_usuario_solicitante($overrideExisting = true)
	{
		if (null !== $this->collSolicitudsRelatedById_usuario_solicitante && !$overrideExisting) {
			return;
		}
		$this->collSolicitudsRelatedById_usuario_solicitante = new PropelObjectCollection();
		$this->collSolicitudsRelatedById_usuario_solicitante->setModel('Solicitud');
	}

	/**
	 * Gets an array of Solicitud objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Solicitud[] List of Solicitud objects
	 * @throws     PropelException
	 */
	public function getSolicitudsRelatedById_usuario_solicitante($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSolicitudsRelatedById_usuario_solicitante || null !== $criteria) {
			if ($this->isNew() && null === $this->collSolicitudsRelatedById_usuario_solicitante) {
				// return empty collection
				$this->initSolicitudsRelatedById_usuario_solicitante();
			} else {
				$collSolicitudsRelatedById_usuario_solicitante = SolicitudQuery::create(null, $criteria)
					->filterByUsuarioRelatedById_usuario_solicitante($this)
					->find($con);
				if (null !== $criteria) {
					return $collSolicitudsRelatedById_usuario_solicitante;
				}
				$this->collSolicitudsRelatedById_usuario_solicitante = $collSolicitudsRelatedById_usuario_solicitante;
			}
		}
		return $this->collSolicitudsRelatedById_usuario_solicitante;
	}

	/**
	 * Sets a collection of SolicitudRelatedById_usuario_solicitante objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $solicitudsRelatedById_usuario_solicitante A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setSolicitudsRelatedById_usuario_solicitante(PropelCollection $solicitudsRelatedById_usuario_solicitante, PropelPDO $con = null)
	{
		$this->solicitudsRelatedById_usuario_solicitanteScheduledForDeletion = $this->getSolicitudsRelatedById_usuario_solicitante(new Criteria(), $con)->diff($solicitudsRelatedById_usuario_solicitante);

		foreach ($solicitudsRelatedById_usuario_solicitante as $solicitudRelatedById_usuario_solicitante) {
			// Fix issue with collection modified by reference
			if ($solicitudRelatedById_usuario_solicitante->isNew()) {
				$solicitudRelatedById_usuario_solicitante->setUsuarioRelatedById_usuario_solicitante($this);
			}
			$this->addSolicitudRelatedById_usuario_solicitante($solicitudRelatedById_usuario_solicitante);
		}

		$this->collSolicitudsRelatedById_usuario_solicitante = $solicitudsRelatedById_usuario_solicitante;
	}

	/**
	 * Returns the number of related Solicitud objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Solicitud objects.
	 * @throws     PropelException
	 */
	public function countSolicitudsRelatedById_usuario_solicitante(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSolicitudsRelatedById_usuario_solicitante || null !== $criteria) {
			if ($this->isNew() && null === $this->collSolicitudsRelatedById_usuario_solicitante) {
				return 0;
			} else {
				$query = SolicitudQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuarioRelatedById_usuario_solicitante($this)
					->count($con);
			}
		} else {
			return count($this->collSolicitudsRelatedById_usuario_solicitante);
		}
	}

	/**
	 * Method called to associate a Solicitud object to this object
	 * through the Solicitud foreign key attribute.
	 *
	 * @param      Solicitud $l Solicitud
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addSolicitudRelatedById_usuario_solicitante(Solicitud $l)
	{
		if ($this->collSolicitudsRelatedById_usuario_solicitante === null) {
			$this->initSolicitudsRelatedById_usuario_solicitante();
		}
		if (!$this->collSolicitudsRelatedById_usuario_solicitante->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddSolicitudRelatedById_usuario_solicitante($l);
		}

		return $this;
	}

	/**
	 * @param	SolicitudRelatedById_usuario_solicitante $solicitudRelatedById_usuario_solicitante The solicitudRelatedById_usuario_solicitante object to add.
	 */
	protected function doAddSolicitudRelatedById_usuario_solicitante($solicitudRelatedById_usuario_solicitante)
	{
		$this->collSolicitudsRelatedById_usuario_solicitante[]= $solicitudRelatedById_usuario_solicitante;
		$solicitudRelatedById_usuario_solicitante->setUsuarioRelatedById_usuario_solicitante($this);
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
	 * If this Usuario is new, it will return
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
					->filterByUsuario($this)
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
				$postulantes->setUsuario($this);
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
					->filterByUsuario($this)
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
	 * @return     Usuario The current object (for fluent API support)
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
		$postulantes->setUsuario($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related Postulantess from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Postulantes[] List of Postulantes objects
	 */
	public function getPostulantessJoinLibro($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PostulantesQuery::create(null, $criteria);
		$query->joinWith('Libro', $join_behavior);

		return $this->getPostulantess($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->nick = null;
		$this->nombre = null;
		$this->mail = null;
		$this->password = null;
		$this->admin = null;
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
			if ($this->collAmistadsRelatedById_usuario) {
				foreach ($this->collAmistadsRelatedById_usuario as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAmistadsRelatedByid_usuarioamigo) {
				foreach ($this->collAmistadsRelatedByid_usuarioamigo as $o) {
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
			if ($this->collLibrosRelatedByUsuario_ult_acc) {
				foreach ($this->collLibrosRelatedByUsuario_ult_acc as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLibrosRelatedById_usuario) {
				foreach ($this->collLibrosRelatedById_usuario as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collListas) {
				foreach ($this->collListas as $o) {
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
			if ($this->collMensajesRelatedById_usuario_destinatario) {
				foreach ($this->collMensajesRelatedById_usuario_destinatario as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collMensajesRelatedById_usuario_remitente) {
				foreach ($this->collMensajesRelatedById_usuario_remitente as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNotificacionsRelatedById_emisor) {
				foreach ($this->collNotificacionsRelatedById_emisor as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNotificacionsRelatedById_receptor) {
				foreach ($this->collNotificacionsRelatedById_receptor as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSolicitudsRelatedById_usuario_solicitado) {
				foreach ($this->collSolicitudsRelatedById_usuario_solicitado as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSolicitudsRelatedById_usuario_solicitante) {
				foreach ($this->collSolicitudsRelatedById_usuario_solicitante as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPostulantess) {
				foreach ($this->collPostulantess as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collAmistadsRelatedById_usuario instanceof PropelCollection) {
			$this->collAmistadsRelatedById_usuario->clearIterator();
		}
		$this->collAmistadsRelatedById_usuario = null;
		if ($this->collAmistadsRelatedByid_usuarioamigo instanceof PropelCollection) {
			$this->collAmistadsRelatedByid_usuarioamigo->clearIterator();
		}
		$this->collAmistadsRelatedByid_usuarioamigo = null;
		if ($this->collCalificacions instanceof PropelCollection) {
			$this->collCalificacions->clearIterator();
		}
		$this->collCalificacions = null;
		if ($this->collComentarios instanceof PropelCollection) {
			$this->collComentarios->clearIterator();
		}
		$this->collComentarios = null;
		if ($this->collLibrosRelatedByUsuario_ult_acc instanceof PropelCollection) {
			$this->collLibrosRelatedByUsuario_ult_acc->clearIterator();
		}
		$this->collLibrosRelatedByUsuario_ult_acc = null;
		if ($this->collLibrosRelatedById_usuario instanceof PropelCollection) {
			$this->collLibrosRelatedById_usuario->clearIterator();
		}
		$this->collLibrosRelatedById_usuario = null;
		if ($this->collListas instanceof PropelCollection) {
			$this->collListas->clearIterator();
		}
		$this->collListas = null;
		if ($this->collLibro_colaboradors instanceof PropelCollection) {
			$this->collLibro_colaboradors->clearIterator();
		}
		$this->collLibro_colaboradors = null;
		if ($this->collLibro_versions instanceof PropelCollection) {
			$this->collLibro_versions->clearIterator();
		}
		$this->collLibro_versions = null;
		if ($this->collMensajesRelatedById_usuario_destinatario instanceof PropelCollection) {
			$this->collMensajesRelatedById_usuario_destinatario->clearIterator();
		}
		$this->collMensajesRelatedById_usuario_destinatario = null;
		if ($this->collMensajesRelatedById_usuario_remitente instanceof PropelCollection) {
			$this->collMensajesRelatedById_usuario_remitente->clearIterator();
		}
		$this->collMensajesRelatedById_usuario_remitente = null;
		if ($this->collNotificacionsRelatedById_emisor instanceof PropelCollection) {
			$this->collNotificacionsRelatedById_emisor->clearIterator();
		}
		$this->collNotificacionsRelatedById_emisor = null;
		if ($this->collNotificacionsRelatedById_receptor instanceof PropelCollection) {
			$this->collNotificacionsRelatedById_receptor->clearIterator();
		}
		$this->collNotificacionsRelatedById_receptor = null;
		if ($this->collSolicitudsRelatedById_usuario_solicitado instanceof PropelCollection) {
			$this->collSolicitudsRelatedById_usuario_solicitado->clearIterator();
		}
		$this->collSolicitudsRelatedById_usuario_solicitado = null;
		if ($this->collSolicitudsRelatedById_usuario_solicitante instanceof PropelCollection) {
			$this->collSolicitudsRelatedById_usuario_solicitante->clearIterator();
		}
		$this->collSolicitudsRelatedById_usuario_solicitante = null;
		if ($this->collPostulantess instanceof PropelCollection) {
			$this->collPostulantess->clearIterator();
		}
		$this->collPostulantess = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(UsuarioPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseUsuario
