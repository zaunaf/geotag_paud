<?php

namespace Appdb\Base;

use \Exception;
use \PDO;
use Appdb\Pengguna as ChildPengguna;
use Appdb\PenggunaQuery as ChildPenggunaQuery;
use Appdb\Map\PenggunaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'pengguna' table.
 *
 *
 *
 * @method     ChildPenggunaQuery orderByPenggunaId($order = Criteria::ASC) Order by the pengguna_id column
 * @method     ChildPenggunaQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method     ChildPenggunaQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildPenggunaQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildPenggunaQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method     ChildPenggunaQuery orderByNipNim($order = Criteria::ASC) Order by the nip_nim column
 * @method     ChildPenggunaQuery orderByJabatanLembaga($order = Criteria::ASC) Order by the jabatan_lembaga column
 * @method     ChildPenggunaQuery orderByYm($order = Criteria::ASC) Order by the ym column
 * @method     ChildPenggunaQuery orderBySkype($order = Criteria::ASC) Order by the skype column
 * @method     ChildPenggunaQuery orderByAlamat($order = Criteria::ASC) Order by the alamat column
 * @method     ChildPenggunaQuery orderByKodeWilayah($order = Criteria::ASC) Order by the kode_wilayah column
 * @method     ChildPenggunaQuery orderByNoTelepon($order = Criteria::ASC) Order by the no_telepon column
 * @method     ChildPenggunaQuery orderByNoHp($order = Criteria::ASC) Order by the no_hp column
 * @method     ChildPenggunaQuery orderByAktif($order = Criteria::ASC) Order by the aktif column
 * @method     ChildPenggunaQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method     ChildPenggunaQuery orderByPeranId($order = Criteria::ASC) Order by the peran_id column
 * @method     ChildPenggunaQuery orderByLembagaId($order = Criteria::ASC) Order by the lembaga_id column
 * @method     ChildPenggunaQuery orderByYayasanId($order = Criteria::ASC) Order by the yayasan_id column
 * @method     ChildPenggunaQuery orderByLaId($order = Criteria::ASC) Order by the la_id column
 * @method     ChildPenggunaQuery orderByDudiId($order = Criteria::ASC) Order by the dudi_id column
 * @method     ChildPenggunaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method     ChildPenggunaQuery orderByRoles($order = Criteria::ASC) Order by the roles column
 * @method     ChildPenggunaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method     ChildPenggunaQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method     ChildPenggunaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method     ChildPenggunaQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method     ChildPenggunaQuery groupByPenggunaId() Group by the pengguna_id column
 * @method     ChildPenggunaQuery groupBySekolahId() Group by the sekolah_id column
 * @method     ChildPenggunaQuery groupByUsername() Group by the username column
 * @method     ChildPenggunaQuery groupByPassword() Group by the password column
 * @method     ChildPenggunaQuery groupByNama() Group by the nama column
 * @method     ChildPenggunaQuery groupByNipNim() Group by the nip_nim column
 * @method     ChildPenggunaQuery groupByJabatanLembaga() Group by the jabatan_lembaga column
 * @method     ChildPenggunaQuery groupByYm() Group by the ym column
 * @method     ChildPenggunaQuery groupBySkype() Group by the skype column
 * @method     ChildPenggunaQuery groupByAlamat() Group by the alamat column
 * @method     ChildPenggunaQuery groupByKodeWilayah() Group by the kode_wilayah column
 * @method     ChildPenggunaQuery groupByNoTelepon() Group by the no_telepon column
 * @method     ChildPenggunaQuery groupByNoHp() Group by the no_hp column
 * @method     ChildPenggunaQuery groupByAktif() Group by the aktif column
 * @method     ChildPenggunaQuery groupByPtkId() Group by the ptk_id column
 * @method     ChildPenggunaQuery groupByPeranId() Group by the peran_id column
 * @method     ChildPenggunaQuery groupByLembagaId() Group by the lembaga_id column
 * @method     ChildPenggunaQuery groupByYayasanId() Group by the yayasan_id column
 * @method     ChildPenggunaQuery groupByLaId() Group by the la_id column
 * @method     ChildPenggunaQuery groupByDudiId() Group by the dudi_id column
 * @method     ChildPenggunaQuery groupByCreateDate() Group by the create_date column
 * @method     ChildPenggunaQuery groupByRoles() Group by the roles column
 * @method     ChildPenggunaQuery groupByLastUpdate() Group by the last_update column
 * @method     ChildPenggunaQuery groupBySoftDelete() Group by the soft_delete column
 * @method     ChildPenggunaQuery groupByLastSync() Group by the last_sync column
 * @method     ChildPenggunaQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method     ChildPenggunaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPenggunaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPenggunaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPenggunaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPenggunaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPenggunaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPenggunaQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method     ChildPenggunaQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method     ChildPenggunaQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method     ChildPenggunaQuery joinWithSekolah($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Sekolah relation
 *
 * @method     ChildPenggunaQuery leftJoinWithSekolah() Adds a LEFT JOIN clause and with to the query using the Sekolah relation
 * @method     ChildPenggunaQuery rightJoinWithSekolah() Adds a RIGHT JOIN clause and with to the query using the Sekolah relation
 * @method     ChildPenggunaQuery innerJoinWithSekolah() Adds a INNER JOIN clause and with to the query using the Sekolah relation
 *
 * @method     ChildPenggunaQuery leftJoinFoto($relationAlias = null) Adds a LEFT JOIN clause to the query using the Foto relation
 * @method     ChildPenggunaQuery rightJoinFoto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Foto relation
 * @method     ChildPenggunaQuery innerJoinFoto($relationAlias = null) Adds a INNER JOIN clause to the query using the Foto relation
 *
 * @method     ChildPenggunaQuery joinWithFoto($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Foto relation
 *
 * @method     ChildPenggunaQuery leftJoinWithFoto() Adds a LEFT JOIN clause and with to the query using the Foto relation
 * @method     ChildPenggunaQuery rightJoinWithFoto() Adds a RIGHT JOIN clause and with to the query using the Foto relation
 * @method     ChildPenggunaQuery innerJoinWithFoto() Adds a INNER JOIN clause and with to the query using the Foto relation
 *
 * @method     ChildPenggunaQuery leftJoinGeotag($relationAlias = null) Adds a LEFT JOIN clause to the query using the Geotag relation
 * @method     ChildPenggunaQuery rightJoinGeotag($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Geotag relation
 * @method     ChildPenggunaQuery innerJoinGeotag($relationAlias = null) Adds a INNER JOIN clause to the query using the Geotag relation
 *
 * @method     ChildPenggunaQuery joinWithGeotag($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Geotag relation
 *
 * @method     ChildPenggunaQuery leftJoinWithGeotag() Adds a LEFT JOIN clause and with to the query using the Geotag relation
 * @method     ChildPenggunaQuery rightJoinWithGeotag() Adds a RIGHT JOIN clause and with to the query using the Geotag relation
 * @method     ChildPenggunaQuery innerJoinWithGeotag() Adds a INNER JOIN clause and with to the query using the Geotag relation
 *
 * @method     \Appdb\SekolahQuery|\Appdb\FotoQuery|\Appdb\GeotagQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPengguna findOne(ConnectionInterface $con = null) Return the first ChildPengguna matching the query
 * @method     ChildPengguna findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPengguna matching the query, or a new ChildPengguna object populated from the query conditions when no match is found
 *
 * @method     ChildPengguna findOneByPenggunaId(string $pengguna_id) Return the first ChildPengguna filtered by the pengguna_id column
 * @method     ChildPengguna findOneBySekolahId(string $sekolah_id) Return the first ChildPengguna filtered by the sekolah_id column
 * @method     ChildPengguna findOneByUsername(string $username) Return the first ChildPengguna filtered by the username column
 * @method     ChildPengguna findOneByPassword(string $password) Return the first ChildPengguna filtered by the password column
 * @method     ChildPengguna findOneByNama(string $nama) Return the first ChildPengguna filtered by the nama column
 * @method     ChildPengguna findOneByNipNim(string $nip_nim) Return the first ChildPengguna filtered by the nip_nim column
 * @method     ChildPengguna findOneByJabatanLembaga(string $jabatan_lembaga) Return the first ChildPengguna filtered by the jabatan_lembaga column
 * @method     ChildPengguna findOneByYm(string $ym) Return the first ChildPengguna filtered by the ym column
 * @method     ChildPengguna findOneBySkype(string $skype) Return the first ChildPengguna filtered by the skype column
 * @method     ChildPengguna findOneByAlamat(string $alamat) Return the first ChildPengguna filtered by the alamat column
 * @method     ChildPengguna findOneByKodeWilayah(string $kode_wilayah) Return the first ChildPengguna filtered by the kode_wilayah column
 * @method     ChildPengguna findOneByNoTelepon(string $no_telepon) Return the first ChildPengguna filtered by the no_telepon column
 * @method     ChildPengguna findOneByNoHp(string $no_hp) Return the first ChildPengguna filtered by the no_hp column
 * @method     ChildPengguna findOneByAktif(string $aktif) Return the first ChildPengguna filtered by the aktif column
 * @method     ChildPengguna findOneByPtkId(string $ptk_id) Return the first ChildPengguna filtered by the ptk_id column
 * @method     ChildPengguna findOneByPeranId(int $peran_id) Return the first ChildPengguna filtered by the peran_id column
 * @method     ChildPengguna findOneByLembagaId(string $lembaga_id) Return the first ChildPengguna filtered by the lembaga_id column
 * @method     ChildPengguna findOneByYayasanId(string $yayasan_id) Return the first ChildPengguna filtered by the yayasan_id column
 * @method     ChildPengguna findOneByLaId(string $la_id) Return the first ChildPengguna filtered by the la_id column
 * @method     ChildPengguna findOneByDudiId(string $dudi_id) Return the first ChildPengguna filtered by the dudi_id column
 * @method     ChildPengguna findOneByCreateDate(string $create_date) Return the first ChildPengguna filtered by the create_date column
 * @method     ChildPengguna findOneByRoles(string $roles) Return the first ChildPengguna filtered by the roles column
 * @method     ChildPengguna findOneByLastUpdate(string $last_update) Return the first ChildPengguna filtered by the last_update column
 * @method     ChildPengguna findOneBySoftDelete(string $soft_delete) Return the first ChildPengguna filtered by the soft_delete column
 * @method     ChildPengguna findOneByLastSync(string $last_sync) Return the first ChildPengguna filtered by the last_sync column
 * @method     ChildPengguna findOneByUpdaterId(string $updater_id) Return the first ChildPengguna filtered by the updater_id column *

 * @method     ChildPengguna requirePk($key, ConnectionInterface $con = null) Return the ChildPengguna by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOne(ConnectionInterface $con = null) Return the first ChildPengguna matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPengguna requireOneByPenggunaId(string $pengguna_id) Return the first ChildPengguna filtered by the pengguna_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneBySekolahId(string $sekolah_id) Return the first ChildPengguna filtered by the sekolah_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByUsername(string $username) Return the first ChildPengguna filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByPassword(string $password) Return the first ChildPengguna filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByNama(string $nama) Return the first ChildPengguna filtered by the nama column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByNipNim(string $nip_nim) Return the first ChildPengguna filtered by the nip_nim column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByJabatanLembaga(string $jabatan_lembaga) Return the first ChildPengguna filtered by the jabatan_lembaga column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByYm(string $ym) Return the first ChildPengguna filtered by the ym column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneBySkype(string $skype) Return the first ChildPengguna filtered by the skype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByAlamat(string $alamat) Return the first ChildPengguna filtered by the alamat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByKodeWilayah(string $kode_wilayah) Return the first ChildPengguna filtered by the kode_wilayah column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByNoTelepon(string $no_telepon) Return the first ChildPengguna filtered by the no_telepon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByNoHp(string $no_hp) Return the first ChildPengguna filtered by the no_hp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByAktif(string $aktif) Return the first ChildPengguna filtered by the aktif column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByPtkId(string $ptk_id) Return the first ChildPengguna filtered by the ptk_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByPeranId(int $peran_id) Return the first ChildPengguna filtered by the peran_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByLembagaId(string $lembaga_id) Return the first ChildPengguna filtered by the lembaga_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByYayasanId(string $yayasan_id) Return the first ChildPengguna filtered by the yayasan_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByLaId(string $la_id) Return the first ChildPengguna filtered by the la_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByDudiId(string $dudi_id) Return the first ChildPengguna filtered by the dudi_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByCreateDate(string $create_date) Return the first ChildPengguna filtered by the create_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByRoles(string $roles) Return the first ChildPengguna filtered by the roles column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByLastUpdate(string $last_update) Return the first ChildPengguna filtered by the last_update column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneBySoftDelete(string $soft_delete) Return the first ChildPengguna filtered by the soft_delete column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByLastSync(string $last_sync) Return the first ChildPengguna filtered by the last_sync column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPengguna requireOneByUpdaterId(string $updater_id) Return the first ChildPengguna filtered by the updater_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPengguna[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPengguna objects based on current ModelCriteria
 * @method     ChildPengguna[]|ObjectCollection findByPenggunaId(string $pengguna_id) Return ChildPengguna objects filtered by the pengguna_id column
 * @method     ChildPengguna[]|ObjectCollection findBySekolahId(string $sekolah_id) Return ChildPengguna objects filtered by the sekolah_id column
 * @method     ChildPengguna[]|ObjectCollection findByUsername(string $username) Return ChildPengguna objects filtered by the username column
 * @method     ChildPengguna[]|ObjectCollection findByPassword(string $password) Return ChildPengguna objects filtered by the password column
 * @method     ChildPengguna[]|ObjectCollection findByNama(string $nama) Return ChildPengguna objects filtered by the nama column
 * @method     ChildPengguna[]|ObjectCollection findByNipNim(string $nip_nim) Return ChildPengguna objects filtered by the nip_nim column
 * @method     ChildPengguna[]|ObjectCollection findByJabatanLembaga(string $jabatan_lembaga) Return ChildPengguna objects filtered by the jabatan_lembaga column
 * @method     ChildPengguna[]|ObjectCollection findByYm(string $ym) Return ChildPengguna objects filtered by the ym column
 * @method     ChildPengguna[]|ObjectCollection findBySkype(string $skype) Return ChildPengguna objects filtered by the skype column
 * @method     ChildPengguna[]|ObjectCollection findByAlamat(string $alamat) Return ChildPengguna objects filtered by the alamat column
 * @method     ChildPengguna[]|ObjectCollection findByKodeWilayah(string $kode_wilayah) Return ChildPengguna objects filtered by the kode_wilayah column
 * @method     ChildPengguna[]|ObjectCollection findByNoTelepon(string $no_telepon) Return ChildPengguna objects filtered by the no_telepon column
 * @method     ChildPengguna[]|ObjectCollection findByNoHp(string $no_hp) Return ChildPengguna objects filtered by the no_hp column
 * @method     ChildPengguna[]|ObjectCollection findByAktif(string $aktif) Return ChildPengguna objects filtered by the aktif column
 * @method     ChildPengguna[]|ObjectCollection findByPtkId(string $ptk_id) Return ChildPengguna objects filtered by the ptk_id column
 * @method     ChildPengguna[]|ObjectCollection findByPeranId(int $peran_id) Return ChildPengguna objects filtered by the peran_id column
 * @method     ChildPengguna[]|ObjectCollection findByLembagaId(string $lembaga_id) Return ChildPengguna objects filtered by the lembaga_id column
 * @method     ChildPengguna[]|ObjectCollection findByYayasanId(string $yayasan_id) Return ChildPengguna objects filtered by the yayasan_id column
 * @method     ChildPengguna[]|ObjectCollection findByLaId(string $la_id) Return ChildPengguna objects filtered by the la_id column
 * @method     ChildPengguna[]|ObjectCollection findByDudiId(string $dudi_id) Return ChildPengguna objects filtered by the dudi_id column
 * @method     ChildPengguna[]|ObjectCollection findByCreateDate(string $create_date) Return ChildPengguna objects filtered by the create_date column
 * @method     ChildPengguna[]|ObjectCollection findByRoles(string $roles) Return ChildPengguna objects filtered by the roles column
 * @method     ChildPengguna[]|ObjectCollection findByLastUpdate(string $last_update) Return ChildPengguna objects filtered by the last_update column
 * @method     ChildPengguna[]|ObjectCollection findBySoftDelete(string $soft_delete) Return ChildPengguna objects filtered by the soft_delete column
 * @method     ChildPengguna[]|ObjectCollection findByLastSync(string $last_sync) Return ChildPengguna objects filtered by the last_sync column
 * @method     ChildPengguna[]|ObjectCollection findByUpdaterId(string $updater_id) Return ChildPengguna objects filtered by the updater_id column
 * @method     ChildPengguna[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PenggunaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Appdb\Base\PenggunaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'appdb', $modelName = '\\Appdb\\Pengguna', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPenggunaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPenggunaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPenggunaQuery) {
            return $criteria;
        }
        $query = new ChildPenggunaQuery();
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
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPengguna|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PenggunaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PenggunaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPengguna A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT pengguna_id, sekolah_id, username, password, nama, nip_nim, jabatan_lembaga, ym, skype, alamat, kode_wilayah, no_telepon, no_hp, aktif, ptk_id, peran_id, lembaga_id, yayasan_id, la_id, dudi_id, create_date, roles, last_update, soft_delete, last_sync, updater_id FROM pengguna WHERE pengguna_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPengguna $obj */
            $obj = new ChildPengguna();
            $obj->hydrate($row);
            PenggunaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPengguna|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PenggunaTableMap::COL_PENGGUNA_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PenggunaTableMap::COL_PENGGUNA_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the pengguna_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPenggunaId('fooValue');   // WHERE pengguna_id = 'fooValue'
     * $query->filterByPenggunaId('%fooValue%', Criteria::LIKE); // WHERE pengguna_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $penggunaId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByPenggunaId($penggunaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($penggunaId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_PENGGUNA_ID, $penggunaId, $comparison);
    }

    /**
     * Filter the query on the sekolah_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySekolahId('fooValue');   // WHERE sekolah_id = 'fooValue'
     * $query->filterBySekolahId('%fooValue%', Criteria::LIKE); // WHERE sekolah_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sekolahId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterBySekolahId($sekolahId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sekolahId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%', Criteria::LIKE); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the nama column
     *
     * Example usage:
     * <code>
     * $query->filterByNama('fooValue');   // WHERE nama = 'fooValue'
     * $query->filterByNama('%fooValue%', Criteria::LIKE); // WHERE nama LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nama The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByNama($nama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nama)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the nip_nim column
     *
     * Example usage:
     * <code>
     * $query->filterByNipNim('fooValue');   // WHERE nip_nim = 'fooValue'
     * $query->filterByNipNim('%fooValue%', Criteria::LIKE); // WHERE nip_nim LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nipNim The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByNipNim($nipNim = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nipNim)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_NIP_NIM, $nipNim, $comparison);
    }

    /**
     * Filter the query on the jabatan_lembaga column
     *
     * Example usage:
     * <code>
     * $query->filterByJabatanLembaga('fooValue');   // WHERE jabatan_lembaga = 'fooValue'
     * $query->filterByJabatanLembaga('%fooValue%', Criteria::LIKE); // WHERE jabatan_lembaga LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jabatanLembaga The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByJabatanLembaga($jabatanLembaga = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jabatanLembaga)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_JABATAN_LEMBAGA, $jabatanLembaga, $comparison);
    }

    /**
     * Filter the query on the ym column
     *
     * Example usage:
     * <code>
     * $query->filterByYm('fooValue');   // WHERE ym = 'fooValue'
     * $query->filterByYm('%fooValue%', Criteria::LIKE); // WHERE ym LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ym The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByYm($ym = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ym)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_YM, $ym, $comparison);
    }

    /**
     * Filter the query on the skype column
     *
     * Example usage:
     * <code>
     * $query->filterBySkype('fooValue');   // WHERE skype = 'fooValue'
     * $query->filterBySkype('%fooValue%', Criteria::LIKE); // WHERE skype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterBySkype($skype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_SKYPE, $skype, $comparison);
    }

    /**
     * Filter the query on the alamat column
     *
     * Example usage:
     * <code>
     * $query->filterByAlamat('fooValue');   // WHERE alamat = 'fooValue'
     * $query->filterByAlamat('%fooValue%', Criteria::LIKE); // WHERE alamat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $alamat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByAlamat($alamat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($alamat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_ALAMAT, $alamat, $comparison);
    }

    /**
     * Filter the query on the kode_wilayah column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeWilayah('fooValue');   // WHERE kode_wilayah = 'fooValue'
     * $query->filterByKodeWilayah('%fooValue%', Criteria::LIKE); // WHERE kode_wilayah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeWilayah The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByKodeWilayah($kodeWilayah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeWilayah)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_KODE_WILAYAH, $kodeWilayah, $comparison);
    }

    /**
     * Filter the query on the no_telepon column
     *
     * Example usage:
     * <code>
     * $query->filterByNoTelepon('fooValue');   // WHERE no_telepon = 'fooValue'
     * $query->filterByNoTelepon('%fooValue%', Criteria::LIKE); // WHERE no_telepon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noTelepon The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByNoTelepon($noTelepon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noTelepon)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_NO_TELEPON, $noTelepon, $comparison);
    }

    /**
     * Filter the query on the no_hp column
     *
     * Example usage:
     * <code>
     * $query->filterByNoHp('fooValue');   // WHERE no_hp = 'fooValue'
     * $query->filterByNoHp('%fooValue%', Criteria::LIKE); // WHERE no_hp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noHp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByNoHp($noHp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noHp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_NO_HP, $noHp, $comparison);
    }

    /**
     * Filter the query on the aktif column
     *
     * Example usage:
     * <code>
     * $query->filterByAktif(1234); // WHERE aktif = 1234
     * $query->filterByAktif(array(12, 34)); // WHERE aktif IN (12, 34)
     * $query->filterByAktif(array('min' => 12)); // WHERE aktif > 12
     * </code>
     *
     * @param     mixed $aktif The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByAktif($aktif = null, $comparison = null)
    {
        if (is_array($aktif)) {
            $useMinMax = false;
            if (isset($aktif['min'])) {
                $this->addUsingAlias(PenggunaTableMap::COL_AKTIF, $aktif['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktif['max'])) {
                $this->addUsingAlias(PenggunaTableMap::COL_AKTIF, $aktif['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_AKTIF, $aktif, $comparison);
    }

    /**
     * Filter the query on the ptk_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPtkId('fooValue');   // WHERE ptk_id = 'fooValue'
     * $query->filterByPtkId('%fooValue%', Criteria::LIKE); // WHERE ptk_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ptkId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByPtkId($ptkId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ptkId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the peran_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPeranId(1234); // WHERE peran_id = 1234
     * $query->filterByPeranId(array(12, 34)); // WHERE peran_id IN (12, 34)
     * $query->filterByPeranId(array('min' => 12)); // WHERE peran_id > 12
     * </code>
     *
     * @param     mixed $peranId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByPeranId($peranId = null, $comparison = null)
    {
        if (is_array($peranId)) {
            $useMinMax = false;
            if (isset($peranId['min'])) {
                $this->addUsingAlias(PenggunaTableMap::COL_PERAN_ID, $peranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($peranId['max'])) {
                $this->addUsingAlias(PenggunaTableMap::COL_PERAN_ID, $peranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_PERAN_ID, $peranId, $comparison);
    }

    /**
     * Filter the query on the lembaga_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLembagaId('fooValue');   // WHERE lembaga_id = 'fooValue'
     * $query->filterByLembagaId('%fooValue%', Criteria::LIKE); // WHERE lembaga_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lembagaId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByLembagaId($lembagaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lembagaId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_LEMBAGA_ID, $lembagaId, $comparison);
    }

    /**
     * Filter the query on the yayasan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByYayasanId('fooValue');   // WHERE yayasan_id = 'fooValue'
     * $query->filterByYayasanId('%fooValue%', Criteria::LIKE); // WHERE yayasan_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $yayasanId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByYayasanId($yayasanId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($yayasanId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_YAYASAN_ID, $yayasanId, $comparison);
    }

    /**
     * Filter the query on the la_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLaId('fooValue');   // WHERE la_id = 'fooValue'
     * $query->filterByLaId('%fooValue%', Criteria::LIKE); // WHERE la_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $laId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByLaId($laId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($laId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_LA_ID, $laId, $comparison);
    }

    /**
     * Filter the query on the dudi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDudiId('fooValue');   // WHERE dudi_id = 'fooValue'
     * $query->filterByDudiId('%fooValue%', Criteria::LIKE); // WHERE dudi_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dudiId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByDudiId($dudiId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dudiId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_DUDI_ID, $dudiId, $comparison);
    }

    /**
     * Filter the query on the create_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateDate('2011-03-14'); // WHERE create_date = '2011-03-14'
     * $query->filterByCreateDate('now'); // WHERE create_date = '2011-03-14'
     * $query->filterByCreateDate(array('max' => 'yesterday')); // WHERE create_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $createDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PenggunaTableMap::COL_CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PenggunaTableMap::COL_CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_CREATE_DATE, $createDate, $comparison);
    }

    /**
     * Filter the query on the roles column
     *
     * Example usage:
     * <code>
     * $query->filterByRoles('fooValue');   // WHERE roles = 'fooValue'
     * $query->filterByRoles('%fooValue%', Criteria::LIKE); // WHERE roles LIKE '%fooValue%'
     * </code>
     *
     * @param     string $roles The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByRoles($roles = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($roles)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_ROLES, $roles, $comparison);
    }

    /**
     * Filter the query on the last_update column
     *
     * Example usage:
     * <code>
     * $query->filterByLastUpdate('2011-03-14'); // WHERE last_update = '2011-03-14'
     * $query->filterByLastUpdate('now'); // WHERE last_update = '2011-03-14'
     * $query->filterByLastUpdate(array('max' => 'yesterday')); // WHERE last_update > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastUpdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PenggunaTableMap::COL_LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PenggunaTableMap::COL_LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_LAST_UPDATE, $lastUpdate, $comparison);
    }

    /**
     * Filter the query on the soft_delete column
     *
     * Example usage:
     * <code>
     * $query->filterBySoftDelete(1234); // WHERE soft_delete = 1234
     * $query->filterBySoftDelete(array(12, 34)); // WHERE soft_delete IN (12, 34)
     * $query->filterBySoftDelete(array('min' => 12)); // WHERE soft_delete > 12
     * </code>
     *
     * @param     mixed $softDelete The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(PenggunaTableMap::COL_SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(PenggunaTableMap::COL_SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_SOFT_DELETE, $softDelete, $comparison);
    }

    /**
     * Filter the query on the last_sync column
     *
     * Example usage:
     * <code>
     * $query->filterByLastSync('2011-03-14'); // WHERE last_sync = '2011-03-14'
     * $query->filterByLastSync('now'); // WHERE last_sync = '2011-03-14'
     * $query->filterByLastSync(array('max' => 'yesterday')); // WHERE last_sync > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastSync The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PenggunaTableMap::COL_LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PenggunaTableMap::COL_LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query on the updater_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdaterId('fooValue');   // WHERE updater_id = 'fooValue'
     * $query->filterByUpdaterId('%fooValue%', Criteria::LIKE); // WHERE updater_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $updaterId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByUpdaterId($updaterId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($updaterId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaTableMap::COL_UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related \Appdb\Sekolah object
     *
     * @param \Appdb\Sekolah|ObjectCollection $sekolah The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof \Appdb\Sekolah) {
            return $this
                ->addUsingAlias(PenggunaTableMap::COL_SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PenggunaTableMap::COL_SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
        } else {
            throw new PropelException('filterBySekolah() only accepts arguments of type \Appdb\Sekolah or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Sekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function joinSekolah($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Sekolah');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Sekolah');
        }

        return $this;
    }

    /**
     * Use the Sekolah relation Sekolah object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Appdb\SekolahQuery A secondary query class using the current class as primary query
     */
    public function useSekolahQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sekolah', '\Appdb\SekolahQuery');
    }

    /**
     * Filter the query by a related \Appdb\Foto object
     *
     * @param \Appdb\Foto|ObjectCollection $foto the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByFoto($foto, $comparison = null)
    {
        if ($foto instanceof \Appdb\Foto) {
            return $this
                ->addUsingAlias(PenggunaTableMap::COL_PENGGUNA_ID, $foto->getPenggunaId(), $comparison);
        } elseif ($foto instanceof ObjectCollection) {
            return $this
                ->useFotoQuery()
                ->filterByPrimaryKeys($foto->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFoto() only accepts arguments of type \Appdb\Foto or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Foto relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function joinFoto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Foto');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Foto');
        }

        return $this;
    }

    /**
     * Use the Foto relation Foto object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Appdb\FotoQuery A secondary query class using the current class as primary query
     */
    public function useFotoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFoto($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Foto', '\Appdb\FotoQuery');
    }

    /**
     * Filter the query by a related \Appdb\Geotag object
     *
     * @param \Appdb\Geotag|ObjectCollection $geotag the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPenggunaQuery The current query, for fluid interface
     */
    public function filterByGeotag($geotag, $comparison = null)
    {
        if ($geotag instanceof \Appdb\Geotag) {
            return $this
                ->addUsingAlias(PenggunaTableMap::COL_PENGGUNA_ID, $geotag->getPenggunaId(), $comparison);
        } elseif ($geotag instanceof ObjectCollection) {
            return $this
                ->useGeotagQuery()
                ->filterByPrimaryKeys($geotag->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByGeotag() only accepts arguments of type \Appdb\Geotag or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Geotag relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function joinGeotag($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Geotag');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Geotag');
        }

        return $this;
    }

    /**
     * Use the Geotag relation Geotag object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Appdb\GeotagQuery A secondary query class using the current class as primary query
     */
    public function useGeotagQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGeotag($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Geotag', '\Appdb\GeotagQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPengguna $pengguna Object to remove from the list of results
     *
     * @return $this|ChildPenggunaQuery The current query, for fluid interface
     */
    public function prune($pengguna = null)
    {
        if ($pengguna) {
            $this->addUsingAlias(PenggunaTableMap::COL_PENGGUNA_ID, $pengguna->getPenggunaId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the pengguna table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PenggunaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PenggunaTableMap::clearInstancePool();
            PenggunaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PenggunaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PenggunaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PenggunaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PenggunaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PenggunaQuery
