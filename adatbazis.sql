-- adatbázis létrehozása
CREATE DATABASE `el_corvus_webshop`
CHARACTER SET `utf8mb4`
COLLATE `utf8mb4_hungarian_ci`;

CREATE TABLE `termekek`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `termek` VARCHAR(50),
    `leiras` VARCHAR(255),
    `ar` INT,
    `kep` VARCHAR(30)
);

-- adatbázis feltöltése termékekkel

INSERT INTO `termekek`
VALUES(NULL, "El Corvus póló", "Ezen a pólón a kedvenc varjunk szerepel", 4000, "corvus.png");

INSERT INTO `termekek`
VALUES(NULL, "El Corvus pulcsi", "Ezen a pulcsin a kedvenc varjunk szerepel", 7000, "corvus.png");

INSERT INTO `termekek`
VALUES(NULL, "Mariska Csirke póló", "Ezen a pólón a kedvenc csirkénk szerepel", 4000, "mari.png");

INSERT INTO `termekek`
VALUES(NULL, "Mariska Csirke pulcsi", "Ezen a pulcsin a kedvenc csirkénk szerepel", 7000, "mari.png");

INSERT INTO `termekek`
VALUES(NULL, "Pít póló", "Ezen a pólón a kedvenc macskánk szerepel", 4000, "pit.png");

INSERT INTO `termekek`
VALUES(NULL, "Pít pulcsi", "Ezen a pulcsin a kedvenc macskánk szerepel", 7000, "pit.png");

INSERT INTO `termekek`
VALUES(NULL, "Stormy póló", "Ezen a pólón a kedvenc űrhajósunk szerepel", 4000, "stormy.png");

INSERT INTO `termekek`
VALUES(NULL, "Stormy pulcsi", "Ezen a pulcsin a kedvenc űrhajósunk szerepel", 7000, "stormy.png");

INSERT INTO `termekek`
VALUES(NULL, "Mirelit Vinetta póló", "Ezen a pólón a kedvenc padlizsánunk szerepel", 4000, "mirelit.jpg");

INSERT INTO `termekek`
VALUES(NULL, "Mirelit Vinetta pulcsi", "Ezen a pulcsin a kedvenc padlizsánunk szerepel", 7000, "mirelit.jpg");

INSERT INTO `termekek`
VALUES(NULL, "Imi csülke", "Tiéd lehet Imi csülke (csülkös nyakleves) ezért az alacsony árért!", 10000, "csulok.png");

INSERT INTO `termekek`
VALUES(NULL, "Unusual sapka", "Tiéd lehet ez a rendkívülien ritka égő sapka ezért az alacsony árért!", 30000, "unu.png");

INSERT INTO `termekek`
VALUES(NULL, "Ausztrálium fegyver", "Tiéd lehet ez a rendkívülien ritka arany(ausztrálium) fegyver ezért az alacsony árért!", 20000, "aussie.png");

INSERT INTO `termekek`
VALUES(NULL, "Mann Co. Ellátmányláda", "Zsákba macska! 1% esélyed van, hogy egy unusual sapkát nyiss!", 50, "crate.png");

INSERT INTO `termekek`
VALUES(NULL, "Mann Co. Ellátmányláda kulcs", "Zsákba macska kulcs! 1% esélyed van, hogy egy unusual sapkát nyiss!", 700, "key.png");

INSERT INTO `termekek`
VALUES(NULL, "Mann Co. Szolgálati Turnus Jegy", "Vegyél részt te is a robotok elleni harcban! Végezz el egy szolgálati turnust, hogy 3% esélyed legyen egy ausztrálium fegyver kinyitására! Ez a jegy 1 küldetésre használható fel, 1 turnus 3-4 küldetésből áll", 350, "ticket.png");

INSERT INTO `termekek`
VALUES(NULL, "El Corvus koncert jegy", "Ez a jegy hitelesít, hogy beléphess El Corvus következő koncertjére!", 3000, "koncert.png");

INSERT INTO `termekek`
VALUES(NULL, "Super Mario Bros. Film jegy", "Ez a jegy hitelesít arra, hogy részt vegyél a Mario film premierén", 1500, "mario.jpg");