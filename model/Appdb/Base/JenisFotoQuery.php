<?php

namespace Appdb\Base;

use \Exception;
use \PDO;
use Appdb\JenisFoto as ChildJenisFoto;
use Appdb\JenisFotoQuery as ChildJenisFotoQuery;
use Appdb\Map\JenisFotoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ref.jenis_foto' table.
 *
 *
 *
 * @method     ChildJenisFotoQuery orderByJenisFotoId($order = Criteria::ASC) Order by the jenis_foto_id column
 * @method     ChildJenisFotoQuery orderByNamaJenisFoto($order = Criteria::ASC) Order by the nama_jenis_foto column
 * @method     ChildJenisFotoQuery orderByInstruksi($order = Criteria::ASC) Order by the instruksi column
 * @method     ChildJenisFotoQuery orderByStatusIsian($order = Criteria::ASC) Order by the status_isian column
 *
 * @method     ChildJenisFotoQuery groupByJenisFotoId() Group by the jenis_foto_id column
 * @method     ChildJenisFotoQuery groupByNamaJenisFoto() Group by the nama_jenis_foto column
 * @method     ChildJenisFotoQuery groupByInstruksi() Group by the instruksi column
 * @method     ChildJenisFotoQuery groupByStatusIsian() Group by the status_isian column
 *
 * @method     ChildJenisFotoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildJenisFotoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildJenisFotoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildJenisFotoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildJenisFotoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildJenisFotoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildJenisFotoQuery leftJoinFoto($relationAlias = null) Adds a LEFT JOIN clause to the query using the Foto relation
 * @method     ChildJenisFotoQuery rightJoinFoto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Foto relation
 * @method     ChildJenisFotoQuery innerJoinFoto($relationAlias = null) Adds a INNER JOIN clause to the query using the Foto relation
 *
 * @method     ChildJenisFotoQuery joinWithFoto($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Foto relation
 *
 * @method     ChildJenisFotoQuery leftJoinWithFoto() Adds a LEFT JOIN clause and with to the query using the Foto relation
 * @method     ChildJenisFotoQuery rightJoinWithFoto() Adds a RIGHT JOIN clause and with to the query using the Foto relation
 * @method     ChildJenisFotoQuery innerJoinWithFoto() Adds a INNER JOIN clause and with to the query using the Foto relation
 *
 * @method     \Appdb\FotoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildJenisFoto findOne(ConnectionInterface $con = null) Return the first ChildJenisFoto matching the query
 * @method     ChildJenisFoto findOneOrCreate(ConnectionInterface $con = null) Return the first ChildJenisFoto matching the query, or a new ChildJenisFoto object populated from the query conditions when no match is found
 *
 * @method     ChildJenisFoto findOneByJenisFotoId(int $jenis_foto_id) Return the first ChildJenisFoto filtered by the jenis_foto_id column
 * @method     ChildJenisFoto findOneByNamaJenisFoto(string $nama_jenis_foto) Return the first ChildJenisFoto filtered by the nama_jenis_foto column
 * @method     ChildJenisFoto findOneByInstruksi(string $instruksi) Return the first ChildJenisFoto filtered by the instruksi column
 * @method     ChildJenisFoto findOneByStatusIsian(int $status_isian) Return the first ChildJenisFoto filtered by the status_isian column *

 * @method     ChildJenisFoto requirePk($key, ConnectionInterface $con = null) Return the ChildJenisFoto by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJenisFoto requireOne(ConnectionInterface $con = null) Return the first ChildJenisFoto matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildJenisFoto requireOneByJenisFotoId(int $jenis_foto_id) Return the first ChildJenisFoto filtered by the jenis_foto_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJenisFoto requireOneByNamaJenisFoto(string $nama_jenis_foto) Return the first ChildJenisFoto filtered by the nama_jenis_foto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJenisFoto requireOneByInstruksi(string $instruksi) Return the first ChildJenisFoto filtered by the instruksi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJenisFoto requireOneByStatusIsian(int $status_isian) Return the first ChildJenisFoto filtered by the status_isian column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildJenisFoto[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildJenisFoto objects based on current ModelCriteria
 * @method     ChildJenisFoto[]|ObjectCollection findByJenisFotoId(int $jenis_foto_id) Return ChildJenisFoto objects filtered by the jenis_foto_id column
 * @method     ChildJenisFoto[]|ObjectCollection findByNamaJenisFoto(string $nama_jenis_foto) Return ChildJenisFoto objects filtered by the nama_jenis_foto column
 * @method     ChildJenisFoto[]|ObjectCollection findByInstruksi(string $instruksi) Return ChildJenisFoto objects filtered by the instruksi column
 * @method     ChildJenisFoto[]|ObjectCollection findByStatusIsian(int $status_isian) Return ChildJenisFoto objects filtered by the status_isian column
 * @method     ChildJenisFoto[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class JenisFotoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Appdb\Base\JenisFotoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'appdb', $modelName = '\\Appdb\\JenisFoto', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildJenisFotoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildJenisFotoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildJenisFotoQuery) {
            return $criteria;
        }
        $query = new ChildJenisFotoQuery();
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
     * @return ChildJenisFoto|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(JenisFotoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = JenisFotoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildJenisFoto A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT jenis_foto_id, nama_jenis_foto, instruksi, status_isian FROM ref.jenis_foto WHERE jenis_foto_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildJenisFoto $obj */
            $obj = new ChildJenisFoto();
            $obj->hydrate($row);
            JenisFotoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildJenisFoto|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildJenisFotoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisFotoTableMap::COL_JENIS_FOTO_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildJenisFotoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisFotoTableMap::COL_JENIS_FOTO_ID, $keys, Criteria::IN);
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
     * @param     mixed $jenisFotoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJenisFotoQuery The current query, for fluid interface
     */
    public function filterByJenisFotoId($jenisFotoId = null, $comparison = null)
    {
        if (is_array($jenisFotoId)) {
            $useMinMax = false;
            if (isset($jenisFotoId['min'])) {
                $this->addUsingAlias(JenisFotoTableMap::COL_JENIS_FOTO_ID, $jenisFotoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisFotoId['max'])) {
                $this->addUsingAlias(JenisFotoTableMap::COL_JENIS_FOTO_ID, $jenisFotoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisFotoTableMap::COL_JENIS_FOTO_ID, $jenisFotoId, $comparison);
    }

    /**
     * Filter the query on the nama_jenis_foto column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaJenisFoto('fooValue');   // WHERE nama_jenis_foto = 'fooValue'
     * $query->filterByNamaJenisFoto('%fooValue%', Criteria::LIKE); // WHERE nama_jenis_foto LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaJenisFoto The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJenisFotoQuery The current query, for fluid interface
     */
    public function filterByNamaJenisFoto($namaJenisFoto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaJenisFoto)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisFotoTableMap::COL_NAMA_JENIS_FOTO, $namaJenisFoto, $comparison);
    }

    /**
     * Filter the query on the instruksi column
     *
     * Example usage:
     * <code>
     * $query->filterByInstruksi('fooValue');   // WHERE instruksi = 'fooValue'
     * $query->filterByInstruksi('%fooValue%', Criteria::LIKE); // WHERE instruksi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $instruksi The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJenisFotoQuery The current query, for fluid interface
     */
    public function filterByInstruksi($instruksi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($instruksi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisFotoTableMap::COL_INSTRUKSI, $instruksi, $comparison);
    }

    /**
     * Filter the query on the status_isian column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusIsian(1234); // WHERE status_isian = 1234
     * $query->filterByStatusIsian(array(12, 34)); // WHERE status_isian IN (12, 34)
     * $query->filterByStatusIsian(array('min' => 12)); // WHERE status_isian > 12
     * </code>
     *
     * @param     mixed $statusIsian The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJenisFotoQuery The current query, for fluid interface
     */
    public function filterByStatusIsian($statusIsian = null, $comparison = null)
    {
        if (is_array($statusIsian)) {
            $useMinMax = false;
            if (isset($statusIsian['min'])) {
                $this->addUsingAlias(JenisFotoTableMap::COL_STATUS_ISIAN, $statusIsian['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusIsian['max'])) {
                $this->addUsingAlias(JenisFotoTableMap::COL_STATUS_ISIAN, $statusIsian['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisFotoTableMap::COL_STATUS_ISIAN, $statusIsian, $comparison);
    }

    /**
     * Filter the query by a related \Appdb\Foto object
     *
     * @param \Appdb\Foto|ObjectCollection $foto the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildJenisFotoQuery The current query, for fluid interface
     */
    public function filterByFoto($foto, $comparison = null)
    {
        if ($foto instanceof \Appdb\Foto) {
            return $this
                ->addUsingAlias(JenisFotoTableMap::COL_JENIS_FOTO_ID, $foto->getJenisFotoId(), $comparison);
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
     * @return $this|ChildJenisFotoQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildJenisFoto $jenisFoto Object to remove from the list of results
     *
     * @return $this|ChildJenisFotoQuery The current query, for fluid interface
     */
    public function prune($jenisFoto = null)
    {
        if ($jenisFoto) {
            $this->addUsingAlias(JenisFotoTableMap::COL_JENIS_FOTO_ID, $jenisFoto->getJenisFotoId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ref.jenis_foto table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(JenisFotoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            JenisFotoTableMap::clearInstancePool();
            JenisFotoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(JenisFotoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(JenisFotoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            JenisFotoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            JenisFotoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // JenisFotoQuery
