-- MySQL dump 10.13  Distrib 8.0.21, for osx10.15 (x86_64)
--
-- Host: localhost    Database: db2020
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Answers`
--

DROP TABLE IF EXISTS `Answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Answers` (
  `question_id` int DEFAULT NULL,
  `user_id` varchar(16) DEFAULT NULL,
  `body` varchar(2048) NOT NULL,
  `date` datetime NOT NULL,
  `visible` int NOT NULL DEFAULT '1',
  KEY `user_id` (`user_id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE RESTRICT,
  CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `Questions` (`question_id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Answers`
--

LOCK TABLES `Answers` WRITE;
/*!40000 ALTER TABLE `Answers` DISABLE KEYS */;
INSERT INTO `Answers` VALUES (1,'usere','These proactive safety measures can reduce the risk of accidential movement of the power tool.\r\n\r\nはどうでしょうか？','2021-01-10 20:04:51',1),(2,'usere','1だと思います。','2021-01-10 20:05:27',1),(4,'usere','3だと思いますがどうでしょう…。\r\nちょっと自信ないです。','2021-01-10 20:06:25',1),(1,'userb','UserEさんの英文の「can」を「will」にすると良いと思います。','2021-01-10 20:09:07',1),(13,'userb','おそらく文末を直せばよいのだと思います。\r\n\r\nラッピングの摩耗については、これまで多くの研究が報告されている。ただし、そもそも摩耗が起きやすい条項のついての研究は少ない。\r\n\r\nとするのはどうでしょうか？','2021-01-10 20:10:45',1),(12,'userb','a. ア\r\nb. エ\r\nc. オ\r\nd. イ\r\nだと思います','2021-01-10 20:11:14',1),(11,'userb','オでしょうか…？','2021-01-10 20:11:43',1),(8,'userb','ウです。','2021-01-10 20:12:06',1),(13,'usera','UserBさんの意見に同じです。\r\n文末を直すだけで良いと思います。','2021-01-10 20:13:24',1),(12,'usera','cはウじゃないですか…？','2021-01-10 20:13:57',1),(10,'usera','少し自身がないのですか、エだと思います。','2021-01-10 20:14:28',1),(9,'usera','UserCさんの考えはあっています。エです。','2021-01-10 20:14:53',1),(7,'usera','アです。UserCさんは合っています。','2021-01-10 20:15:23',1),(6,'usera','AR、MR、VR辺りはしっかり調べておいたほうが良いでしょう。\r\n答えはイです。','2021-01-10 20:15:58',1),(2,'userd','2じゃないでしょうか…？','2021-01-10 20:16:28',1),(3,'userd','単語についてはあまり自身がないのですが、3ではないでしょうか。','2021-01-10 20:17:07',1),(4,'userd','私もUserEさんと同じです。\r\n違いましたら、どなたか訂正をお願いします。','2021-01-10 20:17:48',1),(5,'userd','IOTとは、電子機器、ソフトウェア、センサーが組み込まれたデバイスの強固なネットワークであり、それらがデータの交換や分析を可能にします。\r\n\r\n…これではどうでしょう','2021-01-10 20:20:52',1),(6,'userd','UserAさんの意見に同意です。\r\n基本情報を受けるならこの技術はしっかり理解しましょう。','2021-01-10 20:21:40',1),(8,'userd','ウですね。','2021-01-10 20:22:03',1),(10,'userd','エですね。','2021-01-10 20:22:32',1),(2,'userc','1だと思います。','2021-01-10 20:23:11',1),(5,'userc','モノのインターネットは、デバイスの堅牢なネットワークであり、全てに電子機器、ソフトウェア、センサーが組み込まれており、データの交換と分析が可能です。\r\n\r\nUserDさんとは少し変わりますが。','2021-01-10 20:25:09',1),(11,'userc','アじゃないですか？','2021-01-10 20:25:36',1),(1,'userc','Such precautions reduce the risk of accidential activation of power tools.\r\n\r\n技術英検の回答では3Cを意識しましょう。','2021-01-10 20:27:15',1);
/*!40000 ALTER TABLE `Answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Questions`
--

DROP TABLE IF EXISTS `Questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Questions` (
  `question_id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(16) NOT NULL,
  `title` varchar(64) NOT NULL,
  `body` varchar(2048) NOT NULL,
  `tweet` varchar(128) DEFAULT NULL,
  `date` datetime NOT NULL,
  `visible` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`question_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Questions`
--

LOCK TABLES `Questions` WRITE;
/*!40000 ALTER TABLE `Questions` DISABLE KEYS */;
INSERT INTO `Questions` VALUES (1,'usera','技術英検1級の英訳問題について','下線部を英訳しなさい。\r\n\r\nパワーツール（電動工具）の使用に際しては、安全のしおり記載の指示に従ってください。パワーツールを調整したり、付属品を交換したり、片付けたりする場合は、必ず先にプラグをコンセントから抜き、バッテリーをパワーツールから取り外してください。「こうした事前の安全対策を行うことで、パワーツールが誤って動き出す危険性を減らすことが出来ます。」','下線部を「」で表しています。英語が得意な方よろしくおねがいします。','2021-01-10 19:22:36',1),(2,'usera','技術英検1級の英文書き直し問題について','英文の情報を変えずに最も簡潔に書き直した英文を1つ選びなさい。\r\n\r\nQ. Friction makes it difficult for two objects to move freely when one slides along the surface of the other.\r\n\r\n1. Friction difficultizes movement of two sliding objects.\r\n2. Friction hinders free movement of two objects sliding along each other.\r\n3. Friction causes surfaces to move freely in difficulty along with each other.','細かいニュアンスの違いなどがわかりません。','2021-01-10 19:26:55',1),(3,'usera','技術英検1級の単語問題について','単語の意味に相当する記述を選びなさい。\r\n\r\nalloy\r\n1. metals joined together by pressing them together\r\n2. metals in general which are hard, shiny and codsuctive\r\n3. a substance made by combining two or more metallic elements','ちょっと何言ってるか分かりませんでした。','2021-01-10 19:29:04',1),(4,'usera','技術英検1級の英文書き直し問題について','英文の情報を変えずに最も簡潔に書き直した英文を1つ選びなさい。\r\n\r\nQ. Volatile elements contained in rocks on the earth are more than those on the moon.\r\n\r\n1. Lunar rocks contain fewer volatiles than earth rocks.\r\n2. Volatile elements contain more earth rocks than moon rocks.\r\n3. Fewer volatile components exist in earth rocks than in moon rocks.','難しかったです。','2021-01-10 19:32:00',1),(5,'userb','技術英検1級の和訳問題について','次の英文を和訳しなさい\r\n\r\nThe internet of Things (IOT) is a robust network of devices, all embedded with electronics, software, and sensors that enable them to exchange and analyze data.','自分で色々やってみたのですが難しかったです。','2021-01-10 19:34:06',1),(6,'userc','H30基本情報午前26','AR(Augmented Reality)の説明として、もっとも適切なものはどれか。\r\n\r\nア. 過去に録画された映像を視聴することによって、その次代のその場所にいたかのような感覚が得られう。\r\nイ. 実際に目の前にある現実の映像の一部にコンピュータを使って仮想の情報を付加することによって、拡張された現実の環境が体感できる。\r\nウ. 人にとって自然な3次元の仮想空間を構成し、自分の動作に合わせて仮想空間も変化することによって、その場所にいるかのような感覚が得られる。\r\nエ. ヘッドマウントディスプレイなどの機器を利用し人の五感に働きかけることによって、実際には存在しない場所や世界を、あたかも現実のように体感できる。','VRは知っているのですが、ARについてはわかりません。エは違うと思います。','2021-01-10 19:38:56',1),(7,'userc','H28秋基本情報午前55','ITILによれば、サービスデスク組織の特徴のうち、バーチャル・サービスデスクのものはどれか。\r\n\r\nア. サービスデスク・スタッフは複数の地域に分散しているが、通信技術を利用することによって、利用者からは単一のサービスデスクのように見える。\r\nイ. 専任のサービスデスク・スタフはおかず、研究や開発、営業などの業務の担当者が兼任で運営する。\r\nウ. 費用対効果の向上やコミュニケーション効率の向上を目的として、サービスデスク・スタッフを単一または少数の場所に集中させる。\r\nエ. 利用者の経典と同じ場所化、物理的に近い場所に存在している。','おそらくアだと思うのですがどうでしょうか。どなたか回答をよろしくお願い致します。','2021-01-10 19:43:48',1),(8,'userc','H24春応用情報午前23','ECCメモリの使用例として適切なものはどれか。\r\n\r\nア. RAID3について、誤り検出に使われる。\r\nイ. 携帯電話の通信において、情報転送量を最大化するために使われる。\r\nウ. 障害発生時の影響が大きいサーバに置いて、誤り訂正に使われる。\r\nエ. 地上デジタル放送の通信おいて、誤り訂正に使われる。','多分ウだと思います。','2021-01-10 19:46:48',1),(9,'userc','H23応用情報午前48','テストで使用されるドライバまたはスタバの機能のうち、適切なものはどれか。\r\n\r\nア. スタブは、テスト対象のモジュールからの戻り地を表示・印刷する。\r\nイ. スタブは、テスト対象モジュールを呼び出すモジュールである。\r\nウ. ドライバは、テスト対象モジュールから呼び出されるモジュールである。\r\nエ. ドライバは、テスト対象モジュールに引数を渡して呼び出す。','エだと思いますが、違う気もします。','2021-01-10 19:49:03',1),(10,'userc','H27春応用情報午前61','情報戦略の投資効果を評価するとき、利益額を分子に、投資額を分母にして算出するものはどれか。\r\n\r\nア. EVA\r\nイ. IRR\r\nウ. EPV\r\nエ. ROI','全くわかりません。','2021-01-10 19:50:18',1),(11,'userd','H29画像処理過去問','スパイク状のノイズが存在する画像に対し、画像のエッジの鮮鋭度を損なうことなくノイズを除去するための効果的なフィルタはどれか。\r\n\r\nア. メディアンフィルタ\r\nイ. 平均化フィルタ\r\nウ. ラプラシアンフィルタ\r\nエ. ガウシアンフィルタ\r\nオ. 鮮鋭化フィルタ','','2021-01-10 19:53:08',1),(12,'userd','H31画像処理学年末過去問','次の文章は知的財産権について記述したものである。文章中のa~dの（　　）に最も適する単語を回答群から選べ。\r\n\r\n　著作者の権利のうち、著作者人格権には、著作物を公表するかしないかきめることのできる（a　　）、著作者のじつめいまたは変名を公表するかどうかを決定する（b　　)、著作物の内容・題号を勝手に改変されない（c　　）がある。\r\n　インターネットをつうじて著作物を配信するときには、まず著作権法上の（d　　）がはたらくことに気をつけなければならない。\r\n\r\n【回答群】\r\nア. 展示権　イ. 公表権　ウ. 公衆送信権　エ. 氏名表示権　オ. 同一性保持権','dがわからないです。','2021-01-10 19:57:12',1),(13,'usere','国語の書き直し問題について','次の文を、レポートにふさわしい文体に書き直しなさい。\r\n\r\nラッピングの摩耗については、これまで多くの研究が報告されている。ただし、そもそも摩耗が起きやすい状況についての研究は少ないのである。','全く分かりませんでした…。','2021-01-10 20:00:35',1);
/*!40000 ALTER TABLE `Questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Users` (
  `user_id` varchar(16) NOT NULL,
  `nickname` varchar(32) NOT NULL,
  `hashed_pw` varchar(64) NOT NULL,
  `is_operator` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES ('root','root','12cJrBH2GTTIw',1),('usera','UserA','129ockT95Euv6',0),('userb','UserB','12n.bDFX8BL1I',0),('userc','UserC','12LvIQjSk/CDQ',0),('userd','UserD','124dlRypn2Lfk',0),('usere','UserE','12tv7VjEIq06A',0);
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Valuations`
--

DROP TABLE IF EXISTS `Valuations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Valuations` (
  `question_id` int NOT NULL,
  `user_id` varchar(16) NOT NULL,
  PRIMARY KEY (`question_id`,`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `valuations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE RESTRICT,
  CONSTRAINT `valuations_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `Questions` (`question_id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Valuations`
--

LOCK TABLES `Valuations` WRITE;
/*!40000 ALTER TABLE `Valuations` DISABLE KEYS */;
INSERT INTO `Valuations` VALUES (10,'usera'),(12,'usera'),(13,'usera'),(1,'userb'),(11,'userb'),(12,'userb'),(1,'userc'),(2,'userc'),(3,'userc'),(5,'userc'),(2,'userd'),(3,'userd'),(4,'userd'),(9,'userd'),(2,'usere'),(3,'usere'),(4,'usere');
/*!40000 ALTER TABLE `Valuations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-10 20:36:08
