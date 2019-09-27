<?php

namespace Appdb\Base;

use \DateTime;
use \Exception;
use Appdb\Foto as ChildFoto;
use Appdb\FotoQuery as ChildFotoQuery;
use Appdb\Geotag as ChildGeotag;
use Appdb\GeotagQuery as ChildGeotagQuery;
use Appdb\Pengguna as ChildPengguna;
use Appdb\PenggunaQuery as ChildPenggunaQuery;
use Appdb\Sekolah as ChildSekolah;
use Appdb\SekolahQuery as ChildSekolahQuery;
use Appdb\Map\FotoTableMap;
use Appdb\Map\GeotagTableMap;
use Appdb\Map\PenggunaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'pengguna' table.
 *
 *
 *
 * @package    propel.generator.Appdb.Base
 */
abstract class Pengguna implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Appdb\\Map\\PenggunaTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the pengguna_id field.
     *
     * @var        string
     */
    protected $pengguna_id;

    /**
     * The value for the sekolah_id field.
     *
     * @var        string
     */
    protected $sekolah_id;

    /**
     * The value for the username field.
     *
     * @var        string
     */
    protected $username;

    /**
     * The value for the password field.
     *
     * @var        string
     */
    protected $password;

    /**
     * The value for the nama field.
     *
     * @var        string
     */
    protected $nama;

    /**
     * The value for the nip_nim field.
     *
     * @var        string
     */
    protected $nip_nim;

    /**
     * The value for the jabatan_lembaga field.
     *
     * @var        string
     */
    protected $jabatan_lembaga;

    /**
     * The value for the ym field.
     *
     * @var        string
     */
    protected $ym;

    /**
     * The value for the skype field.
     *
     * @var        string
     */
    protected $skype;

    /**
     * The value for the alamat field.
     *
     * @var        string
     */
    protected $alamat;

    /**
     * The value for the kode_wilayah field.
     *
     * @var        string
     */
    protected $kode_wilayah;

    /**
     * The value for the no_telepon field.
     *
     * @var        string
     */
    protected $no_telepon;

    /**
     * The value for the no_hp field.
     *
     * @var        string
     */
    protected $no_hp;

    /**
     * The value for the aktif field.
     *
     * @var        string
     */
    protected $aktif;

    /**
     * The value for the ptk_id field.
     *
     * @var        string
     */
    protected $ptk_id;

    /**
     * The value for the peran_id field.
     *
     * @var        int
     */
    protected $peran_id;

    /**
     * The value for the lembaga_id field.
     *
     * @var        string
     */
    protected $lembaga_id;

    /**
     * The value for the yayasan_id field.
     *
     * @var        string
     */
    protected $yayasan_id;

    /**
     * The value for the la_id field.
     *
     * @var        string
     */
    protected $la_id;

    /**
     * The value for the dudi_id field.
     *
     * @var        string
     */
    protected $dudi_id;

    /**
     * The value for the create_date field.
     *
     * @var        DateTime
     */
    protected $create_date;

    /**
     * The value for the roles field.
     *
     * @var        string
     */
    protected $roles;

    /**
     * The value for the last_update field.
     *
     * @var        DateTime
     */
    protected $last_update;

    /**
     * The value for the soft_delete field.
     *
     * @var        string
     */
    protected $soft_delete;

    /**
     * The value for the last_sync field.
     *
     * @var        DateTime
     */
    protected $last_sync;

    /**
     * The value for the updater_id field.
     *
     * @var        string
     */
    protected $updater_id;

    /**
     * @var        ChildSekolah
     */
    protected $aSekolah;

    /**
     * @var        ObjectCollection|ChildFoto[] Collection to store aggregation of ChildFoto objects.
     */
    protected $collFotos;
    protected $collFotosPartial;

    /**
     * @var        ObjectCollection|ChildGeotag[] Collection to store aggregation of ChildGeotag objects.
     */
    protected $collGeotags;
    protected $collGeotagsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildFoto[]
     */
    protected $fotosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildGeotag[]
     */
    protected $geotagsScheduledForDeletion = null;

    /**
     * Initializes internal state of Appdb\Base\Pengguna object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Pengguna</code> instance.  If
     * <code>obj</code> is an instance of <code>Pengguna</code>, delegates to
     * <code>equals(Pengguna)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Pengguna The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [pengguna_id] column value.
     *
     * @return string
     */
    public function getPenggunaId()
    {
        return $this->pengguna_id;
    }

    /**
     * Get the [sekolah_id] column value.
     *
     * @return string
     */
    public function getSekolahId()
    {
        return $this->sekolah_id;
    }

    /**
     * Get the [username] column value.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the [nama] column value.
     *
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * Get the [nip_nim] column value.
     *
     * @return string
     */
    public function getNipNim()
    {
        return $this->nip_nim;
    }

    /**
     * Get the [jabatan_lembaga] column value.
     *
     * @return string
     */
    public function getJabatanLembaga()
    {
        return $this->jabatan_lembaga;
    }

    /**
     * Get the [ym] column value.
     *
     * @return string
     */
    public function getYm()
    {
        return $this->ym;
    }

    /**
     * Get the [skype] column value.
     *
     * @return string
     */
    public function getSkype()
    {
        return $this->skype;
    }

    /**
     * Get the [alamat] column value.
     *
     * @return string
     */
    public function getAlamat()
    {
        return $this->alamat;
    }

    /**
     * Get the [kode_wilayah] column value.
     *
     * @return string
     */
    public function getKodeWilayah()
    {
        return $this->kode_wilayah;
    }

    /**
     * Get the [no_telepon] column value.
     *
     * @return string
     */
    public function getNoTelepon()
    {
        return $this->no_telepon;
    }

    /**
     * Get the [no_hp] column value.
     *
     * @return string
     */
    public function getNoHp()
    {
        return $this->no_hp;
    }

    /**
     * Get the [aktif] column value.
     *
     * @return string
     */
    public function getAktif()
    {
        return $this->aktif;
    }

    /**
     * Get the [ptk_id] column value.
     *
     * @return string
     */
    public function getPtkId()
    {
        return $this->ptk_id;
    }

    /**
     * Get the [peran_id] column value.
     *
     * @return int
     */
    public function getPeranId()
    {
        return $this->peran_id;
    }

    /**
     * Get the [lembaga_id] column value.
     *
     * @return string
     */
    public function getLembagaId()
    {
        return $this->lembaga_id;
    }

    /**
     * Get the [yayasan_id] column value.
     *
     * @return string
     */
    public function getYayasanId()
    {
        return $this->yayasan_id;
    }

    /**
     * Get the [la_id] column value.
     *
     * @return string
     */
    public function getLaId()
    {
        return $this->la_id;
    }

    /**
     * Get the [dudi_id] column value.
     *
     * @return string
     */
    public function getDudiId()
    {
        return $this->dudi_id;
    }

    /**
     * Get the [optionally formatted] temporal [create_date] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreateDate($format = NULL)
    {
        if ($format === null) {
            return $this->create_date;
        } else {
            return $this->create_date instanceof \DateTimeInterface ? $this->create_date->format($format) : null;
        }
    }

    /**
     * Get the [roles] column value.
     *
     * @return string
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Get the [optionally formatted] temporal [last_update] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastUpdate($format = NULL)
    {
        if ($format === null) {
            return $this->last_update;
        } else {
            return $this->last_update instanceof \DateTimeInterface ? $this->last_update->format($format) : null;
        }
    }

    /**
     * Get the [soft_delete] column value.
     *
     * @return string
     */
    public function getSoftDelete()
    {
        return $this->soft_delete;
    }

    /**
     * Get the [optionally formatted] temporal [last_sync] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastSync($format = NULL)
    {
        if ($format === null) {
            return $this->last_sync;
        } else {
            return $this->last_sync instanceof \DateTimeInterface ? $this->last_sync->format($format) : null;
        }
    }

    /**
     * Get the [updater_id] column value.
     *
     * @return string
     */
    public function getUpdaterId()
    {
        return $this->updater_id;
    }

    /**
     * Set the value of [pengguna_id] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setPenggunaId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pengguna_id !== $v) {
            $this->pengguna_id = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_PENGGUNA_ID] = true;
        }

        return $this;
    } // setPenggunaId()

    /**
     * Set the value of [sekolah_id] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_SEKOLAH_ID] = true;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }

        return $this;
    } // setSekolahId()

    /**
     * Set the value of [username] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setUsername($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->username !== $v) {
            $this->username = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_USERNAME] = true;
        }

        return $this;
    } // setUsername()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_PASSWORD] = true;
        }

        return $this;
    } // setPassword()

    /**
     * Set the value of [nama] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_NAMA] = true;
        }

        return $this;
    } // setNama()

    /**
     * Set the value of [nip_nim] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setNipNim($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nip_nim !== $v) {
            $this->nip_nim = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_NIP_NIM] = true;
        }

        return $this;
    } // setNipNim()

    /**
     * Set the value of [jabatan_lembaga] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setJabatanLembaga($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->jabatan_lembaga !== $v) {
            $this->jabatan_lembaga = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_JABATAN_LEMBAGA] = true;
        }

        return $this;
    } // setJabatanLembaga()

    /**
     * Set the value of [ym] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setYm($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ym !== $v) {
            $this->ym = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_YM] = true;
        }

        return $this;
    } // setYm()

    /**
     * Set the value of [skype] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setSkype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->skype !== $v) {
            $this->skype = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_SKYPE] = true;
        }

        return $this;
    } // setSkype()

    /**
     * Set the value of [alamat] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setAlamat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->alamat !== $v) {
            $this->alamat = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_ALAMAT] = true;
        }

        return $this;
    } // setAlamat()

    /**
     * Set the value of [kode_wilayah] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setKodeWilayah($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->kode_wilayah !== $v) {
            $this->kode_wilayah = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_KODE_WILAYAH] = true;
        }

        return $this;
    } // setKodeWilayah()

    /**
     * Set the value of [no_telepon] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setNoTelepon($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->no_telepon !== $v) {
            $this->no_telepon = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_NO_TELEPON] = true;
        }

        return $this;
    } // setNoTelepon()

    /**
     * Set the value of [no_hp] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setNoHp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->no_hp !== $v) {
            $this->no_hp = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_NO_HP] = true;
        }

        return $this;
    } // setNoHp()

    /**
     * Set the value of [aktif] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setAktif($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->aktif !== $v) {
            $this->aktif = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_AKTIF] = true;
        }

        return $this;
    } // setAktif()

    /**
     * Set the value of [ptk_id] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setPtkId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ptk_id !== $v) {
            $this->ptk_id = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_PTK_ID] = true;
        }

        return $this;
    } // setPtkId()

    /**
     * Set the value of [peran_id] column.
     *
     * @param int $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setPeranId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->peran_id !== $v) {
            $this->peran_id = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_PERAN_ID] = true;
        }

        return $this;
    } // setPeranId()

    /**
     * Set the value of [lembaga_id] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setLembagaId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lembaga_id !== $v) {
            $this->lembaga_id = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_LEMBAGA_ID] = true;
        }

        return $this;
    } // setLembagaId()

    /**
     * Set the value of [yayasan_id] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setYayasanId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->yayasan_id !== $v) {
            $this->yayasan_id = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_YAYASAN_ID] = true;
        }

        return $this;
    } // setYayasanId()

    /**
     * Set the value of [la_id] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setLaId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->la_id !== $v) {
            $this->la_id = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_LA_ID] = true;
        }

        return $this;
    } // setLaId()

    /**
     * Set the value of [dudi_id] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setDudiId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dudi_id !== $v) {
            $this->dudi_id = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_DUDI_ID] = true;
        }

        return $this;
    } // setDudiId()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            if ($this->create_date === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->create_date->format("Y-m-d H:i:s.u")) {
                $this->create_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PenggunaTableMap::COL_CREATE_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setCreateDate()

    /**
     * Set the value of [roles] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setRoles($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->roles !== $v) {
            $this->roles = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_ROLES] = true;
        }

        return $this;
    } // setRoles()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            if ($this->last_update === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->last_update->format("Y-m-d H:i:s.u")) {
                $this->last_update = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PenggunaTableMap::COL_LAST_UPDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_SOFT_DELETE] = true;
        }

        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setLastSync($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_sync !== null || $dt !== null) {
            if ($this->last_sync === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->last_sync->format("Y-m-d H:i:s.u")) {
                $this->last_sync = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PenggunaTableMap::COL_LAST_SYNC] = true;
            }
        } // if either are not null

        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[PenggunaTableMap::COL_UPDATER_ID] = true;
        }

        return $this;
    } // setUpdaterId()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
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
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PenggunaTableMap::translateFieldName('PenggunaId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pengguna_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PenggunaTableMap::translateFieldName('SekolahId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sekolah_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : PenggunaTableMap::translateFieldName('Username', TableMap::TYPE_PHPNAME, $indexType)];
            $this->username = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : PenggunaTableMap::translateFieldName('Password', TableMap::TYPE_PHPNAME, $indexType)];
            $this->password = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : PenggunaTableMap::translateFieldName('Nama', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nama = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : PenggunaTableMap::translateFieldName('NipNim', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nip_nim = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : PenggunaTableMap::translateFieldName('JabatanLembaga', TableMap::TYPE_PHPNAME, $indexType)];
            $this->jabatan_lembaga = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : PenggunaTableMap::translateFieldName('Ym', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ym = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : PenggunaTableMap::translateFieldName('Skype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->skype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : PenggunaTableMap::translateFieldName('Alamat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->alamat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : PenggunaTableMap::translateFieldName('KodeWilayah', TableMap::TYPE_PHPNAME, $indexType)];
            $this->kode_wilayah = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : PenggunaTableMap::translateFieldName('NoTelepon', TableMap::TYPE_PHPNAME, $indexType)];
            $this->no_telepon = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : PenggunaTableMap::translateFieldName('NoHp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->no_hp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : PenggunaTableMap::translateFieldName('Aktif', TableMap::TYPE_PHPNAME, $indexType)];
            $this->aktif = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : PenggunaTableMap::translateFieldName('PtkId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ptk_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : PenggunaTableMap::translateFieldName('PeranId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->peran_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : PenggunaTableMap::translateFieldName('LembagaId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lembaga_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : PenggunaTableMap::translateFieldName('YayasanId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->yayasan_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : PenggunaTableMap::translateFieldName('LaId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->la_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : PenggunaTableMap::translateFieldName('DudiId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dudi_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : PenggunaTableMap::translateFieldName('CreateDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->create_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : PenggunaTableMap::translateFieldName('Roles', TableMap::TYPE_PHPNAME, $indexType)];
            $this->roles = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : PenggunaTableMap::translateFieldName('LastUpdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->last_update = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : PenggunaTableMap::translateFieldName('SoftDelete', TableMap::TYPE_PHPNAME, $indexType)];
            $this->soft_delete = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : PenggunaTableMap::translateFieldName('LastSync', TableMap::TYPE_PHPNAME, $indexType)];
            $this->last_sync = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : PenggunaTableMap::translateFieldName('UpdaterId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->updater_id = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 26; // 26 = PenggunaTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Appdb\\Pengguna'), 0, $e);
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
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aSekolah !== null && $this->sekolah_id !== $this->aSekolah->getSekolahId()) {
            $this->aSekolah = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PenggunaTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildPenggunaQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSekolah = null;
            $this->collFotos = null;

            $this->collGeotags = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Pengguna::setDeleted()
     * @see Pengguna::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PenggunaTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildPenggunaQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PenggunaTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
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
                PenggunaTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aSekolah !== null) {
                if ($this->aSekolah->isModified() || $this->aSekolah->isNew()) {
                    $affectedRows += $this->aSekolah->save($con);
                }
                $this->setSekolah($this->aSekolah);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->fotosScheduledForDeletion !== null) {
                if (!$this->fotosScheduledForDeletion->isEmpty()) {
                    \Appdb\FotoQuery::create()
                        ->filterByPrimaryKeys($this->fotosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->fotosScheduledForDeletion = null;
                }
            }

            if ($this->collFotos !== null) {
                foreach ($this->collFotos as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->geotagsScheduledForDeletion !== null) {
                if (!$this->geotagsScheduledForDeletion->isEmpty()) {
                    \Appdb\GeotagQuery::create()
                        ->filterByPrimaryKeys($this->geotagsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->geotagsScheduledForDeletion = null;
                }
            }

            if ($this->collGeotags !== null) {
                foreach ($this->collGeotags as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
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
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $criteria = $this->buildCriteria();
        $pk = $criteria->doInsert($con);
        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PenggunaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getPenggunaId();
                break;
            case 1:
                return $this->getSekolahId();
                break;
            case 2:
                return $this->getUsername();
                break;
            case 3:
                return $this->getPassword();
                break;
            case 4:
                return $this->getNama();
                break;
            case 5:
                return $this->getNipNim();
                break;
            case 6:
                return $this->getJabatanLembaga();
                break;
            case 7:
                return $this->getYm();
                break;
            case 8:
                return $this->getSkype();
                break;
            case 9:
                return $this->getAlamat();
                break;
            case 10:
                return $this->getKodeWilayah();
                break;
            case 11:
                return $this->getNoTelepon();
                break;
            case 12:
                return $this->getNoHp();
                break;
            case 13:
                return $this->getAktif();
                break;
            case 14:
                return $this->getPtkId();
                break;
            case 15:
                return $this->getPeranId();
                break;
            case 16:
                return $this->getLembagaId();
                break;
            case 17:
                return $this->getYayasanId();
                break;
            case 18:
                return $this->getLaId();
                break;
            case 19:
                return $this->getDudiId();
                break;
            case 20:
                return $this->getCreateDate();
                break;
            case 21:
                return $this->getRoles();
                break;
            case 22:
                return $this->getLastUpdate();
                break;
            case 23:
                return $this->getSoftDelete();
                break;
            case 24:
                return $this->getLastSync();
                break;
            case 25:
                return $this->getUpdaterId();
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
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Pengguna'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Pengguna'][$this->hashCode()] = true;
        $keys = PenggunaTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPenggunaId(),
            $keys[1] => $this->getSekolahId(),
            $keys[2] => $this->getUsername(),
            $keys[3] => $this->getPassword(),
            $keys[4] => $this->getNama(),
            $keys[5] => $this->getNipNim(),
            $keys[6] => $this->getJabatanLembaga(),
            $keys[7] => $this->getYm(),
            $keys[8] => $this->getSkype(),
            $keys[9] => $this->getAlamat(),
            $keys[10] => $this->getKodeWilayah(),
            $keys[11] => $this->getNoTelepon(),
            $keys[12] => $this->getNoHp(),
            $keys[13] => $this->getAktif(),
            $keys[14] => $this->getPtkId(),
            $keys[15] => $this->getPeranId(),
            $keys[16] => $this->getLembagaId(),
            $keys[17] => $this->getYayasanId(),
            $keys[18] => $this->getLaId(),
            $keys[19] => $this->getDudiId(),
            $keys[20] => $this->getCreateDate(),
            $keys[21] => $this->getRoles(),
            $keys[22] => $this->getLastUpdate(),
            $keys[23] => $this->getSoftDelete(),
            $keys[24] => $this->getLastSync(),
            $keys[25] => $this->getUpdaterId(),
        );
        if ($result[$keys[20]] instanceof \DateTimeInterface) {
            $result[$keys[20]] = $result[$keys[20]]->format('c');
        }

        if ($result[$keys[22]] instanceof \DateTimeInterface) {
            $result[$keys[22]] = $result[$keys[22]]->format('c');
        }

        if ($result[$keys[24]] instanceof \DateTimeInterface) {
            $result[$keys[24]] = $result[$keys[24]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSekolah) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'sekolah';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'sekolah';
                        break;
                    default:
                        $key = 'Sekolah';
                }

                $result[$key] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collFotos) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'fotos';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'fotos';
                        break;
                    default:
                        $key = 'Fotos';
                }

                $result[$key] = $this->collFotos->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collGeotags) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'geotags';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'geotags';
                        break;
                    default:
                        $key = 'Geotags';
                }

                $result[$key] = $this->collGeotags->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Appdb\Pengguna
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PenggunaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Appdb\Pengguna
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setPenggunaId($value);
                break;
            case 1:
                $this->setSekolahId($value);
                break;
            case 2:
                $this->setUsername($value);
                break;
            case 3:
                $this->setPassword($value);
                break;
            case 4:
                $this->setNama($value);
                break;
            case 5:
                $this->setNipNim($value);
                break;
            case 6:
                $this->setJabatanLembaga($value);
                break;
            case 7:
                $this->setYm($value);
                break;
            case 8:
                $this->setSkype($value);
                break;
            case 9:
                $this->setAlamat($value);
                break;
            case 10:
                $this->setKodeWilayah($value);
                break;
            case 11:
                $this->setNoTelepon($value);
                break;
            case 12:
                $this->setNoHp($value);
                break;
            case 13:
                $this->setAktif($value);
                break;
            case 14:
                $this->setPtkId($value);
                break;
            case 15:
                $this->setPeranId($value);
                break;
            case 16:
                $this->setLembagaId($value);
                break;
            case 17:
                $this->setYayasanId($value);
                break;
            case 18:
                $this->setLaId($value);
                break;
            case 19:
                $this->setDudiId($value);
                break;
            case 20:
                $this->setCreateDate($value);
                break;
            case 21:
                $this->setRoles($value);
                break;
            case 22:
                $this->setLastUpdate($value);
                break;
            case 23:
                $this->setSoftDelete($value);
                break;
            case 24:
                $this->setLastSync($value);
                break;
            case 25:
                $this->setUpdaterId($value);
                break;
        } // switch()

        return $this;
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
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = PenggunaTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setPenggunaId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setSekolahId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setUsername($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPassword($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setNama($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setNipNim($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setJabatanLembaga($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setYm($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setSkype($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setAlamat($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setKodeWilayah($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setNoTelepon($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setNoHp($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setAktif($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setPtkId($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setPeranId($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setLembagaId($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setYayasanId($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setLaId($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setDudiId($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setCreateDate($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setRoles($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setLastUpdate($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setSoftDelete($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setLastSync($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setUpdaterId($arr[$keys[25]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Appdb\Pengguna The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PenggunaTableMap::DATABASE_NAME);

        if ($this->isColumnModified(PenggunaTableMap::COL_PENGGUNA_ID)) {
            $criteria->add(PenggunaTableMap::COL_PENGGUNA_ID, $this->pengguna_id);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_SEKOLAH_ID)) {
            $criteria->add(PenggunaTableMap::COL_SEKOLAH_ID, $this->sekolah_id);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_USERNAME)) {
            $criteria->add(PenggunaTableMap::COL_USERNAME, $this->username);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_PASSWORD)) {
            $criteria->add(PenggunaTableMap::COL_PASSWORD, $this->password);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_NAMA)) {
            $criteria->add(PenggunaTableMap::COL_NAMA, $this->nama);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_NIP_NIM)) {
            $criteria->add(PenggunaTableMap::COL_NIP_NIM, $this->nip_nim);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_JABATAN_LEMBAGA)) {
            $criteria->add(PenggunaTableMap::COL_JABATAN_LEMBAGA, $this->jabatan_lembaga);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_YM)) {
            $criteria->add(PenggunaTableMap::COL_YM, $this->ym);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_SKYPE)) {
            $criteria->add(PenggunaTableMap::COL_SKYPE, $this->skype);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_ALAMAT)) {
            $criteria->add(PenggunaTableMap::COL_ALAMAT, $this->alamat);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_KODE_WILAYAH)) {
            $criteria->add(PenggunaTableMap::COL_KODE_WILAYAH, $this->kode_wilayah);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_NO_TELEPON)) {
            $criteria->add(PenggunaTableMap::COL_NO_TELEPON, $this->no_telepon);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_NO_HP)) {
            $criteria->add(PenggunaTableMap::COL_NO_HP, $this->no_hp);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_AKTIF)) {
            $criteria->add(PenggunaTableMap::COL_AKTIF, $this->aktif);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_PTK_ID)) {
            $criteria->add(PenggunaTableMap::COL_PTK_ID, $this->ptk_id);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_PERAN_ID)) {
            $criteria->add(PenggunaTableMap::COL_PERAN_ID, $this->peran_id);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_LEMBAGA_ID)) {
            $criteria->add(PenggunaTableMap::COL_LEMBAGA_ID, $this->lembaga_id);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_YAYASAN_ID)) {
            $criteria->add(PenggunaTableMap::COL_YAYASAN_ID, $this->yayasan_id);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_LA_ID)) {
            $criteria->add(PenggunaTableMap::COL_LA_ID, $this->la_id);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_DUDI_ID)) {
            $criteria->add(PenggunaTableMap::COL_DUDI_ID, $this->dudi_id);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_CREATE_DATE)) {
            $criteria->add(PenggunaTableMap::COL_CREATE_DATE, $this->create_date);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_ROLES)) {
            $criteria->add(PenggunaTableMap::COL_ROLES, $this->roles);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_LAST_UPDATE)) {
            $criteria->add(PenggunaTableMap::COL_LAST_UPDATE, $this->last_update);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_SOFT_DELETE)) {
            $criteria->add(PenggunaTableMap::COL_SOFT_DELETE, $this->soft_delete);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_LAST_SYNC)) {
            $criteria->add(PenggunaTableMap::COL_LAST_SYNC, $this->last_sync);
        }
        if ($this->isColumnModified(PenggunaTableMap::COL_UPDATER_ID)) {
            $criteria->add(PenggunaTableMap::COL_UPDATER_ID, $this->updater_id);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildPenggunaQuery::create();
        $criteria->add(PenggunaTableMap::COL_PENGGUNA_ID, $this->pengguna_id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getPenggunaId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getPenggunaId();
    }

    /**
     * Generic method to set the primary key (pengguna_id column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPenggunaId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getPenggunaId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Appdb\Pengguna (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPenggunaId($this->getPenggunaId());
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setUsername($this->getUsername());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setNama($this->getNama());
        $copyObj->setNipNim($this->getNipNim());
        $copyObj->setJabatanLembaga($this->getJabatanLembaga());
        $copyObj->setYm($this->getYm());
        $copyObj->setSkype($this->getSkype());
        $copyObj->setAlamat($this->getAlamat());
        $copyObj->setKodeWilayah($this->getKodeWilayah());
        $copyObj->setNoTelepon($this->getNoTelepon());
        $copyObj->setNoHp($this->getNoHp());
        $copyObj->setAktif($this->getAktif());
        $copyObj->setPtkId($this->getPtkId());
        $copyObj->setPeranId($this->getPeranId());
        $copyObj->setLembagaId($this->getLembagaId());
        $copyObj->setYayasanId($this->getYayasanId());
        $copyObj->setLaId($this->getLaId());
        $copyObj->setDudiId($this->getDudiId());
        $copyObj->setCreateDate($this->getCreateDate());
        $copyObj->setRoles($this->getRoles());
        $copyObj->setLastUpdate($this->getLastUpdate());
        $copyObj->setSoftDelete($this->getSoftDelete());
        $copyObj->setLastSync($this->getLastSync());
        $copyObj->setUpdaterId($this->getUpdaterId());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getFotos() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFoto($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getGeotags() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addGeotag($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
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
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Appdb\Pengguna Clone of current object.
     * @throws PropelException
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
     * Declares an association between this object and a ChildSekolah object.
     *
     * @param  ChildSekolah $v
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSekolah(ChildSekolah $v = null)
    {
        if ($v === null) {
            $this->setSekolahId(NULL);
        } else {
            $this->setSekolahId($v->getSekolahId());
        }

        $this->aSekolah = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSekolah object, it will not be re-added.
        if ($v !== null) {
            $v->addPengguna($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSekolah object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSekolah The associated ChildSekolah object.
     * @throws PropelException
     */
    public function getSekolah(ConnectionInterface $con = null)
    {
        if ($this->aSekolah === null && (($this->sekolah_id !== "" && $this->sekolah_id !== null))) {
            $this->aSekolah = ChildSekolahQuery::create()->findPk($this->sekolah_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSekolah->addPenggunas($this);
             */
        }

        return $this->aSekolah;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Foto' == $relationName) {
            $this->initFotos();
            return;
        }
        if ('Geotag' == $relationName) {
            $this->initGeotags();
            return;
        }
    }

    /**
     * Clears out the collFotos collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addFotos()
     */
    public function clearFotos()
    {
        $this->collFotos = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collFotos collection loaded partially.
     */
    public function resetPartialFotos($v = true)
    {
        $this->collFotosPartial = $v;
    }

    /**
     * Initializes the collFotos collection.
     *
     * By default this just sets the collFotos collection to an empty array (like clearcollFotos());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFotos($overrideExisting = true)
    {
        if (null !== $this->collFotos && !$overrideExisting) {
            return;
        }

        $collectionClassName = FotoTableMap::getTableMap()->getCollectionClassName();

        $this->collFotos = new $collectionClassName;
        $this->collFotos->setModel('\Appdb\Foto');
    }

    /**
     * Gets an array of ChildFoto objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPengguna is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildFoto[] List of ChildFoto objects
     * @throws PropelException
     */
    public function getFotos(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collFotosPartial && !$this->isNew();
        if (null === $this->collFotos || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFotos) {
                // return empty collection
                $this->initFotos();
            } else {
                $collFotos = ChildFotoQuery::create(null, $criteria)
                    ->filterByPengguna($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collFotosPartial && count($collFotos)) {
                        $this->initFotos(false);

                        foreach ($collFotos as $obj) {
                            if (false == $this->collFotos->contains($obj)) {
                                $this->collFotos->append($obj);
                            }
                        }

                        $this->collFotosPartial = true;
                    }

                    return $collFotos;
                }

                if ($partial && $this->collFotos) {
                    foreach ($this->collFotos as $obj) {
                        if ($obj->isNew()) {
                            $collFotos[] = $obj;
                        }
                    }
                }

                $this->collFotos = $collFotos;
                $this->collFotosPartial = false;
            }
        }

        return $this->collFotos;
    }

    /**
     * Sets a collection of ChildFoto objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $fotos A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPengguna The current object (for fluent API support)
     */
    public function setFotos(Collection $fotos, ConnectionInterface $con = null)
    {
        /** @var ChildFoto[] $fotosToDelete */
        $fotosToDelete = $this->getFotos(new Criteria(), $con)->diff($fotos);


        $this->fotosScheduledForDeletion = $fotosToDelete;

        foreach ($fotosToDelete as $fotoRemoved) {
            $fotoRemoved->setPengguna(null);
        }

        $this->collFotos = null;
        foreach ($fotos as $foto) {
            $this->addFoto($foto);
        }

        $this->collFotos = $fotos;
        $this->collFotosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Foto objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Foto objects.
     * @throws PropelException
     */
    public function countFotos(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collFotosPartial && !$this->isNew();
        if (null === $this->collFotos || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFotos) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getFotos());
            }

            $query = ChildFotoQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPengguna($this)
                ->count($con);
        }

        return count($this->collFotos);
    }

    /**
     * Method called to associate a ChildFoto object to this object
     * through the ChildFoto foreign key attribute.
     *
     * @param  ChildFoto $l ChildFoto
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function addFoto(ChildFoto $l)
    {
        if ($this->collFotos === null) {
            $this->initFotos();
            $this->collFotosPartial = true;
        }

        if (!$this->collFotos->contains($l)) {
            $this->doAddFoto($l);

            if ($this->fotosScheduledForDeletion and $this->fotosScheduledForDeletion->contains($l)) {
                $this->fotosScheduledForDeletion->remove($this->fotosScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildFoto $foto The ChildFoto object to add.
     */
    protected function doAddFoto(ChildFoto $foto)
    {
        $this->collFotos[]= $foto;
        $foto->setPengguna($this);
    }

    /**
     * @param  ChildFoto $foto The ChildFoto object to remove.
     * @return $this|ChildPengguna The current object (for fluent API support)
     */
    public function removeFoto(ChildFoto $foto)
    {
        if ($this->getFotos()->contains($foto)) {
            $pos = $this->collFotos->search($foto);
            $this->collFotos->remove($pos);
            if (null === $this->fotosScheduledForDeletion) {
                $this->fotosScheduledForDeletion = clone $this->collFotos;
                $this->fotosScheduledForDeletion->clear();
            }
            $this->fotosScheduledForDeletion[]= clone $foto;
            $foto->setPengguna(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pengguna is new, it will return
     * an empty collection; or if this Pengguna has previously
     * been saved, it will retrieve related Fotos from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pengguna.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildFoto[] List of ChildFoto objects
     */
    public function getFotosJoinJenisFoto(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildFotoQuery::create(null, $criteria);
        $query->joinWith('JenisFoto', $joinBehavior);

        return $this->getFotos($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pengguna is new, it will return
     * an empty collection; or if this Pengguna has previously
     * been saved, it will retrieve related Fotos from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pengguna.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildFoto[] List of ChildFoto objects
     */
    public function getFotosJoinSekolah(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildFotoQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $joinBehavior);

        return $this->getFotos($query, $con);
    }

    /**
     * Clears out the collGeotags collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addGeotags()
     */
    public function clearGeotags()
    {
        $this->collGeotags = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collGeotags collection loaded partially.
     */
    public function resetPartialGeotags($v = true)
    {
        $this->collGeotagsPartial = $v;
    }

    /**
     * Initializes the collGeotags collection.
     *
     * By default this just sets the collGeotags collection to an empty array (like clearcollGeotags());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initGeotags($overrideExisting = true)
    {
        if (null !== $this->collGeotags && !$overrideExisting) {
            return;
        }

        $collectionClassName = GeotagTableMap::getTableMap()->getCollectionClassName();

        $this->collGeotags = new $collectionClassName;
        $this->collGeotags->setModel('\Appdb\Geotag');
    }

    /**
     * Gets an array of ChildGeotag objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPengguna is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildGeotag[] List of ChildGeotag objects
     * @throws PropelException
     */
    public function getGeotags(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collGeotagsPartial && !$this->isNew();
        if (null === $this->collGeotags || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collGeotags) {
                // return empty collection
                $this->initGeotags();
            } else {
                $collGeotags = ChildGeotagQuery::create(null, $criteria)
                    ->filterByPengguna($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collGeotagsPartial && count($collGeotags)) {
                        $this->initGeotags(false);

                        foreach ($collGeotags as $obj) {
                            if (false == $this->collGeotags->contains($obj)) {
                                $this->collGeotags->append($obj);
                            }
                        }

                        $this->collGeotagsPartial = true;
                    }

                    return $collGeotags;
                }

                if ($partial && $this->collGeotags) {
                    foreach ($this->collGeotags as $obj) {
                        if ($obj->isNew()) {
                            $collGeotags[] = $obj;
                        }
                    }
                }

                $this->collGeotags = $collGeotags;
                $this->collGeotagsPartial = false;
            }
        }

        return $this->collGeotags;
    }

    /**
     * Sets a collection of ChildGeotag objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $geotags A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPengguna The current object (for fluent API support)
     */
    public function setGeotags(Collection $geotags, ConnectionInterface $con = null)
    {
        /** @var ChildGeotag[] $geotagsToDelete */
        $geotagsToDelete = $this->getGeotags(new Criteria(), $con)->diff($geotags);


        $this->geotagsScheduledForDeletion = $geotagsToDelete;

        foreach ($geotagsToDelete as $geotagRemoved) {
            $geotagRemoved->setPengguna(null);
        }

        $this->collGeotags = null;
        foreach ($geotags as $geotag) {
            $this->addGeotag($geotag);
        }

        $this->collGeotags = $geotags;
        $this->collGeotagsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Geotag objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Geotag objects.
     * @throws PropelException
     */
    public function countGeotags(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collGeotagsPartial && !$this->isNew();
        if (null === $this->collGeotags || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collGeotags) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getGeotags());
            }

            $query = ChildGeotagQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPengguna($this)
                ->count($con);
        }

        return count($this->collGeotags);
    }

    /**
     * Method called to associate a ChildGeotag object to this object
     * through the ChildGeotag foreign key attribute.
     *
     * @param  ChildGeotag $l ChildGeotag
     * @return $this|\Appdb\Pengguna The current object (for fluent API support)
     */
    public function addGeotag(ChildGeotag $l)
    {
        if ($this->collGeotags === null) {
            $this->initGeotags();
            $this->collGeotagsPartial = true;
        }

        if (!$this->collGeotags->contains($l)) {
            $this->doAddGeotag($l);

            if ($this->geotagsScheduledForDeletion and $this->geotagsScheduledForDeletion->contains($l)) {
                $this->geotagsScheduledForDeletion->remove($this->geotagsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildGeotag $geotag The ChildGeotag object to add.
     */
    protected function doAddGeotag(ChildGeotag $geotag)
    {
        $this->collGeotags[]= $geotag;
        $geotag->setPengguna($this);
    }

    /**
     * @param  ChildGeotag $geotag The ChildGeotag object to remove.
     * @return $this|ChildPengguna The current object (for fluent API support)
     */
    public function removeGeotag(ChildGeotag $geotag)
    {
        if ($this->getGeotags()->contains($geotag)) {
            $pos = $this->collGeotags->search($geotag);
            $this->collGeotags->remove($pos);
            if (null === $this->geotagsScheduledForDeletion) {
                $this->geotagsScheduledForDeletion = clone $this->collGeotags;
                $this->geotagsScheduledForDeletion->clear();
            }
            $this->geotagsScheduledForDeletion[]= clone $geotag;
            $geotag->setPengguna(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pengguna is new, it will return
     * an empty collection; or if this Pengguna has previously
     * been saved, it will retrieve related Geotags from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pengguna.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildGeotag[] List of ChildGeotag objects
     */
    public function getGeotagsJoinSekolah(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildGeotagQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $joinBehavior);

        return $this->getGeotags($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pengguna is new, it will return
     * an empty collection; or if this Pengguna has previously
     * been saved, it will retrieve related Geotags from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pengguna.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildGeotag[] List of ChildGeotag objects
     */
    public function getGeotagsJoinStatusGeotag(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildGeotagQuery::create(null, $criteria);
        $query->joinWith('StatusGeotag', $joinBehavior);

        return $this->getGeotags($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aSekolah) {
            $this->aSekolah->removePengguna($this);
        }
        $this->pengguna_id = null;
        $this->sekolah_id = null;
        $this->username = null;
        $this->password = null;
        $this->nama = null;
        $this->nip_nim = null;
        $this->jabatan_lembaga = null;
        $this->ym = null;
        $this->skype = null;
        $this->alamat = null;
        $this->kode_wilayah = null;
        $this->no_telepon = null;
        $this->no_hp = null;
        $this->aktif = null;
        $this->ptk_id = null;
        $this->peran_id = null;
        $this->lembaga_id = null;
        $this->yayasan_id = null;
        $this->la_id = null;
        $this->dudi_id = null;
        $this->create_date = null;
        $this->roles = null;
        $this->last_update = null;
        $this->soft_delete = null;
        $this->last_sync = null;
        $this->updater_id = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collFotos) {
                foreach ($this->collFotos as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collGeotags) {
                foreach ($this->collGeotags as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collFotos = null;
        $this->collGeotags = null;
        $this->aSekolah = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PenggunaTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
