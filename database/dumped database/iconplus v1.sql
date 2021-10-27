/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2/26/2021 12:04:20 PM                        */
/*==============================================================*/


drop table if exists ACTIVATION_LIST;

drop table if exists ACTIVATION_REQUEST;

drop table if exists ADDREESS;

drop table if exists AGREEMENTS;

drop table if exists ANNUAL_TARGET;

drop table if exists BAKBB;

drop table if exists BOQ;

drop table if exists LEADS;

drop table if exists MENUS;

drop table if exists OPPORTUNITIES;

drop table if exists PRODUCT;

drop table if exists PRODUCT_LINE_ITEM;

drop table if exists PROGRESS;

drop table if exists PROJECT_ACTIVATION;

drop table if exists PROJECT_ACTIVATION_NODE;

drop table if exists PROJECT_INITATION;

drop table if exists PROJECT_SURVEY;

drop table if exists PS_NODE;

drop table if exists ROLES;

drop table if exists ROLE_MENU;

drop table if exists SBU;

drop table if exists SERVICES;

drop table if exists SLA;

drop table if exists USERS;

/*==============================================================*/
/* Table: ACTIVATION_LIST                                       */
/*==============================================================*/
create table ACTIVATION_LIST
(
   ID_AL                int not null auto_increment,
   ID_AGREEMENT         int,
   NO_AL                varchar(256),
   CRM_STATUS               varchar(256),
   SBU                  varchar(256),
   PEMILIK                varchar(256),
   DEKRIPSI             varchar(256),
   primary key (ID_AL)
);

/*==============================================================*/
/* Table: ACTIVATION_REQUEST                                    */
/*==============================================================*/
create table ACTIVATION_REQUEST
(
   ID_AR                int not null auto_increment ,
   ID_AGREEMENT         int,
   NO_AR                varchar(256),
   TANGGAL_AKTIVASI     date,
   TANGGAL_PERMINTAAN_AKTIVASI date,
   TANGGAL_TERAKTIVASI  date,
   CRM_STATUS               varchar(256),
   PEMILIK                varchar(256),
   primary key (ID_AR)
);

/*==============================================================*/
/* Table: ADDREESS                                              */
/*==============================================================*/
create table ADDREESS
(
   ID_ADDRESS           int not null auto_increment,
   ID_OPPORTUNITY       int,
   NO_ADDRESS           varchar(256),
   NAMA                 varchar(256),
   KATEGORI             varchar(256),
   TIPE                 varchar(256),
   KORDINAT             varchar(256),
   CABANG_SBU           varchar(256),
   NEGARA               varchar(256),
   PROVINSI             varchar(256),
   KABUPATEN            varchar(256),
   KECAMATAN            varchar(256),
   JALAN                varchar(256),
   KODE_POST            varchar(256),
   ALAMAT               varchar(256),
   primary key (ID_ADDRESS)
);

/*==============================================================*/
/* Table: AGREEMENTS                                            */
/*==============================================================*/
create table AGREEMENTS
(
   ID_AGREEMENT         int not null auto_increment,
   ID_OPPORTUNITY       int not null,
   ID_USER              int not null,
   NO_AGREEMENT         varchar(256),
   TANGGAL_AGREEMENT    date,
   TANGGAL_MULAI        date,
   TANGGAL_BERAKHIR     date,
   IS_RENEWAL           varchar(256),
   JENIS_TAGIHAN        varchar(256),
   TANGGAL_POTONG       date,
   TIPE_PERIODE         varchar(256),
   PERIODE              int,
   PER_PERIODE          varchar(256),
   JANGKA_WAKTU         varchar(256),
   AGREEMENT_TEKS       varchar(256),
   HUKUMAN              varchar(256),
   AKUN_BANK            varchar(256),
   REKENING             varchar(256),
   CRM_STATUS               varchar(256),
   SBU_OWNER            varchar(256),
   PEMILIK              varchar(256),
   DESKRIPSI            varchar(256),
   primary key (ID_AGREEMENT)
);

/*==============================================================*/
/* Table: ANNUAL_TARGET                                         */
/*==============================================================*/
create table ANNUAL_TARGET
(
   ID_ANNUAL            int not null auto_increment,
   ID_USER              int,
   ANNUAL_TARGET               int not null,
   PERIODE              int not null,
   CRM_STATUS               varchar(256),
   primary key (ID_ANNUAL)
);

/*==============================================================*/
/* Table: BAKBB                                                 */
/*==============================================================*/
create table BAKBB
(
   ID_BAKBB             int not null auto_increment,
   ID_OPPORTUNITY       int,
   ID_AGREEMENT         int,
   NO_BAKBB             varchar(256),
   TIPE                 varchar(256),
   OPPORTUNITY          varchar(256),
   AGGREMENT_ID         varchar(256),
   PEMILIK              varchar(256),
   TANGGAL              date,
   PIHAK_PERTAMA        varchar(256),
   PERWAKILAN           varchar(256),
   TELEPON              varchar(256),
   PIHAK_KEDUA          varchar(256),
   PERWAKILAN_PELANGGAN varchar(256),
   TOTAL_PEMASANGAN     int,
   TOTAL_BIAYA_LANGGANAN int,
   TOTAL                int,
   JUMLAH_HARI_PENAGIHAN int,
   JUMLAH_BULAN         int,
   ALAMAT_PENAGIHAN     varchar(256),
   SBU                  varchar(256),
   primary key (ID_BAKBB)
);

/*==============================================================*/
/* Table: BOQ                                                   */
/*==============================================================*/
create table BOQ
(
   ID_BOQ               int not null auto_increment,
   ID_PS                int,
   MATERIAL             varchar(256),
   DESKRIPSI            varchar(256),
   TIPE_MATERIAL        varchar(256),
   BRAND                varchar(256),
   QUANTITY             int,
   HARGA_UNIT           int,
   SAP                  varchar(256),
   primary key (ID_BOQ)
);

/*==============================================================*/
/* Table: LEADS                                                 */
/*==============================================================*/
create table LEADS
(
   ID_LEADS             int not null auto_increment,
   ID_USER              int,
   TOPIC                int,
   NAMA                 varchar(256),
   PEKERJAAN            varchar(256),
   TELEPON              varchar(256),
   COORDINAT            varchar(256),
   ALAMAT               varchar(256),
   PENAWARAN            date,
   PENAWARAN_KEMBALI    date,
   AKTIVITAS            varchar(1024),
   SUMBER_LEAD          varchar(256),
   RATING               varchar(256),
   CRM_STATUS               varchar(256),
   PEMILIK                varchar(256),
   ASSIGN_USER          int,
   primary key (ID_LEADS)
);

/*==============================================================*/
/* Table: MENUS                                                 */
/*==============================================================*/
create table MENUS
(
   ID_MENU              int not null auto_increment,
   MEN_ID_MENU          int,
   NAMA_MENU            varchar(256) not null,
   ICON                 varchar(256),
   LINK                 varchar(256),
   primary key (ID_MENU)
);

/*==============================================================*/
/* Table: OPPORTUNITIES                                         */
/*==============================================================*/
create table OPPORTUNITIES
(
   ID_OPPORTUNITY       int not null auto_increment,
   NO_OPPORTUNITY       varchar(256),
   TOPIC                varchar(256),
   TANGGAL              date,
   TANGGAL_TARGET       date,
   TIPE_SURVEY          varchar(256),
   WAKTU_PEMESANAN      varchar(256),
   PENDAPATAN           int,
   ANGGARAN             int,
   PROSES_PEMESANAN     varchar(256),
   DESKRIPSI            varchar(256),
   SITUASI_SEKARANG     varchar(256),
   KEBUTUHAN_PELANGGAN  varchar(256),
   SOLUSI               varchar(256),
   AKTIVITAS            varchar(1024),
   KATEGORI             varchar(256),
   CRM_STATUS               varchar(256),
   SBU                  varchar(256),
   PEMILIK              varchar(256),
   primary key (ID_OPPORTUNITY)
);

/*==============================================================*/
/* Table: PRODUCT                                               */
/*==============================================================*/
create table PRODUCT
(
   ID_PRODUCT           int not null auto_increment,
   NAMA_PRODUCT         varchar(256),
   SEKALI_PAKAI         varchar(256),
   AWAL_PENGGUNAAN      varchar(256),
   AKHIR_PENGGUNAAN     varchar(256),
   HARGA_DEFAULT        int,
   primary key (ID_PRODUCT)
);

/*==============================================================*/
/* Table: PRODUCT_LINE_ITEM                                     */
/*==============================================================*/
create table PRODUCT_LINE_ITEM
(
   ID_PLI               int not null auto_increment,
   NO_PLI               varchar(256),
   ID_AR                int,
   ID_BAKBB             int,
   ID_PS                int,
   ID_PA                int,
   ACT_ID_AL            int,
   ID_SERVICE           int,
   ID_PRODUCT           int,
   ID_SLA               int,
   ID_AGREEMENT         int,
   DESKRIPSI            varchar(1024),
   BANDWIDTH            varchar(256),
   PRICE_UNIT           int,
   QUANTITY             int,
   DSICOUNT             int,
   JUMLAH               int,
   HJT_NAMA             varchar(256),
   HJT_HARGA            int,
   TV_ADD_ON            varchar(256),
   primary key (ID_PLI)
);

/*==============================================================*/
/* Table: PROGRESS                                              */
/*==============================================================*/
create table PROGRESS
(
   ID_PROGRESS          int not null auto_increment,
   ID_PS                int not null,
   TANGGAL              date,
   KENDALA              varchar(256),
   DESKRIPSI            varchar(256),
   CRM_STATUS               varchar(256),
   PEMILIK                varchar(256),
   primary key (ID_PROGRESS)
);

/*==============================================================*/
/* Table: PROJECT_ACTIVATION                                    */
/*==============================================================*/
create table PROJECT_ACTIVATION
(
   ID_PA                int not null auto_increment,
   ID_OPPORTUNITY       int,
   NO_PA                varchar(256),
   CRM_STATUS               varchar(256),
   PEMILIK                varchar(256),
   primary key (ID_PA)
);

/*==============================================================*/
/* Table: PROJECT_ACTIVATION_NODE                               */
/*==============================================================*/
create table PROJECT_ACTIVATION_NODE
(
   ID_PA_NODE           int not null auto_increment,
   ID_PA                int,
   NO_PA_NODE           varchar(256),
   CRM_STATUS               varchar(256),
   PIC                  varchar(256),
   primary key (ID_PA_NODE)
);

/*==============================================================*/
/* Table: PROJECT_INITATION                                     */
/*==============================================================*/
create table PROJECT_INITATION
(
   ID_INITATION         int not null auto_increment,
   ID_PA_NODE           int,
   NO_INIATION          varchar(256),
   TANGGAL_MULAI        date,
   KENDALA              varchar(256),
   CRM_STATUS               varchar(256),
   CREATED_ON           timestamp,
   primary key (ID_INITATION)
);

/*==============================================================*/
/* Table: PROJECT_SURVEY                                        */
/*==============================================================*/
create table PROJECT_SURVEY
(
   ID_PS                int not null auto_increment,
   ID_OPPORTUNITY       int,
   PELANGGAN            varchar(256),
   TANGGAL_OPPORTUNITY  date,
   TANGGAL_TARGET       date,
   NAMA_SALES           varchar(256),
   DESKIPSI             varchar(256),
   LEADER               varchar(256),
   TANGGAL_SELESAI      date,
   REMARK               varchar(256),
   primary key (ID_PS)
);

/*==============================================================*/
/* Table: PS_NODE                                               */
/*==============================================================*/
create table PS_NODE
(
   ID_PS                int not null auto_increment,
   NO_PS                varchar(256),
   CRM_STATUS               varchar(256),
   PIC                  varchar(256),
   primary key (ID_PS)
);

/*==============================================================*/
/* Table: ROLES                                                 */
/*==============================================================*/
create table ROLES
(
   ID_ROLE              int not null auto_increment,
   CRM_ROLE                 varchar(256) not null,
   DESKRIPSI            varchar(256),
   primary key (ID_ROLE)
);

/*==============================================================*/
/* Table: ROLE_MENU                                             */
/*==============================================================*/
create table ROLE_MENU
(
   ID_ROLE              int not null,
   ID_MENU              int not null,
   primary key (ID_ROLE, ID_MENU)
);

/*==============================================================*/
/* Table: SBU                                                   */
/*==============================================================*/
create table SBU
(
   ID_SBU               int not null auto_increment,
   SBU_OWNER            varchar(256) not null,
   DESKRIPSI            varchar(256) not null,
   SBU_REGION           char(10),
   primary key (ID_SBU)
);

/*==============================================================*/
/* Table: SERVICES                                              */
/*==============================================================*/
create table SERVICES
(
   ID_SERVICE           int not null auto_increment,
   PELANGGAN            varchar(256),
   PRODUCT              varchar(256),
   STATUS               varchar(256),
   STATUS1              varchar(256),
   STATUS2              varchar(256),
   STATUS3              varchar(256),
   NOTE                 varchar(512),
   PEMILIK              varchar(256),
   primary key (ID_SERVICE)
);

/*==============================================================*/
/* Table: SLA                                                   */
/*==============================================================*/
create table SLA
(
   ID_SLA               int not null auto_increment,
   PELANGGAN            varchar(256),
   PRODUK               varchar(256),
   KATEGORI             varchar(256),
   LAST_MILE            varchar(256),
   KETERSEDIAAN         varchar(256),
   primary key (ID_SLA)
);

/*==============================================================*/
/* Table: USERS                                                 */
/*==============================================================*/
create table USERS
(
   ID_USER              int not null auto_increment,
   ID_SBU               int,
   ID_ROLE              int,
   CRM_EMAIL            varchar(256) unique,
   CRM_PASSWORD         varchar(256),
   NAMA_LENGKAP         varchar(256),
   TELEPON              varchar(256),
   CHANGE_PASSWORD      date,
   CRM_STATUS           varchar(256),
   primary key (ID_USER)
);

alter table ACTIVATION_LIST add constraint FK_RELATIONSHIP_30 foreign key (ID_AGREEMENT)
      references AGREEMENTS (ID_AGREEMENT) on delete restrict on update restrict;

alter table ACTIVATION_REQUEST add constraint FK_RELATIONSHIP_34 foreign key (ID_AGREEMENT)
      references AGREEMENTS (ID_AGREEMENT) on delete restrict on update restrict;

alter table ADDREESS add constraint FK_RELATIONSHIP_9 foreign key (ID_OPPORTUNITY)
      references OPPORTUNITIES (ID_OPPORTUNITY) on delete restrict on update restrict;

alter table AGREEMENTS add constraint FK_RELATIONSHIP_10 foreign key (ID_USER)
      references USERS (ID_USER) on delete restrict on update restrict;

alter table AGREEMENTS add constraint FK_RELATIONSHIP_11 foreign key (ID_OPPORTUNITY)
      references OPPORTUNITIES (ID_OPPORTUNITY) on delete restrict on update restrict;

alter table ANNUAL_TARGET add constraint FK_RELATIONSHIP_7 foreign key (ID_USER)
      references USERS (ID_USER) on delete restrict on update restrict;

alter table BAKBB add constraint FK_RELATIONSHIP_21 foreign key (ID_AGREEMENT)
      references AGREEMENTS (ID_AGREEMENT) on delete restrict on update restrict;

alter table BAKBB add constraint FK_RELATIONSHIP_32 foreign key (ID_OPPORTUNITY)
      references OPPORTUNITIES (ID_OPPORTUNITY) on delete restrict on update restrict;

alter table BOQ add constraint FK_RELATIONSHIP_19 foreign key (ID_PS)
      references PS_NODE (ID_PS) on delete restrict on update restrict;

alter table LEADS add constraint FK_RELATIONSHIP_8 foreign key (ID_USER)
      references USERS (ID_USER) on delete restrict on update restrict;

alter table MENUS add constraint FK_RELATIONSHIP_1 foreign key (MEN_ID_MENU)
      references MENUS (ID_MENU) on delete restrict on update restrict;

alter table PRODUCT_LINE_ITEM add constraint FK_RELATIONSHIP_26 foreign key (ID_AR)
      references ACTIVATION_REQUEST (ID_AR) on delete restrict on update restrict;

alter table PRODUCT_LINE_ITEM add constraint FK_RELATIONSHIP_28 foreign key (ID_BAKBB)
      references BAKBB (ID_BAKBB) on delete restrict on update restrict;

alter table PRODUCT_LINE_ITEM add constraint FK_RELATIONSHIP_29 foreign key (ID_PS)
      references PROJECT_SURVEY (ID_PS) on delete restrict on update restrict;

alter table PRODUCT_LINE_ITEM add constraint FK_RELATIONSHIP_31 foreign key (ID_PA)
      references PROJECT_ACTIVATION (ID_PA) on delete restrict on update restrict;

alter table PRODUCT_LINE_ITEM add constraint FK_RELATIONSHIP_38 foreign key (ACT_ID_AL)
      references ACTIVATION_LIST (ID_AL) on delete restrict on update restrict;

alter table PRODUCT_LINE_ITEM add constraint FK_RELATIONSHIP_39 foreign key (ID_SERVICE)
      references SERVICES (ID_SERVICE) on delete restrict on update restrict;

alter table PRODUCT_LINE_ITEM add constraint FK_RELATIONSHIP_40 foreign key (ID_PRODUCT)
      references PRODUCT (ID_PRODUCT) on delete restrict on update restrict;

alter table PRODUCT_LINE_ITEM add constraint FK_RELATIONSHIP_41 foreign key (ID_SLA)
      references SLA (ID_SLA) on delete restrict on update restrict;

alter table PRODUCT_LINE_ITEM add constraint FK_RELATIONSHIP_42 foreign key (ID_AGREEMENT)
      references AGREEMENTS (ID_AGREEMENT) on delete restrict on update restrict;

alter table PROGRESS add constraint FK_RELATIONSHIP_20 foreign key (ID_PS)
      references PS_NODE (ID_PS) on delete restrict on update restrict;

alter table PROJECT_ACTIVATION add constraint FK_RELATIONSHIP_37 foreign key (ID_OPPORTUNITY)
      references OPPORTUNITIES (ID_OPPORTUNITY) on delete restrict on update restrict;

alter table PROJECT_ACTIVATION_NODE add constraint FK_RELATIONSHIP_36 foreign key (ID_PA)
      references PROJECT_ACTIVATION (ID_PA) on delete restrict on update restrict;

alter table PROJECT_INITATION add constraint FK_RELATIONSHIP_35 foreign key (ID_PA_NODE)
      references PROJECT_ACTIVATION_NODE (ID_PA_NODE) on delete restrict on update restrict;

alter table PROJECT_SURVEY add constraint FK_RELATIONSHIP_33 foreign key (ID_OPPORTUNITY)
      references OPPORTUNITIES (ID_OPPORTUNITY) on delete restrict on update restrict;

alter table PS_NODE add constraint FK_RELATIONSHIP_17 foreign key (ID_PS)
      references PROJECT_SURVEY (ID_PS) on delete restrict on update restrict;

alter table ROLE_MENU add constraint FK_RELATIONSHIP_3 foreign key (ID_MENU)
      references MENUS (ID_MENU) on delete restrict on update restrict;

alter table ROLE_MENU add constraint FK_RELATIONSHIP_4 foreign key (ID_ROLE)
      references ROLES (ID_ROLE) on delete restrict on update restrict;

alter table USERS add constraint FK_RELATIONSHIP_5 foreign key (ID_ROLE)
      references ROLES (ID_ROLE) on delete restrict on update restrict;

alter table USERS add constraint FK_RELATIONSHIP_6 foreign key (ID_SBU)
      references SBU (ID_SBU) on delete restrict on update restrict;

