-- --------------------------------------------------------
-- ホスト:                          10.42.129.142
-- サーバーのバージョン:                   10.4.11-MariaDB - mariadb.org binary distribution
-- サーバー OS:                      Win64
-- HeidiSQL バージョン:               11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- テーブル 21jygr01.user: ~2 rows (約) のデータをダンプしています
/*!40000 ALTER TABLE 'user' DISABLE KEYS */;
INSERT INTO userTable  VALUES
	('21jy0000', '21jy0000@jec.ac.jp', '電子', '太郎', 'abc'),
	('21jy0200', '21jy0200@jec.ac.jp', 'sawaguchi', 'takashi', 'abc');
/*!40000 ALTER TABLE 'user' ENABLE KEYS */;

-- テーブル 21jygr01.mockup: ~2 rows (約) のデータをダンプしています
/*!40000 ALTER TABLE 'mockup' DISABLE KEYS */;
INSERT INTO mockup VALUES
	('21jy0000m001', '0001', 'テスト2', '2023-01-17 12:18:02', 'abc', '123', '21jy0000'),
	('21jy0200m001', '0001', 'テスト1', '2023-01-17 12:23:57', 'abc', '123', '21jy0200');
/*!40000 ALTER TABLE 'mockup' ENABLE KEYS */;

-- テーブル 21jygr01.passwordreset: ~2 rows (約) のデータをダンプしています
/*!40000 ALTER TABLE 'passwordreset' DISABLE KEYS */;
INSERT INTO passwordreset  VALUES
	('21jy0000', 'abc', '2023-01-17 12:23:16'),
	('21jy0200', 'abc', '2023-01-17 12:24:35');
/*!40000 ALTER TABLE 'passwordreset' ENABLE KEYS */;

-- テーブル 21jygr01.student: ~1 rows (約) のデータをダンプしています
/*!40000 ALTER TABLE 'student' DISABLE KEYS */;
INSERT INTO student VALUES
	('21jy0000', '0000');
/*!40000 ALTER TABLE 'student' ENABLE KEYS */;

-- テーブル 21jygr01.teaher: ~1 rows (約) のデータをダンプしています
/*!40000 ALTER TABLE 'teaher' DISABLE KEYS */;
INSERT INTO teaher  VALUES
	('21jy0200', '0200');
/*!40000 ALTER TABLE 'teaher' ENABLE KEYS */;



/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;