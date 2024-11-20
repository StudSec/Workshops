CREATE DATABASE IF NOT EXISTS bankapp;

USE bankapp;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    bank_account VARCHAR(24) NOT NULL
);

-- Add a sample usersINSERT INTO users (username, password, bank_account) VALUES ('S.garcia', 'CxEROxVRPMZc', 'NL28 INGB 0068 3847 74');
INSERT INTO users (username, password, bank_account) VALUES ('J.williams', '0rgcvrvy1Yln', 'NL64 RABO 0035 2633 09');
INSERT INTO users (username, password, bank_account) VALUES ('S.doe', 'nISyMLmJrL3M', 'NL81 ABNA 0040 7503 40');
INSERT INTO users (username, password, bank_account) VALUES ('D.brown', 'kE0AH6HOEZQU', 'NL80 ABNA 0044 2616 38');
INSERT INTO users (username, password, bank_account) VALUES ('A.smith', 'fH9OSdYobAkK', 'NL61 ABNA 0083 4646 27');
INSERT INTO users (username, password, bank_account) VALUES ('S.johnson', 'lGirgSD3YuF0', 'NL38 ABNA 0069 8866 41');
INSERT INTO users (username, password, bank_account) VALUES ('J.johnson', 'N6nfQEP4LiFz', 'NL67 RABO 0050 8049 21');
INSERT INTO users (username, password, bank_account) VALUES ('A.doe', 'fgpUhnTByxKi', 'NL52 ASNB 0095 2729 29');
INSERT INTO users (username, password, bank_account) VALUES ('D.brown', 'PHKfWmY9pWQg', 'NL86 SNSB 0056 0684 44');
INSERT INTO users (username, password, bank_account) VALUES ('M.jones', 'LDqGtioBMJa7', 'NL87 INGB 0093 5597 29');
INSERT INTO users (username, password, bank_account) VALUES ('D.brown', 'h68P6ZdZBdOK', 'NL24 RABO 0022 8075 17');
INSERT INTO users (username, password, bank_account) VALUES ('S.jones', '8emA5BJPWP2e', 'NL20 ABNA 0081 4410 34');
INSERT INTO users (username, password, bank_account) VALUES ('M.doe', 'CqrpOtK0quty', 'NL56 ASNB 0052 9160 53');
INSERT INTO users (username, password, bank_account) VALUES ('D.johnson', 'uk0XFZgyUKsi', 'NL20 SNSB 0010 2671 52');
INSERT INTO users (username, password, bank_account) VALUES ('D.williams', 'pFQf6vx0YLaZ', 'NL95 SNSB 0094 3356 51');
