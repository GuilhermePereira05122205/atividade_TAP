SET GLOBAL log_bin_trust_function_creators = 1;
SET SQL_SAFE_UPDATES = 0;

DROP DATABASE IF EXISTS ProjetoTAP;

CREATE DATABASE ProjetoTAP;

USE ProjetoTAP;

CREATE TABLE Portfolios(
	id int primary key auto_increment,
	nome VARCHAR(100),
	email VARCHAR(100),
	dataNascimento date,
	github VARCHAR(70),
	linkedin VARCHAR(70),
    fotoPerfil varchar(100),
	descricao TEXT
);

DELIMITER //
CREATE PROCEDURE CadastrarPortfolio(IN nome VARCHAR(100), IN email VARCHAR(100), dataNascimento VARCHAR(15), github VARCHAR(70), linkedin VARCHAR(70), descricao TEXT, fotoPerfil VARCHAR(100))
BEGIN
	INSERT INTO Portfolios(nome, email, dataNascimento, github, linkedin, descricao, fotoPerfil) VALUES (nome, email, FormatarDataINSERT(dataNascimento), github, linkedin, descricao, fotoPerfil);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE AtualizarPortfolio(IN nome VARCHAR(100), IN email VARCHAR(100), IN dataNascimento VARCHAR(15), IN github VARCHAR(70), IN linkedin VARCHAR(70), IN descricao TEXT, fotoPerfil VARCHAR(100), IN idPortfolio INT)
BEGIN
	UPDATE Portfolios set nome = nome, email = email, dataNascimento = FormatarDataINSERT(dataNascimento), github = github, linkedin = linkedin, descricao = descricao, fotoPerfil= fotoPerfil WHERE id = idPortfolio;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE ListarPortfolios()
BEGIN
	SELECT id, nome, email, FormatarDataSelect(dataNascimento) as dataNascimento, linkedin, github, descricao, fotoPerfil FROM Portfolios;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE Portfolio(IN idPortifolio INT)
BEGIN
	SELECT id, nome, email, FormatarDataSelect(dataNascimento) as dataNascimento, linkedin, github, descricao, fotoPerfil FROM Portfolios WHERE id = idPortifolio;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE Excluir(IN idPortfolio INT)
BEGIN
	DELETE FROM Portfolios WHERE id = idPortfolio;
END //
DELIMITER ;

DELIMITER //
CREATE FUNCTION FormatarDataSelect(dataNascimento DATE)
RETURNS VARCHAR(15)
	BEGIN
	DECLARE dataNasc VARCHAR(15);
		SELECT date_format(dataNascimento, "%d/%m/%Y") INTO dataNasc;
        RETURN dataNasc;
	END //
DELIMITER ;

DELIMITER //
CREATE FUNCTION FormatarDataINSERT(dataNascimento VARCHAR(30))
RETURNS VARCHAR(30)
	BEGIN
	DECLARE dataNasc VARCHAR(30);
		SELECT 
		if(dataNascimento IS NOT NULL, 
        CONCAT(
        SUBSTRING_INDEX(dataNascimento, "/", -1), "/", 
        SUBSTRING_INDEX(SUBSTRING_INDEX(dataNascimento, "/", 2), "/", 1), "/",
        SUBSTRING_INDEX(SUBSTRING_INDEX(dataNascimento, "/", 2), "/", -1))
		, NULL)
        into dataNasc;
        return dataNasc;
	END //
DELIMITER ;


call AtualizarPortfolio("Guilherme", "gui@email.com", "10/10/2000", "gui@git", "linkedin", "descricao", "teste.png", 1);

call CadastrarPortfolio("Guilherme", "gui@email.com", "10/10/2000", "gui@git", "linkedin", "descricao", "teste.png");

call ListarPortfolios();


CALL Portfolio(1) ;