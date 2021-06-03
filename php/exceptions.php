<?php
    class MySQLiConnectException extends Exception {
        public function __construct(Throwable $previous = null) {
            $c = 777;
            $m = "Не удалось подключиться к базе данных";
            // убедитесь, что все передаваемые параметры верны
            parent::__construct($c, $m, $previous);
        }
    }

    class MySQLiPrepareException extends Exception {
        public function __construct(Throwable $previous = null) {
            $c = 778;
            $m = "Не удалось создать запрос";
            // убедитесь, что все передаваемые параметры верны
            parent::__construct($c, $m, $previous);
        }
    }

    class MySQLiQueryException extends Exception {
        public function __construct(Throwable $previous = null) {
            $c = 779;
            $m = "Не удалось выполнить запрос";
            // убедитесь, что все передаваемые параметры верны
            parent::__construct($c, $m, $previous);
        }
    }

    class FileOpenException extends Exception {
        public function __construct(Throwable $previous = null) {
            $c = 600;
            $m = "Не удалось открыть файл";
            // убедитесь, что все передаваемые параметры верны
            parent::__construct($c, $m, $previous);
        }
    }

    class FileReadException extends Exception {
        public function __construct(Throwable $previous = null) {
            $c = 601;
            $m = "Не удалось прочитать данные";
            // убедитесь, что все передаваемые параметры верны
            parent::__construct($c, $m, $previous);
        }
    }

?>
