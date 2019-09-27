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
use Appdb\Map\SekolahTableMap;
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
 * Base class that represents a row from the 'sekolah' table.
 *
 *
 *
 * @package    propel.generator.Appdb.Base
 */
abstract class Sekolah implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Appdb\\Map\\SekolahTableMap';


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
     * The value for the sekolah_id field.
     *
     * @var        string
     */
    protected $sekolah_id;

    /**
     * The value for the nama field.
     *
     * @var        string
     */
    protected $nama;

    /**
     * The value for the nama_nomenklatur field.
     *
     * @var        string
     */
    protected $nama_nomenklatur;

    /**
     * The value for the nss field.
     *
     * @var        string
     */
    protected $nss;

    /**
     * The value for the npsn field.
     *
     * @var        string
     */
    protected $npsn;

    /**
     * The value for the bentuk_pendidikan_id field.
     *
     * @var        int
     */
    protected $bentuk_pendidikan_id;

    /**
     * The value for the alamat_jalan field.
     *
     * @var        string
     */
    protected $alamat_jalan;

    /**
     * The value for the rt field.
     *
     * @var        string
     */
    protected $rt;

    /**
     * The value for the rw field.
     *
     * @var        string
     */
    protected $rw;

    /**
     * The value for the nama_dusun field.
     *
     * @var        string
     */
    protected $nama_dusun;

    /**
     * The value for the desa_kelurahan field.
     *
     * @var        string
     */
    protected $desa_kelurahan;

    /**
     * The value for the kode_wilayah field.
     *
     * @var        string
     */
    protected $kode_wilayah;

    /**
     * The value for the kode_pos field.
     *
     * @var        string
     */
    protected $kode_pos;

    /**
     * The value for the lintang field.
     *
     * @var        string
     */
    protected $lintang;

    /**
     * The value for the bujur field.
     *
     * @var        string
     */
    protected $bujur;

    /**
     * The value for the nomor_telepon field.
     *
     * @var        string
     */
    protected $nomor_telepon;

    /**
     * The value for the nomor_fax field.
     *
     * @var        string
     */
    protected $nomor_fax;

    /**
     * The value for the email field.
     *
     * @var        string
     */
    protected $email;

    /**
     * The value for the website field.
     *
     * @var        string
     */
    protected $website;

    /**
     * The value for the kebutuhan_khusus_id field.
     *
     * @var        int
     */
    protected $kebutuhan_khusus_id;

    /**
     * The value for the status_sekolah field.
     *
     * @var        string
     */
    protected $status_sekolah;

    /**
     * The value for the sk_pendirian_sekolah field.
     *
     * @var        string
     */
    protected $sk_pendirian_sekolah;

    /**
     * The value for the tanggal_sk_pendirian field.
     *
     * @var        DateTime
     */
    protected $tanggal_sk_pendirian;

    /**
     * The value for the status_kepemilikan_id field.
     *
     * @var        string
     */
    protected $status_kepemilikan_id;

    /**
     * The value for the yayasan_id field.
     *
     * @var        string
     */
    protected $yayasan_id;

    /**
     * The value for the sk_izin_operasional field.
     *
     * @var        string
     */
    protected $sk_izin_operasional;

    /**
     * The value for the tanggal_sk_izin_operasional field.
     *
     * @var        DateTime
     */
    protected $tanggal_sk_izin_operasional;

    /**
     * The value for the no_rekening field.
     *
     * @var        string
     */
    protected $no_rekening;

    /**
     * The value for the nama_bank field.
     *
     * @var        string
     */
    protected $nama_bank;

    /**
     * The value for the cabang_kcp_unit field.
     *
     * @var        string
     */
    protected $cabang_kcp_unit;

    /**
     * The value for the rekening_atas_nama field.
     *
     * @var        string
     */
    protected $rekening_atas_nama;

    /**
     * The value for the mbs field.
     *
     * @var        string
     */
    protected $mbs;

    /**
     * The value for the luas_tanah_milik field.
     *
     * @var        string
     */
    protected $luas_tanah_milik;

    /**
     * The value for the luas_tanah_bukan_milik field.
     *
     * @var        string
     */
    protected $luas_tanah_bukan_milik;

    /**
     * The value for the kode_registrasi field.
     *
     * @var        string
     */
    protected $kode_registrasi;

    /**
     * The value for the npwp field.
     *
     * @var        string
     */
    protected $npwp;

    /**
     * The value for the nm_wp field.
     *
     * @var        string
     */
    protected $nm_wp;

    /**
     * The value for the flag field.
     *
     * @var        string
     */
    protected $flag;

    /**
     * The value for the create_date field.
     *
     * @var        DateTime
     */
    protected $create_date;

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
     * @var        ObjectCollection|ChildPengguna[] Collection to store aggregation of ChildPengguna objects.
     */
    protected $collPenggunas;
    protected $collPenggunasPartial;

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
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPengguna[]
     */
    protected $penggunasScheduledForDeletion = null;

    /**
     * Initializes internal state of Appdb\Base\Sekolah object.
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
     * Compares this with another <code>Sekolah</code> instance.  If
     * <code>obj</code> is an instance of <code>Sekolah</code>, delegates to
     * <code>equals(Sekolah)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Sekolah The current object, for fluid interface
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
     * Get the [sekolah_id] column value.
     *
     * @return string
     */
    public function getSekolahId()
    {
        return $this->sekolah_id;
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
     * Get the [nama_nomenklatur] column value.
     *
     * @return string
     */
    public function getNamaNomenklatur()
    {
        return $this->nama_nomenklatur;
    }

    /**
     * Get the [nss] column value.
     *
     * @return string
     */
    public function getNss()
    {
        return $this->nss;
    }

    /**
     * Get the [npsn] column value.
     *
     * @return string
     */
    public function getNpsn()
    {
        return $this->npsn;
    }

    /**
     * Get the [bentuk_pendidikan_id] column value.
     *
     * @return int
     */
    public function getBentukPendidikanId()
    {
        return $this->bentuk_pendidikan_id;
    }

    /**
     * Get the [alamat_jalan] column value.
     *
     * @return string
     */
    public function getAlamatJalan()
    {
        return $this->alamat_jalan;
    }

    /**
     * Get the [rt] column value.
     *
     * @return string
     */
    public function getRt()
    {
        return $this->rt;
    }

    /**
     * Get the [rw] column value.
     *
     * @return string
     */
    public function getRw()
    {
        return $this->rw;
    }

    /**
     * Get the [nama_dusun] column value.
     *
     * @return string
     */
    public function getNamaDusun()
    {
        return $this->nama_dusun;
    }

    /**
     * Get the [desa_kelurahan] column value.
     *
     * @return string
     */
    public function getDesaKelurahan()
    {
        return $this->desa_kelurahan;
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
     * Get the [kode_pos] column value.
     *
     * @return string
     */
    public function getKodePos()
    {
        return $this->kode_pos;
    }

    /**
     * Get the [lintang] column value.
     *
     * @return string
     */
    public function getLintang()
    {
        return $this->lintang;
    }

    /**
     * Get the [bujur] column value.
     *
     * @return string
     */
    public function getBujur()
    {
        return $this->bujur;
    }

    /**
     * Get the [nomor_telepon] column value.
     *
     * @return string
     */
    public function getNomorTelepon()
    {
        return $this->nomor_telepon;
    }

    /**
     * Get the [nomor_fax] column value.
     *
     * @return string
     */
    public function getNomorFax()
    {
        return $this->nomor_fax;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [website] column value.
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Get the [kebutuhan_khusus_id] column value.
     *
     * @return int
     */
    public function getKebutuhanKhususId()
    {
        return $this->kebutuhan_khusus_id;
    }

    /**
     * Get the [status_sekolah] column value.
     *
     * @return string
     */
    public function getStatusSekolah()
    {
        return $this->status_sekolah;
    }

    /**
     * Get the [sk_pendirian_sekolah] column value.
     *
     * @return string
     */
    public function getSkPendirianSekolah()
    {
        return $this->sk_pendirian_sekolah;
    }

    /**
     * Get the [optionally formatted] temporal [tanggal_sk_pendirian] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalSkPendirian($format = NULL)
    {
        if ($format === null) {
            return $this->tanggal_sk_pendirian;
        } else {
            return $this->tanggal_sk_pendirian instanceof \DateTimeInterface ? $this->tanggal_sk_pendirian->format($format) : null;
        }
    }

    /**
     * Get the [status_kepemilikan_id] column value.
     *
     * @return string
     */
    public function getStatusKepemilikanId()
    {
        return $this->status_kepemilikan_id;
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
     * Get the [sk_izin_operasional] column value.
     *
     * @return string
     */
    public function getSkIzinOperasional()
    {
        return $this->sk_izin_operasional;
    }

    /**
     * Get the [optionally formatted] temporal [tanggal_sk_izin_operasional] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalSkIzinOperasional($format = NULL)
    {
        if ($format === null) {
            return $this->tanggal_sk_izin_operasional;
        } else {
            return $this->tanggal_sk_izin_operasional instanceof \DateTimeInterface ? $this->tanggal_sk_izin_operasional->format($format) : null;
        }
    }

    /**
     * Get the [no_rekening] column value.
     *
     * @return string
     */
    public function getNoRekening()
    {
        return $this->no_rekening;
    }

    /**
     * Get the [nama_bank] column value.
     *
     * @return string
     */
    public function getNamaBank()
    {
        return $this->nama_bank;
    }

    /**
     * Get the [cabang_kcp_unit] column value.
     *
     * @return string
     */
    public function getCabangKcpUnit()
    {
        return $this->cabang_kcp_unit;
    }

    /**
     * Get the [rekening_atas_nama] column value.
     *
     * @return string
     */
    public function getRekeningAtasNama()
    {
        return $this->rekening_atas_nama;
    }

    /**
     * Get the [mbs] column value.
     *
     * @return string
     */
    public function getMbs()
    {
        return $this->mbs;
    }

    /**
     * Get the [luas_tanah_milik] column value.
     *
     * @return string
     */
    public function getLuasTanahMilik()
    {
        return $this->luas_tanah_milik;
    }

    /**
     * Get the [luas_tanah_bukan_milik] column value.
     *
     * @return string
     */
    public function getLuasTanahBukanMilik()
    {
        return $this->luas_tanah_bukan_milik;
    }

    /**
     * Get the [kode_registrasi] column value.
     *
     * @return string
     */
    public function getKodeRegistrasi()
    {
        return $this->kode_registrasi;
    }

    /**
     * Get the [npwp] column value.
     *
     * @return string
     */
    public function getNpwp()
    {
        return $this->npwp;
    }

    /**
     * Get the [nm_wp] column value.
     *
     * @return string
     */
    public function getNmWp()
    {
        return $this->nm_wp;
    }

    /**
     * Get the [flag] column value.
     *
     * @return string
     */
    public function getFlag()
    {
        return $this->flag;
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
     * Set the value of [sekolah_id] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[SekolahTableMap::COL_SEKOLAH_ID] = true;
        }

        return $this;
    } // setSekolahId()

    /**
     * Set the value of [nama] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[SekolahTableMap::COL_NAMA] = true;
        }

        return $this;
    } // setNama()

    /**
     * Set the value of [nama_nomenklatur] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setNamaNomenklatur($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nama_nomenklatur !== $v) {
            $this->nama_nomenklatur = $v;
            $this->modifiedColumns[SekolahTableMap::COL_NAMA_NOMENKLATUR] = true;
        }

        return $this;
    } // setNamaNomenklatur()

    /**
     * Set the value of [nss] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setNss($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nss !== $v) {
            $this->nss = $v;
            $this->modifiedColumns[SekolahTableMap::COL_NSS] = true;
        }

        return $this;
    } // setNss()

    /**
     * Set the value of [npsn] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setNpsn($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->npsn !== $v) {
            $this->npsn = $v;
            $this->modifiedColumns[SekolahTableMap::COL_NPSN] = true;
        }

        return $this;
    } // setNpsn()

    /**
     * Set the value of [bentuk_pendidikan_id] column.
     *
     * @param int $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setBentukPendidikanId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->bentuk_pendidikan_id !== $v) {
            $this->bentuk_pendidikan_id = $v;
            $this->modifiedColumns[SekolahTableMap::COL_BENTUK_PENDIDIKAN_ID] = true;
        }

        return $this;
    } // setBentukPendidikanId()

    /**
     * Set the value of [alamat_jalan] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setAlamatJalan($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->alamat_jalan !== $v) {
            $this->alamat_jalan = $v;
            $this->modifiedColumns[SekolahTableMap::COL_ALAMAT_JALAN] = true;
        }

        return $this;
    } // setAlamatJalan()

    /**
     * Set the value of [rt] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setRt($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rt !== $v) {
            $this->rt = $v;
            $this->modifiedColumns[SekolahTableMap::COL_RT] = true;
        }

        return $this;
    } // setRt()

    /**
     * Set the value of [rw] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setRw($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rw !== $v) {
            $this->rw = $v;
            $this->modifiedColumns[SekolahTableMap::COL_RW] = true;
        }

        return $this;
    } // setRw()

    /**
     * Set the value of [nama_dusun] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setNamaDusun($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nama_dusun !== $v) {
            $this->nama_dusun = $v;
            $this->modifiedColumns[SekolahTableMap::COL_NAMA_DUSUN] = true;
        }

        return $this;
    } // setNamaDusun()

    /**
     * Set the value of [desa_kelurahan] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setDesaKelurahan($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->desa_kelurahan !== $v) {
            $this->desa_kelurahan = $v;
            $this->modifiedColumns[SekolahTableMap::COL_DESA_KELURAHAN] = true;
        }

        return $this;
    } // setDesaKelurahan()

    /**
     * Set the value of [kode_wilayah] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setKodeWilayah($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->kode_wilayah !== $v) {
            $this->kode_wilayah = $v;
            $this->modifiedColumns[SekolahTableMap::COL_KODE_WILAYAH] = true;
        }

        return $this;
    } // setKodeWilayah()

    /**
     * Set the value of [kode_pos] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setKodePos($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->kode_pos !== $v) {
            $this->kode_pos = $v;
            $this->modifiedColumns[SekolahTableMap::COL_KODE_POS] = true;
        }

        return $this;
    } // setKodePos()

    /**
     * Set the value of [lintang] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setLintang($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lintang !== $v) {
            $this->lintang = $v;
            $this->modifiedColumns[SekolahTableMap::COL_LINTANG] = true;
        }

        return $this;
    } // setLintang()

    /**
     * Set the value of [bujur] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setBujur($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bujur !== $v) {
            $this->bujur = $v;
            $this->modifiedColumns[SekolahTableMap::COL_BUJUR] = true;
        }

        return $this;
    } // setBujur()

    /**
     * Set the value of [nomor_telepon] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setNomorTelepon($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nomor_telepon !== $v) {
            $this->nomor_telepon = $v;
            $this->modifiedColumns[SekolahTableMap::COL_NOMOR_TELEPON] = true;
        }

        return $this;
    } // setNomorTelepon()

    /**
     * Set the value of [nomor_fax] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setNomorFax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nomor_fax !== $v) {
            $this->nomor_fax = $v;
            $this->modifiedColumns[SekolahTableMap::COL_NOMOR_FAX] = true;
        }

        return $this;
    } // setNomorFax()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[SekolahTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [website] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setWebsite($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->website !== $v) {
            $this->website = $v;
            $this->modifiedColumns[SekolahTableMap::COL_WEBSITE] = true;
        }

        return $this;
    } // setWebsite()

    /**
     * Set the value of [kebutuhan_khusus_id] column.
     *
     * @param int $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setKebutuhanKhususId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->kebutuhan_khusus_id !== $v) {
            $this->kebutuhan_khusus_id = $v;
            $this->modifiedColumns[SekolahTableMap::COL_KEBUTUHAN_KHUSUS_ID] = true;
        }

        return $this;
    } // setKebutuhanKhususId()

    /**
     * Set the value of [status_sekolah] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setStatusSekolah($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status_sekolah !== $v) {
            $this->status_sekolah = $v;
            $this->modifiedColumns[SekolahTableMap::COL_STATUS_SEKOLAH] = true;
        }

        return $this;
    } // setStatusSekolah()

    /**
     * Set the value of [sk_pendirian_sekolah] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setSkPendirianSekolah($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sk_pendirian_sekolah !== $v) {
            $this->sk_pendirian_sekolah = $v;
            $this->modifiedColumns[SekolahTableMap::COL_SK_PENDIRIAN_SEKOLAH] = true;
        }

        return $this;
    } // setSkPendirianSekolah()

    /**
     * Sets the value of [tanggal_sk_pendirian] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setTanggalSkPendirian($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_sk_pendirian !== null || $dt !== null) {
            if ($this->tanggal_sk_pendirian === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->tanggal_sk_pendirian->format("Y-m-d H:i:s.u")) {
                $this->tanggal_sk_pendirian = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SekolahTableMap::COL_TANGGAL_SK_PENDIRIAN] = true;
            }
        } // if either are not null

        return $this;
    } // setTanggalSkPendirian()

    /**
     * Set the value of [status_kepemilikan_id] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setStatusKepemilikanId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status_kepemilikan_id !== $v) {
            $this->status_kepemilikan_id = $v;
            $this->modifiedColumns[SekolahTableMap::COL_STATUS_KEPEMILIKAN_ID] = true;
        }

        return $this;
    } // setStatusKepemilikanId()

    /**
     * Set the value of [yayasan_id] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setYayasanId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->yayasan_id !== $v) {
            $this->yayasan_id = $v;
            $this->modifiedColumns[SekolahTableMap::COL_YAYASAN_ID] = true;
        }

        return $this;
    } // setYayasanId()

    /**
     * Set the value of [sk_izin_operasional] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setSkIzinOperasional($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sk_izin_operasional !== $v) {
            $this->sk_izin_operasional = $v;
            $this->modifiedColumns[SekolahTableMap::COL_SK_IZIN_OPERASIONAL] = true;
        }

        return $this;
    } // setSkIzinOperasional()

    /**
     * Sets the value of [tanggal_sk_izin_operasional] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setTanggalSkIzinOperasional($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_sk_izin_operasional !== null || $dt !== null) {
            if ($this->tanggal_sk_izin_operasional === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->tanggal_sk_izin_operasional->format("Y-m-d H:i:s.u")) {
                $this->tanggal_sk_izin_operasional = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SekolahTableMap::COL_TANGGAL_SK_IZIN_OPERASIONAL] = true;
            }
        } // if either are not null

        return $this;
    } // setTanggalSkIzinOperasional()

    /**
     * Set the value of [no_rekening] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setNoRekening($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->no_rekening !== $v) {
            $this->no_rekening = $v;
            $this->modifiedColumns[SekolahTableMap::COL_NO_REKENING] = true;
        }

        return $this;
    } // setNoRekening()

    /**
     * Set the value of [nama_bank] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setNamaBank($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nama_bank !== $v) {
            $this->nama_bank = $v;
            $this->modifiedColumns[SekolahTableMap::COL_NAMA_BANK] = true;
        }

        return $this;
    } // setNamaBank()

    /**
     * Set the value of [cabang_kcp_unit] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setCabangKcpUnit($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cabang_kcp_unit !== $v) {
            $this->cabang_kcp_unit = $v;
            $this->modifiedColumns[SekolahTableMap::COL_CABANG_KCP_UNIT] = true;
        }

        return $this;
    } // setCabangKcpUnit()

    /**
     * Set the value of [rekening_atas_nama] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setRekeningAtasNama($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rekening_atas_nama !== $v) {
            $this->rekening_atas_nama = $v;
            $this->modifiedColumns[SekolahTableMap::COL_REKENING_ATAS_NAMA] = true;
        }

        return $this;
    } // setRekeningAtasNama()

    /**
     * Set the value of [mbs] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setMbs($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mbs !== $v) {
            $this->mbs = $v;
            $this->modifiedColumns[SekolahTableMap::COL_MBS] = true;
        }

        return $this;
    } // setMbs()

    /**
     * Set the value of [luas_tanah_milik] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setLuasTanahMilik($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->luas_tanah_milik !== $v) {
            $this->luas_tanah_milik = $v;
            $this->modifiedColumns[SekolahTableMap::COL_LUAS_TANAH_MILIK] = true;
        }

        return $this;
    } // setLuasTanahMilik()

    /**
     * Set the value of [luas_tanah_bukan_milik] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setLuasTanahBukanMilik($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->luas_tanah_bukan_milik !== $v) {
            $this->luas_tanah_bukan_milik = $v;
            $this->modifiedColumns[SekolahTableMap::COL_LUAS_TANAH_BUKAN_MILIK] = true;
        }

        return $this;
    } // setLuasTanahBukanMilik()

    /**
     * Set the value of [kode_registrasi] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setKodeRegistrasi($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->kode_registrasi !== $v) {
            $this->kode_registrasi = $v;
            $this->modifiedColumns[SekolahTableMap::COL_KODE_REGISTRASI] = true;
        }

        return $this;
    } // setKodeRegistrasi()

    /**
     * Set the value of [npwp] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setNpwp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->npwp !== $v) {
            $this->npwp = $v;
            $this->modifiedColumns[SekolahTableMap::COL_NPWP] = true;
        }

        return $this;
    } // setNpwp()

    /**
     * Set the value of [nm_wp] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setNmWp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nm_wp !== $v) {
            $this->nm_wp = $v;
            $this->modifiedColumns[SekolahTableMap::COL_NM_WP] = true;
        }

        return $this;
    } // setNmWp()

    /**
     * Set the value of [flag] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setFlag($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->flag !== $v) {
            $this->flag = $v;
            $this->modifiedColumns[SekolahTableMap::COL_FLAG] = true;
        }

        return $this;
    } // setFlag()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            if ($this->create_date === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->create_date->format("Y-m-d H:i:s.u")) {
                $this->create_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SekolahTableMap::COL_CREATE_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            if ($this->last_update === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->last_update->format("Y-m-d H:i:s.u")) {
                $this->last_update = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SekolahTableMap::COL_LAST_UPDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[SekolahTableMap::COL_SOFT_DELETE] = true;
        }

        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setLastSync($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_sync !== null || $dt !== null) {
            if ($this->last_sync === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->last_sync->format("Y-m-d H:i:s.u")) {
                $this->last_sync = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SekolahTableMap::COL_LAST_SYNC] = true;
            }
        } // if either are not null

        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     *
     * @param string $v new value
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[SekolahTableMap::COL_UPDATER_ID] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SekolahTableMap::translateFieldName('SekolahId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sekolah_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SekolahTableMap::translateFieldName('Nama', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nama = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SekolahTableMap::translateFieldName('NamaNomenklatur', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nama_nomenklatur = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SekolahTableMap::translateFieldName('Nss', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nss = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SekolahTableMap::translateFieldName('Npsn', TableMap::TYPE_PHPNAME, $indexType)];
            $this->npsn = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SekolahTableMap::translateFieldName('BentukPendidikanId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bentuk_pendidikan_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SekolahTableMap::translateFieldName('AlamatJalan', TableMap::TYPE_PHPNAME, $indexType)];
            $this->alamat_jalan = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SekolahTableMap::translateFieldName('Rt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rt = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SekolahTableMap::translateFieldName('Rw', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rw = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SekolahTableMap::translateFieldName('NamaDusun', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nama_dusun = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SekolahTableMap::translateFieldName('DesaKelurahan', TableMap::TYPE_PHPNAME, $indexType)];
            $this->desa_kelurahan = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SekolahTableMap::translateFieldName('KodeWilayah', TableMap::TYPE_PHPNAME, $indexType)];
            $this->kode_wilayah = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : SekolahTableMap::translateFieldName('KodePos', TableMap::TYPE_PHPNAME, $indexType)];
            $this->kode_pos = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : SekolahTableMap::translateFieldName('Lintang', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lintang = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : SekolahTableMap::translateFieldName('Bujur', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bujur = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : SekolahTableMap::translateFieldName('NomorTelepon', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nomor_telepon = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : SekolahTableMap::translateFieldName('NomorFax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nomor_fax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : SekolahTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : SekolahTableMap::translateFieldName('Website', TableMap::TYPE_PHPNAME, $indexType)];
            $this->website = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : SekolahTableMap::translateFieldName('KebutuhanKhususId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->kebutuhan_khusus_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : SekolahTableMap::translateFieldName('StatusSekolah', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_sekolah = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : SekolahTableMap::translateFieldName('SkPendirianSekolah', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sk_pendirian_sekolah = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : SekolahTableMap::translateFieldName('TanggalSkPendirian', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tanggal_sk_pendirian = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : SekolahTableMap::translateFieldName('StatusKepemilikanId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_kepemilikan_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : SekolahTableMap::translateFieldName('YayasanId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->yayasan_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : SekolahTableMap::translateFieldName('SkIzinOperasional', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sk_izin_operasional = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : SekolahTableMap::translateFieldName('TanggalSkIzinOperasional', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tanggal_sk_izin_operasional = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : SekolahTableMap::translateFieldName('NoRekening', TableMap::TYPE_PHPNAME, $indexType)];
            $this->no_rekening = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : SekolahTableMap::translateFieldName('NamaBank', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nama_bank = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : SekolahTableMap::translateFieldName('CabangKcpUnit', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cabang_kcp_unit = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : SekolahTableMap::translateFieldName('RekeningAtasNama', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rekening_atas_nama = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : SekolahTableMap::translateFieldName('Mbs', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mbs = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : SekolahTableMap::translateFieldName('LuasTanahMilik', TableMap::TYPE_PHPNAME, $indexType)];
            $this->luas_tanah_milik = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : SekolahTableMap::translateFieldName('LuasTanahBukanMilik', TableMap::TYPE_PHPNAME, $indexType)];
            $this->luas_tanah_bukan_milik = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : SekolahTableMap::translateFieldName('KodeRegistrasi', TableMap::TYPE_PHPNAME, $indexType)];
            $this->kode_registrasi = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : SekolahTableMap::translateFieldName('Npwp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->npwp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : SekolahTableMap::translateFieldName('NmWp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nm_wp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : SekolahTableMap::translateFieldName('Flag', TableMap::TYPE_PHPNAME, $indexType)];
            $this->flag = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : SekolahTableMap::translateFieldName('CreateDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->create_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : SekolahTableMap::translateFieldName('LastUpdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->last_update = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : SekolahTableMap::translateFieldName('SoftDelete', TableMap::TYPE_PHPNAME, $indexType)];
            $this->soft_delete = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 41 + $startcol : SekolahTableMap::translateFieldName('LastSync', TableMap::TYPE_PHPNAME, $indexType)];
            $this->last_sync = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 42 + $startcol : SekolahTableMap::translateFieldName('UpdaterId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->updater_id = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 43; // 43 = SekolahTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Appdb\\Sekolah'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(SekolahTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSekolahQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collFotos = null;

            $this->collGeotags = null;

            $this->collPenggunas = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Sekolah::setDeleted()
     * @see Sekolah::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SekolahTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSekolahQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SekolahTableMap::DATABASE_NAME);
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
                SekolahTableMap::addInstanceToPool($this);
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

            if ($this->penggunasScheduledForDeletion !== null) {
                if (!$this->penggunasScheduledForDeletion->isEmpty()) {
                    foreach ($this->penggunasScheduledForDeletion as $pengguna) {
                        // need to save related object because we set the relation to null
                        $pengguna->save($con);
                    }
                    $this->penggunasScheduledForDeletion = null;
                }
            }

            if ($this->collPenggunas !== null) {
                foreach ($this->collPenggunas as $referrerFK) {
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
        $pos = SekolahTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getSekolahId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getNamaNomenklatur();
                break;
            case 3:
                return $this->getNss();
                break;
            case 4:
                return $this->getNpsn();
                break;
            case 5:
                return $this->getBentukPendidikanId();
                break;
            case 6:
                return $this->getAlamatJalan();
                break;
            case 7:
                return $this->getRt();
                break;
            case 8:
                return $this->getRw();
                break;
            case 9:
                return $this->getNamaDusun();
                break;
            case 10:
                return $this->getDesaKelurahan();
                break;
            case 11:
                return $this->getKodeWilayah();
                break;
            case 12:
                return $this->getKodePos();
                break;
            case 13:
                return $this->getLintang();
                break;
            case 14:
                return $this->getBujur();
                break;
            case 15:
                return $this->getNomorTelepon();
                break;
            case 16:
                return $this->getNomorFax();
                break;
            case 17:
                return $this->getEmail();
                break;
            case 18:
                return $this->getWebsite();
                break;
            case 19:
                return $this->getKebutuhanKhususId();
                break;
            case 20:
                return $this->getStatusSekolah();
                break;
            case 21:
                return $this->getSkPendirianSekolah();
                break;
            case 22:
                return $this->getTanggalSkPendirian();
                break;
            case 23:
                return $this->getStatusKepemilikanId();
                break;
            case 24:
                return $this->getYayasanId();
                break;
            case 25:
                return $this->getSkIzinOperasional();
                break;
            case 26:
                return $this->getTanggalSkIzinOperasional();
                break;
            case 27:
                return $this->getNoRekening();
                break;
            case 28:
                return $this->getNamaBank();
                break;
            case 29:
                return $this->getCabangKcpUnit();
                break;
            case 30:
                return $this->getRekeningAtasNama();
                break;
            case 31:
                return $this->getMbs();
                break;
            case 32:
                return $this->getLuasTanahMilik();
                break;
            case 33:
                return $this->getLuasTanahBukanMilik();
                break;
            case 34:
                return $this->getKodeRegistrasi();
                break;
            case 35:
                return $this->getNpwp();
                break;
            case 36:
                return $this->getNmWp();
                break;
            case 37:
                return $this->getFlag();
                break;
            case 38:
                return $this->getCreateDate();
                break;
            case 39:
                return $this->getLastUpdate();
                break;
            case 40:
                return $this->getSoftDelete();
                break;
            case 41:
                return $this->getLastSync();
                break;
            case 42:
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

        if (isset($alreadyDumpedObjects['Sekolah'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Sekolah'][$this->hashCode()] = true;
        $keys = SekolahTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSekolahId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getNamaNomenklatur(),
            $keys[3] => $this->getNss(),
            $keys[4] => $this->getNpsn(),
            $keys[5] => $this->getBentukPendidikanId(),
            $keys[6] => $this->getAlamatJalan(),
            $keys[7] => $this->getRt(),
            $keys[8] => $this->getRw(),
            $keys[9] => $this->getNamaDusun(),
            $keys[10] => $this->getDesaKelurahan(),
            $keys[11] => $this->getKodeWilayah(),
            $keys[12] => $this->getKodePos(),
            $keys[13] => $this->getLintang(),
            $keys[14] => $this->getBujur(),
            $keys[15] => $this->getNomorTelepon(),
            $keys[16] => $this->getNomorFax(),
            $keys[17] => $this->getEmail(),
            $keys[18] => $this->getWebsite(),
            $keys[19] => $this->getKebutuhanKhususId(),
            $keys[20] => $this->getStatusSekolah(),
            $keys[21] => $this->getSkPendirianSekolah(),
            $keys[22] => $this->getTanggalSkPendirian(),
            $keys[23] => $this->getStatusKepemilikanId(),
            $keys[24] => $this->getYayasanId(),
            $keys[25] => $this->getSkIzinOperasional(),
            $keys[26] => $this->getTanggalSkIzinOperasional(),
            $keys[27] => $this->getNoRekening(),
            $keys[28] => $this->getNamaBank(),
            $keys[29] => $this->getCabangKcpUnit(),
            $keys[30] => $this->getRekeningAtasNama(),
            $keys[31] => $this->getMbs(),
            $keys[32] => $this->getLuasTanahMilik(),
            $keys[33] => $this->getLuasTanahBukanMilik(),
            $keys[34] => $this->getKodeRegistrasi(),
            $keys[35] => $this->getNpwp(),
            $keys[36] => $this->getNmWp(),
            $keys[37] => $this->getFlag(),
            $keys[38] => $this->getCreateDate(),
            $keys[39] => $this->getLastUpdate(),
            $keys[40] => $this->getSoftDelete(),
            $keys[41] => $this->getLastSync(),
            $keys[42] => $this->getUpdaterId(),
        );
        if ($result[$keys[22]] instanceof \DateTimeInterface) {
            $result[$keys[22]] = $result[$keys[22]]->format('c');
        }

        if ($result[$keys[26]] instanceof \DateTimeInterface) {
            $result[$keys[26]] = $result[$keys[26]]->format('c');
        }

        if ($result[$keys[38]] instanceof \DateTimeInterface) {
            $result[$keys[38]] = $result[$keys[38]]->format('c');
        }

        if ($result[$keys[39]] instanceof \DateTimeInterface) {
            $result[$keys[39]] = $result[$keys[39]]->format('c');
        }

        if ($result[$keys[41]] instanceof \DateTimeInterface) {
            $result[$keys[41]] = $result[$keys[41]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
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
            if (null !== $this->collPenggunas) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'penggunas';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'penggunas';
                        break;
                    default:
                        $key = 'Penggunas';
                }

                $result[$key] = $this->collPenggunas->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Appdb\Sekolah
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = SekolahTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Appdb\Sekolah
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setSekolahId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setNamaNomenklatur($value);
                break;
            case 3:
                $this->setNss($value);
                break;
            case 4:
                $this->setNpsn($value);
                break;
            case 5:
                $this->setBentukPendidikanId($value);
                break;
            case 6:
                $this->setAlamatJalan($value);
                break;
            case 7:
                $this->setRt($value);
                break;
            case 8:
                $this->setRw($value);
                break;
            case 9:
                $this->setNamaDusun($value);
                break;
            case 10:
                $this->setDesaKelurahan($value);
                break;
            case 11:
                $this->setKodeWilayah($value);
                break;
            case 12:
                $this->setKodePos($value);
                break;
            case 13:
                $this->setLintang($value);
                break;
            case 14:
                $this->setBujur($value);
                break;
            case 15:
                $this->setNomorTelepon($value);
                break;
            case 16:
                $this->setNomorFax($value);
                break;
            case 17:
                $this->setEmail($value);
                break;
            case 18:
                $this->setWebsite($value);
                break;
            case 19:
                $this->setKebutuhanKhususId($value);
                break;
            case 20:
                $this->setStatusSekolah($value);
                break;
            case 21:
                $this->setSkPendirianSekolah($value);
                break;
            case 22:
                $this->setTanggalSkPendirian($value);
                break;
            case 23:
                $this->setStatusKepemilikanId($value);
                break;
            case 24:
                $this->setYayasanId($value);
                break;
            case 25:
                $this->setSkIzinOperasional($value);
                break;
            case 26:
                $this->setTanggalSkIzinOperasional($value);
                break;
            case 27:
                $this->setNoRekening($value);
                break;
            case 28:
                $this->setNamaBank($value);
                break;
            case 29:
                $this->setCabangKcpUnit($value);
                break;
            case 30:
                $this->setRekeningAtasNama($value);
                break;
            case 31:
                $this->setMbs($value);
                break;
            case 32:
                $this->setLuasTanahMilik($value);
                break;
            case 33:
                $this->setLuasTanahBukanMilik($value);
                break;
            case 34:
                $this->setKodeRegistrasi($value);
                break;
            case 35:
                $this->setNpwp($value);
                break;
            case 36:
                $this->setNmWp($value);
                break;
            case 37:
                $this->setFlag($value);
                break;
            case 38:
                $this->setCreateDate($value);
                break;
            case 39:
                $this->setLastUpdate($value);
                break;
            case 40:
                $this->setSoftDelete($value);
                break;
            case 41:
                $this->setLastSync($value);
                break;
            case 42:
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
        $keys = SekolahTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setSekolahId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setNama($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setNamaNomenklatur($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setNss($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setNpsn($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setBentukPendidikanId($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setAlamatJalan($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setRt($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setRw($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setNamaDusun($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setDesaKelurahan($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setKodeWilayah($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setKodePos($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setLintang($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setBujur($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setNomorTelepon($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setNomorFax($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setEmail($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setWebsite($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setKebutuhanKhususId($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setStatusSekolah($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setSkPendirianSekolah($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setTanggalSkPendirian($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setStatusKepemilikanId($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setYayasanId($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setSkIzinOperasional($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setTanggalSkIzinOperasional($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setNoRekening($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setNamaBank($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setCabangKcpUnit($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setRekeningAtasNama($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setMbs($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setLuasTanahMilik($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setLuasTanahBukanMilik($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setKodeRegistrasi($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setNpwp($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setNmWp($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setFlag($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setCreateDate($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setLastUpdate($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setSoftDelete($arr[$keys[40]]);
        }
        if (array_key_exists($keys[41], $arr)) {
            $this->setLastSync($arr[$keys[41]]);
        }
        if (array_key_exists($keys[42], $arr)) {
            $this->setUpdaterId($arr[$keys[42]]);
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
     * @return $this|\Appdb\Sekolah The current object, for fluid interface
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
        $criteria = new Criteria(SekolahTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SekolahTableMap::COL_SEKOLAH_ID)) {
            $criteria->add(SekolahTableMap::COL_SEKOLAH_ID, $this->sekolah_id);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_NAMA)) {
            $criteria->add(SekolahTableMap::COL_NAMA, $this->nama);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_NAMA_NOMENKLATUR)) {
            $criteria->add(SekolahTableMap::COL_NAMA_NOMENKLATUR, $this->nama_nomenklatur);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_NSS)) {
            $criteria->add(SekolahTableMap::COL_NSS, $this->nss);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_NPSN)) {
            $criteria->add(SekolahTableMap::COL_NPSN, $this->npsn);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_BENTUK_PENDIDIKAN_ID)) {
            $criteria->add(SekolahTableMap::COL_BENTUK_PENDIDIKAN_ID, $this->bentuk_pendidikan_id);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_ALAMAT_JALAN)) {
            $criteria->add(SekolahTableMap::COL_ALAMAT_JALAN, $this->alamat_jalan);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_RT)) {
            $criteria->add(SekolahTableMap::COL_RT, $this->rt);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_RW)) {
            $criteria->add(SekolahTableMap::COL_RW, $this->rw);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_NAMA_DUSUN)) {
            $criteria->add(SekolahTableMap::COL_NAMA_DUSUN, $this->nama_dusun);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_DESA_KELURAHAN)) {
            $criteria->add(SekolahTableMap::COL_DESA_KELURAHAN, $this->desa_kelurahan);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_KODE_WILAYAH)) {
            $criteria->add(SekolahTableMap::COL_KODE_WILAYAH, $this->kode_wilayah);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_KODE_POS)) {
            $criteria->add(SekolahTableMap::COL_KODE_POS, $this->kode_pos);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_LINTANG)) {
            $criteria->add(SekolahTableMap::COL_LINTANG, $this->lintang);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_BUJUR)) {
            $criteria->add(SekolahTableMap::COL_BUJUR, $this->bujur);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_NOMOR_TELEPON)) {
            $criteria->add(SekolahTableMap::COL_NOMOR_TELEPON, $this->nomor_telepon);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_NOMOR_FAX)) {
            $criteria->add(SekolahTableMap::COL_NOMOR_FAX, $this->nomor_fax);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_EMAIL)) {
            $criteria->add(SekolahTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_WEBSITE)) {
            $criteria->add(SekolahTableMap::COL_WEBSITE, $this->website);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_KEBUTUHAN_KHUSUS_ID)) {
            $criteria->add(SekolahTableMap::COL_KEBUTUHAN_KHUSUS_ID, $this->kebutuhan_khusus_id);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_STATUS_SEKOLAH)) {
            $criteria->add(SekolahTableMap::COL_STATUS_SEKOLAH, $this->status_sekolah);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_SK_PENDIRIAN_SEKOLAH)) {
            $criteria->add(SekolahTableMap::COL_SK_PENDIRIAN_SEKOLAH, $this->sk_pendirian_sekolah);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_TANGGAL_SK_PENDIRIAN)) {
            $criteria->add(SekolahTableMap::COL_TANGGAL_SK_PENDIRIAN, $this->tanggal_sk_pendirian);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_STATUS_KEPEMILIKAN_ID)) {
            $criteria->add(SekolahTableMap::COL_STATUS_KEPEMILIKAN_ID, $this->status_kepemilikan_id);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_YAYASAN_ID)) {
            $criteria->add(SekolahTableMap::COL_YAYASAN_ID, $this->yayasan_id);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_SK_IZIN_OPERASIONAL)) {
            $criteria->add(SekolahTableMap::COL_SK_IZIN_OPERASIONAL, $this->sk_izin_operasional);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_TANGGAL_SK_IZIN_OPERASIONAL)) {
            $criteria->add(SekolahTableMap::COL_TANGGAL_SK_IZIN_OPERASIONAL, $this->tanggal_sk_izin_operasional);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_NO_REKENING)) {
            $criteria->add(SekolahTableMap::COL_NO_REKENING, $this->no_rekening);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_NAMA_BANK)) {
            $criteria->add(SekolahTableMap::COL_NAMA_BANK, $this->nama_bank);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_CABANG_KCP_UNIT)) {
            $criteria->add(SekolahTableMap::COL_CABANG_KCP_UNIT, $this->cabang_kcp_unit);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_REKENING_ATAS_NAMA)) {
            $criteria->add(SekolahTableMap::COL_REKENING_ATAS_NAMA, $this->rekening_atas_nama);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_MBS)) {
            $criteria->add(SekolahTableMap::COL_MBS, $this->mbs);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_LUAS_TANAH_MILIK)) {
            $criteria->add(SekolahTableMap::COL_LUAS_TANAH_MILIK, $this->luas_tanah_milik);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_LUAS_TANAH_BUKAN_MILIK)) {
            $criteria->add(SekolahTableMap::COL_LUAS_TANAH_BUKAN_MILIK, $this->luas_tanah_bukan_milik);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_KODE_REGISTRASI)) {
            $criteria->add(SekolahTableMap::COL_KODE_REGISTRASI, $this->kode_registrasi);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_NPWP)) {
            $criteria->add(SekolahTableMap::COL_NPWP, $this->npwp);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_NM_WP)) {
            $criteria->add(SekolahTableMap::COL_NM_WP, $this->nm_wp);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_FLAG)) {
            $criteria->add(SekolahTableMap::COL_FLAG, $this->flag);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_CREATE_DATE)) {
            $criteria->add(SekolahTableMap::COL_CREATE_DATE, $this->create_date);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_LAST_UPDATE)) {
            $criteria->add(SekolahTableMap::COL_LAST_UPDATE, $this->last_update);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_SOFT_DELETE)) {
            $criteria->add(SekolahTableMap::COL_SOFT_DELETE, $this->soft_delete);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_LAST_SYNC)) {
            $criteria->add(SekolahTableMap::COL_LAST_SYNC, $this->last_sync);
        }
        if ($this->isColumnModified(SekolahTableMap::COL_UPDATER_ID)) {
            $criteria->add(SekolahTableMap::COL_UPDATER_ID, $this->updater_id);
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
        $criteria = ChildSekolahQuery::create();
        $criteria->add(SekolahTableMap::COL_SEKOLAH_ID, $this->sekolah_id);

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
        $validPk = null !== $this->getSekolahId();

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
        return $this->getSekolahId();
    }

    /**
     * Generic method to set the primary key (sekolah_id column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setSekolahId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getSekolahId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Appdb\Sekolah (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setNama($this->getNama());
        $copyObj->setNamaNomenklatur($this->getNamaNomenklatur());
        $copyObj->setNss($this->getNss());
        $copyObj->setNpsn($this->getNpsn());
        $copyObj->setBentukPendidikanId($this->getBentukPendidikanId());
        $copyObj->setAlamatJalan($this->getAlamatJalan());
        $copyObj->setRt($this->getRt());
        $copyObj->setRw($this->getRw());
        $copyObj->setNamaDusun($this->getNamaDusun());
        $copyObj->setDesaKelurahan($this->getDesaKelurahan());
        $copyObj->setKodeWilayah($this->getKodeWilayah());
        $copyObj->setKodePos($this->getKodePos());
        $copyObj->setLintang($this->getLintang());
        $copyObj->setBujur($this->getBujur());
        $copyObj->setNomorTelepon($this->getNomorTelepon());
        $copyObj->setNomorFax($this->getNomorFax());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setWebsite($this->getWebsite());
        $copyObj->setKebutuhanKhususId($this->getKebutuhanKhususId());
        $copyObj->setStatusSekolah($this->getStatusSekolah());
        $copyObj->setSkPendirianSekolah($this->getSkPendirianSekolah());
        $copyObj->setTanggalSkPendirian($this->getTanggalSkPendirian());
        $copyObj->setStatusKepemilikanId($this->getStatusKepemilikanId());
        $copyObj->setYayasanId($this->getYayasanId());
        $copyObj->setSkIzinOperasional($this->getSkIzinOperasional());
        $copyObj->setTanggalSkIzinOperasional($this->getTanggalSkIzinOperasional());
        $copyObj->setNoRekening($this->getNoRekening());
        $copyObj->setNamaBank($this->getNamaBank());
        $copyObj->setCabangKcpUnit($this->getCabangKcpUnit());
        $copyObj->setRekeningAtasNama($this->getRekeningAtasNama());
        $copyObj->setMbs($this->getMbs());
        $copyObj->setLuasTanahMilik($this->getLuasTanahMilik());
        $copyObj->setLuasTanahBukanMilik($this->getLuasTanahBukanMilik());
        $copyObj->setKodeRegistrasi($this->getKodeRegistrasi());
        $copyObj->setNpwp($this->getNpwp());
        $copyObj->setNmWp($this->getNmWp());
        $copyObj->setFlag($this->getFlag());
        $copyObj->setCreateDate($this->getCreateDate());
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

            foreach ($this->getPenggunas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPengguna($relObj->copy($deepCopy));
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
     * @return \Appdb\Sekolah Clone of current object.
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
        if ('Pengguna' == $relationName) {
            $this->initPenggunas();
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
     * If this ChildSekolah is new, it will return
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
                    ->filterBySekolah($this)
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
     * @return $this|ChildSekolah The current object (for fluent API support)
     */
    public function setFotos(Collection $fotos, ConnectionInterface $con = null)
    {
        /** @var ChildFoto[] $fotosToDelete */
        $fotosToDelete = $this->getFotos(new Criteria(), $con)->diff($fotos);


        $this->fotosScheduledForDeletion = $fotosToDelete;

        foreach ($fotosToDelete as $fotoRemoved) {
            $fotoRemoved->setSekolah(null);
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
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collFotos);
    }

    /**
     * Method called to associate a ChildFoto object to this object
     * through the ChildFoto foreign key attribute.
     *
     * @param  ChildFoto $l ChildFoto
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
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
        $foto->setSekolah($this);
    }

    /**
     * @param  ChildFoto $foto The ChildFoto object to remove.
     * @return $this|ChildSekolah The current object (for fluent API support)
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
            $foto->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Fotos from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Fotos from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildFoto[] List of ChildFoto objects
     */
    public function getFotosJoinPengguna(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildFotoQuery::create(null, $criteria);
        $query->joinWith('Pengguna', $joinBehavior);

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
     * If this ChildSekolah is new, it will return
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
                    ->filterBySekolah($this)
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
     * @return $this|ChildSekolah The current object (for fluent API support)
     */
    public function setGeotags(Collection $geotags, ConnectionInterface $con = null)
    {
        /** @var ChildGeotag[] $geotagsToDelete */
        $geotagsToDelete = $this->getGeotags(new Criteria(), $con)->diff($geotags);


        $this->geotagsScheduledForDeletion = $geotagsToDelete;

        foreach ($geotagsToDelete as $geotagRemoved) {
            $geotagRemoved->setSekolah(null);
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
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collGeotags);
    }

    /**
     * Method called to associate a ChildGeotag object to this object
     * through the ChildGeotag foreign key attribute.
     *
     * @param  ChildGeotag $l ChildGeotag
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
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
        $geotag->setSekolah($this);
    }

    /**
     * @param  ChildGeotag $geotag The ChildGeotag object to remove.
     * @return $this|ChildSekolah The current object (for fluent API support)
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
            $geotag->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Geotags from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildGeotag[] List of ChildGeotag objects
     */
    public function getGeotagsJoinPengguna(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildGeotagQuery::create(null, $criteria);
        $query->joinWith('Pengguna', $joinBehavior);

        return $this->getGeotags($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Geotags from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Clears out the collPenggunas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPenggunas()
     */
    public function clearPenggunas()
    {
        $this->collPenggunas = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPenggunas collection loaded partially.
     */
    public function resetPartialPenggunas($v = true)
    {
        $this->collPenggunasPartial = $v;
    }

    /**
     * Initializes the collPenggunas collection.
     *
     * By default this just sets the collPenggunas collection to an empty array (like clearcollPenggunas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPenggunas($overrideExisting = true)
    {
        if (null !== $this->collPenggunas && !$overrideExisting) {
            return;
        }

        $collectionClassName = PenggunaTableMap::getTableMap()->getCollectionClassName();

        $this->collPenggunas = new $collectionClassName;
        $this->collPenggunas->setModel('\Appdb\Pengguna');
    }

    /**
     * Gets an array of ChildPengguna objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPengguna[] List of ChildPengguna objects
     * @throws PropelException
     */
    public function getPenggunas(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPenggunasPartial && !$this->isNew();
        if (null === $this->collPenggunas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPenggunas) {
                // return empty collection
                $this->initPenggunas();
            } else {
                $collPenggunas = ChildPenggunaQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPenggunasPartial && count($collPenggunas)) {
                        $this->initPenggunas(false);

                        foreach ($collPenggunas as $obj) {
                            if (false == $this->collPenggunas->contains($obj)) {
                                $this->collPenggunas->append($obj);
                            }
                        }

                        $this->collPenggunasPartial = true;
                    }

                    return $collPenggunas;
                }

                if ($partial && $this->collPenggunas) {
                    foreach ($this->collPenggunas as $obj) {
                        if ($obj->isNew()) {
                            $collPenggunas[] = $obj;
                        }
                    }
                }

                $this->collPenggunas = $collPenggunas;
                $this->collPenggunasPartial = false;
            }
        }

        return $this->collPenggunas;
    }

    /**
     * Sets a collection of ChildPengguna objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $penggunas A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSekolah The current object (for fluent API support)
     */
    public function setPenggunas(Collection $penggunas, ConnectionInterface $con = null)
    {
        /** @var ChildPengguna[] $penggunasToDelete */
        $penggunasToDelete = $this->getPenggunas(new Criteria(), $con)->diff($penggunas);


        $this->penggunasScheduledForDeletion = $penggunasToDelete;

        foreach ($penggunasToDelete as $penggunaRemoved) {
            $penggunaRemoved->setSekolah(null);
        }

        $this->collPenggunas = null;
        foreach ($penggunas as $pengguna) {
            $this->addPengguna($pengguna);
        }

        $this->collPenggunas = $penggunas;
        $this->collPenggunasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Pengguna objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Pengguna objects.
     * @throws PropelException
     */
    public function countPenggunas(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPenggunasPartial && !$this->isNew();
        if (null === $this->collPenggunas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPenggunas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPenggunas());
            }

            $query = ChildPenggunaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collPenggunas);
    }

    /**
     * Method called to associate a ChildPengguna object to this object
     * through the ChildPengguna foreign key attribute.
     *
     * @param  ChildPengguna $l ChildPengguna
     * @return $this|\Appdb\Sekolah The current object (for fluent API support)
     */
    public function addPengguna(ChildPengguna $l)
    {
        if ($this->collPenggunas === null) {
            $this->initPenggunas();
            $this->collPenggunasPartial = true;
        }

        if (!$this->collPenggunas->contains($l)) {
            $this->doAddPengguna($l);

            if ($this->penggunasScheduledForDeletion and $this->penggunasScheduledForDeletion->contains($l)) {
                $this->penggunasScheduledForDeletion->remove($this->penggunasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildPengguna $pengguna The ChildPengguna object to add.
     */
    protected function doAddPengguna(ChildPengguna $pengguna)
    {
        $this->collPenggunas[]= $pengguna;
        $pengguna->setSekolah($this);
    }

    /**
     * @param  ChildPengguna $pengguna The ChildPengguna object to remove.
     * @return $this|ChildSekolah The current object (for fluent API support)
     */
    public function removePengguna(ChildPengguna $pengguna)
    {
        if ($this->getPenggunas()->contains($pengguna)) {
            $pos = $this->collPenggunas->search($pengguna);
            $this->collPenggunas->remove($pos);
            if (null === $this->penggunasScheduledForDeletion) {
                $this->penggunasScheduledForDeletion = clone $this->collPenggunas;
                $this->penggunasScheduledForDeletion->clear();
            }
            $this->penggunasScheduledForDeletion[]= $pengguna;
            $pengguna->setSekolah(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->sekolah_id = null;
        $this->nama = null;
        $this->nama_nomenklatur = null;
        $this->nss = null;
        $this->npsn = null;
        $this->bentuk_pendidikan_id = null;
        $this->alamat_jalan = null;
        $this->rt = null;
        $this->rw = null;
        $this->nama_dusun = null;
        $this->desa_kelurahan = null;
        $this->kode_wilayah = null;
        $this->kode_pos = null;
        $this->lintang = null;
        $this->bujur = null;
        $this->nomor_telepon = null;
        $this->nomor_fax = null;
        $this->email = null;
        $this->website = null;
        $this->kebutuhan_khusus_id = null;
        $this->status_sekolah = null;
        $this->sk_pendirian_sekolah = null;
        $this->tanggal_sk_pendirian = null;
        $this->status_kepemilikan_id = null;
        $this->yayasan_id = null;
        $this->sk_izin_operasional = null;
        $this->tanggal_sk_izin_operasional = null;
        $this->no_rekening = null;
        $this->nama_bank = null;
        $this->cabang_kcp_unit = null;
        $this->rekening_atas_nama = null;
        $this->mbs = null;
        $this->luas_tanah_milik = null;
        $this->luas_tanah_bukan_milik = null;
        $this->kode_registrasi = null;
        $this->npwp = null;
        $this->nm_wp = null;
        $this->flag = null;
        $this->create_date = null;
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
            if ($this->collPenggunas) {
                foreach ($this->collPenggunas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collFotos = null;
        $this->collGeotags = null;
        $this->collPenggunas = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SekolahTableMap::DEFAULT_STRING_FORMAT);
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
