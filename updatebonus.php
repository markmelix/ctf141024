<?php

// Рабочая версия UpdateBonus для эксплуатации уязвимости

function UpdateBonus($username) {
    try {
        $db = ConnectDatabase();
        $db->beginTransaction();
        $stmt = $db->prepare("UPDATE users SET bonus=bonus+100 WHERE username=:username");
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        $db->commit();
        return true;
    } catch (Exception) {
        return false;
    }
}

?>
