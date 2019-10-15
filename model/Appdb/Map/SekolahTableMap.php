<?php

namespace Appdb\Map;

use Appdb\Sekolah;
use Appdb\SekolahQuery;
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
 * This class defines the structure of the 'sekolah' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SekolahTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Appdb.Map.SekolahTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'appdb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'sekolah';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Appdb\\Sekolah';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Appdb.Sekolah';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 43;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 43;

    /**
     * the column name for the sekolah_id field
     */
    const COL_SEKOLAH_ID = 'sekolah.sekolah_id';

    /**
     * the column name for the nama field
     */
    const COL_NAMA = 'sekolah.nama';

    /**
     * the column name for the nama_nomenklatur field
     */
    const COL_NAMA_NOMENKLATUR = 'sekolah.nama_nomenklatur';

    /**
     * the column name for the nss field
     */
    const COL_NSS = 'sekolah.nss';

    /**
     * the column name for the npsn field
     */
    const COL_NPSN = 'sekolah.npsn';

    /**
     * the column name for the bentuk_pendidikan_id field
     */
    const COL_BENTUK_PENDIDIKAN_ID = 'sekolah.bentuk_pendidikan_id';

    /**
     * the column name for the alamat_jalan field
     */
    const COL_ALAMAT_JALAN = 'sekolah.alamat_jalan';

    /**
     * the column name for the rt field
     */
    const COL_RT = 'sekolah.rt';

    /**
     * the column name for the rw field
     */
    const COL_RW = 'sekolah.rw';

    /**
     * the column name for the nama_dusun field
     */
    const COL_NAMA_DUSUN = 'sekolah.nama_dusun';

    /**
     * the column name for the desa_kelurahan field
     */
    const COL_DESA_KELURAHAN = 'sekolah.desa_kelurahan';

    /**
     * the column name for the kode_wilayah field
     */
    const COL_KODE_WILAYAH = 'sekolah.kode_wilayah';

    /**
     * the column name for the kode_pos field
     */
    const COL_KODE_POS = 'sekolah.kode_pos';

    /**
     * the column name for the lintang field
     */
    const COL_LINTANG = 'sekolah.lintang';

    /**
     * the column name for the bujur field
     */
    const COL_BUJUR = 'sekolah.bujur';

    /**
     * the column name for the nomor_telepon field
     */
    const COL_NOMOR_TELEPON = 'sekolah.nomor_telepon';

    /**
     * the column name for the nomor_fax field
     */
    const COL_NOMOR_FAX = 'sekolah.nomor_fax';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'sekolah.email';

    /**
     * the column name for the website field
     */
    const COL_WEBSITE = 'sekolah.website';

    /**
     * the column name for the kebutuhan_khusus_id field
     */
    const COL_KEBUTUHAN_KHUSUS_ID = 'sekolah.kebutuhan_khusus_id';

    /**
     * the column name for the status_sekolah field
     */
    const COL_STATUS_SEKOLAH = 'sekolah.status_sekolah';

    /**
     * the column name for the sk_pendirian_sekolah field
     */
    const COL_SK_PENDIRIAN_SEKOLAH = 'sekolah.sk_pendirian_sekolah';

    /**
     * the column name for the tanggal_sk_pendirian field
     */
    const COL_TANGGAL_SK_PENDIRIAN = 'sekolah.tanggal_sk_pendirian';

    /**
     * the column name for the status_kepemilikan_id field
     */
    const COL_STATUS_KEPEMILIKAN_ID = 'sekolah.status_kepemilikan_id';

    /**
     * the column name for the yayasan_id field
     */
    const COL_YAYASAN_ID = 'sekolah.yayasan_id';

    /**
     * the column name for the sk_izin_operasional field
     */
    const COL_SK_IZIN_OPERASIONAL = 'sekolah.sk_izin_operasional';

    /**
     * the column name for the tanggal_sk_izin_operasional field
     */
    const COL_TANGGAL_SK_IZIN_OPERASIONAL = 'sekolah.tanggal_sk_izin_operasional';

    /**
     * the column name for the no_rekening field
     */
    const COL_NO_REKENING = 'sekolah.no_rekening';

    /**
     * the column name for the nama_bank field
     */
    const COL_NAMA_BANK = 'sekolah.nama_bank';

    /**
     * the column name for the cabang_kcp_unit field
     */
    const COL_CABANG_KCP_UNIT = 'sekolah.cabang_kcp_unit';

    /**
     * the column name for the rekening_atas_nama field
     */
    const COL_REKENING_ATAS_NAMA = 'sekolah.rekening_atas_nama';

    /**
     * the column name for the mbs field
     */
    const COL_MBS = 'sekolah.mbs';

    /**
     * the column name for the luas_tanah_milik field
     */
    const COL_LUAS_TANAH_MILIK = 'sekolah.luas_tanah_milik';

    /**
     * the column name for the luas_tanah_bukan_milik field
     */
    const COL_LUAS_TANAH_BUKAN_MILIK = 'sekolah.luas_tanah_bukan_milik';

    /**
     * the column name for the kode_registrasi field
     */
    const COL_KODE_REGISTRASI = 'sekolah.kode_registrasi';

    /**
     * the column name for the npwp field
     */
    const COL_NPWP = 'sekolah.npwp';

    /**
     * the column name for the nm_wp field
     */
    const COL_NM_WP = 'sekolah.nm_wp';

    /**
     * the column name for the flag field
     */
    const COL_FLAG = 'sekolah.flag';

    /**
     * the column name for the create_date field
     */
    const COL_CREATE_DATE = 'sekolah.create_date';

    /**
     * the column name for the last_update field
     */
    const COL_LAST_UPDATE = 'sekolah.last_update';

    /**
     * the column name for the soft_delete field
     */
    const COL_SOFT_DELETE = 'sekolah.soft_delete';

    /**
     * the column name for the last_sync field
     */
    const COL_LAST_SYNC = 'sekolah.last_sync';

    /**
     * the column name for the updater_id field
     */
    const COL_UPDATER_ID = 'sekolah.updater_id';

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
        self::TYPE_PHPNAME       => array('SekolahId', 'Nama', 'NamaNomenklatur', 'Nss', 'Npsn', 'BentukPendidikanId', 'AlamatJalan', 'Rt', 'Rw', 'NamaDusun', 'DesaKelurahan', 'KodeWilayah', 'KodePos', 'Lintang', 'Bujur', 'NomorTelepon', 'NomorFax', 'Email', 'Website', 'KebutuhanKhususId', 'StatusSekolah', 'SkPendirianSekolah', 'TanggalSkPendirian', 'StatusKepemilikanId', 'YayasanId', 'SkIzinOperasional', 'TanggalSkIzinOperasional', 'NoRekening', 'NamaBank', 'CabangKcpUnit', 'RekeningAtasNama', 'Mbs', 'LuasTanahMilik', 'LuasTanahBukanMilik', 'KodeRegistrasi', 'Npwp', 'NmWp', 'Flag', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        self::TYPE_CAMELNAME     => array('sekolahId', 'nama', 'namaNomenklatur', 'nss', 'npsn', 'bentukPendidikanId', 'alamatJalan', 'rt', 'rw', 'namaDusun', 'desaKelurahan', 'kodeWilayah', 'kodePos', 'lintang', 'bujur', 'nomorTelepon', 'nomorFax', 'email', 'website', 'kebutuhanKhususId', 'statusSekolah', 'skPendirianSekolah', 'tanggalSkPendirian', 'statusKepemilikanId', 'yayasanId', 'skIzinOperasional', 'tanggalSkIzinOperasional', 'noRekening', 'namaBank', 'cabangKcpUnit', 'rekeningAtasNama', 'mbs', 'luasTanahMilik', 'luasTanahBukanMilik', 'kodeRegistrasi', 'npwp', 'nmWp', 'flag', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        self::TYPE_COLNAME       => array(SekolahTableMap::COL_SEKOLAH_ID, SekolahTableMap::COL_NAMA, SekolahTableMap::COL_NAMA_NOMENKLATUR, SekolahTableMap::COL_NSS, SekolahTableMap::COL_NPSN, SekolahTableMap::COL_BENTUK_PENDIDIKAN_ID, SekolahTableMap::COL_ALAMAT_JALAN, SekolahTableMap::COL_RT, SekolahTableMap::COL_RW, SekolahTableMap::COL_NAMA_DUSUN, SekolahTableMap::COL_DESA_KELURAHAN, SekolahTableMap::COL_KODE_WILAYAH, SekolahTableMap::COL_KODE_POS, SekolahTableMap::COL_LINTANG, SekolahTableMap::COL_BUJUR, SekolahTableMap::COL_NOMOR_TELEPON, SekolahTableMap::COL_NOMOR_FAX, SekolahTableMap::COL_EMAIL, SekolahTableMap::COL_WEBSITE, SekolahTableMap::COL_KEBUTUHAN_KHUSUS_ID, SekolahTableMap::COL_STATUS_SEKOLAH, SekolahTableMap::COL_SK_PENDIRIAN_SEKOLAH, SekolahTableMap::COL_TANGGAL_SK_PENDIRIAN, SekolahTableMap::COL_STATUS_KEPEMILIKAN_ID, SekolahTableMap::COL_YAYASAN_ID, SekolahTableMap::COL_SK_IZIN_OPERASIONAL, SekolahTableMap::COL_TANGGAL_SK_IZIN_OPERASIONAL, SekolahTableMap::COL_NO_REKENING, SekolahTableMap::COL_NAMA_BANK, SekolahTableMap::COL_CABANG_KCP_UNIT, SekolahTableMap::COL_REKENING_ATAS_NAMA, SekolahTableMap::COL_MBS, SekolahTableMap::COL_LUAS_TANAH_MILIK, SekolahTableMap::COL_LUAS_TANAH_BUKAN_MILIK, SekolahTableMap::COL_KODE_REGISTRASI, SekolahTableMap::COL_NPWP, SekolahTableMap::COL_NM_WP, SekolahTableMap::COL_FLAG, SekolahTableMap::COL_CREATE_DATE, SekolahTableMap::COL_LAST_UPDATE, SekolahTableMap::COL_SOFT_DELETE, SekolahTableMap::COL_LAST_SYNC, SekolahTableMap::COL_UPDATER_ID, ),
        self::TYPE_FIELDNAME     => array('sekolah_id', 'nama', 'nama_nomenklatur', 'nss', 'npsn', 'bentuk_pendidikan_id', 'alamat_jalan', 'rt', 'rw', 'nama_dusun', 'desa_kelurahan', 'kode_wilayah', 'kode_pos', 'lintang', 'bujur', 'nomor_telepon', 'nomor_fax', 'email', 'website', 'kebutuhan_khusus_id', 'status_sekolah', 'sk_pendirian_sekolah', 'tanggal_sk_pendirian', 'status_kepemilikan_id', 'yayasan_id', 'sk_izin_operasional', 'tanggal_sk_izin_operasional', 'no_rekening', 'nama_bank', 'cabang_kcp_unit', 'rekening_atas_nama', 'mbs', 'luas_tanah_milik', 'luas_tanah_bukan_milik', 'kode_registrasi', 'npwp', 'nm_wp', 'flag', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('SekolahId' => 0, 'Nama' => 1, 'NamaNomenklatur' => 2, 'Nss' => 3, 'Npsn' => 4, 'BentukPendidikanId' => 5, 'AlamatJalan' => 6, 'Rt' => 7, 'Rw' => 8, 'NamaDusun' => 9, 'DesaKelurahan' => 10, 'KodeWilayah' => 11, 'KodePos' => 12, 'Lintang' => 13, 'Bujur' => 14, 'NomorTelepon' => 15, 'NomorFax' => 16, 'Email' => 17, 'Website' => 18, 'KebutuhanKhususId' => 19, 'StatusSekolah' => 20, 'SkPendirianSekolah' => 21, 'TanggalSkPendirian' => 22, 'StatusKepemilikanId' => 23, 'YayasanId' => 24, 'SkIzinOperasional' => 25, 'TanggalSkIzinOperasional' => 26, 'NoRekening' => 27, 'NamaBank' => 28, 'CabangKcpUnit' => 29, 'RekeningAtasNama' => 30, 'Mbs' => 31, 'LuasTanahMilik' => 32, 'LuasTanahBukanMilik' => 33, 'KodeRegistrasi' => 34, 'Npwp' => 35, 'NmWp' => 36, 'Flag' => 37, 'CreateDate' => 38, 'LastUpdate' => 39, 'SoftDelete' => 40, 'LastSync' => 41, 'UpdaterId' => 42, ),
        self::TYPE_CAMELNAME     => array('sekolahId' => 0, 'nama' => 1, 'namaNomenklatur' => 2, 'nss' => 3, 'npsn' => 4, 'bentukPendidikanId' => 5, 'alamatJalan' => 6, 'rt' => 7, 'rw' => 8, 'namaDusun' => 9, 'desaKelurahan' => 10, 'kodeWilayah' => 11, 'kodePos' => 12, 'lintang' => 13, 'bujur' => 14, 'nomorTelepon' => 15, 'nomorFax' => 16, 'email' => 17, 'website' => 18, 'kebutuhanKhususId' => 19, 'statusSekolah' => 20, 'skPendirianSekolah' => 21, 'tanggalSkPendirian' => 22, 'statusKepemilikanId' => 23, 'yayasanId' => 24, 'skIzinOperasional' => 25, 'tanggalSkIzinOperasional' => 26, 'noRekening' => 27, 'namaBank' => 28, 'cabangKcpUnit' => 29, 'rekeningAtasNama' => 30, 'mbs' => 31, 'luasTanahMilik' => 32, 'luasTanahBukanMilik' => 33, 'kodeRegistrasi' => 34, 'npwp' => 35, 'nmWp' => 36, 'flag' => 37, 'createDate' => 38, 'lastUpdate' => 39, 'softDelete' => 40, 'lastSync' => 41, 'updaterId' => 42, ),
        self::TYPE_COLNAME       => array(SekolahTableMap::COL_SEKOLAH_ID => 0, SekolahTableMap::COL_NAMA => 1, SekolahTableMap::COL_NAMA_NOMENKLATUR => 2, SekolahTableMap::COL_NSS => 3, SekolahTableMap::COL_NPSN => 4, SekolahTableMap::COL_BENTUK_PENDIDIKAN_ID => 5, SekolahTableMap::COL_ALAMAT_JALAN => 6, SekolahTableMap::COL_RT => 7, SekolahTableMap::COL_RW => 8, SekolahTableMap::COL_NAMA_DUSUN => 9, SekolahTableMap::COL_DESA_KELURAHAN => 10, SekolahTableMap::COL_KODE_WILAYAH => 11, SekolahTableMap::COL_KODE_POS => 12, SekolahTableMap::COL_LINTANG => 13, SekolahTableMap::COL_BUJUR => 14, SekolahTableMap::COL_NOMOR_TELEPON => 15, SekolahTableMap::COL_NOMOR_FAX => 16, SekolahTableMap::COL_EMAIL => 17, SekolahTableMap::COL_WEBSITE => 18, SekolahTableMap::COL_KEBUTUHAN_KHUSUS_ID => 19, SekolahTableMap::COL_STATUS_SEKOLAH => 20, SekolahTableMap::COL_SK_PENDIRIAN_SEKOLAH => 21, SekolahTableMap::COL_TANGGAL_SK_PENDIRIAN => 22, SekolahTableMap::COL_STATUS_KEPEMILIKAN_ID => 23, SekolahTableMap::COL_YAYASAN_ID => 24, SekolahTableMap::COL_SK_IZIN_OPERASIONAL => 25, SekolahTableMap::COL_TANGGAL_SK_IZIN_OPERASIONAL => 26, SekolahTableMap::COL_NO_REKENING => 27, SekolahTableMap::COL_NAMA_BANK => 28, SekolahTableMap::COL_CABANG_KCP_UNIT => 29, SekolahTableMap::COL_REKENING_ATAS_NAMA => 30, SekolahTableMap::COL_MBS => 31, SekolahTableMap::COL_LUAS_TANAH_MILIK => 32, SekolahTableMap::COL_LUAS_TANAH_BUKAN_MILIK => 33, SekolahTableMap::COL_KODE_REGISTRASI => 34, SekolahTableMap::COL_NPWP => 35, SekolahTableMap::COL_NM_WP => 36, SekolahTableMap::COL_FLAG => 37, SekolahTableMap::COL_CREATE_DATE => 38, SekolahTableMap::COL_LAST_UPDATE => 39, SekolahTableMap::COL_SOFT_DELETE => 40, SekolahTableMap::COL_LAST_SYNC => 41, SekolahTableMap::COL_UPDATER_ID => 42, ),
        self::TYPE_FIELDNAME     => array('sekolah_id' => 0, 'nama' => 1, 'nama_nomenklatur' => 2, 'nss' => 3, 'npsn' => 4, 'bentuk_pendidikan_id' => 5, 'alamat_jalan' => 6, 'rt' => 7, 'rw' => 8, 'nama_dusun' => 9, 'desa_kelurahan' => 10, 'kode_wilayah' => 11, 'kode_pos' => 12, 'lintang' => 13, 'bujur' => 14, 'nomor_telepon' => 15, 'nomor_fax' => 16, 'email' => 17, 'website' => 18, 'kebutuhan_khusus_id' => 19, 'status_sekolah' => 20, 'sk_pendirian_sekolah' => 21, 'tanggal_sk_pendirian' => 22, 'status_kepemilikan_id' => 23, 'yayasan_id' => 24, 'sk_izin_operasional' => 25, 'tanggal_sk_izin_operasional' => 26, 'no_rekening' => 27, 'nama_bank' => 28, 'cabang_kcp_unit' => 29, 'rekening_atas_nama' => 30, 'mbs' => 31, 'luas_tanah_milik' => 32, 'luas_tanah_bukan_milik' => 33, 'kode_registrasi' => 34, 'npwp' => 35, 'nm_wp' => 36, 'flag' => 37, 'create_date' => 38, 'last_update' => 39, 'soft_delete' => 40, 'last_sync' => 41, 'updater_id' => 42, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, )
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
        $this->setName('sekolah');
        $this->setPhpName('Sekolah');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Appdb\\Sekolah');
        $this->setPackage('Appdb');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sekolah_id', 'SekolahId', 'CHAR', true, 16, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 100, null);
        $this->addColumn('nama_nomenklatur', 'NamaNomenklatur', 'VARCHAR', false, 100, null);
        $this->addColumn('nss', 'Nss', 'CHAR', false, 12, null);
        $this->addColumn('npsn', 'Npsn', 'CHAR', false, 8, null);
        $this->addColumn('bentuk_pendidikan_id', 'BentukPendidikanId', 'SMALLINT', true, 2, null);
        $this->addColumn('alamat_jalan', 'AlamatJalan', 'VARCHAR', true, 80, null);
        $this->addColumn('rt', 'Rt', 'NUMERIC', false, 4, null);
        $this->addColumn('rw', 'Rw', 'NUMERIC', false, 4, null);
        $this->addColumn('nama_dusun', 'NamaDusun', 'VARCHAR', false, 60, null);
        $this->addColumn('desa_kelurahan', 'DesaKelurahan', 'VARCHAR', true, 60, null);
        $this->addColumn('kode_wilayah', 'KodeWilayah', 'CHAR', true, 8, null);
        $this->addColumn('kode_pos', 'KodePos', 'CHAR', false, 5, null);
        $this->addColumn('lintang', 'Lintang', 'NUMERIC', false, 13, null);
        $this->addColumn('bujur', 'Bujur', 'NUMERIC', false, 13, null);
        $this->addColumn('nomor_telepon', 'NomorTelepon', 'VARCHAR', false, 20, null);
        $this->addColumn('nomor_fax', 'NomorFax', 'VARCHAR', false, 20, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 60, null);
        $this->addColumn('website', 'Website', 'VARCHAR', false, 100, null);
        $this->addColumn('kebutuhan_khusus_id', 'KebutuhanKhususId', 'INTEGER', true, 4, null);
        $this->addColumn('status_sekolah', 'StatusSekolah', 'NUMERIC', true, 3, null);
        $this->addColumn('sk_pendirian_sekolah', 'SkPendirianSekolah', 'VARCHAR', false, 80, null);
        $this->addColumn('tanggal_sk_pendirian', 'TanggalSkPendirian', 'TIMESTAMP', false, 16, null);
        $this->addColumn('status_kepemilikan_id', 'StatusKepemilikanId', 'NUMERIC', true, 3, null);
        $this->addColumn('yayasan_id', 'YayasanId', 'VARCHAR', false, 36, null);
        $this->addColumn('sk_izin_operasional', 'SkIzinOperasional', 'VARCHAR', false, 80, null);
        $this->addColumn('tanggal_sk_izin_operasional', 'TanggalSkIzinOperasional', 'TIMESTAMP', false, 16, null);
        $this->addColumn('no_rekening', 'NoRekening', 'VARCHAR', false, 20, null);
        $this->addColumn('nama_bank', 'NamaBank', 'VARCHAR', false, 20, null);
        $this->addColumn('cabang_kcp_unit', 'CabangKcpUnit', 'VARCHAR', false, 60, null);
        $this->addColumn('rekening_atas_nama', 'RekeningAtasNama', 'VARCHAR', false, 50, null);
        $this->addColumn('mbs', 'Mbs', 'NUMERIC', true, 3, null);
        $this->addColumn('luas_tanah_milik', 'LuasTanahMilik', 'NUMERIC', true, 9, null);
        $this->addColumn('luas_tanah_bukan_milik', 'LuasTanahBukanMilik', 'NUMERIC', true, 9, null);
        $this->addColumn('kode_registrasi', 'KodeRegistrasi', 'BIGINT', false, 8, null);
        $this->addColumn('npwp', 'Npwp', 'CHAR', false, 15, null);
        $this->addColumn('nm_wp', 'NmWp', 'VARCHAR', false, 100, null);
        $this->addColumn('flag', 'Flag', 'CHAR', false, 3, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', false, 16, null);
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
        $this->addRelation('Foto', '\\Appdb\\Foto', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':sekolah_id',
    1 => ':sekolah_id',
  ),
), null, null, 'Fotos', false);
        $this->addRelation('Geotag', '\\Appdb\\Geotag', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':sekolah_id',
    1 => ':sekolah_id',
  ),
), null, null, 'Geotags', false);
        $this->addRelation('Pengguna', '\\Appdb\\Pengguna', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':sekolah_id',
    1 => ':sekolah_id',
  ),
), null, null, 'Penggunas', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SekolahId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SekolahId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SekolahId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SekolahId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SekolahId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SekolahId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('SekolahId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SekolahTableMap::CLASS_DEFAULT : SekolahTableMap::OM_CLASS;
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
     * @return array           (Sekolah object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SekolahTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SekolahTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SekolahTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SekolahTableMap::OM_CLASS;
            /** @var Sekolah $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SekolahTableMap::addInstanceToPool($obj, $key);
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
            $key = SekolahTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SekolahTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Sekolah $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SekolahTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SekolahTableMap::COL_SEKOLAH_ID);
            $criteria->addSelectColumn(SekolahTableMap::COL_NAMA);
            $criteria->addSelectColumn(SekolahTableMap::COL_NAMA_NOMENKLATUR);
            $criteria->addSelectColumn(SekolahTableMap::COL_NSS);
            $criteria->addSelectColumn(SekolahTableMap::COL_NPSN);
            $criteria->addSelectColumn(SekolahTableMap::COL_BENTUK_PENDIDIKAN_ID);
            $criteria->addSelectColumn(SekolahTableMap::COL_ALAMAT_JALAN);
            $criteria->addSelectColumn(SekolahTableMap::COL_RT);
            $criteria->addSelectColumn(SekolahTableMap::COL_RW);
            $criteria->addSelectColumn(SekolahTableMap::COL_NAMA_DUSUN);
            $criteria->addSelectColumn(SekolahTableMap::COL_DESA_KELURAHAN);
            $criteria->addSelectColumn(SekolahTableMap::COL_KODE_WILAYAH);
            $criteria->addSelectColumn(SekolahTableMap::COL_KODE_POS);
            $criteria->addSelectColumn(SekolahTableMap::COL_LINTANG);
            $criteria->addSelectColumn(SekolahTableMap::COL_BUJUR);
            $criteria->addSelectColumn(SekolahTableMap::COL_NOMOR_TELEPON);
            $criteria->addSelectColumn(SekolahTableMap::COL_NOMOR_FAX);
            $criteria->addSelectColumn(SekolahTableMap::COL_EMAIL);
            $criteria->addSelectColumn(SekolahTableMap::COL_WEBSITE);
            $criteria->addSelectColumn(SekolahTableMap::COL_KEBUTUHAN_KHUSUS_ID);
            $criteria->addSelectColumn(SekolahTableMap::COL_STATUS_SEKOLAH);
            $criteria->addSelectColumn(SekolahTableMap::COL_SK_PENDIRIAN_SEKOLAH);
            $criteria->addSelectColumn(SekolahTableMap::COL_TANGGAL_SK_PENDIRIAN);
            $criteria->addSelectColumn(SekolahTableMap::COL_STATUS_KEPEMILIKAN_ID);
            $criteria->addSelectColumn(SekolahTableMap::COL_YAYASAN_ID);
            $criteria->addSelectColumn(SekolahTableMap::COL_SK_IZIN_OPERASIONAL);
            $criteria->addSelectColumn(SekolahTableMap::COL_TANGGAL_SK_IZIN_OPERASIONAL);
            $criteria->addSelectColumn(SekolahTableMap::COL_NO_REKENING);
            $criteria->addSelectColumn(SekolahTableMap::COL_NAMA_BANK);
            $criteria->addSelectColumn(SekolahTableMap::COL_CABANG_KCP_UNIT);
            $criteria->addSelectColumn(SekolahTableMap::COL_REKENING_ATAS_NAMA);
            $criteria->addSelectColumn(SekolahTableMap::COL_MBS);
            $criteria->addSelectColumn(SekolahTableMap::COL_LUAS_TANAH_MILIK);
            $criteria->addSelectColumn(SekolahTableMap::COL_LUAS_TANAH_BUKAN_MILIK);
            $criteria->addSelectColumn(SekolahTableMap::COL_KODE_REGISTRASI);
            $criteria->addSelectColumn(SekolahTableMap::COL_NPWP);
            $criteria->addSelectColumn(SekolahTableMap::COL_NM_WP);
            $criteria->addSelectColumn(SekolahTableMap::COL_FLAG);
            $criteria->addSelectColumn(SekolahTableMap::COL_CREATE_DATE);
            $criteria->addSelectColumn(SekolahTableMap::COL_LAST_UPDATE);
            $criteria->addSelectColumn(SekolahTableMap::COL_SOFT_DELETE);
            $criteria->addSelectColumn(SekolahTableMap::COL_LAST_SYNC);
            $criteria->addSelectColumn(SekolahTableMap::COL_UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.nama_nomenklatur');
            $criteria->addSelectColumn($alias . '.nss');
            $criteria->addSelectColumn($alias . '.npsn');
            $criteria->addSelectColumn($alias . '.bentuk_pendidikan_id');
            $criteria->addSelectColumn($alias . '.alamat_jalan');
            $criteria->addSelectColumn($alias . '.rt');
            $criteria->addSelectColumn($alias . '.rw');
            $criteria->addSelectColumn($alias . '.nama_dusun');
            $criteria->addSelectColumn($alias . '.desa_kelurahan');
            $criteria->addSelectColumn($alias . '.kode_wilayah');
            $criteria->addSelectColumn($alias . '.kode_pos');
            $criteria->addSelectColumn($alias . '.lintang');
            $criteria->addSelectColumn($alias . '.bujur');
            $criteria->addSelectColumn($alias . '.nomor_telepon');
            $criteria->addSelectColumn($alias . '.nomor_fax');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.website');
            $criteria->addSelectColumn($alias . '.kebutuhan_khusus_id');
            $criteria->addSelectColumn($alias . '.status_sekolah');
            $criteria->addSelectColumn($alias . '.sk_pendirian_sekolah');
            $criteria->addSelectColumn($alias . '.tanggal_sk_pendirian');
            $criteria->addSelectColumn($alias . '.status_kepemilikan_id');
            $criteria->addSelectColumn($alias . '.yayasan_id');
            $criteria->addSelectColumn($alias . '.sk_izin_operasional');
            $criteria->addSelectColumn($alias . '.tanggal_sk_izin_operasional');
            $criteria->addSelectColumn($alias . '.no_rekening');
            $criteria->addSelectColumn($alias . '.nama_bank');
            $criteria->addSelectColumn($alias . '.cabang_kcp_unit');
            $criteria->addSelectColumn($alias . '.rekening_atas_nama');
            $criteria->addSelectColumn($alias . '.mbs');
            $criteria->addSelectColumn($alias . '.luas_tanah_milik');
            $criteria->addSelectColumn($alias . '.luas_tanah_bukan_milik');
            $criteria->addSelectColumn($alias . '.kode_registrasi');
            $criteria->addSelectColumn($alias . '.npwp');
            $criteria->addSelectColumn($alias . '.nm_wp');
            $criteria->addSelectColumn($alias . '.flag');
            $criteria->addSelectColumn($alias . '.create_date');
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
        return Propel::getServiceContainer()->getDatabaseMap(SekolahTableMap::DATABASE_NAME)->getTable(SekolahTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SekolahTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SekolahTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SekolahTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Sekolah or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Sekolah object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SekolahTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Appdb\Sekolah) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SekolahTableMap::DATABASE_NAME);
            $criteria->add(SekolahTableMap::COL_SEKOLAH_ID, (array) $values, Criteria::IN);
        }

        $query = SekolahQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SekolahTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SekolahTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the sekolah table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SekolahQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Sekolah or Criteria object.
     *
     * @param mixed               $criteria Criteria or Sekolah object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SekolahTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Sekolah object
        }


        // Set the correct dbName
        $query = SekolahQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SekolahTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SekolahTableMap::buildTableMap();
