create table userInfo (
    userID int auto_increment primary key, 
    name varchar(100) not null,
    email varchar(255) unique not null, 
    password hash varchar(255) not null
);

create table sessionInfo (
    sessionID int auto_increment primary key,
    userID int not null, created at timestamp default current_timestamp,
    foreign key(userID)reference(userID) on delete cascade
);

create table posts (
    postID int auto_increment primary key,
    userID int not null,
    title varchar(255) not null,
    authorName varchar(100),
    postDate datetime default current_timestamp,
    textContent text,
    imageUrl varchar(255),
    comments int default 0,
    likes int default 0,
    foreign key(userID) reference users(userID) on delete cascade
);

create table products (
    productID int auto_increment primary key,
    name varchaar(150) not null,
    price decimal(10, 2) not null,
    siteName varchar(100),
    buyLink varchar(255),
    componentType enum('cpu', 'motherboard', 'memory', 'gpu', 'powerSupply',
    'cooler', 'storage', 'case') not null
);

create table cpuInfo (
    productID int primary key,
    cores int,
    speedGHZ decimal(4, 2),
    Foreign Key (productID) REFERENCES products(productID) on delete cascade
);

create table motherboardInfo (
    productID int primary key,
    chipset varchar(50),
    socket varchar(50),
    formFactor varchar(50),
    Foreign Key (productID) REFERENCES products(productID) on delete cascade
);

create table memoryInfo (
    productID inf primary key,
    capacityGB int,
    typePC varchar(50),
    Foreign Key (productID) REFERENCES products(productID) on delete cascade
);

create table gpuInfo (
    productID int primary key,
    chipset varchar(100),
    vidramGB int,
    coreClockMHZ int,
    Foreign Key (productID) REFERENCES products(productID) on delete cascade
)

create table powerSupplyInfo (
    productID int primary key,
    wattage int,
    effienceyRating varchar(20),
    modular boolean,
    Foreign Key (productID) REFERENCES products(productID) on delete cascade
);

create table coolerInfo (
    productID int primary key,
    fanRPM int,
    noiseLevel decimal(4, 1),
    Foreign Key (productID) REFERENCES products(productID) on delete cascade
); 

create table storageInfo (
    productID int primary key,
    capacityGB int,
    storageType enum('HDD','SSD','NVMe'),
    interface varchar(50),
    Foreign Key (productID) REFERENCES products(productID) on delete cascade
);

create table caseInfo (
    productID int primary key,
    formFactor varchar(50),
    color varhcar(50),
    material varchar(50),
    Foreign Key (productID) REFERENCES products(productID) on delete cascade
);

create table priceAlert (
    alertID in auto_increment primary key,
    userID int not null,
    productID int not null,
    Foreign Key (userId) REFERENCES users(userID) on delete cascade,
    Foreign Key (productID) REFERENCES products(productID) on delete cascade
);

create table buildsInfo (
    buildID int auto_increment primary key,
    createUser int not null,
    buildName varchar(150) not null,
    cpuInfo productID int,
    motherboard productID int,
    memoryInfo productID int,
    gpuInfo productID int,
    psuINfo productID int,
    coolerInfo productID int,
    storageInfo  productID int,
    caseInfoe productID int,
    create at timestamp default current_timestamp,

    Foreign Key (creater userID) REFERENCES users(userID) on delete cascade,
    Foreign Key (cpuInfo productId) REFERENCES products(productID),
    Foreign Key (motherboadInfo productID) REFERENCES (productID),
    Foreign Key (memoryInfo productID) REFERENCES products(productID),
    Foreign Key (gpuInfo productID) REFERENCES products(productID),
    Foreign Key (psuInfo productId) REFERENCES products(productID),
    Foreign Key (coolerInfo productID) REFERENCES products(productID),
    Foreign Key (storageinfo productID) REFERENCES products(productID),
    Foreign Key (caseInfo productID) REFERENCES products(productID),
);

