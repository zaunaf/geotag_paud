<?php

namespace Appdb\Base;

use \Exception;
use \PDO;
use Appdb\Foto as ChildFoto;
use Appdb\FotoQuery as ChildFotoQuery;
use Appdb\Map\FotoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'foto' table.
 *
 *
 *
 * @method     ChildFotoQuery orderByFotoId($order = Criteria::ASC) Order by the foto_id column
 * @method     ChildFotoQuery orderByJenisFotoId($order = Criteria::ASC) Order by the jenis_foto_id column
 * @method     ChildFotoQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method     ChildFotoQuery orderByPenggunaId($order = Criteria::ASC) Order by the pengguna_id column
 * @method     ChildFotoQuery orderByJudul($order = Criteria::ASC) Order by the judul column
 * @method     ChildFotoQuery orderByTglPengambilan($order = Criteria::ASC) Order by the tgl_pengambilan column
 * @method     ChildFotoQuery orderByTinggiPixel($order = Criteria::ASC) Order by the tinggi_pixel column
 * @method     ChildFotoQuery orderByLebarPixel($order = Criteria::ASC) Order by the lebar_pixel column
 * @method     ChildFotoQuery orderByUkuran($order = Criteria::ASC) Order by the ukuran column
 * @method     ChildFotoQuery orderByLintang($order = Criteria::ASC) Order by the lintang column
 * @method     ChildFotoQuery orderByBujur($order = Criteria::ASC) Order by the bujur column
 * @method     ChildFotoQuery orderByTglPengiriman($order = Criteria::ASC) Order by the tgl_pengiriman column
 * @method     ChildFotoQuery orderByStatusData($order = Criteria::ASC) Order by the status_data column
 *
 * @method     ChildFotoQuery groupByFotoId() Group by the foto_id column
 * @method     ChildFotoQuery groupByJenisFotoId() Group by the jenis_foto_id column
 * @method     ChildFotoQuery groupBySekolahId() Group by the sekolah_id column
 * @method     ChildFotoQuery groupByPenggunaId() Group by the pengguna_id column
 * @method     ChildFotoQuery groupByJudul() Group by the judul column
 * @method     ChildFotoQuery groupByTglPengambilan() Group by the tgl_pengambilan column
 * @method     ChildFotoQuery groupByTinggiPixel() Group by the tinggi_pixel column
 * @method     ChildFotoQuery groupByLebarPixel() Group by the lebar_pixel column
 * @method     ChildFotoQuery groupByUkuran() Group by the ukuran column
 * @method     ChildFotoQuery groupByLintang() Group by the lintang column
 * @method     ChildFotoQuery groupByBujur() Group by the bujur column
 * @method     ChildFotoQuery groupByTglPengiriman() Group by the tgl_pengiriman column
 * @method     ChildFotoQuery groupByStatusData() Group by the status_data column
 *
 * @method     ChildFotoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFotoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFotoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFotoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildFotoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildFotoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildFotoQuery leftJoinJenisFoto($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisFoto relation
 * @method     ChildFotoQuery rightJoinJenisFoto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisFoto relation
 * @method     ChildFotoQuery innerJoinJenisFoto($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisFoto relation
 *
 * @method     ChildFotoQuery joinWithJenisFoto($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the JenisFoto relation
 *
 * @method     ChildFotoQuery leftJoinWithJenisFoto() Adds a LEFT JOIN clause and with to the query using the JenisFoto relation
 * @method     ChildFotoQuery rightJoinWithJenisFoto() Adds a RIGHT JOIN clause and with to the query using the JenisFoto relation
 * @method     ChildFotoQuery innerJoinWithJenisFoto() Adds a INNER JOIN clause and with to the query using the JenisFoto relation
 *
 * @method     ChildFotoQuery leftJoinPengguna($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pengguna relation
 * @method     ChildFotoQuery rightJoinPengguna($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pengguna relation
 * @method     ChildFotoQuery innerJoinPengguna($relationAlias = null) Adds a INNER JOIN clause to the query using the Pengguna relation
 *
 * @method     ChildFotoQuery joinWithPengguna($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Pengguna relation
 *
 * @method     ChildFotoQuery leftJoinWithPengguna() Adds a LEFT JOIN clause and with to the query using the Pengguna relation
 * @method     ChildFotoQuery rightJoinWithPengguna() Adds a RIGHT JOIN clause and with to the query using the Pengguna relation
 * @method     ChildFotoQuery innerJoinWithPengguna() Adds a INNER JOIN clause and with to the query using the Pengguna relation
 *
 * @method     ChildFotoQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method     ChildFotoQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method     ChildFotoQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method     ChildFotoQuery joinWithSekolah($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Sekolah relation
 *
 * @method     ChildFotoQuery leftJoinWithSekolah() Adds a LEFT JOIN clause and with to the query using the Sekolah relation
 * @method     ChildFotoQuery rightJoinWithSekolah() Adds a RIGHT JOIN clause and with to the query using the Sekolah relation
 * @method     ChildFotoQuery innerJoinWithSekolah() Adds a INNER JOIN clause and with to the query using the Sekolah relation
 *
 * @method     \Appdb\JenisFotoQuery|\Appdb\PenggunaQuery|\Appdb\SekolahQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildFoto findOne(ConnectionInterface $con = null) Return the first ChildFoto matching the query
 * @method     ChildFoto findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFoto matching the query, or a new ChildFoto object populated from the query conditions when no match is found
 *
 * @method     ChildFoto findOneByFotoId(string $foto_id) Return the first ChildFoto filtered by the foto_id column
 * @method     ChildFoto findOneByJenisFotoId(int $jenis_foto_id) Return the first ChildFoto filtered by the jenis_foto_id column
 * @method     ChildFoto findOneBySekolahId(string $sekolah_id) Return the first ChildFoto filtered by the sekolah_id column
 * @method     ChildFoto findOneByPenggunaId(string $pengguna_id) Return the first ChildFoto filtered by the pengguna_id column
 * @method     ChildFoto findOneByJudul(string $judul) Return the first ChildFoto filtered by the judul column
 * @method     ChildFoto findOneByTglPengambilan(string $tgl_pengambilan) Return the first ChildFoto filtered by the tgl_pengambilan column
 * @method     ChildFoto findOneByTinggiPixel(int $tinggi_pixel) Return the first ChildFoto filtered by the tinggi_pixel column
 * @method     ChildFoto findOneByLebarPixel(int $lebar_pixel) Return the first ChildFoto filtered by the lebar_pixel column
 * @method     ChildFoto findOneByUkuran(int $ukuran) Return the first ChildFoto filtered by the ukuran column
 * @method     ChildFoto findOneByLintang(string $lintang) Return the first ChildFoto filtered by the lintang column
 * @method     ChildFoto findOneByBujur(string $bujur) Return the first ChildFoto filtered by the bujur column
 * @method     ChildFoto findOneByTglPengiriman(string $tgl_pengiriman) Return the first ChildFoto filtered by the tgl_pengiriman column
 * @method     ChildFoto findOneByStatusData(int $status_data) Return the first ChildFoto filtered by the status_data column *

 * @method     ChildFoto requirePk($key, ConnectionInterface $con = null) Return the ChildFoto by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFoto requireOne(ConnectionInterface $con = null) Return the first ChildFoto matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFoto requireOneByFotoId(string $foto_id) Return the first ChildFoto filtered by the foto_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFoto requireOneByJenisFotoId(int $jenis_foto_id) Return the first ChildFoto filtered by the jenis_foto_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFoto requireOneBySekolahId(string $sekolah_id) Return the first ChildFoto filtered by the sekolah_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFoto requireOneByPenggunaId(string $pengguna_id) Return the first ChildFoto filtered by the pengguna_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFoto requireOneByJudul(string $judul) Return the first ChildFoto filtered by the judul column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFoto requireOneByTglPengambilan(string $tgl_pengambilan) Return the first ChildFoto filtered by the tgl_pengambilan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFoto requireOneByTinggiPixel(int $tinggi_pixel) Return the first ChildFoto filtered by the tinggi_pixel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFoto requireOneByLebarPixel(int $lebar_pixel) Return the first ChildFoto filtered by the lebar_pixel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFoto requireOneByUkuran(int $ukuran) Return the first ChildFoto filtered by the ukuran column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFoto requireOneByLintang(string $lintang) Return the first ChildFoto filtered by the lintang column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFoto requireOneByBujur(string $bujur) Return the first ChildFoto filtered by the bujur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFoto requireOneByTglPengiriman(string $tgl_pengiriman) Return the first ChildFoto filtered by the tgl_pengiriman column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFoto requireOneByStatusData(int $status_data) Return the first ChildFoto filtered by the status_data column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFoto[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFoto objects based on current ModelCriteria
 * @method     ChildFoto[]|ObjectCollection findByFotoId(string $foto_id) Return ChildFoto objects filtered by the foto_id column
 * @method     ChildFoto[]|ObjectCollection findByJenisFotoId(int $jenis_foto_id) Return ChildFoto objects filtered by the jenis_foto_id column
 * @method     ChildFoto[]|ObjectCollection findBySekolahId(string $sekolah_id) Return ChildFoto objects filtered by the sekolah_id column
 * @method     ChildFoto[]|ObjectCollection findByPenggunaId(string $pengguna_id) Return ChildFoto objects filtered by the pengguna_id column
 * @method     ChildFoto[]|ObjectCollection findByJudul(string $judul) Return ChildFoto objects filtered by the judul column
 * @method     ChildFoto[]|ObjectCollection findByTglPengambilan(string $tgl_pengambilan) Return ChildFoto objects filtered by the tgl_pengambilan column
 * @method     ChildFoto[]|ObjectCollection findByTinggiPixel(int $tinggi_pixel) Return ChildFoto objects filtered by the tinggi_pixel column
 * @method     ChildFoto[]|ObjectCollection findByLebarPixel(int $lebar_pixel) Return ChildFoto objects filtered by the lebar_pixel column
 * @method     ChildFoto[]|ObjectCollection findByUkuran(int $ukuran) Return ChildFoto objects filtered by the ukuran column
 * @method     ChildFoto[]|ObjectCollection findByLintang(string $lintang) Return ChildFoto objects filtered by the lintang column
 * @method     ChildFoto[]|ObjectCollection findByBujur(string $bujur) Return ChildFoto objects filtered by the bujur column
 * @method     ChildFoto[]|ObjectCollection findByTglPengiriman(string $tgl_pengiriman) Return ChildFoto objects filtered by the tgl_pengiriman column
 * @method     ChildFoto[]|ObjectCollection findByStatusData(int $status_data) Return ChildFoto objects filtered by the status_data column
 * @method     ChildFoto[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FotoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Appdb\Base\FotoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'appdb', $modelName = '\\Appdb\\Foto', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFotoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFotoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFotoQuery) {
            return $criteria;
        }
        $query = new ChildFotoQuery();
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
     * @return ChildFoto|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FotoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = FotoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildFoto A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT foto_id, jenis_foto_id, sekolah_id, pengguna_id, judul, tgl_pengambilan, tinggi_pixel, lebar_pixel, ukuran, lintang, bujur, tgl_pengiriman, status_data FROM foto WHERE foto_id = :p0';
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
            /** @var ChildFoto $obj */
            $obj = new ChildFoto();
            $obj->hydrate($row);
            FotoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildFoto|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FotoTableMap::COL_FOTO_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FotoTableMap::COL_FOTO_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the foto_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFotoId('fooValue');   // WHERE foto_id = 'fooValue'
     * $query->filterByFotoId('%fooValue%', Criteria::LIKE); // WHERE foto_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fotoId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function filterByFotoId($fotoId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fotoId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FotoTableMap::COL_FOTO_ID, $fotoId, $comparison);
    }

    /**
     * Filter the query on the jenis_foto_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisFotoId(1234); // WHERE jenis_foto_id = 1234
     * $query->filterByJenisFotoId(array(12, 34)); // WHERE jenis_foto_id IN (12, 34)
     * $query->filterByJenisFotoId(array('min' => 12)); // WHERE jenis_foto_id > 12
     * </code>
     *
     * @see       filterByJenisFoto()
     *
     * @param     mixed $jenisFotoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function filterByJenisFotoId($jenisFotoId = null, $comparison = null)
    {
        if (is_array($jenisFotoId)) {
            $useMinMax = false;
            if (isset($jenisFotoId['min'])) {
                $this->addUsingAlias(FotoTableMap::COL_JENIS_FOTO_ID, $jenisFotoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisFotoId['max'])) {
                $this->addUsingAlias(FotoTableMap::COL_JENIS_FOTO_ID, $jenisFotoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FotoTableMap::COL_JENIS_FOTO_ID, $jenisFotoId, $comparison);
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
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function filterBySekolahId($sekolahId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sekolahId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FotoTableMap::COL_SEKOLAH_ID, $sekolahId, $comparison);
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
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function filterByPenggunaId($penggunaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($penggunaId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FotoTableMap::COL_PENGGUNA_ID, $penggunaId, $comparison);
    }

    /**
     * Filter the query on the judul column
     *
     * Example usage:
     * <code>
     * $query->filterByJudul('fooValue');   // WHERE judul = 'fooValue'
     * $query->filterByJudul('%fooValue%', Criteria::LIKE); // WHERE judul LIKE '%fooValue%'
     * </code>
     *
     * @param     string $judul The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function filterByJudul($judul = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($judul)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FotoTableMap::COL_JUDUL, $judul, $comparison);
    }

    /**
     * Filter the query on the tgl_pengambilan column
     *
     * Example usage:
     * <code>
     * $query->filterByTglPengambilan('2011-03-14'); // WHERE tgl_pengambilan = '2011-03-14'
     * $query->filterByTglPengambilan('now'); // WHERE tgl_pengambilan = '2011-03-14'
     * $query->filterByTglPengambilan(array('max' => 'yesterday')); // WHERE tgl_pengambilan > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglPengambilan The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function filterByTglPengambilan($tglPengambilan = null, $comparison = null)
    {
        if (is_array($tglPengambilan)) {
            $useMinMax = false;
            if (isset($tglPengambilan['min'])) {
                $this->addUsingAlias(FotoTableMap::COL_TGL_PENGAMBILAN, $tglPengambilan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglPengambilan['max'])) {
                $this->addUsingAlias(FotoTableMap::COL_TGL_PENGAMBILAN, $tglPengambilan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FotoTableMap::COL_TGL_PENGAMBILAN, $tglPengambilan, $comparison);
    }

    /**
     * Filter the query on the tinggi_pixel column
     *
     * Example usage:
     * <code>
     * $query->filterByTinggiPixel(1234); // WHERE tinggi_pixel = 1234
     * $query->filterByTinggiPixel(array(12, 34)); // WHERE tinggi_pixel IN (12, 34)
     * $query->filterByTinggiPixel(array('min' => 12)); // WHERE tinggi_pixel > 12
     * </code>
     *
     * @param     mixed $tinggiPixel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function filterByTinggiPixel($tinggiPixel = null, $comparison = null)
    {
        if (is_array($tinggiPixel)) {
            $useMinMax = false;
            if (isset($tinggiPixel['min'])) {
                $this->addUsingAlias(FotoTableMap::COL_TINGGI_PIXEL, $tinggiPixel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tinggiPixel['max'])) {
                $this->addUsingAlias(FotoTableMap::COL_TINGGI_PIXEL, $tinggiPixel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FotoTableMap::COL_TINGGI_PIXEL, $tinggiPixel, $comparison);
    }

    /**
     * Filter the query on the lebar_pixel column
     *
     * Example usage:
     * <code>
     * $query->filterByLebarPixel(1234); // WHERE lebar_pixel = 1234
     * $query->filterByLebarPixel(array(12, 34)); // WHERE lebar_pixel IN (12, 34)
     * $query->filterByLebarPixel(array('min' => 12)); // WHERE lebar_pixel > 12
     * </code>
     *
     * @param     mixed $lebarPixel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function filterByLebarPixel($lebarPixel = null, $comparison = null)
    {
        if (is_array($lebarPixel)) {
            $useMinMax = false;
            if (isset($lebarPixel['min'])) {
                $this->addUsingAlias(FotoTableMap::COL_LEBAR_PIXEL, $lebarPixel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lebarPixel['max'])) {
                $this->addUsingAlias(FotoTableMap::COL_LEBAR_PIXEL, $lebarPixel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FotoTableMap::COL_LEBAR_PIXEL, $lebarPixel, $comparison);
    }

    /**
     * Filter the query on the ukuran column
     *
     * Example usage:
     * <code>
     * $query->filterByUkuran(1234); // WHERE ukuran = 1234
     * $query->filterByUkuran(array(12, 34)); // WHERE ukuran IN (12, 34)
     * $query->filterByUkuran(array('min' => 12)); // WHERE ukuran > 12
     * </code>
     *
     * @param     mixed $ukuran The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function filterByUkuran($ukuran = null, $comparison = null)
    {
        if (is_array($ukuran)) {
            $useMinMax = false;
            if (isset($ukuran['min'])) {
                $this->addUsingAlias(FotoTableMap::COL_UKURAN, $ukuran['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ukuran['max'])) {
                $this->addUsingAlias(FotoTableMap::COL_UKURAN, $ukuran['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FotoTableMap::COL_UKURAN, $ukuran, $comparison);
    }

    /**
     * Filter the query on the lintang column
     *
     * Example usage:
     * <code>
     * $query->filterByLintang(1234); // WHERE lintang = 1234
     * $query->filterByLintang(array(12, 34)); // WHERE lintang IN (12, 34)
     * $query->filterByLintang(array('min' => 12)); // WHERE lintang > 12
     * </code>
     *
     * @param     mixed $lintang The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function filterByLintang($lintang = null, $comparison = null)
    {
        if (is_array($lintang)) {
            $useMinMax = false;
            if (isset($lintang['min'])) {
                $this->addUsingAlias(FotoTableMap::COL_LINTANG, $lintang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lintang['max'])) {
                $this->addUsingAlias(FotoTableMap::COL_LINTANG, $lintang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FotoTableMap::COL_LINTANG, $lintang, $comparison);
    }

    /**
     * Filter the query on the bujur column
     *
     * Example usage:
     * <code>
     * $query->filterByBujur(1234); // WHERE bujur = 1234
     * $query->filterByBujur(array(12, 34)); // WHERE bujur IN (12, 34)
     * $query->filterByBujur(array('min' => 12)); // WHERE bujur > 12
     * </code>
     *
     * @param     mixed $bujur The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function filterByBujur($bujur = null, $comparison = null)
    {
        if (is_array($bujur)) {
            $useMinMax = false;
            if (isset($bujur['min'])) {
                $this->addUsingAlias(FotoTableMap::COL_BUJUR, $bujur['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bujur['max'])) {
                $this->addUsingAlias(FotoTableMap::COL_BUJUR, $bujur['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FotoTableMap::COL_BUJUR, $bujur, $comparison);
    }

    /**
     * Filter the query on the tgl_pengiriman column
     *
     * Example usage:
     * <code>
     * $query->filterByTglPengiriman('2011-03-14'); // WHERE tgl_pengiriman = '2011-03-14'
     * $query->filterByTglPengiriman('now'); // WHERE tgl_pengiriman = '2011-03-14'
     * $query->filterByTglPengiriman(array('max' => 'yesterday')); // WHERE tgl_pengiriman > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglPengiriman The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function filterByTglPengiriman($tglPengiriman = null, $comparison = null)
    {
        if (is_array($tglPengiriman)) {
            $useMinMax = false;
            if (isset($tglPengiriman['min'])) {
                $this->addUsingAlias(FotoTableMap::COL_TGL_PENGIRIMAN, $tglPengiriman['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglPengiriman['max'])) {
                $this->addUsingAlias(FotoTableMap::COL_TGL_PENGIRIMAN, $tglPengiriman['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FotoTableMap::COL_TGL_PENGIRIMAN, $tglPengiriman, $comparison);
    }

    /**
     * Filter the query on the status_data column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusData(1234); // WHERE status_data = 1234
     * $query->filterByStatusData(array(12, 34)); // WHERE status_data IN (12, 34)
     * $query->filterByStatusData(array('min' => 12)); // WHERE status_data > 12
     * </code>
     *
     * @param     mixed $statusData The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function filterByStatusData($statusData = null, $comparison = null)
    {
        if (is_array($statusData)) {
            $useMinMax = false;
            if (isset($statusData['min'])) {
                $this->addUsingAlias(FotoTableMap::COL_STATUS_DATA, $statusData['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusData['max'])) {
                $this->addUsingAlias(FotoTableMap::COL_STATUS_DATA, $statusData['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FotoTableMap::COL_STATUS_DATA, $statusData, $comparison);
    }

    /**
     * Filter the query by a related \Appdb\JenisFoto object
     *
     * @param \Appdb\JenisFoto|ObjectCollection $jenisFoto The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFotoQuery The current query, for fluid interface
     */
    public function filterByJenisFoto($jenisFoto, $comparison = null)
    {
        if ($jenisFoto instanceof \Appdb\JenisFoto) {
            return $this
                ->addUsingAlias(FotoTableMap::COL_JENIS_FOTO_ID, $jenisFoto->getJenisFotoId(), $comparison);
        } elseif ($jenisFoto instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FotoTableMap::COL_JENIS_FOTO_ID, $jenisFoto->toKeyValue('PrimaryKey', 'JenisFotoId'), $comparison);
        } else {
            throw new PropelException('filterByJenisFoto() only accepts arguments of type \Appdb\JenisFoto or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisFoto relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function joinJenisFoto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisFoto');

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
            $this->addJoinObject($join, 'JenisFoto');
        }

        return $this;
    }

    /**
     * Use the JenisFoto relation JenisFoto object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Appdb\JenisFotoQuery A secondary query class using the current class as primary query
     */
    public function useJenisFotoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisFoto($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisFoto', '\Appdb\JenisFotoQuery');
    }

    /**
     * Filter the query by a related \Appdb\Pengguna object
     *
     * @param \Appdb\Pengguna|ObjectCollection $pengguna The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFotoQuery The current query, for fluid interface
     */
    public function filterByPengguna($pengguna, $comparison = null)
    {
        if ($pengguna instanceof \Appdb\Pengguna) {
            return $this
                ->addUsingAlias(FotoTableMap::COL_PENGGUNA_ID, $pengguna->getPenggunaId(), $comparison);
        } elseif ($pengguna instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FotoTableMap::COL_PENGGUNA_ID, $pengguna->toKeyValue('PrimaryKey', 'PenggunaId'), $comparison);
        } else {
            throw new PropelException('filterByPengguna() only accepts arguments of type \Appdb\Pengguna or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pengguna relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function joinPengguna($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pengguna');

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
            $this->addJoinObject($join, 'Pengguna');
        }

        return $this;
    }

    /**
     * Use the Pengguna relation Pengguna object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Appdb\PenggunaQuery A secondary query class using the current class as primary query
     */
    public function usePenggunaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPengguna($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pengguna', '\Appdb\PenggunaQuery');
    }

    /**
     * Filter the query by a related \Appdb\Sekolah object
     *
     * @param \Appdb\Sekolah|ObjectCollection $sekolah The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFotoQuery The current query, for fluid interface
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof \Appdb\Sekolah) {
            return $this
                ->addUsingAlias(FotoTableMap::COL_SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FotoTableMap::COL_SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function joinSekolah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useSekolahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sekolah', '\Appdb\SekolahQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFoto $foto Object to remove from the list of results
     *
     * @return $this|ChildFotoQuery The current query, for fluid interface
     */
    public function prune($foto = null)
    {
        if ($foto) {
            $this->addUsingAlias(FotoTableMap::COL_FOTO_ID, $foto->getFotoId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the foto table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FotoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FotoTableMap::clearInstancePool();
            FotoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FotoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FotoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FotoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FotoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FotoQuery
