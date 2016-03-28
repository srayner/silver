-- Monarch table
CREATE TABLE monarch (
    id           Integer NOT NULL AUTO_INCREMENT,
    name         Varchar(32),
    house        Varchar(64),
    birth        Date,
    reign_start  Date,
    reign_end    Date,
    death        Date,
    PRIMARY KEY (
      id
    )
) ENGINE=InnoDB;

-- Type table
CREATE TABLE type (
    id           Integer NOT NULL AUTO_INCREMENT,
    monarch_id   Integer,
    demonination Varchar(32),
    metal        VarChar(32),
    diameter     Decimal(6,2),
    weight       Decimal(6,2),
    PRIMARY KEY (id),
    FOREIGN KEY (monarch_id) REFERENCES monarch(id) ON DELETE CASCADE
) ENGINE=InnoDB;
ALTER TABLE type

-- Coin Table
CREATE TABLE coin (
    id               Integer NOT NULL AUTO_INCREMENT,  
    type_id          Integer,
    year             Integer,
    mintage          Integer,
    obverse_design   Varchar(128),
    obverse_designer Varchar(64), 
    reverse_design   Varchar(128),
    reverse_designer Varchar(64),
    PRIMARY KEY (id),
    FORIEGN KEY (type_id) REFERENCES type(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Condition table
CREATE TABLE condition (
    id           Integer NOT NULL AUTO_INCREMENT, 
    description  Varchar(32),
  PRIMARY KEY (
    id
  )
) ENGINE=InnoDB;

-- Specimin table
CREATE TABLE specimen (
  id             Integer NOT NULL AUTO_INCREMENT,
  coin_id        Integer,
  condition_id   Integer,
  date_obtained  Date,
  obtained_from  Varchar(128),
  purchase_price Decimal(8,2),
  box            Varchar(32),
  tray           Varchar(32),
  row_no         Integer,
  column_no      Integer),
  PRIMARY KEY (id),
  FOREIGN KEY (coin_id)      REFERENCES coin(id) ON DELETE CASCADE,
  FOREIGN KEY (condition_id) REFERENCES condition(id) ON DELETE CASCADE
) ENGINE=InnoDB;