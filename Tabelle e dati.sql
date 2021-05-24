CREATE TABLE SUPERMERCATO
(
	codice_supermercato integer primary key,
    nome varchar(255),
    indirizzo varchar(255),
    città varchar(255),
    telefono varchar(255),
    numero_reparti integer default 0
)Engine='InnoDB';

CREATE TABLE REPARTO
(
	codice_reparto integer,
    tipologia varchar(255),
    supermercato integer,
    
    index idx_supermercato(supermercato),
    foreign key (supermercato) references supermercato(codice_supermercato),
    
    primary key (codice_reparto, supermercato)
)Engine='InnoDB';

CREATE TABLE PRODOTTO
(
	codice_prodotto integer,
    reparto integer,
    supermercato integer,
    nome varchar(255),
	quantita varchar(255),
    prezzo float,
	immagine varchar(255),
    
    index idx_reparto(reparto),
    index idx_supermercato3(supermercato),
    foreign key (reparto) references reparto(codice_reparto),
    foreign key (supermercato) references reparto(supermercato),
    
    primary key (codice_prodotto, reparto, supermercato)
    
)Engine='InnoDB';

CREATE TABLE CLIENTE
(
	codice_cliente integer primary key auto_increment,
    nome varchar(255),
	cognome varchar(255),
	username varchar(255),
	password varchar(255),
	email varchar(255)
)Engine='InnoDB';

CREATE TABLE CARRELLO
(
	codice_riga integer primary key auto_increment,
    codice_cliente integer,
    codice_prodotto integer,
    
	index idx_cliente(codice_cliente),
    foreign key (codice_cliente) references cliente(codice_cliente),
    index idx_prodotto(codice_prodotto),
    foreign key (codice_prodotto) references prodotto(codice_prodotto)
)Engine='InnoDB';

insert into supermercato values(1,'Decò','Via Sebastiano Catania 312', 'Catania', '0957143691', 4);
insert into supermercato values(2,'Decò', 'Via Galermo 116A', 'Catania', '0957315945', 3);
insert into supermercato values(3, 'Decò', 'Via Sampolo 1/3', 'Palermo', '091229920', 2);
insert into supermercato values(4, 'Decò', 'Viale Regina Elena 249', 'Messina', ' 09041203', 2);

insert into reparto values(1, 'Alimentari', 1); /*Primo Supermercato*/
insert into reparto values(2, 'Macelleria', 1);
insert into reparto values(3, 'Surgelati', 1);
insert into reparto values(4, 'Giocattoli', 1);  
insert into reparto values(1, 'Alimentari', 2); /*Secondo Supermercato*/
insert into reparto values(2, 'Macelleria', 2);
insert into reparto values(3, 'Surgelati', 2);
insert into reparto values(1, 'Alimentari', 3); /*Terzo Supermercato*/
insert into reparto values(2, 'Macelleria', 3);
insert into reparto values(1, 'Alimentari', 4); /*Quarto Supermercato*/
insert into reparto values(2, 'Macelleria', 4);

insert into prodotto values(1, 1, 1, 'Cereali Kelloggs', '200g', 2.50, 'https://images-na.ssl-images-amazon.com/images/I/71RHXAjIhSL._AC_SX679_.jpg');
insert into prodotto values(2, 4, 1, 'Barbie', '1 pezzo', 30, 'https://images.eprice.it/nobrand/0/hres/319/205382319/2192643.jpg');
insert into prodotto values(3, 4, 1, 'Ciccio Bello', '1 pezzo', 20, 'https://piccoloeforte.it/wp-content/uploads/2019/11/Giochi-Preziosi-Cicciobello-Bua.jpg');
insert into prodotto values(4, 2, 1, 'Mortadella Citterio', '200g', 5, 'https://citterio.com/uploads/images/prodotti/tf-mortadella-110gr-01.jpg');
insert into prodotto values(5, 3, 1, 'Sofficini Findus', '200g', 3, 'https://nomadfoodscdn.com/-/media/project/bluesteel/findus-it/01_prodotti/3d_findus_sofficini_pomodoro_new.png?h=300&la=it-IT&w=470&hash=319A9F6264E912093AC40C4702AF127F');
insert into prodotto values(1, 1, 2, 'Cereali Kelloggs', '200g', 2.50, 'https://images-na.ssl-images-amazon.com/images/I/71RHXAjIhSL._AC_SX679_.jpg');
insert into prodotto values(6, 1, 2, 'Yogurt Yomo', '150g', 2, 'https://www.granarolo.it/system/granarolo_consumer/attachments/data/000/007/401/original/yogurt-yomo-intero-bianco-naturale.jpg?1605887512');
insert into prodotto values(4, 2, 2, 'Mortadella Citterio', '200g', 5, 'https://citterio.com/uploads/images/prodotti/tf-mortadella-110gr-01.jpg');
insert into prodotto values(7, 3, 2, 'Merluzzo Findus', '200g', 3, 'https://nomadfoodscdn.com/-/media/project/bluesteel/findus-it/01_prodotti/3d-cap-fiori-merluzzo.png?h=225&la=it-IT&w=300&hash=65A34DEC3F6C7A847A8BE087B0C5A2B9');
insert into prodotto values(8, 1, 3, 'Pan di Stelle', '100g', 2.50, 'https://content.dambros.it/uploads/2019/02/11173938/0000114920.jpg');
insert into prodotto values(9, 1, 3, 'Pringles', '175g', 2.60, 'https://elim.shop/media/com_eshop/products/000031362.jpg');
insert into prodotto values(10, 1, 3, 'Uova Amadori', '6 pezzi', 2, 'https://rsbackend.blob.core.windows.net/brandbank-mai/8006473000204_0_637301997028150118.jpg');
insert into prodotto values(4, 2, 3, 'Mortadella Citterio', '200g', 5, 'https://citterio.com/uploads/images/prodotti/tf-mortadella-110gr-01.jpg');
insert into prodotto values(8, 1, 4, 'Pan di Stelle', '100g', 2.50, 'https://content.dambros.it/uploads/2019/02/11173938/0000114920.jpg');
insert into prodotto values(9, 1, 4, 'Pringles', '175g', 2.60, 'https://elim.shop/media/com_eshop/products/000031362.jpg');
insert into prodotto values(4, 2, 4, 'Mortadella Citterio', '200g', 5, 'https://citterio.com/uploads/images/prodotti/tf-mortadella-110gr-01.jpg');
insert into prodotto values(11, 1, 1, 'Kinder Sorpresa', '20g', 1.30, 'https://cdn.craispesaonline.it/apps/images/catalog/eg-0006005/eg-0006005_1_big.jpg');
insert into prodotto values(12, 1, 1, 'Kinder Paradiso', '4x29g', 1.89, 'https://carrefour.gospesa.it/pescara/23193-large_default/kinder-paradiso-4-x-29-g.jpg');
insert into prodotto values(13, 1, 1, 'Actimel', '6x100ml', 3.20, 'https://www.spesasprint.it/img/prodotti/big/56269.jpg?v=2');
insert into prodotto values(14, 1, 1, 'Coca Cola', '500ml', 0.80, 'https://www.fpdrink.it/wp-content/uploads/2020/01/COCACOLA-05LT.png');
insert into prodotto values(15, 1, 1, 'Pepsi Cola', '500ml', 0.50, 'https://cdn1.marcocusano.cloud/D936542D/products/67-c4ca4238a0b923820dcc509a6f75849b');