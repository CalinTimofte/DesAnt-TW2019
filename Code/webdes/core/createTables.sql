Create table istoricPagini
  (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    link         VARCHAR(500) NOT NULL,
   reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
       erori_design   INTEGER ,
       nota_design   INTEGER ,
        erori_quality   INTEGER ,
       nota_quality   INTEGER ,
        erori_performance   INTEGER ,
       nota_performance   INTEGER
  )
  