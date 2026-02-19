<?php
$data = file_get_contents('php://input');
require_once "include/Bottele.php";
$bot = new Bot('7073035413:AAHecMet94WOcIoy6uPhWyw5oCyi3tNwNG8');
$json = json_decode($data, true);
if (isset($json['message']['text'])) {
    $message = $json['message']['text'];
    $chatId = $json['message']['chat']['id'];
    $messageId = $json['message']['message_id'];
    require_once 'vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    $dbHost = $_ENV['DB_HOST'];
    $dbName = $_ENV['DB_NAME'];
    $dbUser = $_ENV['DB_USER'];
    $dbPassword = $_ENV['DB_PASSWORD'];
    try {
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage());
    }
    $messageWithoutSpaces = str_replace(' ', '', $message);
    if (filter_var($message, FILTER_VALIDATE_URL) && (strpos($message, 'facebook.com') !== false)) {
        // Kiểm tra liên kết Facebook
        $linkQueryCards = "SELECT * FROM cards WHERE linkfb = :linkToCheck";
        $linkStmtCards = $pdo->prepare($linkQueryCards);
        $linkStmtCards->bindParam(':linkToCheck', $message);
        $linkStmtCards->execute();
        $linkRowsCards = $linkStmtCards->fetchAll(PDO::FETCH_ASSOC);
        
        $linkQueryTicket = "SELECT * FROM ticket WHERE linkfb = :linkToCheck";
        $linkStmtTicket = $pdo->prepare($linkQueryTicket);
        $linkStmtTicket->bindParam(':linkToCheck', $message);
        $linkStmtTicket->execute();
        $linkRowsTicket = $linkStmtTicket->fetchAll(PDO::FETCH_ASSOC);
        
        if (!empty($linkRowsCards)) {
            $responseText = "🕵 Fb Real : \"" . $linkRowsCards[0]['username'] . "\"\n⭐️ GDV Tại ".$_SERVER['HTTP_HOST']."\n";
            foreach ($linkRowsCards as $row) {
                $responseText .= "🎖 https://".$_SERVER['HTTP_HOST']."/trust-services/" . $row['code'] . "\n";
            }
            $bot->sendMessage($chatId, $responseText, $messageId);
        } elseif (!empty($linkRowsTicket)) {
            $responseText = "⚠️ CẢNH BÁO: ĐÂY LÀ FB SCAM\n";
            foreach ($linkRowsTicket as $row) {
                $responseText .= "🚫Hãy block ngay\n" . "https://".$_SERVER['HTTP_HOST']."/scams/" . $row['code'] . ".html\n";        
            }
            $bot->sendMessage($chatId, $responseText, $messageId);
        } else {
            $queryPos = strpos($message, '?');
            if ($queryPos !== false) {
                $linkWithoutQuery = substr($message, 0, $queryPos);
                $linkStmtCards->bindParam(':linkToCheck', $linkWithoutQuery);
                $linkStmtCards->execute();
                $linkRowsCards = $linkStmtCards->fetchAll(PDO::FETCH_ASSOC);
                if (!empty($linkRowsCards)) {
                    $responseText = "🕵 Fb Real : \"" . $linkRowsCards[0]['username'] . "\"\n⭐️ GDV Tại ".$_SERVER['HTTP_HOST']."\n";
                    foreach ($linkRowsCards as $row) {
                        $responseText .= "🎖 https://".$_SERVER['HTTP_HOST']."/trust-services/" . $row['code'] . "\n";
                    }
                    $bot->sendMessage($chatId, $responseText, $messageId);
                } else {
                    $idMatches = [];
                    if (preg_match('/[&?]id=(\d+)/', $message, $idMatches)) {
                        $idToCheck = $idMatches[1];
                        $idQuery = "SELECT * FROM cards WHERE id_fb = :idToCheck";
                        $idStmt = $pdo->prepare($idQuery);
                        $idStmt->bindParam(':idToCheck', $idToCheck);
                        $idStmt->execute();
                        $idRows = $idStmt->fetchAll(PDO::FETCH_ASSOC);
                        if (!empty($idRows)) {
                            $responseText = "🕵 Fb Real : \"" . $idRows[0]['username'] . "\"\n⭐️ GDV Tại ".$_SERVER['HTTP_HOST']."\n";
                            foreach ($idRows as $row) {
                                $responseText .= "🎖 https://".$_SERVER['HTTP_HOST']."/trust-services/" . $row['code'] . "\n";
                            }
                            $bot->sendMessage($chatId, $responseText, $messageId);
                        } else {
                            $bot->sendMessage($chatId, "🕵 Đây không phải là link FB của admin ".$_SERVER['HTTP_HOST']."\n ⚠️ Hãy trung gian khi giao dịch để tránh bị scam !", $messageId);
                        }
                    } else {
                        $bot->sendMessage($chatId, "🕵 Đây không phải là link FB của admin ".$_SERVER['HTTP_HOST']."\n ⚠️ Hãy trung gian khi giao dịch để tránh bị scam !", $messageId);
                    }
                }
            } else {
                $bot->sendMessage($chatId, "🕵 Đây không phải là link FB của admin ".$_SERVER['HTTP_HOST']."\n ⚠️ Hãy trung gian khi giao dịch để tránh bị scam !", $messageId);
            }
        }
    } elseif (filter_var($message, FILTER_VALIDATE_URL) && (strpos($message, $_SERVER['HTTP_HOST']) === false)) {
       $query = "SELECT * FROM ticket WHERE username = :message AND loai = 'web'";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':message', $message);
        $stmt->execute();
       $responseText = "⚠️ Không Xác Định, Hãy Cẩn Thận Khi Truy Cập \n" . $message . "‼️";
       $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($rows)) {
            $responseText = "🚫  Đây Là Trang Web Lừa Đảo 📛\n⚠️Hãy Cảnh giác Với Website đó\n";
            foreach ($rows as $row) {
                $responseText .= "🔖 https://".$_SERVER['HTTP_HOST']."/scams/" . $row['code'] . ".html\n";
            }
        }
        $bot->sendMessage($chatId, $responseText, $messageId);
    } elseif (ctype_digit($messageWithoutSpaces) && strpos($message, ' ') === false) {
        $query = "SELECT * FROM ticket WHERE sdt = :message OR stk = :message";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':message', $message);
        $stmt->execute();
        $responseText = "🕵️ $message Chưa Có Đơn Tố Cáo Nào \n🛡 Tại : ".$_SERVER['HTTP_HOST']."";
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($rows)) {
            $responseText = "🕵 $message Đã Có Đơn Tố Cáo 📛\n⚠️Hãy cảnh giác với stk, sđt này !!!\n";
            foreach ($rows as $row) {
                $responseText .= "🔖 https://".$_SERVER['HTTP_HOST']."/scams/" . $row['code'] . ".html\n";
            }
        }
        $bot->sendMessage($chatId, $responseText, $messageId);
    } 
}
?>
