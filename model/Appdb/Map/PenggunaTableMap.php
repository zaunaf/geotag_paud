<?php

namespace Appdb\Map;

use Appdb\Pengguna;
use Appdb\PenggunaQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'pengguna' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PenggunaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Appdb.Map.PenggunaTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'appdb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'pengguna';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Appdb\\Pengguna';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Appdb.Pengguna';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 26;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 26;

    /**
     * the column name for the pengguna_id field
     */
    const COL_PENGGUNA_ID = 'pengguna.pengguna_id';

    /**
     * the column name for the sekolah_id field
     */
    const COL_SEKOLAH_ID = 'pengguna.sekolah_id';

    /**
     * the column name for the username field
     */
    const COL_USERNAME = 'pengguna.username';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'pengguna.password';

    /**
     * the column name for the nama field
     */
    const COL_NAMA = 'pengguna.nama';

    /**
     * the column name for the nip_nim field
     */
    const COL_NIP_NIM = 'pengguna.nip_nim';

    /**
     * the column name for the jabatan_lembaga field
     */
    const COL_JABATAN_LEMBAGA = 'pengguna.jabatan_lembaga';

    /**
     * the column name for the ym field
     */
    const COL_YM = 'pengguna.ym';

    /**
     * the column name for the skype field
     */
    const COL_SKYPE = 'pengguna.skype';

    /**
     * the column name for the alamat field
     */
    const COL_ALAMAT = 'pengguna.alamat';

    /**
     * the column name for the kode_wilayah field
     */
    const COL_KODE_WILAYAH = 'pengguna.kode_wilayah';

    /**
     * the column name for the no_telepon field
     */
    const COL_NO_TELEPON = 'pengguna.no_telepon';

    /**
     * the column name for the no_hp field
     */
    const COL_NO_HP = 'pengguna.no_hp';

    /**
     * the column name for the aktif field
     */
    const COL_AKTIF = 'pengguna.aktif';

    /**
     * the column name for the ptk_id field
     */
    const COL_PTK_ID = 'pengguna.ptk_id';

    /**
     * the column name for the peran_id field
     */
    const COL_PERAN_ID = 'pengguna.peran_id';

    /**
     * the column name for the lembaga_id field
     */
    const COL_LEMBAGA_ID = 'pengguna.lembaga_id';

    /**
     * the column name for the yayasan_id field
     */
    const COL_YAYASAN_ID = 'pengguna.yayasan_id';

    /**
     * the column name for the la_id field
     */
    const COL_LA_ID = 'pengguna.la_id';

    /**
     * the column name for the dudi_id field
     */
    const COL_DUDI_ID = 'pengguna.dudi_id';

    /**
     * the column name for the create_date field
     */
    const COL_CREATE_DATE = 'pengguna.create_date';

    /**
     * the column name for the roles field
     */
    const COL_ROLES = 'pengguna.roles';

    /**
     * the column name for the last_update field
     */
    const COL_LAST_UPDATE = 'pengguna.last_update';

    /**
     * the column name for the soft_delete field
     */
    const COL_SOFT_DELETE = 'pengguna.soft_delete';

    /**
     * the column name for the last_sync field
     */
    const COL_LAST_SYNC = 'pengguna.last_sync';

    /**
     * the column name for the updater_id field
     */
    const COL_UPDATER_ID = 'pengguna.updater_id';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('PenggunaId', 'SekolahId', 'Username', 'Password', 'Nama', 'NipNim', 'JabatanLembaga', 'Ym', 'Skype', 'Alamat', 'KodeWilayah', 'NoTelepon', 'NoHp', 'Aktif', 'PtkId', 'PeranId', 'LembagaId', 'YayasanId', 'LaId', 'DudiId', 'CreateDate', 'Roles', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        self::TYPE_CAMELNAME     => array('penggunaId', 'sekolahId', 'username', 'password', 'nama', 'nipNim', 'jabatanLembaga', 'ym', 'skype', 'alamat', 'kodeWilayah', 'noTelepon', 'noHp', 'aktif', 'ptkId', 'peranId', 'lembagaId', 'yayasanId', 'laId', 'dudiId', 'createDate', 'roles', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        self::TYPE_COLNAME       => array(PenggunaTableMap::COL_PENGGUNA_ID, PenggunaTableMap::COL_SEKOLAH_ID, PenggunaTableMap::COL_USERNAME, PenggunaTableMap::COL_PASSWORD, PenggunaTableMap::COL_NAMA, PenggunaTableMap::COL_NIP_NIM, PenggunaTableMap::COL_JABATAN_LEMBAGA, PenggunaTableMap::COL_YM, PenggunaTableMap::COL_SKYPE, PenggunaTableMap::COL_ALAMAT, PenggunaTableMap::COL_KODE_WILAYAH, PenggunaTableMap::COL_NO_TELEPON, PenggunaTableMap::COL_NO_HP, PenggunaTableMap::COL_AKTIF, PenggunaTableMap::COL_PTK_ID, PenggunaTableMap::COL_PERAN_ID, PenggunaTableMap::COL_LEMBAGA_ID, PenggunaTableMap::COL_YAYASAN_ID, PenggunaTableMap::COL_LA_ID, PenggunaTableMap::COL_DUDI_ID, PenggunaTableMap::COL_CREATE_DATE, PenggunaTableMap::COL_ROLES, PenggunaTableMap::COL_LAST_UPDATE, PenggunaTableMap::COL_SOFT_DELETE, PenggunaTableMap::COL_LAST_SYNC, PenggunaTableMap::COL_UPDATER_ID, ),
        self::TYPE_FIELDNAME     => array('pengguna_id', 'sekolah_id', 'username', 'password', 'nama', 'nip_nim', 'jabatan_lembaga', 'ym', 'skype', 'alamat', 'kode_wilayah', 'no_telepon', 'no_hp', 'aktif', 'ptk_id', 'peran_id', 'lembaga_id', 'yayasan_id', 'la_id', 'dudi_id', 'create_date', 'roles', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('PenggunaId' => 0, 'SekolahId' => 1, 'Username' => 2, 'Password' => 3, 'Nama' => 4, 'NipNim' => 5, 'JabatanLembaga' => 6, 'Ym' => 7, 'Skype' => 8, 'Alamat' => 9, 'KodeWilayah' => 10, 'NoTelepon' => 11, 'NoHp' => 12, 'Aktif' => 13, 'PtkId' => 14, 'PeranId' => 15, 'LembagaId' => 16, 'YayasanId' => 17, 'LaId' => 18, 'DudiId' => 19, 'CreateDate' => 20, 'Roles' => 21, 'LastUpdate' => 22, 'SoftDelete' => 23, 'LastSync' => 24, 'UpdaterId' => 25, ),
        self::TYPE_CAMELNAME     => array('penggunaId' => 0, 'sekolahId' => 1, 'username' => 2, 'password' => 3, 'nama' => 4, 'nipNim' => 5, 'jabatanLembaga' => 6, 'ym' => 7, 'skype' => 8, 'alamat' => 9, 'kodeWilayah' => 10, 'noTelepon' => 11, 'noHp' => 12, 'aktif' => 13, 'ptkId' => 14, 'peranId' => 15, 'lembagaId' => 16, 'yayasanId' => 17, 'laId' => 18, 'dudiId' => 19, 'createDate' => 20, 'roles' => 21, 'lastUpdate' => 22, 'softDelete' => 23, 'lastSync' => 24, 'updaterId' => 25, ),
        self::TYPE_COLNAME       => array(PenggunaTableMap::COL_PENGGUNA_ID => 0, PenggunaTableMap::COL_SEKOLAH_ID => 1, PenggunaTableMap::COL_USERNAME => 2, PenggunaTableMap::COL_PASSWORD => 3, PenggunaTableMap::COL_NAMA => 4, PenggunaTableMap::COL_NIP_NIM => 5, PenggunaTableMap::COL_JABATAN_LEMBAGA => 6, PenggunaTableMap::COL_YM => 7, PenggunaTableMap::COL_SKYPE => 8, PenggunaTableMap::COL_ALAMAT => 9, PenggunaTableMap::COL_KODE_WILAYAH => 10, PenggunaTableMap::COL_NO_TELEPON => 11, PenggunaTableMap::COL_NO_HP => 12, PenggunaTableMap::COL_AKTIF => 13, PenggunaTableMap::COL_PTK_ID => 14, PenggunaTableMap::COL_PERAN_ID => 15, PenggunaTableMap::COL_LEMBAGA_ID => 16, PenggunaTableMap::COL_YAYASAN_ID => 17, PenggunaTableMap::COL_LA_ID => 18, PenggunaTableMap::COL_DUDI_ID => 19, PenggunaTableMap::COL_CREATE_DATE => 20, PenggunaTableMap::COL_ROLES => 21, PenggunaTableMap::COL_LAST_UPDATE => 22, PenggunaTableMap::COL_SOFT_DELETE => 23, PenggunaTableMap::COL_LAST_SYNC => 24, PenggunaTableMap::COL_UPDATER_ID => 25, ),
        self::TYPE_FIELDNAME     => array('pengguna_id' => 0, 'sekolah_id' => 1, 'username' => 2, 'password' => 3, 'nama' => 4, 'nip_nim' => 5, 'jabatan_lembaga' => 6, 'ym' => 7, 'skype' => 8, 'alamat' => 9, 'kode_wilayah' => 10, 'no_telepon' => 11, 'no_hp' => 12, 'aktif' => 13, 'ptk_id' => 14, 'peran_id' => 15, 'lembaga_id' => 16, 'yayasan_id' => 17, 'la_id' => 18, 'dudi_id' => 19, 'create_date' => 20, 'roles' => 21, 'last_update' => 22, 'soft_delete' => 23, 'last_sync' => 24, 'updater_id' => 25, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('pengguna');
        $this->setPhpName('Pengguna');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Appdb\\Pengguna');
        $this->setPackage('Appdb');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('pengguna_id', 'PenggunaId', 'CHAR', true, 16, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'CHAR', 'sekolah', 'sekolah_id', false, 16, null);
        $this->addColumn('username', 'Username', 'VARCHAR', true, 60, null);
        $this->addColumn('password', 'Password', 'VARCHAR', true, 50, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 100, null);
        $this->addColumn('nip_nim', 'NipNim', 'VARCHAR', false, 18, null);
        $this->addColumn('jabatan_lembaga', 'JabatanLembaga', 'VARCHAR', false, 25, null);
        $this->addColumn('ym', 'Ym', 'VARCHAR', false, 20, null);
        $this->addColumn('skype', 'Skype', 'VARCHAR', false, 20, null);
        $this->addColumn('alamat', 'Alamat', 'VARCHAR', false, 80, null);
        $this->addColumn('kode_wilayah', 'KodeWilayah', 'CHAR', true, 8, null);
        $this->addColumn('no_telepon', 'NoTelepon', 'VARCHAR', false, 20, null);
        $this->addColumn('no_hp', 'NoHp', 'VARCHAR', false, 20, null);
        $this->addColumn('aktif', 'Aktif', 'NUMERIC', true, 3, null);
        $this->addColumn('ptk_id', 'PtkId', 'VARCHAR', false, 36, null);
        $this->addColumn('peran_id', 'PeranId', 'INTEGER', true, 4, null);
        $this->addColumn('lembaga_id', 'LembagaId', 'VARCHAR', false, 36, null);
        $this->addColumn('yayasan_id', 'YayasanId', 'VARCHAR', false, 36, null);
        $this->addColumn('la_id', 'LaId', 'CHAR', false, 5, null);
        $this->addColumn('dudi_id', 'DudiId', 'VARCHAR', false, 36, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, 16, null);
        $this->addColumn('roles', 'Roles', 'LONGVARCHAR', false, 2147483647, null);
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', false, 16, null);
        $this->addColumn('soft_delete', 'SoftDelete', 'NUMERIC', false, 3, null);
        $this->addColumn('last_sync', 'LastSync', 'TIMESTAMP', false, 16, null);
        $this->addColumn('updater_id', 'UpdaterId', 'VARCHAR', false, 36, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Sekolah', '\\Appdb\\Sekolah', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':sekolah_id',
    1 => ':sekolah_id',
  ),
), null, null, null, false);
        $this->addRelation('Foto', '\\Appdb\\Foto', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':pengguna_id',
    1 => ':pengguna_id',
  ),
), null, null, 'Fotos', false);
        $this->addRelation('Geotag', '\\Appdb\\Geotag', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':pengguna_id',
    1 => ':pengguna_id',
  ),
), null, null, 'Geotags', false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PenggunaId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PenggunaId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PenggunaId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PenggunaId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PenggunaId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PenggunaId', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('PenggunaId', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? PenggunaTableMap::CLASS_DEFAULT : PenggunaTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Pengguna object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PenggunaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PenggunaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PenggunaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PenggunaTableMap::OM_CLASS;
            /** @var Pengguna $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PenggunaTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = PenggunaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PenggunaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Pengguna $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PenggunaTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(PenggunaTableMap::COL_PENGGUNA_ID);
            $criteria->addSelectColumn(PenggunaTableMap::COL_SEKOLAH_ID);
            $criteria->addSelectColumn(PenggunaTableMap::COL_USERNAME);
            $criteria->addSelectColumn(PenggunaTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(PenggunaTableMap::COL_NAMA);
            $criteria->addSelectColumn(PenggunaTableMap::COL_NIP_NIM);
            $criteria->addSelectColumn(PenggunaTableMap::COL_JABATAN_LEMBAGA);
            $criteria->addSelectColumn(PenggunaTableMap::COL_YM);
            $criteria->addSelectColumn(PenggunaTableMap::COL_SKYPE);
            $criteria->addSelectColumn(PenggunaTableMap::COL_ALAMAT);
            $criteria->addSelectColumn(PenggunaTableMap::COL_KODE_WILAYAH);
            $criteria->addSelectColumn(PenggunaTableMap::COL_NO_TELEPON);
            $criteria->addSelectColumn(PenggunaTableMap::COL_NO_HP);
            $criteria->addSelectColumn(PenggunaTableMap::COL_AKTIF);
            $criteria->addSelectColumn(PenggunaTableMap::COL_PTK_ID);
            $criteria->addSelectColumn(PenggunaTableMap::COL_PERAN_ID);
            $criteria->addSelectColumn(PenggunaTableMap::COL_LEMBAGA_ID);
            $criteria->addSelectColumn(PenggunaTableMap::COL_YAYASAN_ID);
            $criteria->addSelectColumn(PenggunaTableMap::COL_LA_ID);
            $criteria->addSelectColumn(PenggunaTableMap::COL_DUDI_ID);
            $criteria->addSelectColumn(PenggunaTableMap::COL_CREATE_DATE);
            $criteria->addSelectColumn(PenggunaTableMap::COL_ROLES);
            $criteria->addSelectColumn(PenggunaTableMap::COL_LAST_UPDATE);
            $criteria->addSelectColumn(PenggunaTableMap::COL_SOFT_DELETE);
            $criteria->addSelectColumn(PenggunaTableMap::COL_LAST_SYNC);
            $criteria->addSelectColumn(PenggunaTableMap::COL_UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.pengguna_id');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.username');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.nip_nim');
            $criteria->addSelectColumn($alias . '.jabatan_lembaga');
            $criteria->addSelectColumn($alias . '.ym');
            $criteria->addSelectColumn($alias . '.skype');
            $criteria->addSelectColumn($alias . '.alamat');
            $criteria->addSelectColumn($alias . '.kode_wilayah');
            $criteria->addSelectColumn($alias . '.no_telepon');
            $criteria->addSelectColumn($alias . '.no_hp');
            $criteria->addSelectColumn($alias . '.aktif');
            $criteria->addSelectColumn($alias . '.ptk_id');
            $criteria->addSelectColumn($alias . '.peran_id');
            $criteria->addSelectColumn($alias . '.lembaga_id');
            $criteria->addSelectColumn($alias . '.yayasan_id');
            $criteria->addSelectColumn($alias . '.la_id');
            $criteria->addSelectColumn($alias . '.dudi_id');
            $criteria->addSelectColumn($alias . '.create_date');
            $criteria->addSelectColumn($alias . '.roles');
            $criteria->addSelectColumn($alias . '.last_update');
            $criteria->addSelectColumn($alias . '.soft_delete');
            $criteria->addSelectColumn($alias . '.last_sync');
            $criteria->addSelectColumn($alias . '.updater_id');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(PenggunaTableMap::DATABASE_NAME)->getTable(PenggunaTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PenggunaTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PenggunaTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PenggunaTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Pengguna or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Pengguna object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PenggunaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Appdb\Pengguna) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PenggunaTableMap::DATABASE_NAME);
            $criteria->add(PenggunaTableMap::COL_PENGGUNA_ID, (array) $values, Criteria::IN);
        }

        $query = PenggunaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PenggunaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PenggunaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the pengguna table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PenggunaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Pengguna or Criteria object.
     *
     * @param mixed               $criteria Criteria or Pengguna object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PenggunaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Pengguna object
        }


        // Set the correct dbName
        $query = PenggunaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PenggunaTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PenggunaTableMap::buildTableMap();
